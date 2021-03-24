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


class NavigationController extends Controller
{
    public function __construct()
    {
        Admin::script('$(".pjax-container").attr("id","pjax-container");');
    }

    /**
     * 列表
     * @param Request $request
     * @param Content $content
     * @return Content
     */
    public function index(Request $request, Content $content)
    {
        $line = KvStore::where(['module'=>'wochuang', 'keys'=>'navigation'])->first();
        $data = [];
        if ($line != null) {
            $line = $line->toArray();
            $data['value'] = $line['value'];
        }
        $tab = new Tab();
        $form = new Form($data);
        $form->action('/admin/woChuang/navigation/save' );
        $form->json('value', "内容")->style('height', "500px");
        $form->disableReset();
        $tab->add('导航页', $form, true);
        return $content
            ->body($tab->render());
    }




    public function save(Request $request)
    {
        $request = $request->all();
        $line = KvStore::updateOrCreate(['keys' => 'navigation', 'value' => $request['value']], ['module'=>'wochuang', 'keys'=>'navigation']);
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
