<?php

use App\Helper\Logger;
use App\Model\MeizhouOrder;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

ini_set('display_errors', 1);
error_reporting(-1);
require_once '/www/php/manager/vendor/autoload.php';


ini_set('memory_limit', '1024M');
$path = '/www/php/manager/storage/app/upload/20210214001028京东订单213.xlsx';
$k = 0;
dd(MeizhouOrder::select('*'));
try {
    $reader = ReaderEntityFactory::createReaderFromFile($path);

    $reader->open($path);
    foreach ($reader->getSheetIterator() as $sheet) {
        foreach ($sheet->getRowIterator() as $k => $row) {
            $cells = $row->toArray();
            $data[] = ['order_id' => trim($cells[0]), 'amount_payable' => $cells[10], 'state' => $cells[11], 'pay_time' => trim($cells[30]), 'plat' => 1];
        }
    }
    $reader->close();
    foreach (array_chunk($data, 1000) as $item) {
        (new MeizhouOrder)->whereIn('order_id', array_column($item, 'order_id'))->delete();
        (new MeizhouOrder)->insert($item);
    }
} catch (\Exception $e) {
    echo $e->getMessage();

}
echo 'success';
echo $k;
