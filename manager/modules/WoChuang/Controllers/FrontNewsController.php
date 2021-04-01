<?php

namespace Modules\WoChuang\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class FrontNewsController extends Controller
{

    /**
     * 列表
     * @param Request $request
     * @return Factory|View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $client = new Client([
            'base_uri' => "https://m.juejinqifu.com/",
            'timeout' => 3
        ]);
        // GET请求参数
        $headers = [
            'user-agent' => 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Mobile Safari/537.36',
            'Host' => 'm.juejinqifu.com'
        ];
        $params = [
            'query' => ['offset' => '0', 'limit' => 30, 'type' => 3],
            'headers' => $headers,
        ];
        try {
            $response = $client->request('GET', 'information/ajax-data.html', $params);
            $responseData = $response->getBody()->getContents();
            $data = json_decode($responseData, true);
        } catch (GuzzleException $e) {
            throw new \Exception(sprintf('请求异常：%s', $e->getMessage()));
        }

        return View('woChuang.web.news', compact('data'));
    }


}
