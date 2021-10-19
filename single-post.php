<?php

/**
 * The template for displaying all single posts and attachments
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
								<li class="breadcrumb-item active" aria-current="page">magazine</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section class="container-fluid section single-post-content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php $post_id = get_the_ID(); ?>
				<div class="row justify-content-center">
					<?php $sezione_1 = get_field('sezione_1') ?>
					<?php $pattern = "/<[^\/>]*>([\s]?)*<\/[^>]*>/"; ?>
					<div class="col-12 col-xxl-10">
						<div class="row inner-pad">
							<div class="col-12 col-lg-6 col-xl-5 align-self-center">
								<p class="single-post-date"><?php the_date('d/m/y') ?> <span class="line"></span></p>
								<div class="title-1">
									<?php the_title(); ?>
								</div>
								<p>
									<?= strip_tags(preg_replace($pattern, '', $sezione_1['testo']), '<h1><h2><h3><a><b><strong>'); ?>
								</p>
							</div>
							<div class="col-12 col-lg-6 offset-xl-1 with-element mt-4 mt-lg-0">
								<?php if ($sezione_1['immagine']) { ?>
									<img src="<?= $sezione_1['immagine']['sizes']['rta_thumb_center_center_1000x700'] ?>" class="img-fluid" alt="">
								<?php } else { ?>
									<img src="<?php the_post_thumbnail_url('rta_thumb_center_center_1000x700') ?>" class="img-fluid" alt="">
								<?php } ?>

							</div>
						</div>
					</div>
				</div>
				<div class="row  justify-content-center">
					<?php $sezione_2 = get_field('sezione_2'); ?>
					<div class="col-12 col-xxl-5 inner-pad">
						<?php $testo_1 = preg_replace($pattern, '', $sezione_2['testo_1']); ?>
						<?= $testo_1; ?>
					</div>
					<div class="col-12 bg-image lazyload" data-bg="<?= $sezione_2['immagine']['sizes']['rta_thumb_center_center_1920x800']; ?>">

					</div>
					<div class="col-12 col-xxl-5 inner-pad">
						<?php $testo_2 = preg_replace($pattern, '', $sezione_2['testo_2']); ?>
						<?= $testo_2; ?>
					</div>
				</div>
			<?php endwhile;
		else : ?>

			<div class="row justify-content-center">
				<div class="col-12 col-xxl-10">
					<div class="title-1">Oops! L'articolo non è stato trovato!</div>
				</div>
			</div>

		<?php endif; ?>
	</section>
	<section class="container-fluid section section-padding bg-light-blue-1">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="title-1 text-center">
					Leggi gli altri<br> articoli del magazine
				</div>
				<div class="row inner-mar-top justify-content-between">
					<?php

					$other_posts = get_posts([
						'numberposts' => 2,
						'order' => 'DESC',
						'orderby' => 'date',
						'exclude' => [$post_id]
					]);
					?>

					<?php foreach ($other_posts as $other_post) { ?>
						<div class="col-12 col-lg-5 other-post-item">
							<div class="img-container">
								<img src="<?= get_the_post_thumbnail_url($other_post, 'rta_thumb_center_center_800x600') ?>" class="img-fluid" alt="">
							</div>
							<div class="title-container">
								<div class="title-2"><?= get_the_title($other_post); ?></div>
								<p>
									<a class="btn btn-automarca" href="<?= get_permalink( $other_post ) ?>">Leggi tutto<span class="arrow"></span></a>
								</p>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>