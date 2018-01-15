<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<meta charset="UTF-8" />
<head>
   <title><?php echo ($Title); ?>-<?php echo ($Version); ?>,安装向导</title>
    <link rel="stylesheet" type="text/css" href="./statics/install/assets/css/minified/aui-production.min.css">
    <link rel="stylesheet" type="text/css" href="./statics/install/assets/themes/minified/fides/common.min.css">
    <link rel="stylesheet" type="text/css" href="./statics/install/assets/themes/minified/fides/color-schemes/dark-blue.min.css">
       <script type="text/javascript" src="./statics/install/js/jquery1.9.1.js"></script>
</head>   
<style>
    .boxed-layout #page-wrapper, .container{max-width:950px;}
</style>
<body class="boxed-layout" style="overflow: auto;" >
    <div id="page-wrapper" class="demo-example " >
        <div id="page-header" class="clearfix">
            <div id="header-logo"><?php echo ($Title); ?></div>
        </div>
          <div id="page-sidebar" class="scrollable-content"  >
            <div id="sidebar-menu">
                <ul>
                    <li class="current-page"><a  href="">安装向导</a></li>
                     <li class="active">
                         <ul style="display: block;">
                            <li><a class="" href=""><i class="glyph-icon icon-angle-right"></i>阅读协议</a></li>
                            <li><a class="" href=""><i class="glyph-icon icon-angle-right"></i>检测环境</a></li>
                            <li><a class="" href=""><i class="glyph-icon icon-angle-right"></i>参数配置</a></li>
                           <li><a class="" href=""><i class="glyph-icon icon-angle-right"></i>安装进行</a></li>
                            <li><a class="" href=""><i class="glyph-icon icon-angle-right"></i>安装完成</a></li>
                        </ul>
                     </li>
                </ul>
            </div>
        </div>
       <div id="page-content-wrapper">
         <?php switch($step): case "step1": ?><div class="example-box">
         <div id="form-wizard" class="form-wizard">
             <ul class="anchor">
            <li>
                <a href="<?php echo U('step1');?>" class="selected" isdone="1" rel="1">
                  <label class="wizard-step">1</label>
                  <span class="wizard-description" style="color:#000">
                     阅读协议
                  </span>
                </a>
            </li>
            <li>
                <a href="#step-2" class="disabled" isdone="0" rel="2">
                  <label class="wizard-step">2</label>
                  <span class="wizard-description">
                     检测环境
                  </span>
                </a>
            </li>
            <li>
                <a href="#step-3" class="disabled" isdone="0" rel="3">
                  <label class="wizard-step">3</label>
                  <span class="wizard-description">
                    参数配置
                  </span>
                </a>
            </li>
            <li>
                <a href="#step-4" class="disabled" isdone="0" rel="4">
                  <label class="wizard-step">4</label>
                  <span class="wizard-description">
                     安装进行
                  </span>
                </a>
            </li>
               <li>
                <a href="#step-5" class="disabled" isdone="0" rel="4">
                  <label class="wizard-step">5</label>
                  <span class="wizard-description">
                     完成安装
                  </span>
                </a>
            </li>
          </ul>
         </div>
     </div>

     <div class="example-box">
         <div class="example-code clearfix">
             <form id="form" class="col-md-11 center-margin" method="post" action="#">
                    <div class="form-row">
                        <div class="form-input col-md-11">
                            <textarea  class="large-textarea font-size-13"  style="width: 650px; height: 273px; max-width: 650px; max-height: 273px;overflow:scroll;overflow-x:hidden;">       1. 开发者不提供任何形式的商业付费服务，包括但不限于：技术支持，二次开发，模板设计，插件开发等。
       2. 您出于自愿而使用，您必须了解使用风险，开发者不提供任何形式的使用担保，也不承担任何的相关责任。
       3. 开发者不对使用本系统构建的网站的任何信息内容以及导致的任何版权纠纷和法律争议及后果承担责任。
       4. 您一旦下载、使用并安装sikcms建立或发布网站，即被视为完全理解并接受上述声明。
