<?php

namespace Frieza\Modules\ForbiddenWord\Controllers;

use App\Http\Controllers\Controller;
use App\Pockets\GridDataModel as pGridDataModel;
use Doraemon\model\ForbiddenWord\ForbiddenAntiSpam;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Encore\Admin\Widgets\Tab;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;


class ForbiddenAntiSpamController extends Controller
{
    const PAGE_SIZE = 20;
    const PAGE_DEFAULT = 1;

    public function __construct()
    {
        parent::__construct();
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
            ->header('禁用词类型管理')
            ->breadcrumb(
                ['text' => '禁用词类型列表', 'url' => '/forbiddenWord/index']
            )
            ->body(self::listAction($request));
    }


    private function listAction($request = [])
    {
        $infos = ForbiddenAntiSpam::getLists($request['LIMIT'], $request['AND']);
        $infosAll = ForbiddenAntiSpam::getLists([], $request['AND']);
        $gridModel = new pGridDataModel($infos, count($infosAll), [
            'perPage' => $request['per_page'] ?: $request['LIMIT'][1],
        ]);

        $listGrid = Admin::grid($gridModel, function (Grid $grid) {
            $grid->disableExport();
            $grid->disableRowSelector();
            $grid->expandFilter();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('forbidden_word', '禁用词类型')->placeholder('禁用词类型');
            });

            $grid->column('id');
            $grid->column('forbidden_word', '禁用词类型')->width(300);
            $grid->column('forbidden_remark', '说明')->width(300);
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->disableView();
                $actions->disableEdit();
                $actions->prepend('<a href="/admin/forbiddenWord/index/' . $actions->row->id . '/edit?word_type=' . $actions->row->forbidden_word . '" class="grid-row-edit"><i class="fa fa-edit"></i></a>');
            });

        });

        return $listGrid->render();
    }


    public function del($id)
    {
        $data = ForbiddenAntiSpam::get('*', ['id' => $id]);
        if ($data) {
            $rs = ForbiddenAntiSpam::del(['id' => $id]);
            if ($rs == true) {
                return response()->json([
                    'status' => true,
                    'message' => "操作成功",
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "操作失败",
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "操作失败",
            ]);
        }
    }


    public function edit(Content $content, $id = 0)
    {
        $request = Request()->all();
        $wordCondition['auti_spam_id'] = $id;
        $wordCondition['page'] = $request['page'] ?? self::PAGE_DEFAULT;

        $tab = new Tab();
        if ($id > 0) {
            $title = '编辑禁用词类型';
            $header = $request['word_type'] . '管理';
            $tab->add("$title", $this->editAction($id), false, 1);
            if (!empty($request['word'])) {
                $wordAction = true;
                $wordCondition['word'] = $request['word'];
            } else if (!empty($request['sign']) && $request['sign'] == 2) {
                $wordAction = true;
            } else {
                $wordAction = false;
            }

            if (!empty($request['sign']) && $request['sign'] == 3) {
                $active = true;
            } else {
                $active = false;
            }
            $tab->add("编辑禁用词", (new ForbiddenWordController())->listAction($wordCondition), $wordAction, 2);

            $tab->add("编辑场景", (new ForbiddenSceneWordController())->editSceneAction($id), $active, 3);

        } else {
            $header = '禁用词类型管理';
            $title = '添加禁用词类型';
            $tab->add("$title", $this->editAction($id));
        }
        return $content
            ->header($header)
            ->breadcrumb(
                [
                    'text' => '禁用词类型列表',
                    'url' => '/forbiddenWord/index'
                ],
                ['text' => "$title"]
            )
            ->body($tab);
    }

    private function editAction($id = 0)
    {
        $data = [];
        if ($id > 0) {
            $data = ForbiddenAntiSpam::get('*', ['id' => $id, 'state' => ForbiddenAntiSpam::STATE_SUCCESS]);
        }
        $form = new Form($data);
        $form->hidden('id', 'id');
        $form->text('forbidden_word', '禁用词类型')->required('禁用词类型必填');
        $form->text('forbidden_remark', '说明');
        $form->action('/admin/forbiddenWord/index/save');

        return $form;
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