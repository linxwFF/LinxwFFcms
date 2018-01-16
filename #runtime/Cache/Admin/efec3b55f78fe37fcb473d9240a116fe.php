<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>跳转提示</title>
    </head>
    <body>
         <!---require minified JS CSS--->
         <link rel="stylesheet" type="text/css" href="./statics/admin/assets/css/minified/aui-production.min.css?<?php echo C('KLCHOU_BUILD');?>">
         <link id="layout-theme" rel="stylesheet" type="text/css" href="./statics/admin/assets/themes/minified/fides/color-schemes/dark-blue.min.css?<?php echo C('KLCHOU_BUILD');?>">
         <link rel="stylesheet" type="text/css" href="./statics/admin/assets/themes/minified/fides/common.min.css?<?php echo C('KLCHOU_BUILD');?>">
         <script type="text/javascript" src="./statics/admin/assets/js/minified/aui-production.min.js?<?php echo C('KLCHOU_BUILD');?>"></script>
         <script type="text/javascript" src="./statics/admin/assets/js/minified/core/raphael.min.js?<?php echo C('KLCHOU_BUILD');?>"></script>
         <script type="text/javascript" src="./statics/admin/assets/js/minified/widgets/charts-justgage.min.js?<?php echo C('KLCHOU_BUILD');?>"></script>
<!---require minified JS CSS--->
        <div class="infobox success-bg">
            <p><i class="glyph-icon icon-exclamation mrg10R"><?php echo ($message); ?></i><b id="time">3</b>秒后自动调转 <a target="_self" href="<?php echo($jumpUrl); ?>">立即调转</a></p>
        </div>
        <!--倒计时跳转-->
        <script language="JavaScript" type="text/javascript">
            function delayURL(url) {
                var delay = document.getElementById("time").innerHTML;
                if (delay > 0) {
                    delay--;
                    document.getElementById("time").innerHTML = delay;
                } else {
                    window.top.location.href = url;
                }
                setTimeout("delayURL('" + url + "')", 2000);
            }
        </script>
        <script type="text/javascript">
            delayURL("<?php echo ($jumpUrl); ?>");
        </script>

    </body>   

</html>