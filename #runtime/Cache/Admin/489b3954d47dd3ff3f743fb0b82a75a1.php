<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>商品列表</title>
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
            <a class="btn medium bg-green " href="<?php echo U($action['addaction']);?>">
                 <span class="button-content">添加</span>
            </a>
              <a class="btn medium  bg-orange delete" href="javascript:void(0)">
                 <span class="button-content">批量删除</span>
            </a>
           
        </div>
  
    
        <p class="font-gray-dark"></p>
       <form id="goods-form" method="post" action="<?php echo U($action['listaction']);?>">
           <div class="form-row">
           
              <div class="form-input col-md-12">
                   <select id="" class="col-md-2" name="status">
                       <option value='all'>不限</option>
                       <?php if(is_array($status)): $i = 0; $__LIST__ = $status;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["value"]); ?>"><?php echo ($item["text"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
                    <div class="col-md-4">
                   <input id="" placeholder="商品名称" name="goods_name" type="text">
                 </div>
                 <a href="javascript:void()" class="btn large  bg-green btnSearch" title="">
                     <span class="button-content">搜索</span>
                 </a>
               </div>
        </div>  
         <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input class="check-all"  type="checkbox"   ></th>
                            <th>id</th>
                            <th>产品名称</th>
                              <th>产品原价</th>
                            <th>产品价格</th>
                            <th>录入时间</th>
                            <th>上架状态</th>
                            <th>阅读数</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr >
                         <td><input type="checkbox" class="ids" name="ids[]" value="<?php echo ($item["goods_id"]); ?>"/></td>
                        <td><?php echo ($item["goods_id"]); ?></td>
                        <td><?php echo ($item["goods_name"]); ?><span style="color:#fa7753 "><?php echo ($text); ?></span></td>
                        <td>￥<?php echo ($item["goods_price"]); ?></td>
                        <td>￥<?php echo ($item["market_price"]); ?></td>
                        <td><?php echo (date('Ymd-His',$item["inputtime"])); ?></td>
                        <td><?php if($item['marketable']=='true'){ echo '上架'; }else{echo '下架';} ?></td>
                        <td><?php echo ($item["readpoint"]); ?></td>
                        <td> 
                            <a title="" href="<?php echo U($action['editaction'],array('id'=>$item['goods_id']));?>" data-placement="top" class="btn medium ui-state-default" data-original-title="Edit">
                                 <span class="glyph-icon icon-edit button-content ">修改</span>
                             </a>
                             <a title="" data-id="<?php echo ($item["goods_id"]); ?>" data-placement="top" class="btn small bg-white tooltip-button delete" href="javascript:void(0)" data-original-title="Remove">
                                 <span class="glyph-icon icon-remove "></span>删除
                             </a>    
                        </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>  
         
        </div>
          <div class="row"><?php echo ($page); ?></div>
      </form>
         
    </div>
 
    <script type='text/javascript'>
       $('body').on('click','.delete', function(){
            var id = $(this).attr('data-id');
            var form = $("#softs-form");
            var ids_arr = new Array();
            $(".ids",form).each(function(){
                 if(this.checked){
                     ids_arr.push($(this).val())
                   }
             });  
             alert(ids_arr);
            if(id){
                   var ids  = [id];     //单点
            }else{
                 var ids = ids_arr;   //批量
            }
            if(ids==''){
                layer.msg('请选择要删除的项');
                return false;
            }
            var delete_url = "<?php echo U('Goods/delete');?>";
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
        $(function(){
           $(".btnSearch").click(function(){
              var form = $("#goods-form");
               form.submit();
           });
        });
        
    </script>
 
</body>
</html>