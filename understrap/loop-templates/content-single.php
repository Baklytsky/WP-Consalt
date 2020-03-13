<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <section class="blog-section">
        <div class="img-title">
		    <?= get_the_post_thumbnail( $post->ID ) ?>
            <div class="post-title-wrapper">
                <p>
		            <?php
		            $d = 'j-M-Y';
		            $t = 'Y-m-d';
		            ?>
                    <time datetime="<?= get_the_date( $t ); ?>" class="post-date text-uppercase d-inline-block">
			            <?= get_the_date( $d, $post->ID ); ?>
                    </time>
                </p>
                <h3 class="post-title text-uppercase d-inline-block">
				    <?= get_the_title( $post->ID ) ?>
                </h3>
            </div>
        </div>
	<div class="entry-content py-5">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
    </section>
</article><!-- #post-## -->
