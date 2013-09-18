<?php get_header(); ?>
<section id="principalSearch" class="container">
    <div class="col-md-8 col-lg-8">
        <?php
			global $query_string, $wp_query;
			$query_args = explode("&", $query_string);
			$search_query = array();
			foreach($query_args as $key => $string) {
				$query_split = explode("=", $string);
				$search_query[$query_split[0]] = urldecode($query_split[1]);
			}
			$total_results = $wp_query->found_posts;
			echo "<div class='total-search'>Se han encontrado <span>".$total_results." Resultados</span> acerca de su búsqueda</div>";
			$search = new WP_Query($search_query);
			if ( $search->have_posts() ) {
                $cont=1;
			    while ( $search->have_posts() ) { $search->the_post(); 
			?>
        		<div class="item-search">
                	<h3><?php the_title(); ?></h3>
                    <span><?php the_time('F j, Y'); ?></span>
                    <p> <?php the_excerpt(); ?></p>
                </div>
        
        <?php  }
            }
        ?>
        <center><?php if (function_exists('wp_pagenavi')){ wp_pagenavi(); } ?></center>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>