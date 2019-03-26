<!doctype html>

<html <?php language_attributes(); ?> class="no-js">

	<head>

		<?php global $smof_data; ?>
		<meta charset="<?php bloginfo('charset'); ?>">
		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

		<?php get_template_part('lib/g-menu'); ?>

		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

	<!-- header -->
	<div class="site-header-wrap">
		<header id="masthead" class="site-header"<?php if(!$smof_data['sticky_header']) { echo ' style="position:static !important;"';} ?>>

			<?php if($smof_data['logo_select']) { $logo_pos = $smof_data['logo_select'];
				if ($logo_pos == 'left') { $header_pos = ''; } else { $header_pos = ' flex-row-reverse'; }
			} ?>

			<div class="container d-flex justify-content-between align-items-center<?php echo $header_pos; ?>">

				<div class="site-branding">
					<?php
					if($smof_data['logo']) { ?>
						<a href="<?php echo home_url(); ?>"><img src="<?php echo $smof_data['logo']; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php } else { ?>

					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif;  ?>

					<?php } ?>

				</div>

				<div class="menu-header d-flex align-items-center<?php echo $header_pos; ?>">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle">
							<span class="sr"></span>
							<span class="menu-bar bar1"></span>
							<span class="menu-bar bar2"></span>
							<span class="menu-bar bar3"></span>
						</button>
						<div class="menu-container"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?></div>
					</nav><!-- #site-navigation -->

					<?php
					if($smof_data['phone']) { $phone = $smof_data['phone']; }
					if($smof_data['switch_phone']) {
						echo '<a class="phone-header" href="tel:'.$phone.'"><i class="fa fa-phone"></i> '.$phone.'</a>';
					}
					?>

				</div>


			</div>
		</header><!-- #masthead -->
	</div>
	<!-- /header -->
