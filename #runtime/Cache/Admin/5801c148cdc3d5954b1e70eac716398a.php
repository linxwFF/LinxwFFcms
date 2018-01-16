<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>用户管理</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
     <!---require minified JS CSS--->
         <link rel="stylesheet" type="text/css" href="./statics/admin/assets/css/minified/aui-production.min.css?<?php echo C('KLCHOU_BUILD');?>">
         <link id="layout-theme" rel="stylesheet" type="text/css" href="./statics/admin/assets/themes/minified/fides/color-schemes/dark-blue.min.css?<?php echo C('KLCHOU_BUILD');?>">
         <link rel="stylesheet" type="text/css" href="./statics/admin/assets/themes/minified/fides/common.min.css?<?php echo C('KLCHOU_BUILD');?>">
         <script type="text/javascript" src="./statics/admin/assets/js/minified/aui-production.min.js?<?php echo C('KLCHOU_BUILD');?>"></script>
         <script type="text/javascript" src="./statics/admin/assets/js/minified/core/raphael.min.js?<?php echo C('KLCHOU_BUILD');?>"></script>
         <script type="text/javascript" src="./statics/admin/assets/js/minified/widgets/charts-justgage.min.js?<?php echo C('KLCHOU_BUILD');?>"></script>
<!---require minified JS CSS--->
    <script type="text/javascript" src="./statics/admin/assets/layer/jquery1.9.1.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <script type="text/javascript" src="./statics/admin/assets/layer/layer.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <body>
        <!-- #page-title -->
    <!--------小标题----------->
<div id="page-title">

<big>
      <i class="glyph-icon icon-home"></i>  <?php echo ($curpos); ?>
</big>                
</div>	

    <div id="page-content">
        <div class="row fg-toolbar ui-toolbar ">
            <a class="btn medium bg-gray " id="addUserLayer" title="" href="#">
                <span class="button-content">添加用户</span>
            </a>
        </div>
        <p class="font-gray-dark"></p>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>真实姓名</th>
                        <th>邮箱</th>
                        <th>角色</th>
                        <th>最后登录时间</th>
                        <th>最后登录IP</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($userList)): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($item["userid"]); ?></td>
                        <td class="font-bold text-left"><?php echo ($item["username"]); ?></td>
                        <td><?php echo ($item["realname"]); ?></td>
                        <td><?php echo ($item["email"]); ?></td>
                        <td><?php echo ($item["roleName"]); ?></td>
                         <td><?php if($vo['lastlogintime'] == 0): ?>该用户还没登陆过<?php else: ?>
                            <?php echo (date("Y-m-d H:i:s",$vo["lastlogintime"])); endif; ?></td>
                         <td><?php echo ($item["lastloginip"]); ?></td>
                        <td>
                            <a title=""  href="#" data-placement="top" class="btn medium ui-state-default" data-original-title="Edit">
                                <span class="glyph-icon icon-edit button-content editUserLayer" data-id="<?php echo ($item["userid"]); ?>">编辑</span>
                            </a>
                            <a title="" data-id="<?php echo ($item["userid"]); ?>"  data-placement="top" class="btn small bg-white tooltip-button userDelete"  href="#" data-original-title="Remove">
                                <span class="glyph-icon icon-remove " ></span>删除
                            </a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>  
        </div>
        <div class="row"><?php echo ($page); ?></div>
    </div>

 <script type="text/javascript" src="./statics/admin/assets/layer/jquery1.9.1.js?<?php echo C('KLCHOU_BUILD');?>"></script>
 <script type="text/javascript" src="./statics/admin/assets/validateform/jquery.validate.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <!----role add--->
    
