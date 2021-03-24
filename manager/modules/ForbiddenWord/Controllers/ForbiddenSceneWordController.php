<?php

namespace Frieza\Modules\ForbiddenWord\Controllers;

use App\Http\Controllers\Controller;
use Doraemon\model\ForbiddenWord\ForbiddenAntiSpam;
use Doraemon\model\ForbiddenWord\ForbiddenSceneWord;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class ForbiddenSceneWordController extends Controller
{
    const PAGE_SIZE = 20;
    const PAGE_DEFAULT = 1;

    public function __construct()
    {
        parent::__construct();
        Admin::script('$(".pjax-container").attr("id","pjax-container");');
        Admin::script($this->tab());
    }

    public function edit(Content $content, $id = 0)
    {
        $tab = new Tab();
        $title = '编辑场景-禁用词类型';

        $tab->add("$title", $this->editSceneAction($id));
        return $content
            ->header('场景-禁用词类型管理')
            ->body($tab);
    }

    public function save(Request $request)
    {
        $request = $request->all();
        unset($request['_token']);
        $insertData = [];
        $time = date('Y-m-d H:i:s');
        //修改
        ForbiddenSceneWord::update(['state' => ForbiddenSceneWord::STATE_FAIL, 'edittime' => $time], ['state' => ForbiddenSceneWord::STATE_SUCCESS, 'auti_spam_id' => $request['id']]);
        foreach ($request['forbidden_result'] as $k => $item) {
            if (!empty($item)) {
                $data = array_filter($item);
                $insertData[] = [
                    'admin_id' => Admin::user()->id,
                    'scene_num' => $k,
                    'auti_spam_id' => $request['id'],
                    'operate_mode' => $request['mode' . $k],
                    'forbidden_result' => json_encode($data),
                    'edittime' => $time
                ];
            }
        }
        $result = ForbiddenSceneWord::insert($insertData);
        if ($result->errorCode() == '00000') {
            $success = new MessageBag([
                'title' => '保存成功'
            ]);
            return redirect('admin/forbiddenWord/index/' . $request['id'] . '/edit?sign=3')->with(compact('success'));
        } else {
            $error = new MessageBag([
                'title' => '保存失败'
            ]);
            return redirect('admin/forbiddenWord/index/' . $request['id'] . '/edit?sign=3')->with(compact('error'));
        }
    }


    public function editSceneAction($id)
    {
        $data['id'] = $id;
        $scene = ForbiddenSceneWord::SCENE;
        if ($id > 0) {
            $sceneWord = ForbiddenSceneWord::select('*', ['state' => ForbiddenSceneWord::STATE_SUCCESS, 'auti_spam_id' => $id]);
            foreach ($sceneWord as $v) {
                $forbiddenResult = json_decode($v['forbidden_result'], true);
                $data["forbidden_result[" . $v['scene_num'] . "]"] = $forbiddenResult;
                $data["mode" . $v['scene_num']] = $v['operate_mode'];
            }
        }
        $form = new Form($data);
        $form->hidden('id', 'id');
        // 循环场景
        foreach ($scene as $k => $item) {
            $form->text('scene_num_name', '场景')->default($item)->disable();
            $res = ForbiddenSceneWord::SCENE_MAP[$k];
            $form->radio('mode' . $k, '处理方式')
                ->options(ForbiddenAntiSpam::MODE_MAP)
                ->when(ForbiddenAntiSpam::MODE1, function (Form $form) use ($k, $res) {
                    $form->checkbox("forbidden_result[$k]", '')->options($res[ForbiddenAntiSpam::MODE1])->addElementClass('tab')->stacked();
                })
                ->when(ForbiddenAntiSpam::MODE2, function (Form $form) use ($k, $res) {
                    $form->checkbox("forbidden_result[$k]", '')->options($res[ForbiddenAntiSpam::MODE2])->addElementClass('tab')->stacked();
                })
                ->stacked();
        }

        $form->action('/admin/forbiddenWord/sceneWord/index/save');
        return $form;
    }

    public function tab()
    {
        return <<<SCRIPT
           
            $('.tab').parents(".col-sm-8").prev().removeClass("col-sm-2");
            $('.tab').parents(".col-sm-8").prev().addClass("col-sm-3");
SCRIPT;
    }
}