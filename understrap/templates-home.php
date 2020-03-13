<?php
/**
 * Template name: Home
 */
?>
<?php get_header(); ?>

<section>
	<div id="carouselControls" class="container-fluid carousel slide indent justify-content-center" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="container-fluid slider">
					<div class="container">
						<div class="directions">
							<h3 class="pt-2 px-3"><?= get_field('slider_title_first')?></h3>
							<h2 class="text-uppercase pb-2 px-3"><?= get_field('slider_title_second')?></h2>
							<ul class="row indent">
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
								<li class="py-2 py-md-3 col-6 flex-column">
									<a href="<?= get_the_permalink()?>">
										<span class="<?= get_field('icon')?> d-block industry-icon"></span>
										<div class="d-flex justify-content-between align-items-center py-xl-2">
											<h3 class="text-uppercase"><?= get_the_title()?></h3>
											<span class="icon-right-open-big arrow-icon"></span>
										</div>
									</a>
								</li>
								<?php }
								} else {
									echo 'Something is wrong';
								}
								wp_reset_postdata(); ?>
								<li class="col-6 d-flex justify-content-center align-items-center">
									<a href="<?= get_the_permalink(13)?>" class="text-uppercase view-btn"><?= __('view More', 'understrap'); ?></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="container-fluid slider">
					<div class="container">
						<div class="directions">
                            <h3 class="pt-2 px-3"><?= get_field('slider_title_first')?></h3>
                            <h2 class="text-uppercase pb-2 px-3"><?= get_field('slider_title_second')?></h2>
                            <ul class="row indent">
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
                                        <li class="py-2 py-md-3 col-6 flex-column">
                                            <a href="<?= get_the_permalink()?>">
                                                <span class="<?= get_field('icon')?> d-block industry-icon"></span>
                                                <div class="d-flex justify-content-between align-items-center py-xl-2">
                                                    <h3 class="text-uppercase"><?= get_the_title()?></h3>
                                                    <span class="icon-right-open-big arrow-icon"></span>
                                                </div>
                                            </a>
                                        </li>
									<?php }
								} else {
									echo 'Something is wrong';
								}
								wp_reset_postdata(); ?>
                                <li class="col-6 d-flex justify-content-center align-items-center">
                                    <a href="<?= get_the_permalink(13)?>" class="text-uppercase view-btn"><?= __('view More', 'understrap'); ?></a>
                                </li>
                            </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev control-type" href="#carouselControls" role="button" data-slide="prev">
			<span class="icon-left-open-big" aria-hidden="true"></span>
		</a>
		<a class="carousel-control-next control-type" href="#carouselControls" role="button" data-slide="next">
			<span class="icon-right-open-big" aria-hidden="true"></span>
		</a>
	</div>
</section>
<section class="about-us container">
	<div class="row indent">
		<div class="col-12 col-md-7 text-right pb-5 pb-md-0 pr-md-3 pr-lg-5">
			<h3 class="text-uppercase"><?= get_field('home_about_title_first')?></h3>
			<h2 class="text-uppercase"><?= get_field('home_about_title_second')?></h2>
			<p class="py-2 py-lg-4">
				<?= get_field('home_about_text')?>
			</p>
			<a href="<?= get_the_permalink(11)?>" class="text-uppercase read-btn"><?= __('Read More', 'understrap'); ?></a>
		</div>
		<div class="col-12 text-center d-flex justify-content-center col-md-5 text-md-left indent">
			<div class="picture-block">
				<?php
				$image = get_field('home_about_image_first');
				if( !empty($image) ): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="meeting card-img img-fluid" />
				<?php endif; ?>
				<?php
				$image = get_field('home_about_image_second');
				if( !empty($image) ): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="excellence" />
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<section class="our-steps">
    <div class="container">
        <h3 class="text-uppercase"><?= get_field( 'home_step_title_first' ) ?></h3>
        <h2 class="text-uppercase pb-4"><?= get_field( 'home_step_title_second' ) ?></h2>
		<?php if ( have_rows( 'steps_repeater' ) ): ?>
            <ul class="row indent d-flex justify-content-between align-items-center text-center text-md-left">
				<?php while ( have_rows( 'steps_repeater' ) ): the_row();
					$image  = get_sub_field( 'step_image' );
					$number = get_sub_field( 'step_number' );
					$title  = get_sub_field( 'step_title' );
					$text   = get_sub_field( 'step_text' );
					?>
                    <li class="col-12 col-md-3 flex-column indent">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>"
                             class="pb-4 steps-img"/>
                        <span class="steps-number pb-2 d-block"><?php echo $number; ?></span>
                        <h4 class="pb-3 text-uppercase"><?php echo $title; ?></h4>
                        <p><?php echo $text; ?></p>
                    </li>
				<?php endwhile; ?>
            </ul>
		<?php endif; ?>
    </div>
