<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Purview;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        // 清空表数据
        Role::truncate();
        User::truncate();
        DB::table('user_roles')->truncate();

        // 新增超级管理员和博主两种角色
        $role = new Role();
        $role->key = 'adminstrator';
        $role->name = '超级管理员';
        $role->save();

        $role = new Role();
        $role->key = 'manager';
        $role->name = '博主';
        $role->save();

        // 填充测试用户，并赋予角色
        $user = new User();
        $user->name = '超级管理员';
        $user->email = 'wxychenzhijiang@163.com';
        $user->mobile = '13799475827';
        $user->password = '123456';
        $user->province_id = 13;
        $user->city_id = 105;
        $user->region_name = '福建省 厦门市';
        $user->signature = 'dont let your dreams be dreams';
        $user->save();
        $user->roles()->attach(1);

        $user = new User();
        $user->name = '莫名';
        $user->email = '282560335@qq.com';
        $user->mobile = '15959018086';
        $user->password = '123456';
        $user->province_id = 13;
        $user->city_id = 105;
        $user->region_name = '福建省 厦门市';
        $user->signature = '路，没有错的，错的只是选择。爱，没有错的，错的只是缘分。';
        $user->save();
        $user->roles()->attach(2);
    }
}