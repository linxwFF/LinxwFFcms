<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>评论列表</title>
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
            <a class="btn medium bg-green pass" href="javascript:void(0)" >
                 <span class="button-content">批量审核</span>
            </a>
        </div>
        <p class="font-gray-dark"></p>
    <form id="form" method="post" action="<?php echo U('Comment/commetPass');?>">
         <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input class="check-all"  type="checkbox"   ></th>
                            <th>id</th>
                            <th>评论内容</th>
                            <th>昵称</th>
                            <th>回复数</th>
                            <th>回复人</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr >
                         <td><input type="checkbox" class="ids" name="ids[]" value="<?php echo ($item["id"]); ?>"/></td>
                        <td><?php echo ($item["id"]); ?></td>
                        <td><?php echo ($item["content"]); ?></td>
                        <td><?php echo ($item["nickname"]); ?></td>
                       <td><?php echo ($item["reply_nums"]); ?></td>
                       <td><?php if($item['reply_username']): ?>@<?php echo ($item["reply_username"]); endif; ?></td>
                        <td><?php if($item['is_audit'] == '1'): ?>已审核<?php else: ?>未审核<?php endif; ?></td>
                        <td> 
                            <a title="" data-id="<?php echo ($item["id"]); ?>" href="javascript:void(0)" data-placement="top" class="btn medium ui-state-default pass" data-original-title="Edit">
                                <span class="glyph-icon icon-edit  button-content ">审核通过</span>
                             </a>
                        </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>  
        </div>
      </form>
          <div class="row"><?php echo ($page); ?></div>
    </div>

    <script type='text/javascript'>
       $('body').on('click','.pass', function(){
            var id = $(this).attr('data-id');
            var form = $("#form");
            var ids_arr = new Array();
            $(".ids",form).each(function(){
                 if(this.checked){
                     ids_arr.push($(this).val())
                   }
             });  
            if(id){
                   var ids  = [id];     //单点
            }else{
                 var ids = ids_arr;   //批量
            }
            if(ids==''){
                layer.msg('请选择要审核的项');
                return false;
            }
            var delete_url = "<?php echo U('Comment/commentPass');?>";
            $.post(delete_url, {ids:ids}, function(data){
            if (data.status == 1){
                 layer.msg(data.info);
                  window.location.reload();
                } else{
                   layer.msg(data.info);
                }
                }, 'json');
        });
    </script>
 
</body>
</html>