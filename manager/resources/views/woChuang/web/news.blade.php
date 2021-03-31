@extends('woChuang.web.layout')
@section('content')
    <link href="http://manager.com/css/woChuang/bootstrap.css?v=1513240666" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/animate.css?v=1516675612" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/revision-common.css?v=1584012305" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/product.css?v=1575549369" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/article.css?v=1533696630" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/layer.css?v=1574226129" rel="stylesheet">
    <link href="http://manager.com/css/woChuang/swiper-3.4.2.min.css?v=1513240666" rel="stylesheet">
    <div class="public-head-one clear-fix">
        <div class="public-head-logo">
            <a href="/">
                <img src="http://manager.com/upload/head-logo.png" alt="掘金企服">
            </a>
        </div>
        <div class="public-head-phone">
            <a href="tel:400-6060-999">400-6060-999</a>
        </div>

    </div>
    <div class="public-head-two">
        <div class="public-head-two-search">
            <p class="clear-fix">
                <i></i>
                <span>请输入您要搜索的商品</span>
            </p>
        </div>
        <div class="public-head-two-phone">
            <a href="tel:400-6060-999"></a>
        </div>
    </div>
    <div class="search-popup">
        <div class="search">
            <div class="search-box">
                <div class="search-section clear-fix">
                    <form action="/search/index.html" method="get">
                        <div class="form-group">
                            <label class="sr-only" for="keyword">关键词</label>
                            <input type="text" name="keyword" value="" placeholder="请输入您要搜索的商品"> <i></i>
                        </div>
                        <!--              <button type="submit">搜索</button>-->
                        <div class="back-on">
                            <a class="close-search">取消</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="search-main clear-fix">
                <p>热搜商品：</p>
                <ul class="clear-fix">
                    <li><a href="http://www.juejinqifu.com">北京公司注册</a></li>
                    <li><a href="http://www.juejinqifu.com/product-internet_third.html">等级保护</a></li>
                    <li><a href="https://m.juejinqifu.com/product-nzgs-cancel.html">公司注销</a></li>
                    <li><a href="http://www.juejinqifu.com/topic-icp-incence.html">ICP许可证</a></li>
                    <li><a href="http://www.juejinqifu.com/list-120-148">双软认定</a></li>
                    <li><a href="https://m.juejinqifu.com/product-jianwei.html">建筑资质</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--文章列表-->
    <div class="article">

        <div class="article-content">
            <div
                class="swiper-container swiper-container-horizontal swiper-container-autoheight swiper-container-android">
                <div class="swiper-wrapper"
                     style="height: 2137px; transform: translate3d(-658px, 0px, 0px); transition-duration: 0ms;">

                    <!-- 全部 -->
                    <div class="swiper-slide swiper-slide-active" id="all" style="width: 329px;">
                        <ul class="article-list">
                            <li><a href="https://m.juejinqifu.com/information-11405.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20210326-1616746115.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2021-03-26</p><h4>H&amp;M抵制新疆棉花事件惹怒网友，中国用一项项政策说明什么是大国态度！</h4>
                                            <span>近日，H&amp;M集团在其官网发布的一份声明闹的沸沸扬扬，引发网友关注。H&amp;M集团以所谓“强迫劳动”的谣言为借口，声称将“抵制新疆棉花和纺工厂”。随后，曝耐克阿迪也开始抵制新疆棉花！</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11402.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20210310-1615345692.png?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2021-03-10</p><h4>总理说了：3月1日起，企业可以自由“取名”，
                                                企业名称受保护！</h4><span>国务院总理李克强签署国务院令，公布《企业名称登记管理规定》，自2021年3月1日起实施。《规定》明确，企业名称由申请人自主申报。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11400.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20210226-1614332887.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2021-02-26</p><h4>
                                                《你好，李焕英》票房破44亿，关注贾玲票房分成的人又被大碗娱乐的股权分配惊艳了</h4><span>数据显示，截止2月25日16：00，中国影史前三名分别是《战狼2》56.94亿，《哪吒之魔童降世》50.36亿，《流浪地球》46.88亿。《你好，李焕英》目前票房为44.37亿，以现在的票房涨势，可能成为中国影史排名第三或者更高。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11399.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20201211-1607681885.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-12-11</p><h4>公司上市的好处有哪些？</h4><span>我们身边有不少朋友在经济周转困难的时候都会选择借贷宝这个互联网金融平台来应急。那么，借贷宝具体是什么呢？它是由人人行科技股份有限公司开发的服务互联网金融平台，主要服务于熟人之间的借贷。以出借人匿名、借款人实名的借贷模式，使借款人拿到借款。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11395.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20201211-1607681034.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-12-11</p><h4>如今税务注销更简便了，没有注销的赶紧来</h4>
                                            <span>为了解决纳税人这些诉求，此次注销改革应运而生。悟空财税专家作出解释：此次改革很大程度扩大了简易注销的范围。
