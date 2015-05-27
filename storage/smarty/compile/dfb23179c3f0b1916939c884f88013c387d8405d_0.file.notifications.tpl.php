<?php /* Smarty version 3.1.22-dev/17, created on 2015-03-31 01:33:30
         compiled from "D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/_layout/notifications.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:318475519f96ae761f5_42207704%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfb23179c3f0b1916939c884f88013c387d8405d' => 
    array (
      0 => 'D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/_layout/notifications.tpl',
      1 => 1427698508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '318475519f96ae761f5_42207704',
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/17',
  'unifunc' => 'content_5519f96aeb30f9_27052879',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5519f96aeb30f9_27052879')) {
function content_5519f96aeb30f9_27052879 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '318475519f96ae761f5_42207704';
?>
<ul class="notifications demo-slide-in">
            <li style="display: none;">
              <div class="col-left">
                <span class="label label-danger">
                  <i class="icon-warning-sign"></i>
                </span>
              </div>
              <div class="col-right with-margin">
                <span class="message">
                  服务器
                  <strong>
                    #512
                  </strong>
                  crashed.
                </span>
                <span class="time">
                  几分钟之前
                </span>
              </div>
            </li>
            <li style="display: none;">
              <div class="col-left">
                <span class="label label-info">
                  <i class="icon-envelope">
                  </i>
                </span>
              </div>
              <div class="col-right with-margin">
                <span class="message">
                  <strong>
                    John
                  </strong>
                  发了条消息给你
                </span>
                <span class="time">
                  几分钟之前
                </span>
              </div>
            </li>
            <li>
              <div class="col-left">
                <span class="label label-success">
                  <i class="icon-plus">
                  </i>
                </span>
              </div>
              <div class="col-right with-margin">
                <span class="message">
                  <strong>
                    Emma
                  </strong>
                  账号已经创建
                </span>
                <span class="time">
                  4小时以前
                </span>
              </div>
            </li>
          </ul><?php }
}
?>