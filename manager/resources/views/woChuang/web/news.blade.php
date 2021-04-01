@extends('woChuang.web.layout')
@section('content')
    <link href="http://manager.com/css/woChuang/bootstrap.css?v=1513240666" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/animate.css?v=1516675612" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/revision-common.css?v=1584012305" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/product.css?v=1575549369" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/article.css?v=1533696630" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/layer.css?v=1574226129" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/swiper-3.4.2.min.css?v=1513240666" rel="stylesheet">
    <!--文章列表-->
    <div class="article">

        <div class="article-content">
            <div
                class="swiper-container swiper-container-horizontal swiper-container-autoheight swiper-container-android">
                <div class="swiper-wrapper">
                    <!-- 全部 -->
                    <div class="swiper-slide swiper-slide-active" id="all" style="width: 329px;">
                        <ul class="article-list">
                            @foreach($data['result'] as $v)
                                @if(strpos($v['title'], '掘金') !== false)
                                    @continue
                                @endif
                            <li>
                                <a href="https://m.juejinqifu.com/information-11405.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left">
                                            <img src="{{$v['image']}}"
                                                width="120" height="85" alt=""></div>
                                        <div class="article-item-right"><p>{{$v['created_at']}}</p><h4>{{$v['title']}}</h4>
                                            <span>{{$v['description']}}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
{{--                        <div class="article-more">--}}
{{--                            <a href="javascript:;" class="more-and-more" data-num="3">更多动态<i class="glyphicon glyphicon-menu-down"></i></a>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="swiper-pagination" style="display: none;"></div>
            </div>
        </div>
    </div>
    <script src="http://manager.com/js/woChuang/jquery-1.11.3.min.js?v=1513240666"></script>
    <script src="http://manager.com/js/woChuang/bootstrap.js?v=1513240666"></script>
    <script src="http://manager.com/js/woChuang/popup.js?v=1530688133"></script>
    <script src="http://manager.com/js/woChuang/resize.js?v=1574226129"></script>
    <script src="http://manager.com/js/woChuang/swiper-3.4.2.jquery.min.js?v=1513240666"></script>
@stop
