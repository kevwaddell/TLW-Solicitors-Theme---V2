<?php 
$topics_args = array(
	'orderby'            => 'meta_value',
	'hierarchical'       => 1,
	'title_li'           => "",
	'show_option_none'   => __('No Categories'),
	'echo'               => 0,
	'taxonomy'           => 'category'
	);
	
$topics = wp_list_categories($topics_args);
?>

<?php if ($topics) { ?>

<div class="sidebar-block">
	<ul class="links">
		<?php echo $topics; ?>
	</ul>
</div>

<?php }  ?>

<div class="sidebar-feeds-block">
	
	<ul>
		<li class="active"><a href="#twitter-feed" data-toggle="tab" title="Twitter"><i class="fa fa-twitter fa-lg"></i><span class="sr-only">Twitter</span></a></li>
		<li><a href="#facebook-feed" data-toggle="tab" title="Twitter"><i class="fa fa-facebook fa-lg"></i><span class="sr-only">Facebook</span></a></li>
		<li><a href="#google-plus-feed" data-toggle="tab" title="Twitter"><i class="fa fa-google-plus fa-lg"></i><span class="sr-only">Google+</span></a></li>
	</ul>
	
	<div class="tab-content sidebar-tab-content">
		
		<div id="twitter-feed" class="tab-pane in active">
			<div class="feed-wrap">
			<p>Twitter</p>	
				
			</div>
			
			<a href="https://twitter.com/TLWSolicitors" class="feed-link" target="_blank">View page <i class="fa fa-angle-right"></i></a>
		</div>
		
		<div id="facebook-feed" class="tab-pane">
			<div class="feed-wrap">
			<p>Facebook</p>	
				
			</div>
			
			<a href="http://facbook.com/" class="feed-link" target="_blank">View page <i class="fa fa-angle-right"></i></a>
		</div>
		
		<div id="google-plus-feed" class="tab-pane">
			<div class="feed-wrap">
			<p>Google+</p>	
				
			</div>
			
			<a href="https://plus.google.com/+TlwsolicitorsCoUk" class="feed-link" target="_blank">View page <i class="fa fa-angle-right"></i></a>
		</div>

		
	</div>
	
	

</div>