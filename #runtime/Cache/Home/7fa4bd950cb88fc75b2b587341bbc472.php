<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
        <style type="text/css">
            .passcode {
                position: absolute;
                right: 0;
                top: 0;
                height: 35px;
                margin: 1px;
                border-left: solid 1px #ddd;
                text-align: center;
                line-height: 32px;
                border-radius: 0 4px 4px 0;
            }
        </style>
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
 
    <br>
    <div class="container padding-top padding-bottom">
        <div class="line-big">
            <div class="xs12"> 
                <div align="center">
                    <form action="<?php echo U('Member/login');?>" method="post">
                        <div class="panel padding" style="width: 400px;height:350px;text-align: left;">
                            <div class="text-center">
                                <br>
                                <h2><strong>登录</strong></h2></div>
                            <div class="" style="padding:30px;">
                                <div class="form-group">
                                    <div class="field field-icon-right">
                                        <input type="text" class="input" name="username" placeholder="用户名" />

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field field-icon-right">
                                        <input type="password" class="input" name="password" placeholder="密码" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="">
                                        <button class="button button-block bg-main text-big">登录</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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