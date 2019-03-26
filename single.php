<?php get_header();

	if($smof_data['layout_post']) {
		$layout = $smof_data['layout_post'];
		if ($layout == '1col-fixed') { $layout_sidebar = ''; }
		if ($layout == '2c-r-fixed') { $layout_sidebar = ' sidebar-right'; }
		if ($layout == '2c-l-fixed') { $layout_sidebar = ' sidebar-left'; }
	}

?>

<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
<section class="featured">
	<?php the_post_thumbnail(); ?>
</section>
<?php endif; ?>

<section class="s-single-post">
	<div class="container">
		<div class="row<?php echo $layout_sidebar; ?>">

			<div class="col">
				<div class="page-content">

					<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="post-block">
							<h1 class="post-title"><?php the_title(); ?></h1>
							<span class="post-date"><?php the_time('F j, Y'); ?></span>
							<?php the_content(); ?>
						</div>

						<div class="detail-blog">
							<span class="author"><?php _e( 'By', 'davinci' ); ?> <?php the_author_posts_link(); ?></span>
							<span class="tags"><?php the_tags( __( 'Tags: ', 'davinci' ), ', ', '<br>');  ?></span>
							<span class="cat"><?php _e( 'Categories: ', 'davinci' ); the_category(', '); // Separated by commas ?></span>
						</div>
						<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

						<?php
						wp_link_pages( array(
							'before'      => '<div class="page-links">' . __( 'Pages:', 'davinci' ),
							'after'       => '</div>',
							'link_before' => '<span class="page-number">',
							'link_after'  => '</span>',
						) );
						?>

						<?php if($smof_data['comments']) {
							comments_template(); 
						} ?>


					</article>
					<?php endwhile; ?>

					<?php else: ?>
					<h2><?php _e( 'Sorry, nothing to display.', 'davinci' ); ?></h2>
					<?php endif; ?>

				</div>
			</div>

			<?php if($smof_data['layout_post']) {
				if ( $layout == '2c-r-fixed' || $layout == '2c-l-fixed') { ?>
			<div class="col" <?php if($smof_data['sidebar_width_post']) { echo ' style="max-width:'.$smof_data['sidebar_width_post'].'%;"'; } ?>>
				<?php get_sidebar('posts'); ?>
			</div>
			<?php } } ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>
