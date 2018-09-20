<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:66:"D:\wokerplace\gongxin.com\public/../app/home\view\contact_map.html";i:1535535686;s:61:"D:\wokerplace\gongxin.com\public/../app/home\view\header.html";i:1535540029;s:61:"D:\wokerplace\gongxin.com\public/../app/home\view\banner.html";i:1535515954;s:61:"D:\wokerplace\gongxin.com\public/../app/home\view\catpos.html";i:1535534796;s:61:"D:\wokerplace\gongxin.com\public/../app/home\view\footer.html";i:1535538215;}*/ ?>
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
            
        <?php if(empty($info['thumb']) || ($info['thumb'] instanceof \think\Collection && $info['thumb']->isEmpty())): ?>    
        <img src="/<?php echo $pagenavs[$base_id]['thumb']; ?>" alt="" class="img-responsive" width="100%">
        <?php else: ?>
        <img src="/<?php echo $info['thumb']; ?>" alt="" class="img-responsive" width="100%">
        <?php endif; ?>


        <section class="contact">
            <header>
                <div class="container">
                    <div class="menu_card">
                        <img src="__GX__\asset\images\icon_right.png" class="img-responsive pull-right">
                        <h1><?php echo $pagenavs[$base_id]['name']; ?></h1>
                        <div class="line"></div>
                        <p><?php echo $pagenavs[$base_id]['alias']; ?></p>
                    </div>
                    <ul class="menu">
                        <?php if(is_array($secondnav) || $secondnav instanceof \think\Collection): $i = 0; $__LIST__ = $secondnav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <li <?php if($cate_id == $v['id']): ?>class="active"<?php endif; ?> ><a href="<?php echo url('/contact',['cid'=>$v['id']]); ?>"><?php echo $v['name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </header>
            <div class="contact_body">
                <div class="container">
                    <ol class="breadcrumb">
                          
<li><a href="<?php echo url('/'); ?>"><img src="__GX__\asset\images\icon_home.png" alt=""> 首页</a></li>
<!--关于我们，专业服务 联系我们-->
<?php if(in_array(($base_id), explode(',',"46,58,63"))): ?>  
<li class="active"><?php echo $pagenavs[$cate_id]['name']; ?></li>
<?php else: ?>
<li class="active"><?php echo $categorynavs[$cate_id]['name']; ?></li>
<?php endif; ?>


                    </ol>
                    <div class="contact_content">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="contact_media">
                                    <div class="contact_media_left">
                                        <img class="media-object" src="__GX__\asset\images\w80h80.png" class="img-responsive" style="background: url('__GX__/asset/images/icon_contact1.png') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="contact_media_right">
                                        <h4 class="media-heading">公司地址</h4>
                                        <p><?php echo $webset['site_address']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact_media">
                                    <div class="contact_media_left">
                                        <img class="media-object" src="__GX__\asset\images\w80h80.png" class="img-responsive" style="background: url('__GX__/asset/images/icon_contact2.png') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="contact_media_right">
                                        <h4 class="media-heading">联系方式</h4>
                                        <p><?php echo $webset['site_tel']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact_media">
                                    <div class="contact_media_left">
                                        <img class="media-object" src="__GX__\asset\images\w80h80.png" class="img-responsive" style="background: url('__GX__/asset/images/icon_contact3.png') no-repeat center center / 100% 100%;">
                                    </div>
                                    <div class="contact_media_right">
                                        <h4 class="media-heading">邮箱传真</h4>
                                        <p>E-mail：<?php echo $webset['site_email']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="map"></div>

                        <section class="liuyan">
                            <h2>留言</h2>
                            <div>
                                <div class="form1">
                                    <label>姓名：<input type="text" id='username'></label>
                                    <label>电话号码：<input type="text" id='telephone'></label>
                                </div>
                                <div class="form2">
                                    <label>留言：<textarea name="" id="message" cols="30" rows="10"></textarea></label>
                                </div>
                                <label style="visibility: hidden;font-size: 18px;">提交：</label>
                                <input type="submit" value="提&nbsp;&nbsp;交" id='send'>
                            </div>
                        </section>
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
   
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=mDhl4wxelUrRTzyoX0n3jzir"></script>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap() {
        createMap(); //创建地图
        setMapEvent(); //设置地图事件
        addMapControl(); //向地图添加控件
        addMapOverlay(); //向地图添加覆盖物
    }

    function createMap() {
        map = new BMap.Map("map");
        map.centerAndZoom(new BMap.Point(113.962676, 22.542925), 15);
    }

    function setMapEvent() {
        map.enableScrollWheelZoom();
        map.enableKeyboard();
        map.enableDragging();
        map.enableDoubleClickZoom()
    }

    function addClickHandler(target, window) {
        target.addEventListener("click", function() {
            target.openInfoWindow(window);
        });
    }

    function addMapOverlay() {
        var markers = [{
            content: "",
            title: "",
            imageOffset: {
                width: -46,
                height: -21
            },
            position: {
                lat: 22.542925,
                lng: 113.962676
            }
        }];
        for (var index = 0; index < markers.length; index++) {
            var point = new BMap.Point(markers[index].position.lng, markers[index].position.lat);
            var marker = new BMap.Marker(point, {
                icon: new BMap.Icon("http://api.map.baidu.com/lbsapi/createmap/images/icon.png", new BMap.Size(20, 25), {
                    imageOffset: new BMap.Size(markers[index].imageOffset.width, markers[index].imageOffset.height)
                })
            });
            var label = new BMap.Label(markers[index].title, {
                offset: new BMap.Size(25, 5)
            });
            var opts = {
                width: 200,
                title: markers[index].title,
                enableMessage: false
            };
            var infoWindow = new BMap.InfoWindow(markers[index].content, opts);
            marker.setLabel(label);
            addClickHandler(marker, infoWindow);
            map.addOverlay(marker);
        };
    }
    //向地图添加控件
    function addMapControl() {
        var scaleControl = new BMap.ScaleControl({
            anchor: BMAP_ANCHOR_BOTTOM_LEFT
        });
        scaleControl.setUnit(BMAP_UNIT_IMPERIAL);
        map.addControl(scaleControl);
        var navControl = new BMap.NavigationControl({
            anchor: BMAP_ANCHOR_TOP_LEFT,
            type: BMAP_NAVIGATION_CONTROL_LARGE
        });
        map.addControl(navControl);
        var overviewControl = new BMap.OverviewMapControl({
            anchor: BMAP_ANCHOR_BOTTOM_RIGHT,
            isOpen: true
        });
        map.addControl(overviewControl);
    }
    var map;
    initMap();
</script>

<script>
    $(function(){
        $("#send").click(function(){
            var username = $("#username").val();
            var telephone = $("#telephone").val();
            
            var message = $("#message").val();
            var error = '';
            if(username == ''){
                error = "请输入您的姓名！";
                alert(error);
                $("#username").focus();
                return false;
            }
            if(telephone == ''){
                error = "请输入您的联系方式！";
                alert(error);
                $("#telephone").focus();
                return false;
            }
            //alert(company);
            var url="<?php echo url('Home/Index/insert'); ?>";
            var info = username + "###" + telephone  +"###"+message;
            $.post(url,{info:info},function(data){
                var str=data.info;
                alert(str);
                window.location.reload() 
    
            },'json');
        });
    });
</script>
