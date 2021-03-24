<?php


namespace App\Helper;


class Tool
{
    /**
     * @param int $code
     * @param array $data
     * @param string $msg
     * @return false|string
     */
    public static function ajaxReturn($code, $data, $msg = '')
    {
        $code = $code ? : 200;
        $data = $data ? : [];
        $msg = $msg ? : '';
        return json_encode(['code' =>$code, 'data' =>$data, 'msg' => $msg]);
    }
}
