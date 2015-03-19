<?php
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        // 清空表数据
        User::truncate();

        // 填充测试用户
        $user = new User();
        $user->name = '长江一号';
        $user->email = 'wxychenzhijiang@163.com';
        $user->mobile = '13799475827';
        $user->password = '123456';
        $user->province_id = 13;
        $user->city_id = 105;
        $user->region_name = '福建省 厦门市';
        $user->signature = 'dont let your dreams be dreams';
        $user->save();

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
    }
}