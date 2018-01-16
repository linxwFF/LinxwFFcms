<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>数据表管理</title>
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
            <div class="infobox notice-bg">
            <div class="bg-azure large btn info-icon">
                <i class="glyph-icon icon-bullhorn"></i>
            </div>
            <h4 class="infobox-title">大家可以下载数据压缩包进行解压</h4>
            <p>通过MYSQL管理工具进行导入数据恢复 </p>
    </div>
        <div class="row fg-toolbar ui-toolbar ">

        </div>
        <p class="font-gray-dark"></p>
        <div class="row">
            <form id="export-form" method="post" action="<?php echo U('Database/export');?>">
                <table class="table">
                    <thead>
                        <tr>
                            <th>备份名称</th>
                            <th>卷数</th>
                            <th>压缩</th>
                            <th>数据大小</th>
                            <th>备份时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr >
                        <td><?php echo (date('Ymd-His',$data["time"])); ?></td>
                        <td><?php echo ($data["part"]); ?></td>
                        <td><?php echo ($data["compress"]); ?></td>
                        <td><?php echo (format_bytes($data["size"])); ?></td>
                        <td><?php echo ($key); ?></td>
                        <td>-</td>
                        <td>  <a title=""  href="<?php echo U('Database/import',array('time'=>$data['time']));?>" data-placement="top" class="btn medium ui-state-default  db-import" data-original-title="Edit">
                                    <span class="glyph-icon icon-edit button-content">还原</span>
                                </a>
                            <a title="下载" href="<?php echo U('Database/download',array('time'=>$data['time']));?>" data-placement="top" class="btn medium ui-state-default " data-original-title="Down"><span class="glyph-icon icon-download button-content">下载</span></a>
                                <a title="" href="<?php echo U('Database/del',array('time'=>$data['time']));?>"  data-placement="top" class="btn small bg-white tooltip-button"   >
                                    <span class="glyph-icon icon-remove " ></span>删除
                          </a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>  
            </form>
        </div>
    </div>
    <script type='text/javascript'>
     $(".db-import").click(function(){
            var self = this, status = ".";
            $.get(self.href, success, "json");
            window.onbeforeunload = function(){ return "正在还原数据库，请不要关闭！" }
            return false;
          function success(data){
                if(data.status){
                    if(data.gz){
                        data.info += status;
                        if(status.length === 5){
                            status = ".";
                        } else {
                            status += ".";
                        }
                    }
                    $(self).parent().prev().text(data.info);
                    if(data.part){
                        $.get(self.href, 
                            {"part" : data.part, "start" : data.start}, 
                            success, 
                            "json"
                        );
                    }  else {
                        window.onbeforeunload = function(){ return null; }
                    }
                } else {
                    layer.msg(data.info);
                }
            }
     });
    </script>

 
</body>
</html>