			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<div id="inner-footer" class="wrap cf">
					<nav role="navigation">
						<?php wp_nav_menu(array(
							'container' 		=> 'div',                           	// enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
							'container_class' 	=> 'footer-links cf',         			// class of container (should you choose to use it)
							'menu' 				=> __( 'Footer Links', 'bonestheme' ),  // nav name
							'menu_class' 		=> 'nav footer-nav cf',            		// adding custom nav class
							'theme_location' 	=> 'footer-links',             			// where it's located in the theme
							'before' 			=> '',                                 	// before the menu
							'after' 			=> '',                                  // after the menu
							'link_before' 		=> '',                            		// before each link
							'link_after' 		=> '',                             		// after each link
							'depth' 			=> 0,                                   // limit the depth of the nav
							'fallback_cb' 		=> 'bones_footer_links_fallback'  		// fallback function
						)); ?>
					</nav>
					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
				</div>
			</footer>
		</div>


		<script type="text/javascript">

			jQuery(document).ready(function($){
				/* SLIDER HOMEPAGE */
				var visuelActif,
					nbVisuels,
					firstSlide,
					firstCommand,
					lastSlide,
					lastCommand,
					gotoslide;
				visuelActif 	= 2;
				nbVisuels 		= $('.slideshow .slider li').length;
				firstSlide 		= $('.slideshow .slider li:first-child').html();
				lastSlide 		= $('.slideshow .slider li:last-child').html();
				largeurslider 	= $('.slideshow').width();
				$('.slideshow .slider').append('<li>'+firstSlide+'</li>');
				$('.slideshow .slider').prepend('<li>'+lastSlide+'</li>');
				$('.slideshow li').css('width', largeurslider+'px');
				$('.slideshow .slider').css('width', (largeurslider*(nbVisuels+2))+'px');
				$('.slideshow .slider').css('margin-left','-'+(largeurslider)+'px');
				$('.call_to_action .next_btn').bind('click', function(){
					if(visuelActif <= nbVisuels){
						$('.slideshow .slider').animate({'margin-left':'-'+((visuelActif)*largeurslider)+'px'}, 500, function(){
							visuelActif++;
						});
					}else{
						$('.slideshow .slider').animate({'margin-left':'-'+((visuelActif)*largeurslider)+'px'}, 500, function(){
							visuelActif = 2;
							$('.slideshow .slider').css('margin-left','-'+(largeurslider)+'px');
						});
					}
				})
				$('.call_to_action .previous_btn').bind('click', function(){
					if(visuelActif > 1){
						visuelActif--;
						$('.slideshow .slider').animate({'margin-left':'-'+((visuelActif-1)*largeurslider)+'px'}, 500);
					}else{
						$('.slideshow .slider').css('margin-left', '-'+((nbVisuels)*largeurslider)+'px');
						visuelActif = nbVisuels;
						$('.slideshow .slider').animate({'margin-left':'-'+((visuelActif-1)*largeurslider)+'px'}, 500);
					}
				});



				/*SIDEBAR ESPACE PERSO*/
				$("#espace").on("click", function(){
					$('.sidebar_mon_espace').toggleClass('active');
					$('.sidebar_1').toggleClass('active');
					$('#content').toggleClass('active');
					$('.footer').toggleClass('active');
				});

			})
		</script>
		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
	</body>
</html> <!-- end of site. what a ride! -->
