<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->info('seed start!');

        // 省市县
        $this->call('RegionTableSeeder');
        // 用户、角色
        $this->call('UserTableSeeder');
        // 权限
        $this->call('PurviewTableSeeder');
        // 博文分类
        $this->call('CategoryTableSeeder');
        // 博文、评论、标签
        $this->call('ArticleTableSeeder');
        // 心情
        $this->call('MoodTableSeeder');
        // 留言
        $this->call('MessageTableSeeder');
        // 文件
        $this->call('StorageTableSeeder');

        $this->command->info('seed end!');
    }
}