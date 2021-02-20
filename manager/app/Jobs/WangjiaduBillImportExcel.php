<?php

namespace App\Jobs;

use App\Helper\Logger;
use App\Model\MeizhouBill;
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

class WangjiaduBillImportExcel implements ShouldQueue
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
            $remark = trim($cell[14]);
            if (in_array($remark, ['京东支付货款', '其他支付方式货款'])) {
                $data[] = [
                    'order_id' => trim($cell[0]),
                    'money' => trim($cell[11]),
                    'remark' => $remark,
                    'updated_time' => $updated_time
                ];
            }
        }
        echo '---------handle--------';
        //有相同订单号的订单
        $orderIds = array_column($data, 'order_id');
        (new MeizhouBill)->whereIn('order_id', $orderIds)->delete();
        $chunk = array_chunk($data, 10000);
        foreach ($chunk as $item) {
            if ((new MeizhouBill())->insert($item) == false) {
                Logger::error("bill插入失败", [$item]);
            }
        }
        echo 'success';
        Logger::info(" $path 执行了 $k 行", [$k]);
    }

}
