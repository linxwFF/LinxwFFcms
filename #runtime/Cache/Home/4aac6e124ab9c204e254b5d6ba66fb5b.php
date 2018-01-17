<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>睿美科技</title>
<meta name="keywords" content="睿美科技" />
<meta name="description" content="睿美科技" />
<link rel="stylesheet" href="./statics/home/css/style.css" type="text/css">
<script type="text/javascript" src="./statics/home/js/jquery.js"></script>
</head>

<body>

<div class="head">
    <div class="w_auto">
        <div class="logo-cont">
			<div class="logo"><a href="<?php echo U('Index/index');?>"></a></div>
			<span class="logo-gp">股票简称: <b>睿美科技</b>&nbsp;&nbsp;&nbsp;股票代码: <b>600000</b></span>
		</div>
        <div class="nav" style="padding-top:10px;">
            <ul id="myHeadMenu">
       		    <li><a  href="<?php echo U('Index/about');?>">关于我们</a></li>
	            <li><a  href="<?php echo U('Index/product');?>">产品中心</a></li>
	            <li><a  href="<?php echo U('Article/lists');?>">新闻中心</a></li>
	            <li><a  href="<?php echo U('Index/contact');?>">联系我们</a></li>
            </ul>
        </div>

    </div>
	<div class="clearfix"></div>
</div>


<div class="leve">
    <div class="w_auto">
        <div class="leve_left">
            <div class="cont_list2">
            	<ul>
                	<li><a href="<?php echo U('Index/index');?>"><i>首页</i><span></span></a></li>
                    <li><a class="hover2" title="产品中心" href="<?php echo U('Index/product');?>"<i>产品中心详情</i><span></span></a></li>
                </ul>
            </div>
        </div>
        <div class="leve_right">
        	<div class="leve_cont">
                <div class="nav_page">
                    <a href="<?php echo U('Index/index');?>">首页</a>
                         &raquo;
                        <a href="<?php echo U('Index/product');?>">产品中心详情</a>
                </div>
                <div class="clearfix"></div>
				<div class="cont_title">
                	<?php echo ($info["title"]); ?>
                </div>
				<div class="news_read">
				<?php echo ($info["content"]); ?>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
</div>

<div class="footer2">
    <div class="footer_down">
        <div class="w_auto">
        	<div class="foot_list">
                <dl>
                	<dt>关于睿能</dt>
                    <dd><a title="公司概况" href="#">公司概况</a></dd>
                    <dd><a title="使命和价值观" href="#">使命和价值观</a></dd>
                    <dd><a title="公司历史" href="#">公司历史</a></dd>
                    <dd><a title="荣誉资质" href="#">荣誉资质</a></dd>
                    <dd><a title="组织机构" href="#">组织机构</a></dd>
                </dl>
                <dl class="pro_hidden">
                	<dt>产品中心</dt>
                    <dd><a title="针织横机电脑控制系统" href="#">针织横机电脑控制系统</a></dd>
                    <dd><a title="伺服驱动器" href="#">伺服驱动器</a></dd>
                    <dd><a title="HID电子镇流器" href="#">HID电子镇流器</a></dd>
                </dl>
                <dl>
                	<dt>新闻中心</dt>
                    <dd><a title="公司新闻" href="#">公司新闻</a></dd>
                    <dd><a title="行业新闻" href="#">行业新闻</a></dd>
                    <dd><a title="活动及培训" href="#">活动及培训</a></dd>

                </dl>
                <dl>
                	<dt>人力资源</dt>
                    <dd><a title="校园招聘" href="#">校园招聘</a></dd>
                    <dd><a title="社会招聘" href="#">社会招聘</a></dd>
                    <dd><a title="薪酬福利" href="#">薪酬福利</a></dd>
                    <dd><a title="员工风采" href="#">员工风采</a></dd>
                </dl>
                <div class="foot_cont">
                	<p class="fc_title">联系我们</p>
                    总部地址: 福建省福州市鼓楼区铜盘路软件大道89号软件园C区8888号<br />
                    电话: 0591-88888888<br />
                    传真: 0591-88888888<br />
                    邮箱: 88888888@88888888.cn(销售)<br />
                    <p style="padding-left:31px">88888888@88888888.cn(技术支持)</p>
                </div>
                <div class="foot_wx">
                	<p>关注我们</p>
                    <img src="./statics/home/images/qrcode2.gif">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="foot_share" style="height:33px;">
            </div>
            <div class="clearfix"></div>
            <div class="foot_over">
                <p>Copyright © 2018 福建睿美科技股份有限公司 版权所有 | 闽ICP备013123123123号 | <a target="_blank" href="#" style="color:#fff;"><img src="./statics/home/images/police.png" style="position:relative;top:4px;"/>闽公网安备 闽ICP备013123123123号</a></p>
            </div>
        </div>
    </div>

</div>

</body>
</html>