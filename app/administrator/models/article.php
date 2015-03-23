<?php
use App\Article;
use Illuminate\Support\Facades\Auth;
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
        /* 'category' => array(
            'title' => '所属分类',
            'relationship' => 'category',
            'select' => '(:table).name'
        ), */
        'user' => array(
            'title' => '作者',
            'relationship' => 'category',
            'select' => '(:table).name'
        ),
        'is_hot' => array(
            'title' => '是否置顶',
            'output' => function ($value)
            {
                switch ($value) {
                    case Article::HOT_YES:
                        return '是';
                }
                return '否';
            }
        ),
        'is_public' => array(
            'title' => '是否公开',
            'output' => function ($value)
            {
                switch ($value) {
                    case Article::PUBLIC_YES:
                        return '是';
                }
                return '否';
            }
        ),
        'is_becomment' => array(
            'title' => '是否可被评论',
            'output' => function ($value)
            {
                switch ($value) {
                    case Article::COMMENT_YES:
                        return '是';
                }
                return '否';
            }
        ),
        'created_at' => array(
            'title' => '创建时间',
            'type' => 'wysiwyg'
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
        'category' => array(
            'title' => '分类',
            'type' => 'relationship',
            'name_field' => 'name'
        ),
        'is_hot' => array(
            'title' => '是否置顶',
            'type' => 'enum',
            'options' => array(
                Article::HOT_YES => '是',
                Article::HOT_NO => '否'
            )
        ),
        'is_public' => array(
            'title' => '是否公开',
            'type' => 'enum',
            'options' => array(
                Article::PUBLIC_YES => '是',
                Article::PUBLIC_NO => '否'
            )
        ),
        'is_becomment' => array(
            'title' => '是否可被评论',
            'type' => 'enum',
            'options' => array(
                Article::COMMENT_YES => '是',
                Article::COMMENT_NO => '否'
            )
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
        'category' => array(
            'title' => '分类',
            'type' => 'relationship',
            'name_field' => 'name'
        ),
        'is_hot' => array(
            'title' => '是否置顶',
            'type' => 'enum',
            'options' => array(
                Article::HOT_YES => '是',
                Article::HOT_NO => '否'
            ),
            'visible' => function ($model)
            {
                return $model->exists;
            }
        ),
        'is_public' => array(
            'title' => '是否公开',
            'type' => 'enum',
            'options' => array(
                Article::PUBLIC_YES => '是',
                Article::PUBLIC_NO => '否'
            ),
            'visible' => function ($model)
            {
                return $model->exists;
            }
        ),
        'is_becomment' => array(
            'title' => '是否可被评论',
            'type' => 'enum',
            'options' => array(
                Article::COMMENT_YES => '是',
                Article::COMMENT_NO => '否'
            ),
            'visible' => function ($model)
            {
                return $model->exists;
            }
        ),
        'content' => array(
            'title' => '正文',
            'type' => 'wysiwyg'
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
    'actions' => array(
        'order_up' => array(
            'title' => 'Order Up',
            'messages' => array(
                'active' => 'Reordering...',
                'success' => 'Reordered',
                'error' => 'There was an error while reordering'
            ),
            'permission' => function ($model)
            {
                return $model->user_id == Auth::user()->id;
            },
            // the model is passed to the closure
            'action' => function ($model)
            {
                // get all the items of this model and reorder them
                $model->orderUp();
            }
        )
    ),
    'global_actions' => array()
);

