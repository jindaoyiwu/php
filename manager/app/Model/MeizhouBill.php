<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class MeizhouBill extends Model
{
    protected $table = 'meizhou_bill';

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
        $company = $conditions['company'] ?? '';
        $remark = $conditions['remark'] ?? '';
        $year = $conditions['year'] ?? '';
        $dutyQuarter = $conditions['duty_quarter'] ?? '';

        return function ($query) use ($company, $remark, $year, $dutyQuarter) {
            $query->newQuery()
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
}
