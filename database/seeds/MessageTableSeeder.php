<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Message;

class MessageTableSeeder extends Seeder
{

    public function run()
    {
        // 清空留言表数据
        Message::truncate();

        // 给每个用户随机填充10-20条留言
        foreach (User::all() as $user) {
            for ($i = 1; $i < mt_rand(10, 20); $i ++) {
                $message = new Message();
                $message->user()->associate($user);
                $message->content = '给' . $user->name . "的留言{$i}";
                $message->email = str_random(mt_rand(5, 10)) . '@163.com';
                $message->save();
            }
        }
    }
}