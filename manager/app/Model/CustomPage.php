<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class CustomPage extends Model
{
    protected $table = 'custom_page';

    protected $guarded = ['id'];

    /**
     * @param array $conditions
     * @return mixed
     */
    public function listQueryBuilder(array $conditions)
    {
        $description = $conditions['description'] ?? '';

        return function ($query) use ($description) {
            $query->newQuery()
                ->when(!empty($description), function ($query) use ($description) {
                    $query->where('remark', 'like', "%{$description}%");
                });
        };
    }

    public function getList($conditions)
    {
        $query = $this->listQueryBuilder($conditions);
        return $this->where($query)->orderBy('id','desc');
    }

}
