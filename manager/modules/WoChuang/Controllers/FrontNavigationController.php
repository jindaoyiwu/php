<?php

namespace Modules\WoChuang\Controllers;

use App\Http\Controllers\Controller;
use App\Model\KvStore;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;


class FrontNavigationController extends Controller
{

    /**
     * 列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(Request $request)
    {
        $line = KvStore::where(['module'=>'wochuang', 'keys'=>'navigation'])->first()->toArray();
        $data = $line['value'];
        return View('woChuang.web.navigation', compact('data'));
    }



}
