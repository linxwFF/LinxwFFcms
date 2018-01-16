<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>操作日志</title>
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

    <div id="page-content">
        <div class="row fg-toolbar ui-toolbar ">
            <a class="btn medium bg-gray log_delete" title="" href="#">
                <span class="button-content">删除一个月前记录</span>
            </a>
        </div>
        <p class="font-gray-dark"></p>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>操作信息</th>
                        <th>请求地址</th>
                         <th>时间</th>
                        <th>IP</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($item["id"]); ?></td>
                        <td class="font-bold text-left"><?php echo ($item["username"]); ?></td>
                        <td><?php echo (htmlspecialchars($item["info"])); ?></td>
                        <td><?php echo ($item["get"]); ?></td>
                         <td><?php echo (date('Y-m-d H:i:s',$item["time"])); ?></td>
                        <td>
                          <?php echo ($item["ip"]); ?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>  
        </div>
        <div class="row"><?php echo ($page); ?></div>
    </div>

    <!--log delete--->
    <script type="text/javascript">
        $('.log_delete').on('click', function(){
        var id = $(this).attr('data-id');
        var delete_url = "<?php echo U('SafeLog/operateDelete');?>";
        if (confirm("确定要删除!")){
        $.post(delete_url, {}, function(data){
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
</body>
</html>