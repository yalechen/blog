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
     * 登录页
     */
    public function getLogin()
    {
        return view('admin.user.login');
    }

    /**
     * 登录处理
     */
    public function postLogin()
    {
        // 验证输入。
        $validator = Validator::make(Input::all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withMessageError($validator->messages()
                ->first());
        }

        // 登录验证。
        if (! Auth::attempt([
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ], Input::get('remember_me', 'false') == 'true')) {
            return Redirect::back()->withMessageError('账号与密码不匹配。');
        }

        $user = Auth::user();
        $user->prev_login_time = $user->last_login_time;
        $user->last_login_time = new Carbon();
        $user->save();

        return view('admin.index');
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
            //return Response::make($validator->messages()->first(), 402);
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