</textarea>
                        </div>
                    </div>
                 <div class="form-row">
                      <div class="form-input col-md-11">
                          <div class='form-checkbox-radio col-md-10'>
                              <input id="igreen" name="igreen" type="checkbox">
                              <label for="">我已阅读并同意此协议</label>
                          </div>
                      </div>
                 </div>
                 <div class='actionBar'>
                        <div class="form-row">
                            <div class="form-input col-md-10 col-md-offset-2">
                                <button class="btn ui-state-default medium" onclick="history.go(-1)">
                                   <span class="button-content">返回</span>
                                </button>
                                 <button class="btn primary-bg medium btn-next" >
                                     <span class="button-content" >继续</span>
                                  </button>

                                </div>
                        </div>
                   </div>
                 </form>
         </div>
     </div>


<script type="text/javascript">
    //同意协议JS
    $(function(){
       $(".btn-next").click(function(){
           if($("#igreen").is(':checked')){
            window.location.href = "<?php echo U('step2');?>";
            }else{
                alert('请阅读许可协议');
            }
             return false;
       });
    });
</script><?php break;?>
            <?php case "step2": ?><div class="example-box">
         <div id="form-wizard" class="form-wizard">
             <ul class="anchor">
            <li>
                <a href="/install.php" class="selected" isdone="1" rel="1">
                  <label class="wizard-step">1</label>
                  <span class="wizard-description">
                     阅读协议
                  </span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('step2');?>" class="selected" isdone="0" rel="2">
                  <label class="wizard-step" >2</label>
                  <span class="wizard-description" style="color:#000">
                     检测环境
                  </span>
                </a>
            </li>
            <li>
                <a href="#step-3" class="disabled" isdone="0" rel="3">
                  <label class="wizard-step">3</label>
                  <span class="wizard-description">
                    参数配置
                  </span>
                </a>
            </li>
            <li>
                <a href="#step-4" class="disabled" isdone="0" rel="4">
                  <label class="wizard-step">4</label>
                  <span class="wizard-description">
                     安装进行
                  </span>
                </a>
            </li>
               <li>
                <a href="#step-5" class="disabled" isdone="0" rel="4">
                  <label class="wizard-step">5</label>
                  <span class="wizard-description">
                     完成安装
                  </span>
                </a>
            </li>
          </ul>
         </div>
     </div>

     <div class="example-box">
         <div class="example-code clearfix">
             <div class='row col-md-12 '>
                 <div class="content-box">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="text-center">环境检测</th>
                            <th>推荐配置</th>
                            <th class="text-center">当前状态</th>
                            <th class="text-center">最低要求</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>操作系统</td><td class="font-bold text-left">类UNIX</td>
                            <td><div class="label bg-orange"><?php echo ($os); ?></div></td>
                            <td>不限制</td>
                        </tr>
                        <tr> <td>PHP版本</td><td>5.3.x</td><td><?php echo ($php_version); ?></td><td>5.3.0</td></tr>
                        <tr> <td>MySQL版本</td><td>5.x.x</td><td><?php echo ($mysql); ?></td><td>5.2</td></tr>
                         <tr>
                            <td>附件上传</td><td>2M</td><td><?php echo ($uploadSize); ?></td><td>不限制</td>
                        </tr>
                        <tr>
                            <td>SESSION</td><td>开启</td><td><?php echo ($session); ?></td><td>开启</td>
                        </tr>
                        <tr>
                            <th class="text-center">函数支持检测</th><th  class="text-center" >当前环境</th><th class="text-center" colspan="2">程序要求</th>
                        </tr>
                         <?php if(is_array($function)): $i = 0; $__LIST__ = $function;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($key); ?></td><td ><?php if($rs): ?><span class="correct_span">&radic;</span>支持<?php else: ?><span class="correct_span error_span">&radic;</span>不支持<?php endif; ?></td><td colspan="2"><span class="correct_span">&radic;</span>支持</td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr>
                            <th class="text-center">目录文件权限检测</th><th class="text-center" colspan="2">写入</th><th class="text-center">读取</th>
                        </tr>
                        <?php if(is_array($folderInfo)): $i = 0; $__LIST__ = $folderInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($rs["dir"]); ?></td>
                                <td colspan="2"><?php echo ($rs["is_writeable"]); ?></td>
                                <td><?php echo ($rs["is_readable"]); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
             </div>
              <div class='actionBar'>
                        <div class="form-row">
                            <div class="form-input col-md-10 col-md-offset-2">
                                <button class="btn ui-state-default medium" onclick="history.go(-1)">
                                   <span class="button-content">后退</span>
                                </button>
                                 <button class="btn primary-bg medium btn-next" >
                                     <span class="button-content" >继续</span>
                                  </button>

                                </div>
                        </div>
                   </div>
         </div>
     </div>

