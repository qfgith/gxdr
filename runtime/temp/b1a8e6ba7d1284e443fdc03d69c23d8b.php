<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"D:\wokerplace\gongxin.com\public/../app/home\view\index.html";i:1535538470;s:61:"D:\wokerplace\gongxin.com\public/../app/home\view\header.html";i:1535540029;s:61:"D:\wokerplace\gongxin.com\public/../app/home\view\footer.html";i:1535538215;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if(isset($site_title)): ?><?php echo $site_title; ?>-<?php endif; ?><?php echo $webset['site_title']; ?></title>
    <link rel="stylesheet" href="__GX__\lib\bootstrap-3.3.7\css\bootstrap.min.css">
    <link rel="stylesheet" href="__GX__\lib\swiper-4.3.3\css\swiper.min.css">
    <link rel="stylesheet" href="__GX__\asset\css\style.css">
    <meta name='keywords' value="<?php echo $webset['seo_title']; ?>">
    <meta name='description' value="<?php echo $webset['seo_descition']; ?>">
</head>

<body <?php if(isset($ishome)): ?>id="page_index"<?php endif; ?>>

    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo url('/'); ?>">
                        <img src="__GX__\asset\images\logo.jpg" alt="logo" height="100%">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li <?php if(isset($ishome)): ?>class="active"<?php endif; ?> ><a href="<?php echo url('/'); ?>"><span>首页</span></a></li>
                        <li <?php if(isset($this_nav_1)): ?>class="active"<?php endif; ?> ><a href="<?php echo url('/about'); ?>"><span>关于我们</span></a></li>
                        <li <?php if(isset($this_nav_2)): ?>class="active"<?php endif; ?>><a href="<?php echo url('/service'); ?>"><span>专业服务</span></a></li>
                        <li <?php if(isset($this_nav_3)): ?>class="active"<?php endif; ?>><a href="<?php echo url('/team'); ?>"><span>专业团队</span></a></li>
                        <li <?php if(isset($this_nav_4)): ?>class="active"<?php endif; ?>><a href="<?php echo url('/cases'); ?>"><span>成功案例</span></a></li>
                        <li <?php if(isset($this_nav_5)): ?>class="active"<?php endif; ?>><a href="<?php echo url('/news'); ?>"><span>新闻资讯</span></a></li>
                        <li <?php if(isset($this_nav_6)): ?>class="active"<?php endif; ?>><a href="<?php echo url('/contact'); ?>"><span>联系我们</span></a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    
    <main>
        <div class="top swiper-container">
            <div class="swiper-wrapper">
                <?php if(is_array($slide_index) || $slide_index instanceof \think\Collection): $i = 0; $__LIST__ = $slide_index;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <div class="swiper-slide">
                    <img src="__GX__/asset/images/w1920h640.png" alt="" class="img-responsive" style="background: url('<?php echo $v['image']; ?>') no-repeat center center / cover">
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <!-- banner end -->

        <!--about -->
        <section class="about">
            <div class="container">
                <h1><span class="text_blue">关于</span>我们</h1>
                <div class="about_p">
                    <p><?php echo nl2br($aboutintro);?></p>
                </div>
                <div class="service_list">
                    <ul class="row">
                        <li class="col-lg-3 service_item">
                            <img src="__GX__\asset\images\w150h150.png" style="background: url('__GX__/asset/images/service1.png') no-repeat center center / cover;" width="150">
                            <p>涉诉知识产权鉴定服务</p>
                        </li>
                        <li class="col-lg-3 service_item">
                            <img src="__GX__\asset\images\w150h150.png" style="background: url('__GX__/asset/images/service2.png') no-repeat center center / cover;" width="150">
                            <p>涉诉电子数据鉴定服务</p>
                        </li>
                        <li class="col-lg-3 service_item">
                            <img src="__GX__\asset\images\w150h150.png" style="background: url('__GX__/asset/images/service3.png') no-repeat center center / cover;" width="150">
                            <p>商事鉴定服务</p>
                        </li>
                        <li class="col-lg-3 service_item">
                            <img src="__GX__\asset\images\w150h150.png" style="background: url('__GX__/asset/images/service4.png') no-repeat center center / cover;" width="150">
                            <p>电子数据存证服务</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!--team-->
        <section class="team">
            <div class="container">
                <h1><span class="text_blue">专家</span>团队</h1>
                <ul class="row">
                    <?php if(is_array($pos_team) || $pos_team instanceof \think\Collection): $i = 0; $__LIST__ = $pos_team;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li class="col-lg-3">
                        <div class="person">
                            <header>
                                <h2><?php echo $v['title']; ?></h2>
                                <div class="line"></div>
                                <h3><?php echo $v['title2']; ?></h3>
                                <p class="email"><?php echo $v['email']; ?></p>
                            </header>
                            <div class="person_p">
                                <p><?php echo str_cut(nl2br($v['content']),500 )?></p>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </section>
        <section class="case">
            <div class="container">
                <h1><span class="text_blue">案例</span>展示</h1>

                <div class="case_tab">
                    <ul class="case_nav">
                        <?php if(is_array($anli_nav) || $anli_nav instanceof \think\Collection): $i = 0; $__LIST__ = $anli_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <li <?php if($key == '0'): ?>class="active"<?php endif; ?>><a href="#zscq<?php echo $key; ?>" data-toggle="tab"><?php echo $v['name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>

                    <div class="tab-content">
                        <?php if(is_array($anli_nav) || $anli_nav instanceof \think\Collection): $i = 0; $__LIST__ = $anli_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                       
                        <div class='tab-pane fade <?php if($key == '0'): ?>in active<?php endif; ?>' id="zscq<?php echo $key; ?>">

                            
                            <div class="row">
                               <?php if(is_array($v['list']) || $v['list'] instanceof \think\Collection): $k = 0; $__LIST__ = $v['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                <div class="col-lg-6" data-id=<?php echo $k; ?>>
                                    <div class="case_p">
                                        <h4><a href="<?php echo url('/casesshow',['id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a></h4>
                                        <p><?php echo str_cut($vo['introduction'],200); ?></p>
                                    </div>
                                </div>
                            
                            <?php if($k%2==0){?>
                            
                            </div>  
                            <div class="row">
                            <?php }endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                       
                    </div>
                </div>

            </div>
        </section>


        <!--news-->
        <section class="news">
            <div class="container">
                <h1><span class="text_blue">新闻</span>资讯</h1>

                <div class="news_banner">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php if(is_array($pos_news) || $pos_news instanceof \think\Collection): $i = 0; $__LIST__ = $pos_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <div class="swiper-slide">
                                <?php if($v['cid'] == 9): ?>
                                <a href="<?php echo url('/newsshow',['cid'=>9,'id'=>$v['id']]); ?>" class="news_card">
                                <?php else: ?>
                                <a href="<?php echo url('/newsshow',['cid'=>10,'id'=>$v['id']]); ?>" class="news_card">
                                <?php endif; ?>
                                    <div class="news_card_img">
                                        <img src="__GX__/asset/images/w350h209.png" alt="" width="100%" style="background: url('<?php echo $v['thumb']; ?>') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4><?php echo str_cut($v['title'],30); ?></h4>
                                        <time><?php echo date("Y-m-d",$v['create_time']); ?></time>
                                        <p><?php echo str_cut($v['introduction'],80); ?></p>
                                    </div>
                                </a>
                            </div>

                            
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <!-- <div class="swiper-slide">
                                <a href="" class="news_card">
                                    <div class="news_card_img">
                                        <img src="asset/images/w350h209.png" alt="" width="100%" style="background: url('asset/images/news_banner2.jpg') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4>国家版权局等四部委启动“剑网2018”</h4>
                                        <time>2016-08-09</time>
                                        <p>近日，国家版权局、国家互联网信息办公室、工业和信息化部、公安部联合召开新闻通气会，通报启动打击网络侵权盗版......</p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="" class="news_card">
                                    <div class="news_card_img">
                                        <img src="asset/images/w350h209.png" alt="" width="100%" style="background: url('asset/images/news_3.jpg') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4>国家版权局等四部委启动“剑网2018”</h4>
                                        <time>2016-08-09</time>
                                        <p>近日，国家版权局、国家互联网信息办公室、工业和信息化部、公安部联合召开新闻通气会，通报启动打击网络侵权盗版......</p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="" class="news_card">
                                    <div class="news_card_img">
                                        <img src="asset/images/w350h209.png" alt="" width="100%" style="background: url('asset/images/news_banner4.jpg') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4>国家版权局等四部委启动“剑网2018”</h4>
                                        <time>2016-08-09</time>
                                        <p>近日，国家版权局、国家互联网信息办公室、工业和信息化部、公安部联合召开新闻通气会，通报启动打击网络侵权盗版......</p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="" class="news_card">
                                    <div class="news_card_img">
                                        <img src="asset/images/w350h209.png" alt="" width="100%" style="background: url('asset/images/news_banner1.jpg') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4>国家版权局等四部委启动“剑网2018”</h4>
                                        <time>2016-08-09</time>
                                        <p>近日，国家版权局、国家互联网信息办公室、工业和信息化部、公安部联合召开新闻通气会，通报启动打击网络侵权盗版......</p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="" class="news_card">
                                    <div class="news_card_img">
                                        <img src="asset/images/w350h209.png" alt="" width="100%" style="background: url('asset/images/news_banner2.jpg') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4>国家版权局等四部委启动“剑网2018”</h4>
                                        <time>2016-08-09</time>
                                        <p>近日，国家版权局、国家互联网信息办公室、工业和信息化部、公安部联合召开新闻通气会，通报启动打击网络侵权盗版......</p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="" class="news_card">
                                    <div class="news_card_img">
                                        <img src="asset/images/w350h209.png" alt="" width="100%" style="background: url('asset/images/news_3.jpg') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4>国家版权局等四部委启动“剑网2018”</h4>
                                        <time>2016-08-09</time>
                                        <p>近日，国家版权局、国家互联网信息办公室、工业和信息化部、公安部联合召开新闻通气会，通报启动打击网络侵权盗版......</p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="" class="news_card">
                                    <div class="news_card_img">
                                        <img src="asset/images/w350h209.png" alt="" width="100%" style="background: url('asset/images/news_banner4.jpg') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4>国家版权局等四部委启动“剑网2018”</h4>
                                        <time>2016-08-09</time>
                                        <p>近日，国家版权局、国家互联网信息办公室、工业和信息化部、公安部联合召开新闻通气会，通报启动打击网络侵权盗版......</p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="" class="news_card">
                                    <div class="news_card_img">
                                        <img src="asset/images/w350h209.png" alt="" width="100%" style="background: url('asset/images/news_banner1.jpg') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4>国家版权局等四部委启动“剑网2018”</h4>
                                        <time>2016-08-09</time>
                                        <p>近日，国家版权局、国家互联网信息办公室、工业和信息化部、公安部联合召开新闻通气会，通报启动打击网络侵权盗版......</p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="" class="news_card">
                                    <div class="news_card_img">
                                        <img src="asset/images/w350h209.png" alt="" width="100%" style="background: url('asset/images/news_banner2.jpg') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4>国家版权局等四部委启动“剑网2018”</h4>
                                        <time>2016-08-09</time>
                                        <p>近日，国家版权局、国家互联网信息办公室、工业和信息化部、公安部联合召开新闻通气会，通报启动打击网络侵权盗版......</p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="" class="news_card">
                                    <div class="news_card_img">
                                        <img src="asset/images/w350h209.png" alt="" width="100%" style="background: url('asset/images/news_3.jpg') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4>国家版权局等四部委启动“剑网2018”</h4>
                                        <time>2016-08-09</time>
                                        <p>近日，国家版权局、国家互联网信息办公室、工业和信息化部、公安部联合召开新闻通气会，通报启动打击网络侵权盗版......</p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="" class="news_card">
                                    <div class="news_card_img">
                                        <img src="asset/images/w350h209.png" alt="" width="100%" style="background: url('asset/images/news_banner4.jpg') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="news_card_p">
                                        <h4>国家版权局等四部委启动“剑网2018”</h4>
                                        <time>2016-08-09</time>
                                        <p>近日，国家版权局、国家互联网信息办公室、工业和信息化部、公安部联合召开新闻通气会，通报启动打击网络侵权盗版......</p>
                                    </div>
                                </a>
                            </div> -->
                        </div>
                    </div>

                    <div class="news_banner_tool">
                        <!-- 分页器 -->
                        <div class="swiper-pagination"></div>
                        <!-- 导航按钮 -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer1">
                <div class="left">
                    <div class="row">
                        <div class="col-lg-2">
                            <!--关于我们-->
                            <h4><?php echo $about['name']; ?></h4>
                            <ul>
                                <?php if(is_array($about['child']) || $about['child'] instanceof \think\Collection): $i = 0; $__LIST__ = $about['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <a href="<?php echo url('/about',['cid'=>$vv['id']]); ?>"><?php echo $vv['name']; ?></a>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>

                        <!--专业服务-->
                        <div class="col-lg-2">
                            <h4><?php echo $service['name']; ?></h4>
                            <ul>
                                <?php if(is_array($service['child']) || $service['child'] instanceof \think\Collection): $i = 0; $__LIST__ = $service['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <a href="<?php echo url('/service',['cid'=>$vv['id']]); ?>"><?php echo $vv['name']; ?></a>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="col-lg-2">
                            <h4>专家团队</h4>
                            <ul>
                                
                            </ul>
                        </div>
                        <div class="col-lg-2">
                            <h4>成功案例</h4>
                            <ul>
                               
                            </ul>
                        </div>

                        <!--news-->
                        <div class="col-lg-2">
                            <h4><?php echo $news['name']; ?></h4>
                            <ul>
                                <?php if(is_array($news['child']) || $news['child'] instanceof \think\Collection): $i = 0; $__LIST__ = $news['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <a href="<?php echo url('/news',['cid'=>$vv['id']]); ?>"><?php echo $vv['name']; ?></a>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="col-lg-2">
                            <h4><?php echo $contacts['name']; ?></h4>
                            <ul>
                                <?php if(is_array($contacts['child']) || $contacts['child'] instanceof \think\Collection): $i = 0; $__LIST__ = $contacts['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <a href="<?php echo url('/contact',['cid'=>$vv['id']]); ?>"><?php echo $vv['name']; ?></a>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <h4>关注我们</h4>
                    <img src="/<?php echo $webset['site_code']; ?>" alt="二维码" class="pull-left img-responsive">
                    <p>工信赛瑞（深圳）知识产权研究院官方微信</p>
                    <small>更多精彩等着你！</small>
                </div>
            </div>
            <div class="footer2">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="__GX__\asset\images\icon_tel.png" alt="电话" class="img-responsive pull-left">
                        <div class="tel">
                            <small>欢迎您来电咨询！</small>
                            <p><?php echo $webset['site_tel']; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5 email">
                                <p>咨询邮箱：</p>
                                <small><?php echo $webset['site_email']; ?></small>
                            </div>
                            <div class="col-lg-7 address">
                                <p>地址：</p>
                                <address><?php echo $webset['site_address']; ?></address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer3">
                <div class="pull-left">
                    工信赛瑞（深圳）知识产权研究院 Copyright&copy; 2018, sunqin.com. All rights reserved
                </div>
                <div class="pull-right">晋ICP备15050430号</div>
            </div>
        </div>
    </footer>

    <script src="__GX__\lib\jquery-3.3.1\jquery.min.js"></script>
    <script src="__GX__\lib\bootstrap-3.3.7\js\bootstrap.min.js"></script>
    <script src="__GX__\lib\swiper-4.3.3\js\swiper.min.js"></script>
    <script>
        new Swiper('.top.swiper-container', {
            loop: true,
            autoplay: {
                delay: 5000
            }
        });

        new Swiper('.news_banner .swiper-container', {
            loop: true,
            slidesPerView: 4,
            slidesPerGroup: 4,
            spaceBetween: 30,

            // 分页器
            pagination: {
                el: '.news_banner .swiper-pagination',
            },

            // 前进后退按钮
            navigation: {
                nextEl: '.news_banner .swiper-button-next',
                prevEl: '.news_banner .swiper-button-prev',
            }
        });
    </script>
</body>

</html>

