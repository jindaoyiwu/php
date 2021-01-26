<?php

namespace App\Admin\Controllers;

use App\Model\QuarterlyDeclaration;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EquipmentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'QuarterlyDeclaration';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new QuarterlyDeclaration());

        $grid->column('id', __('Id'));
        $grid->column('region', __('地区'));
        $grid->column('company', __('公司名称'));
        $grid->column('cellphone', __('电话'));
        $grid->column('id_number', __('身份证号'));
        $grid->column('duty_paragraph', __('税号'));
        $grid->column('duty_password', __('密码'));
        $grid->column('remark', __('备注'));
        $grid->column('value_added_tax', __('增值税/附加税'));
        $grid->column('corporate_income_tax', __('企业所得税'));
        $grid->column('cultural_construction_tax', __('文化建设税'));
        $grid->column('stamp_duty', __('印花税'));
        $grid->column('labour_union', __('工会'));
        $grid->column('statements', __('财务报表'));
        $grid->column('annual_report', __('年报'));
        $grid->column('duty_quarter', __('季度'));

        return $grid;
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