<script type="text/javascript">
    $(function(){
       $(".btn-next").click(function(){
            window.location.href = "<?php echo U('step3');?>";
       });
    });
</script><?php break;?>
            <?php case "step3": ?><script src="/LinxwFFcms/Public/extress/install/js/jquery.js"></script>
<script src="/LinxwFFcms/Public/extress/install/js/validate.js"></script>
<script src="/LinxwFFcms/Public/extress/install/js/ajaxForm.js"></script>
<style>
    .form-bordered .form-label{border-right: none;}
</style>
     <div class="example-box">
         <div id="form-wizard" class="form-wizard">
             <ul class="anchor">
            <li>
                <a href="/install.php" class="selected" isdone="1" rel="1">
                  <label class="wizard-step">1</label>
                  <span class="wizard-description">
                     阅读协议
                  </span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('step2');?>" class="selected" isdone="0" rel="2">
                  <label class="wizard-step">2</label>
                  <span class="wizard-description">
                     检测环境
                  </span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('step2');?>" class="selected" isdone="0" rel="3">
                  <label class="wizard-step">3</label>
                  <span class="wizard-description">
                    参数配置
                  </span>
                </a>
            </li>
            <li>
                <a href="#step-4" class="disabled" isdone="0" rel="4">
                  <label class="wizard-step">4</label>
                  <span class="wizard-description">
                     安装进行
                  </span>
                </a>
            </li>
               <li>
                <a href="#step-5" class="disabled" isdone="0" rel="4">
                  <label class="wizard-step">5</label>
                  <span class="wizard-description">
                     完成安装
                  </span>
                </a>
            </li>
          </ul>
         </div>
     </div>


 <div class="example-box">
    <div class="example-code clearfix">
        <div class='row col-md-12 '>
        <form class="form-bordered" id="J_install_form" action="<?php echo U('step4');?>" method="post">
            <div class='form-row'>
                <div class="form-input col-md-10">
                            <h4 class=''>数据库配置</h4>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                       数据库服务器:
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <input type="text" id="dbhost" class="input" name="dbhost" value="127.0.0.1"/>
                    <ul id="J_install_tip_dbhost" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;">数据库服务器地址，一般为127.0.0.1</li>
                    </ul>

                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                        数据库端口:
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <input type="text" name="dbport" id="dbport" class="input" value="3306"/>
                      <ul id="J_install_tip_dbport" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;">数据库服务器端口，一般为3306</li>
                    </ul>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-2">
                    <label for="">
                       数据库用户名:
                    </label>
                </div>
                <div class="form-input col-md-10">
                    <input type="text" name="dbuser" id="dbuser" class="input" value="root" >
                     <ul id="J_install_tip_dbuser" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;">一般为root</li>
                    </ul>
                </div>
            </div>
            <div class="form-row ">
                <div class="form-label col-md-2">
                    <label for="">
                        数据库密码:
                    </label>
                </div>
                <div class="form-input col-md-10">
                   <input type="password" name="dbpwd" id="dbpwd" class="input" autoComplete="off" onblur="condb()" />
                    <ul id="J_install_tip_dbpwd" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;">一般为空</li>
                    </ul>
                </div>
            </div>
             <div class="form-row ">
                <div class="form-label col-md-2">
                    <label for="">
                        数据库名:
                    </label>
                </div>
                <div class="form-input col-md-10">
                 <input type="text" name="dbname" id="dbname" class="input" value="LinxwFFcms"/>
                 <ul id="J_install_tip_dbname" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;"></li>
                    </ul>
                </div>
            </div>
                <div class="form-row ">
                <div class="form-label col-md-2">
                    <label for="">
                        数据表前缀:
                    </label>
                </div>
                <div class="form-input col-md-10">
                   <input type="text" name="dbprefix" id="dbprefix" class="input" value="Lin_"/>
                     <ul id="J_install_tip_dbprefix" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;">建议使用默认</li>
                    </ul>
                </div>
            </div>
             <div class='form-row'>
                <div class="form-input col-md-10">
                            <h4 class=''>网站描述</h4>
                </div>
            </div>
             <div class="form-row ">
                <div class="form-label col-md-2">
                    <label for="">
                        网站名称：
                    </label>
                </div>
                <div class="form-input col-md-10">
                  <input type="text" id="sitename" class="input" name="sitename" value="思科CMS内容管理系统"/>
                   <ul id="J_install_tip_sitename" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;"></li>
                    </ul>
                </div>
            </div>
             <div class="form-row ">
                <div class="form-label col-md-2">
                    <label for="">
                        网站域名:
                    </label>
                </div>
                <div class="form-input col-md-10">
                  <input type="text" id="siteurl" class="input" name="siteurl" value="<?php echo ($parse_url["path"]); ?>"/>
                   <ul id="J_install_tip_siteurl" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;">请以“/”结尾</li>
                    </ul>
                </div>
            </div>
             <div class="form-row ">
                <div class="form-label col-md-2">
                    <label for="">
                        关键词:
                    </label>
                </div>
                <div class="form-input col-md-10">
                 <input type="text" id="sitekeywords" class="input" name="sitekeywords" value="/企业网站后台管理/"/>
                  <ul id="J_install_tip_sitekeywords" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;">请以“/”结尾</li>
                    </ul>
                </div>
            </div>
             <div class="form-row ">
                <div class="form-label col-md-2">
                    <label for="">
                        描述:
                    </label>
                </div>
                <div class="form-input col-md-10">
                  <input type="text" id="siteinfo" class="input" name="siteinfo" value="企业网站后台管理系统,是一款PHP+MYSQL系统.核心采用了Thinkphp框架等众多开源软件"/>

                   <ul id="J_install_tip_siteinfo" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;"></li>
                    </ul>
                </div>
            </div>
              <div class='form-row'>
                <div class="form-input col-md-10">
                            <h4 class=''>管理员信息</h4>
                </div>
            </div>
               <div class="form-row ">
                <div class="form-label col-md-2">
                    <label for="">
                        管理员账号:
                    </label>
                </div>
                <div class="form-input col-md-10">
                <input type="text" class="input" name="manager" value="admin"/>
                <ul id="J_install_tip_admin" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;"></li>
                    </ul>
                </div>
            </div>
               <div class="form-row ">
                <div class="form-label col-md-2">
                    <label for="">
                        管理员密码:
                    </label>
                </div>
                <div class="form-input col-md-10">
               <input type="text" class="input" id="J_manager_pwd" name="manager_pwd" autoComplete="off" value="admin" />
                <ul id="J_install_tip_manager_pwd" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;"></li>
                    </ul>
                </div>
            </div>
               <div class="form-row ">
                <div class="form-label col-md-2">
                    <label for="">
                        重复密码:
                    </label>
                </div>
                <div class="form-input col-md-10">
                <input type="text" class="input" name="manager_ckpwd" autoComplete="off" value="admin" />
                  <ul id="J_install_tip_manager_ckpwd" class="parsley-error-list" style="display: block;">
                      <li class="required" style="display: list-item;"></li>
                    </ul>
                </div>
            </div>
             <div class="form-row ">
                <div class="form-label col-md-2">
                    <label for="">
                        Email:
                    </label>
                </div>
                <div class="form-input col-md-10">
                <input type="text" class="input" name="manager_email" value="admin@qq.com" />
                </div>
            </div>
             <div class="form-row">
                      <div class="form-input col-md-11">
                          <div class='form-checkbox-radio col-md-10'>
                             <input name="testdata" checked="checked" value="1" alt="测试数据需要安装在根目录下才可以完整体验-__,-!" title="测试数据需要安装在根目录下才可以完整体验-__,-!" type="checkbox">
                              <label for="">默认测试数据</label>
                          </div>
                      </div>
                 </div>

                       <div class="form-row">
                           <div class="form-input col-md-10 col-md-offset-2">
                               <button class="btn ui-state-default medium" onclick="history.go(-1)">
                                  <span class="button-content">后退</span>
                               </button>
                                <button class="btn primary-bg medium btn-next btn_submit J_install_btn" >
                                    <span class="button-content" >创建数据</span>
                                 </button>

                               </div>
                       </div>

        </form>

    </div>

