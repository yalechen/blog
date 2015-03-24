<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Mood;

class MoodTableSeeder extends Seeder
{

    public function run()
    {
        // 清空心情表数据
        Mood::truncate();

        // 创建博文分类
        $data = array(
            array(
                'content' => '心情很糟糕',
                'images' => [
                    'fa24a612110135f42e8a3b1ec5db9239',
                    '6335184992d848f341a2aa83cf1fb277'
                ],
                'sub' => array(
                    array(
                        'content' => '为什么心情糟糕啊',
                        'sub' => array(
                            array(
                                'content' => '没有为什么，就是觉得糟糕而已',
                                'sub' => array()
                            )
                        )
                    ),
                    array(
                        'content' => '去唱歌发泄吧',
                        'sub' => array(
                            array(
                                'content' => '哇，那一定要叫上我啊，我也想去',
                                'sub' => array(
                                    array(
                                        'content' => '好啊，有去的时候再叫你，你必须得在',
                                        'sub' => array()
                                    )
                                )
                            ),
                            array(
                                'content' => '嗯嗯，不过你是歌霸，不敢跟你一起',
                                'sub' => array()
                            )
                        )
                    ),
                    array(
                        'content' => '做一些开心的事情',
                        'sub' => array()
                    )
                )
            ),
            array(
                'content' => '我喜欢她，她竟然也喜欢我',
                'images' => [
                    'fa24a612110135f42e8a3b1ec5db9239'
                ],
                'sub' => array(
                    array(
                        'content' => '恭喜恭喜',
                        'sub' => array()
                    ),
                    array(
                        'content' => '哈哈，在一起在一起',
                        'sub' => array()
                    )
                )
            )
        );

        // 添加以上心情数据
        $this->addData($data);
    }

    // 递归方法
    protected function addData($data, $parent_id = 0)
    {
        if ($parent_id == 0) {
            foreach (User::all() as $user) {
                foreach ($data as $item) {
                    $mood = new Mood();
                    $mood->user()->associate($user);
                    $mood->content = $user->name . "：" . $item['content'];
                    $mood->parent_id = $parent_id;
                    $mood->save();
                    // 添加图片
                    if (isset($item['images'])) {
                        $mood->images()->attach($item['images']);
                    }

                    $this->addData($item['sub'], $mood->id);
                }
            }
        } else {
            foreach ($data as $item) {
                $user = User::find(mt_rand(1, 2));
                $mood = new Mood();
                $mood->user()->associate($user);
                $mood->content = $user->name . "：" . $item['content'];
                $mood->parent_id = $parent_id;
                $mood->save();
                // 添加图片
                if (isset($item['images'])) {
                    $mood->images()->attach($item['images']);
                }

                $this->addData($item['sub'], $mood->id);
            }
        }
    }
}