<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				
	<h2>Services</h2>
	
	<?php foreach ($practices as $practice) { ?>
	
	<?php 
	$practice_args = array(
	'post_type'		=> 'page',
	'orderby'		=> 'menu_order',
	'post_parent'	=> $practice->ID,
	'order'			=> 'ASC'
	);
	
	$practice_children = get_posts($practice_args);
	 ?>
	
		<div class="list-block">
			<h3><a href="<?php echo get_permalink($practice->ID); ?>"><?php echo $practice->post_title; ?></a></h3>
			
		<?php if ($practice_children) { ?>
			<ul class="list-unstyled">
			
			<?php foreach ($practice_children as $practice_child) { ?>
			<li><a href="<?php echo get_permalink($practice_child->ID); ?>"><?php echo $practice_child->post_title; ?></a></li>
			<?php } ?>
			
		<?php } ?>
		
			</ul>
		
		</div>
	
	<?php } ?>
					
</div>