</section>
<section class="projects">
	<div class="container">
		<h3 class="text-uppercase"><?= get_field( 'featured_projects_title_first' ) ?></h3>
		<h2 class="text-uppercase pb-4"><?= get_field( 'featured_projects_title_second' ) ?></h2>
		<div class="row">
			<ul class="col-12 col-lg-6 indent p-3">
				<li class="project-block">
					<?php
					$image = get_field('first_project_img');
					if( !empty($image) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="card-img img-fluid" />
					<?php endif; ?>
					<a href="<?= get_field( 'first_project_industry_button_link') ?>" class="text-uppercase projects-btn">
						<?= get_field( 'first_project_industry_button') ?>
                    </a>
					<span class="icon-forward forward"></span>
					<div class="forward-layer">
						<div class="text-center title-block">
							<h4 class="pb-3 text-uppercase">
                                <a href="<?= get_field( 'first_project_link') ?>">
                                    <?= get_field( 'first_project_project_title') ?>
                                </a>
                            </h4>
							<p><?= get_field( 'first_project_text') ?></p>
						</div>
					</div>
				</li>
			</ul>
			<div class="col-12 col-lg-6 d-flex justify-content-between">
				<?php if ( have_rows( 'projects_repeater' ) ): ?>
				<ul class="row">
					<?php while ( have_rows( 'projects_repeater' ) ): the_row();
					$image  = get_sub_field( 'project_image' );
					$btn = get_sub_field( 'industry_button' );
					$btn_link = get_sub_field( 'industry_button_link' );
					$project_link = get_sub_field( 'project_link' );
					$title  = get_sub_field( 'project_title' );
					$text   = get_sub_field( 'project_text' );
					?>
					<li class="col-12 col-md-6 indent p-3">
						<div class="project-block">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="card-img img-fluid" />
							<a href="<?php echo $btn_link; ?>" class="text-uppercase projects-btn"><?php echo $btn; ?></a>
							<span class="icon-forward forward"></span>
							<div class="forward-layer">
								<div class="text-center title-block">
									<h4 class="pb-3 text-uppercase">
                                        <a href="<?php echo $project_link; ?>">
                                            <?php echo $title; ?>
                                        </a>
                                    </h4>
									<p><?php echo $text; ?></p>
								</div>
							</div>
						</div>
					</li>
					<?php endwhile; ?>
					<li class="col-12 indent p-3">
						<div class="project-block">
							<?php
							$image = get_field('fourth_project_image');
							if( !empty($image) ): ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="card-img img-fluid" />
							<?php endif; ?>
                            <a href="<?= get_field( 'fourth_project_industry_button_link') ?>" class="text-uppercase projects-btn">
								<?= get_field( 'fourth_project_industry_button') ?>
                            </a>
                            <span class="icon-forward forward"></span>
                            <div class="forward-layer">
                                <div class="text-center title-block">
                                    <h4 class="pb-3 text-uppercase">
                                        <a href="<?= get_field( 'fourth_project_link') ?>">
                                            <?= get_field( 'fourth_project_title') ?>
                                        </a>
                                    </h4>
                                    <p><?= get_field( 'fourth_project_text') ?></p>
                                </div>
                            </div>
						</div>
					</li>
				</ul>
				<?php endif; ?>
			</div>
			<a href="#" class="text-uppercase mx-auto full-projects-btn">
                <?= __('Full Projects', 'understrap'); ?>
            </a>
		</div>
	</div>
</section>
<section class="happy-clients">
	<div class="container">
		<h3 class="text-uppercase"><?= get_field( 'clients_title_first') ?></h3>
		<h2 class="text-uppercase pb-4"><?= get_field( 'clients_title_second') ?></h2>
		<?php if ( have_rows( 'comment_repeater' ) ): ?>
            <ul>
			<?php while ( have_rows( 'comment_repeater' ) ): the_row();
			$message   = get_sub_field( 'client_message' );
			?>
			<li class="clients-comment">
				<div class="d-flex justify-content-between align-items-center">
					<p class="p-2 py-sm-5 message-text d-flex justify-content-between align-items-center">
						<?php echo $message; ?>
					</p>
				</div>
			</li>
			<?php endwhile; ?>
		</ul>
        <?php endif; ?>
		<?php if ( have_rows( 'comment_repeater' ) ): ?>
		<ul class="d-lg-flex justify-content-between align-items-center">
			<?php while ( have_rows( 'comment_repeater' ) ): the_row();
			$image  = get_sub_field( 'client_photo' );
			$client_name  = get_sub_field( 'client_name' );
			$client_designation = get_sub_field( 'client_designation' );
			?>
			<li>
				<ul class="d-md-flex justify-content-between align-items-center">
					<li class="d-flex justify-content-center align-items-center my-3 pr-md-5 mr-md-5">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="item-clients" />
						<div class="pl-4">
							<h4 class="text-uppercase">
	                                <?php echo $client_name; ?>
                            </h4>
							<p>
                                <?php echo $client_designation; ?>
                            </p>
						</div>
					</li>
				</ul>
			</li>
			<?php endwhile; ?>
			<li class="text-center my-3">
				<span class="icon-circle-o indicators"></span>
				<span class="icon-circle-o indicators"></span>
				<span class="icon-circle-o indicators"></span>
			</li>
		</ul>
		<?php endif; ?>
	</div>
</section>
<section class="our-blog">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 blog-tabs">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pt-3">
                        <h3 class="text-uppercase"><?= get_field( 'blog_title_first') ?></h3>
                        <h2 class="text-uppercase pb-4"><?= get_field( 'blog_title_second') ?></h2>
                    </div>
                    <ul class="d-flex">
                        <li class="pr-3">
                            <button class="top-posts-btn active"><?= __( 'Top posts', 'understrap' ); ?></button>
                        </li>
                        <li>
                            <button class="all-posts-btn"><?= __( 'Check all post', 'understrap' ); ?></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="row">
            <li class="col-12 col-md-6">
                <ul class="top-posts">
					<?php
					$args  = array(
						'post_type'      => 'Post',
						'posts_per_page' => 3,
						'orderby'        => 'date',
						'order'          => 'ASC'
					);
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post(); ?>
                            <li class="py-2">
								<?php
								$d = 'F j, Y';
								$t = 'Y-m-d';
								?>
                                <time datetime="<?= get_the_date( $t ) ?>"><?= get_the_date( $d ) ?></time>
                                <h4 class="text-uppercase">
                                    <a href="<?= get_the_permalink() ?>">
										<?= get_the_title() ?>
                                    </a>
                                </h4>
                                <p class="pr-md-5">
									<?= get_the_excerpt() ?>
                                </p>
                            </li>
						<?php }
					} else {
						echo 'Something is wrong';
					}
					wp_reset_postdata(); ?>
                </ul>
            </li>
            <li class="col-12">
                <ul class="all-posts">
					<?php
					$args  = array(
						'post_type'      => 'Post',
						'posts_per_page' => - 1,
						'orderby'        => 'date',
						'order'          => 'ASC'
					);
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post(); ?>
                            <li class="py-2">
								<?php
								$d = 'F j, Y';
								$t = 'Y-m-d';
								?>
                                <time datetime="<?= get_the_date( $t ) ?>"><?= get_the_date( $d ) ?></time>
                                <h4 class="text-uppercase">
                                    <a href="<?= get_the_permalink() ?>">
										<?= get_the_title() ?>
                                    </a>
                                </h4>
                                <p class="pr-md-5">
									<?= get_the_excerpt() ?>
                                </p>
                            </li>
						<?php }
					} else {
						echo 'Something is wrong';
					}
					wp_reset_postdata(); ?>
                </ul>
            </li>
        </ul>

    </div>
	<?php
	$image = get_field( 'our_blog_image' );
	if ( ! empty( $image ) ): ?>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="blog-img"/>
	<?php endif; ?>
