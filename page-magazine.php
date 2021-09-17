<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

<main class="page-wrapper">
	<header class="container-fluid section section-padding header-page">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row align-items-center">
					<div class="col-12 col-sm-6 text-center text-sm-start">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center justify-content-sm-start mb-3 mb-sm-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item active" aria-current="page"><?php the_title() ?></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section class="container-fluid section">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<?php
				$magazine_posts = get_posts([
					'numberposts' => 3,
					'orderby' => 'date',
					'order' => 'DESC'
				]);

				foreach ($magazine_posts as $idx => $post) {

					if ($idx % 2 == 0) {
				?>
						<div class="row inner-pad">
							<div class="col-12 col-lg-6 col-xl-5 align-self-center">
								<p class="post-date"><?= get_the_date('d/m/y', $post) ?></p>
								<div class="title-1">
									<?= $post->post_title ?>
								</div>
								<p>
									<?= substr(strip_tags(get_field('sezione_1', $post->ID)['testo']), 0, 500); ?>
								</p>
								<p>
									<a class="btn btn-automarca-sm" href="<?= get_permalink($post) ?>"><span>Leggi tutto<span class="arrow"></span></span></a>
								</p>
							</div>
							<div class="col-12 col-lg-6 offset-xl-1 with-element mt-4 mt-lg-0">
								<img src="https://via.placeholder.com/1000x700" class="img-fluid" alt="">
							</div>
						</div>

					<?php
					} else { ?>

						<div class="row inner-pad">
							<div class="col-12 col-lg-6 with-element order-2 order-lg-1 mt-4 mt-lg-0">
								<img src="https://via.placeholder.com/1000x700" class="img-fluid" alt="">
							</div>
							<div class="col-12 col-lg-6 col-xl-5 offset-xl-1 align-self-center order-1 order-lg-2">
								<p class="post-date"><?= get_the_date('d/m/y', $post) ?></p>
								<div class="title-1">
									<?= $post->post_title ?>
								</div>
								<p>
									<?= substr(strip_tags(get_field('sezione_1', $post->ID)['testo']), 0, 500); ?>
								</p>
								<p>
									<a class="btn btn-automarca-sm" href="<?= get_permalink($post) ?>"><span>Leggi tutto<span class="arrow"></span></span></a>
								</p>
							</div>
						</div>

				<?php
					}
				} ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>