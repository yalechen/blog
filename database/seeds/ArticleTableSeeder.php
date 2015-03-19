<?php
use Illuminate\Database\Seeder;
use App\Article;
use App\User;
use App\Category;
use App\Tag;
use App\ArticleTag;
use App\Comment;

class ArticleTableSeeder extends Seeder
{

    public function run()
    {
        // 清空博文表数据
        Article::truncate();

        // 清空标签表
        Tag::truncate();
        ArticleTag::truncate();

        // 清空评论表
        Comment::truncate();

        // 遍历用户填充博文
        $users = User::all();
        $pmonths = [
            '201411',
            '201412',
            '201501',
            '201502'
        ];

        // 标签列表
        $tags = [
            '工作',
            '日志',
            '感情',
            '伤感',
            '音乐',
            '书籍',
            'DIY',
            '星座',
            '设计',
            '旅行',
            '壁纸',
            '节日',
            '百科',
            '搞笑',
            '宠物',
            '家居',
            '生活',
            '烹饪',
            'php',
            'laravel',
            'smarty',
            'unit_test',
            'cache',
            'redis',
            'curl',
            'file',
            '正则',
            'sql',
            'mysql',
            'css',
            'js',
            'jq',
            'zend',
            'linux',
            'xshell'
        ];

        foreach ($users as $user) {
            // 非顶级分类
            $category_ids = Category::whereUserId($user->id)->where('parent_path', '<>', '')->lists('id');
            if (! empty($category_ids)) {
                $num = mt_rand(35, 50);
                for ($i = 0; $i <= $num; $i ++) {
                    $category_id = array_rand(array_flip($category_ids));
                    // 新增用户博文
                    $article = new Article();
                    $article->user()->associate($user);
                    $article->pmonth = $pmonths[mt_rand(0, 3)];
                    $article->title = $user->name . '的博文标题' . $i;
                    $article->content = $user->name . '的博文内容' . $i;
                    $article->category()->associate(Category::find($category_id));
                    $article->save();

                    // 生成几条随机评论
                    for ($j = mt_rand(3, 10); $j > 0; $j --) {
                        $comment = new Comment();
                        $comment->content = '博文' . $i . '的测试评论' . $j;
                        $comment->article_id = $article->id;
                        $comment->save();
                    }

                    // 新增用户标签
                    $article_tags = array_rand(array_flip($tags), mt_rand(1, 5));
                    if (is_array($article_tags)) {
                        foreach ($article_tags as $value) {
                            $tag = Tag::whereUserId($user->id)->whereName($value)->first();
                            if (is_null($tag)) {
                                $tag = new Tag();
                                $tag->user_id = $user->id;
                                $tag->name = $value;
                                $tag->save();
                            }

                            // TODO:ArticleTag模型事件中添加此功能，但无法执行到，有可能是$article->tags()->save($tag)和attach此种写法调用不到
                            // $article->tags()->save($tag);
                            // $article->tags()->attach($tag->id);

                            // 新增文章标签
                            $article_tags = new ArticleTag();
                            $article_tags->article()->associate($article);
                            $article_tags->tag()->associate($tag);
                            $article_tags->save();
                        }
                    }
                }
            }
        }
    }
}