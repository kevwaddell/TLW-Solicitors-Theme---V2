<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<section class="page-top">
	
	<article <?php post_class(); ?>>
		
		<h2><?php the_title(); ?></h2>
	
		<?php the_content(); ?>	
		
		<div class="search-form-wrap">
		<?php get_search_form(); ?>
		</div>
		
	</article>

</section>
<?php endwhile; ?>
<?php endif; ?>


<?php include (STYLESHEETPATH . '/_/inc/site-map/vars.php'); ?> 

<section id="site-map-lists">

	<div class="row">
	
		<?php include (STYLESHEETPATH . '/_/inc/site-map/site-map-list-left-col.php'); ?> 
	
		<?php include (STYLESHEETPATH . '/_/inc/site-map/site-map-list-middle-col.php'); ?>
		
		<?php include (STYLESHEETPATH . '/_/inc/site-map/site-map-list-right-col.php'); ?>
			
	</div>

</section>

<?php get_footer(); ?>
