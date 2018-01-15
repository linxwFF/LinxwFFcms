<?php if (!defined('THINK_PATH')) exit();?><!-------公共头部---------->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
         <title><?php echo strip_tags(C('SYSTEM_NAME'));?></title>
         <meta name="description" content="<?php echo strip_tags(C('SYSTEM_NAME'));?>">
          <!---require minified JS CSS--->
         <link rel="stylesheet" type="text/css" href="./statics/admin/assets/css/minified/aui-production.min.css?<?php echo C('KLCHOU_BUILD');?>">
         <link id="layout-theme" rel="stylesheet" type="text/css" href="./statics/admin/assets/themes/minified/fides/color-schemes/dark-blue.min.css?<?php echo C('KLCHOU_BUILD');?>">
         <link rel="stylesheet" type="text/css" href="./statics/admin/assets/themes/minified/fides/common.min.css?<?php echo C('KLCHOU_BUILD');?>">
         <script type="text/javascript" src="./statics/admin/assets/js/minified/aui-production.min.js?<?php echo C('KLCHOU_BUILD');?>"></script>
         <script type="text/javascript" src="./statics/admin/assets/js/minified/core/raphael.min.js?<?php echo C('KLCHOU_BUILD');?>"></script>
         <script type="text/javascript" src="./statics/admin/assets/js/minified/widgets/charts-justgage.min.js?<?php echo C('KLCHOU_BUILD');?>"></script>
<!---require minified JS CSS--->
    </head>
<body>
    <div id="page-wrapper" >
       <!-------头部导航---------->
   <style type="text/css">
	 #header-menu{
	   float:left;
	   font-size:14px;
	   height:54px;
	   line-height:53px;
	   padding:0 0 0 10px;
	 }
	  #header-menu a{
	   line-height:53px;
	   margin:0 25px 0 0;
	   color:#9c9c9c;
	  }
	    #header-menu a:hover{
		color:#fafafa;
		text-transform:uppercase;
		}
		#header-menu a.active{
		 color:#fafafa		
		}
	</style>
<div id="page-header">
    <div id="header-logo">
        <a href="javascript:;" class="tooltip-button" data-placement="bottom" title="关闭侧边栏" id="close-sidebar">
            <i class="glyph-icon icon-caret-left"></i>
        </a>  
        <a href="javascript:;" class="tooltip-button hidden" data-placement="bottom" title="打开侧边栏" id="rm-close-sidebar">
            <i class="glyph-icon icon-caret-right"></i>
        </a>
        <?php echo strip_tags(C('SYSTEM_NAME'));?><small class="opacity-80"><?php echo C('SIKCMS_VERSION');?></small>
    </div>
    	<div id="header-menu">
                <?php if(is_array($menuList)): foreach($menuList as $key=>$menu): ?><a href="<?php echo U('Index/index',array('menuid'=>$menu['id']));?>" ><?php echo ($menu["name"]); ?></a><?php endforeach; endif; ?>
	</div>
    <div class="user-profile hidden-mobile">
        <a href="index.php" target="new" title="" class="clearfix">
           <i class="glyph-icon icon-home"></i> 前台首页
        </a>
    </div>
    <div class="user-profile dropdown">
        <a href="javascript:;" title="" class="user-ico clearfix" data-toggle="dropdown">
            <img width="36" src="./statics/admin/assets/images/gravatar.jpg" alt="">
            <span><?php echo ($userInfo['username']); ?></span>
            <i class="glyph-icon icon-chevron-down"></i>
        </a>
        <ul class="dropdown-menu float-right">
            <li>
                <a href="javascript:;" title="">
                    <i class="glyph-icon icon-user mrg5R"></i>
                    <?php echo ($userInfo['realname']); ?>
                </a>
            </li>
            <li>
                <a href="javascript:;" title="">
                    <i class="glyph-icon icon-cog mrg5R"></i>
                    个人信息
                </a>
            </li>
             <li>
                <a href="<?php echo U('Users/changePassword');?>" title="" target="iframeId-content">
                    <i class="glyph-icon icon-flag mrg5R"></i>
                    修改密码
                </a>
            </li>
            <li>
                <a title="" href="<?php echo U('Public/logout');?>">
                    <i class="glyph-icon icon-signout font-size-13 mrg5R"></i>
                    <span class="font-bold">退出</span>
                </a>
            </li>
        </ul>
    </div>
</div>

       <!-------左侧菜单------>
<div id="page-sidebar" class="scrollable-content">
    <div id="sidebar-menu">
        <ul>
            <?php if(is_array($menuitem)): foreach($menuitem as $key=>$menus): ?><li class="top">
                    <a href="javascript:;" title="<?php echo ($menus["name"]); ?>">
                        <i class="glyph-icon icon-gear"></i>
                        <?php echo ($menus["name"]); ?>
                    </a>
                    <ul>
                        <?php if(is_array($menus["children"])): foreach($menus["children"] as $key=>$item): ?><li>
                                <a href="<?php echo ($item["url"]); ?>" target="iframeId-content" title="<?php echo ($item["name"]); ?>">
                                    <i class="glyph-icon icon-chevron-right"></i>
                                    <?php echo ($item["name"]); ?>
                                </a>
                            </li><?php endforeach; endif; ?>   
                    </ul>
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
</div>
        <!-- #page-title -->
        <div id="page-content-wrapper">
            <iframe id="iframeId-content" name="iframeId-content" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto"  width="100%" height="700px" src="<?php echo U('Index/main',array('menuid'=>21));?>"></iframe>
       </div>
    </div>
<!-------页脚------>   
  
   </body>
</html>