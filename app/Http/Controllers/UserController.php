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
}
