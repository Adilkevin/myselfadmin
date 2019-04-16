function getAjax(url, data) {
    $.ajax({
       type: "GET",
       url: url,
       data: data,
       success: function(msg){
         alert( "Data Saved: " + msg );
       }
    });

    return false;
}

function postAjax(url, data) {
    $.ajax({
       type: "POST",
       url: url,
       data: data,
       success: function(msg){
         alert( "Data Saved: " + msg );
       }
    });

}

//封装alert方法
//type弹出层的类型 success   info   danger   warning
function alertMsg(data, type){
    var class_name = '.alert-' + type;
    var that = $('#bootstrap-alert').find(class_name);
    that.css({display: 'block'}).addClass('fadeInRightBig');

    setTimeout(function(){
        that.removeClass('fadeInRightBig').addClass('fadeOutRight');

    },3000)
}


