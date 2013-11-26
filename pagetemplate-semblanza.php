<?php
/*
Template Name: Semblanza page
*/
?>
<?php get_header(); ?>
<div class="contine-principales">
<section class="container principalContent" id="content-list">
    <div class="tituloSingleArea">
        <h2> 
            <?php
            echo get_the_title();//$post->post_parent
            ?>
        </h2>
    </div>
    <div class="back-img"></div>
    <div class="col-sm-12 col-md-12 col-lg-12 contenedor-pages contieneTituloSemblanza">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
    $nombre = get_post_meta($post->ID, 'nombre', true);
    $secretaria = get_post_meta($post->ID, 'nombre-dependencia', true);
    if($nombre || $secretaria){ ?>
		  <div class="single-nombre">
			  <?php
              echo "$secretaria"; // echo "$nombre"."<br>"."$secretaria"; 
              ?>
		  </div>
    <?php }?>
    <?php 
    $facebook = get_post_meta($post->ID, 'url-facebook', true);
    $twitter = get_post_meta($post->ID, 'url-twitter', true);
    $youtube = get_post_meta($post->ID, 'url-youtube', true);
    $pinterest = get_post_meta($post->ID, 'url-pinterest', true);
    $plus = get_post_meta($post->ID, 'url-plus', true);
    $siglas = get_post_meta($post->ID, 'siglas-dependencia', true);
    
      if($facebook || $twitter || $youtube || $pinterest || $plus || $siglas){
    ?>
    <div class="single-siguele">
		<?php 
        if($siglas){
            $category_id = get_cat_ID( $siglas );
            $category_link = get_category_link( $category_id );
       ?>
        	<div class="titulo-single-siglas">
               <a href="<?php echo esc_url( $category_link ); ?>">
                  Ir a:
                  <i>
                        <?php echo $siglas;?>
                  </i>
               </a>
               <img src='<?php bloginfo('template_url') ?>/images/logo-dependencias-single.png'>
           </div>
       <?php } ?>
       <div class="redes-sociales">
            <div class="titulo-single-redes" <?php if(!$secretaria){ ?> style="margin: 2px 0 0 0;" <?php } ?>>Síguele en:</div>
            <ul class="menu" 
            <?php if($siglas){ ?> 
            id="single-redesSem"  
            <?php }else { ?> 
            id="single-redes"  
            <?php } ?> >
            <?php
            if($facebook){ ?>
                <li class="iconFacebook">
                    <a target="_blank" href="<?php echo "$facebook"; ?>">
                        <span>Facebook</span>
                    </a>
                </li>
            <?php
            }
            if($twitter){ ?>
                <li class="iconTwitter">
                    <a target="_blank" href="https://twitter.com/<?php echo "$twitter"; ?>">
                    <span>Twitter</span>
                    </a>
                </li>
            <?php	 
            }
            if($youtube){ ?>
                <li class="iconYoutube">
                    <a target="_blank" href="<?php echo "$youtube"; ?>">
                    <span>YouTube</span>
                    </a>
                </li>
            <?php	  	  
            }
            if($pinterest){ ?>
                <li class="iconPinterest">
                    <a target="_blank" href="<?php echo "$pinterest"; ?>">
                    <span>Pinterest</span>
                    </a>
                </li>	
            <?php
            }
            if($plus){ ?>
            <li class="iconPlus">
                <a target="_blank" href="<?php echo "$plus"; ?>">
                    <span>Pinterest</span>
                </a>
            </li>		  
            <?php
            }
            ?>
        </ul>
    </div>
</div>
<?php }?>
    <div class="col-md-10 col-lg-10 post-home move-izquierda">
        <div class='col-sm-6 col-md-5 col-lg-5 pull-left single-img'>
        <?php 
        $imagen = get_post_meta($post->ID, 'imagen', true);
        if($imagen){
        ?>	
        <?php 
            $args = array( 
                'numberposts'     => -1, 
                'order'           => 'DESC',
                'post_type'       => 'attachment', 
                'post_parent'     => $post->ID, 
                'post_mime_type' => 'image' 
            ); 
            $image = get_posts($args); 
            if($image) { 
                foreach($image as $key => $data) : ?> 
    
    
    <?php $nombreIMG=$data->post_title; ?> 
    <?php endforeach; 
     } 
    ?>
            <span class='img img-responsive'>
            <img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $imagen; ?><?php print $large_image_url[0]; ?>&w=250&h=300&a=cr' alt='<?php echo $attachment->post_excerpt; ?>' />
            </span>
            <a class="link-descarga" href="<?php echo $imagen; ?>" download="<?php echo $nombreIMG;?>" style=" font-size:1.286em;">Descargar Foto Oficial</a>
            <?php }
        ?>
        </div>
      <div class="entrytext" style="text-align:justify;">
       <?php the_content(); ?>
      	<div class="border-bottom"></div> 
      </div>
     
    </div>
     <?php endwhile; endif; ?>
     
    </div>
  <div class="border-solid respBorder" style="margin:0 auto; clear:both;"></div>
</section>
</div>
	<?php if($secretaria){ ?>
        <div style="display:none;">
            <?php $link_before =siblings('before'); ?>
            <?php $link_after =siblings('after'); ?>
        </div>
        <div class="navposts-semblanza">
            <div class="pull-left" style="margin-left:15%;">
                <a href="<?php echo $link_after['after']; ?>">
                    <?php echo $link_after['text_aft']."&nbsp;&nbsp;".$link_after['title_after']; ?>
                </a>
            </div>
            <div class="pull-right" style="margin-right:15%;">
                <a href="<?php echo $link_before['before']; ?>">
                    <?php echo $link_before['title_before']."&nbsp;&nbsp;".$link_before['text_bef']; ?>
                </a>
            </div>
        </div>
    <?php }else{ ?> 
    <div style="margin-bottom:5%;"></div>
    <?php }?>
</div>
<?php get_footer(); ?>