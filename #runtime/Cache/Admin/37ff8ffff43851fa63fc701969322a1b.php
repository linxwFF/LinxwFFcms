<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>角色管理</title>
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
            <a class="btn medium bg-gray " id="addRoleLayer" title="" href="#">
                <span class="button-content">添加角色</span>
            </a>
        </div>
        <p class="font-gray-dark"></p>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>角色名称</th>
                        <th>角色描述</th>
                        <th>排序</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($item["id"]); ?></td>
                        <td class="font-bold text-left"><?php echo ($item["name"]); ?></td>
                        <td><?php echo ($item["remark"]); ?></td>
                        <td><?php echo ($item["listorder"]); ?></td>
                        <td><?php echo ($item["status"]); ?></td>
                        <td>
                            <a title=""  href="#" data-placement="top" class="btn medium ui-state-default" data-original-title="Edit">
                                <span class="glyph-icon icon-edit button-content editRoleLayer" data-id="<?php echo ($item["id"]); ?>">编辑</span>
                            </a>
                            <a title=""  href="#" data-placement="top" class="btn medium ui-state-default rolePriv" data-original-title="Edit">
                                <span class="glyph-icon icon-separator button-content editAccessLayer " data-id="<?php echo ($item["id"]); ?>">分配权限</span>
                            </a>
                            <a title="" data-id="<?php echo ($item["id"]); ?>"  data-placement="top" class="btn small bg-white tooltip-button roleDelete"  href="#" data-original-title="Remove">
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
 <div id="page-role-add" style="display: none;">
    <div id="page-content" >
        <h3></h3>
        <form id="addRoleForm" class="col-md-12 form-label-right center-margin" method="post" action="<?php echo U('Role/roleAdd');?>">
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        角色名称:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input  required type="text" class="control-input " name="name"  >

                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        角色描述:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <textarea required  class="small-textarea" name="remark"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        排序:
                        <span class="required"></span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="listorder" name="listorder" id="name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        是否启用:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <select name="status" id="status">
                        <option value="1">启用</option>
                        <option value="0">禁用</option>       
                    </select>

                </div>
            </div>
           
            <div class="layui-layer-btn" style="display:none;">
                
                <a class="layui-layer-btn0"> <button id="addrole-form-button"  class='layui-layer-btn0 ' style="border:0px;" type='submit'>提交</button></a>
                
                <a class="layui-layer-btn1"><button id="addrole-form-cancel" class='layui-layer-btn1' style="border:0px;" type='submit'>取消</button></a>
            </div>
            

        </form>
    </div>

</div>
<script type="text/javascript">
//弹出 tips
//      $("#addRoleLayer").on('click',function(){
//         layer.msg('hello layer'); 
//          
//      });
//弹出页面层
//        $("#addRoleLayer").on('click',function(){
//      layer.open({
//         type:1,
//         area:['600px','360px'],
//         shadeClose:true,//点击遮罩关闭
//         content:'\<\div style="padding:20px;">自定义内容\<\/div>'
//      });
//          
//      });

