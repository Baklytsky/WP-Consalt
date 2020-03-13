<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<section class="footer">
    <div class="container">
        <div class="row footer-line">
            <div class="col-12 col-lg-6 pr-lg-5">
	            <?php dynamic_sidebar( 'footer-left-subscribe' ); ?>
            </div>
            <div class="col-12 col-lg-6">
                <ul class="row text-uppercase">
                    <li class="col-12 text-center col-sm-4 text-sm-left">
	                    <?php dynamic_sidebar( 'footer-right-navigation' ); ?>
                    </li>
                    <li class="col-12 text-center col-sm-4 text-sm-left">
	                    <?php dynamic_sidebar( 'footer-right-industry' ); ?>
                        <ul>
	                        <?php
	                        $args = array(
		                        'post_type' => 'Industry',
		                        'posts_per_page' => -1,
		                        'orderby' => 'date',
		                        'order' => 'ASC'
	                        );

	                        $query = new WP_Query( $args );

	                        if ( $query->have_posts() ) {
	                        while ( $query->have_posts() ) {
	                        $query->the_post(); ?>
                            <li>
                                <a href="<?= get_the_permalink()?>">
                                    <?= get_the_title()?>
                                </a>
                            </li>
	                        <?php }
	                        } else {
		                        echo 'Something is wrong';
	                        }
	                        wp_reset_postdata(); ?>
                        </ul>
                    </li>
                    <li class="col-12 text-center col-sm-4 text-sm-left">
		                <?php
		                $soc_icons = get_theme_mod( 'understrap_social_icons_settings' );
		                if ( $soc_icons['headline'] ) { ?>
                            <h2><?= $soc_icons['headline'] ?></h2>
		                <?php }
		                if ( ! empty( $soc_icons['links'] ) ) { ?>
                            <ul>
				                <?php $social_icons_order = array( 'facebook', 'twitter', 'instagram', 'linkedin' );
				                foreach ( $social_icons_order as $item ) {
					                if ( ! empty( $soc_icons['links'][ $item ] ) ) { ?>
                                        <li>
                                            <a href="<?=$soc_icons['links'][$item]?>">
	                                            <?= $item ?>
                                            </a>
                                        </li>
					                <?php }
				                } ?>
                            </ul>
		                <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
        <p class="pt-3">Copyright &copy; 2016 Consultplus theme.</p>
    </div>
</section>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

