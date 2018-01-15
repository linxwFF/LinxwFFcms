<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>模型管理</title>
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
        <div class="row fg-toolbar ui-toolbar ">
            <a class="btn medium bg-gray "  href="<?php echo U('Module/add');?>">
                <span class="button-content">添加模型</span>
            </a>
        </div>
        <p class="font-gray-dark"></p>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>频道模型名称</th>
                        <th>识别ID</th>
                        <th>关联表</th>
                        <th>状态</th>
                        <th>模型</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($item["id"]); ?></td>
                        <td><?php echo ($item["typename"]); ?></td>
                        <td><?php echo ($item["nid"]); ?></td>
                        <td><?php echo ($item["relation_table"]); ?></td>
                       <td><?php if($item['status'] == 0): ?>正常<?php else: ?>禁用<?php endif; ?></td>
                  <td><?php if($item['issystem'] == 1): ?>系统<?php else: ?>自动<?php endif; ?></td>
                  <td><a href="<?php echo U('Module/template',array('id'=>$item['id']));?>">模板</a> | <a href="<?php echo U('Module/edit',array('id'=>$item['id']));?>">编辑</a> | <a href="<?php echo U('Module/delete',array('id'=>$item['id']));?>">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>  
        </div>
        <div class="row"><?php echo ($page); ?></div>
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