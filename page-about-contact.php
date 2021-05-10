<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yaeger
 */

get_header();
?>

	<main id="primary" class="site-main about-me">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->


		<article class="about-me-container">
			
			<!-- Image -->
			<?php 
				$image = get_field( 'about_image' );
				$size = 'full';
				if( function_exists( 'get_field' ) ) : 
					if( $image ) : 
						echo wp_get_attachment_image( $image, $size);
					endif;
				endif;
			?>

			<!-- Text Content -->
			<section class="about-me-content">
				<?php 
					if( function_exists( 'get_field' ) ) : 
						$tagline = get_field( 'about_tagline' );
						$about_me = get_field( 'about_me' ); ?>
						<h2><?php  echo $tagline; ?></h2>
						<p><?php  echo $about_me; ?></p>
					<?php endif; ?>
			</section>
		</article>

		<article class="about-contact-form">
				<!-- Form Container -->
				<div class="form">
					<h3>lets chat.</h3>
					<?php
						echo do_shortcode( '[wpforms id="147"]' );
					?>
				</div>

				<!-- Image -->
				<?php 
				if( function_exists( 'get_field' ) ) : 
					$image = get_field( 'about_banner' );
					$size = 'full';
					if ( $image ) : 
						echo wp_get_attachment_image( $image, $size );
					endif;
				endif;
				?>
		</article>
	</main><!-- #main -->

<?php
get_footer();
