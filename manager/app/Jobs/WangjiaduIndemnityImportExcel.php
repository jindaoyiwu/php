<?php

namespace App\Jobs;

use App\Helper\Logger;
use App\Model\MeizhouBill;
use App\Model\MeizhouDelivery;
use Box\Spout\Common\Exception\IOException;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Reader\Exception\ReaderNotOpenedException;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class WangjiaduIndemnityImportExcel implements ShouldQueue
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
        ini_set('memory_limit', '1024M');
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
                echo 1;
            }
        }
        $reader->close();
        $updated_time = date('Y-m-d H:i:s');
        $key_array = [];
        foreach ($cells as $k => $cell) {
            if ($k == 0) {
                continue;
            }
            if (!in_array($cell[0], $key_array)) {
                $key_array[] = $cell[0];
                $data[] = [
                    'order_id' => trim($cell[0]),
                    'money' => trim($cell[10]),
                    'updated_time' => $updated_time,
                ];
            }
            unset($cells[$k]);
        }
        echo '2';
        //有相同订单号的订单
        (new MeizhouDelivery())->whereIn('order_id', $key_array)->delete();
        $chunk = array_chunk($data, 1000);
        foreach ($chunk as $item) {
            if ((new MeizhouDelivery())->insert($item) == false) {
                Logger::error("delivery插入失败", [$item]);
            }
        }
        echo 'success';
        Logger::info(" $path 执行了 $k 行", [$k]);
    }

}
