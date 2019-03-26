<?php get_header();

	if($smof_data['layout_blog_index']) {
		$layout = $smof_data['layout_blog_index'];
		if ($layout == '1col-fixed') { $layout_sidebar = ''; }
		if ($layout == '2c-r-fixed') { $layout_sidebar = ' sidebar-right'; }
		if ($layout == '2c-l-fixed') { $layout_sidebar = ' sidebar-left'; }
	}

 ?>

	<?php 	$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
		    $featured_image = $img[0];
			if ($featured_image) { ?>

	<section class="featured">
		<img src="<?php echo $featured_image; ?>" alt="">
	</section>

	<?php } ?>

	<main role="main">
		<!-- section -->
		<section class="blog-template">
			<div class="container">
				<div class="row<?php echo $layout_sidebar; ?>">

					<div class="col">
						<h1><?php echo sprintf( __( '%s Search Results for ', 'davinci' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
						<?php get_template_part('loop'); ?>
						<?php get_template_part('pagination'); ?>
					</div>

					<?php if($smof_data['layout_blog_index']) {
						if ( $layout == '2c-r-fixed' || $layout == '2c-l-fixed') { ?>
					<div class="col" <?php if($smof_data['sidebar_width_blog_index']) { echo ' style="max-width:'.$smof_data['sidebar_width_blog_index'].'%;"'; } ?>>
						<?php get_sidebar('blog'); ?>
					</div>
					<?php } } ?>

				</div>
			</div>
		</section>
		<!-- /section -->
	</main>



<?php get_footer(); ?>
