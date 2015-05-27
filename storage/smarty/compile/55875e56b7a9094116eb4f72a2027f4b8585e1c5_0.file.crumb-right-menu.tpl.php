<?php /* Smarty version 3.1.22-dev/17, created on 2015-03-31 01:33:30
         compiled from "D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/_layout/crumb-right-menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:25805519f96aeb30f4_66195926%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55875e56b7a9094116eb4f72a2027f4b8585e1c5' => 
    array (
      0 => 'D:/Bitnami/wampstack-5.4.26-0/apache2/htdocs/github/resources/views/admin/_layout/crumb-right-menu.tpl',
      1 => 1427698656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25805519f96aeb30f4_66195926',
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/17',
  'unifunc' => 'content_5519f96aeb30f5_36598790',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5519f96aeb30f5_36598790')) {
function content_5519f96aeb30f5_36598790 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '25805519f96aeb30f4_66195926';
?>
<ul class="crumb-buttons">
              <li>
                <a href="charts.html" title="">
                  <i class="icon-signal">
                  </i>
                  <span>
                    统计
                  </span>
                </a>
              </li>
              <li class="dropdown">
                <a href="#" title="" data-toggle="dropdown">
                  <i class="icon-tasks">
                  </i>
                  <span>
                    用户
                    <strong>
                      (+3)
                    </strong>
                  </span>
                  <i class="icon-angle-down left-padding">
                  </i>
                </a>
                <ul class="dropdown-menu pull-right">
                  <li>
                    <a href="form_components.html" title="">
                      <i class="icon-plus">
                      </i>
                      添加新用户
                    </a>
                  </li>
                  <li>
                    <a href="http://envato.stammtec.de/themeforest/melon/tables_dynamic.html"
                    title="">
                      <i class="icon-reorder">
                      </i>
                      查看
                    </a>
                  </li>
                </ul>
              </li>
              <li class="range">
                <a href="#">
                  <i class="icon-calendar">
                  </i>
                  <span>
                  </span>
                  <i class="icon-angle-down">
                  </i>
                </a>
              </li>
            </ul><?php }
}
?>