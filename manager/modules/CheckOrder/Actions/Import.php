<?php
namespace Modules\CheckOrder\Actions;


use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Import extends Action
{
    protected $selector = '.import-tenant';

    public function handle(Request $request)
    {
        set_time_limit(180);
        ini_set('memory_limit', '500M');

        $file_size = $_FILES['file']['size'];
        if ($file_size > 100 * 1024 * 1024) {
            throw new \Exception('文件大小不能超过100M');
        }

        $suffix = substr(strrchr($_FILES['file']["name"], '.'), 1);
        if ($suffix != 'xlsx') {
            throw new \Exception('必须为excel表格，且必须为xlsx格式！');
        }
        $fileName = $_FILES['file']['tmp_name'];
        if (strpos($_FILES['file']['name'], '京东') !== false){
            $this->jdImport($fileName);

        }
        return $this->response()->success('导入完成！')->refresh();
    }

    public function form()
    {
        $this->file('file', '请选择文件(根据文件名区分平台，文件名需携带京东，天猫、拼多多等标记)');
    }

    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default import-tenant"><i class="fa fa-upload"></i>导入数据</a>
HTML;
    }

    /**
     * @param $file
     */
    private function jdImport($file)
    {
        try {
            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true);//忽略任何格式的信息
            // 打开文件、载入excel表格
            $spreadsheet = $reader->load($file);

            dd($spreadsheet);
            // 获取活动工作薄
            $sheet = $spreadsheet->getActiveSheet();

            // 获取总列数
            // $highestColumn = $sheet->getHighestColumn();
            // 获取总行数
            $highestRow = $sheet->getHighestRow();

            for ($a = 2; $a < $highestRow; $a++) {
                $orderId = $sheet->getCell('A' . $a)->getValue();
                $amountPayable = $sheet->getCell('K', $a)->getValue();
                $state = $sheet->getCell('L', $a)->getValue();
                $pay_time = $sheet->getCell('AE', $a)->getValue();
                $plat = 1;
                $data[] = [
                    'order_id' => $orderId,
                    'amount_payable' => $amountPayable,
                    'state' => $state,
                    'pay_time' => $pay_time,
                    'plat' => $plat,
                ];
                dd($data);
            }

        } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        }
    }

}
