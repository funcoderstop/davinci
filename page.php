<?php get_header(); 

	if($smof_data['layout_def']) { 
		$layout = $smof_data['layout_def'];
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

<section class="s-default-page">
	<div class="container">
		<div class="row<?php echo $layout_sidebar; ?>">

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

			<?php if($smof_data['layout_def']) { 
				if ( $layout == '2c-r-fixed' || $layout == '2c-l-fixed') { ?>
			<div class="col" <?php if($smof_data['sidebar_width_def']) { echo ' style="max-width:'.$smof_data['sidebar_width_def'].'%;"'; } ?>>
				<?php get_sidebar(); ?>
			</div>
			<?php } } ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>
