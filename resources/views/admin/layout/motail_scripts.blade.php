<!-- Latest compiled and minified JavaScript -->
<script src="{{ URL::asset('js/sb_admin_2/bootstrap-table.min.js') }}"></script>

<!-- Latest compiled and minified Locales -->
<script src="{{ URL::asset('js/sb_admin_2/bootstrap-table-zh-CN.min.js') }}"></script>

<script type="text/javascript" src="/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap-ie.js"></script>
<script type="text/javascript" src="/js/layer/2.4/layer.js"></script>

<script type="text/javascript" src="/static/select2/dist/js/select2.full.js"></script>
<link type="text/css" rel="stylesheet" href="/static/select2/dist/css/select2.min.css" />
<script type="text/javascript" src="/js/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/js/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/js/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/js/jquery.validation/1.14.0/messages_zh.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>