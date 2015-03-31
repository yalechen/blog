<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{

    use DispatchesCommands, ValidatesRequests;

    // // 手机号验证

    // Validator::extend('mobile', function ($attribute, $value, $parameters)
    // {
    // if (preg_match('/^1[3|4|5|7|8][0-9]{9}$/', $value)) {
    // return true;
    // }
    // return false;
    // });

    // // 验证图片。
    // Validator::extend('user_file_mime', function ($attribute, $value, $parameters)
    // {
    // $pids = (array) $value;
    // if ($pids) {
    // $pictures = UserFile::whereIn('id', $pids)->get();
    // if (count($pictures) != count($pids)) {
    // return false;
    // }
    // foreach ($pictures as $picture) {
    // if (! preg_match($parameters[0], $picture->storage->mime)) {
    // return false;
    // }
    // }
    // }
    // return true;
    // });

    // // 验证身份证号码 http://blog.sina.com.cn/s/blog_8c68af43010170rv.html
    // Validator::extend('id_number', function ($attribute, $value, $parameters)
    // {
    // // 15位身份证
    // if (preg_match('/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/', $value)) {
    // return true;
    // }
    // // 18位身份证
    // if (preg_match('/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}(\d|x|X)$/', $value)) {
    // return true;
    // }
    // return false;
    // });

    // // 验证真实姓名
    // Validator::extend('real_name', function ($attribute, $value, $parameters)
    // {
    // if (preg_match('/^[\x{4e00}-\x{9fa5}]{2,4}$/u', $value)) {
    // return true;
    // }
    // return false;
    // });

    // protected function setupCaptcha()
    // {
    // // 注册验证码的验证器。
    // Validator::extend('smsvcode', 'CaptchaController@validateSmsVcode');
    // Validator::extend('emailvcode', 'CaptchaController@validateEmailVcode');

    // // 注册短信验证码宏。
    // Response::macro('smsvcode', function ($mobile)
    // {
    // // 短信验证码数据不使用数据库存储而存放在缓存中。
    // // 定义一个key。
    // $key = 'captcha/' . $mobile;

    // // 检查是否在60秒内进行了重复获取。
    // if (Cache::has($key) && array_get(Cache::get($key), 'expired') > time()) {
    // return Response::make('不能在60内重复获取。', 403);
    // }

    // // 生成一个4位的数字验证码。
    // $vcode = sprintf('%04d', mt_rand(0, 9999));

    // // 如果不是单元测试环境，发送短信到手机。
    // if (! App::runningUnitTests()) {
    // Sms::send($mobile, '您本次操作的验证码为：' . $vcode . '，该验证码10分钟内有效。');
    // }

    // // 将验证码写入缓存中，并设置10分钟的过期时间，1分钟可重设。
    // Cache::put($key, [
    // 'vcode' => $vcode,
    // 'expired' => time() + 60
    // ], 10);

    // // 返回成功信息。
    // return array(
    // 'info' => 'success'
    // );
    // });

    // // 注册邮箱验证码宏
    // Response::macro('emailvcode', function ($email)
    // {
    // // 定义一个存放在缓存中key。
    // $key = 'email_captcha/' . $email;

    // // 检查是否在60秒内进行了重复获取。
    // if (Cache::has($key) && array_get(Cache::get($key), 'expired') > time()) {
    // return Response::make('不能在60内重复获取。', 403);
    // }

    // // 生成一个6位的数字验证码。
    // $vcode = sprintf('%06d', mt_rand(0, 999999));

    // // 如果不是单元测试环境，发送邮件到邮箱。
    // if (! App::runningUnitTests()) {
    // // TODO 使用队列发送。
    // Mail::send('emails.auth.vcode', compact('vcode'), function ($message) use($email)
    // {
    // $message->to($email)->subject('验证码');
    // });
    // }

    // // 将验证码写入缓存中，并设置10分钟的过期时间，1分钟可重设。
    // Cache::put($key, [
    // 'vcode' => $vcode,
    // 'expired' => time() + 60
    // ], 10);

    // // 返回成功信息。
    // return 'success';
    // });
    // }
}
