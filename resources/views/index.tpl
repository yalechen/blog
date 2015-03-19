{extends file='layout.tpl'}

{block main}
	<div class="blog-header"><p class="lead blog-description"></p></div>
	<div class="row">
        <div class="col-sm-8 blog-main">
        	{foreach $data as $item}
        		 <div class="blog-post">
		            <h2>{$item.title}</h2>
		            <p>编程 / 2015年1月19日 19:29 / 阅读: 131 </p>
		            <p>{$item.content}</p>
		          </div>
        	{/foreach}

          <!-- <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav> -->
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
            	{foreach $months as $month}
            		<li><a href="#">{$month}</a></li>
            	{/foreach}
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>分类目录</h4>
            <ol class="list-unstyled">
            	{foreach $categorys as $category}
            		<li><a href="#">{$category.name}</a></li>
            	{/foreach}
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->
{/block}