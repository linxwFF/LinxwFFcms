<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>模型编辑</title>
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
    <script type="text/javascript" src="./statics/admin/assets/validateform/jquery.validate.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <script type="text/javascript" src="./statics/admin/js/public.js?<?php echo C('KLCHOU_BUILD');?>"></script>

    <body>
        <!-- #page-title -->
    <!--------小标题----------->
<div id="page-title">

<big>
      <i class="glyph-icon icon-home"></i>  <?php echo ($curpos); ?>
</big>                
</div>
    <div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                <li class="ui-state-default ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="normal-tabs-1" aria-labelledby="ui-id-4" aria-selected="true">
                    <a href="#normal-tabs-1" title="基本设置" class="ui-tabs-anchor" role="presentation" tabindex="1" id="ui-id-4">
                        基本设置
                    </a>
                </li>
                <li class="ui-state-default " role="tab" tabindex="-1" aria-controls="normal-tabs-2" aria-labelledby="ui-id-5" aria-selected="false">
                    <a href="#normal-tabs-2" title="字段管理" class="ui-tabs-anchor" role="presentation" tabindex="2" id="ui-id-5">
                        字段管理 
                    </a>
                </li>
            </ul>
            <div id="normal-tabs-1" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">
                <div id="page-user-changepwd" >
                    <div id="page-content" >
                        <form class="edit_form" class="col-md-12 form-label-right center-margin" enctype="multipart/form-data" method="post" action="<?php echo U('Module/edit');?>">
                            <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                            <div class="form-row">
                                <div class="form-label col-md-1">
                                    <label for="">
                                        模型类型:
                                        <span class="required">*</span>
                                    </label>
                                </div>
                                <div class="form-input col-md-4">
                                      <label for="">  <?php if($info['issystem'] == 0): ?>自动<?php else: ?>系统<?php endif; ?></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label col-md-1">
                                    <label for="">
                                        模型ID:
                                        <span class="required">*</span>
                                    </label>
                                </div>
                               <div class="form-input col-md-4">
                                    <?php echo ($id); ?>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-label col-md-1">
                                    <label for="">
                                        标识:
                                        <span class="required"></span>
                                    </label>
                                </div> 
                               <div class="form-input col-md-4">
                                  <?php echo ($info["nid"]); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label col-md-1">
                                    <label for="">
                                       模型名称:
                                        <span class="required">*</span>
                                    </label>
                                </div>
                                <div class="form-input col-md-4">
                                    <input type="text" value="<?php echo ($info["typename"]); ?>"  class="parsley-validated" data-required="true"   name="typename" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label col-md-1">
                                    <label for="">
                                        关联表：
                                        <span class="required"></span>
                                    </label>
                                </div>
                                <div class="form-input col-md-4">
                                    <?php echo ($info["relation_table"]); ?>
                                </div>
                            </div>
                               <div class="form-row">
                                <div class="form-label col-md-1">
                                    <label for="">
                                        是否禁用:
                                        <span class="required"></span>
                                    </label>
                                </div> 
                                <div class="form-checkbox-radio col-md-10">

                                    <input id="" name="status" value="0" <?php if($info['status'] == 0): ?>checked<?php endif; ?>  type="radio">
                                    <label for="">开启</label>
                                    <input id="" name="status" value="1" <?php if($info['status'] == 1): ?>checked<?php endif; ?>  type="radio">
                                    <label for="">禁用</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label col-md-1">
                                    <label for="">文档添加方法  <span class="required"></span></label>
                                </div>
                                <div class="form-input col-md-4" >
                                         <input type="text"  name="addaction" value="<?php echo ($info["addaction"]); ?>" />
                                </div>
                            </div>
                         <div class="form-row">
                                <div class="form-label col-md-1">
                                    <label for="">文档编辑方法  <span class="required"></span></label>
                                </div>
                                <div class="form-input col-md-4" >
                                         <input type="text"  name="editaction" value="<?php echo ($info["editaction"]); ?>" />
                                </div>
                            </div>
                                  <div class="form-row">
                                <div class="form-label col-md-1">
                                    <label for="">文档列表方法  <span class="required"></span></label>
                                </div>
                                <div class="form-input col-md-4" >
                                         <input type="text"  name="listaction" value="<?php echo ($info["listaction"]); ?>" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-input col-md-10 col-md-offset-1">
                                    <button id="submit-btn" type="submit" class="btn medium primary-bg radius-all-2">修改</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="normal-tabs-2" aria-labelledby="ui-id-5" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: none;" aria-expanded="false" aria-hidden="true">
               
                <div class="col-md-8">
                         <h4 class="content-box-header  ui-state-default">
                        <span><?php echo ($tables); ?>表字段,可从数据表中加入字段</span>
                    </h4>
                    <div class="content-box mrg25B">
                        <?php if(is_array($fields)): $i = 0; $__LIST__ = $fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table class="table table-striped text-center">
                                <thead>
                                    <tr><th class="text-center"><?php echo ($vo["table"]); ?> 表字段</th><th class="text-center">数据类型</th><th class="text-center">注释</th></tr>
                                </thead>
                                <tbody>
                                 <?php if(is_array($vo["field"])): $i = 0; $__LIST__ = $vo["field"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($item["field"]); ?></td><td><?php echo ($item["type"]); ?></td><td><?php echo ($item["comment"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table><?php endforeach; endif; else: echo "" ;endif; ?>
                     </div>
                    </div>
                
                
            </div>
        </div>
    
  

    <style>
        .table td {
            padding: 5px 16px;
        }
    </style>
    <script type="text/javascript">
          var ue = UE.getEditor('editor',{
              autoHeight:true,
              initialFrameWidth:880,
              initialFrameHeight:400
          });

           $("#parentid option[value=<?php echo ($info["channel_id"]); ?>]").attr("selected","selected");
    </script>

    <script type="text/javascript">
        $(function(){
        var validator = $(".edit_form").validate({
            rules: {
            title:{required:true}
            },
                messages: { title: "标题名称不能为空"},
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
                submitHandler: function() {
                var $form = $(".edit_form");
                var $btn = $("#submit-btn");
                var flag_array = new Array();
                $("input[name='flag[]']:checked").each(function(){
                flag_array.push($(this).val());
                });
                var action_url = $form.attr('action');
                if ($btn.hasClass("disabled")) return;
                var submitData = {
                        id:$("input[name='id']",$form).val(),
                      parentid:$("select[name='parentid']", $form).val(),
                        title:$("input[name='title']", $form).val(),
                        status:$("input[name='status']:checked",$form).val(),
                        flag:flag_array,
                        thumb:$("input[name='imgs']", $form).val(),
                        content:UE.getEditor('editor').getPlainTxt(),
                        sort:$("input[name='sort']", $form).val()
                };
                $.post(action_url, {info:submitData}, function(data) {
                if (data.status == 1) {
                layer.msg(data.info);
                window.location.href = data.url;
                } else {
                layer.msg(data.info);
                }
                }, "json");
                return false;
                }
        });
        });
    </script>
     <script type="text/javascript">
        $(function() {
        <?php $timestamp = time(); ?>
                $('#file_upload').uploadify({
        'formData' : {
        'timestamp' : '<?php echo $timestamp;?>'
        },
                'width':70,
                'height':30,
                'fileTypeDesc' : 'Image Files', //只允许上传图像
                'fileTypeExts' : '*.gif; *.jpg; *.png', //限制允许上传的图片后缀
                'buttonText': '选择图片',
                'swf'      :'./statics/admin/uploadify/uploadify.swf',
                'auto': true,
                'multi': true,
                'uploader' : "<?php echo U('Uploads/upload');?>",
                'onUploadSuccess' : function(file, data, response) {               //上传队列全部完成后执行的回调函数
                var jsonData = jQuery.parseJSON(data);
                $(".show_pic img").attr('src', jsonData.path);
                $("input[name='imgs']").val(jsonData.path);
                },
                'onUploadError':function(file, errorCode, errorMsg, errorString){       //上传文件失败触发
                layer.msg('The file' + file.name + 'could not be uploaded:code' + errorCode);
                }
        });
        });
    </script>
</body>
</html>