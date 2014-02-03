<?php 
/*
Template Name: Newsletter sign up template
*/
?>
<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
$form = get_field('form');
 ?>	
		<article>
			<h2><?php the_title(); ?></h2>
			
			<?php if (isset($intro)) { ?>
			<p class="intro"><?php echo $intro ; ?></p>
			<?php } ?>
			
			<?php the_content(); ?>
			
			<?php if ($form) { ?>
			
			<?php gravity_form($form->id, false, false, false, null, true); ?>
			
			<?php }  ?>
			
		</article>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
