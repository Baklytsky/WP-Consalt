<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <section class="blog-item">
        <div class="img-title">
            <a href="<?= get_the_permalink( $post->ID ) ?>">
	            <?= get_the_post_thumbnail( $post->ID ) ?>
            </a>
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
                    <a href="<?= get_the_permalink( $post->ID ) ?>">
	                    <?= get_the_title( $post->ID ) ?>
                    </a>
                </h3>
            </div>
        </div>
        <div class="entry-content py-5">
	        <?php the_excerpt(); ?>
        </div><!-- .entry-content -->
        <div class="d-flex justify-content-between align-item-center pb-5">
            <button class="read-more-btn">
                <a href="<?= get_the_permalink( $post->ID ) ?>" class="text-uppercase">
	                <?= __('Read more', 'understrap'); ?>
                </a>
            </button>
            <div class="share-icons d-flex align-items-center">
		        <?php $url = urlencode( get_the_permalink() );
		        $title = htmlspecialchars( urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ); ?>
                <div class="social-links">
                    <ul class="d-flex align-items-center">
                        <li class="pr-2">
                            <a class="icon-facebook" target="_blank"
                               href="http://www.facebook.com/sharer.php?u=<?php echo $url; ?>"></a>
			                <?php
			                $facebook_like_share_count = function ( $url ) {
				                $fb_api   = file_get_contents( 'http://graph.facebook.com/?id=' . $url );
				                $fb_count = json_decode( $fb_api );

				                return $fb_count->shares;
			                };
			                ?>
                        </li>
                        <li class="pr-2">
                            <a class="icon-twitter-1" target="_blank"
                               href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?>"></a>
			                <?php
			                $twitter_tweet_count = function ( $url ) {
				                $tw_api   = file_get_contents( 'https://twitter.com/intent/tweet?url=' . $url );
				                $tw_count = json_decode( $tw_api );

				                return $tw_count->count;
			                };
			                ?>
                        </li>
                    </ul>
                </div>
                <button class="share-btn p-0">
                    <span class="icon-share-outline"></span>
                </button>
            </div>
        </div>
    </section>
</article><!-- #post-## -->
