<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>产品编辑</title>
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
<!--百度编辑器-->
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
            <form class="edit_form" enctype="multipart/form-data" method="post" action="<?php echo U('Goods/edit');?>">
              <input type="hidden" name="goods_id" value="<?php echo ($info["goods_id"]); ?>"/>
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
                            上架状态:
                            <span class="required">*</span>
                        </label>
                    </div>
                    <div class="form-checkbox-radio col-md-10">
                        <?php if(is_array($status)): foreach($status as $k=>$item): ?><div class="radio"><span class="ui-state-default btn radius-all-100 <?php if($k == 0): ?>checked<?php endif; ?> "><input value='<?php echo ($item["value"]); ?>' class="custom-radio" <?php if($k == 0): ?>checked="checked"<?php endif; ?>name="marketable" id="" type="radio"><i class="glyph-icon icon-circle"></i></span></div>
                            <label for="" ><?php echo ($item['text']); ?></label><?php endforeach; endif; ?>
                    </div>

                </div>
        
                <div class="form-row">
                    <div class="form-label col-md-1">
                        <label for="">
                            商品名称:
                            <span class="required">*</span>
                        </label>
                    </div>
                    <div class="form-input col-md-4">
                        <input type="text" value="<?php echo ($info["goods_name"]); ?>"  class="parsley-validated" data-required="true"   name="goods_name" >
                    </div>
                </div>
                 <div class="form-row">
                    <div class="form-label col-md-1">
                        <label for="">
                            商品货号:
                        </label>
                    </div>
                    <div class="form-input col-md-4">
                        <input type="text" value="<?php echo ($info["goods_no"]); ?>"  class="parsley-validated" data-required="true"   name="goods_no" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label col-md-1">
                        <label for="">
                            价格：
                            <span class="required">*</span>
                        </label>
                    </div>
                    <div class="form-input col-md-2">
                        <input type="text" placeholder="商品销售价"  name="market_price" value="<?php echo ($info["market_price"]); ?>" />
                    </div>
                       <div class="form-input col-md-2">
                        <input type="text" placeholder="商品原价"  name="goods_price" value="<?php echo ($info["goods_price"]); ?>" />
                    </div>
                </div>
                <div class="form-row" >
                    <div class="form-label col-md-1">
                        <label for="">商品图集:  <span class="required">*</span></label>
                    </div>
                    <div class="form-input col-md-5 " >
               
                                <span class="btn medium bg-green fileinput-button">
                                    <span class="button-content">
                                      <i class="glyph-icon icon-plus"></i>
                                      添加图片
                                    </span>
                                    <input name="pics[]" multiple="true" id="uploadfile" type="file">
                                </span>
               
<!-- <div class="uploadify"  style="border:1px solid #ccc;border-bottom:none; height: 40px;margin-bottom: 0px;padding:5px 5px;">
                            <input type="file" name="file_upload" id="file_upload" multiple="true" />
                            <input type="hidden" name="imgs[]" />
                            <div id="queue"></div>
                        </div>-->
                        <div class="form-img show_pic" style="">
                            <table role="presentation" class="table table-striped">
                                <tbody class="files">
                           
                                <?php if(is_array($pics)): $i = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(!empty($vo['thumb_pic'])){ ?>
                                    <tr class="template-upload">
                                        <td><img src="<?php echo ($vo["thumb_pic"]); ?>" width="120"></td>
                                        <td>
                                            <input name="goods_pic[]" value="<?php echo ($vo["goods_pic"]); ?>" type="hidden">
                                            <input name="thumb_pic[]" value="<?php echo ($vo["thumb_pic"]); ?>" type="hidden">
                                            <p class="name"><?php echo ($vo["goods_pic"]); ?></p></td><td>
                                            <button class="btn medium bg-orange cancel" onclick="delete_pic(this)">
                                           <span class="button-content"><i class="glyph-icon icon-ban-circle"></i>
                                           </span>删除</button></td>
                                    </tr>
                                    <?php } endforeach; endif; else: echo "" ;endif; ?>
                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
          
                <div class="form-row">
                    <div class="form-label col-md-1">
                        <label for="">商品详情:  <span class="required"></span></label>
                    </div>
                    <div class="form-input col-md-4" >
                        <script id="editor" name="goods_body" type="text/plain" style="width:1024px;height:500px;"><?php echo ($info["goods_body"]); ?></script>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-input col-md-10 col-md-offset-1">
                        <button id="submit-btn" type="submit" class="btn medium primary-bg radius-all-2">保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
          var ue = UE.getEditor('editor',{
              autoHeight:true,
              elementPathEnabled:false,
              wordCount:false,
              initialFrameWidth:700,
              initialFrameHeight:300,
              toolbars: [['source', 'insertcode', 'undo', 'redo','simpleupload', 'insertimage', 'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']]
          }); 
    </script>

    <script type="text/javascript">
        $(function(){
        var validator = $(".edit_form").validate({
                rules: {
                        goods_name:{required:true},
                        market_price:{required:true,number:true},
                        goods_price:{required:true,number:true},
                        goods_pic:{required:true}
                    },
                messages: { 
                        goods_name: {required:"商品名称不能为空"},
                        market_price:{required:"商品销售价不能为空",number:"请输入正确的金额"},
                        goods_price:{required:"商品原价不能为空",number:"请输入正确的商品价格"},
                        goods_pic:{required:"商品价格不能为空"}
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
                submitHandler: function() {
                var $form = $(".edit_form");
                var $btn = $("#submit-btn");
                var goods_pics = new Array();
                var thumb_pics = new Array();
                $("input[name='goods_pic[]']").each(function(){
                   goods_pics.push($(this).val());
                });
                 $("input[name='thumb_pic[]']").each(function(){
                   thumb_pics.push($(this).val());
                });
                var action_url = $form.attr('action');
                if ($btn.hasClass("disabled")) return;
                var submitData = {
                        goods_id:$("input[name='goods_id']",$form).val(),
                        channel_id:$("select[name='parentid']", $form).val(),
                        goods_name:$("input[name='goods_name']", $form).val(),
                        marketable:$("input[name='marketable']:checked", $form).val(),
                        goods_price:$("input[name='goods_price']",$form).val(),
                        market_price:$("input[name='market_price']",$form).val(),
                        goods_no:$("input[name='goods_no']",$form).val(),
                        goods_pic:goods_pics,
                        thumb_pic:thumb_pics,
                        goods_body:UE.getEditor('editor').getContentTxt()
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
                                 picarea += "<td><input type='hidden' name='goods_pic[]' value='"+content.original+"' /><input type='hidden' name='thumb_pic[]' value='"+content.thumb+"' /><p class='name'>"+content.original+"</p></td>";
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