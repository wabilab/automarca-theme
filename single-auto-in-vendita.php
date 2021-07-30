<?php

/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

<main class="page-wrapper">
	<header class="container-fluid section bg-orange section-padding header-page">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row align-items-center">
					<div class="col-12 col-sm-6 text-center text-sm-start">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center justify-content-sm-start mb-3 mb-sm-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item active" aria-current="page">Auto</li>
							</ol>
						</nav>
					</div>
					<div class="col-12 col-sm-6 text-center text-sm-end">
						<img src="https://via.placeholder.com/250x40" width="250" alt="">
					</div>
				</div>
			</div>
		</div>
	</header>
	<section class="container-fluid section single-car-content">
		<?php $post_id = 0; ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php $post_id = get_the_ID(); ?>

				<div class="row justify-content-center">
					<div class="col-12 col-xxl-10">
						<div class="title-1">
							<?= get_field('marca') . ' ' . get_field('modello') ?>
						</div>
						<div class="title-6 subtitle"><?= get_field('descrizione') ?></div>
						<div class="row">
							<div class="col-12 col-xl-9">
								<div class="row">
									<div class="col-12 col-lg-8">
										<div class="car-img-slider">
											<img src="https://via.placeholder.com/1000x800" class="img-fluid">
											<img src="https://via.placeholder.com/1000x800" class="img-fluid">
											<img src="https://via.placeholder.com/1000x800" class="img-fluid">
											<img src="https://via.placeholder.com/1000x800" class="img-fluid">
											<img src="https://via.placeholder.com/1000x800" class="img-fluid">
											<img src="https://via.placeholder.com/1000x800" class="img-fluid">
										</div>
										<div class="car-thumb-slider">
											<img src="https://via.placeholder.com/200x100" class="img-fluid">
											<img src="https://via.placeholder.com/200x100" class="img-fluid">
											<img src="https://via.placeholder.com/200x100" class="img-fluid">
											<img src="https://via.placeholder.com/200x100" class="img-fluid">
											<img src="https://via.placeholder.com/200x100" class="img-fluid">
											<img src="https://via.placeholder.com/200x100" class="img-fluid">
										</div>
										<?php if (get_field('foto_1', $post_id)) { ?>
										<?php } else { ?>
											<?php if (!has_post_thumbnail($post_id)) : ?>
												<!-- <img src="https://via.placeholder.com/1000x800" class="img-fluid"> -->
											<?php else : ?>
												<!-- <img src="<?= get_the_post_thumbnail_url('large') ?>" class="img-fluid"> -->
											<?php endif; ?>
										<?php } ?>
									</div>
									<div class="col-12 col-lg-4">
										<div class="car-info">
											<div class="title-6">
												<img src="https://via.placeholder.com/23" style="margin-top: -3px;"> informazioni vettura
											</div>
											<table class="table">
												<tbody>
													<tr>
														<th>Immatricolazione</th>
														<td><?= date_format(date_create_from_format('Y-m-d H:i:s.u', get_field('data_immatricolazione', $post_id)->date), 'm/Y'); ?></td>
													</tr>
													<tr>
														<th>Chilometraggio</th>
														<td><?= number_format(intval(get_field('km', $post_id)), 0, ',', '.') . ' ' . 'km'; ?></td>
													</tr>
													<tr>
														<th>Sede</th>
														<td><?= get_field('sede', $post_id); ?></td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="car-info">
											<div class="title-6">
												<img src="https://via.placeholder.com/23" style="margin-top: -3px;"> carrozzeria e colori
											</div>
											<table class="table">
												<tbody>
													<tr>
														<th>Colore</th>
														<td><?= strtolower(get_field('colore', $post_id)); ?></td>
													</tr>
													<tr>
														<th>Numero posti</th>
														<td><?= get_field('numero_posti', $post_id); ?></td>
													</tr>
													<tr>
														<th>Numero porte</th>
														<td><?= get_field('numero_porte', $post_id); ?></td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="car-info">
											<div class="title-6">
												<img src="https://via.placeholder.com/23" style="margin-top: -3px;"> motore e meccanica
											</div>
											<table class="table">
												<tbody>
													<tr>
														<th>Alimentazione</th>
														<td><?= strtolower(get_field('alimentazione', $post_id)); ?></td>
													</tr>
													<tr>
														<th>Cambio</th>
														<td><?= get_field('cambio', $post_id); ?></td>
													</tr>
													<tr>
														<th>Cilindrata</th>
														<td><?= number_format(intval(get_field('cilindrata', $post_id)), 0, ',', '.'); ?></td>
													</tr>
													<tr>
														<th>CV</th>
														<td><?= get_field('cv', $post_id); ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-xl-3">

							</div>
						</div>
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
	<!-- <section class="container-fluid section section-padding bg-light-blue-1">
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
									<a class="btn btn-automarca" href="<?= get_permalink($other_post) ?>">Leggi tutto<span class="arrow"></span></a>
								</p>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section> -->
</main>

<?php get_footer(); ?>