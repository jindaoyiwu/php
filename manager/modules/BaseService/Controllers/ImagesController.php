<?php

namespace Modules\BaseService\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Images;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class ImagesController extends Controller
{
    public function index(Request $request, Content $content)
    {
        $request = $request->all();

        return $content
            ->header('图片管理')
            ->breadcrumb(
                ['text' => '图片列表', 'url' => '/equipment/quarterly-declarations']
            )
            ->body(self::listAction($request));
    }

    public function listAction($request = [])
    {
        $model = (new Images())->getList($request);
        $listGrid = Admin::grid($model->getModel(), function (Grid $grid) {
            $grid->disableExport();
            $grid->disableRowSelector();
            $grid->expandFilter();

            $grid->column('id', 'id')->width(100);
            $grid->column('path', '地址')->width(400);
            $grid->column('description', '描述')->width(400);
            $grid->column('', '图片')->display(
                function (){
                    return '<div><img src=""></div>';
                }
            );

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->disableView();
            });

        });

        return $listGrid->render();
    }


    public function create(Request $request, Content $content)
    {
//        dd(public_path('upload'));
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
        $form->image('path', '图片')->move(public_path('images'));

        $form->action('/admin/baseService/image/save');

        return $form;
    }

    //话题保存
    public function save(Request $request)
    {
        $request = $request->all();
        unset($request['_token']);
        //添加
        $result = Images::insert($request);
        if ($result) {
            $success = new MessageBag([
                'title' => '保存成功'
            ]);
            return redirect('/admin/equipment/quarterly-declarations')->with(compact('success'));

        } else {
            $error = new MessageBag([
                'title' => '保存失败'
            ]);
            return back()->with(compact('error'));
        }
    }

}
