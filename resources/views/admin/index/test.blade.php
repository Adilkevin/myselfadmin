<html>

<head>
	{{--<title>test highlight</title>--}}
	<title>我的上传实施</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script type="text/javascript" src="/js/jquery-3.1.0.min.js"></script>

	<!--highlighter-->
	{{--<link type="text/css" rel="stylesheet" href="/syntaxhighlighter/styles/shCore.css" />--}}
	{{--<link type="text/css" rel="stylesheet" href="/syntaxhighlighter/styles/shThemeDefault.css" />--}}
	{{--<script type="text/javascript" src="/syntaxhighlighter/scripts/shCore.js"></script>--}}
	{{--<script type="text/javascript" src="/syntaxhighlighter/scripts/shAutoloader.js"></script>--}}
	{{--<script type="text/javascript" src="/syntaxhighlighter/highlightCode.js"></script>--}}

	{{--<link href="/uploadify/uploadify.css" rel="stylesheet" type="text/css" />--}}
	{{--<script type="text/javascript" src="/uploadify/jquery.uploadify.js"></script>--}}



</head>

<body>

{{--<div>
    <input type="file" name="FileUpload" id="FileUpload">
    <a class="layui-btn layui-btn-mini" id="btn_uploadimg">上传图片</a>
</div>--}}

<script src="/js/vue.js"></script>

<script src="http://www.daimajiayuan.com/member/templets/js/jquery.zclip.min.js"></script>



<input type="text" value="www.baidu.com" id="link">
<span id="copyBtn">复制链接</span>

<script>
    $('#copyBtn').zclip({
        copy: function () {//复制内容
            return $('#link').val();
        },
    });

    /*function shagua() {
        this.name = 'shagua';
    }

    function Person(){
        this.name = 'super';
    }
    Person.prototype = new shagua();

    Person.prototype.getName = function(){
        return this.name;
    }

    function Someone(){
        this.son = 'my son';
    }
    Someone.prototype = new Person();
    Someone.prototype.getSonStatus = function(){
        alert(this.son);
        console.log(this.son);
        return '1111';
    }
    var instance = new Someone();
    alert(instance.getName());
    console.log(shagua.name);
    console.log(instance.getSonStatus());
    console.log(instance);*/

//    function Person(name){
//        this.name = name;
//    }
//    Person.prototype.getName = function(){
//        return this.name;
//    }
//    function Someone(){
//        this.son = true;
//        Person.call(this,'Peter');
//    }
//    Someone.prototype.getSonStatus = function(){
//        alert(this.son);
//    }
//    var instance = new Someone();
//    alert(instance.name);
</script>

</body>


</html>