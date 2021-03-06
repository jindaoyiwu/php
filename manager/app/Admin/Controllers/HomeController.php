<?php

namespace App\Admin\Controllers;

use App\Helper\Logger;
use App\Http\Controllers\Controller;
use App\Jobs\WangjiaduBillImportExcel;
use App\Jobs\WangjiaduDeliveryImportExcel;
use App\Jobs\WangjiaduImportExcel;
use App\Model\MeizhouOrder;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Illuminate\Support\Facades\Redis;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use PhpOffice\PhpSpreadsheet\IOFactory;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }

    public function test()
    {
//        # docker内访问mac地址 docker.for.mac.host.internal    'http://127.0.0.1:4444/'
//        $serverUrl = 'http://docker.for.mac.host.internal::4444/wd/hub';
//
//        $desiredCapabilities = DesiredCapabilities::chrome();
//        $driver = RemoteWebDriver::create($serverUrl, $desiredCapabilities);
//        $driver->get('https://login.taobao.com/member/login.jhtml');
//
//        $element = $driver->findElement(
//            WebDriverBy::name('TPL_username')
//        );
//        $element->clear(); //清空
//        $element->sendKeys("");//自动填写淘宝用户名
//        $element = $driver->findElement(
//            WebDriverBy::name('TPL_password')
//        );
//        $element->clear(); //清空
//        $element->sendKeys("");//自动填写淘宝密码
//        $driver->findElement(WebDriverBy::id('J_SubmitStatic'))->click();
        //dispatch(new WangjiaduDeliveryImportExcel(['path' => '/www/php/manager/storage/app/upload/京东delivery.xlsx']));
        $inputFileType = 'Xlsx';
//    $inputFileType = 'Xlsx';
//    $inputFileType = 'Xml';
//    $inputFileType = 'Ods';
//    $inputFileType = 'Slk';
//    $inputFileType = 'Gnumeric';
//    $inputFileType = 'Csv';
        $inputFileName = '/www/php/manager/storage/app/upload/京东delivery.xlsx';
        /**  Create a new Reader of the type defined in $inputFileType  **/
        $reader = IOFactory::createReader($inputFileType);
        /**  Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($inputFileName);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow(); // 总行
        echo  $highestRow;
    }
}
