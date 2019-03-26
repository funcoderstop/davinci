<?php global $smof_data; 

		if($smof_data['position_text_footer']) {
			$posText2 = $smof_data['position_text_footer'];
			if ($posText2 == 'left') { $posText = 'left'; }
			if ($posText2 == 'center') { $posText = 'center'; }
			if ($posText2 == 'right') { $posText = 'right'; }
		}

		if($smof_data['position_social_footer']) {
			$posSocial2 = $smof_data['position_social_footer'];
			if ($posSocial2 == 'left') { $posSocial = 'left'; }
			if ($posSocial2 == 'center') { $posSocial = 'center'; }
			if ($posSocial2 == 'right') { $posSocial = 'right'; }
		}

		if ($posText == 'left' && $posSocial == 'left') { $class_pos = ' justify-content-start'; }
		if ($posText == 'right' && $posSocial == 'right') { $class_pos = ' justify-content-end'; }
		if ($posText == 'center' && $posSocial == 'center') { $class_pos = ' flex-column-reverse'; }
		if ($posText == 'left' && $posSocial == 'right') { $class_pos = ' justify-content-between'; }
		if ($posText == 'right' && $posSocial == 'left') { $class_pos = ' justify-content-between flex-row-reverse'; }
		if ($posText == 'center' && $posSocial != 'center') { $class_pos = ' flex-column-reverse'; }
		if ($posText != 'center' && $posSocial == 'center') { $class_pos = ' flex-column-reverse'; }

		?>

		<footer class="footer" role="contentinfo">

			<div class="footer-widget">
				<div class="container">
					<div class="footer-columns row">
						<?php dynamic_sidebar('footer-area' ); ?>
					</div>
				</div>
			</div>

			<div class="footer-bot">
				<div class="container d-flex align-items-center<?php echo $class_pos; ?>">

					<?php if($smof_data['footer_text']) { ?>
						<p><?php echo $smof_data['footer_text']; ?></p>
					<?php } ?>

					<ul class="socil">
						<?php if($smof_data['link_facebook']) { ?><li><a href="<?php echo $smof_data['link_facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
						<?php if($smof_data['link_instagram']) { ?><li><a href="<?php echo $smof_data['link_instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php } ?>
						<?php if($smof_data['link_twitter']) { ?><li><a href="<?php echo $smof_data['link_twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
						<?php if($smof_data['link_linkedIn']) { ?><li><a href="<?php echo $smof_data['link_linkedIn']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php } ?>
						<?php if($smof_data['link_dribbble']) { ?><li><a href="<?php echo $smof_data['link_dribbble']; ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li><?php } ?>
						<?php if($smof_data['link_skype']) { ?><li><a href="skype:<?php echo $smof_data['link_skype']; ?>" target="_blank"><i class="fa fa-skype"></i></a></li><?php } ?>
						<?php if($smof_data['link_flickr']) { ?><li><a href="<?php echo $smof_data['link_flickr']; ?>" target="_blank"><i class="fa fa-flickr"></i></a></li><?php } ?>
						<?php if($smof_data['link_youTube']) { ?><li><a href="<?php echo $smof_data['link_youTube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li><?php } ?>
						<?php if($smof_data['link_vimeo']) { ?><li><a href="<?php echo $smof_data['link_vimeo']; ?>" target="_blank"><i class="fa fa-vimeo"></i></a></li><?php } ?>
						<?php if($smof_data['link_rss']) { ?><li><a href="<?php echo $smof_data['link_rss']; ?>" target="_blank"><i class="fa fa-rss"></i></a></li><?php } ?>
						<?php if($smof_data['link_vk']) { ?><li><a href="<?php echo $smof_data['link_vk']; ?>" target="_blank"><i class="fa fa-vk"></i></a></li><?php } ?>
						<?php if($smof_data['link_pinterest']) { ?><li><a href="<?php echo $smof_data['link_pinterest']; ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li><?php } ?>
						<?php if($smof_data['link_yelp']) { ?><li><a href="<?php echo $smof_data['link_yelp']; ?>" target="_blank"><i class="fa fa-yelp"></i></a></li><?php } ?>
						<?php if($smof_data['link_email']) { ?><li><a href="mailto:<?php echo $smof_data['link_email']; ?>" target="_blank"><i class="fa fa-envelope"></i></a></li><?php } ?>
						<?php if($smof_data['link_github']) { ?><li><a href="<?php echo $smof_data['link_github']; ?>" target="_blank"><i class="fa fa-github-alt"></i></a></li><?php } ?>
						<?php if($smof_data['link_tumblr']) { ?><li><a href="<?php echo $smof_data['link_tumblr']; ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li><?php } ?>
						<?php if($smof_data['link_soundcloud']) { ?><li><a href="<?php echo $smof_data['link_soundcloud']; ?>" target="_blank"><i class="fa fa-soundcloud"></i></a></li><?php } ?>
						<?php if($smof_data['link_tripadvisor']) { ?><li><a href="<?php echo $smof_data['link_tripadvisor']; ?>" target="_blank"><i class="fa fa-tripadvisor"></i></a></li><?php } ?>
					</ul>

				</div>
			</div>

		</footer>

		<?php wp_footer(); ?>

		<!-- analytics -->
		<?php if($smof_data['google_analytics']) { ?>
		<script>
		<?php echo $smof_data['google_analytics']; ?>
		</script>
		<?php } ?>

	</body>
</html>
