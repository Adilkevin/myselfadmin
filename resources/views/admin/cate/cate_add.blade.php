@extends('admin.layout.motail_base')

@section('content')
	<article class="page-container">
		<form class="form form-horizontal" id="form-category-add">
			<input type="hidden" name="id" @if (isset($id)) value="{{ $id }}" @endif>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>名称：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" @if (isset($name)) value="{{ $name }}" @endif placeholder="" id="name" name="name" data-valid="isChecked">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">排序：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" @if (isset($sort)) value="{{ $sort }}" @else value="1" @endif placeholder="" id="sort" name="sort" data-valid="isChecked">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">导航级别：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<span class="select-box">
						<select class="select" size="1" id="leftnav-select"></select>
					</span>
				</div>
			</div>
			<div class="row cl hide parent_div" >
				<label class="form-label col-xs-4 col-sm-3">父级导航：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<span class="select-box">
						<select class="select" size="1" name="parent_id" id="parent"></select>
					</span>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">选择类型：</label>
				<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
					<select class="select" size="1" name="types" id="types-select"></select>
					</span>
				</div>
			</div>
			<div class="row cl">
				<div class="col-9 col-offset-3">
					<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
		function openAlter(content) {
			layer.open({
			  title: '提示'
			  ,content: content
			});
		}

		$("#form-category-add").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 16
                },
                sort: {
					required: true,
                    digits: true
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

		$('#leftnav-select').change(function () {
			var val = $(this).val();
			if (val == 1) {
			    $('.parent_div').removeClass('hide');
			} else if (val == 0) {
			    $('.parent_div').addClass('hide');
				parentInit();
			}
        });


		//父级元素select初始化
		parentInit();
		function parentInit() {
			var parent_select = $('#parent');
			$.post("{{ url('/admin/level_nav') }}",
			   	function(data){
				   	selectInit(parent_select, data, '父级元素');
				   	var parent_id = '';
					parent_id = "{{ isset($parent_id)?$parent_id:'' }}";
					if (parent_id) {
						parent_select.select2('val', parent_id);
						if (parent_id != 0) {
							$('#leftnav-select').select2('val', '1');
						} else {
							$('#leftnav-select').select2('val', '0');
						}
						$('#leftnav-select').select2('enable', true);
					}
			  	});
        }

		//类型select初始化
		typeInit();
		function typeInit() {
			var types_select = $('#types-select');
			$.post("{{ url('/admin/types_list_all') }}",
			   function(data){
				   selectInit(types_select, data, '类型');
			   });
        }

		//导航select初始化
		leftnavInit();
        function leftnavInit() {
			var leftnav_select = $('#leftnav-select');
			var data = [
				{
				    'id'   : 0,
					'text' : '一级导航',
				},
				{
					'id'   : 1,
					'text' : ' ├ 多级栏目',
				}
			];
			selectInit(leftnav_select, data, '导航级别');
        }

		function selectInit(obj, data, msg) {
			$(obj).select2({
				data: data,
				placeholder:'请选择' + msg,
				width: '100%'
			});
        }

	});
	</script>
@endsection


