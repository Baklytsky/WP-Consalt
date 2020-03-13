<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper pt-0" id="single-wrapper">
	<section class="pages-bg">
		<div class="container">
			<h2 class="page-title text-uppercase"><?= __( 'Blog Post', 'understrap' ); ?></h2>
		</div>
	</section>
	<section class="blog-title">
		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<div class="row">

				<!-- Do the left sidebar check -->
				<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

				<main class="site-main" id="main">
					<div class="col-12 indent">
						<h3 class="text-uppercase pt-2"><?= __( 'Our', 'understrap' ); ?></h3>
						<h2 class="text-uppercase pb-2"><?= __( 'Blog Post', 'understrap' ); ?></h2>
					</div>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'single' ); ?>

						<?php understrap_post_nav(); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

				<!-- Do the right sidebar check -->
				<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

			</div><!-- .row -->

		</div><!-- #content -->
	</section>
</div><!-- #single-wrapper -->

<?php get_footer(); ?>
