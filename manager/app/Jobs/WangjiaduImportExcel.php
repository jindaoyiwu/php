<?php

namespace App\Jobs;

use App\Helper\Logger;
use App\Model\MeizhouOrder;
use App\Model\MeizhouOrderArrange;
use Box\Spout\Common\Exception\IOException;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Reader\Exception\ReaderNotOpenedException;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class WangjiaduImportExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws IOException
     * @throws ReaderNotOpenedException
     */
    public function handle()
    {
        ini_set('memory_limit', '512M');
        $path = $this->data['path'];
        $k = 0;
        if (!is_file($path)) {
            Logger::error('不是文件', [$path]);
        }
        $cells = [];
        $data = [];
        $reader = ReaderEntityFactory::createXLSXReader();
        $reader->open($path);

        foreach ($reader->getSheetIterator() as $sheetIndex => $sheet) {
            foreach ($sheet->getRowIterator() as $rowIndex => $row) {
                $cells[] = $row->toArray();
            }
        }
        $reader->close();
        echo '---------excel--------';
        $updated_time = date('Y-m-d H:i:s');
        foreach ($cells as $k => $cell) {
            if ($k == 0) {
                continue;
            }
            $data[] = [
                'order_id' => trim($cell[0]),
                'amount_payable' => trim($cell[10]),
                'state' => trim($cell[11]),
                'plat' => 1,
                'pay_time' => trim($cell[30]),
                'order_time' => trim($cell[5]),
                'updated_time' => $updated_time
            ];
        }
        echo '---------handle--------';

        try {
            $chunk = array_chunk($data, 1000);
            $time = date("Y-m-d H:i:s", strtotime("-1 minute"));
            foreach ($chunk as $item) {
                $orderIds = array_column($item, 'order_id');
                // 删除1分钟前的，有相同订单号的订单
                (new MeizhouOrder)->whereIn('order_id', $orderIds)->where('updated_time', '<', $time)->delete();
                if((new MeizhouOrder)->insert($item) == false){
                    throw new \Exception('插入失败');
                }
            }
            // 取唯一groupBy order_id
            $orders = MeizhouOrder::where('updated_time', $updated_time)->groupBy('order_id')
                ->select(['order_id','amount_payable','state','plat','pay_time','order_time'])->get()->toArray();
            $chunk = array_chunk($orders, 10000);
            foreach ($chunk as $item) {
                if((new MeizhouOrderArrange())->insert($item) == false){
                    throw new \Exception('插入失败');
                }
            }
        } catch (\Exception $e) {
            Logger::error($e->getMessage(), [$e->getLine()]);
        }

        echo 'success';
        Logger::info(" $path 执行了 $k 行", [$k]);
    }

}
