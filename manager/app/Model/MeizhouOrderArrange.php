<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class MeizhouOrderArrange extends Model
{
    protected $table = 'meizhou_order_arrange';

    protected $guarded = ['id'];

    const DUTY_QUARTER = [
        1 => '一季度',
        2 => '二季度',
        3 => '三季度',
        4 => '四季度',
    ];

}
