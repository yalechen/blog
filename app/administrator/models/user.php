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
            'title' => '邮箱'
        ),
        'mobile' => array(
            'title' => '手机'
        ),
        'password' => array(
            'title' => '密码',
            'type' => 'password'
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
        return true;
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