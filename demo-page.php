<?php /* Template Name: Full Width Template */ get_header(); ?>

<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
	<section class="featured">
		<?php the_post_thumbnail(); ?>
	</section>
<?php endif; ?>

<section class="s-default-page">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="page-content">

					<h1><?php the_title(); ?></h1>

					<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php comments_template( '', true ); // Remove if you don't want comments ?>
					<?php endwhile; ?>

					<?php else: ?>
					<h2><?php _e( 'Sorry, nothing to display.', 'davinci' ); ?></h2>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
