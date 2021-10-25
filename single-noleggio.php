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
								<li class="breadcrumb-item">Noleggio </li>
								<li class="breadcrumb-item active" aria-current="page"><?= get_the_title(); ?></li>
							</ol>
						</nav>
					</div>
					<div class="col-12 col-sm-6 text-center text-sm-end">
						<img src="<?= get_template_directory_uri() ?>/assets/images/automarca-plus.svg" width="250" alt="">
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
								<?= strtoupper(get_field('marca')) . ' ' . get_field('modello') ?>
							</div>
							<div class="title-6 subtitle"><?= get_field('descrizione') ?></div>
						</div>
						<div class="row">
							<div class="col-12 col-xl-9">
								<div class="row">
									<div class="col-12 col-lg-8">
										<div class="car-img-slider">
											<img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'rta_thumb_center_center_1280x960') ?>" class="car-img img-fluid">
										</div>
									</div>
									<div class="col-12 col-lg-4">
										<div class="car-info">
											<div class="title-6">
												<img src="<?= get_template_directory_uri() ?>/assets/images/dettaglio-auto/carozzeria.svg" style="width: 23px; margin-top: -3px;"> carrozzeria e colori
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
												<img src="<?= get_template_directory_uri() ?>/assets/images/dettaglio-auto/motore-meccanica.svg" style="width: 23px; margin-top: -3px;"> motore e meccanica
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
														<td><?= number_format(intval(get_field('cilindrata', $car_id)), 0, ',', '.'); ?> cm<sup>3</sup></td>
													</tr>
													<tr>
														<th>CV</th>
														<td><?= get_field('cv', $car_id); ?> CV (<?= get_field('kw', $car_id); ?> kw)</td>
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

											$optionalsArr = explode('#', $optionals);
											array_pop($optionalsArr);

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
									<div class="price-item">
										<div class="title-6">
											Tariffa giornaliera
										</div>
										<div class="price">
											<?= number_format(floatval(get_field('tariffa', get_the_ID())), 2, ',', '.') ?> &euro;
										</div>
									</div>
									<hr>
									<div class="price-item">
										<div class="title-6">
											Costo al km eccedente
										</div>
										<div class="price">
											<?= number_format(floatval(get_field('costo_km_eccedente', get_the_ID())), 2, ',', '.') ?> &euro;
										</div>
									</div>
									<hr>
									<div class="price-item">
										<div class="title-6">
											Al giorno inc. furto e kasco
										</div>
										<div class="price">
											<?= number_format(floatval(get_field('giornaliero_coperture', get_the_ID())), 2, ',', '.') ?> &euro;
										</div>
									</div>
								</div>
								<div class="form-info mt-3 bg-light-blue-4">
									<div class="info-title">
										<img src="<?= get_template_directory_uri() ?>/assets/images/dettaglio-auto/richiedi-info-bianco.svg" style="width: 22px;" class="img-fluid top-title-img"> richiedi informazioni
									</div>
									<div class="info-content">
										<div class="title-6">
											richiedi informazioni sul noleggio
										</div>
										<form action="" class="automarca-form single-car-form" id="info-form">
											<?php
											$id_vehicle = explode(' ', get_the_title())[0];
											$type = get_field('field_6151b58a76a39', get_the_ID());
											$tipologia = '';
											if ($type == 'new') {
												$tipologia = 'Nuova';
											} else if ($type == 'zero') {
												$tipologia = 'KM0';
											} else {
												$tipologia = 'Usata';
											};
											?>
											<input type="hidden" name="id_vehicle" value="<?= $id_vehicle; ?>">
											<input type="hidden" name="this_page" value="<?= get_permalink(); ?>">
											<input type="hidden" name="brand" value="<?= get_field('field_60ffc3567d1c2', get_the_ID()); ?>">
											<input type="hidden" name="model" value="<?= get_field('field_60ffc3607d1c3', get_the_ID()); ?>">
											<input type="hidden" name="version" value="<?= get_field('field_60ffc36b7d1c4', get_the_ID()); ?>">
											<input type="hidden" name="fuel" value="<?= get_field('field_60ffc3ac7d1c7', get_the_ID()); ?>">
											<input type="hidden" name="kw" value="<?= get_field('field_614c57eb09afa', get_the_ID()); ?>">
											<input type="hidden" name="transmission" value="<?= get_field('field_60ffc4747d1ce', get_the_ID()); ?>">
											<input type="hidden" name="color" value="<?= get_field('field_60ffc3747d1c5', get_the_ID()); ?>">
											<div class="row">
												<div class="col-12 form-col">
													<input type="text" onfocus="(this.type='date')" min="<?= date('Y-m-d') ?>" class="form-control" id="day-from" name="day_from" placeholder="Giorno ritiro *" id="" required>
												</div>
												<div class="col-12 form-col">
													<input type="text" onfocus="(this.type='date')" min=" <?= date('Y-m-d') ?>" class="form-control" name="day_to" placeholder="Giorno consegna *" id="" required>
												</div>
												<div class="col-12 form-col">
													<input type="text" class="form-control" name="full_name" placeholder="Nome e cognome *" id="" required>
												</div>
												<div class="col-12 form-col">
													<input type="email" class="form-control" name="email" id="" placeholder="Email *" required>
												</div>
												<div class="col-12 form-col">
													<input type="tel" class="form-control" name="tel_num" id="" placeholder="Telefono *" required>
												</div>
												<div class="col-12 form-col">
													<textarea name="message" id="" class="form-control" rows="10" placeholder="Messaggio *" required></textarea>
												</div>
												<!-- <div class="col-12 mb-3">
													<div class="form-check big">
														<input class="form-check-input big" name="test_drive" type="checkbox" id="test-drive">
														<label class="form-check-label big" for="test-drive">
															Richiedi test drive
														</label>
													</div>
												</div> -->
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
											<img src="<?= get_template_directory_uri() ?>/assets/images/dettaglio-auto/chiamaci.svg" style="width: 15px;" class="img-fluid"> chiamaci +39 351 939 1880
										</a>
									</div>
								</div>
								<div class="technical-sheet-btn btn-container">
									<div class="d-grid gap-2">
										<a href="#" class="btn btn-automarca-outline-sm">
											<img src="<?= get_template_directory_uri() ?>/assets/images/dettaglio-auto/scheda-tecnica.svg" style="width: 15px;" class="img-fluid"> scheda tecnica
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
					<div class="title-1">Oops! L'auto da te cercata non è stata trovata!</div>
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

					$other_cars = get_posts([
						'post_type' => 'noleggio',
						'numberposts' => 4,
						'exclude' => [$car_id],
						'meta_query'	=> array(
							'relation' => 'AND',
							array(
								'key' => 'marca',
								'value' => get_field('marca', $post),
								'compare' => 'LIKE'
							)
						),
					]);


					?>

					<?php

					if (count($other_cars) != 0) {
						foreach ($other_cars as $other_car) {
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
								<img src="<?= get_field('foto_1', $other_car_id) ?>" class="car-img" alt="">
								<div class="car-features">
									<table class="table car-features-table">
										<tbody>
											<tr>
												<?php
												$data_field = get_field('data_immatricolazione', $other_car_id);
												$data = date_format(date_create_from_format('Y-m-d', $data_field), 'm/Y');

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
									<p class="price-content"><?= number_format(floatval(get_field('prezzo', $other_car_id)), 0, ',', '.') ?></p>
									<p class="button-container"><a class="btn btn-automarca-car" href="<?= get_the_permalink($other_car_id) ?>"><span>Scopri <span class="arrow"></span></span></a></p>
								</div>
							</div>
						<?php }
					} else { ?>
						<div class="col-12 text-center">
							<div class="title-3">Ops! Non ci sono auto da visualizzare.</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>