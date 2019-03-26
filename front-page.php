<?php get_header();

	if($smof_data['bg_slider_select']) {
		$fstS = $smof_data['bg_slider_select'];
	}

	if($smof_data['height_bg_slider']) {
		$mh = $smof_data['height_bg_slider'];
	}

	if($smof_data['slider_text_position']) {
		$stp = $smof_data['slider_text_position'];
		if ($stp == 'left') { $class_pos = ' justify-content-start'; }
		if ($stp == 'center') { $class_pos = ' justify-content-center'; }
		if ($stp == 'right') { $class_pos = ' justify-content-end'; }
	}

	if($smof_data['slider_dots_position']) {
		$sdp = $smof_data['slider_dots_position'];
		if ($sdp == 'left') { $class_dpos = ' dots-left'; }
		if ($sdp == 'bottom') { $class_dpos = ' dots-bottom'; }
		if ($sdp == 'right') { $class_dpos = ' dots-right'; }
	}

	if($smof_data['layout']) {
		$layout = $smof_data['layout'];
		if ($layout == '1col-fixed') { $layout_sidebar = ''; }
		if ($layout == '2c-r-fixed') { $layout_sidebar = ' sidebar-right'; }
		if ($layout == '2c-l-fixed') { $layout_sidebar = ' sidebar-left'; }
	}

 ?>

<?php if ($fstS != 'none') { ?>
<div class="s-header">
	<?php if(!$smof_data['width_slider']) { echo '<div class="container">'; } ?>
	<?php if ($fstS == 'background') { echo '<img src='.$smof_data['bg_home'].' style="max-height: '.$mh.'px;" alt="">'; } else {
		if($smof_data['pingu_slider']) {
		echo '<div class="slider-home owl-carousel'.$class_dpos.'">';
		$slides = $smof_data['pingu_slider'];
		  foreach ($slides as $slide) {
		  	  echo '<div class="slider-one" style="background-image: url('.$slide['url'].'); max-height: '.$mh.'px;">
						<div class="container d-flex align-items-center'.$class_pos.'">
							<div class="slider-text">
								<span>'.$slide['title'].'</span>
								<p>'.$slide['description'].'</p>';
								if ($slide['link']) { echo '<a href="'.$slide['link'].'">Read more</a>'; }
							echo '</div>
						</div>
		  	  		</div>';
		  }
		echo '</div>';
		}
	}
	?>
	<?php if(!$smof_data['width_slider']) { echo '</div>'; } ?>
</div>
<?php } ?>

<section class="s-content-home">
	<div class="container">
		<div class="row<?php echo $layout_sidebar; ?>">

			<div class="col">
				<div class="page-content">

					<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</div>

			<?php if($smof_data['layout']) {
				if ( $layout == '2c-r-fixed' || $layout == '2c-l-fixed') { ?>
			<div class="col" <?php if($smof_data['sidebar_width']) { echo ' style="max-width:'.$smof_data['sidebar_width'].'%;"'; } ?>>
				<?php get_sidebar(); ?>
			</div>
			<?php } } ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>
