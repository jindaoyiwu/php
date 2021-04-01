<!DOCTYPE html>
<!-- saved from url=(0025)https://m.juejinqifu.com/ -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, viewport-fit=cover">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="csrf-param" content="_csrf-mobile">
    <meta name="csrf-token"
          content="75d_a1qsxgabI2OVDD76tg26wn2HFz3ijOabVbB1ma2J3kkyN-2ccvxJEcU9ap_1WNmTLuxcCZHZocECyhTY_Q==">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <!--//强制竖屏-->
    <meta name="x5-orientation" content="portrait">
    <meta name="screen-orientation" content="portrait">
    <meta content="telephone=no" name="format-detection">
    <title>北京公司注册_代理记账_注册公司_建筑资质-【掘金企服】一站式创业服务平台</title>
    <meta name="description"
          content="掘金企服提供北京公司注册,北京代理记账,北京注册公司,代办注册商标,北京建筑资质等服务,为企业提供“从创业到上市”全生命周期服务,服务热线400-6060-999.">
    <meta name="keywords" content="北京公司注册,北京注册公司,北京代理记账,北京建筑资质,北京商标注册,互联网资质,掘金企服">
</head>
<body>
<div class="public-head-one clear-fix">
    <div class="public-head-logo">
        <a href="https://m.juejinqifu.com/">
            <img src="{{env('APP_URL')}}/upload/head-logo.png" alt="掘金企服">
        </a>
    </div>
    <div class="public-head-phone">
        <a href="tel:400-6060-999">400-6060-999</a>
    </div>
</div>
@yield('content')
<div class="footer">
    <ul class="row" id="hFive" style="padding-bottom: 34px; display: block;">
        <li class="col-xs-3 active-footer" onclick="selection()">
            <a href="{{env('APP_URL')}}/front/woChuang/index">
                <i class="home-icon1"></i>
                <span>首页</span></a>
        </li>
        <li class="col-xs-3" onclick="selection()">
            <a href="{{env('APP_URL')}}/front/woChuang/navigation">
                <i class="category-icon1"></i>
                <span>分类</span></a>
        </li>
        <li class="col-xs-3" onclick="selection()">
            <a href="{{env('APP_URL')}}/front/woChuang/news">
                <i class="car-icon1"></i>
                <span>动态</span></a>
        </li>
    </ul>
</div>
</body>
</html>
<script>
    function selection(){
        this.setAttribute("class", "col-xs-3 active-footer");
        const p = this.parentNode.children; //获取父级的所有子节点
        for(let i = 0; i < p.length; i++){  //循环
            if(p[i].nodeType == 1 && p[i] != this){  //如果该节点是元素节点与不是这个节点本身
                console.log(p[i]);
                p[i].setAttribute("class", "col-xs-3");
            }
        }
    }
</script>
