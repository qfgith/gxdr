<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:29:"admin_themes/admin\index.html";i:1532079198;s:22:"admin_themes/base.html";i:1535455166;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> 管理后台-<?php echo $webset['site_name']; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo $cdomain; ?>__PTSTA__/bootstrap/css/bootstrap.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $cdomain; ?>__PTSTA__/bootstrap/css/font-awesome.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo $cdomain; ?>__PTSTA__/bootstrap/css/ionicons.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $cdomain; ?>__PTSTA__/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo $cdomain; ?>__PTSTA__/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo $cdomain; ?>__PTSTA__/dist/css/style.css">
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo $cdomain; ?>__PTSTA__/dist/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo $cdomain; ?>__PTSTA__/bootstrap/js/bootstrap.js"></script>
        <!-- boostrap datetimepicker -->
        <link rel="stylesheet" href="<?php echo $cdomain; ?>__PTSTA__/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <script src="<?php echo $cdomain; ?>__PTSTA__/plugins/datetimepicker/js/bootstrap-datetimepicker.js"></script>
        <!-- iCheck 1.0.1 -->
        <link rel="stylesheet" href="<?php echo $cdomain; ?>__PTSTA__/plugins/iCheck/all.css">
        <script src="<?php echo $cdomain; ?>__PTSTA__/plugins/iCheck/icheck.min.js"></script>
        <!-- select2 -->
        <link rel="stylesheet" href="<?php echo $cdomain; ?>__PTSTA__/plugins/select2/select2.css">
        <script src="<?php echo $cdomain; ?>__PTSTA__/plugins/select2/select2.min.js"></script>
        <!--[if lt IE 9]>
        <script src="<?php echo $cdomain; ?>__PTSTA__/bootstrap/js/html5shiv.min.js"></script>
        <script src="<?php echo $cdomain; ?>__PTSTA__/bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini ">
        <div class="wrapper">
            <!-- top -->
            <header class="main-header">
                <div class="fix_div">
                    <!-- Logo -->
                    <a href="<?php echo url('admin/Index/index'); ?>" class="logo">
                        <span class="logo-mini"><b><?php echo $webset['site_name']; ?></b></span>
                        <span class="logo-lg"><b><?php echo $webset['site_name']; ?></b></span>
                    </a>
                    <nav class="navbar navbar-static-top">
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- User -->
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?php echo $cdomain; ?><?php echo $admin_info['headpic']; ?>" class="user-image" >
                                        <span class="hidden-xs"><?php echo $admin_info['name']; ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img src="<?php echo $cdomain; ?><?php echo $admin_info['headpic']; ?>" class="img-circle" alt="User Image">
                                            <p><?php echo $admin_info['name']; ?> - <?php echo $admin_info['role_name']; ?><small>注册于 Nov. <?php echo date("Y",$admin_info['addtime']); ?></small></p>
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="<?php echo url('admin/edit',['id'=>$admin_info['id']]); ?>" class="btn btn-default btn-flat">资料</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="<?php echo url('login/logout'); ?>" class="btn btn-default btn-flat">登出</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Control Sidebar Toggle Button -->
                            </ul>
                        </div>

                    </nav>
                </div>
            </header>
            <!-- left -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php if(empty($admin_info['headpic']) || ($admin_info['headpic'] instanceof \think\Collection && $admin_info['headpic']->isEmpty())): ?>
                                <img class="img-circle" src="<?php echo $cdomain; ?>__PTSTA__/dist/img/user2-160x160.jpg" >
                            <?php else: ?>
                                <img class="img-circle" src="<?php echo $cdomain; ?><?php echo $admin_info['headpic']; ?>" >
                            <?php endif; ?>
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $admin_info['name']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $admin_info['role_name']; ?></a>
                        </div>
                    </div>
                    <!-- sidebar menu: : treeview --- navigate_admin.active = $vo[group] : active -->
                    <ul class="sidebar-menu">
                        <li class="header">导航</li>
                        <?php if(is_array($menu) || $menu instanceof \think\Collection): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$vo): ?>
                        <li <?php if($navigate_admin['active'] == $vo['group']): ?>class="treeview active"<?php else: ?>class="treeview"<?php endif; ?> >
                            <a href="<?php echo url($vo['name']); ?>" >
                                <i class="<?php echo $vo['icon']; ?>"></i>
                                <span><?php echo $vo['title']; ?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <?php if(!empty($vo['sub_menu'])): ?>
                            <ul class="treeview-menu">
                                <?php if(is_array($vo['sub_menu']) || $vo['sub_menu'] instanceof \think\Collection): if( count($vo['sub_menu'])==0 ) : echo "" ;else: foreach($vo['sub_menu'] as $key=>$v): ?>
                                    <li>
                                        <a href="<?php echo url($v['name']); ?>">
                                            <i class="<?php echo $v['icon']; ?>"></i><?php echo $v['title']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <div class="content-wrapper">
                <!-- breadcrumb -->
                <div class="breadcrumbs" id="breadcrumbs">
                    <ol class="breadcrumb">
                    <?php if(is_array($navigate_admin['list']) || $navigate_admin['list'] instanceof \think\Collection): if( count($navigate_admin['list'])==0 ) : echo "" ;else: foreach($navigate_admin['list'] as $k=>$v): if($k == '后台首页'): ?>  
                            <li><a href="<?php echo $v; ?>"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;<?php echo $k; ?></a></li>
                        <?php else: ?>    
                            <li><a href="<?php echo $v; ?>"><?php echo $k; ?></a></li>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>          
                    </ol>
                </div>
                <!--主体-->
                
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">管理员列表</h3>
                </div>
                <!-- search -->
                <div class="panel-body mb0">
                    <div class="navbar navbar-default mb0">
                        <form class="navbar-form form-inline" method="post" action="<?php echo url('admin/admin/index'); ?>">
                            <div class="form-group">
                                <label class="control-label">登录名/真实姓名:</label>
                                <div class="input-group">
                                    <input class="form-control input-sm" name="keywords" value="<?php echo $keywords; ?>" type="text" >
                                </div>

                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i> 筛选
                                </button>

                            </div>
                            <a href="<?php echo url('admin/admin/add'); ?>" class="btn btn-info pull-right">添加</a>
                        </form>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr role="row">
                                    <th>登录账号</th>
                                    <th>真实姓名</th>
                                    <th>最后登录时间</th>
                                    <th>最后登录ip</th>
                                    <th>是否启用</th>
                                    <th>操作</th>
                               </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($list) || $list instanceof \think\Collection): if( count($list)==0 ) : echo "" ;else: foreach($list as $k=>$vo): ?>
                                    <tr role="row">
                                        <td><?php echo $vo['name']; ?></td>
                                        <td><?php echo $vo['realname']; ?></td>
                                        <td><?php echo date("Y-m-d H:i",$vo['last_login']); ?></td>
                                        <td><?php echo $vo['last_ip']; ?></td>
                                        <td>
                                            <?php if($vo['id'] > 1): if($vo['status'] > 1): ?>
                                                    <a href="<?php echo url('admin/admin/savestatus',['act'=>'status0','id'=>$vo['id']]); ?>" onclick="return confirm('确定停用吗?')" class="btn btn-sm btn-success">启用</a>
                                                <?php else: ?>
                                                    <a href="<?php echo url('admin/admin/savestatus',['act'=>'status1','id'=>$vo['id']]); ?>" onclick="return confirm('确定启用吗?')" class="btn btn-sm btn-danger">停用</a>
                                                <?php endif; else: ?>
                                                <a href="#" class="btn btn-sm btn-gray">
                                                    <?php if($vo['status'] == '1'): ?>启用<?php else: ?>停用<?php endif; ?>
                                                </a>
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <a href="<?php echo url('admin/admin/edit',['id'=>$vo['id']]); ?>" class="btn btn-sm btn-primary">编辑</a>
                                            <?php if($vo['id'] > 1): ?>
                                            <a href="<?php echo url('admin/admin/delete',['id'=>$vo['id']]); ?>" onclick="return confirm('确定删除吗?')" class="btn btn-sm btn-danger" >删除</a>
                                            <?php else: ?>
                                            <a href="#" class="btn btn-sm btn-gray">
                                                删除
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm pull-right">
                        <?php echo $pages; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>


            </div>
            <!-- bottom -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs"></div>
                <strong>Copyright &copy; 2014-<?php echo date("Y"); ?> .</strong> All rights
                reserved.
            </footer>
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- AdminLTE App -->
        <!-- <script>
            var GV = {
                current_controller: "admin/<?php echo (isset($controller) && ($controller !== '')?$controller:''); ?>/",
                base_url: "<?php echo $cdomain; ?>__PTSTA__"
            };
        </script>
        <link rel="stylesheet" href="<?php echo $cdomain; ?>__PTSTA__/plugins/layui/css/layui.css" media="all">
        <script src="<?php echo $cdomain; ?>__PTSTA__/plugins/layui/lay/dest/layui.all.js"></script>
        <script src="<?php echo $cdomain; ?>__PTSTA__/dist/js/func.js"></script> -->
        <link rel="stylesheet" href="<?php echo $cdomain; ?>__PTSTA__/plugins/layui230/css/layui.css" media="all">
        <script src="<?php echo $cdomain; ?>__PTSTA__/plugins/layui230/layui.all.js"></script>
        <script src="<?php echo $cdomain; ?>__PTSTA__/dist/js/func2.js"></script>
        <script src="<?php echo $cdomain; ?>__PTSTA__/dist/js/app.min.js"></script>
    </body>
</html>