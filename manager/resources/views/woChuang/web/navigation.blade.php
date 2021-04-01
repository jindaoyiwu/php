@extends('woChuang.web.layout')
@section('content')
<link href="{{env('APP_URL')}}/css/woChuang/bootstrap.css?v=1513240483" rel="stylesheet">
<link href="{{env('APP_URL')}}/css/woChuang/animate.css?v=1516675624" rel="stylesheet">
<link href="{{env('APP_URL')}}/css/woChuang/revision-common.css?v=1584012313" rel="stylesheet">
<link href="{{env('APP_URL')}}/css/woChuang/product.css?v=1575549371" rel="stylesheet">
<link href="{{env('APP_URL')}}/css/woChuang/article.css?v=1533696632" rel="stylesheet">
<link href="{{env('APP_URL')}}/css/woChuang/swiper-3.4.2.min.css?v=1513240483" rel="stylesheet">

<div class="row box-list">
    <div class="left-title">
        <ul>

            <li>
                <a href="/list/1.html">
                    工商服务 </a>
            </li>

            <li class="left-li-on">
                <a href="/list/82.html">
                    财税服务 </a>
            </li>

        </ul>
    </div>

    <div class="right-list" id="right-list">
        <div class="product-jihe">
            <div class="list-area" id="c-82-87">
                <div class="list-title">
                    <span><i></i>代理记账</span>
                </div>
                <ul>
                    <li>
                        <a href="https://m.juejinqifu.com/product-keep-accounts.html">
                            <h3>内资小规模代理记账（一年）</h3>
                            <p class="list-text">资深会计团队，深知各行业企业财税痛...</p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-Foreigntaxpayer.html">
                            <h3>外资小规模纳税人代理记账（1年）</h3>
                            <p class="list-text">资深会计团队，深知各行业企业财税痛...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;7,500</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-tally.html">
                            <h3>内资小规模代理记账（半年）</h3>
                            <p class="list-text">资深会计团队，深知各行业企业财税痛...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;2,100</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-Average-taxpaye.html">
                            <h3>内资一般纳税人代理记账</h3>
                            <p class="list-text">资深会计团队，深知各行业企业财税痛...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;7,200</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-Taxpayers.html">
                            <h3>内资一般纳税人代理记账（半年）</h3>
                            <p class="list-text">资深会计团队，深知各行业企业财税痛...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;3,900</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-Small-scale.html">
                            <h3>外资小规模纳税人代理记账（半年）</h3>
                            <p class="list-text">资深会计团队，深知各行业企业财税痛...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;3,900</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-Foreign-taxpaye.html">
                            <h3>外资一般纳税人代理记账（1年）</h3>
                            <p class="list-text">资深会计团队，深知各行业企业财税痛...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;24,300</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-Foreign-tax.html">
                            <h3>外资一般纳税人代理记账（半年）</h3>
                            <p class="list-text">资深会计团队，深知各行业企业财税痛...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;12,300</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="list-area" id="c-82-88">
                <div class="list-title">
                    <span><i></i>税务服务</span>
                </div>
                <ul>
                    <li>
                        <a href="https://m.juejinqifu.com/product-tax.html">
                            <h3>申办一般纳税人</h3>
                            <p class="list-text">资深会计团队，帮您快速申办一般纳税...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;500</span><span class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-annual-report.html">
                            <h3>内资公司企业年报</h3>
                            <p class="list-text">省时省力更省心，掘金企服帮您快速企...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;500</span><span class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-tax-control.html">
                            <h3>税控代办及票种核定</h3>
                            <p class="list-text">企业想开具发票？掘金企服帮您快速申...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;1,180</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-final-settlemen.html">
                            <h3>所得税汇算清缴</h3>
                            <p class="list-text">资深会计团队，深知各行业企业财税痛...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;500</span><span class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-guoshuibaodao.html">
                            <h3>国地税报道</h3>
                            <p class="list-text">资深会计团队，专业靠谱，保您安心。...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;600</span><span class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-shuikongfapiao.html">
                            <h3>申请税控</h3>
                            <p class="list-text">高效取得税控器...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;1,180</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-Fiscal-processo.html">
                            <h3>税控器解锁</h3>
                            <p class="list-text">资深会计团队，专业解决各种税务疑难...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;500</span><span class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-Tax-declaration.html">
                            <h3>报税系统解锁</h3>
                            <p class="list-text">资深会计团队，专业解决各种税务疑难...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;2,000</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-chukoutuishui.html">
                            <h3>出口退税（5-10单）</h3>
                            <p class="list-text">协助企业办理出口税退还，高至17%...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;1,500</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-tuishui.html">
                            <h3>出口退税（10-20单）</h3>
                            <p class="list-text">协助企业办理出口税退还，高至17%...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;1,800</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-JCtuishui.html">
                            <h3>出口退税（20-30单）</h3>
                            <p class="list-text">协助企业办理出口税退还，高至17%...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;2,100</span><span
                                        class="price-from">起</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="list-area" id="c-82-89">
                <div class="list-title">
                    <span><i></i>税收筹划</span>
                </div>
                <ul>
                    <li>
                        <a href="https://m.juejinqifu.com/product-shch.html">
                            <h3>企业节税包</h3>
                            <p class="list-text">根据用户实际需求有针对性进行纳税筹...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;19,800</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-lwsrchfa.html">
                            <h3>劳务收入筹划方案</h3>
                            <p class="list-text">企业与个人发生经营性业务后，协助个...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-tzsychfa.html">
                            <h3>投资收益筹划方案</h3>
                            <p class="list-text">解决股权转让个税过高、办理环节复杂...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-jzhychfa.html">
                            <h3>建筑行业筹划方案</h3>
                            <p class="list-text">解决企业经营中现金流不畅、利润虚高...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-ylhychfa.html">
                            <h3>医疗行业筹划方案</h3>
                            <p class="list-text">解决企业现金流不畅、利润虚高、负税...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-lhyg.html">
                            <h3>灵活用工</h3>
                            <p class="list-text">降低企业用工成本，规避企业风险，为...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-grhsdlsb.html">
                            <h3>个人汇算代理申报</h3>
                            <p class="list-text">购买三件，每件低至298元！...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;498</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-grjsb.html">
                            <h3>个人节税包</h3>
                            <p class="list-text">专业税收筹划，为高收入人群合理节税...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="list-area" id="c-82-141">
                <div class="list-title">
                    <span><i></i>财务外包</span>
                </div>
                <ul>
                    <li>
                        <a href="https://m.juejinqifu.com/product-caishuizixun.html">
                            <h3>财税咨询（小微企业）</h3>
                            <p class="list-text">及时解答财务、税收及行业政策变化中...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-zixun.html">
                            <h3>财税咨询（中型企业）</h3>
                            <p class="list-text">及时解答财务、税收及行业政策变化中...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-caizixun.html">
                            <h3>财税咨询（专项咨询版）</h3>
                            <p class="list-text">合理纳税筹划，降低税收风险，个性化...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;1,000</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-zixuncaishui.html">
                            <h3>财税咨询（顾问定制版）</h3>
                            <p class="list-text">合理纳税筹划，降低税收风险，个性化...</p>
                            <p class="list-money">
                                <span><span class="price-money">&yen;1,980</span></span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-lsjz.html">
                            <h3>连锁企业</h3>
                            <p class="list-text">解决跨区难题，一键开启连锁企业无忧...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-dzxqy.html">
                            <h3>财税咨询（大中型企业）</h3>
                            <p class="list-text">及时解答财务、税收及行业政策变化中...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-chunawaibao.html">
                            <h3>出纳外包</h3>
                            <p class="list-text">现金管理精确，委派具备4年（或以上...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-xinchouguanli.html">
                            <h3>薪酬管理</h3>
                            <p class="list-text">为您的薪酬、社保福利、人力资源管理...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-feiyongbaoxiao.html">
                            <h3>费用报销审核</h3>
                            <p class="list-text">责任明确，并可以追究，避免因会计人...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-kuaijipingzheng.html">
                            <h3>会计凭证装订整理</h3>
                            <p class="list-text">为了提高您的会计账册凭证管理质量，...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-yingshouzhangku.html">
                            <h3>应收账款核算</h3>
                            <p class="list-text">往来款项清晰，更优化的账龄设置及分...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-yingfuzhangkuan.html">
                            <h3>应付账款核算</h3>
                            <p class="list-text">我们提供多元化的实用和技术性支援，...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-waiqishenbao.html">
                            <h3>外资企业税务申报（公司人数200人以内）</h3>
                            <p class="list-text">政府审批，专业正规，纳税申报及时准...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-fangdichan.html">
                            <h3>房地产案场外包</h3>
                            <p class="list-text">突出主营业务，接触新管理理念的便捷...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-hesuanwaibao.html">
                            <h3>会计核算外包</h3>
                            <p class="list-text">可享受多个会计人员的专业化团队服务...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://m.juejinqifu.com/product-duanqiwaibao.html">
                            <h3>短期会计业务外包</h3>
                            <p class="list-text">避免员工产假期间由其他员工分担工作...</p>
                            <p class="list-money">
                                <span>面议</span>
                                <small>交易成功：0</small>
                            </p>
                            <i class="arrow-icon glyphicon glyphicon-menu-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="slogin">
            <img src="{{env('APP_URL')}}/upload/mobiel-logo1-png_06.png" alt="掘金企服">
            <img src="{{env('APP_URL')}}/upload/phone-png_03.png" alt="掘金企服">
        </div>
    </div>
