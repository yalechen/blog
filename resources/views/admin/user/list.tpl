{extends file='admin/_layout/main.tpl'}

{block breadcrumb}
	<li><i class="icon-home"></i><a href="javascript:void();"> 博主管理</a></li>
	<li class="current"><a href="{route('UserList')}" title=""> 博主列表</a></li>
{/block}

{block main}
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>博主列表</h4>
				<div class="toolbar no-padding">
                    <div class="btn-group">
						<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                    </div>
                </div>
			</div>
            <div class="widget-content no-padding">
				<table class="table table-hover table-striped table-bordered table-highlight-head">
                    <thead>
                      <tr>
                        <th>序号</th>
                        <th>头像</th>
                        <th>用户名</th>
                        <th>昵称</th>
                        <th>邮箱地址</th>
                        <th>手机号</th>
                        <th>真实姓名</th>
                        <th>所在地</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                    	{foreach $data as $user}
                    		<tr>
		                        <td>{$user.id}</td>
		                        <td><img src="{route('FilePull',['hash'=>$user.avatar_hash,'width'=>100,'height'=>100])}" /></td>
		                        <td>{$user.name}</td>
		                        <td>{$user.nickname}</td>
		                        <td>{$user.email}</td>
		                        <td>{$user.mobile}</td>
		                        <td>{$user.realname}</td>
		                        <td>{$user.region_name}</td>
		                        <td>
		                        	<ul class="table-controls">
			                            <li>
			                            	<a data-original-title="Search" href="{route('BlogIndex',['id'=>$user.id])}" class="bs-tooltip" title="查看"><i class="icon-search"></i></a>
			                            </li>
			                            <li>
			                            	<a data-original-title="Edit" href="{route('UserEdit',['id'=>$user.id])}" class="bs-tooltip" title="编辑"><i class="icon-pencil"></i></a>
			                            </li>
			                            <li>
			                            	<a data-original-title="Delete" data-id="{$user.id}" class="bs-tooltip delete" title="删除"><i class="icon-trash"></i></a>
			                            </li>
			                          </ul>
			                      </td>
							</tr>
                    	{/foreach}
                    </tbody>
                  </table>
            </div>
		</div>
	</div>
</div>
                    
{/block}

{block script}
<script type="text/javascript">
//异步删除博主
$(".delete").click(function() {
    var id = $(this).attr('data-id');
    var obj = $(this);
    iconfirm('确认要删除此博主吗？', function() {
        $.post('{route("UserDelete")}', { id: id }, function(data) {
            obj.closest('tr').remove();
        }, 'text');
    });
});
//ajax提交
/* $("#submit_btn").click(function() {
    var action = $(this).attr('data-action');
    if (action == 1) {
        return false;
    }
    $(this).attr('data-action', 1);
    var action_url = '{route("UserEdit")}';
    var data = $("#user_form").serialize();
    var obj = $(this);
    $.ajax({
        type: "POST",
        url: "{route('UserSave')}",
        dataType: 'json',
        data: data,
        success: function(data) {
            window.location.href = action_url;
        },
        error : function(xhq) {
        	obj.attr('data-action', 0);
        	for (var i in xhq) {
                alert(i + '--' + xhq[i]);
            }
            
            //$(".alert").text(xhq.responseText);
        }
    });
}); */
</script>
{/block}