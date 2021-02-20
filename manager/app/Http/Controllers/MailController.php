<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function send()
    {
//        $name = '学院君';
//        Mail::send('emails.test',['name'=>$name],function($message){
//            $to = '1072155122@qq.com';
//            $message ->to($to)->subject('测试邮件');
//        });

        Mail::raw('这是一封测试邮件', function ($message) {
            $to = 'jindaoyiwu@163.com';
            $message ->to($to)->subject('测试邮件');
        });
        if (empty(Mail::failures())) {
            echo '发送邮件成功，请查收！';
        } else {
            echo '发送邮件失败，请重试！';
        }
    }
}
