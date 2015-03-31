<?php /* Smarty version 3.1.22-dev/17, created on 2015-03-31 03:40:32
         compiled from "D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/_layout/navbar-left-menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:26254551a1730bbcbd1_48317848%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2abc02198fab94d1a71552713341ce0c9dcea225' => 
    array (
      0 => 'D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/_layout/navbar-left-menu.tpl',
      1 => 1427773229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26254551a1730bbcbd1_48317848',
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/17',
  'unifunc' => 'content_551a1730bfb3e9_71281572',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_551a1730bfb3e9_71281572')) {
function content_551a1730bfb3e9_71281572 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '26254551a1730bbcbd1_48317848';
?>
<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
          <li><a href="<?php echo route('AdminIndex');?>
"> 控制台</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 下拉菜单<i class="icon-caret-down small"></i></a>
            <ul class="dropdown-menu">
              <li>
                <a href="#">
                  <i class="icon-user">
                  </i>
                  实例#1
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="icon-calendar">
                  </i>
                  实例#2
                </a>
              </li>
              <li class="divider">
              </li>
              <li>
                <a href="#">
                  <i class="icon-tasks">
                  </i>
                  实例#3
                </a>
              </li>
            </ul>
          </li>
        </ul><?php }
}
?>