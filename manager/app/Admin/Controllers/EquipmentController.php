<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Model\QuarterlyDeclaration;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    const PAGE_SIZE = 20;
    const PAGE_DEFAULT = 1;

    public function index(Request $request, Content $content)
    {
        $request = $request->all();

        return $content
            ->header('季度申报管理')
            ->breadcrumb(
                ['text' => '季度申报列表', 'url' => '/quarterly-declarations']
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
            $grid->column('id')->sort();
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
            });

        });

        return $listGrid->render();
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(QuarterlyDeclaration::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('region', __('Region'));
        $show->field('company', __('Company'));
        $show->field('cellphone', __('Cellphone'));
        $show->field('id_number', __('Id number'));
        $show->field('duty_paragraph', __('Duty paragraph'));
        $show->field('duty_password', __('Duty password'));
        $show->field('remark', __('Remark'));
        $show->field('value_added_tax', __('Value added tax'));
        $show->field('corporate_income_tax', __('Corporate income tax'));
        $show->field('cultural_construction_tax', __('Cultural construction tax'));
        $show->field('stamp_duty', __('Stamp duty'));
        $show->field('labour_union', __('Labour union'));
        $show->field('statements', __('Statements'));
        $show->field('annual_report', __('Annual report'));
        $show->field('duty_quarter', __('Duty quarter'));
        $show->field('updated_time', __('Updated time'));
        $show->field('created_time', __('Created time'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new QuarterlyDeclaration());

        $form->text('region', __('Region'));
        $form->text('company', __('Company'));
        $form->text('cellphone', __('Cellphone'));
        $form->text('id_number', __('Id number'));
        $form->text('duty_paragraph', __('Duty paragraph'));
        $form->text('duty_password', __('Duty password'));
        $form->text('remark', __('Remark'));
        $form->text('value_added_tax', __('Value added tax'));
        $form->text('corporate_income_tax', __('Corporate income tax'));
        $form->text('cultural_construction_tax', __('Cultural construction tax'));
        $form->text('stamp_duty', __('Stamp duty'));
        $form->text('labour_union', __('Labour union'));
        $form->text('statements', __('Statements'));
        $form->text('annual_report', __('Annual report'));
        $form->switch('duty_quarter', __('Duty quarter'));
        $form->datetime('updated_time', __('Updated time'))->default(date('Y-m-d H:i:s'));
        $form->datetime('created_time', __('Created time'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
