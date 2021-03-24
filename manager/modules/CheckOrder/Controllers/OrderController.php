<?php

namespace Modules\CheckOrder\Controllers;

use App\Http\Controllers\Controller;
use App\Model\MeizhouOrder;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Modules\CheckOrder\Actions\OrderImport;


class OrderController extends Controller
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
            ->header('订单管理')
            ->breadcrumb(
                ['text' => '订单列表', 'url' => '/forbiddenWord/index']
            )
            ->body(self::listAction($request));
    }


    private function listAction($request = [])
    {
        $model = (new MeizhouOrder())->getList($request);

        $listGrid = Admin::grid($model->getModel(), function (Grid $grid) {
            $grid->disableExport();
            $grid->disableRowSelector();
            $grid->expandFilter();
            $grid->tools(function (Grid\Tools $tools) {
                $tools->append(new OrderImport());
            });
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('order_id', '订单ID')->placeholder('订单ID');
            });

            $grid->column('id');
            $grid->column('order_id', '订单ID')->width(200);
            $grid->column('amount_payable', '应付金额')->width(200);
            $grid->column('state', '状态')->width(200);
            $grid->column('plat', '订单平台')->replace(['1'=>'京东'])->width(100);
            $grid->column('pay_time', '支付时间')->width(300);
            $grid->column('order_time', '下单时间')->width(300);
//            $grid->actions(function (Grid\Displayers\Actions $actions) {
//                $actions->disableView();
//                $actions->disableEdit();
//                $actions->prepend('<a href="/admin/forbiddenWord/index/' . $actions->row->id . '/edit?word_type=' . $actions->row->forbidden_word . '" class="grid-row-edit"><i class="fa fa-edit"></i></a>');
//            });

        });

        return $listGrid->render();
    }


    public function save(Request $request)
    {
        $request = $request->all();
        $validator = Validator::make($request,
            [
                'forbidden_word' => 'required|max:50',
                'forbidden_remark' => 'max:200',
            ]
        );
        if ($validator->fails() == true) {
            $error = new MessageBag([
                'title' => $validator->errors()->first()
            ]);
            return back()->with(compact('error'));
        }
        $one = ForbiddenAntiSpam::get('*', ['forbidden_word' => $request['forbidden_word'], 'state' => ForbiddenAntiSpam::STATE_SUCCESS]);
        $error = new MessageBag([
            'title' => '禁用词类型已经存在'
        ]);
        unset($request['_token']);
        $num = 0;
        $request['admin_id'] = Admin::user()->id;
        if (isset($request['id']) && $request['id']) {
            if ($one != null && $one['id'] != $request['id']) {
                return back()->with(compact('error'));
            }
            //修改
            $result = ForbiddenAntiSpam::update($request, ['id' => $request['id']]);
            $num = $result->rowCount();
        } else {
            if ($one != null) {
                return back()->with(compact('error'));
            }
            unset($request['id']);
            //添加
            $result = ForbiddenAntiSpam::insert($request);
        }

        if ($num > 0 || $result) {
            $success = new MessageBag([
                'title' => '保存成功'
            ]);
            return redirect('/admin/forbiddenWord/index')->with(compact('success'));

        } else {
            $error = new MessageBag([
                'title' => '保存失败'
            ]);
            return back()->with(compact('error'));
        }
    }
}
