<?php

namespace Modules\CheckOrder\Controllers;

use App\Http\Controllers\Controller;
use App\Model\MeizhouIndemnity;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Modules\CheckOrder\Actions\BillImport;
use Modules\CheckOrder\Actions\IndemnityImport;


class IndemnityController extends Controller
{
    const PAGE_SIZE = 20;
    const PAGE_DEFAULT = 1;

    public function __construct()
    {
        Admin::script('$(".pjax-container").attr("id","pjax-container");');
    }

    private function _filterWhere($params)
    {
        if (isset($params['_columns_'])) {
            unset($params['_columns_']);
        }
        if (isset($params['_pjax'])) {
            unset($params['_pjax']);
        }
        $page = $params['page'] ?? self::PAGE_DEFAULT;
        $pageSize = $params['per_page'] ?? self::PAGE_SIZE;
        $limit = [($page - 1) * $pageSize, $pageSize];
        unset($params['page']);
        $where = [];
        foreach ($params as $_k => &$_v) {
            if ($_v != '') {
                $where[$_k] = $_v;
            }
        }
        $data = [
            'LIMIT' => $limit,
        ];

        if (!empty($where)) {
            $data['AND'] = $where;
        }

        return $data;
    }

    /**
     * 列表
     * @param Request $request
     * @param Content $content
     * @return Content
     */
    public function index(Request $request, Content $content)
    {
        $request = $request->all();
        $request = self::_filterWhere($request);

        return $content
            ->header('账单管理')
            ->breadcrumb(
                ['text' => '账单列表', 'url' => '']
            )
            ->body(self::listAction($request));
    }


    private function listAction($request = [])
    {
        $model = (new MeizhouIndemnity())->getList($request);

        $listGrid = Admin::grid($model->getModel(), function (Grid $grid) {
            $grid->disableExport();
            $grid->disableRowSelector();
            $grid->expandFilter();
            $grid->tools(function (Grid\Tools $tools) {
                $tools->append(new IndemnityImport());
            });
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('order_id', '订单ID')->placeholder('订单ID');
            });

            $grid->column('id')->width(100);
            $grid->column('order_id', '订单ID')->width(300);
            $grid->column('money', '金额')->width(200);
            $grid->column('remark', 'remark')->width(600);
            $grid->disableActions();
//            $grid->actions(function (Grid\Displayers\Actions $actions) {
//                $actions->disableView();
//                $actions->disableEdit();
//                $actions->prepend('<a href="/admin/forbiddenWord/index/' . $actions->row->id . '/edit?word_type=' . $actions->row->forbidden_word . '" class="grid-row-edit"><i class="fa fa-edit"></i></a>');
//            });

        });

        return $listGrid->render();
    }


}
