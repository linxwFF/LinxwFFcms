<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>菜单管理</title>
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


    <style>
        .table td {
            padding: 5px 16px;
        }
    </style>



    <div id="page-content">
        <div class="row fg-toolbar ui-toolbar ">
            <a href="#" title="" id="addMenuLayer" class="btn medium bg-gray ">
                <span class="button-content">添加</span>
            </a>
        </div>
        <p class="font-gray-dark"></p>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>菜单ID</th>
                        <th>菜单名称</th>
                        <th>模块名</th>
                        <th>方法名</th>
                        <th>附加参数</th>
                        <th>菜单级别</th>
                        <th>排序</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr class="sub_menu1">
                        <td><?php echo ($item["id"]); ?></td>
                        <td class="font-bold text-left"><a class="menu_tree" is-load="0" menu-level="<?php echo ($item["level"]); ?>" onclick="menu_tree(this,'close')" href="javascript:void(0)" note-id="<?php echo ($item["id"]); ?>" ><i class="glyph-icon icon-plus"></i> <?php echo ($item["name"]); ?></a> </td>
                        <td><?php echo ($item["controller"]); ?></td>
                        <td><?php echo ($item["action"]); ?></td>
                        <td><?php echo ($item["params"]); ?></td>
                        <td><?php echo ($item["level"]); ?></td>
                        <td><?php echo ($item["sort"]); ?></td>
                        <td><?php if($item['status'] == 1): ?>显示<?php elseif($item['status'] == 2): ?>隐藏<?php else: ?>删除<?php endif; ?></td>
                    <td>
                        <a title=""  href="#" data-placement="top" class="btn medium ui-state-default" data-original-title="Edit">
                            <span class="glyph-icon icon-edit button-content editMenuLayer" data-id="<?php echo ($item["id"]); ?>">编辑</span>
                        </a>
                        <a title="" data-id="<?php echo ($item["id"]); ?>"  data-placement="top" class="btn small bg-white tooltip-button menuDelete"  href="#" data-original-title="Remove">
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
    
<div id="page-menu-add" style="display: none;">
    <div id="page-content" >
        <h3></h3>
        <form id="addForm" class="col-md-12 form-label-right center-margin" method="post" action="<?php echo U('Menu/addMenu');?>">
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        上级菜单:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <select name="pid" id="pid">
                        <?php if(is_array($menulist)): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>

                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        菜单名称:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="name" name="name" id="name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        模块名:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="controller" name="controller" id="controller">
                </div>
            </div>
             <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        方法名:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="action" name="action" id="action">
                </div>
            </div>
            
             <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        附加参数:
                        <span class="required"></span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="params" name="params" id="params">
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
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="sort" name="sort" id="sort">
                </div>
            </div>
             <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        是否显示:
                        <span class="required"></span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <select name="status" id="statuc">
                        <option value="1">显示</option>
                        <option value="0">隐藏</option>
                    </select>
                </div>
            </div>
            
            <div class="layui-layer-btn" style="display:none;">

                <a class="layui-layer-btn0"> <button id="add-form-button"  class='layui-layer-btn0 ' style="border:0px;" type='submit'>提交</button></a>

                <a class="layui-layer-btn1"><button id="add-form-cancel" class='layui-layer-btn1' style="border:0px;" type='submit'>取消</button></a>
            </div>


        </form>
    </div>
</div>


