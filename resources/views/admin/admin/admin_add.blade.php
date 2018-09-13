@extends('admin.layout.motail_base')

@section('content')
    <article class="page-container">
    	<form class="form form-horizontal" id="form-admin-add">
    	<div class="row cl">
    		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
    		<div class="formControls col-xs-8 col-sm-9">
    			<input type="text" class="input-text" value="" placeholder="" id="adminName" name="username">
    		</div>
    	</div>
    	<div class="row cl">
    		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
    		<div class="formControls col-xs-8 col-sm-9">
    			<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
    		</div>
    	</div>
    	<div class="row cl">
    		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
    		<div class="formControls col-xs-8 col-sm-9">
    			<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2">
    		</div>
    	</div>
    	<div class="row cl">
    		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
    		<div class="formControls col-xs-8 col-sm-9">
    			<input type="text" class="input-text" value="" placeholder="" id="phone" name="phone">
    		</div>
    	</div>
    	<div class="row cl">
    		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
    		<div class="formControls col-xs-8 col-sm-9">
    			<input type="text" class="input-text" placeholder="@" name="email" id="email">
    		</div>
    	</div>
    	<div class="row cl">
    		<label class="form-label col-xs-4 col-sm-3">角色：</label>
    		<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box" style="width:150px;">
    				<select class="select" name="adminRole" size="1" id="select-role">
						@if (isset($role))
							@foreach($role as $item)
								<option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
							@endforeach
						@endif
					</select>
    			</span>
			</div>
    	</div>
    	<div class="row cl">
    		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
    			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
    		</div>
    	</div>
    	</form>
    </article>
@endsection

@section('js')
<script>
	$("#form-admin-add").validate({
		rules: {
			username: {
				required: true,
				minlength: 2,
				maxlength: 16
			},
			password: {
				required: true,
				minlength: 6,
				maxlength: 16
			},
			password2: {
				required: true,
				minlength: 6,
				equalTo: "#password"
			}
		},
		onkeyup: false,
		focusCleanup: true,
		success: "valid",
		submitHandler: function (form) {
			//$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();

			var name     = $('#name').val();
			var sort     = $('#sort').val();
			var left_nav = $('#leftnav-select').val();
			var types    = $('#types-select').val();
			var parents  = $('#parent').val();
			var id       = $('input[name=id]').val();

			if (left_nav == 0) {
				parents = 0;
			}
			if (left_nav != 0 && parents == 0) {
				return openAlter('请选择父级导航')
			}

			$.post("{{ url('/admin/save_nav') }}", {name: name, sort: sort, types: types, parents: parents, id: id},
				function(msg){
					console.log(msg);
					if (msg.status == 0) {
						var content = '该类型存在';
						openAlter(content);
						return false;
					} else if (msg.status == 1) {
						var content = msg.data.way + msg.message;
						openAlter(content);
					}
					var close = setTimeout(function () {
						parent.layer.close(index);
					},2000);

					parent.location.reload();
				});
		}
	});
</script>
@endsection