</div>
<!--弹框-->
<!--服务列表-->
<div class="popup-box"></div>

<div class="side-btn clearfloat" id="slide-btn">
    <div class="telephone" id="tel-click">
        <a href="tel:400-6060-999" class="mobile-index-phone">
            <span></span>
            <p>电话</p>
        </a>
    </div>
    <div class="back-top">
        <a href="javascript:void(0);">
            <span></span>
        </a>
    </div>
</div>
<script src="{{env('APP_URL')}}/js/woChuang/jquery-1.11.3.min.js?v=1513240483"></script>
<script src="{{env('APP_URL')}}/js/woChuang/bootstrap.js?v=1513240483"></script>
<script src="{{env('APP_URL')}}/js/woChuang/popup.js?v=1530688137"></script>
<script src="{{env('APP_URL')}}/js/woChuang/resize.js?v=1574226134"></script>
<script src="{{env('APP_URL')}}/js/woChuang/swiper-3.4.2.jquery.min.js?v=1513240483"></script>
<meta name="shenma-site-verification" content="64e4b74e271de23df134f521f5cdb333_1557037715">

<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?6c41c9f53593d35b2bb1113730d05d9e";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

<script>
    (function () {
        var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?fc73f49d67c80b3be53e8da8e33373c2" : "https://jspassport.ssl.qhimg.com/11.0.1.js?fc73f49d67c80b3be53e8da8e33373c2";
        document.write('<script src="' + src + '" id="sozz"><\/script>');
    })();
</script>
@stop
