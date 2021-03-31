<?php

namespace Modules\WoChuang\Controllers;

use App\Http\Controllers\Controller;
use App\Model\CustomPage;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{

    /**
     * 列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(Request $request)
    {
        $url = $request->getRequestUri();
        $prefix = 'front/woChuang';
        $uri = substr($url, 15);
        $page = CustomPage::where(['prefix' => $prefix, 'uri' => $uri])->first();
        if (!empty($page)) {
            $page = $page->toArray();
            $content = $page['content'];
        } else {
            $content = '';
        }
        return View('woChuang.web.page', compact('content'));
    }



}
