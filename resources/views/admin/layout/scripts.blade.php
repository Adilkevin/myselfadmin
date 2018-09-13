<!-- Latest compiled and minified JavaScript -->
<script src="{{ URL::asset('js/sb_admin_2/bootstrap-table.min.js') }}"></script>

<!-- Latest compiled and minified Locales -->
<script src="{{ URL::asset('js/sb_admin_2/bootstrap-table-zh-CN.min.js') }}"></script>

<script type="text/javascript" src="/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap-ie.js"></script>
<script type="text/javascript" src="/js/layer/2.4/layer.js"></script>


{{--设置csrf--}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showAlertBox(msg = "", type = "info")
    {
        var alertClass = "alert-info";
        switch (type)
        {
            case "info":
                alertClass = "alert-info";
                break;
            case "warning":
                alertClass = "alert-warning";
                break;
            case "error":
                alertClass = "alert-danger";
                break;
            default:
                break;
        }

        var elAlert = "<div id=\"divAlertBox\" class=\"alert " + alertClass + " alert-dismissible\" role=\"alert\">\n" +
            "                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\n" +
            "                <strong></strong> <span class=\"alert\">" + msg + "</span>\n" +
            "            </div>";

        $('#message').append(elAlert);

        var alertBoxTimer = setTimeout(closeAlertBox, 3000);
    }

    /*系统-栏目-添加*/
    function system_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*系统-栏目-编辑*/
    function system_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*系统-栏目-删除*/
    function system_del(obj,id, url){
        layer.confirm('确认要删除吗？',function(index){
            deleteThis(obj, id, url);
        });
    }

    function deleteThis(obj, id, url) {
        $.post(url, {id: id},
            function(msg){
            console.log(msg);
                if (msg.status == 1)
                {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000},function(){
                        window.location.reload();
                    });
                }
                else
                {
                    layer.msg('删除失败!',{icon:2,time:1000});
                }

            }
        );
    }
</script>