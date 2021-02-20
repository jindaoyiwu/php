<?php

namespace Modules\CheckOrder\Actions;


use App\Helper\Logger;
use App\Jobs\WangjiaduBillImportExcel;
use App\Jobs\WangjiaduImportExcel;
use App\Model\MeizhouOrder;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BillImport extends Action
{
    protected $selector = '.import-tenant';

    public function handle(Request $request)
    {
        $fileCharater = $request->file('file');
        if ($fileCharater->isValid()) { //括号里面的是必须加的哦
            //获取文件的绝对路径
            $path = $fileCharater->getRealPath();
            //定义文件名
            $filename = date('YmdHis') . 'bill'.$_FILES['file']['name'];
            //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
            Storage::disk('local')->put($filename, file_get_contents($path));
            $absPath = storage_path() . '/app/upload/' . $filename;
            dispatch(new WangjiaduBillImportExcel(['path' => $absPath]));
        }
        return $this->response()->success('上传完成！你先喝杯水，数据较大让子弹飞一会')->refresh();
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


}
