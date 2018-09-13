@extends('admin.layout.base')

@section('content')
	<section class="Hui-article-box">
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
    	<div class="text-c"> 日期范围：
    		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
    		-
    		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
    		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="">
    		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
    	</div>
    	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="system_add('添加管理员','{{ url("/admin/admin_add") }}','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong class="sum">0</strong> 条</span> </div>
    	<table class="table table-border table-bordered table-bg" id="table-admins-list"></table>
    </div>
	</section>
@endsection

@section('js')
	<script type="text/javascript" src="/js/My97DatePicker/4.8/WdatePicker.js"></script>
	<script type="text/javascript" src="/js/datatables/1.10.0/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="/js/laypage/1.2/laypage.js"></script>

	<script>
		var columns = [
			{
				field: 'choice',
				checkbox: true,
			},
			{
				field: 'id',
				title: 'ID',
			},
			{
				field: 'username',
				title: '用户名',
			},
			{
				field: 'name',
				title: '名称',
			},
			{
				field: 'email',
				title: '邮箱',
			},
			{
				field: 'role_name',
				title: '角色',
				formatter: function(value, row, index) {
					var html = '一级导航';
					if (row.parent_id != 0) {
						html = ' ├ 多级栏目';
					}
					return html;
				}
			},
			{
				field: 'created_at',
				title: '创建时间',
				formatter: function(value, row, index) {
					var html = '一级导航';
					if (row.parent_id != 0) {
						html = ' ├ 多级栏目';
					}
					return html;
				}
			},
			{
				field: 'login_at',
				title: '登录时间',
				formatter: function(value, row, index) {
					var html = '一级导航';
					if (row.parent_id != 0) {
						html = ' ├ 多级栏目';
					}
					return html;
				}
			},
			{
				field: 'more',
				title: '编辑',
				width: 300,
				formatter: function(value, row, index) {
					var html = '<button type="button"  data-id=' + row.id + ' class="btn btn-primary btn-xs show_problem_detail radius readonly_btn">查看详情</button>&nbsp;';
					if (row.user_id != 0) {
						html = html + '<button data-id=' + row.id + ' type="button" class="btn btn-primary btn-xs show_problem_detail radius edit_btn">编辑</button>&nbsp;' +
								'<button data-id=' + row.id + ' type="button" class="btn btn-danger btn-xs show_problem_detail radius delete_btn">删除</button>';
					}
					return html;
				}
			}

		];
		console.log(111);

		tableInit();
		function tableInit() {
			$('#table-admins-list').bootstrapTable({
				columns: columns,
		//			detailView:true,
				striped: true,
		//			 search: true,
				pagination: true,
				pageList: [10],
				// 隐藏 checked 栏 头
				checkboxHeader: false,
				url: "{{ url('/admin/query_admin_list') }}",
				sidePagination: 'server',
				queryParams: function (params) {
					return {//这里的params是table提供的
						//从数据库第几条记录开始
						cp: params.offset,
						//找多少条
						ps: params.limit
					};
				},
				responseHandler: function(res){
					$('.sum').html(res.total);
					return res;
				}
			});
		}

		$('#cate-list-table').on('click', '.edit_btn', function () {
			var mode = $(this).data('id');
			system_category_edit('编辑', "{{ url('/admin/cate_add') }}?mode="+mode);
		});
		$('#cate-list-table').on('click', '.delete_btn', function () {
			var mode = $(this).data('id');
			system_category_del(this, mode, "{{ url('/admin/nav_delete') }}");
		});
		$('#cate-list-table').on('click', '.readonly_btn', function () {
			var mode = $(this).data('id');
			system_category_edit('查看详情', "{{ url('/admin/cate_detail') }}?type=readonly&mode="+mode)
		});

	</script>
@endsection