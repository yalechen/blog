{extends file='admin/_layout/main.tpl'}

{block title}{if $id gt 0}{assign "hname" "编辑"}{else}{assign "hname" "新增"}{/if}{$hname}博主{/block}

{block breadcrumb}
	<li><i class="icon-home"></i><a href="{route('UserList')}"> 博主管理</a></li>
	<li class="current"><a href="{route('UserEdit')}" title=""> {$hname}博主</a></li>
{/block}

{block main}
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header"><h4><i class="icon-reorder"></i>{$hname}博主</h4></div>
            <div class="widget-content">
				<form class="form-horizontal row-border" id="user_form" method="post" action="{route('UserSave')}">
                	<div class="form-group">
                  		<label class="col-md-2 control-label">邮箱<span class="required">*</span></label>
                  		<div class="col-md-10">
                    		<input type="text" name="email" value="{$data.email|default:Input::old('email')}" class="form-control" placeholder="" {if $id gt 0}readonly=""{/if} required>
                  		</div>
                	</div>
                	<div class="form-group">
                  		<label class="col-md-2 control-label">密码{if !$id}<span class="required">*</span>{/if}</label>
                  		<div class="col-md-10">
                    		<input type="text" name="password" value="" class="form-control" placeholder="当修改时密码不填则默认不做修改" {if !$id}required{/if}>
                  		</div>
                	</div>
                	<div class="form-group">
                  		<label class="col-md-2 control-label">用户名<span class="required">*</span></label>
                  		<div class="col-md-10">
                    		<input type="text" name="name" value="{$data.name|default:Input::old('name')}" class="form-control" placeholder="" required>
                  		</div>
                	</div>
                	<div class="form-group">
                  		<label class="col-md-2 control-label">昵称<span class="required">*</span></label>
                  		<div class="col-md-10">
                    		<input type="text" name="nickname" value="{$data.nickname|default:Input::old('nickname')}" class="form-control" required>
                  		</div>
                	</div>	
                	<div class="form-group">
                  		<label class="col-md-2 control-label">真实姓名</label>
                  		<div class="col-md-10">
                    		<input type="text" name="realname" value="{$data.realname|default:Input::old('realname')}" class="form-control">
                  		</div>
                	</div>
                	<div class="form-group">
                  		<label class="col-md-2 control-label">手机号<span class="required">*</span></label>
                  		<div class="col-md-10">
                    		<input type="text" name="mobile" value="{$data.mobile|default:Input::old('mobile')}" class="form-control" required>
                  		</div>
                	</div>
                	<div class="form-group">
						<label class="col-md-2 control-label">所在地<span class="required">*</span></label>
						<div class="col-md-10">
							<div class="row">
                          		<div class="col-md-6">
									<select class="form-control" id="province" name="province_id" required>
										<option value="">请选择省份</option>
										{foreach $provinces as $item}
											<option value="{$item.id}" {if $data.province_id|default:Input::old('province_id') eq $item.id}selected{/if}>{$item.name}</option>
										{/foreach}
		                            </select>
		                        </div>
		                    </div>
		                    <div class="row next-row">
								<div class="col-md-6">
		                            <select class="form-control" name="city_id" id="city" required>
		                            	<option value="">请选择城市</option>
		                            </select>
	                          	</div>
                        	</div>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-md-2 control-label">个性签名：</label>
                      	<div class="col-md-10">
                        	<textarea rows="3" cols="5" name="signature" class="form-control">{$data.signature|default:Input::old('signature')}</textarea>
                      	</div>
                    </div>
                    <div class="form-actions">
                    	<input type="submit" id="submit_btn" value="保存" class="btn btn-primary pull-right">
                    	<!-- 当用ajax提交时，则type必须为button，无需method和action，即为下面一行的提交保存按钮 -->
                    	<!-- <input type="button" id="submit_btn" value="保存" class="btn btn-primary pull-right"> -->
                    	<input type="button" value="取消" onclick="history.go(-1);" class="btn pull-right">
                      	<input type="hidden" name="_token" value="{csrf_token()}">
                      	<input type="hidden" name="id" value="{$id}">
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>
                    
{/block}

{block script}
<script type="text/javascript">
//省市下拉
$("#province").change(function() {
    getCity();
});
		
getCity();
		
function getCity() {
    var province_id = $("#province").val();
    var city_id = "{$data.city_id}";
	if( province_id > 0){
		$.ajax({
	        url: '{route("CityPull")}',
	        data: { province_id : province_id },
	        success: function(data) {
	            var html = "";
	            for (var i in data) {
	            	if(data[i]['id'] == city_id){
	            		html += "<option value='"+data[i]['id']+"' selected >"+data[i]['name']+"</option>"
	            	}else{
	            		html += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>"
	            	}
	                
	            }
	            $("#city option").not(":first").remove();
	            $("#city").append(html);
	            
	            getDistrict();
	        }
	    });
	}else{
		$("#city option").not(":first").remove();
	}
}

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