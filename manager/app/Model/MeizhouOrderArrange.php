<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @mixin Builder
 */
class MeizhouOrderArrange extends Model
{
    protected $table = 'meizhou_order_arrange';

    protected $guarded = ['id'];

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


    public function getJoinList($conditions)
    {
        $table = DB::table('meizhou_order_arrange as o1');
        $query = $this->listQueryBuilder($conditions);
        return $table->select('o1.order_id', 'o1.amount_payable', 'o1.state', 'o1.order_id')
            ->leftJoin('meizhou_bill as b1', 'o1.order_id', 'b1.order_id')->where($query);
    }
}