//iframe
//$('#addRoleLayer').on('click', function(){
//    layer.open({
//        type: 2,
//        title: '添加角色',
//        maxmin: false,
//        shadeClose: true, //点击遮罩关闭层
//        area : ['600px' , '340px'],
//        content: "<?php echo U('Role/roleAdd');?>",
//        btn:['添加','取消'],
//        yes:function(){
//         console.log($('#addRoleForm').attr('action')); 
//        },
//        no:function(){
//             
//        }
//        
//    });
//});
    //添加角色弹出
     $('#addRoleLayer').on('click', function () {
        layer.open({
            type: 1,
            area: ['540px', '350px'],
            title: '添加角色',
            shadeClose: true, //点击遮罩关闭层
            content: $('#page-role-add'), //捕获的DIV
            btn: ['添加', '取消'],
            cancel: function (index) {
               
            },
            yes: function () {
                //绑定提交表单时间
                $('#addrole-form-button').trigger('click');
                 layer.close(index);
            }
        });
    });

    $(function () {
        $('#addRoleForm').validate({
            rules: {
                role_name: {required: true},
                remark: {required: true}
            },
            messages: {
                name: "角色名称必须",
                remark: "角色描述必须",
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
                var form = $('#addRoleForm');
                var action_url = form.attr('action');
                $("#submitbtn").attr("disabled", true);
                $("#saveandjump").attr("disabled", true);
                var submitData = {
                    name:  $("input[name='name']", form).val(),
                    remark: $("textarea[name='remark']", form).val(),
                    listorder: $("input[name='listorder']", form).val(),
                    status:$("select[name='status']",form).val()
                };

                $.post(action_url, {info:submitData}, function (data) {
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
    
<div id="page-role-edit" style="display: none;">
    <div id="page-content" >
        <h3></h3>
        <form id="editRoleForm" class="col-md-12 form-label-right center-margin" method="post" action="<?php echo U('Role/roleEdit');?>">
            <input type="hidden" name="id" value="" />
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        角色名称:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input  required type="text" class="control-input "  name="name"  >

                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        角色描述:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <textarea required  class="small-textarea" name="remark"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        排序:
                        <span class="required"></span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="listorder" name="listorder" id="name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        是否启用:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <select name="status" id="status">
                        <option value="1">启用</option>
                        <option value="0">禁用</option>       
                    </select>

                </div>
            </div>

            <div class="layui-layer-btn" style="display:none;">

                <a class="layui-layer-btn0"> <button id="editrole-form-button"  class='layui-layer-btn0 ' style="border:0px;" type='submit'>提交</button></a>

                <a class="layui-layer-btn1"><button id="editrole-form-cancel" class='layui-layer-btn1' style="border:0px;" type='submit'>取消</button></a>
            </div>


        </form>
    </div>
</div>
<script>
    $('.editRoleLayer').on('click', function () {
        //赋值
        var form=$("#editRoleForm");
        var id = $(this).attr('data-id');
        var get_role_url = "<?php echo U('Role/roleEdit');?>"+'&id='+id;
       $.get(get_role_url,{},function(data){
          var data=data.info;
            $("input[name='id']",form).val(data.id);
            $("input[name='name']",form).val(data.name);
            $("textarea[name='remark']", form).val(data.remark);
            $("input[name='listorder']", form).val(data.listorder);
            $("select[name='status']", form).val(data.status);
       }); 
        layer.open({
            type: 1,
            area: ['540px', '350px'],
            title: '编辑角色',
            shadeClose: true, //点击遮罩关闭层
            content: $('#page-role-edit'), //捕获的DIV
            btn: ['保存', '取消'],
            cancel: function (index) {
                layer.close(index); 
            },
            yes: function () {
                //绑定提交表单时间
                $('#editrole-form-button').trigger('click');

            }
        });
    });
    $(function () {
        $('#editRoleForm').validate({
            rules: {
                role_name: {required: true},
                remark: {required: true}
            },
            messages: {
                name: "角色名称必须",
                remark: "角色描述必须",
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
                var form = $('#editRoleForm');
                var action_url = form.attr('action');
                $("#submitbtn").attr("disabled", true);
                $("#saveandjump").attr("disabled", true);
                var submitData = {
                    id:$("input[name='id']",form).val(),
                    name: $("input[name='name']", form).val(),
                    remark: $("textarea[name='remark']", form).val(), 
                    listorder: $("input[name='listorder']", form).val(),
                    status: $("select[name='status']", form).val()
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
        $('.roleDelete').on('click', function(){
        var id = $(this).attr('data-id');
        var delete_role_url = "<?php echo U('Role/roleDelete');?>" + "&id=" + id;
        if (confirm("确定要删除!")){
        $.post(delete_role_url, {}, function(data){
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
    <script type="text/javascript">
        //权限弹层
       $('.editAccessLayer').on('click', function () {
        var form = $("#editAccessForm");
        var id = $(this).attr('data-id');
        var url = "<?php echo U('Role/roleAccess');?>"+"&id="+id;
       if(id == 1){
            layer.msg('该角色无需设置权限');
            return false;
        }
        $.get(url,{},function(data){
           var content = data;
           $("#editAccessForm").append(content);
        });
        layer.open({
            type: 2,
            area: ['540px', '400px'],
            title: '权限配置',
            shadeClose: true, //点击遮罩关闭层
            content: ["<?php echo U('Role/roleAccess');?>"+'&id='+id,'',id], //捕获的DIV
            btn:['保存','取消'],
            yes:function(){
                var contents =  $("#layui-layer-iframe"+id+"").contents();
                $("#layui-layer-iframe"+id+"").contents().find("#editaccess-form-button").trigger('click');
            },
            no:function(){
            }
        });
    });


    </script>
</body>
</html>