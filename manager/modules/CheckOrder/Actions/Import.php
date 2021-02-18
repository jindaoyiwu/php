<?php

namespace Modules\CheckOrder\Actions;


use App\Helper\Logger;
use App\Jobs\WangjiaduImportExcel;
use App\Model\MeizhouOrder;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Import extends Action
{
    protected $selector = '.import-tenant';

    public function handle(Request $request)
    {
//        if ($request->hasFile('file') && $request->file('file')->isValid()) {
//            $file = $request->file('file');
//            $allowed_extensions = ['xlsx','pdf'];
//            if (!in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
//                dd('只能上传xlsx格式的图片.');
//            } else {
//                $destinationPath = storage_path() . '/app/upload/'; //public 文件夹下面建 storage/uploads 文件夹
//                $extension = $file->getClientOriginalExtension();
//                $fileName = md5(time() . rand(1, 1000)) . '.' . $extension;
//                $file->move($destinationPath, $fileName);
//                dd("文件路径：" . asset($destinationPath . $fileName));
//            }
//        } else {
//            dd('图片上传失败请重试.');
//        }

        $fileCharater = $request->file('file');
        if ($fileCharater->isValid()) { //括号里面的是必须加的哦
            //获取文件的绝对路径
            $path = $fileCharater->getRealPath();
            //定义文件名
            $filename = date('YmdHis') . $_FILES['file']['name'];
            //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
            dd(Storage::disk('local')->put($filename, file_get_contents($path)));
            $absPath = storage_path() . '/app/upload/' . $filename;
            dispatch(new WangjiaduImportExcel(['path' => $absPath]));
        }

//        if ($request->hasFile('file') && $request->file('file')->isValid()) {
//            $fileName = $_FILES['file']['tmp_name'];
//            $file = $request->file('file');
//            $destinationPath = storage_path().'/uploads/';
//            $extension = $file->getClientOriginalExtension();
//            $fileName = $fileName.md5(time() . rand(1, 1000)) . '.' . $extension;
//            var_dump($file->move($destinationPath, $fileName));;
//            $filePath = asset($destinationPath . $fileName);
//             dispatch(new WangjiaduImportExcel(['path' => $filePath]));
//
//        } else {
//            return $this->response()->success('上传失败')->refresh();
//        }
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
