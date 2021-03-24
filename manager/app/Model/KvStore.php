<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class KvStore extends Model
{
    protected $table = 'kvstore';

    protected $guarded = ['id'];


}
