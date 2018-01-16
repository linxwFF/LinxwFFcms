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
 
        <div class="container padding-top">
            <div class="line-big">
                <div class="xs9"> 
                 <ul class="bread">
    <?php echo ($curpos); ?>
</ul>

                    <div class="detail">
                        <div class="border-top padding-top" ></div>
                        <h1><?php echo trim('12121'); ?>  </h1>
                        <p class="text-center"> 时间：<?php echo date('Y-m-d H:i','1516075520'); ?> 作者： 来源：sikcms</p>
                         <div class="border-bottom padding-bottom"></div>
                        <p> <?php echo trim('<p>234234235345345345345</p>'); ?> </p>
                    </div>
                   <div class="comment ">
                      <div id="comment_form">
    <input type="hidden" name="pid" value="0"/>
    <input type="hidden" name="reply_userid" value=""/>
    <input type="hidden" name="channel_id" value="<?php echo ($info["channel_id"]); ?>"/>
    <input type="hidden" name="relation_id" value="<?php echo ($info["articles_id"]); ?>"/>
    <div class="form-group">
        <div class="field">
            <textarea class="input" id="comment_body"  placeholder="有种输入评论(^.^)"  name="content" placeholder="" data-validate="required:必填"></textarea>
        </div>
    </div>
    <div class="form-button">
        <button class="button bg-main" id="post_comment" type="submit">评论</button>
    </div>
</div>
<br>
<div class="tab" data-toggle="hover">
    <div class="tab-head">
        <ul class="tab-nav" style="padding-left: 0px;">
            <li class="active text-main comment-header "><a href="#tab-start2">评论(<?php echo ($comment_count); ?>)</a></li>
        </ul>
    </div>
    <div class="tab-body tab-body-bordered">
        <div class="tab-panel active" id="tab-start2"> 
            <div class="comment-body">
               <?php if(is_array($comment_list)): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="media media-x  border-bottom border-dashed padding-bottom">
                    <div class="box-show">
                        <a class="float-left" href="<?php echo U('User/center',array('id'=>$vo['userid']));?>">
                            <img src="./statics/home/avator/<?php echo ($vo["user_header"]); ?>" style="width: 40px;"  class="radius" alt="...">
                        </a>
                        <a class="float-right" onclick="comment_reply(this)" data-pid="<?php echo ($vo["id"]); ?>" data-userid="<?php echo ($vo["userid"]); ?>" data-nickname="<?php echo ($vo["nickname"]); ?>" href="javascript:void(0)">回复<?php if($vo['reply_nums']>0){ ?>(<?php echo ($vo["reply_nums"]); ?>)<?php } ?></a>
                    </div>
                    <div class="media-body">
                        <strong ><?php echo ($vo["nickname"]); ?> <font class="text-gray text-small"><?php echo (friendlyDate($vo["ctime"])); ?></font></strong><?php echo ($vo["content"]); ?>
                        <?php if(is_array($vo['reply_list'])): $i = 0; $__LIST__ = $vo['reply_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="media media-x ">
                                <div class="box-show">
                                    <a class="float-left"  href="<?php echo U('User/center',array('id'=>$item['userid']));?>">
                                        <img src="./statics/home/avator/<?php echo ($item["user_header"]); ?>" style="width: 40px;" class="radius"  alt="...">
                                    </a>
                                    <a class='float-right' data-userid="<?php echo ($item["userid"]); ?>" data-pid="<?php echo ($vo["id"]); ?>" data-nickname="<?php echo ($item["nickname"]); ?>" onclick="comment_reply(this)" href='javascript:void(0)'>回复</a>
                                </div>
                                <div class="media-body">
                                    <strong><?php echo ($item["nickname"]); ?>@<?php echo ($item["reply_username"]); ?> <font class="text-gray text-small"><?php echo (friendlyDate($item["ctime"])); ?></font></strong> <?php echo ($item["content"]); ?>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>   
            </div>
            <br>
             <div class="form-group"  >
                <form id="moreform" method="post">
                <input type="hidden" name="page" value="2"/>
                <input id="comment_more" class="button bg-main button-block" value="加载更多" tabindex="6" type="submit">
                 </form>
             </div>         
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
      
        $("#post_comment").click(function () {
              var submit = {
                channel_id: $("input[name='channel_id']").val(),
                relation_id: $("input[name='relation_id']").val(),
                reply_userid: $("input[name='reply_userid']").val(),
                content: $("#comment_body").val(),
                pid:$("input[name='pid']").val()
             }
             if($("#comment_body").val()==''){
                 $("#comment_body").parent('.field').parent('.form-group').addClass('check-error');
                 return false;
             }
            var url = "<?php echo U('Comment/addComment');?>";
            $.post(url, submit, function (data) {
                 if(data.status==1){
                     alert('评论成功');
                     window.location.reload();
                     $("#comment_body").val();
                 }else{
                     alert(data.info);
                 }
            });
            return false;
        });
        //加载更多
        $("#comment_more").click(function(){
            var form=  $("#moreform");
            var page=$("input[name='page']",form).val();
            var url="<?php echo U('Comment/ajaxComment');?>"
            var submit = {
                 channel_id: $("input[name='channel_id']").val(),
                 relation_id: $("input[name='relation_id']").val(),
                 page:page
            }
            $.post(url,submit,function(data){
                if(data.status==1){
                 $('.comment-body').append(data.info);
                 $("input[name='page']",form).val(data.url.page);
                }else{
                    alert(data.info);
                }
            },'json');
            return false;
        })
    });
    

    function comment_reply(a) {
        var userid = $(a).attr('data-userid');
        var nickname = $(a).attr('data-nickname');
        var pid = $(a).attr('data-pid');
        var re_tag = "<span>@" + nickname + ":</span>"
        $("input[name='reply_userid']").val(userid);
        $("input[name='pid']").val(pid);
        $("#comment_body").val('@' + nickname + ':').focus();
    }
</script>



                   </div>
                </div>
                <div class="xs3"> 
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