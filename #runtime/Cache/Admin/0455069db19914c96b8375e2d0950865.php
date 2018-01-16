<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>栏目添加</title>
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
    <!---百度编辑器--->
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
    <div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                <li class="ui-state-default ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="normal-tabs-1" aria-labelledby="ui-id-4" aria-selected="true">
                    <a href="#normal-tabs-1" title="基本设置" class="ui-tabs-anchor" role="presentation" tabindex="1" id="ui-id-4">
                        基本设置
                    </a>
                </li>
                <li class="ui-state-default " role="tab" tabindex="1" aria-controls="normal-tabs-2" aria-labelledby="ui-id-5" aria-selected="false">
                    <a href="#normal-tabs-2" title="字段管理" class="ui-tabs-anchor" role="presentation" tabindex="2" id="ui-id-5">
                        高级设置 
                    </a>
                </li>
                 <li class="ui-state-default " role="tab" tabindex="2" aria-controls="normal-tabs-3" aria-labelledby="ui-id-6" aria-selected="false">
                    <a href="#normal-tabs-3" title="高级设置" class="ui-tabs-anchor" role="presentation" tabindex="3" id="ui-id-6">
                        栏目内容 
                    </a>
                </li>
            </ul>
       <form class="edit_form" class="col-md-12 form-label-right center-margin" method="post" action="<?php echo U('Channel/add');?>">
        <div id="page-user-changepwd" >
             <div id="page-content" >
        <div id="normal-tabs-1" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">
                    
                        
                                <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
                                <input type="hidden" name="template_id" value="<?php echo ($info["template_id"]); ?>"/>
                                <input type="hidden" name="level" value="<?php echo $info['level']+1; ?>"/>
                                <?php if($cid != '' ): ?><div class="form-row">
                                          <div class="form-label col-md-1">
                                            <label for="">
                                                顶级栏目:
                                                <span class="required">*</span>
                                            </label>
                                        </div>
                                        <div class="form-input col-md-4">
                                            <select name="parentid">
                                                <option  value="<?php echo ($info["id"]); ?>"><?php echo ($info["name"]); ?></option>
                                            </select>
                                        </div>
                                    </div><?php endif; ?>

                                <div class="form-row">
                                    <div class="form-label col-md-1">
                                        <label for="">
                                            是否隐藏:
                                            <span class="required">*</span>
                                        </label>
                                    </div>
                                   <div class="form-checkbox-radio col-md-10">
                                    <div class="radio"><span class="ui-state-default btn radius-all-100 checked "><input value='0' class="custom-radio" checked="checked" name="ishidden" id="" type="radio"><i class="glyph-icon icon-circle"></i></span></div>
                                    <label for="">显示</label>

                                    <div class="radio"><span class=" ui-state-default btn radius-all-100"><input value="1" class="custom-radio" name="ishidden" id="" checked="" type="radio"><i class="glyph-icon icon-circle"></i></span></div>
                                    <label for="">隐藏</label>
                                </div>

                                </div>
                              <div class="form-row">
                                    <div class="form-label col-md-1">
                                        <label for="">所属模块</label>
                                    </div>
                                       <div class="form-input col-md-4">
                                            <select name="module_id">
                                                <?php if(is_array($module)): $i = 0; $__LIST__ = $module;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($item["id"]); ?>"><?php echo ($item["typename"]); ?> | <?php echo ($item["nid"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label col-md-1">
                                        <label for="">
                                            栏目名称:
                                            <span class="required">*</span>
                                        </label>
                                    </div>
                                    <div class="form-input col-md-4">
                                        <input type="text"  class="parsley-validated" data-required="true"   name="name" >
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
                                        <input type="text"  name="sort"/>
                                    </div>
                                </div>
                               
                                <div class="form-row">
                                    <div class="form-label col-md-1">
                                        <label for="">
                                             属性：
                                            <span class="required"></span>
                                        </label>
                                    </div>
                                    <div class="form-checkbox-radio col-md-10">
                                        <div class="radio"><span class="ui-state-default btn radius-all-100 checked "><input value='0' class="custom-radio" checked="checked" name="ispart" id="" type="radio"><i class="glyph-icon icon-circle"></i></span></div>
                                        <label for="">最终列表栏目</label>
                                        <div class="radio"><span class=" ui-state-default btn radius-all-100"><input value="1" class="custom-radio" name="ispart" id="" checked="" type="radio"><i class="glyph-icon icon-circle"></i></span></div>
                                        <label for="">频道封面</label>
                                        <div class="radio"><span class=" ui-state-default btn radius-all-100"><input value="2"  class="custom-radio" name="ispart" id="" checked="" type="radio"><i class="glyph-icon icon-circle"></i></span></div>
                                        <label for="">外部链接(填写目标地址)</label>
                                    </div>
                                </div>
                              <div class="form-row" id="dir_url" >
                                    <div class="form-label col-md-1">
                                        <label for="">
                                             目标地址：
                                            <span class="required"></span>
                                        </label>
                                    </div>
                                    <div class="form-input col-md-4">
                                        <input type="text" placeholder="如：Guestbook/index"  name="dir_url"/>
                                    </div>
                                </div>

                              
                     
        </div>
        <div id="normal-tabs-2" aria-labelledby="ui-id-5" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: none;" aria-expanded="false" aria-hidden="true">
                <div class="form-row">
                      <div class="form-label col-md-1">
                          <label for="">
                               封面模板：
                              <span class="required">*</span>
                          </label>
                      </div>
                      <div class="form-input col-md-4">
                          <input type="text"  name="index_template" value=""/>
                      </div>
                  </div>
               <div class="form-row">
                      <div class="form-label col-md-1">
                          <label for="">
                               列表模板：
                              <span class="required">*</span>
                          </label>
                      </div>
                      <div class="form-input col-md-4">
                          <input type="text"  name="list_template" value=""/>
                      </div>
                  </div>
                <div class="form-row">
                      <div class="form-label col-md-1">
                          <label for="">
                               文章模板：
                              <span class="required">*</span>
                          </label>
                      </div>
                      <div class="form-input col-md-4">
                          <input type="text"  name="article_template" value=""/>
                      </div>
                  </div>
               <div class="form-row">
                      <div class="form-label col-md-1">
                          <label for="">
                               SEO标题：
                              <span class="required"></span>
                          </label>
                      </div>
                      <div class="form-input col-md-4">
                          <input type="text"  name="seo_title" value=""/>
                      </div>
                  </div>
                <div class="form-row">
                      <div class="form-label col-md-1">
                          <label for="">
                               关键字：
                              <span class="required"></span>
                          </label>
                      </div>
                      <div class="form-input col-md-4">
                          <input type="text"  name="keyword" value=""/>
                      </div>
                  </div>
               <div class="form-row">
                      <div class="form-label col-md-1">
                          <label for="">
                               描述：
                              <span class="required"></span>
                          </label>
                      </div>
                      <div class="form-input col-md-4">
                          <textarea name="description"></textarea>
                      
                      </div>
                  </div>
            
        </div>
         <div id="normal-tabs-3" aria-labelledby="ui-id-6" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: none;" aria-expanded="false" aria-hidden="true">
                 <div class="form-row">
                    
                    <div class="form-input col-md-4" >
                        <script id="editor" name="content" type="text/plain" style="width:1024px;height:500px;"></script>
                    </div>
                </div>
       
        </div>
             <div class="form-input col-md-10 col-md-offset-1">
                <button id="submit-btn" type="submit" class="btn medium primary-bg radius-all-2">添加</button>
                <button id="cancel-btn" type="submit" class="btn medium ui-state-default buttonPrevious ">返回</button>
            </div>  
         </form>
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
              initialFrameHeight:360
          });
         
         //获取模板
         $(function(){
             show_temp();
            $("select[name='module_id']").change(function(){
              show_temp();
            }); 
         });
         function show_temp(){
               var get_template = "<?php echo U('Channel/getTemplate');?>"+'&id='+ $("select[name='module_id']").val();  
              $.get(get_template,{},function(data){
                  $("input[name='index_template']").val(data.index_template);
                  $("input[name='list_template']").val(data.list_template);
                  $("input[name='article_template']").val(data.article_template);
                  $("input[name='template_id']").val(data.id);
               },'json');
               return false;
         }
    </script>
  
    <script type="text/javascript">
        $(function(){
        var validator = $(".edit_form").validate({
       rules: {
                name:{required:true},
                index_template:{required:true},
                list_template:{required:true},
                article_template:{required:true}
            },
       messages: { 
           name: "栏目名称不能为空",
           index_template:"封面模板不能为空",
           list_template:"列表模板不能为空",
           article_template:"文章模板不能为空"
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
                var action_url = $form.attr('action');
                if ($btn.hasClass("disabled")) return;
                var submitData = {
                        parentid:$("select[name='parentid']",$form).val(),
                        ishidden:$("input[name='ishidden']",$form).val(),
                        name: $("input[name='name']", $form).val(),
                        level:$("input[name='level']",$form).val(),
                        sort:$("input[name='sort']", $form).val(),
                        dir_url:$("input[name='dir_url']",$form).val(),
                        template_id:$("input[name='template_id']",$form).val(),
                        index_template:$("input[name='index_template']",$form).val(),
                        list_template:$("input[name='list_template']",$form).val(),
                        ispart:$("input[name='ispart']:checked",$form).val(),
                        article_template:$("input[name='article_template']",$form).val(),
                        content:UE.getEditor('editor').getContent(),
                        seo_title:$("input[name='seo_title']",$form).val(),
                        keyword:$("input[name='keyword']",$form).val(),
                        description:$("textarea[name='description']",$form).val(),
                        mode_id:$("select[name='module_id']",$form).val()
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
</body>
</html>