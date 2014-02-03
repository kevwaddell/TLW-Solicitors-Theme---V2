<?php 
/*
Template Name: Company page template
*/
 ?>

<?php get_header(); ?>

<?php
if ($post->post_parent != 0) {
$post_ID = $post->post_parent;
} else {
$post_ID = $post->ID;	
}

$extra_child_args =  array(
	'sort_column' => 'menu_order',
	'hierarchical' => 0,
	'parent' => $post_ID,
	'include'	=> array(18, 22),
	'post_type' => 'page'
); 	
$extra_children = get_pages($extra_child_args); 

$child_args = array(
	'sort_column' => 'menu_order',
	'hierarchical' => 0,
	'parent' => $post_ID,
	'exclude'	=> array(18, 22),
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
 ?>	
<section class="page-top">

		<article <?php post_class(); ?>>
			
			<div class="row">
			
				<div class="hidden-xs hidden-sm col-md-4 col-lg-4">
					<figure class="feat-img">
					<?php add_feat_img($post) ; ?>
					</figure>
				</div>
				
				
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-7 col-lg-offset-0">
				
				<h2 style="margin-top: 0px;"><?php the_title(); ?></h2>
				
				<?php if (isset($intro)) { ?>
				<p class="intro"><?php echo $intro ; ?></p>
				<?php } ?>
				
				<?php the_content(); ?>
				
				</div>
				
			</div>
			
		</article>

</section>
		
<?php endwhile; ?>
<?php endif; ?>

<?php if ($children) { ?>
<!-- PAGE CONTENT SECTION -->

<section class="page-content">
		
		<div class="row">
		
			<aside class="sidebar col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
				<ul>
				<?php foreach ($children as $child) { 
				
				$page_icon = get_field('page_icon', $child->ID);
				
				if (isset($page_icon)) {
				$icon = '<i class="fa '.$page_icon.'"></i> ';
				} else {
				$icon = "";		
				}
				
				if ($current_post->post_parent != 0) {
					
					if ($current_post->ID == $child->ID) {
					$link = '<li class="active">';
					} else {
					$link = '<li>';	
					}
					
				$link .= '<a href="'.  get_permalink($child->ID) .'" title="'. $child->post_title .'">'. $icon . $child->post_title .'</a>';	
				} else {
				
					if ($active_child->ID == $child->ID) {
					$link = '<li class="active">';
					} else {
					$link = '<li>';	
					}
					
				$link .= '<a href="#'.  $child->post_name .'-panel" data-toggle="tab" title="'. $child->post_title .'">'. $icon . $child->post_title .'</a>';			
				}	
				 
				$link .= '</li>';	
				
				?>
				<?php echo $link; ?>
				
				<?php } ?>
				
				<?php if ($extra_children) { ?>
				
					<?php foreach ($extra_children as $extra_child) { 
					$page_icon = get_field('page_icon', $extra_child->ID);
					
					if (isset($page_icon)) {
					$icon = '<i class="fa '.$page_icon.'"></i> ';
					}
					
					?>
					<li>
					<a href="<?php echo get_permalink($extra_child->ID); ?>" title="<?php echo $extra_child->post_title; ?>"><?php echo ($icon) ? $icon : ""; ?><?php echo $extra_child->post_title; ?></a>
					</li>
					<?php } ?>
				
				<?php } ?>
				
				</ul>
			</aside>
			
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-7 col-lg-offset-0">
				
				<div class="tab-content">
				
				<?php if (isset($active_child) && $current_post->post_parent != 0) : 
				$page_content_raw = $active_child->post_content;
				$page_content = apply_filters('the_content', $page_content_raw );
				$sub_intro = get_field('intro', $active_child->ID);
				$page_icon = get_field('page_icon', $active_child->ID);
				$rel_pages = get_field('page_links', $active_child->ID);
				$freephone_num = get_field('freephone_num', 'option');
				//echo '<pre>';print_r($rel_pages);echo '</pre>';
				?>
				
				<article class="page tabs-panel" id="<?php echo $post->post_name; ?>-panel">
				
					<h3 class="icon-header">
						<?php if (isset($page_icon)) { ?>
						<i class="fa <?php echo $page_icon; ?>"></i> 
						<?php } ?>
						<?php echo $active_child->post_title; ?>
					</h3>
					
					<?php if (isset($sub_intro)) : ?>
						<p class="intro"><?php echo $sub_intro ; ?></p>
					<?php endif; ?>
					
					<?php echo $page_content; ?>
					
					<?php if (isset($rel_pages)) { ?>
						
						<?php foreach ($rel_pages as $rel_page) { 
							
							if ($rel_page['link_title']) {
							$title = $rel_page['link_title'];
							} else {
							$title = $active_child->post_title;	
							}
							
							$icon = get_field('page_icon', $rel_page['page']->ID);
						?>
						
						<a href="<?php echo get_permalink($rel_page['page']->ID) ; ?>" title="<?php echo $title; ?>" class="btn">
						
						<?php if ($icon) { ?>
						<i class="fa <?php echo $icon; ?>"></i>
						<?php } ?>
						<?php echo $title; ?>
						<i class="fa fa-angle-right"></i>
						
						</a>
						
						<?php } ?>
						
					<?php } ?>
					
					<?php if ($active_child->post_name == "company-profile") { ?>
					 <p class="tel-num"><i class="fa fa-mobile"></i> Or call us free on <span>0800 169 5925</span></p>
					<?php }  ?>
					
				</article>
				
				<?php else : ?>
				
				<?php foreach ($children as $post) : 
				setup_postdata($post);
				$sub_intro = get_field('intro');
				$page_icon = get_field('page_icon');
				$rel_pages = get_field('page_links');
				?>
		
				<article class="page tab-pane tabs-panel fade<?php echo ($post->ID == $active_child->ID) ? ' in active':''; ?>" id="<?php echo $post->post_name; ?>-panel">
					
					<h3 class="icon-header">
					<?php if (isset($page_icon)) { ?>
					<i class="fa <?php echo $page_icon; ?>"></i> 
					<?php } ?>
					<?php the_title(); ?>
					</h3>
					
					<?php if (isset($sub_intro)) { ?>
					<p class="intro"><?php echo $sub_intro ; ?></p>
					<?php } ?>
					
					<?php the_content(); ?>
					
					<?php if (isset($rel_pages)) { ?>
						
						<?php foreach ($rel_pages as $rel_page) { 
							
							if ($rel_page['link_title']) {
							$title = $rel_page['link_title'];
							} else {
							$title = get_the_title();	
							}
							
							$icon = get_field('page_icon', $rel_page['page']->ID);
						?>
						
						<a href="" title="<?php echo $title; ?>" class="btn">
						<?php if ($icon) { ?>
						<i class="fa <?php echo $icon; ?>"></i>
						<?php } ?>
						<?php echo $title; ?>
						<i class="fa fa-angle-right"></i>
						</a>
						
						<?php } ?>
						
					<?php } ?>
					
					<?php if ($post->post_name == "company-profile") { ?>
					 <p class="tel-num"><i class="fa fa-mobile"></i> Or call us free on <span>0800 169 5925</span></p>
					<?php }  ?>
					
				</article>
				
				<?php endforeach;
				wp_reset_postdata();
				 ?>
					
				<?php endif; ?>
				</div>	
				
			</div>
		
		</div>

</section>

<!-- PAGE CONTENT SECTION -->
<?php } ?>

<?php get_footer(); ?>
