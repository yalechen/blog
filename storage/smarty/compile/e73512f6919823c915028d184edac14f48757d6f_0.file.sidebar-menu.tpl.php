<?php /* Smarty version 3.1.22-dev/17, created on 2015-03-31 03:01:55
         compiled from "D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/_layout/sidebar-menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:608551a0e23883830_35687841%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e73512f6919823c915028d184edac14f48757d6f' => 
    array (
      0 => 'D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/_layout/sidebar-menu.tpl',
      1 => 1427770877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '608551a0e23883830_35687841',
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/17',
  'unifunc' => 'content_551a0e2388f3b7_50254658',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_551a0e2388f3b7_50254658')) {
function content_551a0e2388f3b7_50254658 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '608551a0e23883830_35687841';
?>
<ul id="nav">
	<li class="current">
		<a href="<?php echo route('AdminIndex');?>
"><i class="icon-dashboard"></i>控制台</a>
	</li>
	<li>
		<a href="javascript:void(0);"><i class="icon-desktop"></i> 设置
			<span class="label label-info pull-right">4</span>
        </a>
        <ul class="sub-menu">
        	<li><a href="ui_buttons.html"><i class="icon-angle-right"></i>个人资料</a></li>
			<li><a href="ui_general.html"><i class="icon-angle-right"></i>头像设置</a></li>
            <li><a href="ui_tabs_accordions.html"><i class="icon-angle-right"></i>修改密码 </a></li>
            <li><a href="ui_sliders.html"><i class="icon-angle-right"></i>权限设置</a></li>
        </ul>
	</li>
	<li>
		<a href="javascript:void(0);"><i class="icon-edit"></i> 博文管理</a>
		<ul class="sub-menu">
			<li><a href="form_layouts.html"><i class="icon-angle-right"></i>草稿箱</a>
			<li><a href="form_components.html"><i class="icon-angle-right"></i>添加博文</a></li>
			<li><a href="form_validation.html"><i class="icon-angle-right"></i>博文列表</a></li>
			<li><a href="form_wizard.html"><i class="icon-angle-right"></i>添加新标签</a></li>
		</ul>
	</li>
	<li>
		<a href="javascript:void(0);"><i class="icon-table"></i> 分类管理</a>
		<ul class="sub-menu">
			<li><a href="tables_static.html"><i class="icon-angle-right"></i>添加新分类</a></li>
			<li><a href="http://envato.stammtec.de/themeforest/melon/tables_dynamic.html"><i class="icon-angle-right"></i>分类列表</a></li>
		</ul>
	</li>
	<li>
		<a href="javascript:void(0);"><i class="icon-table"></i> 评论管理</a>
		<ul class="sub-menu">
			<li><a href="tables_static.html"><i class="icon-angle-right"></i>评论列表</a></li>
			<li><a href="http://envato.stammtec.de/themeforest/melon/tables_dynamic.html"><i class="icon-angle-right"></i>分类列表</a></li>
		</ul>
	</li>
	<li>
		<a href="index.html"><i class="icon-dashboard"></i>留言板</a>
	</li>
	<li>
		<a href="index.html"><i class="icon-dashboard"></i>文件管理</a>
	</li>
</ul><?php }
}
?>