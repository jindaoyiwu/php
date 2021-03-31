<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Delete extends RowAction
{
    public $name = '删除';

    public $model;
    public $conditions;

    public function handle(Model $model)
    {
        $conditions = $model->attributesToArray();
        $result = $model->del($conditions);
        if ($result > 0) {
            return $this->response()->success('删除成功')->refresh();
        } else {
            return $this->response()->success('删除失败')->refresh();
        }
    }

}
