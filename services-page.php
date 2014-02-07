<?php 
/*
Template Name: Services page template
*/
 ?>

<?php get_header(); ?>

<?php
if ($post->post_parent != 0) {
$post_ID = $post->post_parent;
} else {
$post_ID = $post->ID;	
} 	

$child_args = array(
	'sort_column' => 'menu_order',
	'hierarchical' => 0,
	'parent' => $post_ID,
	'post_type' => 'page'
); 
$children = get_pages($child_args); 

if ($post->post_parent != 0) {
$active_child = $post;
$current_post = $post;
$args = array();
$args['page_id'] = $post->post_parent;
$wp_query = new WP_Query( $args );
} else {
$active_child = $children[0];	
$current_post = $post;
}

?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$intro = get_field('intro');
$page_icon = get_field('page_icon');
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
				
				
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-7 col-lg-offset-0">
				
				<h2><?php the_title(); ?></h2>
				
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

<?php if ($children) { 
$contact_page = get_page_by_title("Contact us");
$child_count = count($children);

if ( $child_count % 2 == 0 ) {
$sm_col = "col-sm-6";	
} else {
$sm_col = "col-sm-12";	
}
?>

<!-- PAGE CONTENT SECTION -->

<section class="page-content">

	<div class="row">
	
		<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
			<ul class="list-unstyled tab-links row">
			<?php foreach ($children as $child) { 
			
			if ($current_post->post_parent != 0) {
				
				if ($current_post->ID == $child->ID) {
				$link = '<li class="active col-xs-12 '.$sm_col.' col-md-12 col-lg-12">';
				} else {
				$link = '<li class="col-xs-12 '.$sm_col.' col-md-12 col-lg-12">';	
				}
						
			$link .= '<a href="'.  get_permalink($child->ID) .'" title="'. $child->post_title .'" class="no-icon">'. $child->post_title. '<i class="fa fa-angle-right fa-lg"></i><i class="fa fa-angle-down fa-lg"></i></a>';	
			} else {
			
				if ($active_child->ID == $child->ID) {
				$link = '<li class="active col-xs-12 '.$sm_col.' col-md-12 col-lg-12">';
				} else {
				$link = '<li class="col-xs-12 '.$sm_col.' col-md-12 col-lg-12">';	
				}
				
			$link .= '<a href="#'.  $child->post_name .'-panel" data-toggle="tab" title="'. $child->post_title .'" class="no-icon">'. $child->post_title. '<i class="fa fa-angle-right fa-lg"></i><i class="fa fa-angle-down fa-lg"></i></a>';			
			}	
			 
			$link .= '</li>';	
			
			?>
			<?php echo $link; ?>
			
			<?php } ?>
			</ul>
		</aside>
		
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-7 col-lg-offset-0">
			
			<div class="tab-content clearfix">
			
			<?php if (isset($active_child) && $current_post->post_parent != 0) : 
			$page_content_raw = $active_child->post_content;
			$page_content = apply_filters('the_content', $page_content_raw );
			$sub_intro = get_field('intro', $active_child->ID);
			?>
			
			<article class="page tabs-panel" id="<?php echo $post->post_name; ?>-panel">
			
				<h3 class="icon-header" style="margin-top: 0px;">
				<?php if (isset($page_icon)) { ?>
				<i class="fa <?php echo $page_icon; ?>"></i> 
				<?php } ?>
				<?php echo $active_child->post_title; ?>
				</h3>
				
				<?php if (isset($sub_intro)) : ?>
					<p class="intro"><?php echo $sub_intro ; ?></p>
				<?php endif; ?>
				
				<?php echo $page_content; ?>
					<a href="<?php echo get_permalink($contact_page->ID) ; ?>?service=<?php echo $post->post_name; ?>&service-type=<?php echo $active_child->post_name; ?>#make-a-claim" title="Make a claim enquiry" class="icon-btn col-xs-12 col-sm-12 col-md-7 col-lg-7">
					<i class="fa fa-check fa-lg icon"></i> Make a claim enquiry <i class="fa fa-angle-right fa-lg"></i>
					</a>
				
			</article>
			
			<?php else : ?>
			
			<?php foreach ($children as $post) : 
			setup_postdata($post);
			$sub_intro = get_field('intro');
			$parent = get_page($post->post_parent);
			$service = str_replace(" ", "+", $parent->post_title);
			$service_area = str_replace(" ", "+", $post->post_title);
			?>
	
			<article class="page tab-pane tabs-panel fade<?php echo ($post->ID == $active_child->ID) ? ' in active':''; ?>" id="<?php echo $post->post_name; ?>-panel">
				
				<h3 class="icon-header" style="margin-top: 0px;">
				<?php if (isset($page_icon)) { ?>
				<i class="fa <?php echo $page_icon; ?>"></i> 
				<?php } ?>
				<?php the_title(); ?>
				</h3>
				
				<?php if (isset($sub_intro)) { ?>
				<p class="intro"><?php echo $sub_intro ; ?></p>
				<?php } ?>
				
				<?php the_content(); ?>
				
					<a href="<?php echo get_permalink($contact_page->ID) ; ?>?service=<?php echo $service; ?>&service-area=<?php echo $service_area; ?>#make-a-claim" title="Make a claim enquiry" class="icon-btn col-xs-12 col-sm-12 col-md-7 col-lg-7">
					<i class="fa fa-check fa-lg icon"></i> Make a claim enquiry <i class="fa fa-angle-right fa-lg"></i>
					</a>
				
			</article>
			
			<?php endforeach;
			wp_reset_postdata();
			 ?>
	
			<?php endif; ?>
			
			</div>	
			
			 <p class="tel-num"><i class="fa fa-mobile"></i> Or call us free on <span>0800 169 5925</span></p>
			
		</div><!-- End Col -->
		
	</div><!-- End Row -->

</section>

<!-- PAGE CONTENT SECTION -->


<?php } ?>

<?php get_footer(); ?>
