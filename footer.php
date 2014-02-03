		</div>
		
		</div>
		<!-- MAIN CONTENT END -->
		
		<!-- FOOTER START -->
		<section class="footer-info" style="margin-top: 30px; border-top: 2px solid Gray">
		
			<footer class="container">
				<div class="row">
				
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<h3>Our Services</h3>
				<?php wp_nav_menu(array( 'container_class' => 'footer-nav', 'theme_location' => 'footer_menu', 'fallback_cb' => false ) ); ?>
				</div>
				
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<h3>General</h3>
				<?php wp_nav_menu(array( 'container_class' => 'footer-nav', 'theme_location' => 'footer_menu_general', 'fallback_cb' => false ) ); ?>
				</div>
				
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<?php wp_nav_menu(array( 'container_class' => 'social-links', 'theme_location' => 'social_links_menu', 'fallback_cb' => false ) ); ?>
				
				<div id="footer-logo" style="height: 70px; background-color: DarkGray">TLW Logo</div>
				
				<?php $compliance_notice = get_field('compliance_notice', 'option');?>
				<?php if (isset($compliance_notice)) { ?>
				<?php echo $compliance_notice; ?>
				<?php }  ?>
				
				</div>
				
				<div class="copyright col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.<p>
				</div>
				
				</div>
			</footer>
			
		</section>
		
		<?php wp_footer(); ?>

	</body>
</html>