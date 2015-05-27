<?php
namespace App\Http\Controllers;

use Validator;
use Response;

/**
 * 验证码控制器
 */
class CaptchaController extends BaseController
{

    /**
     * 获取短信验证码
     *
     * @param string $mobile
     */
    public function getSmsVcode()
    {
        // 验证输入。
        $validator = Validator::make(Input::all(), array(
            'mobile' => 'required|mobile'
        ), array(
            'mobile.required' => '手机号不能为空',
            'mobile.mobile' => '手机号格式不正确'
        ));

        if ($validator->fails()) {
            return Response::make($validator->messages()->first(), 402);
        }

        // 调用短信验证码宏，发送短信验证码。
        return Response::smsvcode(Input::get('mobile'));
    }

    /**
     * 短信验证码的验证规则
     *
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     * @param Validator $validator
     */
    public function validateSmsVcode($attribute, $value, $parameters, $validator)
    {
        // 取出要验证的手机号。
        $mobile = array_get($validator->getData(), isset($parameters[0]) ? $parameters[0] : 'mobile');

        // 计算缓存的key。
        $key = 'captcha/' . $mobile;

        // 取出验证码，并与输入进行比较。
        $sms = Cache::get($key);

        if ($value == $sms['vcode']) {
            // 删除缓存。
            if (! empty($parameters[1]) && $parameters[1] == 'final') {
                Cache::forget($key);
            }
            return true;
        }
        return false;
    }

    /**
     * 发送邮箱验证码
     *
     * @param string $email
     */
    public function getEmailVcode()
    {
        // 验证输入。
        $validator = Validator::make(Input::all(), array(
            'email' => 'required|email'
        ), array(
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确'
        ));
        if ($validator->fails()) {
            return Response::make($validator->messages()->first(), 402);
        }
        // 调用短信验证码宏，发送短信验证码。
        return Response::emailvcode(Input::get('email'));
    }

    /**
     * 邮箱验证码的验证规则
     *
     * @param string $attribute
     * @param string $value
     * @param array $parameters
     * @param Validator $validator
     */
    public function validateEmailVcode($attribute, $value, $parameters, $validator)
    {
        // 取出要验证的手机号。
        $email = array_get($validator->getData(), isset($parameters[0]) ? $parameters[0] : 'email');

        // 计算缓存的key。
        $key = 'email_captcha/' . $email;

        // 取出验证码，并与输入进行比较。
        $email_vcode = Cache::get($key);
        if (trim($value) == $email_vcode['vcode']) {
            // 删除缓存。
            if (! empty($parameters[1]) && $parameters[1] == 'final') {
                Cache::forget($key);
            }
            return true;
        }
        return false;
    }

    /**
     * 验证短信码
     *
     * @author jois
     */
    public function checkSmsVcode()
    {
        $validator = Validator::make(Input::all(), [
            'mobile' => 'required|mobile',
            'vcode' => 'required|smsvcode'
        ], [
            'mobile.required' => '手机号不能为空',
            'mobile.mobile' => '手机号格式不正确',
            'vcode.required' => '短信验证码不能为空',
            'vcode.smsvcode' => '短信验证码不正确'
        ]);

        if ($validator->fails()) {
            return Response::make($validator->messages()->first(), 402);
        }

        return array(
            'info' => 'success'
        );
    }
}
