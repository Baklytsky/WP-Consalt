<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<h class="site" id="page">
    <section class="container-fluid contact-line">
        <div class="container">
            <ul class="text-center d-md-flex justify-content-md-end align-items-center">
                <li class="vertical-line pr-md-3">
                    <span class="text-uppercase">Email :</span>
                    <a href="mailto:info@consultplus.com" class="mail-link">info@consultplus.com</a>
                </li>
                <li class="pb-1 pl-md-3">
                    <span class="text-uppercase">Phone :</span>
                    <a href="tel:+9156856664555" class="footer-text">+91 5685 6664 555</a>
                </li>
            </ul>
        </div>
    </section>

	<!-- ******************* The Navbar Area ******************* -->
    <header id="header" class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-dark indent">

					<!-- Your site title as branding in the menu -->
	            <?php if (is_front_page() && is_home()) : ?>
                    <h1>
			            <?php my_logo(); ?>
                    </h1>
	            <?php else : ?>
		            <?php my_logo(); ?>
	            <?php endif; ?>
                    <!-- end custom logo -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-three-bars icon-hamburger"></span>
                </button>

				<!-- The WordPress Menu goes here -->
	            <?php $args = array(
		            'theme_location'  => '',
		            'menu'            => '',
		            'container'       => 'div',
		            'container_class' => 'collapse navbar-collapse',
		            'container_id'    => 'navbarCollapse',
		            'menu_class'      => 'navbar-nav ml-auto text-center text-uppercase',
		            'menu_id'         => 'main-nav-menu',
		            'echo'            => true,
		            'fallback_cb'     => 'wp_page_menu',
		            'before'          => '',
		            'after'           => '',
		            'link_before'     => '',
		            'link_after'      => '',
		            'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
		            'depth'           => 0,
		            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
	            );
	            wp_nav_menu($args); ?>
	            <?php if ( 'container' == $container ) : ?>
	            <?php endif; ?>
		</nav><!-- .site-navigation -->
        </div>
    </header><!-- header end -->
