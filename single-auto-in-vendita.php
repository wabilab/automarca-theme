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
	<section class="container-fluid section section-padding-sm single-car-content">
		<?php $car_id = 0; ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php $car_id = get_the_ID(); ?>

				<div class="row justify-content-center">
					<div class="col-12 col-xxl-10">
						<div class="title-container">
							<div class="title-1">
								<?= get_field('marca') . ' ' . get_field('modello') ?>
							</div>
							<div class="title-6 subtitle"><?= get_field('descrizione') ?></div>
						</div>
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
										<?php if (get_field('foto_1', $car_id)) { ?>
										<?php } else { ?>
											<?php if (!has_post_thumbnail($car_id)) : ?>
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
														<td><?= date_format(date_create_from_format('Y-m-d H:i:s.u', get_field('data_immatricolazione', $car_id)->date), 'm/Y'); ?></td>
													</tr>
													<tr>
														<th>Chilometraggio</th>
														<td><?= number_format(intval(get_field('km', $car_id)), 0, ',', '.') . ' ' . 'km'; ?></td>
													</tr>
													<tr>
														<th>Sede</th>
														<td><?= ucfirst(get_field('sede', $car_id)); ?></td>
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
														<td><?= ucfirst(strtolower(get_field('colore', $car_id))); ?></td>
													</tr>
													<tr>
														<th>Numero posti</th>
														<td><?= get_field('numero_posti', $car_id); ?></td>
													</tr>
													<tr>
														<th>Numero porte</th>
														<td><?= get_field('numero_porte', $car_id); ?></td>
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
														<td><?= ucfirst(strtolower(get_field('alimentazione', $car_id))); ?></td>
													</tr>
													<tr>
														<th>Cambio</th>
														<td><?= get_field('cambio', $car_id); ?></td>
													</tr>
													<tr>
														<th>Cilindrata</th>
														<td><?= number_format(intval(get_field('cilindrata', $car_id)), 0, ',', '.'); ?></td>
													</tr>
													<tr>
														<th>CV</th>
														<td><?= get_field('cv', $car_id); ?></td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="share-links">
											<div class="title-6">
												condividi nei social
											</div>
											<ul class="nav single-car-share-links">
												<li class="nav-item social-item">
													<a class="nav-link social-share-links fb" target="_blank" rel="nofollow, external" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink()) ?>"><img src="<?= get_template_directory_uri(); ?>/assets/images/facebook.svg" class="social-icon" alt=""></a>
												</li>
												<li class="nav-item social-item">
													<a class="nav-link social-share-links wa" target="_blank" rel="nofollow, external" href="https://wa.me/?text=<?= urlencode(get_permalink()) ?>"><img src="<?= get_template_directory_uri(); ?>/assets/images/whatsapp.svg" class="social-icon" alt=""></a>
												</li>
												<li class="nav-item social-item">
													<a class="nav-link social-share-links in" target="_blank" rel="nofollow, external" href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode(get_permalink()) ?>"><img src="<?= get_template_directory_uri(); ?>/assets/images/linkedin.svg" class="social-icon" alt=""></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="row mt-5">
									<div class="col-12">
										<div class="title-6 with-border-bottom">
											Optional
										</div>
										<div class="row">
											<?php

											$optionals = get_field('lista_optionals');
											$optionals = str_replace('</li><li>', ',', $optionals);
											$optionals = str_replace('<li>', '', $optionals);
											$optionals = str_replace('</li>', '', $optionals);

											$optionalsArr = explode(',', $optionals);

											$size = ceil(count($optionalsArr) / 3);

											$new_optionals = array_chunk($optionalsArr, $size);

											foreach ($new_optionals as $optionals_list) {
												echo '<div class="col-12 col-lg-4"><ul class="list-unstyled optionals-list">';

												foreach ($optionals_list as $optional) {
													echo "<li class=\"optionals-item\">$optional</li>";
												}

												echo '</ul></div>';
											}
											?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-xl-3">
								<div class="price-info bg-light-blue-4">
									<div class="title-6">
										prezzo a te riservato
									</div>
									<div class="price-discounted">
										12.000 €
									</div>
									<div class="price">
										12.000 €
									</div>
								</div>
								<div class="form-info mt-3 bg-light-blue-4">
									<div class="info-title">
										<img src="https://via.placeholder.com/22" class="img-fluid top-title-img"> richiedi informazioni
									</div>
									<div class="info-content">
										<div class="title-6">
											richiedi informazioni sulla vettura
										</div>
										<form action="" class="automarca-form single-car-form" id="info-form">
											<input type="hidden" name="vehicle" value="<?= get_the_ID(); ?>">
											<div class="row">
												<div class="col-12 form-col">
													<input type="text" class="form-control" name="full_name" placeholder="Nome e cognome *" id="" required>
												</div>
												<div class="col-12 form-col">
													<input type="email" class="form-control" name="email" id="" placeholder="Email *" required>
												</div>
												<div class="col-12 form-col">
													<input type="tel" class="form-control" name="phone" id="" placeholder="Telefono *" required>
												</div>
												<div class="col-12 form-col">
													<textarea name="message" id="" class="form-control" rows="10" placeholder="Messaggio *" required></textarea>
												</div>
												<div class="col-12 mb-3">
													<div class="form-check big">
														<input class="form-check-input big" type="checkbox" id="test-drive">
														<label class="form-check-label big" for="test-drive">
															Richiedi test drive
														</label>
													</div>
												</div>
												<div class="col-12 mb-2">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="privacy" required>
														<label class="form-check-label" for="privacy">
															(Richiesto) Acconsento al trattamento dei dati personali - <a href="">Privacy policy</a>
														</label>
													</div>
												</div>
												<div class="col-12">
													<div class="d-grid gap-2">
														<button class="btn btn-automarca-sm no-arrow" type="submit">Invia richiesta</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="call-us-btn btn-container">
									<div class="d-grid gap-2">
										<a href="tel:+393519391880" class="btn btn-automarca-outline-sm">
											<img src="https://via.placeholder.com/15" class="img-fluid" alt="">chiamaci +39 351 939 1880
										</a>
									</div>
								</div>
								<div class="technical-sheet-btn btn-container">
									<div class="d-grid gap-2">
										<a href="#" class="btn btn-automarca-outline-sm">
											<img src="https://via.placeholder.com/15" class="img-fluid" alt="">scheda tecnica
										</a>
									</div>
								</div>
								<div class="others-btn btn-container row">
									<div class="col-12 col-xs-6 col-md-12 col-xxl-6">
										<a href="#" class="btn btn-automarca-outline-sm w-100">
											<img src="https://via.placeholder.com/15" class="img-fluid" alt="">finanziamento
										</a>
									</div>
									<div class="col-12 col-xs-6 col-md-12 col-xxl-6 mt-xl-3">
										<a href="#" class="btn btn-automarca-outline-sm w-100">
											<img src="https://via.placeholder.com/15" class="img-fluid" alt="">permuta
										</a>
									</div>
								</div>
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
	<section class="container-fluid section section-padding-sm with-border-top">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="title-1 text-center">
					Può interessarti anche
				</div>
				<div class="row inner-mar-top justify-content-between">
					<?php
					$min_price = intval(get_field('prezzo', $car_id)) - (intval(get_field('prezzo', $car_id)) * 0.2);
					$max_price = intval(get_field('prezzo', $car_id)) + (intval(get_field('prezzo', $car_id)) * 0.2);

					$other_cars = get_posts([
						'post_type' => 'auto-in-vendita',
						'numberposts' => 4,
						'exclude' => [$car_id],
						'meta_query'	=> array(
							'relation' => 'AND',
							array(
								'key' => 'marca',
								'value' => get_field('marca', $post),
								'compare' => 'LIKE'
							),
							array(
								'key'	 	=> 'km',
								'value'	  	=> get_field('km', $post),
								'compare' 	=> '<=',
								'type' => 'NUMERIC'
							),
							array(
								'key' => 'prezzo',
								'value' => [$min_price, $max_price],
								'compare' => 'BETWEEN',
								'type' => 'NUMERIC'
							),
						),
					]);


					?>

					<?php foreach ($other_cars as $other_car) {
						$other_car_id = $other_car->ID;
					?>
						<div class="col-12 col-md-6 col-xxl-3 car-item">
							<div class="title-container">
								<div class="title-5">
									<?= get_field('marca', $other_car_id) ?><br> <?= get_field('modello', $other_car_id) ?>
								</div>
								<p>
									<?= get_field('descrizione', $other_car_id) ?>
								</p>
							</div>
							<img src="https://via.placeholder.com/800x600" class="car-img" alt="">
							<div class="car-features">
								<table class="table car-features-table">
									<tbody>
										<tr>
											<?php
											$data_field = get_field('data_immatricolazione', $other_car_id);
											$data = date_format(date_create_from_format('Y-m-d H:i:s.u', $data_field->date), 'm/Y');

											?>
											<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-data.svg" class="feature-icon" alt=""><?= $data; ?></td>
											<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-km.svg" class="feature-icon" alt=""><?= number_format(intval(get_field('km', $other_car_id)), 0, ',', '.') . ' ' . 'km'; ?></td>
										</tr>
										<tr>
											<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-alimentazione.svg" class="feature-icon" alt=""><?= get_field('alimentazione', $other_car_id) ?></td>
											<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-cambio.svg" class="feature-icon" alt=""><?= get_field('cambio', $other_car_id) ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="car-price">
								<p class="price-content"><span><?= get_field('prezzo', get_the_ID()) ?></span><?= get_field('prezzo', get_the_ID()) ?></p>
								<p class="button-container"><a class="btn btn-automarca-car" href="<?= get_the_permalink() ?>"><span>Scopri <span class="arrow"></span></span></a></p>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>