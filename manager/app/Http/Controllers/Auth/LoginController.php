<?php

namespace App\Http\Controllers\Auth;

use App\Helper\Logger;
use App\Helper\RedisKeys;
use App\Helper\Tool;
use App\Http\Controllers\Controller;
use Encore\Admin\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function verifyCode()
    {
        // 随机生成4位数字存入redis，发送邮件给登录者
        $number  = rand(1000,9999);
        if (!$username = Input::get('username')) {
            return Tool::ajaxReturn(400, []);
        }
        Mail::raw("你好，你的的账号{$username}验证码是{$number}", function ($message) use ($username) {
            $to = $username;
            $message ->to($to)->subject('登录验证码');
        });
        if (!empty(Mail::failures())) {
            Logger::error('验证码发送失败',["账号{$username}验证码是{$number}"]);
        }
        Redis::hset(RedisKeys::VERIFY_CODE, $username, $number);
        Logger::info('verify-code', [$username, $number]);
        return Tool::ajaxReturn(200, []);
    }
}
