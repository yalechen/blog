<?php /* Smarty version 3.1.22-dev/17, created on 2015-03-31 03:01:55
         compiled from "D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5319551a0e23602d97_73170583%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '926d80b7921100131af2178d5e8b5ea382ba849b' => 
    array (
      0 => 'D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/index.tpl',
      1 => 1427770890,
      2 => 'file',
    ),
    '6b99b2d13ff5617dad613a652a78a6e2f0b379d8' => 
    array (
      0 => 'D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/_layout/main.tpl',
      1 => 1427770378,
      2 => 'file',
    ),
    '3571d41cec3928eff18516f3bdfe7cfecc4b2c65' => 
    array (
      0 => '3571d41cec3928eff18516f3bdfe7cfecc4b2c65',
      1 => 0,
      2 => 'string',
    ),
    'cc3874cd28c31156e754ce3d7a4e4fcbb4015816' => 
    array (
      0 => 'cc3874cd28c31156e754ce3d7a4e4fcbb4015816',
      1 => 0,
      2 => 'string',
    ),
    '068aff3532ce0d86230f216e69aa0b464c450130' => 
    array (
      0 => '068aff3532ce0d86230f216e69aa0b464c450130',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '5319551a0e23602d97_73170583',
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/17',
  'unifunc' => 'content_551a0e23829a91_34761427',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_551a0e23829a91_34761427')) {
function content_551a0e23829a91_34761427 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '5319551a0e23602d97_73170583';
?>
<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title><?php ob_start();?><?php
$_smarty_tpl->properties['nocache_hash'] = '5319551a0e23602d97_73170583';
?>
首页<?php $_tmp1=ob_get_clean();?><?php echo (($tmp = @preg_replace('!<[^>]*?>!', ' ', $_tmp1))===null||$tmp==='' ? '管理中心' : $tmp);?>
 - 个人博客管理后台</title>
    <link href="<?php echo asset('bootstrap/css/bootstrap.min.css');?>
" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
      <link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"
      />
    <![endif]-->
    <link href="<?php echo asset('css/main.css');?>
" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/plugins.css');?>
" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/responsive.css');?>
" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/icons.css');?>
" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/fontawesome/font-awesome.min.css');?>
" rel="stylesheet" type="text/css" />
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
 type="text/javascript" src="<?php echo asset('plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js');?>
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
 type="text/javascript" src="<?php echo asset('plugins/touchpunch/jquery.ui.touch-punch.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/event.swipe/jquery.event.move.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/event.swipe/jquery.event.swipe.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('js/libs/breakpoints.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/respond/respond.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/cookie/jquery.cookie.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/slimscroll/jquery.slimscroll.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/slimscroll/jquery.slimscroll.horizontal.min.js');?>
"><?php echo '</script'; ?>
>
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 type="text/javascript" src="plugins/flot/excanvas.min.js">
      <?php echo '</script'; ?>
>
    <![endif]-->
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/sparkline/jquery.sparkline.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/flot/jquery.flot.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/flot/jquery.flot.tooltip.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/flot/jquery.flot.resize.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/flot/jquery.flot.time.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/flot/jquery.flot.growraf.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/easy-pie-chart/jquery.easy-pie-chart.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/daterangepicker/moment.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/daterangepicker/daterangepicker.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/blockui/jquery.blockUI.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/fullcalendar/fullcalendar.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/noty/jquery.noty.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/noty/layouts/top.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/noty/themes/default.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/uniform/jquery.uniform.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('plugins/select2/select2.min.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('js/app.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('js/plugins.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('js/plugins.form-components.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
      $(document).ready(function() {
        App.init();
        Plugins.init();
        FormComponents.init()
      });
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('js/custom.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('js/demo/pages_calendar.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('js/demo/charts/chart_filled_blue.js');?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo asset('js/demo/charts/chart_simple.js');?>
"><?php echo '</script'; ?>
>
    
  </head>
  
  <body>
    <header class="header navbar navbar-fixed-top" role="banner">
      <div class="container">
        <ul class="nav navbar-nav">
          <li class="nav-toggle">
            <a href="javascript:void(0);" title="">
              <i class="icon-reorder">
              </i>
            </a>
          </li>
        </ul>
        <a class="navbar-brand" href="index.html">
          <img src="assets/img/logo.png" alt="logo" />
          <strong>
            博客
          </strong>
          Admin
        </a>
        <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom"
        data-original-title="Toggle navigation">
          <i class="icon-reorder">
          </i>
        </a>
        <?php echo $_smarty_tpl->getSubTemplate ('admin/_layout/navbar-left-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        <?php echo $_smarty_tpl->getSubTemplate ('admin/_layout/navbar-right-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

      </div>
      <div id="project-switcher" class="container project-switcher">
        <div id="scrollbar">
          <div class="handle">
          </div>
        </div>
        <div id="frame">
          <?php echo $_smarty_tpl->getSubTemplate ('admin/_layout/scrollbar-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </div>
      </div>
    </header>
    <div id="container">
      <div id="sidebar" class="sidebar-fixed">
        <div id="sidebar-content">
          <form class="sidebar-search">
            <div class="input-box">
              <button type="submit" class="submit">
                <i class="icon-search">
                </i>
              </button>
              <span>
                <input type="text" placeholder="搜索...">
              </span>
            </div>
          </form>
          <div class="sidebar-search-results">
            <i class="icon-remove close">
            </i>
            <div class="title">
              Documents
            </div>
            <ul class="notifications">
              <li>
                <a href="javascript:void(0);">
                  <div class="col-left">
                    <span class="label label-info">
                      <i class="icon-file-text">
                      </i>
                    </span>
                  </div>
                  <div class="col-right with-margin">
                    <span class="message">
                      <strong>
                        John Doe
                      </strong>
                      received $1.527,32
                    </span>
                    <span class="time">
                      finances.xls
                    </span>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);">
                  <div class="col-left">
                    <span class="label label-success">
                      <i class="icon-file-text">
                      </i>
                    </span>
                  </div>
                  <div class="col-right with-margin">
                    <span class="message">
                      My name is
                      <strong>
                        John Doe
                      </strong>
                      ...
                    </span>
                    <span class="time">
                      briefing.docx
                    </span>
                  </div>
                </a>
              </li>
            </ul>
            <div class="title">
              Persons
            </div>
            <ul class="notifications">
              <li>
                <a href="javascript:void(0);">
                  <div class="col-left">
                    <span class="label label-danger">
                      <i class="icon-female">
                      </i>
                    </span>
                  </div>
                  <div class="col-right with-margin">
                    <span class="message">
                      Jane
                      <strong>
                        Doe
                      </strong>
                    </span>
                    <span class="time">
                      21 years old
                    </span>
                  </div>
                </a>
              </li>
            </ul>
          </div>
          <?php echo $_smarty_tpl->getSubTemplate ('admin/_layout/sidebar-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

          <div class="sidebar-title">
            <span>
              提示
            </span>
          </div>
          <?php echo $_smarty_tpl->getSubTemplate ('admin/_layout/notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

          <div class="sidebar-widget align-center">
            <div class="btn-group" data-toggle="buttons" id="theme-switcher">
              <label class="btn active">
                <input type="radio" name="theme-switcher" data-theme="bright">
                <i class="icon-sun">
                </i>
                白天
              </label>
              <label class="btn">
                <input type="radio" name="theme-switcher" data-theme="dark">
                <i class="icon-moon">
                </i>
                夜晚
              </label>
            </div>
          </div>
        </div>
        <div id="divider" class="resizeable">
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
            	<?php
$_smarty_tpl->properties['nocache_hash'] = '5319551a0e23602d97_73170583';
?>

	<li><i class="icon-home"></i><a href="<?php echo route('AdminIndex');?>
"> 控制台</a></li>
	

            </ul>
            <?php echo $_smarty_tpl->getSubTemplate ('admin/_layout/crumb-right-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

          </div>
          <?php
$_smarty_tpl->properties['nocache_hash'] = '5319551a0e23602d97_73170583';
?>

This is Index

        </div>
      </div>
    </div>
    
  </body>
</html><?php }
}
?>