<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class MeizhouIndemnity extends Model
{
    protected $table = 'meizhou_indemnity';

    protected $guarded = ['id'];


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
