<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>{block title}{{$smarty.block.child}|strip_tags|default:'管理中心'} - {/block}个人博客管理后台</title>
    <link href="{asset('bootstrap/css/bootstrap.min.css')}" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
      <link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"
      />
    <![endif]-->
    <link href="{asset('css/main.css')}" rel="stylesheet" type="text/css" />
    <link href="{asset('css/plugins.css')}" rel="stylesheet" type="text/css" />
    <link href="{asset('css/responsive.css')}" rel="stylesheet" type="text/css" />
    <link href="{asset('css/icons.css')}" rel="stylesheet" type="text/css" />
    <link href="{asset('css/fontawesome/font-awesome.min.css')}" rel="stylesheet" type="text/css" />
    <!--[if IE 7]>
      <link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
    <![endif]-->
    <!--[if IE 8]>
      <link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="{asset('js/libs/jquery-1.10.2.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')}"></script>
    <script type="text/javascript" src="{asset('bootstrap/js/bootstrap.min.js')}"></script>
    <script type="text/javascript" src="{asset('js/libs/lodash.compat.min.js')}"></script>
    <!--[if lt IE 9]>
      <script src="assets/js/libs/html5shiv.js">
      </script>
    <![endif]-->
    <script type="text/javascript" src="{asset('plugins/touchpunch/jquery.ui.touch-punch.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/event.swipe/jquery.event.move.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/event.swipe/jquery.event.swipe.js')}"></script>
    <script type="text/javascript" src="{asset('js/libs/breakpoints.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/respond/respond.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/cookie/jquery.cookie.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/slimscroll/jquery.slimscroll.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/slimscroll/jquery.slimscroll.horizontal.min.js')}"></script>
    <!--[if lt IE 9]>
      <script type="text/javascript" src="plugins/flot/excanvas.min.js">
      </script>
    <![endif]-->
    <script type="text/javascript" src="{asset('plugins/sparkline/jquery.sparkline.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/flot/jquery.flot.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/flot/jquery.flot.tooltip.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/flot/jquery.flot.resize.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/flot/jquery.flot.time.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/flot/jquery.flot.growraf.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/easy-pie-chart/jquery.easy-pie-chart.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/daterangepicker/moment.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/daterangepicker/daterangepicker.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/blockui/jquery.blockUI.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/fullcalendar/fullcalendar.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/noty/jquery.noty.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/noty/layouts/top.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/noty/themes/default.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/uniform/jquery.uniform.min.js')}"></script>
    <script type="text/javascript" src="{asset('plugins/select2/select2.min.js')}"></script>
    <script type="text/javascript" src="{asset('js/app.js')}"></script>
    <script type="text/javascript" src="{asset('js/plugins.js')}"></script>
    <script type="text/javascript" src="{asset('js/plugins.form-components.js')}"></script>
    <script>
      $(document).ready(function() {
        App.init();
        Plugins.init();
        FormComponents.init()
      });
    </script>
    <script type="text/javascript" src="{asset('js/custom.js')}"></script>
    <script type="text/javascript" src="{asset('js/demo/pages_calendar.js')}"></script>
    <script type="text/javascript" src="{asset('js/demo/charts/chart_filled_blue.js')}"></script>
    <script type="text/javascript" src="{asset('js/demo/charts/chart_simple.js')}"></script>
    {block head}{/block}
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
        {include 'admin/_layout/navbar-left-menu.tpl'}
        {include 'admin/_layout/navbar-right-menu.tpl'}
      </div>
      <div id="project-switcher" class="container project-switcher">
        <div id="scrollbar">
          <div class="handle">
          </div>
        </div>
        <div id="frame">
          {include 'admin/_layout/scrollbar-menu.tpl'}
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
          {include 'admin/_layout/sidebar-menu.tpl'}
          <div class="sidebar-title">
            <span>
              提示
            </span>
          </div>
          {include 'admin/_layout/notifications.tpl'}
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
            	{block breadcrumb}
            		<li><i class="icon-home"></i><a href="index.html"> 控制台</a></li>
              	{/block}
            </ul>
            {include 'admin/_layout/crumb-right-menu.tpl'}
          </div>
          {block main}{/block}
        </div>
      </div>
    </div>
    {block script}{/block}
  </body>
</html>