<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use Validator;
use Response;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class UserController extends Controller
{

    /**
     * 登录页面
     */
    public function getLogin()
    {
        return view('admin.user.login');
    }

    /**
     * 登录处理[邮箱和用户名都可以登录]
     */
    public function postLogin()
    {
        // 验证输入。
        $validator = Validator::make(Input::all(), [
            'email' => 'required',
            'password' => 'required|between:6,16',
            'remember_me' => 'in:true,false'
        ]);
        // 验证是否为邮箱
        $is_email = (boolean) preg_match('/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/i', Input::get('email'));

        $validator->sometimes('email', [
            'exists:users,email'
        ], function ($input) use($is_email)
        {
            return $is_email;
        });
        $validator->sometimes('email', [
            'exists:users,name'
        ], function ($input) use($is_email)
        {
            return ! $is_email;
        });
        if ($validator->fails()) {
            return Redirect::back()->withMessageError($validator->messages()
                ->first())
                ->withInput();
        }

        // 登录验证。
        if (! Auth::attempt([
            $is_email ? 'email' : 'name' => Input::get('email'),
            'password' => Input::get('password')
        ], Input::get('remember_me', 'false') == 'true')) {
            return Redirect::back()->withMessageError('账号与密码不匹配。')->withInput();
        }

        $user = Auth::user();
        $user->prev_login_time = $user->last_login_time;
        $user->last_login_time = new Carbon();
        $user->save();

        // 登录成功
        return Redirect::intended();
    }

    /**
     * 退出登录状态
     */
    public function logout()
    {
        // 退出系统
        Auth::logout();
        return Redirect::route('AdminIndex');
    }

    /**
     * 注册博主帐号
     */
    public function postRegister()
    {
        dd(Input::all());
    }

    /**
     * Admin,修改个人资料
     */
    public function edit()
    {
        return view('user.edit')->withData(Auth::user());
    }

    /**
     * Admin,保存个人资料
     */
    public function save()
    {
        // 验证输入。
        $validator = Validator::make(Input::all(), [
            'name' => 'required|unique:users,name',
            'nickname' => 'required|unique:users,nickname',
            'realname' => 'realname',
            'mobile' => 'mobile',
            'province_id' => 'required|exists:province,id',
            'city_id' => 'required|exists:city,id',
            'signature' => 'required'
        ]);

        if ($validator->fails()) {
            // return Response::make($validator->messages()->first(), 402);
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = Auth::user();
        $user->name = Input::get('name');
        $user->nickname = Input::get('nickname');
        $user->realname = Input::get('realname', '');
        $user->mobile = Input::get('mobile', '');
        $user->province_id = Input::get('province_id', 0);
        $user->city_id = Input::get('city_id', 0);
        $user->signature = Input::get('signature', 0);
        $user->save();

        return 'success';
    }
}
