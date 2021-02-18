<?php

namespace App\Jobs;

use App\Helper\Logger;
use App\Model\MeizhouOrder;
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
        libxml_disable_entity_loader(false);
        ini_set('memory_limit', '512M');
        $path = $this->data['path'];
        $k = 0;
        if (!is_file($path)) {
            Logger::error('不是文件', [$path]);
        }

        $reader = ReaderEntityFactory::createXLSXReader();
        $reader->open($path);

        foreach ($reader->getSheetIterator() as $sheetIndex => $sheet) {
            foreach ($sheet->getRowIterator() as $rowIndex => $row) {
                $cells[] = $row->toArray();
                print $rowIndex;
            }
        }
        $reader->close();
        $cells = [];
        $data = [];
        foreach ($cells as $k => $cell) {
            if ($k == 0) {
                continue;
            }
            $data[] = [
                'order_id' => $cell[0],
                'amount_payable' => $cell[10],
                'state' => $cell[11],
                'plat' => 1,
                'pay_time' => $cell[30],
                'order_time' => $cell[5],
            ];
        }
        $chunk = array_chunk($data, 2000);
        $time = date("Y-m-d H:i:s", strtotime("-1 minute"));
        foreach ($chunk as $item) {
            $orderIds = array_column($item, 'order_id');
            // 删除1分钟前的，有相同订单号的订单
            (new MeizhouOrder)->whereIn('order_id', $orderIds)->where('updated_time', '<', $time)->delete();
            (new MeizhouOrder)->insert($item);
        }
        echo 'success';
        Logger::info(" $path 执行了 $k 行", [$k]);
    }

}
