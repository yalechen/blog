<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use Validator;
use Response;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Province;
use App\User;
use Request;

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
        return Redirect::route('AdminIndex');
        // return Redirect::intended();
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
     * 博主列表
     */
    public function getList()
    {
        return view('admin.user.list')->withData(User::all());
    }

    /**
     * Admin,修改个人资料
     */
    public function edit()
    {
        return view('admin.user.edit')->withData(User::find(Input::get('id', 0)))
            ->withId(Input::get('id'))
            ->withProvinces(Province::all());
    }

    /**
     * Admin,保存个人资料
     */
    public function save()
    {
        // 验证输入。
        $validator = Validator::make(Input::all(), [
            'email' => 'required|unique:users,email,' . Input::get('id', 0),
            'password' => 'required_without:id',
            'name' => 'required|unique:users,name,' . Input::get('id', 0),
            'nickname' => 'required|unique:users,nickname,' . Input::get('id', 0),
            'realname' => 'realname',
            'mobile' => 'required|mobile',
            'province_id' => 'required|exists:province,id',
            'city_id' => 'required|exists:city,id',
            'signature' => 'required'
        ], [
            'name.required' => '用户名不能为空',
            'name.unique' => '用户名已经存在'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withMessageError($validator->errors()
                ->all());
        }
        // 保存数据
        $user = Input::has('id') ? User::find(Input::get('id')) : new User();
        $user->email = Input::get('email');
        if (Input::has('password')) {
            $user->password = Input::get('password');
        }
        $user->name = Input::get('name');
        $user->nickname = Input::get('nickname');
        $user->realname = Input::get('realname');
        $user->mobile = Input::get('mobile');
        $user->province_id = Input::get('province_id', 0);
        $user->city_id = Input::get('city_id', 0);
        $user->signature = Input::get('signature');
        $user->save();

        // 结果返回
        return redirect()->back()->withMessageSuccess('Success');
    }

    /**
     * 删除博主
     */
    public function delete()
    {
        // 验证数据。
        $validator = Validator::make(Input::all(), [
            'id' => 'required|exists:users,id'
        ], [
            'id.required' => '删除的博主不能为空',
            'id.exists' => '删除的博主不存在'
        ]);
        if ($validator->fails()) {
            return Response::make($validator->messages()->first(), 402);
        }

        // 删除博主
        $ids = (array) Input::get('id');
        User::whereIn('id', $ids)->delete();

        // 结果返回
        return 'success';
    }
}
