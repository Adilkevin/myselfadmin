@extends('admin.layout.motail_base')

@section('content')
    <article class="page-container">
		<form  class="form form-horizontal" id="form-member-add">
    		<div class="row cl">
				<input type="hidden" name="type_id" @if (isset($id)) value="{{ $id }}" @endif>
    			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>名称：</label>
    			<div class="formControls col-xs-8 col-sm-9">
    				<input type="text" class="input-text" @if($type == 'readonly') readonly @endif  placeholder="" id="name" name="name" @if (isset($name)) value="{{ $name }}" @endif>
    			</div>
    		</div>
    		<div class="row cl">
    			<label class="form-label col-xs-4 col-sm-3">备注：</label>
    			<div class="formControls col-xs-8 col-sm-9">
    				<textarea name="remark" @if($type == 'readonly') readonly @endif  cols="" rows="" class="textarea" @if($type == 'readonly') placeholder="啥都没有" @else  placeholder="说点什么" @endif>@if (isset($remark)){{ $remark }}@endif</textarea>
    			</div>
    		</div>
    		<div class="row cl">
    			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
					@if($type != 'readonly')
    				<input id="save-button" class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
					@endif
    			</div>
    		</div>
		</form>
    </article>
@endsection

@section('js')

    <script type="text/javascript">
    $(function(){
    	$('.skin-minimal input').iCheck({
    		checkboxClass: 'icheckbox-blue',
    		radioClass: 'iradio-blue',
    		increaseArea: '20%'
    	});
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

//		$("#classesList").select2({
//			data: msg.classes,
//			placeholder:'请选择发送的班级',
//			allowClear:true,
//			tags:true,
//		});

    	$("#form-member-add").validate({
    		rules:{
    			name:{
    				required:true,
    				minlength:2,
    				maxlength:16
    			}
    		},
    		onkeyup:false,
    		focusCleanup:true,
    		success:"valid",
    		submitHandler:function(form){
    			//$(form).ajaxSubmit();
				console.log(parent);
    			var index = parent.layer.getFrameIndex(window.name);
    			//parent.$('.btn-refresh').click();

				var name   = $('#name').val();
				var remark = $('textarea').val();
				var mode   = $('input[name=type_id]').val();
				$.post("{{ url('admin/query_types_edit') }}", {name: name, remark: remark, mode: mode},
					function(msg){
				    	if (msg.status == 0) {
				    	    var content = '<div style="color: red;">该类型已经存在</div>';
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
					}
				);

    		}
    	});

    	function openAlter(content) {
			layer.open({
			  title: '提示'
			  ,content: content
			});
		}

		{{--$('#save-button').click(function () {--}}
			{{--var name = $('#name').val();--}}
			{{--console.log('name='+name);--}}
			{{--var remark = $('textarea').val();--}}
			{{--console.log('textarea='+remark);--}}
			{{--$.post("{{ url('admin/query_types_edit') }}", { name: name, remark: remark},--}}
				{{--function(data){--}}
					{{--alert("Data Loaded: " + data);--}}
					{{--parent.layer.close(index);--}}
					{{--parent.reload();--}}
				{{--}--}}
			{{--);--}}
        {{--});--}}

        $(".textarea").Huitextarealength({
        	minlength:10,
        	maxlength:100
        });
    });
    </script>
@endsection