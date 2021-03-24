<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class MeizhouDelivery extends Model
{
    protected $table = 'meizhou_delivery';

    protected $guarded = ['id'];

    const DUTY_QUARTER = [
        1 => '一季度',
        2 => '二季度',
        3 => '三季度',
        4 => '四季度',
    ];

    /**
     * @param array $conditions
     * @return mixed
     */
    public function listQueryBuilder(array $conditions)
    {
        $region = $conditions['region'] ?? '';
        $cellphone = $conditions['cellphone'] ?? '';
        $company = $conditions['company'] ?? '';
        $remark = $conditions['remark'] ?? '';
        $year = $conditions['year'] ?? '';
        $dutyQuarter = $conditions['duty_quarter'] ?? '';

        return function ($query) use ($region, $cellphone, $company, $remark, $year, $dutyQuarter) {
            $query->newQuery()
                ->when(!empty($region), function ($query) use ($region) {
                    $query->where('region', 'like', "%{$region}%");
                })
                ->when(!empty($cellphone), function ($query) use ($cellphone) {
                    $query->where('cellphone', 'like', "%{$cellphone}%");
                })
                ->when(!empty($company), function ($query) use ($company) {
                    $query->where('company', 'like', "%{$company}%");
                })
                ->when(!empty($remark), function ($query) use ($remark) {
                    $query->where('remark', 'like', "%{$remark}%");
                })
                ->when(!empty($year), function ($query) use ($year) {
                    $query->where('year', $year);
                })
                ->when(!empty($dutyQuarter), function ($query) use ($dutyQuarter) {
                    $query->where('duty_quarter', $dutyQuarter);
                })
                ->where('is_deleted', 0);
        };
    }

    public function getList($conditions)
    {
        $query = $this->listQueryBuilder($conditions);
        return $this->where($query);
    }

    public function getPagination($query, $pageSize = 20, $page = 1, $columns = ['*'], $pageName = 'page')
    {
        return self::where($query)->paginate($pageSize, $columns, $pageName, $page);
    }
}
