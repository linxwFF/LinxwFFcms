<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>文章添加</title>
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
    <link rel="stylesheet" type="text/css" href="./statics/admin/assets/multiupload/fileupload.css?<?php echo C('KLCHOU_BUILD');?>">
    <script type="text/javascript" src="./statics/admin/assets/layer/jquery1.9.1.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <script type="text/javascript" src="./statics/admin/assets/layer/layer.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <script type="text/javascript" src="./statics/admin/assets/validateform/jquery.validate.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <script type="text/javascript" src="./statics/admin/js/public.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <script type="text/javascript" src="./statics/admin/addon/ajaxupload.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <link rel="stylesheet" type="text/css" href="./statics/admin/uploadify/uploadify.css?<?php echo C('KLCHOU_BUILD');?>">
    <script type="text/javascript" charset="utf-8" src="./statics/admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="./statics/admin/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="./statics/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
    <body>
        <!-- #page-title -->
    <!--------小标题----------->
<div id="page-title">

<big>
      <i class="glyph-icon icon-home"></i>  <?php echo ($curpos); ?>
</big>                
</div>
    <div id="page-user-changepwd" >
        <div id="page-content" >
            <form class="add_form" class="col-md-12 form-label-right center-margin" enctype="multipart/form-data" method="post" action="<?php echo U('Articles/add');?>">
                <div class="form-row">
                    <div class="form-label col-md-1">
                        <label for="">
                            所属栏目:
                            <span class="required">*</span>
                        </label>
                    </div>
                    <div class="form-input col-md-4">
                        <select name="parentid">
                            <?php  echo_channel_option($channel); function echo_channel_option($channel){ foreach($channel as &$item){ echo "<option value='".$item['id']."'>".level_space($item['level']).$item['name']."</option>"; if(is_array($item['children'])){ echo_channel_option($item['children']); } } } ?>

                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label col-md-1">
                        <label for="">
                            添加状态:
                            <span class="required">*</span>
                        </label>
                    </div>
                    <div class="form-checkbox-radio col-md-10">
                        <?php if(is_array($status)): foreach($status as $k=>$item): ?><div class="radio"><span class="ui-state-default btn radius-all-100 <?php if($k == 0): ?>checked<?php endif; ?> "><input value='<?php echo ($k); ?>' class="custom-radio" <?php if($k == 0): ?>checked="checked"<?php endif; ?>name="status" id="" type="radio"><i class="glyph-icon icon-circle"></i></span></div>
                            <label for="" class="<?php echo ($item['color']); ?>"><?php echo ($item['text']); ?></label><?php endforeach; endif; ?>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-label col-md-1">
                        <label for="">
                            自定属性:
                            <span class="required"></span>
                        </label>
                    </div>
                    <div class="form-checkbox-radio col-md-10">
                       <?php foreach($flag as $k=>$v){ ?>
                           <input id="" name="flag[]" value="<?php echo ($k); ?>" type="checkbox">
                        <label for=""><?php echo ($v); ?>[<?php echo ($k); ?>]</label>
                       <?php } ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label col-md-1">
                        <label for="">
                            文章标题:
                            <span class="required">*</span>
                        </label>
                    </div>
                    <div class="form-input col-md-4">
                        <input type="text"  class="parsley-validated" data-required="true"   name="title" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label col-md-1">
                        <label for="">
                            排序：
                            <span class="required"></span>
                        </label>
                    </div>
                    <div class="form-input col-md-4">
                        <input type="text"  name="sort" value="" />
                    </div>
                </div>
                <div class="form-row" >
                 <div class="form-label col-md-1">
                        <label for="">缩略图:  <span class="required">*</span></label>
                    </div>
                    <div class="form-input col-md-5 " >

                                <span class="btn medium bg-green fileinput-button">
                                    <span class="button-content">
                                      <i class="glyph-icon icon-plus"></i>
                                      添加图片
                                    </span>
                                    <input name="pics[]" multiple="true" id="uploadfile" type="file">
                                </span>
                          <div class="form-img show_pic" style="">
                            <table role="presentation" class="table table-striped">
                                <tbody class="files">

                                </tbody>
                            </table>
                         </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label col-md-1">
                        <label for="">文章内容:  <span class="required"></span></label>
                    </div>
                    <div class="form-input col-md-4" >
                        <script id="editor" name="content" type="text/plain" style="width:1024px;height:500px;"></script>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-input col-md-10 col-md-offset-1">
                        <button id="submit-btn" type="submit" class="btn medium primary-bg radius-all-2">添加</button>
                    </div>
                </div>
            </form>
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
             // ue.setContent('hello'); //设置编辑器内容


          });

    </script>

    <script type="text/javascript">
        $(function(){
        var validator = $(".add_form").validate({
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
                var $form = $(".add_form");
                var $btn = $("#submit-btn");
                var flag_array = new Array();
                $("input[name='flag[]']:checked").each(function(){
                flag_array.push($(this).val());
                });
                var action_url = $form.attr('action');
                if ($btn.hasClass("disabled")) return;
                var submitData = {
                parentid:$("select[name='parentid']", $form).val(),
                        title:$("input[name='title']", $form).val(),
                        status:$("input[name='status']:checked", $form).val(),
                        flag:flag_array,
                        thumb:$("input[name='imgs']", $form).val(),
                        content:UE.getEditor('editor').getContentTxt(),
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
         $(function(){
            var opt = {
                    id:"uploadfile",
                    frameName:"uplodframe",
                    url:"<?php echo U('Uploads/upload');?>",
                    format:['jpg','png','gif','jpeg','bmp'],
                    callBack:function(data){
                       var jsonData = jQuery.parseJSON(data);
                        if(jsonData.status == 1) {
                            var picarea='';
                           $.each( jsonData.path, function(index, content)
                             {
                                 picarea += "<tr class='template-upload'><td><img src='"+content.thumb+"' width='120'/></td>";
                                 picarea += "<td><input type='hidden' name='imgs' value='"+content.original+"' /><p class='name'>"+content.original+"</p></td>";
                                 picarea +="<td><button class='btn medium bg-orange cancel'  onclick='delete_pic(this)'><span class='button-content'><i class='glyph-icon icon-ban-circle'></i></span>删除</button></td></tr>";
                                 $(".files").append(picarea);
                             });
                              layer.msg('上传成功!');
                            }else {
                             layer.msg('上传失败!');
                         }
                    }
                };
             $("#uploadfile").change(function(){
                  ajaxUpload(opt);
             });
         });
         //删除图片
         function delete_pic(a){
             $(a).parents('td').parents('tr').remove();
         }
    </script>
</body>
</html>