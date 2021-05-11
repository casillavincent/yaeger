<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yaeger
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
		endif;
		?>

		<!-- Splash Section -->
		<article class="splash-container">
			<!-- Image Banner -->
			<section class="splash-container__banner">
				<?php if(function_exists( 'get_field' )) {
					$image = get_field('splash_banner');
					$size = 'full';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
				} ?>
			</section>

			<!-- Text Content -->
			<section class="text-content">
				<?php
					if(function_exists(	'get_field' )) : ?>
					<h1><?php the_field( 'splash_main_text' ); ?></h1> 
					<p><?php the_field( 'splash_text_overview' ); ?></p>
				<?php endif; ?>
			</section>
		</article>


		<article class="about-excerpt">
			<h2>photos that capture the beauty of human nature.</h2>
			<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat laborum totam voluptatum accusantium necessitatibus suscipit maxime.</p>
		</article>

		<!-- Category Content -->
		<article class="category-items">
			<?php
				if( function_exists( 'get_field' ) ) : 
					$rows = get_field( 'portfolio_categories' );
					if( $rows ) : 
						foreach( $rows as $row ) :
							$image = $row['image'];
							$title = $row['title'];
							$link = $row['link']; 
							?>
							<section class="category-item">
								<?php echo wp_get_attachment_image( $image, 'full' ); ?>
								<p> <?php echo $title; ?></p>
							</section>
						<?php endforeach;
					endif;
				endif;
			?>
		</article>

		<!-- CTA to Collection -->
		<div class="work-cta">
			<a href="<?php echo get_permalink( get_page_by_path( 'work' ) ); ?>" >
			view portfolio
			</a>
		</div>
		

		<!-- Basic Contact -->
		<article class="contact-home">
			<p>have questions? let's chat.</p>
			<form action="">
				<input type="text" name="email" id="email" class="email-field" placeholder="Email">
				<input type="submit" name="submit" id="submit" class="submit" value="Submit">
			</form>
		</article>
	</main><!-- #main -->

<?php
get_footer();
