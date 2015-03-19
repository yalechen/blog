<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>{block title}{{$smarty.block.child}|strip_tags|default:'长江一号'} - 个人博客{/block}</title>

    <!-- Bootstrap -->
    <link href="{asset('css/bootstrap.min.css')}" rel="stylesheet">
    <link href="{asset('css/blog.css')}" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{asset('js/ie-emulation-modes-warning.js')}"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {block head}{/block}
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
    
    <div class="container">{block main}{/block}</div>
	
	<footer class="blog-footer">
      <p>版权所有© 转载请注明出处：http://www.chenzhijiang.com。地址：福建省厦门市观音山7号楼</p>
      <p>
        <a href="#">返回顶部</a>
      </p>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{asset('js/bootstrap.min.js')}"></script>
    <script src="{asset('js/docs.min.js')}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{asset('js/ie10-viewport-bug-workaround.js')}"></script>
    {block script}{/block}
  </body>
</html>