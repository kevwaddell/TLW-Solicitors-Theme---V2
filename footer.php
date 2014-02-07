		</div>
		
		</div>
		<!-- MAIN CONTENT END -->
		
		</div>
		
		<!-- FOOTER START -->
		<section id="footer-info">
		
			<footer class="container">
				
				<div class="row">
				
					<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
					<h3>Our Services</h3>
					<?php wp_nav_menu(array( 'container_class' => 'footer-nav', 'theme_location' => 'footer_menu', 'fallback_cb' => false ) ); ?>
					</div>
					
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3 class="hidden-xs">General</h3>
					<?php wp_nav_menu(array( 'container_class' => 'footer-nav', 'theme_location' => 'footer_menu_general', 'fallback_cb' => false ) ); ?>
					</div>
					
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<?php wp_nav_menu(array( 'container_class' => 'social-links clearfix', 'theme_location' => 'social_links_menu', 'fallback_cb' => false ) ); ?>
					
					<div id="footer-logo" class="hidden-xs text-hide"><?php bloginfo('name'); ?></div>
					
					<div class="compliance-notice">
						<?php $compliance_notice = get_field('compliance_notice', 'option');?>
						<?php if (isset($compliance_notice)) { ?>
						<?php echo $compliance_notice; ?>
						<?php }  ?>
					</div>
					
					</div>
				
				</div>
				
				<div class="copyright">
					<p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. <br>All rights reserved.</p>
				</div>
				
			</footer>
			
		</section>
		
		<?php wp_footer(); ?>

	</body>
</html>