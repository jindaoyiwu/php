<?php

namespace Modules\WoChuang\Controllers;

use App\Http\Controllers\Controller;
use App\Model\KvStore;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;


class FrontIndexController extends Controller
{

    /**
     * 列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(Request $request)
    {
//        $line = KvStore::where(['module'=>'wochuang', 'keys'=>'index'])->first()->toArray();
//        $data['value'] = $line['value'];
        return View('woChuang.web.index');
    }




    public function save(Request $request)
    {
        $request = $request->all();
        $line = KvStore::updateOrCreate(['keys' => 'index', 'value' => $request['value']], ['module'=>'wochuang', 'keys'=>'index']);
        if ($line) {
            $success = new MessageBag([
                'title' => '保存成功'
            ]);
            return redirect('/admin/woChuang/index')->with(compact('success'));
        } else {
            $error = new MessageBag([
                'title' => '保存失败'
            ]);
            return back()->with(compact('error'));
        }
    }
}
