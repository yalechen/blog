<?php /* Smarty version Smarty-3.1.21, created on 2015-03-07 07:56:15
         compiled from "D:\Bitnami\wampstack-5.4.26-0\apache2\htdocs\blog\resources\views\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3037754faaf1fd1b0e3-64743645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd74adb1ed5ac458a8bb30dec634d9913647bdf4d' => 
    array (
      0 => 'D:\\Bitnami\\wampstack-5.4.26-0\\apache2\\htdocs\\blog\\resources\\views\\index.tpl',
      1 => 1425714958,
      2 => 'file',
    ),
    '5841a61f7c13acc369de26dde8d52b1eef4828b7' => 
    array (
      0 => 'D:\\Bitnami\\wampstack-5.4.26-0\\apache2\\htdocs\\blog\\resources\\views\\layout.tpl',
      1 => 1425632275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3037754faaf1fd1b0e3-64743645',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_54faaf1fe43f24_54007580',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54faaf1fe43f24_54007580')) {function content_54faaf1fe43f24_54007580($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title><?php ob_start();?><?php $_tmp1=ob_get_clean();?><?php echo (($tmp = @preg_replace('!<[^>]*?>!', ' ', $_tmp1))===null||$tmp==='' ? '长江一号' : $tmp);?>
 - 个人博客</title>

    <!-- Bootstrap -->
    <link href="<?php echo asset('css/bootstrap.min.css');?>
" rel="stylesheet">
    <link href="<?php echo asset('css/blog.css');?>
" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><?php echo '<script'; ?>
 src="../../assets/js/ie8-responsive-file-warning.js"><?php echo '</script'; ?>
><![endif]-->
    <?php echo '<script'; ?>
 src="<?php echo asset('js/ie-emulation-modes-warning.js');?>
"><?php echo '</script'; ?>
>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
    
  </head>
  <body>
  	<div class="blog-masthead" style="top: 0px;border-width: 0px 0px 1px;position: fixed;right: 0px;left: 0px;z-index: 1030;border-radius: 0px;">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="#">首页</a>
          <a class="blog-nav-item" href="#">心情</a>
          <a class="blog-nav-item" href="#">留言</a>
          <a class="blog-nav-item" href="#">关于</a>
        </nav>
      </div>
    </div>
    
    <div class="container">
	<div class="blog-header"><p class="lead blog-description"></p></div>
	<div class="row">
        <div class="col-sm-8 blog-main">
        	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        		 <div class="blog-post">
		            <h2><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</h2>
		            <p>编程 / 2015年1月19日 19:29 / 阅读: 131 </p>
		            <p><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</p>
		          </div>
        	<?php } ?>

          
          <nav>
			  <ul class="pagination">
			    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
			    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
			  </ul>
		  </nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>博文归档</h4>
            <ol class="list-unstyled">
            	<?php  $_smarty_tpl->tpl_vars['month'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['month']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['months']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['month']->key => $_smarty_tpl->tpl_vars['month']->value) {
$_smarty_tpl->tpl_vars['month']->_loop = true;
?>
            		<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</a></li>
            	<?php } ?>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>分类目录</h4>
            <ol class="list-unstyled">
            	<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categorys']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
            		<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</a></li>
            	<?php } ?>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->
</div>
	
	<footer class="blog-footer">
      <p>版权所有© 转载请注明出处：http://www.chenzhijiang.com。地址：福建省厦门市观音山7号楼</p>
      <p>
        <a href="#">返回顶部</a>
      </p>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo '<script'; ?>
 src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"><?php echo '</script'; ?>
>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo '<script'; ?>
 src="<?php echo asset('js/bootstrap.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo asset('js/docs.min.js');?>
"><?php echo '</script'; ?>
>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo '<script'; ?>
 src="<?php echo asset('js/ie10-viewport-bug-workaround.js');?>
"><?php echo '</script'; ?>
>
    
  </body>
</html><?php }} ?>
