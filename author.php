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
						<main role="main">
							<!-- section -->
							<section>

							<?php if (have_posts()): the_post(); ?>
								<h1><?php _e( 'Author Archives for ', 'davinci' ); echo get_the_author(); ?></h1>
							<?php if ( get_the_author_meta('description')) : ?>
							<?php echo get_avatar(get_the_author_meta('user_email')); ?>
								<h2><?php _e( 'About ', 'davinci' ); echo get_the_author() ; ?></h2>
								<?php echo wpautop( get_the_author_meta('description') ); ?>
							<?php endif; ?>

							<?php rewind_posts(); while (have_posts()) : the_post(); ?>

								<!-- article -->
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

									<!-- post thumbnail -->
									<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
										</a>
									<?php endif; ?>
									<!-- /post thumbnail -->

									<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

									<!-- post details -->
									<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
									<span class="author"><?php _e( 'Published by', 'davinci' ); ?> <?php the_author_posts_link(); ?></span>
									<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'davinci' ), __( '1 Comment', 'davinci' ), __( '% Comments', 'davinci' )); ?></span>
									<!-- /post details -->

									<?php davinci_excerpt('davinci_index'); // Build your custom callback length in functions.php ?>
									<br class="clear">
									<?php edit_post_link(); ?>
								</article>
								<!-- /article -->

							<?php endwhile; ?>
							<?php else: ?>
								<article>
									<h2><?php _e( 'Sorry, nothing to display.', 'davinci' ); ?></h2>
								</article>
							<?php endif; ?>
								<?php get_template_part('pagination'); ?>
							</section>
						</main>
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
