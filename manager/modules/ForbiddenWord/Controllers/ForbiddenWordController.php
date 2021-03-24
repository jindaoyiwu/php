<?php

namespace Frieza\Modules\ForbiddenWord\Controllers;

use App\Http\Controllers\Controller;
use App\Pockets\GridDataModel as pGridDataModel;
use Doraemon\model\ForbiddenWord\ForbiddenAntiSpam;
use Doraemon\model\ForbiddenWord\ForbiddenWord;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use Encore\Admin\Widgets\Tab;
use Illuminate\Support\MessageBag;


class ForbiddenWordController extends Controller
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


    public function listAction($request = [])
    {
        $request = self::_filterWhere($request);
        $infos = ForbiddenWord::getLists($request['LIMIT'], $request['AND']);
        $infosAll = ForbiddenWord::getLists([], $request['AND']);
        $antiSpam = ForbiddenAntiSpam::select('*', ['state' => ForbiddenAntiSpam::STATE_SUCCESS]);
        $type = [];
        foreach ($antiSpam as $item) {
            $type[$item['id']] = $item['forbidden_word'];
        }
        $gridModel = new pGridDataModel($infos, count($infosAll), [
            'perPage' => $request['per_page'] ?: $request['LIMIT'][1],
        ]);

        $listGrid = Admin::grid($gridModel, function (Grid $grid) use ($type) {
            $grid->disableExport();
            $grid->disableRowSelector();
            $grid->expandFilter();

            $grid->filter(function (Grid\Filter $filter) use ($type) {
                $filter->disableIdFilter();
                $filter->equal('word', '禁用词')->placeholder('禁用词');
            });
            $grid->column('id');
            $grid->column('auti_spam_id', '禁用词类型')->replace($type)->width(100);
            $grid->column('word', '禁用词')->editable()->width(100);
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->disableView();
                $actions->disableEdit();
            });

        });

        return $listGrid->render();
    }


    public function del($autiSpamId, $id)
    {
        $data = ForbiddenWord::get('*', ['id' => $id]);
        if ($data) {
            $data['state'] = ForbiddenWord::STATE_FAIL;
            $data['edittime'] = time();

            $rs = ForbiddenWord::update($data, ['id' => $id]);
            if ($rs->rowCount() > 0) {
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


    public function edit(Content $content, $autiSpamId = 0, $id = 0)
    {
        $tab = new Tab();
        if ($id > 0) {
            $title = '编辑禁用词';
        } else {
            $title = '添加禁用词';
        }
        $tab->add("$title", $this->editAction($autiSpamId, $id));
        return $content
            ->header('禁用词管理')
            ->breadcrumb(
                [
                    'text' => '禁用词类型列表',
                    'url' => '/forbiddenWord/index'
                ],
                [
                    'text' => '编辑禁用词类型',
                    'url' => '/forbiddenWord/index/' . $autiSpamId . '/edit#tab_2'
                ],
                ['text' => "$title"]
            )
            ->body($tab);
    }

    private function editAction($autiSpamId, $id)
    {
        $data['auti_spam_id'] = $autiSpamId;
        $antiSpam = ForbiddenAntiSpam::get('*', ['id' => $autiSpamId]);
        if ($id > 0) {
            $data = ForbiddenWord::get('*', ['id' => $id, 'state' => ForbiddenAntiSpam::STATE_SUCCESS]);
        }
        $data['forbidden_word'] = $antiSpam['forbidden_word'];
        $form = new Form($data);
        $form->hidden('id', 'id');
        $form->hidden('auti_spam_id', 'auti_spam_id');
        $form->text('forbidden_word', '禁用词类型')->disable();
        $form->textarea('word', '禁用词')->help('批量添加以/分隔')->required('禁用词必填');
        $form->action('/admin/forbiddenWord/word/index/save');

        return $form;
    }

    public function save(Request $request)
    {
        $request = $request->all();
        unset($request['_token']);

        if (strpos($request['word'], '/') !== false) {
            $words = explode('/', $request['word']);
            foreach ($words as $item) {
                if (!empty($item)) {
                    $insertData[] = ['auti_spam_id' => $request['auti_spam_id'], 'word' => $item, 'admin_id' => Admin::user()->id];
                }
            }
        } else {
            $words = $request['word'];
            $insertData['auti_spam_id'] = $request['auti_spam_id'];
            $insertData['word'] = $request['word'];
            $insertData['admin_id'] = Admin::user()->id;
        }
        if (!empty($request['_editable'])) {
            $words = $request['value'];
            $request['auti_spam_id'] = request()->route('auti_spam_id');

        }
        $one = ForbiddenWord::get('*', ['auti_spam_id' => $request['auti_spam_id'], 'word' => $words, 'state' => ForbiddenAntiSpam::STATE_SUCCESS]);

        if (!empty($request['_editable'])) {
            if ($one != null) {
                return response()->json([
                    'status' => false,
                    'message' => "禁用词存在，操作失败",
                ]);
            }
            $editData = ['word' => $request['value'], 'admin_id' => Admin::user()->id];
            $result = ForbiddenWord::update($editData, ['id' => $request['pk']]);
            $num = $result->rowCount();
            if ($num > 0) {
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
        } else if (!empty($insertData)) {
            if ($one != null) {
                $error = new MessageBag([
                    'title' => $one['word'] . '已经存在'
                ]);
                return back()->with(compact('error'));
            }
            unset($request['id']);
            $result = ForbiddenWord::insert($insertData);
            if ($result) {
                $success = new MessageBag([
                    'title' => '保存成功'
                ]);
                return redirect('admin/forbiddenWord/index/' . $request['auti_spam_id'] . '/edit?sign=2')->with(compact('success'));

            } else {
                $error = new MessageBag([
                    'title' => '保存失败'
                ]);
                return back()->with(compact('error'));
            }
        }
    }


}