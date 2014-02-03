<?php 
/*
Template Name: Feedback page template
*/
 ?>

<?php get_header(); ?>

<?php
$feedback_args = array(
	'posts_per_page'   => 6,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
); 
$feedback_quotes = get_posts($feedback_args); 

//echo '<pre>';print_r($feedback_quotes);echo '</pre>';
?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
 ?>	
<!-- PAGE TOP SECTION -->
<section class="page-top">
	
	<article <?php post_class(); ?>>
		
			<div class="row">
			
				<div class="hidden-xs hidden-sm col-md-4 col-lg-4">
					<figure class="feat-img">
					<?php add_feat_img($post) ; ?>
					</figure>
				</div>
				
				
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				
				<h2 style="margin-top: 0px;"><?php the_title(); ?></h2>
				
				<?php if (isset($intro)) { ?>
				<p class="intro"><?php echo $intro ; ?></p>
				<?php } ?>
				
				<?php the_content(); ?>
				
				</div>
				
			</div>
			
		</article>

</section>
<!-- PAGE TOP SECTION -->
		
<?php endwhile; ?>
<?php endif; ?>

<?php if ($feedback_quotes) { ?>

<!-- TEAM PROFILES SECTION -->
<section id="feedback-quotes" style="padding: 0px 30px">
	<div class="row">
	
	<?php foreach ($feedback_quotes as $quote) : 
	$name = get_field('client_name', $quote->ID);	
	$location = get_field('location', $quote->ID);	
	$quote = get_field('quote', $quote->ID);	
	?>
	<div class="quote col-xs-12 col-sm-6 col-md-4 col-lg-4">
	<blockquote class="height: 150px;"><i class="fa fa-quote-left"></i> <?php echo $quote ; ?> <i class="fa fa-quote-right"></i></blockquote>
	<p class="name-location"><?php echo $name ; ?>, <?php echo $location ; ?></p>	
	</div>
	<?php endforeach; ?>
	
	</div>
	
	<a href="mailto:info@tlwsolicitors.co.uk?subject=TLW client feedback" class="btn" title="Send us your feedback">
		<i class="fa fa-bullhorn"></i> Send us your feedback <i class="fa fa-angle-right"></i>
	</a>
</section>
<!-- TEAM PROFILES SECTION -->

<?php } ?>

<?php get_footer(); ?>