<div id="page-user-add" style="display: none;">
    <div id="page-content" >
        <h3></h3>
        <form id="addUserForm" class="col-md-12 form-label-right center-margin" method="post" action="<?php echo U('Users/userAdd');?>">
            <input type="hidden" name="verify" value="<?php echo randString(6); ?>"/>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        所属角色:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <select name="roleid" id="roleid">
                        <?php if(is_array($rolelist)): $i = 0; $__LIST__ = $rolelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>

                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        用户名:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="username" name="username" id="username">
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        密码:
                        <span class="required"></span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="password" class="parsley-validated" data-required="true" data-trigger="change" data-type="password" name="password" id="password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        确认密码:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="password" class="parsley-validated" data-required="true" data-trigger="change" data-type="repassword" name="repassword" id="repassword">
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        真实姓名:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="realname" name="realname" id="realname">
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        邮箱:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="email" name="email" id="email">
                </div>
            </div>

            <div class="layui-layer-btn" style="display:none;">

                <a class="layui-layer-btn0"> <button id="adduser-form-button"  class='layui-layer-btn0 ' style="border:0px;" type='submit'>提交</button></a>

                <a class="layui-layer-btn1"><button id="adduser-form-cancel" class='layui-layer-btn1' style="border:0px;" type='submit'>取消</button></a>
            </div>


        </form>
    </div>
</div>


<script type="text/javascript">
    $('#addUserLayer').on('click', function () {
        //赋值
        var form=$("#editUserForm");
        $("#roleid").empty();
        var get_role_url = "<?php echo U('Users/userAdd');?>";
       $.get(get_role_url,{},function(data){
         $.each(data.info,function(index,obj){
            $("#roleid").append("<option value="+index+">"+obj+"</option>"); 
         });       
       }); 
        layer.open({
            type: 1,
            area: ['540px', '388px'],
            title: '添加用户',
            shadeClose: true, //点击遮罩关闭层
            content: $('#page-user-add'), //捕获的DIV
            btn: ['添加', '取消'],
            cancel: function (index) {
                layer.close(index);
            },
            yes: function () {
                //绑定提交表单时间
                $('#adduser-form-button').trigger('click');

            }
        });
    });
    $(function () {
        $('#addUserForm').validate({
            rules: {
                roleid: {required: true},
                username: {required: true},
                username:{required: true},
                password:{
                    required: true,
                    minlength:6,
                    maxlength:16
                },
                repassword:{
                    required: true,
                    equalTo:'#password' 
                        },
                realname:{required: true},
                email: {required: true}
            },
            messages: {
                roleid: "所属角色不能为空",
                username: "用户名不能为空",
                 password: {
                    require: "请输入密码",
                    minlength:"密码长度不够",
                    maxlength:"密码长度不能超过16"
                 },
                 repassword: {
                    required: "重复密码不能为空",
                    equalTo:"两次输入密码不相同"
                 },
                 realname: "真实名不能为空",
                 email: "邮箱不能为空",  
            },
            showErrors: function (errorMap, errorList) {
                if (errorList && errorList.length > 0) {
                    $.each(errorList, function (index, obj) {
                        var item = $(obj.element);
                        //给输入框添加出错样式
                        item.addClass('parsley-error');
                        item.attr("title", obj.message);
                    });
                } else {
                    var item = $(this.currentElements);
                    item.removeClass('parsley-error');
                    item.removeAttr("title");
                }
            },
            submitHandler: function () {
                var submitButton = $(this.submitButton);
                var form = $('#addUserForm');
                var action_url = form.attr('action');
                $("#submitbtn").attr("disabled", true);
                $("#saveandjump").attr("disabled", true);
                var submitData = {
                    roleid:$("select[name='roleid']", form).val(),
                    username: $("input[name='username']", form).val(),
                    password: $("input[name='password']", form).val(),
                    repassword: $("input[name='repassword']", form).val(),
                    realname: $("input[name='realname']", form).val(),
                    email:$("input[name='email']", form).val(),
                    verify:$("input[name='verify']",form).val(),
                };

                $.post(action_url, {info: submitData}, function (data) {
                    $("#submitbtn").removeAttr("disabled");
                    $("#saveandjump").removeAttr("disabled");
                    layer.msg(data.info);
                    if (data.status == 1) {
                        layer.msg('添加成功');
                        window.location.reload();
                    } else {
                        layer.msg(data.info);
                    }
                }, 'json');
                return false;
            }
        });
    });
</script>
    <!----role edit--->
    
