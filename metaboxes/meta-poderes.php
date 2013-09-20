<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">
    <p>Agregar en los siguientes campos el logo del evento, Nombre y dirección web del sitio del evento.</p>   
	<?php while($mb->have_fields_and_multi('poderes')): ?>
	<?php $mb->the_group_open(); ?>
		<div style="border:1px solid #CCC; padding:10px; margin-top:10px;">  
			<table>
                <tr>
                    <td class="width-23">
						<?php $mb->the_field('logo-poder'); ?>
                        <?php $wpalchemy_media_access->setGroupName('media-n'.$mb->get_the_index())->setInsertButtonLabel('Insertar'); ?>
                        <label>Logo del evento</label>
                    </td>
                    <td>
                      <div class="slide_preview wide">
                      	<div class="preview_wrap">
                        <?php $mb->the_field('image_src'); ?>
                        <img class="preview" src="<?php if($mb->get_the_value()){$mb->the_value();}else { echo get_bloginfo('template_url') . '/images/no-image.png';}?>" alt="<?php $mb->the_name();?> Preview" width="50"/>
                        </div>
                        <input type="hidden" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="image_src" />
                        <?php $mb->the_field('image_id'); ?>
                        <input type="hidden" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="image_id" />
                        <?php $mb->the_field('image_alt'); ?>
                        <input type="hidden" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="image_alt" />
                       
                        <?php if($mb->get_the_value('image_src') != "") {$icon = "change"; $button_text = __('Cambiar logo'); $hide = '';} else { $icon = "upload"; $button_text = __('Subir Logo'); $hide='hide';} ?>
               
                        <button class="upload_image_button button" type="button"><span class="icon <?php echo $icon;?>"></span><?php echo $button_text;?></button>
                        <button class="delete_image_button button <?php echo $hide;?>" type="button"><span class="icon delete"></span><?php _e('Quitar logo')?></button>
                           
                      </div>
                    </td>
                </tr>
                <tr>
                    <td class="width-23">
                        <?php $mb->the_field('titulo'); ?>
                        <label>Titulo</label>
                    </td>
                    <td>
                        <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td class="width-23">
                        <?php $mb->the_field('Descripcion'); ?>
                        <label>Descripción</label>
                    </td>
                    <td>
                       <?php wp_editor($mb->get_the_value(), "editor_" . rand(1, 200), array("textarea_rows" => 10, "textarea_name" => $mb->get_the_name(), "editor_class" => "custom_editor")); ?>
                    </td>
                </tr>
                <tr>
                    <td class="width-23">
                        <?php $mb->the_field('url_poder'); ?>
                        <label>Url de la página del enlace</label>
                    </td>
                    <td>
                        <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
                    </td>
                </tr>
                <tr>
                	<td>
                		<a href="#" class="dodelete button button-primary">Eliminar campos</a>
            		</td>
                </tr>
            </table>
       </div>
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
    <p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-poderes button button-primary">Agregar evento</a></p>
	<p><span>*Si necesitas dar de alta más eventos solo da click en el boton "Agregar evento". </span></p>
</div>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function($) {
	/*
	 * Upload function
	 */
	var form_src, form_alt, form_id, button, tbframe_interval;
	$('.my_meta_control').delegate('.upload_image_button','click', function() {
			form_src = $(this).prevAll('input.image_src');
			form_alt = $(this).prevAll('input.image_alt');
			form_id = $(this).prevAll('input.image_id');
										   
			button = $(this);
		   
			tbframe_interval = setInterval(function() {
					//change button text
					$('#TB_iframeContent').contents().find('.savesend .button').val('Insertar Logo');
					//remove url, alignment and size fields- auto set to null, none and full respectively
					$('#TB_iframeContent').contents().find('.url').hide().find('input').val('');
					$('#TB_iframeContent').contents().find('.align').hide().find('input:radio').filter('[value="none"]').attr('checked', true);
					$('#TB_iframeContent').contents().find('.image-size').hide().find('input:radio').filter('[value="full"]').attr('checked', true);
			}, 2000);
			tb_show('', 'media-upload.php?type=image&tab=library&TB_iframe=true');
			//tb_show('', 'media-upload.php?type=image&TB_iframe=true');
			return false;
	});
	window.original_send_to_editor = window.send_to_editor;
	window.send_to_editor = function(html){
			clearInterval(tbframe_interval);
			if (form_src) {
					//if image links somewhere then the img node will be a child of the returned html
					if ( $(html).children().length > 0)     {
							src = $('img',html).attr('src');
							imgclass = $('img',html).attr('class');
							alt = $('img',html).attr('alt');
							href = $('a',html).attr('href');
					} else { //img node IS the returned html
							src = $(html).attr('src');
							imgclass = $(html).attr('class');
							alt = $(html).attr('alt');
					}
				   
					if(typeof imgclass != 'undefined') {
					var imageID = imgclass.match(/([0-9]+)/i);
							imageID = (imageID && imageID[1]) ? imageID[1] : '' ;
					}
					var url = src ? src : href ;
					form_src.val(url);
					form_alt.val(alt);
					form_id.val(imageID);
					form_src.prevAll('.preview_wrap').children('img').attr('src',url).fadeIn();
					button.html('<span class="icon change"></span><?php _e('Cambiar Logo');?>').next('.delete_image_button').fadeIn();
					tb_remove();

					form_src = ''; //reset form_src to null so original works
			} else {
					window.original_send_to_editor(html);
			}
	};
	/*
	 * Remove Function
	 */
	$('.my_meta_control').delegate('.delete_image_button','click', function() {
			form_src = $(this).prevAll('input.image_src').val('');
			form_alt = $(this).prevAll('input.image_alt').val('');
			form_id = $(this).prevAll('input.image_id').val('');
		   
			var img = form_src.prevAll('.preview_wrap').children('img');
		   
			if( img.hasClass('photo')){
					img.attr('src','<?php echo get_bloginfo('template_url') ?>/images/no-image.png').fadeIn();
			} else {
					img.attr('src','<?php echo get_bloginfo('template_url') ?>/images/no-image.png').fadeIn();
			}
		   
			$(this).prev().html('<span class="icon upload"></span><?php _e('Subir Logo');?>');
			$(this).fadeOut();
			return false;
	});
	
	$('.slide_preview').each(function(){
			var src = $(this).find('.image_src').val();
			if(src) { $(this).find('.delete_image_button').show(); } else { $(this).find('.delete_image_button').hide(); }
	});
}); //end doc ready
/* ]]> */</script>
