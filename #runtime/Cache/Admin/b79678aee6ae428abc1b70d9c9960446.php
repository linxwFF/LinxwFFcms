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
            <div  class="btn medium bg-gray ">
                <a id="export" class="button-content" href="javascript:;" autocomplete="off">立即备份</a>
            </div>
            
            <div  class="btn medium bg-gray ">
                <a id="optimize" class="button-content" href="<?php echo U('Database/optimize');?>" autocomplete="off">优化表</a>
            </div>
            <div  class="btn medium bg-gray ">
                <a id="repair" class="button-content" href="<?php echo U('Database/repair');?>" autocomplete="off">修复表</a>
            </div>
        </div>
        <p class="font-gray-dark"></p>
        <div class="row">
            <form id="export-form" method="post" action="<?php echo U('Database/export');?>">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input class="check-all" checked="chedked" type="checkbox" value=""></th>
                            <th>表名</th>
                            <th>表名注释</th>
                            <th>数据量</th>
                            <th>数据大小</th>
                            <th>创建时间</th>
                            <th>备份状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?><tr class="sub_menu1">
                            <td><input class="ids" checked="chedked" type="checkbox" name="tables[]" value="<?php echo ($table["name"]); ?>"></td>
                            <td><?php echo ($table["name"]); ?></td>
                             <td><?php echo ($table["comment"]); ?></td>
                            <td><?php echo ($table["rows"]); ?></td>
                            <td><?php echo (format_bytes($table["data_length"])); ?></td>
                            <td><?php echo ($table["create_time"]); ?></td>
                         
                            <td class="info">未备份</td>
                            <td>  <a title=""  href="<?php echo U('Database/optimize',array('tables'=>$table['name']));?>" data-placement="top" class="btn medium ui-state-default" data-original-title="Edit">
                                    <span class="glyph-icon icon-edit button-content">优化表</span>
                                </a>
                                <a title="" href="<?php echo U('Database/repair',array('tables'=>$table['name']));?>"  data-placement="top" class="btn small bg-white tooltip-button"   >
                                    <span class="glyph-icon " ></span>修复表
                                </a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>  
            </form>
        </div>
    </div>
    <script type='text/javascript'>
        //全选
        $(function(){
            $(".check-all").click(function(){
               $('.ids').prop("checked",this.checked); 
            });
            $(".ids").click(function(){
               var option = $(".ids");
               	option.each(function(i){
                  if(!this.checked){
                            $(".check-all").prop("checked", false);
                            return false;
                    }else{
                            $(".check-all").prop("checked", true);
                    }
              });
            });
        });
    </script>

    <script type="text/javascript">
        $(function(){
           var $form = $("#export-form"), $export = $("#export"), tables
            $optimize = $("#optimize"), $repair = $("#repair");
            $optimize.add($repair).click(function(){
            $.post(this.href, $form.serialize(), function(data){
                if (data.status) {
                   layer.msg(data.info);
                } else{
                     layer.msg(data.info);
                }
                setTimeout(function(){
                    $('#top-alert').find('button').click();
                    $(that).removeClass('disabled').prop('disabled', false);
                    }, 1500);
        }, 'json');
        return false;
        });
        
         $export.click(function(){
             $export.html("正在发送备份请求...");
           // layer.msg('正在发送备份请求...');
            $.post($form.attr('action'), $form.serialize(), function(data){
        if (data.status){
            tables = data.tables;
             $export.html(data.info + "开始备份，请不要关闭本页面！");
           //  layer.msg(data.info + "开始备份，请不要关闭本页面！");
             backup(data.tab);
             window.onbeforeunload = function(){return "正在备份数据库,请不要关闭! "}
        } else{
            layer.msg(data.info);
            $export.html("立即备份");
        setTimeout(function(){
            $('#top-alert').find('button').click();
            $(that).removeClass('disabled').prop('disabled', false);
            }, 1500);
        }
        },'json'); return false;
        });
        
        
        function backup(tab,status){
             status && showmsg(tab.id, "开始备份...(0%)"); 
             $.get($form.attr("action"),tab,function(data){
                if(data.status){
                      showmsg(tab.id, data.info);
                    if(! $.isPlainObject(data.tab)){
                        $export.parent().children().removeClass("disabled");
                        $export.html("备份完成，点击重新备份");
                      // layer.msg('备份完成，点击重新备份');
                        window.onbeforeunload = function(){ return null }
                        return;
                    }
                     backup(data.tab, tab.id != data.tab.id);
                } else{
                    alert(data.info,'alert-error');
                   // $export.parent().children().removeClass("disabled");
                    $export.html("立即备份");
                    setTimeout(function(){
    	                $('#top-alert').find('button').click();
    	         //       $(that).removeClass('disabled').prop('disabled',false);
    	            },1500);
                }
             });
        }
        
        
       function showmsg(id, msg){
            $form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
        }
        });
    </script>
</body>
</html>