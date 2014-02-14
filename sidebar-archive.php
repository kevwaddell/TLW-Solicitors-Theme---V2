<?php 
$archives_args = array(
	'type'            => 'monthly',
	'limit'			  => 12,
	'echo'            => 0,
	'format'		 => 'custom',
	'before'          => '<li class="archive-link">',
	'after'           => '</li>',
	);


if (is_year()) {
$archives_args['type'] = 'yearly';
$archives_args['limit'] = 5;
}

$archives = wp_get_archives($archives_args);

?>

<?php if ($archives) { ?>

<ul class="list-unstyled tab-links">
	<?php echo $archives; ?>
</ul>

<?php }  ?>

<?php include (STYLESHEETPATH . '/_/inc/sidebar/social-feed.php'); ?>

<div class="side-search-block">
	<button class="icon-header dropdown-head search-head-btn" data-toggle="collapse" data-target="#search-form"><i class="icon fa fa-search fa-lg"></i>Search<i class="fa fa-angle-down fa-lg"></i></button>
	<div id="search-form" class="sidebar-block-inner collapse">
		<?php get_search_form(); ?>
	</div>
</div>