<script type="text/javascript">
    $('#addMenuLayer').on('click', function () {
        //加载树状选择菜单
        
        load_menu_select('addForm');
   
        layer.open({
            type: 1,
            area: ['540px', '430px'],
            title: '添加菜单',
            shadeClose: true, //点击遮罩关闭层
            content: $('#page-menu-add'), //捕获的DIV
            btn: ['添加', '取消'],
            cancel: function (index) {
                layer.close(index);
            },
            yes: function () {
                //绑定提交表单时间
                $('#add-form-button').trigger('click');

            }
        });
    });
    $(function () {
        $('#addForm').validate({
            rules: {
                pid:{required:true},
                name: {required: true},
                controller: {required: true},
                action:{required: true}
            },
            messages: {
                pid: "请选择上级菜单",
                name: "菜单名不能为空",
                controller: "请输入模块名",
                action: "请输入方法名"
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
                var form = $('#addForm');
                var action_url = form.attr('action');
                $("#submitbtn").attr("disabled", true);
                $("#saveandjump").attr("disabled", true);
                var submitData = {
                    pid: $("select[name='pid']", form).val(),
                    name: $("input[name='name']", form).val(),
                    controller: $("input[name='controller']", form).val(),
                    action: $("input[name='action']", form).val()
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
    
<div id="page-menu-edit" style="display: none;">
    <div id="page-content" >
        <h3></h3>
        <form id="editForm" class="col-md-12 form-label-right center-margin" method="post" action="<?php echo U('Menu/editMenu');?>">
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        上级菜单:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <select name="pid" id="pid">
                        <?php if(is_array($menulist)): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>

                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        菜单名称:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="name" name="name" value="<?php echo ($info["name"]); ?>" id="name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        模块名:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="controller" name="controller" value="<?php echo ($info["controller"]); ?>" id="controller">
                </div>
            </div>
             <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        方法名:
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="action" name="action" value="<?php echo ($info["action"]); ?>" id="action">
                </div>
            </div>
            
             <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        附加参数:
                        <span class="required"></span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="params" name="params" value="<?php echo ($info["params"]); ?>" id="params">
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
                    <input type="text" class="parsley-validated" data-required="true" data-trigger="change" data-type="sort" name="sort" value="<?php echo ($info["sort"]); ?>" id="sort">
                </div>
            </div>
             <div class="form-row">
                <div class="form-label col-md-3">
                    <label for="">
                        是否显示:
                        <span class="required"></span>
                    </label>
                </div>
                <div class="form-input col-md-8">
                    <select name="status" id="status">
                        <option value="1" <?php if(($$info['status']) == "1"): ?>checked<?php endif; ?>>显示</option>
                        <option value="0" <?php if(($$info['status']) == "0"): ?>checked<?php endif; ?>>隐藏</option>
                    </select>
                </div>
            </div>
            
            <div class="layui-layer-btn" style="display:none;">
                <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
                <a class="layui-layer-btn0"> <button id="edit-form-button"  class='layui-layer-btn0 ' style="border:0px;" type='submit'>提交</button></a>

                <a class="layui-layer-btn1"><button id="edit-form-cancel" class='layui-layer-btn1' style="border:0px;" type='submit'>取消</button></a>
            </div>


        </form>
    </div>
</div>


<script type="text/javascript">
  $('tbody').on('click','.editMenuLayer', function (){
        //加载树状选择菜单
        load_menu_select('editForm');
         var form = $("#editForm");
        var id = $(this).attr('data-id');
        var action_url = "<?php echo U('Menu/editMenu');?>" + '&id=' + id;
        $.get(action_url, {}, function (data) {
            var info = data.info;
            $("input[name='name']", form).val(info.name);
            $("input[name='controller']", form).val(info.controller);
            $("input[name='action']", form).val(info.action);
            $("input[name='params']", form).val(info.params);
            $("input[name='sort']", form).val(info.sort);
            $("input[name='id']", form).val(info.id);
            $("#editForm #pid option[value='"+info.pid+"']").attr("selected","selected");
            $("#editForm #status option[value='"+info.status+"']").attr("selected","selected");
        });
        layer.open({
            type: 1,
            area: ['540px', '430px'],
            title: '编辑菜单',
            shadeClose: true, //点击遮罩关闭层
            content: $('#page-menu-edit'), //捕获的DIV
            btn: ['保存', '取消'],
            cancel: function (index) {
                layer.close(index);
            },
            yes: function () {
                //绑定提交表单时间
                $('#edit-form-button').trigger('click');

            }
        });
    });
    $(function () {
        $('#editForm').validate({
            rules: {
                pid:{required:true},
                name: {required: true},
                controller: {required: true},
                action:{required: true}
            },
            messages: {
                pid: "请选择上级菜单",
                name: "菜单名不能为空",
                controller: "请输入模块名",
                action: "请输入方法名"
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
                var form = $('#editForm');
                var action_url = form.attr('action');
                $("#submitbtn").attr("disabled", true);
                $("#saveandjump").attr("disabled", true);
                var submitData = {
                    id:$("input[name='id']",form).val(),
                    pid: $("select[name='pid']", form).val(),
                    name: $("input[name='name']", form).val(),
                    params:$("input[name='params']", form).val(),
                    controller: $("input[name='controller']", form).val(),
                    action: $("input[name='action']", form).val(),
                    sort:$("input[name='sort']", form).val(),
                    status:$("select[name='status']", form).val()
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
    <script>
        
       //加载树状选择菜单
    function load_menu_select(form){
        var action_url = "<?php echo U('Menu/public_menu_select');?>";
        var form=$('#'+form+'');
        $("select[name='pid']",form).html('');
        $.get(action_url, {}, function (data) {
            $("select[name='pid']",form).append(data.info);
        });
    }
        
    </script>
    <script>
     //树状菜单
       function menu_tree(a,type){
            var note_id = $(a).attr('note-id');
            var is_load = $(a).attr('is-load');
            var level = parseInt($(a).attr('menu-level'));
           if(type=="close"){  
               var url="<?php echo U('Menu/sub_menu');?>"
               //是否已经加载
               if(is_load!=1){
                    $.post(url,{id:note_id},function(data){
                      if(data.status==1){
                            $(a).attr('onclick',"menu_tree(this,'open')");
                            $(a).children('i').removeClass('icon-plus');
                            $(a).children('i').addClass("icon-minus");
                          $(a).attr('is-load',1);
                          $(a).parent('td').parent('tr').after(data.info);
                      }
                    },'json');
               }else{
                    $(a).attr('onclick',"menu_tree(this,'open')");
                            $(a).children('i').removeClass('icon-plus');
                            $(a).children('i').addClass("icon-minus");
                    //显示下级
                    $(a).parent('td').parent('tr').nextUntil('.sub_menu'+level+'').show();
               }
            }else{
                $(a).children('i').removeClass('icon-minus');
                $(a).children('i').addClass("icon-plus");
                $(a).attr('onclick',"menu_tree(this,'close')");
                //隐藏下级      
                if(level<2){
                   $(a).parent('td').parent('tr').nextUntil('.sub_menu'+level+'').hide();
                }else{
                      var s = $(a).parent('td').parent('tr').nextAll();
                      var next_level = parseInt(level)+1;
                        s.each(function(k,v){
                            if($(this).attr('class')=='sub_menu'+next_level+''){
                               $(this).hide();
                            }else{
                                return false;
                            }
                      });
                }
            }
        }
        
    </script>
    <!--menu delete--->
    <script type="text/javascript">
        $('tbody').on('click','.menuDelete', function(){
        var id = $(this).attr('data-id');
        var ids  = [id];
        var delete_menu_url = "<?php echo U('Menu/deleteMenu');?>";
        if (confirm("确定要删除!")){
        $.post(delete_menu_url, {ids:ids}, function(data){
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