</div>
</div>



<script>
    function condb(){
        var dbHost =$('#dbhost').val();
        var dbUser = $('#dbuser').val();
        var dbPwd = $('#dbpwd').val();
        var dbName = $('#dbname').val();
        var dbPort = $('#dbport').val();
        data = {'dbHost':dbHost,'dbUser':dbUser,'dbPwd':dbPwd,'dbName':dbName,'dbPort':dbPort};
        var url = "<?php echo U('condb');?>";
        $.ajax({
            type:"POST",
            url:url,
            data:data,
            beforeSend:function(){
            },
            success:function(msg){
                if(msg){}else{
                    $("#dbpw").val("");
                     $('#J_install_tip_dbpwd').html('<span for="dbname" generated="true" class="tips_error" style="">数据库链接配置失败</span>');
                }
            },
            complete:function(){},
            error:function(){
                $('#J_install_tip_dbpwd').html('<span for="dbname" generated="true" class="tips_error" style="">数据库链接配置失败</span>');
                $('#dbpw').val("");
            }
        });
    }
    $(function(){
      //聚焦时默认提示
      var focus_tips = {
          dbhost :'数据库服务器地址，一般为127.0.0.1',
          dbport:'数据库服务器端口，一般为3306',
          dbuser:'',
          dbpwd:'',
          dbname:'',
          dbprefix:'建议使用默认',
          manager:'创始人帐号，拥有站点后台所有管理权限',
          manager_pwd:'',
          manager_ckpwd:'',
          sitename:'',
          siteurl:'请以“/”结尾',
          sitekeywords:'',
          siteinfo:'',
          manager_email:''
      };
      var install_form = $("#J_install_form"),
              reg_username=$('#user_name'),             //用户名表单
              reg_password = $('#J_reg_password'),      //密码表单
              reg_tip_password = $('#J_reg_tip_password'), //密码提示区
              response_tips = $('#J_response_tips');      //后端返回提示

    install_form.validate({
        debug:true,
        errorPlacement:function(error,element){
            //错误提示容器
            $('#J_install_tip_'+element[0].name).html(error);
        },
        errorElement:'span',
        errorClass:'tips_error',
        validClass :'tips_error',
        onkeyup:false,
        focusInvalid:false,
        rules:{
            dbhost:{
                required:true
            },
            dbport:{
                required:true
            },
            dbuser:{
                required:true
            },
            dbname:{
                required:true
            },
            dbprefix : {
                required	: true
            },
            manager:{
                required:true
            },
            manager_pwd:{
                required:true
            },
            manager_ckpwd:{
                required:true,
                equalTo:'#J_manager_pwd'
            },
            manager_email:{
                required:true,
                email:true
            }
        },
        highlight:false,
        unhighlight:function(element,errorClass,validClass){
           var tip_elem = $('#J_install_tip_'+element.name);
            tip_elem.html('<span class="'+validClass+'" data-text="text"></span>');
            $(element).parents('tr').addClass('current');
        },
        onfocusout:function(element){
            var _this=this;
            $(element).parents('tr').removeClass('current');
            if(element.name==='email'){
                //邮箱匹配点击后，延时处理
                setTimeout(function(){
                    _this.element(element);
                }, 150);
            }else{
                _this.element(element);
            }
        },
        messages:{
            dbhost: {
                required	: '数据库服务器地址不能为空'
            },
            dbport:{
                required	: '数据库服务器端口不能为空'
            },
            dbuser: {
                required	: '数据库用户名不能为空'
            },
            dbname: {
                required	: '数据库名不能为空'
            },
            dbprefix : {
                required	: '数据库表前缀不能为空'
            },
            manager: {
                required	: '管理员帐号不能为空'
            },
            manager_pwd: {
                required	: '密码不能为空'
            },
            manager_ckpwd: {
                required	: '重复密码不能为空',
                equalTo : '两次输入的密码不一致。请重新输入'
            },
            manager_email: {
                required	: 'Email不能为空',
                email : '请输入正确的电子邮箱地址'
            }
        },
        submitHandler:function(form) {
            form.submit();
            return true;
        }

    });
        var _data = {};
    });