对于上述情况及一些资料齐全且没有欠税、罚款等的，纳税人去税务机关办理清税的，税务机关应即时出具清税文书。</span></div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11394.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20201211-1607676934.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-12-11</p><h4>在我们日常做账时哪些人的车票不能抵扣增值税?</h4>
                                            <span>在我们真实入账时，相信大家都遇到过很多火车票，停车票以及一些车费类的专用发票，这类的增值税发票，那么究竟是不是企业所有职员取得的增值税发票都可以抵扣增值税呢?下面我想说一点自己的总结和看法，由我们一起来讨论学习吧！</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11393.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20201125-1606305313.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-11-25</p><h4>
                                                掘金集团“收官之战，强者必胜”11月启动会圆满召开</h4><span>不知不觉，11月悄然而至，如果你问我“有没有为谁拼过命？”，我的答案是肯定的。细数10月份的每一个日日夜夜，不曾有半分懈怠。双节联动8天假过后，每个人都在拼命地赶时间，想在不影响服务质量的情况下超额完成任务，就需要每个人、每个团队付出更多的努力和精力。所有的这些点滴10月，全部被11月启动会开场视频所记录，看着镜头下的自己，掘金人露出了满意的笑容。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11390.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20201118-1605687048.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-11-18</p><h4>掘金集团第十六期财税公开课（北京站）圆满结束</h4>
                                            <span>不知不觉来到了第四季度，也就预示着因为疫情而出台的财税政策即将结束。对于想要跨过2020年这个不平凡的一年的人来说，这或许是个好消息。但是对于那些因为疫情而影响收益的企业来说，时间未免紧张了些。还没好好感受政策的好，这一年就要过去了。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11389.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20201111-1605079029.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-11-11</p><h4>
                                                中秋节公司买了5000元购物卡，应该怎样入账？</h4><span>国庆中秋双节刚过，企业难免会遇到购物卡的业务，好多会计人员还是在购物卡的账务处理上拿不准，甚至直接将购买购物卡的支出一次性计入了当期损益，其实这是错误的，在这里，小编总结了5笔会计处理，不同的处理方式，对能否进行企业所得税税前扣除也是有很大影响的哦，供大家参考。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11388.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20201111-1605078277.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-11-11</p><h4>个人医保即将取消</h4><span>目前，财政部和国家医疗保险管理局联合发布了《2019年城乡居民基本医疗工作通知》。健康保险个人账户的维持决定已经最终确定。2020年底取消，这一政策实现了门诊平稳过渡。如果个人账户被取消，将无法恢复。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11387.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20201111-1605077078.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-11-11</p><h4>大征期报税注意事项</h4><span>许多公司一般不开票，也没有员工在北京买房买车之类的，就会直接选择零申报，因为在之前工资超过了5000，不但要交个税，残保金的缴纳就是按照全年平均工资的百分比缴纳的，所以在公司没有什么业务，也不用抵所得税时就会选择零申报工资。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11386.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20201015-1602733539.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-10-15</p><h4>新手不懂个税预扣预缴，可以进来看看！</h4>
                                            <span>应届毕业生离开校园已经有一段时间了，很多伙伴已入职心仪的公司。今天小编来说说关于个税的扣除。对于一个今年入职，首次取得工资所得的小伙伴，在申报预扣预缴个人所得税时，可按照5000元/月乘以纳税人当年截至本月月份数计算累计减除费用。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11385.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20201015-1602726860.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-10-15</p><h4>
                                                “直播”行业或为“顶流”，财税规划也是重中之重！</h4><span>8月28日，王祖蓝将在苏宁抖音“超级买手直播间”直播带货，所有带货商品均来自苏宁易购，消费者在下单时无需跳转，可在抖音小店中完成购买。其中，针对“抖音将不支持第三方来源商品”的消息，抖音相关负责人表示，为进一步保护消费者权益，平台将加强直播带货管控。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11384.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20201015-1602726112.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-10-15</p><h4>​带你了解2020年上半年实施的发票新规</h4>
                                            <span>2020年是不平凡的一年，在经历年初的疫情后，国家出台了一系列的政策助力中小微企业成长，目的使企业受到的疫情影响降到最低，例如，公司承担的社保三险减免，小规模纳税人的增值税税率降到1%，发票新规等。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11383.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20200914-1600084356.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-09-14</p><h4>近期税收优惠政策，让您合理节税</h4><span>根据国内经济的卓越的发展，税收的政策也是日异月新，只有不断学习新的政策紧跟国家的脚步，企业才能发展的日益壮大。下面是近期税收的新政的解读：</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11382.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20200914-1600072688.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-09-14</p><h4>身边有趣的会计小知识，你有没有中招！</h4>
                                            <span>大家都觉得会计是一门比较难懂复杂的学问，甚至和我们日常当中的算数完全靠不上边。但作为整个社会科学中很重要的一员，就预示了一些规则内容的变化速度和程度比自然科学要快很多，但总体来说作为文科同学最中意的学科，还是有其好处的。有的时候，懂一些基础的会计知识，会在实际运用中发挥着重要的作用。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11381.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20200827-1598529617.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-08-27</p><h4>公司储备管理训练营第一期开营</h4><span>为全面提升公司管理人员的管理素养和能力，夯实基层服务管理基础，保持管理团队的竞争力和健康轮转，经过充分的酝酿和综合衡量，公司储备管理训练营于8月14日开营，训练营采取各部门推荐报名的方式，经过毛遂自荐、初选考核、复审、导师推荐等环节，从众多报名者中选拔出30位储备管理者，开展为期一个月的培训历程。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11380.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20200827-1598529387.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-08-27</p><h4>掘金集团管理层"3ⁿ"产品特训营活动圆满结束</h4>
                                            <span>2020年对国家来讲是不平凡的一年，对掘金集团来讲也是。应对疫情，掘金集团积极响应国家号召，做到了不裁员不降薪不给社会添负担的承诺。同时在疫情最为严重的时期，还为各中小微企业免费赠送口罩，助力更多企业复产复工。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11379.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20200821-1598001902.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-08-21</p><h4>
                                                瑞幸咖啡现金流转正、4000家门店恢复运营，所有的好事从注册商标开始</h4><span>提到瑞幸咖啡，消费者第一时间会想到平民价、融资、明星代言，然后是高层辞职、财务造假、行政处罚、不正当竞争等负面消息，2020年似乎对瑞幸不太友好，负面新闻掩盖了之前所有的投入。</span>
                                        </div>
                                    </div>
                                </a></li>
                            <li><a href="https://m.juejinqifu.com/information-11378.html">
                                    <div class="article-item clear-fix">
                                        <div class="article-item-left"><img
                                                src="https://bj-qifu-images.oss-cn-beijing.aliyuncs.com/information/20200820-1597889285.jpg?x-oss-process=image/resize,m_fill,h_170,w_240,limit_0/auto-orient,0"
                                                width="120" height="85"></div>
                                        <div class="article-item-right"><p>2020-08-20</p><h4>公司注销怎么办理，注销与吊销有什么区别？</h4>
                                            <span>公司注销是指公司在经营期限内想要停止经营，依法宣布解散且到相关机关申请停止经营的状态。注销是企业合法退出市场的唯一方式。</span>
                                        </div>
                                    </div>
                                </a></li>
                        </ul>
                        <div class="article-more">
                            <a href="javascript:;" class="more-and-more" data-num="3">更多动态<i
                                    class="glyphicon glyphicon-menu-down"></i></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination" style="display: none;"></div>
            </div>
        </div>
    </div>

    <div class="footer">
        <ul class="row" id="hFive" style="padding-bottom: 34px">
            <li class="col-xs-3">
                <a href="/">
                    <i class="home-icon1"></i>
                    <span>首页</span></a>
            </li>
            <li class="col-xs-3">
                <a href="/list/128.html">
                    <i class="category-icon1"></i>
                    <span>分类</span></a>
            </li>
            <li class="col-xs-3 active-footer">
                <a href="/information/list.html">
                    <i class="car-icon1"></i>
                    <span>动态</span></a>
            </li>
            <li class="col-xs-3">
                <a href="/user/home.html">
                    <i class="my-icon1"></i>
                    <span>我的</span></a>
            </li>
        </ul>
        <ul class="row" id="wechatBar">
            <li class="col-xs-3">
                <a href="/">
                    <i class="home-icon1"></i>
                    <span>首页</span></a>
            </li>
            <li class="col-xs-3">
                <a href="/list/128.html">
                    <i class="category-icon1"></i>
                    <span>分类</span></a>
            </li>
            <li class="col-xs-3">
                <a href="tel:400-6060-999" class="mobile-index-phone">
                    <i class="car-icon1"></i>
                    <span>咨询</span></a>
            </li>
            <li class="col-xs-3 active-footer">
                <a href="/information/list.html">
                    <i class="dynamic-icon1"></i>
                    <span>动态</span></a>
            </li>
            <li class="col-xs-3">
                <a href="/user/home.html">
                    <i class="my-icon1"></i>
                    <span>我的</span></a>
            </li>
        </ul>
    </div>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.3.2.js"></script>

    <script src="http://manager.com/js/woChuang/jquery-1.11.3.min.js?v=1513240666"></script>
    <script src="http://manager.com/js/woChuang/bootstrap.js?v=1513240666"></script>
    <script src="http://manager.com/js/woChuang/popup.js?v=1530688133"></script>
    <script src="http://manager.com/js/woChuang/resize.js?v=1574226129"></script>
    <script src="http://manager.com/js/woChuang/swiper-3.4.2.jquery.min.js?v=1513240666"></script>
@stop
