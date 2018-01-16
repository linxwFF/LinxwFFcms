<?php if (!defined('THINK_PATH')) exit();?>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr class="sub_menu<?php echo ($item['level']); ?>">
                        <td><?php echo ($item["id"]); ?></td>
                        <td class="font-bold text-left">  
                            <?php  $space=""; for($i=0;$i<($item['level']-1)*2;$i++){ $space .="&nbsp;&nbsp;"; } echo $space; ?>
                           <a class="menu_tree" menu-level="<?php echo ($item["level"]); ?>" onclick="menu_tree(this,'close')" href="javascript:void(0)" is-load="0" note-id="<?php echo ($item["id"]); ?>" ><i class="glyph-icon icon-plus"></i> <?php echo ($item["name"]); ?></a> </td>
                        <td><?php echo ($item["controller"]); ?></td>
                        <td><?php echo ($item["action"]); ?></td>
                        <td><?php echo ($item["params"]); ?></td>
                        <td><?php echo ($item["level"]); ?></td>
                        <td><?php echo ($item["sort"]); ?></td>
                        <td><?php if($item['status'] == 1): ?>显示<?php elseif($item['status'] == 2): ?>隐藏<?php else: ?>删除<?php endif; ?></td>
                    <td>
                        <a title=""  href="#" data-placement="top" class="btn medium ui-state-default" data-original-title="Edit">
                            <span class="glyph-icon icon-edit button-content editMenuLayer" data-id="<?php echo ($item["id"]); ?>">编辑</span>
                        </a>
                        <a title="" data-id="<?php echo ($item["id"]); ?>"  data-placement="top" class="btn small bg-white tooltip-button menuDelete"  href="#" data-original-title="Remove">
                            <span class="glyph-icon icon-remove " ></span>删除
                        </a>
                    </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>