@extends('admin.layout.base')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ $breadcrumb['current'] }}</h2>
            <ol class="breadcrumb">
                @foreach ($breadcrumb as $key => $item)
                    <li>
                        @if ($key == 'current' || $key == '#')
                            <strong>{{ $item }}</strong>
                        @else
                            <a href="{{ $key }}">{{ $item }}</a>
                        @endif
                    </li>
                @endforeach
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="ibox-content">
                            <div class="text-center">
                                <a data-toggle="modal" class="btn btn-primary" href="#modal-form">添加角色</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r">
                                                    <h3 class="m-t-none m-b">添加角色</h3>

                                                    <p>Tomorrow will be better.</p>

                                                    <form role="form">
                                                        <div class="form-group">
                                                            <label>角色名称</label>
                                                            <input type="text" placeholder="填写角色名称" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>说明</label>
                                                            <input type="text" placeholder="填写说明" class="form-control">
                                                        </div>
                                                        <div>
                                                            <button id="add-role-button" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                                                <strong>提交</strong>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--modal--}}
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <input type="text" class="form-control input-sm m-b-xs" id="filter"
                               placeholder="Search in table">

                        <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>角色名称</th>
                                <th data-hide="phone,tablet">说明</th>
                                <th data-hide="phone,tablet">创建时间</th>
                                <th>编辑</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $value)
                                <tr class="gradeX">
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td class="center">{{ $value->created_at }}</td>
                                    <td class="center">X</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- FooTable -->
    <script src="{{ URL::asset('js/plugins/footable/footable.all.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    {{--<script src="{{ URL::asset('js/inspinia.js') }}"></script>--}}
    <script src="{{ URL::asset('js/plugins/pace/pace.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.footable').footable();
        });

        $('#add-role-button').click(function () {
            console.log(111);
            var url = "{{ URL::asset('api/role/add-role-ajax') }}";
            alertMsg('ceshi', 'info')

//            postAjax(url, '111');
        });
    </script>
@endsection