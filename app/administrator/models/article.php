<?php

/**
 * Films model config
 */
return array(

    'title' => '博文管理',

    'single' => '博文',

    'model' => 'App\Article',

    /**
     * The display columns
     */
    'columns' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key'
        ),
        'title' => array(
            'title' => '标题'
        ),
        'channel' => array(
            'title' => '所属频道',
            'relationship' => 'channel',
            'select' => '(:table).name'
        ),
        'state' => array(
            'title' => '状态',
            'output' => function ($value)
            {
                switch ($value) {
                    case Article::STATE_NORMAL:
                        return '正常';
                }
                return '未知';
            }
        ),
        'sort' => array(
            'title' => '排序'
        ),
        'created_at' => array(
            'title' => '创建时间'
        ),
        'publish_at' => array(
            'title' => '指定发布时间'
        )
    ),

    /**
     * The filter set
     */
    'filters' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key'
        ),
        'title' => array(
            'title' => '标题'
        ),
        'channel' => array(
            'title' => '频道',
            'type' => 'relationship',
            'name_field' => 'name'
        ),
        'state' => array(
            'title' => '状态',
            'type' => 'enum',
            'options' => array(
                Article::STATE_NORMAL => '正常'
            )
        ),
        'summary' => array(
            'title' => '摘要'
        ),
        'content' => array(
            'title' => '正文'
        )
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'editable' => false
        ),
        'title' => array(
            'title' => '标题'
        ),
        'channel' => array(
            'title' => '频道',
            'type' => 'relationship',
            'name_field' => 'name'
        ),
        'state' => array(
            'title' => '状态',
            'type' => 'enum',
            'options' => array(
                Article::STATE_NORMAL => '正常'
            ),
            'visible' => function ($model)
            {
                return $model->exists;
            }
        ),
        'sort' => array(
            'title' => '排序',
            'type' => 'number',
            'value' => '255'
        ),
        'summary' => array(
            'title' => '摘要',
            'type' => 'textarea',
            'limit' => 200,
            'height' => 40
        ),
        'source' => array(
            'title' => '来源',
            'type' => 'text',
            'limit' => 10
        ),
        'content' => array(
            'title' => '正文',
            'type' => 'wysiwyg'
        ),
        'image' => array(
            'title' => '缩略图',
            'type' => 'image',
            'location' => public_path('uploads/thumbs') . '/',
            'sizes' => array(
                array(
                    90,
                    60,
                    'crop',
                    public_path('uploads/thumbs/90x60') . '/',
                    80
                ),
                array(
                    136,
                    100,
                    'crop',
                    public_path('uploads/thumbs/136x100') . '/',
                    80
                ),
                array(
                    220,
                    160,
                    'crop',
                    public_path('uploads/thumbs/220x160') . '/',
                    80
                ),
                array(
                    275,
                    180,
                    'crop',
                    public_path('uploads/thumbs/275x180') . '/',
                    80
                ),
                array(
                    447,
                    270,
                    'crop',
                    public_path('uploads/thumbs/447x270') . '/',
                    80
                ),
                array(
                    500,
                    275,
                    'crop',
                    public_path('uploads/thumbs/500x275') . '/',
                    80
                )
            )
        ),
        'publish_at' => array(
            'title' => '指定发布日期',
            'type' => 'datetime'
        ),
        'relates' => array(
            'title' => '相关文章',
            'type' => 'relationship',
            'name_field' => 'title',
            'constraints' => array(
                'channel' => 'articles'
            )
        ),
        'recommends' => array(
            'title' => '推荐到',
            'type' => 'relationship',
            'name_field' => 'name'
        )
    ),

    /**
     * The sort options for a model
     *
     * @type array
     */
    'sort' => array(
        'field' => 'id',
        'direction' => 'desc'
    ),

    'form_width' => 1000,

    'permission' => function ()
    {
        foreach (Auth::user()->purviews as $purview) {
            list ($model, $method) = explode('.', $purview->key);
            if ($model == 'Article') {
                return true;
            }
        }
        return false;
    },

    'action_permissions' => array(
        'create' => function ($model)
        {
            return array_key_exists(class_basename($model) . '.create', Auth::user()->purviews);
        },
        'update' => function ($model)
        {
            return array_key_exists(class_basename($model) . '.update', Auth::user()->purviews);
        },
        'delete' => function ($model)
        {
            return array_key_exists(class_basename($model) . '.delete', Auth::user()->purviews);
        }
    ),

    'global_actions' => array()
    // 'batch_delete' => array(
    // 'title' => '删除所有',
    // 'confirmation' => '你确定要删除当前筛选下的所有内容？',
    // 'messages' => array(
    // 'active' => '<p>正在删除...</p>',
    // 'success' => '删除完成。',
    // 'error' => '在删除的过程中发生了一个错误！'
    // ),
    // 'action' => function (&$model)
    // {
    // $num = $model->delete();
    // return $num ? '成功删除了 ' . $num . ' 条内容。' : '没有内容被删除。';
    // }
    // )

);