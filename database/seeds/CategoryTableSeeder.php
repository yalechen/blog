<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Category;

class CategoryTableSeeder extends Seeder
{

    /**
     * 博文分类填充
     */
    public function run()
    {
        Category::truncate();

        // 创建博文分类
        $data = array(
            array(
                'name' => 'PHP',
                'sub_categorys' => array(
                    array(
                        'name' => '面向对象',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '静态化',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '优化',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '异常处理',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '加密',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '正则',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '日期时间',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '字符串',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '文件',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'CURL',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '缓存',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'Others',
                        'sub_categorys' => array()
                    )
                )
            ),
            array(
                'name' => 'Mysql',
                'sub_categorys' => array(
                    array(
                        'name' => '知识点',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '优化',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'SQL',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'Console',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'Others',
                        'sub_categorys' => array()
                    )
                )
            ),
            array(
                'name' => '前端',
                'sub_categorys' => array(
                    array(
                        'name' => 'JS+JQ',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'CSS',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'Others',
                        'sub_categorys' => array()
                    )
                )
            ),
            array(
                'name' => 'IT综合体',
                'sub_categorys' => array(
                    array(
                        'name' => '程序思想',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '互联网的那些事儿',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'Others',
                        'sub_categorys' => array()
                    )
                )
            ),
            array(
                'name' => '开发工具',
                'sub_categorys' => array(
                    array(
                        'name' => 'Laravel',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'Zend',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'Git&SVN',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'Smarty',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '插件应用',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'Others',
                        'sub_categorys' => array()
                    )
                )
            ),
            array(
                'name' => 'Linux',
                'sub_categorys' => array(
                    array(
                        'name' => '基础篇',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => '架构篇',
                        'sub_categorys' => array()
                    ),
                    array(
                        'name' => 'Others',
                        'sub_categorys' => array()
                    )
                )
            ),
            array(
                'name' => '私人日志',
                'sub_categorys' => array()
            ),
            array(
                'name' => '杂七杂八(转载)',
                'sub_categorys' => array()
            )
        );

        // 添加博文分类列表
        $this->addCateGory($data);
    }

    protected function addCateGory($data, $parent_id = 0)
    {
        foreach (User::all() as $user) {
            foreach ($data as $item) {
                $category = new Category();
                $category->user()->associate($user);
                $category->name = $item['name'];
                $category->parent_id = $parent_id;
                $category->save();

                $this->addCateGory($item['sub_categorys'], $category->id);
            }
        }
    }
}