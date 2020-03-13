<?php
/**
 * The template for displaying search forms
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="text-uppercase py-2 font-weight-bold" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>
	<div class="d-flex search-form">
		<input class="search-place" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search', 'understrap' ); ?>" value="<?php the_search_query(); ?>">
		<button type="submit" id="searchsubmit" class="search-btn" name="submit"></button>
	</div>
</form>
