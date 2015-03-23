<?php
/**
 * Films model config
 */
return array(

    'title' => '用户管理',

    'single' => '用户',

    'model' => 'App\User',

    /**
     * The display columns
     */
    'columns' => array(
        'id' => [
            'title' => 'ID',
            'type' => 'key'
        ],
        'name' => [
            'title' => '用户名'
        ],
        'email' => [
            'title' => '邮箱'
        ],
        'mobile' => [
            'title' => '手机'
        ],
        'avatar' => [
            'title' => '头像',
            'output' => '<img src="/uploads/homepagesliders/resize/(:value)" height="50" />'
        ],
        'province' => [
            'title' => '省份',
            'relationship' => 'province',
            'select' => '(:table).name'
        ],
        'city' => [
            'title' => '城市',
            'relationship' => 'city',
            'select' => '(:table).name'
        ]
    ),

    /**
     * The filter set
     */
    'filters' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key'
        ),
        'name' => array(
            'title' => '用户名'
        ),
        'email' => array(
            'title' => '邮箱'
        ),
        'mobile' => array(
            'title' => '手机'
        )
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key'
        ),
        'name' => array(
            'title' => '用户名'
        ),
        'email' => array(
            'title' => '邮箱',
            'editable' => false,
        ),
        'mobile' => array(
            'title' => '手机'
        ),
        'password' => array(
            'title' => '密码',
            'type' => 'password'
        ),
        'avatar' => array(
            'title' => '头像 (200 x 200)',
            'type' => 'image',
            'naming' => 'random',
            'location' => public_path('uploads/thumbs') . '/',
            'size_limit' => 2,
            'sizes' => array(
                array(
                    200,
                    200,
                    'crop',
                    public_path('uploads/thumbs/200x200') . '/',
                    100
                ),
                array(
                    100,
                    100,
                    'crop',
                    public_path('uploads/thumbs/100x100') . '/',
                    100
                ),
                array(
                    100,
                    100,
                    'crop',
                    public_path('uploads/thumbs/50x50') . '/',
                    100
                )
            )
        ),
        'province' => array(
            'title' => 'Province',
            'type' => 'relationship'
        ),
        'city' => array(
            'title' => 'City',
            'type' => 'relationship'
        )
    ),

    'rules' => array(
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|between:6,16'
    ),

    'form_width' => 500,

    'permission' => function ()
    {
        foreach (Auth::user()->purviews as $purview) {
            list ($model, $method) = explode('.', $purview->key);
            if ($model == 'User') {
                return true;
            }
        }
        return false;
    },

    'action_permissions' => array(
        'create' => function ($model)
        {
            return true;
        },
        'update' => function ($model)
        {
            return true;
        },
        'delete' => function ($model)
        {
            return true;
        },
        'view' => function ($model)
        {
            return true;
        }
    )
);