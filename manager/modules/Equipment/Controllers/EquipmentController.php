<?php

namespace Modules\Equipment\Controllers;

use App\Http\Controllers\Controller;
use App\Model\QuarterlyDeclaration;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class EquipmentController extends Controller
{
    public function index(Request $request, Content $content)
    {
        $request = $request->all();

        return $content
            ->header('季度申报管理')
            ->breadcrumb(
                ['text' => '季度申报列表', 'url' => '/equipment/quarterly-declarations']
            )
            ->body(self::listAction($request));
    }

    public function listAction($request = [])
    {
        $model = (new QuarterlyDeclaration())->getList($request);
        $listGrid = Admin::grid($model->getModel(), function (Grid $grid) {
            $grid->disableExport();
            $grid->disableRowSelector();
            $grid->expandFilter();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->disableIdFilter();
                $filter->column(1 / 3, function ($filter) {
                    $filter->equal('region', '法人')->placeholder('法人');
                    $filter->equal('cellphone', '手机')->placeholder('手机号');
                });
                $filter->column(1 / 3, function ($filter) {
                    $filter->equal('company', '公司名称')->placeholder('公司名称');
                    $filter->equal('remark', '备注')->placeholder('备注');
                });
                $filter->column(1 / 3, function ($filter) {
                    $filter->equal('year', '年份')->select(QuarterlyDeclaration::YEAR);
                    $filter->equal('duty_quarter', '季度')->select(QuarterlyDeclaration::DUTY_QUARTER);
                });
            });
//            $grid->column('id');
            $grid->column('region', '法人')->width(100)->editable();
            $grid->column('company', '公司名称')->width(200)->editable();
            $grid->column('cellphone', '手机')->width(100)->editable();
            $grid->column('id_number', '身份证号')->width(200)->editable();
            $grid->column('duty_paragraph', '税号')->width(200)->editable();
            $grid->column('duty_password', '密码')->width(100)->editable();
            $grid->column('remark', '备注')->width(100)->editable();
            $grid->column('value_added_tax', '增值附加税')->width(100)->editable();
            $grid->column('corporate_income_tax', '企业所得税')->width(100)->editable();
            $grid->column('cultural_construction_tax', '文化建设税')->width(100)->editable();
            $grid->column('stamp_duty', '印花税')->width(100)->editable();
            $grid->column('labour_union', '工会')->width(50)->editable();
            $grid->column('statements', '财务报表')->width(100)->editable();
            $grid->column('annual_report', '年报')->width(50)->editable();
            $grid->column('year', '年份')->editable('select', QuarterlyDeclaration::YEAR)->replace(QuarterlyDeclaration::YEAR)->width(50);
            $grid->column('duty_quarter', '季度')->editable('select', QuarterlyDeclaration::DUTY_QUARTER)->replace(QuarterlyDeclaration::DUTY_QUARTER)->width(50);

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->disableView();
                $actions->prepend('<a href="/admin/forbiddenWord/index/' . $actions->row->id . '/edit?word_type=' . $actions->row->forbidden_word . '" class="grid-row-edit"><i class="fa fa-edit"></i>申报</a>');
            });

        });

        return $listGrid->render();
    }


    public function edit(Content $content, $id = 0)
    {
        $tab = new Tab();
        if ($id > 0) {
            $title = '编辑季度申报';
        } else {
            $title = '添加季度申报';
        }
        $tab->add("$title", $this->editAction($id));
        return $content
            ->header('季度申报管理')
            ->breadcrumb(
                [
                    'text' => '季度申报列表',
                    'url' => '/equipment/quarterly-declarations'
                ],
                ['text' => "$title"]
            )
            ->body($tab);
    }

    private function editAction($id)
    {
        $data = [];

        if ($id > 0) {
            $data = (new QuarterlyDeclaration())->where(['id' => $id, 'is_deleted' => 1])->get()->toArray();
            $form = new Form($data);
            $form->hidden('id', 'id');
        } else {
            $form = new Form($data);
        }
        $form->text('region', '法人');
        $form->text('company', '公司名称');
        $form->text('cellphone', '手机');
        $form->text('id_number', '身份证号');
        $form->text('duty_paragraph', '税号');
        $form->text('duty_password', '密码');
        $form->text('remark', '备注');
        $form->text('value_added_tax', '增值附加税');
        $form->text('corporate_income_tax', '企业所得税');
        $form->text('cultural_construction_tax', '文化建设税');
        $form->text('stamp_duty', '印花税');
        $form->text('labour_union', '工会');
        $form->text('statements', '财务报表');
        $form->text('annual_report', '年报');
        $form->text('year', '年份');
        $form->text('duty_quarter', '季度');

        $form->action('/admin/equipment/quarterly-declarations/save');

        return $form;
    }

    //话题保存
    public function save(Request $request)
    {
        $request = $request->all();
        unset($request['_token']);
        foreach ($request as &$value) {
            $value = $value != null ? $value : '';
        }
        if (!empty($request['id'])) {
            $one = QuarterlyDeclaration::where(['region' => $request['region']])->get();
            $error = new MessageBag([
                'title' => $one['word'] . '禁用词已经存在'
            ]);
            return back()->with(compact('error'));
        }
        if (isset($request['id']) && $request['id']) {
            //修改
            $result = QuarterlyDeclaration::update($request, ['id' => $request['id']]);
        } else {
            //添加
            $result = QuarterlyDeclaration::insert($request);
        }

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

    public function lineEdit(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $value = $request->get('value');
        QuarterlyDeclaration::where('id', $id)->update([$name => $value])->tosql();

        return response()->json([
            'status' => true,
            'message' => "操作成功",
        ]);
    }

}
