<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">

    <div style="border:1px solid #CCC; padding:10px; margin-top:10px;">  
    <?php $mb->the_field('alinear'); ?>
    <table border="0" style="border:none;">
        <tr>
        	<td width="30%" height="185">Posición de la imagen</td>
            
           <td width="70%"><br>
             <table width="257" border="1">
              <tr>
                <td width="34"><div align="center">Top - left :
                </div></td>
                <td width="35"><input type="radio" name="<?php $mb->the_name(); ?>" value="tl"<?php echo $mb->is_value('tl')?' checked="checked"':''; ?>/></td>
                <td width="42"><div align="center">
                  Top 
                  
                </div></td>
                <td width="43"><input type="radio" name="<?php $mb->the_name(); ?>" value="t"<?php echo $mb->is_value('t')?' checked="checked"':''; ?>/></td>
                <td width="37"><div align="center">
                  Top - right
                  
                </div></td>
                <td width="38"><input type="radio" name="<?php $mb->the_name(); ?>" value="tr"<?php echo $mb->is_value('tr')?' checked="checked"':''; ?>/></td>
              </tr>
              <tr>
                <td><div align="center">Center - left
                </div></td>
                <td><input type="radio" name="<?php $mb->the_name(); ?>" value="cl"<?php echo $mb->is_value('cl')?' checked="checked"':''; ?>/></td>
                <td><div align="center">
                  Center
                  
                </div></td>
                <td><input type="radio" name="<?php $mb->the_name(); ?>" value="c"<?php echo $mb->is_value('c')?' checked="checked"':''; ?>/></td>
                <td><div align="center">
                  Center - right
                  
                </div></td>
                <td><input type="radio" name="<?php $mb->the_name(); ?>" value="cr"<?php echo $mb->is_value('cr')?' checked="checked"':''; ?>/></td>
              </tr>
              <tr>
                <td><div align="center">
                  Bottom - Left
                </div></td>
                <td><input type="radio" name="<?php $mb->the_name(); ?>" value="bl"<?php echo $mb->is_value('bl')?' checked="checked"':''; ?>/></td>
                <td><div align="center">
                  Bottom
                </div></td>
                <td><input type="radio" name="<?php $mb->the_name(); ?>" value="b"<?php echo $mb->is_value('b')?' checked="checked"':''; ?>/></td>
                <td><div align="center">
                  Bottom - right
                </div></td>
                <td><input type="radio" name="<?php $mb->the_name(); ?>" value="br"<?php echo $mb->is_value('br')?' checked="checked"':''; ?>/></td>
              </tr>
            </table>
            <br>            
            <br> 
           </td>
        </tr>
    </table>
    </div>
</div>
