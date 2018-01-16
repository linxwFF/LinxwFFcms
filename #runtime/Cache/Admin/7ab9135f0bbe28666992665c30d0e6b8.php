<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>栏目列表管理</title>
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
            <a class="btn medium bg-gray "  href="<?php echo U('Channel/add');?>">
                <span class="button-content">添加顶级栏目</span>
            </a>
        </div>
        <p class="font-gray-dark"></p>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th><input class="check-all"  type="checkbox"   ></th>
                        <th>栏目名</th>
                        <th>文章数</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
              
<?php  echo channel_tree($list); function channel_tree($list){ ?>
   <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                        <td><input type="checkbox" class="ids" name="ids[]" value="<?php echo ($item["id"]); ?>"/></td>
                        <td class="font-bold ext-left"><?php echo level_space($item['level']); ?><a href="javascript:void()" title="查看内容"><?php echo ($item["name"]); ?></a>[ID:<?php echo ($item["id"]); ?>]</td>
                        <td><?php echo ($item["count"]); ?></td>
                        <td>
                            <a href="<?php echo U($item['action']['listaction'],array('channel_id'=>$item['id']));?>">内容</a> | <a href="<?php echo U('Channel/add',array('cid'=>$item['id']));?>">增加子类</a> | <a href="<?php echo U('Channel/edit',array('id'=>$item['id']));?>">更改</a> | <a data-id="<?php echo ($item["id"]); ?>" href="javascript:void(0)" class="delete">删除</a>
                        </td>
                    </tr>  
          <?php  if(is_array($item['children'])){ channel_tree($item['children']); } endforeach; endif; else: echo "" ;endif; ?>
<?php } ?>

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