<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<script type="text/javascript" src="/js/1.9.1/jquery.min.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="/js/html5shiv.js"></script>
<script type="text/javascript" src="/js/respond.min.js"></script>
<![endif]-->
<link href="/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/css/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="/js/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台登录</title>
</head>
<body>
    <input type="hidden" id="TenantId" name="TenantId" value="" />
    <div class="header"></div>
    <div class="loginWraper">
      <div id="loginform" class="loginBox">
        <form class="form form-horizontal"  action="{{ url('/admin/login') }}"  method="post" id="form-login">
          @csrf
          <div class="row cl">
            <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
            <div class="formControls col-xs-8">
              <input id="" name="username" type="text" placeholder="账户" class="input-text size-L">
            </div>
          </div>
          <div class="row cl">
            <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
            <div class="formControls col-xs-8">
              <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
            </div>
          </div>
          <div class="row cl">
            <div class="formControls col-xs-8 col-xs-offset-3">
              <input class="input-text size-L" name="captcha" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
              <img class="captcha" src="{{captcha_src()}}"> <a onclick="refresh()" id="kanbuq" href="javascript:;">看不清，换一张</a>
            </div>
          </div>
          <div class="row cl">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          </div>
          <div class="row cl">
            <div class="formControls col-xs-8 col-xs-offset-3">
              <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
              <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
            </div>
          </div>
        </form>
      </div>
    </div>

<script>
    function refresh() {
        var randoms = Math.random();
        $('.captcha').attr('src', "{{captcha_src()}}"+randoms);
    }
    $("#form-login").validate({
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
                min: 6,
            },
            captcha: {
                required: true,
            }
        },
        onkeyup: false,
        focusCleanup: true,
        success: "valid",
        submitHandler: function (form) {

        }
    })

</script>



</body>
</html>