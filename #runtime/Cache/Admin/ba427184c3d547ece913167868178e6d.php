<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>广告位管理</title>
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
            <a href="<?php echo U('Adverts/addAdvert');?>" title="" id="addAdvertsLayer" class="btn medium bg-gray ">
                <span class="button-content">添加</span>
            </a>
        </div>
        <p class="font-gray-dark"></p>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>广告位ID</th>
                        <th>标示</th>
                        <th>名称</th>
                        <th>创建时间</th>
                        <th>启用状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr class="sub_menu1">
                        <td><?php echo ($item["advert_id"]); ?></td>
                        <td><?php echo ($item["type"]); ?></td>
                        <td><?php echo ($item["title"]); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$item["ctime"])); ?></td>
                        <td><?php if($item['status'] == 'true'): ?>启用<?php else: ?>关闭<?php endif; ?></td>
                <td>  <a title=""  href="<?php echo U('Adverts/editAdvert',array('advert_id'=>$item['advert_id']));?>" data-placement="top" class="btn medium ui-state-default" data-original-title="Edit">
                            <span class="glyph-icon icon-edit button-content editAdvertsLayer">编辑</span>
                        </a>
                        <a title="" data-id="<?php echo ($item["advert_id"]); ?>"  data-placement="top" class="btn small bg-white tooltip-button advertsDelete"  href="#" data-original-title="Remove">
                            <span class="glyph-icon icon-remove " ></span>删除
                        </a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                </tbody>
            </table>  
        </div>
        <div class="row"><?php echo ($page); ?></div>
    </div>

    <!--adverts delete--->
    <script type="text/javascript">
        $('tbody').on('click','.advertsDelete', function(){
        var id = $(this).attr('data-id');
        var ids  = [id];
        var delete_menu_url = "<?php echo U('Adverts/deleteAdvert');?>";
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