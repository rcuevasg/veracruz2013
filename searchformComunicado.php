<script>
jQuery(document).ready(function() {
	jQuery(function () {
		
		jQuery('#validarForm').click(function () {
			$.ajaxSetup({cache:false});
				if($("#s").val().length < 1){
					$("#s").focus();								 
					return false;
					}else{
						return true;
						}
				});
	});

});
</script>
<form role="search" method="get" class="search-form" autocomplete="off" action="<?php echo home_url( '/' ); ?>">
	<!-- <div class="input-group">
		<input type="search" class="search-field form-control" placeholder="Buscar" value="" name="s" />
		<span class="input-group-btn">
		<!-- <span class="input-group-btn"> -->
	     <!--   <button class="btn btn-default btn-lg" type="submit"><span class="glyphicon glyphicon-search"></span></button>
	     </span>
	<!-- <input type="submit" class="search-submit glyphicon glyphicon-search" value="Search" /> -->
	<!--</div> <!-- end .input group -->
	
	
	
	<div class="input-group">
    <?php 
		$categoriaBlog = get_category_by_slug('blog');
		$categoriaBlog = $categoriaBlog->term_id;
	?>
	  <input type="hidden" value="c" name="t">
      <input type="text" class="search-field form-control" placeholder="¿Qué estás buscando?" value="" name="s" id="s">
      <span class="input-group-btn">
        <button class="btn btn-default " id="validarForm" type="submit" onClick="validar()"><span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div><!-- /input-group -->
</form>