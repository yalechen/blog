<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Purview;
use Illuminate\Support\Facades\DB;

class PurviewTableSeeder extends Seeder
{

    // 权限数据
    protected $purviews = [
        'Admin.auth' => '访问后台',
        'Category.view' => '查看频道',
        'Category.create' => '创建频道',
        'Category.update' => '编辑频道',
        'Category.delete' => '删除频道',
        'Article.view' => '查看文章',
        'Article.create' => '发布文章',
        'Article.update' => '编辑文章',
        'Article.delete' => '删除文章',
        'Mood.view' => '查看心情',
        'Mood.create' => '发布心情',
        'Mood.update' => '编辑心情',
        'Mood.delete' => '删除心情',
        'User.view' => '查看用户',
        'User.create' => '创建用户',
        'User.update' => '编辑用户',
        'User.delete' => '删除用户',
        'Role.view' => '查看角色',
        'Role.create' => '创建角色',
        'Role.update' => '编辑角色',
        'Role.delete' => '删除角色',
        'Message.view' => '查看留言',
        'Message.create' => '创建留言',
        'Message.update' => '编辑留言',
        'Message.delete' => '删除留言'
    ];

    /**
     * 创建权限列表
     */
    public function createPurviews()
    {
        foreach ($this->purviews as $key => $description) {
            $purview = new Purview();
            $purview->key = $key;
            $purview->description = $description;
            $purview->save();
            $this->purviews[$key] = $purview->id;
        }
    }

    public function run()
    {
        // 清空表数据
        Purview::truncate();
        DB::table('role_purviews')->truncate();

        // 创建权限
        $this->createPurviews();

        // 对超级管理员设置所有权限
        $purviews = array();
        foreach ($this->purviews as $purview) {
            $purviews[] = $purview;
        }
        Role::find(1)->purviews()->sync($purviews);

        // 对博主设置部分权限
        $purviews = array();
        $purviews[] = $this->purviews['Admin.auth'];
        $purviews[] = $this->purviews['Category.view'];
        $purviews[] = $this->purviews['Category.create'];
        $purviews[] = $this->purviews['Category.update'];
        $purviews[] = $this->purviews['Category.delete'];
        $purviews[] = $this->purviews['Article.view'];
        $purviews[] = $this->purviews['Article.create'];
        $purviews[] = $this->purviews['Article.update'];
        $purviews[] = $this->purviews['Article.delete'];
        $purviews[] = $this->purviews['Mood.view'];
        $purviews[] = $this->purviews['Mood.create'];
        $purviews[] = $this->purviews['Mood.update'];
        $purviews[] = $this->purviews['Mood.delete'];
        $purviews[] = $this->purviews['Message.view'];
        $purviews[] = $this->purviews['Message.create'];
        $purviews[] = $this->purviews['Message.update'];
        $purviews[] = $this->purviews['Message.delete'];
        Role::find(2)->purviews()->sync($purviews);
    }
}