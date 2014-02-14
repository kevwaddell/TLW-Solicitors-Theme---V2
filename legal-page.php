<?php 
/*
Template Name: Legal pages template
*/
?>
<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
$related_pages = get_field('page_links'); 

?>	
 
 	<div class="row">
 	
	 	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
	 	
		 	<?php if (isset($related_pages)) { ?>
	 			
	 			<ul class="top-page-links list-unstyled clearfix">
	 			
	 				<li class="active"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?><i class="fa fa-angle-down fa-lg"></i></a></li>
	 				
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
	 		
	 		<?php }  ?>
	 	
			<article <?php post_class(); ?>>
				<h2><?php the_title(); ?></h2>
				
				<?php if (isset($intro)) { ?>
				<p class="intro"><?php echo $intro ; ?></p>
				<?php } ?>
				
				<?php the_content(); ?>
				
				<?php if ($post->post_name == "cookie-policy") { 
				$cookie_law_args = array(
				'post_type'	=> 'cookielawinfo',
				'post_per_page'	=> -1
				);
				$cookie_law_items = get_posts($cookie_law_args);
				//echo '<pre>';print_r($cookie_law_items);echo '</pre>';
				?>
					<div class="hidden-xs hidden-sm">
					<?php echo do_shortcode('[cookie_audit]'); ?>
					</div>
					
					
					<div id="cookie-law-list" class="hidden-md hidden-lg">
					
					<?php foreach ($cookie_law_items as $post) : 
					setup_postdata($post);	
					$type = get_post_meta(get_the_ID(), '_cli_cookie_type', true);
					$duration = get_post_meta(get_the_ID(), '_cli_cookie_duration', true);
					//echo '<pre>';print_r($type);echo '</pre>';
					//echo '<pre>';print_r($duration);echo '</pre>';
					?>
					<h4 class="icon-header"><i class="fa fa-info-circle fa-lg"></i><?php the_title() ; ?></h4>
					<p class="tag-label"><strong>Type:</strong> <?php echo $type; ?></p>
					<p class="tag-label"><strong>Duration:</strong> <?php echo $duration; ?></p>
					<p class="tag-label"><strong>Description:</strong></p>
					<?php the_content() ; ?>
					
					<?php endforeach; 
					wp_reset_postdata();	
					?>
					
					</div>
					
				<?php } ?>
			</article>
			
	 	</div>
		
 	</div>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
