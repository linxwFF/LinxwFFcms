<?php if (!defined('THINK_PATH')) exit();?><!-- <?php foreach($menulist as &$item){ ?>
   <option value="<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?></option>
    <?php if(!empty($item['children'])){ foreach($item['children'] as &$sub_item){ ?>
     <option value="<?php echo ($sub_item["id"]); ?>"><?php echo '|'.level_space($sub_item['level']).$sub_item['name']; ?></option>
      <?php if(!empty($sub_item['children'])){ foreach($sub_item['children']as &$sub_item2){ ?>
         <option value="<?php echo ($sub_item2["id"]); ?>"><?php echo '|'.level_space($sub_item2['level']).$sub_item2['name']; ?></option>
           <?php if(!empty($sub_item2['children'])){ foreach($sub_item2['children']as &$sub_item3){ ?>
         <option value="<?php echo ($sub_item3["id"]); ?>"><?php echo '|'.level_space($sub_item3['level']).$sub_item3['name']; ?></option>
         <?php }} ?>
         
         <?php  } } ?>
     <?php  }} ?>
 <?php } ?>-->
 
 
<?php  echo_menu_option($menulist); function echo_menu_option($menulist){ foreach($menulist as &$item){ echo "<option value='".$item['id']."'>".level_space($item['level']).$item['name']."</option>"; if(is_array($item['children'])){ echo_menu_option($item['children']); } } } ?>