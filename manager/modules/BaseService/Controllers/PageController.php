<?php

namespace Modules\BaseService\Controllers;

use App\Http\Controllers\Controller;
use App\Model\CustomPage;
use App\Model\Images;
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
                ['text' => '页面列表', 'url' => '/page/quarterly-declarations']
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
        $grid->column('', '图片')->display(
            function () {
                return '<div style="width: 100px; height: 100px"><img width="200px" height="200px" src="'.$this->path.'"></div>';
            }
        );

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            $actions->disableView();
        });
        return $grid->render();
    }


    public function create(Request $request, Content $content)
    {
        $tab = new Tab();
        $title = '添加图片';
        $tab->add("$title", $this->editAction());
        return $content
            ->breadcrumb(
                [
                    'text' => '图片列表',
                    'url' => '/baseService/image/index'
                ],
                ['text' => "$title"]
            )
            ->body($tab);
    }

    private function editAction()
    {
        $data = [];
        $form = new Form($data);
        $form->text('description', '描述');
        $form->image('path', '图片');

        $form->action('/admin/baseService/image/save');

        return $form;
    }

    public function save(Request $request)
    {
        $request = $request->all();
        $fileSystem = $request['path'];
        $name = date('Y-m-dH:i:s') . base64_encode(time()) . '.' . $fileSystem->guessClientExtension();
        $fileSystem->move(public_path('upload/images'), $name);
        $path = public_path('upload/images') . '/' . $name;
        $realPath = public_path();
        $url = env('APP_URL') . substr($path, strlen($realPath));
        $request['path'] = $url;
        unset($request['_token']);
        //添加
        $result = Images::insert($request);
        if ($result) {
            $success = new MessageBag([
                'title' => '保存成功'
            ]);
            return redirect('/admin/baseService/image/index')->with(compact('success'));

        } else {
            $error = new MessageBag([
                'title' => '保存失败'
            ]);
            return back()->with(compact('error'));
        }
    }

}
