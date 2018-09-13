@extends('admin.layout.base')

@section('content')
    <section class="Hui-article-box">
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="page-container">
            <div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加角色','admin-role-add.html','800')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> <span class="r">共有数据：<strong class="sum">0</strong> 条</span> </div>
            <table class="table table-border table-bordered table-hover table-bg" id="table-role-list"></table>
        </div>
    </section>
@endsection

@section('js')
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
            field: 'name',
            title: '角色名称',
            width: 150
        },
        {
            field: 'admins',
            title: '用户列表',
            formatter: function(value, row, index) {
                var html = '';
                if (row.admins instanceof Array) {
                    for (i in row.admins) {
                       html +=  '<a href="#">' + row.admins[i].name + '</a>';
                       if (i != row.admins.length-1) {
                           html += ',';
                       }
                    }
                }
                return html;
            }
        },
        {
            field: 'admins',
            title: '描述',
            formatter: function(value, row, index) {

            }
        },
        {
            field: 'more',
            title: '编辑',
            width: 500,
            formatter: function(value, row, index) {
					console.log(row);
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
        $('#table-role-list').bootstrapTable({
            columns: columns,
    //			detailView:true,
            striped: true,
    //			 search: true,
            pagination: true,
            pageList: [10],
            // 隐藏 checked 栏 头
            checkboxHeader: false,
            url: "{{ url('/admin/query_role_list') }}",
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

    </script>
@endsection