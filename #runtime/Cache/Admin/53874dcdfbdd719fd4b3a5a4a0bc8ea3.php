<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>模型对应 模板</title>
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
    <script type="text/javascript" src="./statics/admin/js/public.js?<?php echo C('KLCHOU_BUILD');?>"></script>
    <body>
        <!-- #page-title -->
    <!--------小标题----------->
<div id="page-title">

<big>
      <i class="glyph-icon icon-home"></i>  <?php echo ($curpos); ?>
</big>                
</div>	
    <div id="page-content">
      
       <div class="content-box">
                    <h3 class="content-box-header ui-state-default">
                        <span>默认模板文件，开发者可进入相应模板文件中修改</span>
                    </h3>
                    <div class="content-box-wrapper">
                        封面模板：<?php echo ($template["index_template"]); ?> 
                        <br>
                        列表模板：<?php echo ($template["list_template"]); ?> 
                         <br>
                        详情模板：<?php echo ($template["article_template"]); ?>  
                    </div>
                </div>
    </div>
       

    <script type='text/javascript'>
      $('tbody').on('click','.delete', function(){
        var id = $(this).attr('data-id');
        var ids  = [id];
        var delete_url = "<?php echo U('Channel/delete');?>";
        if (confirm("确定要删除!")){
        $.post(delete_url, {ids:ids}, function(data){
        if (data.status == 1){
            layer.msg(data.info);
              window.location.reload();
            } else{
               layer.msg(data.info);
            }
            }, 'json');
        } 
        });
    </script>

</html>