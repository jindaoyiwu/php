<?php

namespace Modules\BaseService\Controllers;

use App\Admin\Actions\Delete;
use App\Http\Controllers\Controller;
use App\Model\CustomPage;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;


class PageController extends Controller
{
    public function index(Request $request, Content $content)
    {
        $request = $request->all();

        return $content
            ->header('页面管理')
            ->breadcrumb(
                ['text' => '页面列表', 'url' => '/page/index']
            )
            ->body(self::listAction($request));
    }

    public function listAction($request = [])
    {
        $grid = new Grid(new CustomPage());
        $grid->model()->getList($request);
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableFilter();

        $grid->column('id', 'id')->width(100);
        $grid->column('uri', '路径')->width(300);
        $grid->column('page_name', '页面名称')->width(400);

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            $actions->disableView();
            $actions->disableDelete();
            $actions->add(new Delete());
    });
        return $grid->render();
    }


    public function create(Request $request, Content $content, $id = 0)
    {
        $tab = new Tab();
        if (empty($id)) {
            $title = '新增页面';
        } else {
            $title = '编辑页面';
        }

        $tab->add("$title", $this->editAction($id));
        return $content
            ->breadcrumb(
                [
                    'text' => '页面列表',
                    'url' => '/baseService/page/index'
                ],
                ['text' => "$title"]
            )
            ->body($tab);
    }

    private function editAction($id)
    {
        $data = [];
        if (!empty($id)) {
            $data = CustomPage::where(['id' => $id])->first()->toArray();
        }
        $form = new Form($data);
        $form->hidden('id', 'id');
        $form->text('uri', '路径');
        $form->text('page_name', '页面名称');
        $form->UEditor('content')->options(['initialFrameHeight' => 800]);
        $form->action('/admin/baseService/page/save');

        return $form;
    }

    public function save(Request $request)
    {
        $request = $request->all();
        unset($request['_token']);
        //添加
        if (empty($request['id'])) {
            $result = CustomPage::insert($request);
        } else {
            $data['uri'] = $request['uri'];
            $data['page_name'] = $request['page_name'];
            $data['content'] = $request['content'];
            $result = CustomPage::where(['id' => $request['id']])->update($data);
        }
        if ($result) {
            $success = new MessageBag([
                'title' => '保存成功'
            ]);
            return redirect('/admin/baseService/page/index')->with(compact('success'));

        } else {
            $error = new MessageBag([
                'title' => '保存失败'
            ]);
            return back()->with(compact('error'));
        }
    }

}
