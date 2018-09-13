@extends('admin.layout.base')

@section('content')
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 栏目管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
		<div class="pd-20 text-c">
			<div class="text-c">
				<input type="text" name="" id="" placeholder="栏目名称、id" style="width:250px" class="input-text">
				<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="system_add('添加类型','{{ url('/admin/types_add') }}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加类型</a></span> <span class="r">共有数据：<strong class="sum">0</strong> 条</span> </div>
			<div class="mt-20">
				<table id="mytable" class="table table-border table-bordered table-hover table-bg table-sort"></table>
			</div>
		</div>

</section>
@endsection

@section('js')
	<script type="text/javascript" src="/js/My97DatePicker/4.8/WdatePicker.js"></script>
	<script type="text/javascript" src="/js/datatables/1.10.0/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="/js/laypage/1.2/laypage.js"></script>
	<script type="text/javascript">
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
				field: 'name',
				title: '类型名称',
			},
			{
				field: 'more',
				title: '编辑',
				width: 500,
				formatter: function(value, row, index) {
//					console.log(row);
					var html = '<button type="button"  data-id=' + row.id + ' class="btn btn-primary btn-xs show_problem_detail radius readonly_btn">查看详情</button>&nbsp;';
					if (row.user_id != 0) {
						html = html + '<button data-id=' + row.id + ' type="button" class="btn btn-primary btn-xs show_problem_detail radius edit_btn">编辑</button>&nbsp;' +
								'<button data-id=' + row.id + ' type="button" class="btn btn-danger btn-xs show_problem_detail radius delete_btn">删除</button>';
					}
					return html;
				}
			}

		];
		tableInit();
		function tableInit() {
			$('#mytable').bootstrapTable({
				columns: columns,
		//			detailView:true,
				striped: true,
		//			 search: true,
				pagination: true,
				pageList: [10],
				// 隐藏 checked 栏 头
				checkboxHeader: false,
				url: "{{ url('/admin/query_types_list') }}",
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

        $('#mytable').on('click', '.edit_btn', function () {
			var mode = $(this).data('id');
			system_edit('编辑类型', "{{ url('/admin/cate_add') }}?mode="+mode);
        });
		$('#mytable').on('click', '.delete_btn', function () {
			var mode = $(this).data('id');
			system_del(this, mode, "{{ url('/admin/types_delete') }}");
        });
		$('#mytable').on('click', '.readonly_btn', function () {
			var mode = $(this).data('id');
			system_edit('查看类型', "{{ url('/admin/types_add') }}?type=readonly&mode="+mode)
        });
	</script>
@endsection