</section>
<section class="contact-us">
	<div class="container">
		<h3 class="text-uppercase">for Consulting</h3>
		<h2 class="text-uppercase pb-4">Contact us</h2>
		<address>
			<?php if ( have_rows( 'contact_us_repeater' ) ): ?>
			<ul class="row d-flex justify-content-between align-items-center">
				<?php while ( have_rows( 'contact_us_repeater' ) ): the_row();
				$image  = get_sub_field( 'contact_image' );
				$block_name = get_sub_field( 'contact_block_name' );
				$email = get_sub_field( 'contact_email' );
				$phone = get_sub_field( 'contact_phone' );
				?>
                    <li class="py-3 col-12 col-md-4">
                        <div class="contact-block d-flex justify-content-center align-items-center">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>"
                                 class="pr-2 pr-lg-5"/>
							<?php if ( ! empty( $email ) ) { ?>
                                <div>
                                    <p class="text-uppercase pb-2">
                                        <?php echo $block_name; ?>
                                    </p>
                                    <a href="mailto:<?php echo $email; ?>">
                                        <?php echo $email; ?>
                                    </a>
                                </div>
							<?php }
							if ( ! empty( $phone ) ) { ?>
                                <div>
                                    <p class="text-uppercase pb-2">
                                        <?php echo $block_name; ?>
                                    </p>
                                    <a href="tel:<?php echo $phone; ?>">
                                        + <?php echo $phone; ?>
                                    </a>
                                </div>
							<?php } ?>
                        </div>
                    </li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>
		</address>
	</div>
</section>

<?php get_footer(); ?>


