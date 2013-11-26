<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!-- Activate responsiveness in the "child" page -->
<script src="<?php bloginfo('template_url') ?>/js/jquery.min-1.7.1.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.responsiveiframe.js"></script>
<!--
<script>
  var ri = responsiveIframe();
  ri.allowResponsiveEmbedding();
</script>
<script>
      $(function(){
        $('#myIframeID').responsiveIframe({ xdomain: '*'});
      });        
</script>-->
<script>
	$( window ).scroll(function() {
		var ScrollTop = $(window).scrollTop();
		console.log( ScrollTop );
		if( ScrollTop !=0 ){
			$( "#logo-informe" ).animate({
				height: "0px",
				opacity: 0.4,
			}, 1500 );
			$(".logo-after-content").fadeIn( "slow" );
			$(".slogan-content").fadeIn( "slow" );
			//return false;
		}else{
			$( "#logo-informe" ).css({"height" : "188px" , "opacity" : "1.0" });
			$(".logo-after-content").fadeOut( "slow" );
			$(".slogan-content").fadeOut( "slow" );
			//return false;
		}
	});
</script>
<body>
    <div id="wrapper-informe">
        <div class="content-iframe">
            <div class="logo-content">
                <center>
                   <img id="logo-informe" src="<?php bloginfo('template_url'); ?>/images/tercerinforme/logo-treceinforme.png"> 
                </center>
            </div>
            <div class="bg-shadow"></div>
            <div class="area-iframe" style="height:400px">	
                <!--<div class="logo-after-content">
                    <img id="logo-informe" src="<?php bloginfo('template_url'); ?>/images/tercerinforme/logo-scroll-after.png">	
                </div>-->
                <div class="iframe">
                   <!--<iframe id="myIframeID" src="http://www.rtv.org.mx/stream.html" width="649" height="490" frameborder="0" scrolling="no" > </iframe>-->
                   <!--<iframe width="649" height="490" src="http://www.youtube.com/embed/0KIbtQZ_Etw?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen=""></iframe>-->
                </div><!--636x401-->
                <!--<div class="slogan-content">
                    <img id="logo-informe" src="<?php bloginfo('template_url'); ?>/images/tercerinforme/slogan-tercer-informe.png">	
                </div>-->
            </div>
            <h2 class="w-636">ESTÁS VIENDO EL III INFORME DEL GOBERNADOR JAVIER DUARTE DE OCHOA, EN VIVO DESDE SAN JUAN DE ULÚA, VERACRUZ</h2>
            <div class="bg-gray-p">
                <p class="w-636">Comparte los logros que hemos alcanzado juntos</p>
                <span class="w-636">#3informeJD</span>
            </div>
        </div>
        <div class="share">
            <ul id="menu-redes-sociales-menu-1" class="menu">
                <li class="iconFacebook menu-item menu-item-type-custom menu-item-object-custom menu-item-27059">
                    <a target="_blank" href="http://www.facebook.com/sharer.php?app_id=245018795648789&sdk=joey&u=http%3A%2F%2Ftercerinforme.veracruz.gob.mx%2Fvivir.html%23seguridad">
                        <span>facebook</span>
                    </a>
                </li>
                <li class="iconTwitter menu-item menu-item-type-custom menu-item-object-custom menu-item-27060">
                    <a href="http://twitter.com/home?status=<?php echo urlencode("#EnVivo sigue la transmisión del III Informe de Gobierno de Javier Duarte de Ochoa desde San Juan de Ulúa, Veracruz http://www.veracruz.gob.mx");?>" title="Comp&aacute;rtelo en Twitter" class="wptwitter" target="_blank">
                        <span>twitter</span>
                    </a>
                </li>
            </ul>
        </div>
        <center><img class="logo-campana-informe" src="<?php bloginfo('template_url'); ?>/images/tercerinforme/logo-campana-informe.png"></center>
        <center><a href="/pagina_principal/" style="text-decoration:none;" class="button-informe">IR AL SITIO</a></center>
    </div>
</body>