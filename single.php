<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<section class="page-content">

	<div class="row">
		
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-push-4 col-md-offset-0 col-lg-7 col-lg-push-4 col-lg-offset-0">
	
			<article>
				<h2 style="margin-top: 0px;"><?php the_title(); ?></h2>
				
				<?php the_content(); ?>
				
			</article>
	
		</div>
		
		<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-pull-8 col-md-offset-0 col-lg-4 col-lg-pull-7 col-lg-offset-0">
			
			<?php get_sidebar('single'); ?>
			
		</aside>
			
	</div>

</section>


<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
