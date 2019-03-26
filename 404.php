<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="not-page">
			<div class="container">
				<!-- article -->
				<article id="post-404">
					<img src='<?php echo get_template_directory_uri(); ?>/img/opps.png'/>

					<h1><?php _e( 'Oops...', 'davinci' ); ?></h1>
					<h2>Looks like you are lost.</h2>

						<a class="bk" href="<?php echo home_url(); ?>"> &#8592;	 <?php _e( 'Back Home', 'davinci' ); ?></a>


				</article>
				<!-- /article -->
			</div>
		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
