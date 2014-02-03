<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
$form = get_field('form');
$office_tel = get_field('office_tel');
$fax = get_field('fax');
$email = get_field('email');
$location = get_field('location');
$map_marker = get_stylesheet_directory_uri()."/_/img/map-marker.png";
//echo '<pre>';print_r($location);echo '</pre>';
 ?>	
 
 	
	<?php if ($location) { ?>

	<?php include (STYLESHEETPATH . '/_/inc/contact-us/map.php'); ?>
	
	<?php } ?>
 	
 	<section <?php post_class(); ?>>
 	
 	<div class="row">
	
		<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
 	
			<div class="sidebar-block">
				<h3 class="icon-header dropdown-header"><i class="fa fa-map-marker"></i> Address <i class="fa fa-angle-down"></i></h3>
				<div class="sidebar-block-inner">
					<?php the_content(); ?>
				</div>
				
				<h3 class="icon-header dropdown-header"><i class="fa fa-globe"></i> Route finder <i class="fa fa-angle-down"></i></h3>
				<div id="control" class="sidebar-block-inner">
					
					<div class="form-group">
						<label for="start">Enter Your Post code:</label>
						<input type="text" class="form-control" maxlength="9" id="start">
					</div>
					<button onclick="calcRoute();" class="btn btn-default btn-block">Show route <span class="glyphicon glyphicon-road"></span></button>

				</div>
			</div>
			
			<ul class="contact-list">
				
				<?php if (isset($office_tel)) { ?>
				<li><i class="fa fa-phone"></i> Office Tel: <?php echo $office_tel; ?></li>
				<?php } ?>
				
				<?php if (isset($fax)) { ?>
				<li><i class="fa fa-print"></i> Fax: <?php echo $fax; ?></li>
				<?php } ?>
				
				<?php if (isset($email)) { ?>
				<li><a href="mailto:<?php echo $email; ?>" title="Email TLW"><i class="fa fa-envelope"></i> <?php echo $email; ?></a></li>
				<?php } ?>
				
			</ul>
		
		</aside>
		<a id="make-a-claim" name="make-a-claim">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-7 col-lg-offset-0">
			
			<div class="contact-form">
			<?php if ($form) { ?>
			
			<?php gravity_form($form->id, true, true, false, null, true); ?>
			
			<?php }  ?>
			</div>
			
		</div>
		
		
 	</section>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
