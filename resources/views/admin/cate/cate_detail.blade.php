@extends('admin.layout.motail_base')

@section('content')
	<article class="page-container">
		<form class="form form-horizontal" id="form-category-add">
			<input type="hidden" name="id" @if (isset($id)) value="{{ $id }}" @endif>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">名称：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" @if (isset($name)) value="{{ $name }}" @endif placeholder=""   readonly data-valid="isChecked">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">类型：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" @if (isset($type_name)) value="{{ $type_name }}" @endif placeholder=""  readonly data-valid="isChecked">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">等级：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" @if ($parent_id == 0) value="一级导航" @else value=" ├ 多级栏目" @endif placeholder="" readonly data-valid="isChecked">
				</div>
			</div>
			@if (isset($parent_name))
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">父级：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text" @if (isset($parent_name)) value="{{ $parent_name }}" @endif placeholder="" id="name" readonly  data-valid="isChecked">
				</div>
			</div>
			@endif
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
	});
	</script>
@endsection


