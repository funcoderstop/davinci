<?php global $smof_data;

	if($smof_data['layout_posts_collums']) {
		$layout = $smof_data['layout_posts_collums'];
		if ($layout == 'col-12') { $layout_collums = 'col-12'; }
		if ($layout == 'col-6') { $layout_collums = 'col-6'; }
		if ($layout == 'col-4') { $layout_collums = 'col-4'; }
	}

?>

<div class="row">
<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<div class="<?php echo $layout_collums; ?>">

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) { // Check if thumbnail exists ?>
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
				</a>
			<?php } else { ?>
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/featured-11.jpg" alt="">
				</a>
			<?php } ?>
			<!-- /post thumbnail -->

			<!-- post title -->
			<div class="article-text">

				<h2>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
				<!-- /post title -->

				<!-- post details -->
				<span class="post-date"><?php the_time('F j, Y'); ?></span>
				<!-- /post details -->

				<?php davinci_excerpt('davinci_index'); // Build your custom callback length in functions.php ?>

			</div>

			<?php if($smof_data['detail_blog']) { ?>
			<div class="detail-blog">
				<span class="author"><?php _e( 'Published by', 'davinci' ); ?> <?php the_author_posts_link(); ?></span>

				<?php if($smof_data['comments']) { ?>
				<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'davinci' ), __( '1 Comment', 'davinci' ), __( '% Comments', 'davinci' )); ?></span>
				<?php } ?>

			</div>
			<?php } ?>

			<?php edit_post_link(); ?>

		</article>
		<!-- /article -->

		</div>

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>
				<h2><?php _e( 'Sorry, nothing to display.', 'davinci' ); ?></h2>
			</article>
			<!-- /article -->

		<?php endif; ?>

</div>
