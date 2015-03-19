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

        // 省市县
        $this->call('RegionTableSeeder');
        // 用户
        $this->call('UserTableSeeder');
        // 博文分类
        $this->call('CategoryTableSeeder');
        // 博文、评论、标签
        $this->call('ArticleTableSeeder');
        // 心情
        $this->call('MoodTableSeeder');

        $this->command->info('seed end!');
    }
}