<div id="page-user-edit" style="display: none;">
    <div id="page-content" >
        <h3></h3>
        <form id="editUserForm" class="col-md-12 form-label-right center-margin" method="post" action="<?php echo U('Users/userEdit');?>">
            <input type="hidden" name="userid" value="<?php echo ($info["userid"]); ?>"/>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        所属角色:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <select name="roleid" id="roleid">
                        <?php if(is_array($rolelist)): $i = 0; $__LIST__ = $rolelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        用户名：
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="username" name="username" id="username">
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        真实姓名：
                        <span class="required"></span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="realname" name="realname" id="realname">
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        email：
                        <span class="required"></span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="email" name="email" id="email">
                </div>
            </div>

            <div class="layui-layer-btn" style="display:none;">

                <a class="layui-layer-btn0"> <button id="edituser-form-button"  class='layui-layer-btn0 ' style="border:0px;" type='submit'>提交</button></a>

                <a class="layui-layer-btn1"><button id="edituser-form-cancel" class='layui-layer-btn1' style="border:0px;" type='submit'>取消</button></a>
            </div>


        </form>
    </div>
</div>
<script>

    $('.editUserLayer').on('click', function () {
        //赋值
        var form = $("#editUserForm");
        var id = $(this).attr('data-id');
       
        var action_url = "<?php echo U('Users/userEdit');?>" + '&id=' + id;
        $.get(action_url, {}, function (data) {
            var rolelist = data.info.rolelist;
            var info = data.info.info;
             $("select[name='roleid']", form).empty();
            $.each(rolelist, function (index, obj) {
                if (index == info.roleid) {
                    $("select[name='roleid']", form).append("<option selected value=" + index + ">" + obj + "</option>");
                } else {
                    $("select[name='roleid']", form).append("<option value=" + index + ">" + obj + "</option>");
                }
            });
            $("input[name='userid']", form).val(info.userid);
            $("input[name='username']", form).val(info.username);
            $("input[name='realname']", form).val(info.realname);
            $("input[name='email']", form).val(info.email);
        });
        layer.open({
            type: 1,
            area: ['540px', '350px'],
            title: '编辑角色',
            shadeClose: true, //点击遮罩关闭层
            content: $('#page-user-edit'), //捕获的DIV
            btn: ['保存', '取消'],
            cancel: function (index) {
                layer.close(index);
            },
            yes: function () {
                //绑定提交表单时间
                $('#edituser-form-button').trigger('click');

            }
        });
    });
    $(function () {
        $('#editUserForm').validate({
            rules: {
                roleid: {required: true},
                username: {required: true},
                realname: {required: true},
                email: {required: true}
            },
            messages: {
                roleid: "角色名称必须",
                username: "用户名称必须",
                realname: "真实姓名不能为空",
                email: "邮箱不能为空"
            },
            showErrors: function (errorMap, errorList) {
                if (errorList && errorList.length > 0) {
                    $.each(errorList, function (index, obj) {
                        var item = $(obj.element);
                        //给输入框添加出错样式
                        item.addClass('parsley-error');
                        item.attr("title", obj.message);
                    });
                } else {
                    var item = $(this.currentElements);
                    item.removeClass('parsley-error');
                    item.removeAttr("title");
                }
            },
            submitHandler: function () {
                var submitButton = $(this.submitButton);
                var form = $('#editUserForm');
                var action_url = form.attr('action');
                $("#submitbtn").attr("disabled", true);
                $("#saveandjump").attr("disabled", true);
                var submitData = {
                    roleid: $("select[name='roleid']", form).val(),
                    userid: $("input[name='userid']", form).val(),
                    name: $("input[name='username']", form).val(),
                    realname: $("input[name='realname']", form).val(),
                    email: $("input[name='email']", form).val()
                };

                $.post(action_url, {info: submitData}, function (data) {
                    $("#submitbtn").removeAttr("disabled");
                    $("#saveandjump").removeAttr("disabled");
                    layer.msg(data.info);
                    if (data.status == 1) {
                        layer.msg('保存成功');
                        window.location.reload();
                    } else {
                        layer.msg(data.info);
                    }
                }, 'json');
                return false;
            }
        });
    });
</script>
    <!--role delete--->
    <script type="text/javascript">
        $('.userDelete').on('click', function(){
        var id = $(this).attr('data-id');
        var delete_user_url = "<?php echo U('Users/userDelete');?>" + "&id=" + id;
        if (confirm("确定要删除!")){
        $.post(delete_user_url, {}, function(data){
        if (data.status == 1){
            layer.msg('删除成功');
              window.location.reload();
            } else{
               layer.msg('删除失败');
            }
            }, 'json');
        } 
        });
    </script>
</body>
</html>