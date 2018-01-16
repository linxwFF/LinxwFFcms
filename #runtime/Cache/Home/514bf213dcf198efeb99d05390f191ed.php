<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo strip_tags(C('SYSTEM_NAME'));?>-<?php echo ($title); ?></title>
        <meta name="description" content="<?php echo strip_tags(C('SYSTEM_NAME'));?>">
        <script>
            var _hmt = _hmt || [];
            (function () {
                var hm = document.createElement("script");
                hm.src = "//hm.baidu.com/hm.js?2a0ed9d85eb19c022b5afb2db2389ef8";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </head>
    <script type="text/javascript" src="./statics/home/pintuer/jquery.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <script type="text/javascript" src="./statics/home/pintuer/pintuer.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <link rel="stylesheet" type="text/css" href="./statics/home/pintuer/pintuer.css?<?php echo C('KLCHOU_BUILD');?>">
    <link rel="stylesheet" type="text/css" href="./statics/home/css/style.css?<?php echo C('KLCHOU_BUILD');?>">
<body>
     <!--头部导航-->
<div class="doc-header">
<div class="navbar navbar-big bg-white bg-inverse  nav-big ">
    <div class="line">
        <div class="xl12 xs2 xm2 xb1">
            <button class="button icon-navicon float-right" data-target="#header-demo3">
            </button>
            <!--<img src=" "/>-->
        </div>

        <div class=" xl12 xs10 xm10 xb11  padding-top  padding-bottom nav-navicon" >
            <div class="xs8 xm8 xb6">
                <ul class="nav nav-menu nav-inline">
                    <li><a  href="/">首页</a> </li>
                    <?php nav($nav); ?>
                    <li><a  href="<?php echo U('Page/zhaop');?>">邀你加入</a> </li>
                </ul>
            </div>
            <div class="xs4 xm4 xb3">
                <form>
                    <div class="input-group padding-little-top">
                            <input type="text" class="input border-main" name="keywords" size="30" placeholder="关键词" />
                            <span class="addbtn">
                                <button type="button" class="button bg-main">
                                    搜索</button>
                            </span>
                    </div>
                </form>
            </div>
            <div class="xs3 xm3 xb2">
                &nbsp;<div class="button-group">
                             <button type="button"   class="button dropdown-toggle icon-user">
                                 <span href="javascript:void(0)" >个人中心</span> <span class="downward"></span>
                             </button>
                             <ul class="drop-menu">
                                 <?php if($userinfo){ ?>
                                  <li><a style='font-size: 14px;color:black;' href="<?php echo U('Ucenter/index');?>">个人中心</a> </li>
                                   <li><a style='font-size: 14px;color:black;' href="<?php echo U('Member/logout');?>">退出</a> </li>
                                 <?php }else{ ?>
                                 <li><a style='font-size: 14px;color:black;' href="<?php echo U('Member/register');?>">注册</a> </li>
                                 <li><a style='font-size: 14px;color:black;' href="<?php echo U('Member/login');?>">登录</a> </li>
                                 <?php } ?>
                             </ul>
                     </div> 
            </div>
        </div>
    </div>
</div>
</div>
<?php  function nav($nav){ ?>
<?php foreach($nav as $key=>$item){ ?>  
<li><a  href="<?php echo U('Article/lists',array('cid'=>$item['id']));?>"><?php echo ($item["name"]); ?>
        <?php if(is_array($item['sub_item'])&& !empty($item['sub_item'])) { ?>
        <span class="arrow"></span>
        <?php } ?>
    </a> 
    <?php if(is_array($item['sub_item'])&& !empty($item['sub_item'])) { ?>
    <ul  <?php if($item['level']==1){ ?>class='drop-menu' <?php } ?>>
        <?php nav($item['sub_item']); ?>
</ul>
<?php } } } ?>

     <div class="bg-main doc-intro">
            <div class="container">
    <h1 class="fadein-top">思科CMS内容管理系统</h1>
    <p class="fadein-bottom">简单实用,可扩展,灵活变动,轻巧</p>
            </div>
    </div>
     <div class="alert alert-red">
    <span class="close rotate-hover"></span><strong>提示：</strong>2017/01/01开放源码下载。</div>
</div>

        <div class="container">
            <div class="line-big">
                <div class="xs9 padding-top">
                    <div class="panel-head bg-white ">
                    <strong class="icon-archive text-main doc-h3"> 最新文章</strong>
                    </div>
                      <ul class="list-text list-underline list-striped">
                        <li><span class="date">2018-01-16 12:05:20</span><a href="<?php echo U('Article/info',array('id'=>2));?>" class="active">12121</a></li>
                        </ul>
                    <br>
     <a class="button bg-main button-big" href="<?php echo U('Article/lists');?>">更多...</a>
                </div>
                <div class="xs3 padding-top">
                    <div class='panel'>
                        <div class="panel-head bg-white ">
                            <strong class="icon-download text-main doc-h3"> 版本下载</strong>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <a class="button bg-main button-big" href="javascript:void(0)">sikcms1.0 基础版</a>

                            </div>
                            <div class="form-group">
                                <a class="button bg-main button-big" href="javascript:void(0)">sikcms1.0 完整版</a>
                            </div>
                            <div class="form-group">
                                完整版下载加群：<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=73acc15173fe0bcf46467e80f2c1ab6e50166f7e59383cb12bcb1b902261bbca">498476759</a>
                            </div>
                        </div>
     </div>
                   <br>
                     <div class='panel'>
                        <div class="panel-head bg-white ">
                            <strong class="icon-user text-main doc-h3"> <?php if($userinfo){ ?>欢迎<?php echo ($userinfo['username']); }else{ ?>登录<?php } ?></strong>
                        </div>
     <?php if($userinfo){ ?>
     <div class="panel-body">
         <div class="form-group">
              您好:<?php echo ($userinfo['nickname']); ?>              
           </div>
         <div class="form-group">
              目前你是第<?php echo ($userinfo['userid']); ?>位访客 , 当前IP:<?php echo get_client_ip(); ?>                 
          </div>
     </div>
     <?php }else{ ?>
                        <div class="panel-body">
                            <form action="<?php echo U('Member/login');?>" method="post">
                            <div class="form-group">
                                <input type="text" class="input" placeholder="用户名" name="username"/>
                            </div>
                            <div class="form-group">
                                  <input type="password" class="input" placeholder="密码" name="password"/>
                            </div>
                            <div class="form-group">
                                <button class="button bg-main" id="login" type="submit">登录</button>&nbsp;&nbsp;<a href="<?php echo U('Member/register');?>">没有帐号?去注册</a>
                            </div>
                                </form>
                        </div>
     <?php } ?>
     </div>
                </div>
            </div>
        </div>


  <div class="container doc-footer">
            <div class="border-top padding-top">
                <div class="text-center height-big">
                    版权所有 © sikcms.cn All Rights Reserved，<a href="http://www.pintuer.com" target="_blank">Theme By 拼图</a> &nbsp;赣ICP备：16007200</div>

            </div>
        </div>

    </body>
</html>