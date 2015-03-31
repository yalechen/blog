<?php /* Smarty version 3.1.22-dev/17, created on 2015-03-31 03:19:50
         compiled from "D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/user/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19071551a12566b2220_29652833%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dde118cafa0f536cd9fc7dcc8304f49461283095' => 
    array (
      0 => 'D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/user/login.tpl',
      1 => 1427771076,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19071551a12566b2220_29652833',
  'variables' => 
  array (
    'message_error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/17',
  'unifunc' => 'content_551a12567e2d24_81262093',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_551a12567e2d24_81262093')) {
function content_551a12567e2d24_81262093 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '19071551a12566b2220_29652833';
?>
<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
   	 <title>个人博客后台登录</title>
    <link href="<?php echo asset('bootstrap/css/bootstrap.min.css');?>
" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/main.css');?>
" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/plugins.css');?>
" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/responsive.css');?>
" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/icons.css');?>
" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/login.css');?>
" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome/font-awesome.min.css');?>
">
    <!--[if IE 7]>
      <link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
    <![endif]-->
    <!--[if IE 8]>
      <link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css' />
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('js/libs/jquery-1.10.2.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('bootstrap/js/bootstrap.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('js/libs/lodash.compat.min.js');?>
"><?php echo '</script'; ?>
>
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="assets/js/libs/html5shiv.js">
      <?php echo '</script'; ?>
>
    <![endif]-->
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/uniform/jquery.uniform.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/validation/jquery.validate.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/nprogress/nprogress.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('js/login.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
      $(document).ready(function() {
        Login.init()
      });
    <?php echo '</script'; ?>
>
  </head>
  
  <body class="login">
    <div class="logo">
      <img src="<?php echo asset('img/logo.png');?>
" alt="logo" />
      <strong>个人博客后台登录</strong>Admin</div>
    <div class="box">
      <div class="content">
        <form class="form-vertical login-form" action="<?php echo route('AdminPostLogin');?>
" method="post">
          <h3 class="form-title"> 登录 <input type="hidden" name="_token" value="<?php echo csrf_token();?>
"></h3>
          <div class="alert fade in alert-danger" style="<?php if (Session::has('message_error')||isset($_smarty_tpl->tpl_vars['message_error']->value)) {?>display:block;<?php } else { ?>display: none;<?php }?>">
            <i class="icon-remove close" data-dismiss="alert"></i>
            <?php if (Session::has('message_error')||isset($_smarty_tpl->tpl_vars['message_error']->value)) {
echo (($tmp = @Session::get('message_error'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['message_error']->value : $tmp);
} else { ?>用户邮箱地址或者密码错误。<?php }?>
          </div>
          <div class="form-group">
            <div class="input-icon">
              <i class="icon-user"></i>
              <input type="text" name="email" class="form-control" placeholder="用户邮箱" autofocus="autofocus" data-rule-required="true" data-rule-email="true" data-msg-required="请输入用户邮箱." />
            </div>
          </div>
          <div class="form-group">
            <div class="input-icon">
              <i class="icon-lock"></i>
              <input type="password" name="password" class="form-control" placeholder="密码" data-rule-required="true" data-msg-required="请输入密码." />
            </div>
          </div>
          <div class="form-actions">
            <label class="checkbox pull-left"><input type="checkbox" class="uniform" name="remember_me" value="true"> 记住密码</label>
            <button type="submit" class="submit btn btn-primary pull-right"> 登录 <i class="icon-angle-right"></i></button>
          </div>
        </form>
        
        
        <form class="form-vertical register-form" action="<?php echo route('AdminPostRegister');?>
" method="post" style="display: none;">
          <h3 class="form-title"> 免费注册 </h3>
          <div class="form-group">
            <div class="input-icon">
              <i class="icon-user"></i>
              <input type="text" name="email" class="form-control" placeholder="Email" autofocus="autofocus" data-rule-required="true" data-rule-email="true" />
            </div>
          </div>
          <div class="form-group">
            <div class="input-icon">
              <i class="icon-lock"></i>
              <input type="password" name="password" class="form-control" placeholder="Password" id="register_password" data-rule-required="true" />
            </div>
          </div>
          <div class="form-group">
            <div class="input-icon">
              <i class="icon-ok"></i>
              <input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password" data-rule-required="true" data-rule-equalTo="#register_password" />
            </div>
          </div>
          <div class="form-group spacing-top">
            <label class="checkbox">
              <input type="checkbox" class="uniform" name="remember" data-rule-required="true" data-msg-required="Please accept ToS first.">
              我已经阅读并同意
              <a href="javascript:void(0);">
                注册规则
              </a>
            </label>
            <label for="remember" class="has-error help-block" generated="true" style="display:none;">
            </label>
          </div>
          <div class="form-actions">
            <button type="button" class="back btn btn-default pull-left">
              <i class="icon-angle-left"></i> 返回
            </button>
            <button type="submit" class="submit btn btn-primary pull-right"> 注册<i class="icon-angle-right"></i>
            </button>
          </div>
        </form>
      </div>
      
      
      <div class="inner-box">
        <div class="content">
          <i class="icon-remove close hide-default"></i>
          <a href="#" class="forgot-password-link"> 忘记密码? </a>
          <form class="form-vertical forgot-password-form hide-default" action="login.html" method="post">
            <div class="form-group">
              <div class="input-icon">
                <i class="icon-envelope">
                </i>
                <input type="text" name="email" class="form-control" placeholder="输入邮箱地址" data-rule-required="true" data-rule-email="true" data-msg-required="请输入您的邮箱地址." />
              </div>
            </div>
            <button type="submit" class="submit btn btn-default btn-block">重置密码</button>
          </form>
          <div class="forgot-password-done hide-default">
            <i class="icon-ok success-icon"></i>
            <span>太好了，我们已经发送电子邮件到您的邮箱。</span>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <a href="#" class="sign-up">还没有一个博客帐号?<strong>注册</strong></a>
    </div>
    <?php echo '<script'; ?>
 type="text/javascript">
      if (location.host == "envato.stammtec.de" || location.host == "themes.stammtec.de") {
        var _paq = _paq || [];
        _paq.push(["trackPageView"]);
        _paq.push(["enableLinkTracking"]); (function() {
          var a = (("https:" == document.location.protocol) ? "https": "http") + "://analytics.stammtec.de/";
          _paq.push(["setTrackerUrl", a + "piwik.php"]);
          _paq.push(["setSiteId", "17"]);
          var e = document,
          c = e.createElement("script"),
          b = e.getElementsByTagName("script")[0];
          c.type = "text/javascript";
          c.defer = true;
          c.async = true;
          c.src = a + "piwik.js";
          b.parentNode.insertBefore(c, b)
        })()
      };
    <?php echo '</script'; ?>
>
  </body>
</html><?php }
}
?>