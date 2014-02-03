<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
$related_pages = get_field('page_links'); 
?>	
 
 	<div class="row">
 	
 		<?php if (isset($related_pages)) { ?>
 		
 		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
 			
 			<ul class="top-page-links">
 			
 			<?php foreach ($related_pages as $related_page) { 
	 			
	 			if ($related_page['link_title']) {
		 			$title = $related_page['link_title'];
	 			} else {
		 			$title = $related_page['page']->post_title;
	 			}
	 			
 			?>
 				<li><a href="<?php echo get_permalink($related_page['page']->ID); ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></li>
 			<?php } ?>
 				
 			</ul>
 			
 		</div>
 		
 		<?php }  ?>
 	
	 	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
	 	
			<article <?php post_class(); ?>>
				<h2><?php the_title(); ?></h2>
				
				<?php if (isset($intro)) { ?>
				<p class="intro"><?php echo $intro ; ?></p>
				<?php } ?>
				
				<?php the_content(); ?>
			</article>
			
	 	</div>
		
 	</div>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
