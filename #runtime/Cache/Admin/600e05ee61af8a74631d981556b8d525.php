<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <title>系统设置</title>
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
    <script type="text/javascript" src="./statics/admin/assets/layer/jquery1.9.1.js?<?php echo C('SIKCMS_BUILD');?>"></script>
    <script type="text/javascript" src="./statics/admin/assets/layer/layer.js?<?php echo C('SIKCMS_BUILD');?>"></script>
    <script type="text/javascript" src="./statics/admin/assets/validateform/jquery.validate.js?<?php echo C('SIKCMS_BUILD');?>"></script>
    <script type="text/javascript" src="./statics/admin/js/public.js?<?php echo C('SIKCMS_BUILD');?>"></script>
    <body>
    <!--------小标题----------->
<div id="page-title">

<big>
      <i class="glyph-icon icon-home"></i>  <?php echo ($curpos); ?>
</big>                
</div>
    <div id="page-content">
    <div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
        <div class="infobox notice-bg">
            <h4 class="infobox-title">若需添加字段，可在config表中添加</h4>
         </div>
        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
            <li class="ui-state-default ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="normal-tabs-1" aria-labelledby="ui-id-4" aria-selected="true">
                <a href="#normal-tabs-1" title="站点设置" class="ui-tabs-anchor" role="presentation" tabindex="1" id="ui-id-4">
                    站点设置
                </a>
            </li>
            <li class="ui-state-default " role="tab" tabindex="1" aria-controls="normal-tabs-2" aria-labelledby="ui-id-5" aria-selected="false">
                <a href="#normal-tabs-2" title="附件设置" class="ui-tabs-anchor" role="presentation" tabindex="2" id="ui-id-5">
                    附件设置 
                </a>
            </li>
           
        </ul>

        <form class="edit_form" class="col-md-12 form-label-right center-margin" method="post" action="<?php echo U('Index/setting');?>">
                    <div id="normal-tabs-1" aria-labelledby="ui-id-4" class="ui-tabs-panel "  aria-expanded="true" aria-hidden="false" style="display: block;">
                        <div class="col-md-12">
                        <div class="content-box mrg25B">
                               <table class="table table-striped text-center">
                                   <thead>
                                    <tr><th width='20%' class='text-center'>参数信息</th><th class='text-center'>参数值</th><th class='text-center'>变量值</th></tr>
                                   </thead>
                                   <tbody>
                                        <?php if(is_array($set_list)): $i = 0; $__LIST__ = $set_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if($item["groupid"] == 1): ?><tr><td align='center'><?php echo ($item["info"]); ?>:</td><td> <div class="form-input "> <input type="text"  class="parsley-validated" data-required="true" value="<?php echo ($item["value"]); ?>"   name="<?php echo ($item["valuename"]); ?>" ></div> </td><td><?php echo ($item["valuename"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                               </table>
                            </div>       
                            </div>
                    </div>
                    <div id="normal-tabs-2"  class="ui-tabs-panel " role="tabpanel" style="display: none;" >
                       <div class="col-md-12">
                        <div class="content-box mrg25B">
                               <table class="table table-striped text-center">
                                   <thead>
                                    <tr><th width='20%' class='text-center'>参数信息</th><th class='text-center'>参数值</th><th class='text-center'>变量值</th></tr>
                                   </thead>
                                   <tbody>
                                        <?php if(is_array($set_list)): $i = 0; $__LIST__ = $set_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if($item["groupid"] == 2): ?><tr><td align='center'><?php echo ($item["info"]); ?>:</td><td> <div class="form-input "> <input type="text"  class="parsley-validated" data-required="true" value="<?php echo ($item["value"]); ?>"   name="<?php echo ($item["valuename"]); ?>" ></div> </td><td><?php echo ($item["valuename"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                               </table>
                            </div>       
                            </div>
                    </div>
                    <div class="form-input col-md-10 col-md-offset-1">
                        <button id="submit-btn" type="submit" class="btn medium primary-bg radius-all-2">保存</button>
                        <button id="cancel-btn" type="submit" class="btn medium ui-state-default buttonPrevious ">返回</button>
                    </div>  
                    </form>
                </div>
        </div>
    
</body>
</html>