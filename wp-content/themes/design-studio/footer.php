<?php
/*
	This is the template for the footer

	@package Design-studio-theme
*/
?>

	<footer class="footer-section">

		<div class="container">

			<div class="row footer-row">

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

					<?php 
						$args = array( 
							'type'				=> 'post',
							'posts_per_page'	=> 1,
							'category_name'		=> 'Footer',
							'order'				=> 'ASC'
						);

						$blogLoop = new WP_Query( $args ); 

						if( $blogLoop->have_posts() ): 

							$i = 0;

							while( $blogLoop->have_posts() ): $blogLoop->the_post();
					?>

					<?php the_title('<h6 class="text-center text-uppercase font-weight-bold">', '</h6>'); ?>

					<?php the_content(); ?>

					<?php 
						$i++;

						endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

					//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
					?>

				</div><!-- .col-lg-4 -->

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

					<h6 class="text-center text-uppercase font-weight-bold">Links</h6>
					<?php 
						wp_nav_menu(
							array(
								'theme_location'	=> 'secondary',//theme_location - has to be the same name as specified in functions.php (register_nav_menu (first value - string $location)).
								'menu_class'		=> 'links'
							) 
						);
					?>
				</div><!-- .col-lg-4 -->


				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

					<h6 class="text-center text-uppercase font-weight-bold">Contacts</h6>

					<?php 
						$args = array( 
							'type'				=> 'post',
							'posts_per_page'	=> 3,
							'category_name'		=> 'Footer',
							'order'				=> 'ASC',
							'offset'			=> 1
						);

						$blogLoop = new WP_Query( $args ); 

						if( $blogLoop->have_posts() ): 

							$i = 0;

							while( $blogLoop->have_posts() ): $blogLoop->the_post(); 

								if($i==0): $fontIcon = 'fa fa-home';
									elseif($i > 0 && $i < 2): $fontIcon = 'fa fa-envelope';
									elseif($i > 1): $fontIcon = 'fa fa-phone';
								endif;
					?>

					<div class="row footer-contacts">

						<i class="<?php echo $fontIcon; ?> icons"></i>

						<?php the_content(); ?>

					</div><!-- .row -->

					<?php 
						$i++;

						endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

					//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
					?>

					<div class="social">

						<?php echo social_btn();//function in theme-support.php ?><!-- .socials -->

					</div><!-- .social -->

				</div><!-- .col-lg-4 -->

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<p class="text-center copyright-text">Copyright &copy; 2019 - <?php echo year();//function in theme-support.php ?><!-- .socials -->
					</p>
					
				</div><!-- .col-lg-12 -->

			</div><!-- .row -->

		</div><!-- .container -->

	</footer>

	<div id="cookie">

		<div id="cookie-close">x</div>

		This website is using cookies. <a href="#" target="_blank">More info</a>. <a class="cookie-agree">I agree</a>
		
	</div><!-- #cookie -->

	<?php wp_footer(); ?>

	</body>
</html>