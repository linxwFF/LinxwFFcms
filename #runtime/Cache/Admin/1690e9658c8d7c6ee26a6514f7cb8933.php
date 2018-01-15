<?php if (!defined('THINK_PATH')) exit();?><!-- AUI Framework -->
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo strip_tags(C('SYSTEM_NAME'));?>-后台登录</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <link rel="stylesheet" type="text/css"  href="./statics/admin/assets/css/minified/aui-production.min.css?<?php echo C('SIKCMS_BUILD');?>" />
    <link id="layout-theme" rel="stylesheet" type="text/css"  href="./statics/admin/assets/themes/minified/fides/color-schemes/dark-blue.min.css?<?php echo C('SIKCMS_BUILD');?>" />
    <link rel="stylesheet" type="text/css"  href="./statics/admin/assets/themes/minified/fides/common.min.css?<?php echo C('SIKCMS_BUILD');?>" />
    <link id="theme-animations" rel="stylesheet"type="text/css" href="./statics/admin/assets/themes/minified/fides/animations.min.css?<?php echo C('SIKCMS_BUILD');?>" />
    <link rel="stylesheet" type="text/css" href="./statics/admin/assets/themes/minified/fides/responsive.min.css?<?php echo C('SIKCMS_BUILD');?>" />
    <script src="/LinxwFFcms/Public/extend/jquery-ui-bootstrap/assets/js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="/LinxwFFcms/Public/js/admin/login.js" type="text/javascript"></script>
    <style type="text/css">
         body {
                background: none repeat scroll 0 0 #f7f8f8;
                color: #525252;
                font-family: "微软雅黑",Arial,Helvetica,sans-serif;
                font-size: 12px;
                height: 100%;
            }
            .form-label label{
                font-size: 15px;
            }
            .form-input input{
                height: 42px;
                line-height: 42px;
                padding: 0 10px;
                font-size: 15px;
               margin-bottom: 10px;
            }
         .footer {
                color: #999;
                
            }
          .footer .inner {
                margin: 0 auto;
                padding: 45px 0;
                text-align: center;
                width: 1000px;
            }
    </style>
    <body>
       <div class="pad20A mrg25T">
            <div class="row mrg25T">
                <form method="post" class="col-md-4 center-margin form-vertical mrg25T"  id="loginForm" action="<?php echo U('Public/doLogin');?>">
                    <div class="ui-dialog  mrg25T" id="login-form" style="position: relative !important;">
                        <div class="ui-dialog-titlebar bg-black ui-widget-header ui-corner-all ui-helper-clearfix">
                            <i class="glyph-icon icon-user mrg5R"></i> <span class="ui-dialog-title font-size-15 ">欢迎登录<?php echo strip_tags(C('SYSTEM_NAME'));?></span>
                        </div>
                        <div class="pad20A pad0B ui-dialog-content ui-widget-content">
                            <div class="form-row">
                                <div class="form-label font-size-15 col-md-2">
                                </div>
                                <div class="form-input   col-md-10">
                                    <div class="form-input">
                                        <input placeholder="用户名" name="user_name" id="signin-username" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label font-size-15 col-md-2">
                                </div>
                                <div class="form-input col-md-10">
                                    <div class="form-input">
                                        <input placeholder="密码"  name="password" id="signin-password"  type="password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-dialog-buttonpane text-center">
                            <button type="submit"  id="signin-btn" class="btn large primary-bg text-transform-upr font-bold font-size-11 radius-all-4" id="demo-form-valid" title="Validate!">
                                <span class="button-content">
                                    登录
                                </span>
                            </button>
                            &nbsp;
                            <a href="/index.php" target="_blank" style=" text-decoration:underline">不想登录？，去首页</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
         <div class="footer">
            <div class="inner">
                <div class="copyright clearfix">
                    <p class="copyright_ch"><a target="_blank" href="<?php echo C('SITE_URL');?>">思科cms内容管理系统</a></p>
                    <p class="copyright_en"> &copy; <?php echo date("Y");?> , sikcms All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </body>
</html>