</script><?php break;?>
            <?php case "step4": ?><style>
    .infobox{
        margin-bottom: 5px;
        
    }
</style>
     <div class="example-box">
         <div id="form-wizard" class="form-wizard">
             <ul class="anchor">
            <li>
                <a href="<?php echo U('step1');?>" class="selected" isdone="1" rel="1">
                  <label class="wizard-step">1</label>
                  <span class="wizard-description">
                     阅读协议
                  </span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('step2');?>" class="selected" isdone="0" rel="2">
                  <label class="wizard-step">2</label>
                  <span class="wizard-description">
                     检测环境
                  </span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('step3');?>" class="selected" isdone="0" rel="3">
                  <label class="wizard-step">3</label>
                  <span class="wizard-description">
                    参数配置
                  </span>                   
                </a>
            </li>
            <li>
                <a href=":U('step4')}" class="selected" isdone="0" rel="4">
                  <label class="wizard-step">4</label>
                  <span class="wizard-description">
                     安装进行
                  </span>                   
                </a>
            </li>
               <li>
                <a href="#step-5" class="disabled" isdone="0" rel="5">
                  <label class="wizard-step">5</label>
                  <span class="wizard-description">
                     完成安装
                  </span>                   
                </a>
            </li>
          </ul>
         </div>
     </div>
    <div class="example-box">
         <div class="example-code clearfix">
           <div class="row">
            <div class="col-md-12">
                <div  id='loginner'>
                      
                </div>
                <a class="btn_old" href="javascript:;">
                        <img align="absmiddle" src="/LinxwFFcms/Public/extress/install/images/loading.gif">
                        正在安装...
                </a>
            </div>
      
        </div>
         </div>        
    </div>


        <script type="text/javascript">
            var n = 0;
            var data = <?php echo ($data); ?>;
            $.ajaxSetup({cache: false});
            function reloads(n) {
                var url = "./install.php?g=Install&m=Index&a=mysql&n=" + n;
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {
                    },
                    success: function(msg) {
                        if (msg.n == '999999') {
                            $('#dosubmit').attr("disabled", false);
                            $('#dosubmit').removeAttr("disabled");
                            $('#dosubmit').removeClass("nonext");
                           setTimeout('gonext()', 2000);
                        }
                        if (msg.n) {
                            $('#loginner').append(msg.msg);
                            reloads(msg.n);
                        } else {
                            //alert('指定的数据库不存在，系统也无法创建，请先通过其他方式建立好数据库！');
                            alert(msg.msg);
                        }
                    }
                });
            }
            function gonext() {
                window.location.href = "<?php echo U('step5');?>";
            }
            $(document).ready(function() {
                reloads(n);
            })
        </script><?php break;?>
            <?php case "step5": ?><div class="example-box">
         <div id="form-wizard" class="form-wizard">
             <ul class="anchor">
            <li>
                <a href="<?php echo U('step1');?>" class="selected" isdone="1" rel="1">
                  <label class="wizard-step">1</label>
                  <span class="wizard-description">
                     阅读协议
                  </span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('step2');?>" class="selected" isdone="0" rel="2">
                  <label class="wizard-step">2</label>
                  <span class="wizard-description">
                     检测环境
                  </span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('step3');?>" class="selected" isdone="0" rel="3">
                  <label class="wizard-step">3</label>
                  <span class="wizard-description">
                    参数配置
                  </span>                   
                </a>
            </li>
            <li>
                <a href="<?php echo U('step4');?>" class="selected" isdone="0" rel="4">
                  <label class="wizard-step">4</label>
                  <span class="wizard-description">
                     安装进行
                  </span>                   
                </a>
            </li>
               <li>
                <a href="<?php echo U('step5');?>" class="selected" isdone="0" rel="5">
                  <label class="wizard-step">5</label>
                  <span class="wizard-description">
                     完成安装
                  </span>                   
                </a>
            </li>
          </ul>
         </div>
     </div>
    <div class="example-box">
         <div class="example-code clearfix">
             <div class='row'>
                 <div class="col-md-10">
                <div class="infobox success-bg text-center">
                    <div class=" large btn info-icon">
                      
                    </div>
                    <h4 class="infobox-title">OK,恭喜您!</h4>
                    <p>程序已经安装完成<b></b> 
                        <br><a href="/admin.php" title="后台链接">进入后台</a>&nbsp;&nbsp;<a href="/index.php" title="前台链接">进入前台</a>
                    </p>
                </div>
            </div>
             </div>
         </div>
    </div><?php break; endswitch;?>
          <div class="page-footer-wrapper footer text-center"> &copy; <?php echo date("Y");?> <a href="<?php echo C('SITE_URL');?>" target="_blank"><?php echo C('SITE_URL');?></a> (<?php echo ($Title); ?>)</div>

       </div>
    </div>
    </body>
</html>