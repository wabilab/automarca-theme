<?php

/**
 * Archivio Tipologia
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
								<li class="breadcrumb-item active" aria-current="page"><?php the_title() ?></li>
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
	<section class="container-fluid section section-padding-sm cars-search-grid-container">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row">
					<div class="col-12 col-lg-4">
						<div class="mb-5">
							<div class="d-grid gap-2">
								<button id="filter-title-btn" class="btn btn-automarca-filter" type="button" data-bs-toggle="collapse" data-bs-target="#filter-collapse" aria-expanded="false" aria-controls="collapseExample">
									<strong>Dati principali dell'auto</strong>
								</button>
							</div>
							<div class="collapse filters-collapse-container" id="filter-collapse">
								<div class="filters-container">
									<form class="row search-form" action="<?php echo home_url('/'); ?>">
										<input type="hidden" name="order" value="price_asc" id="order">
										<input type="hidden" name="condition" value="usato" id="condition">
										<div class="col-12 form-col">
											<label class="form-label" for="brand">Marca</label>
											<select class="form-select" name="make" id="brand" aria-label="Marca">
												<option value="all">Tutti</option>
												<option selected value="Ford">Ford</option>
												<option value="Mazda">Mazda</option>
												<option value="Volkswagen">Volkswagen</option>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="model">Modello</label>
											<select class="form-select" name="model" id="model" aria-label="Modello">
												<option value="all">Tutti</option>
												<option value="fiesta" selected>Fiesta</option>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="version">Versione</label>
											<select class="form-select" name="version" id="version" aria-label="Versione">
												<option value="all">Tutte</option>
												<option value="plus" selected>Plus</option>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="max-price">Prezzo fino a</label>
											<select class="form-select" name="max_price" id="max-price" aria-label="Marca">
												<option selected>prezzo fino a ...</option>
												<?php
												echo "<option value='500'>500 €</option>";
												for ($i = 1000; $i <= 500000; $i += 1000) {
													$price = number_format($i, 0, ',', '.') . ' €';
													$selected = $i == 12000 ? 'selected' : '';
													echo "<option value='$i' $selected>$price</option>";
												}
												?>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="km-until">Km fino a</label>
											<select class="form-select" name="km_until" id="km-until" aria-label="Marca">
												<option value="all">Qualsiasi</option>
												<?php
												echo "<option value='5000'>5.000 km</option>";
												for ($i = 10000; $i <= 500000; $i += 10000) {
													$kms = number_format($i, 0, ',', '.') . ' km';
													echo "<option value='$i'>$kms</option>";
												}
												?>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="year">Anno</label>
											<select class="form-select" placeholder="anno" name="year" id="year">
												<option value="all">Qualsiasi</option>
												<?php
												$year = date('Y');
												for ($i = $year; $i >= 1930; $i--) {
													$selected = $i == 2019 ? 'selected' : '';
													echo "<option value='$i' $selected>$i</option>";
												}
												?>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="fuel_type">Alimentazione</label>
											<select class="form-select" placeholder="alimentazione" name="fuel_type" id="fuel_type">
												<option value="all">Tutte</option>
												<option selected value="benzina">Benzina</option>
												<option value="diesel">Diesel</option>
												<option value="gpl">GPL</option>
												<option value="metano">Metano</option>
												<option value="ibrida">Ibrida</option>
												<option value="elettrica">Elettrica</option>
												<option value="altro">Altro</option>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="transmission">Cambio</label>
											<select class="form-select" placeholder="cambio" name="transmission" id="transmission">
												<option value="all">Tutte</option>
												<option selected value="manuale">Manuale</option>
												<option value="automatico">Automatico</option>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="novice-drivers">Neopatentati</label>
											<select class="form-select" name="novice_drivers" id="novice-drivers">
												<option value="Si">Sì</option>
												<option value="No">No</option>
											</select>
										</div>
									</form>
									<p class="text-end"><a href="#" class="reset-link" id="reset-search">reimposta ricerca</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-8">
						<div class="cars-search-title-container">
							<div class="cars-search-title title-2">25 Offerte per la tua ricerca</div>
							<div class="cars-order d-flex">
								<p>Ordina:</p>
								<select class="form-select order-select" name="order" id="order" aria-label="Ordina">
									<option value="price_asc">prezzo - crescente</option>
									<option value="price_desc">prezzo - decrescente</option>
									<option value="model_asc">Modello (A - Z)</option>
									<option value="model_desc">Modello (Z - A)</option>
									<option value="km_asc">km - crescente</option>
									<option value="km_desc">km - decrescente</option>
								</select>
							</div>
						</div>
						<div class="active-filters-container">
							<div class="automarca-active-filter">
								<span>Ford</span> <a href="#" class="remove-filter" data-filter="brand"></a>
							</div>
							<div class="automarca-active-filter">
								<span>Fiesta</span> <a href="#" class="remove-filter" data-filter="model"></a>
							</div>
							<div class="automarca-active-filter">
								<span>Fino a 12.000 €</span> <a href="#" class="remove-filter" data-filter="max_price"></a>
							</div>
							<div class="automarca-active-filter">
								<span>2019</span> <a href="#" class="remove-filter" data-filter="year"></a>
							</div>
							<div class="automarca-active-filter">
								<span>Benzina</span> <a href="#" class="remove-filter" data-filter="fuel_type"></a>
							</div>
						</div>
						<div class="remove-all-container mt-3">
							<p><a href="#" class="reset-link" id="reset-filters">Rimuovi tutti i filtri</a></p>
						</div>
						<div class="row mt-5 cars-grid">
							<div class="col-12 col-md-6 col-xxl-4 car-item">
								<div class="title-container">
									<div class="title-5">
										VOLKSWAGEN<br> PASSAT VARIANT
									</div>
									<p>
										8ª serie Variant - 2.0 TDI Business BlueMotion
									</p>
								</div>
								<img src="https://via.placeholder.com/800x600" class="car-img" alt="">
								<div class="car-features">
									<table class="table car-features-table">
										<tbody>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-data.svg" class="feature-icon" alt=""> 05/2019</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-km.svg" class="feature-icon" alt=""> 30.000 km</td>
											</tr>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-alimentazione.svg" class="feature-icon" alt=""> Benzina</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-cambio.svg" class="feature-icon" alt=""> Manuale</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="car-price">
									<p class="price-content"><span>€ 19.900</span> € 19.900</p>
									<p class="button-container"><a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a></p>
								</div>
							</div>
							<div class="col-12 col-md-6 col-xxl-4 car-item">
								<div class="title-container">
									<div class="title-5">
										VOLKSWAGEN<br> PASSAT VARIANT
									</div>
									<p>
										8ª serie Variant - 2.0 TDI Business BlueMotion
									</p>
								</div>
								<img src="https://via.placeholder.com/800x600" class="car-img" alt="">
								<div class="car-features">
									<table class="table car-features-table">
										<tbody>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-data.svg" class="feature-icon" alt=""> 05/2019</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-km.svg" class="feature-icon" alt=""> 30.000 km</td>
											</tr>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-alimentazione.svg" class="feature-icon" alt=""> Benzina</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-cambio.svg" class="feature-icon" alt=""> Manuale</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="car-price">
									<p class="price-content"><span>€ 19.900</span> € 19.900</p>
									<p class="button-container"><a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a></p>
								</div>
							</div>
							<div class="col-12 col-md-6 col-xxl-4 car-item">
								<div class="title-container">
									<div class="title-5">
										VOLKSWAGEN<br> PASSAT VARIANT
									</div>
									<p>
										8ª serie Variant - 2.0 TDI Business BlueMotion
									</p>
								</div>
								<img src="https://via.placeholder.com/800x600" class="car-img" alt="">
								<div class="car-features">
									<table class="table car-features-table">
										<tbody>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-data.svg" class="feature-icon" alt=""> 05/2019</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-km.svg" class="feature-icon" alt=""> 30.000 km</td>
											</tr>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-alimentazione.svg" class="feature-icon" alt=""> Benzina</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-cambio.svg" class="feature-icon" alt=""> Manuale</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="car-price">
									<p class="price-content"><span>€ 19.900</span> € 19.900</p>
									<p class="button-container"><a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a></p>
								</div>
							</div>
							<div class="col-12 col-md-6 col-xxl-4 car-item">
								<div class="title-container">
									<div class="title-5">
										VOLKSWAGEN<br> PASSAT VARIANT
									</div>
									<p>
										8ª serie Variant - 2.0 TDI Business BlueMotion
									</p>
								</div>
								<img src="https://via.placeholder.com/800x600" class="car-img" alt="">
								<div class="car-features">
									<table class="table car-features-table">
										<tbody>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-data.svg" class="feature-icon" alt=""> 05/2019</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-km.svg" class="feature-icon" alt=""> 30.000 km</td>
											</tr>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-alimentazione.svg" class="feature-icon" alt=""> Benzina</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-cambio.svg" class="feature-icon" alt=""> Manuale</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="car-price">
									<p class="price-content"><span>€ 19.900</span> € 19.900</p>
									<p class="button-container"><a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a></p>
								</div>
							</div>
							<div class="col-12 col-md-6 col-xxl-4 car-item">
								<div class="title-container">
									<div class="title-5">
										VOLKSWAGEN<br> PASSAT VARIANT
									</div>
									<p>
										8ª serie Variant - 2.0 TDI Business BlueMotion
									</p>
								</div>
								<img src="https://via.placeholder.com/800x600" class="car-img" alt="">
								<div class="car-features">
									<table class="table car-features-table">
										<tbody>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-data.svg" class="feature-icon" alt=""> 05/2019</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-km.svg" class="feature-icon" alt=""> 30.000 km</td>
											</tr>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-alimentazione.svg" class="feature-icon" alt=""> Benzina</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-cambio.svg" class="feature-icon" alt=""> Manuale</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="car-price">
									<p class="price-content"><span>€ 19.900</span> € 19.900</p>
									<p class="button-container"><a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a></p>
								</div>
							</div>
							<div class="col-12 col-md-6 col-xxl-4 car-item">
								<div class="title-container">
									<div class="title-5">
										VOLKSWAGEN<br> PASSAT VARIANT
									</div>
									<p>
										8ª serie Variant - 2.0 TDI Business BlueMotion
									</p>
								</div>
								<img src="https://via.placeholder.com/800x600" class="car-img" alt="">
								<div class="car-features">
									<table class="table car-features-table">
										<tbody>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-data.svg" class="feature-icon" alt=""> 05/2019</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-km.svg" class="feature-icon" alt=""> 30.000 km</td>
											</tr>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-alimentazione.svg" class="feature-icon" alt=""> Benzina</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-cambio.svg" class="feature-icon" alt=""> Manuale</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="car-price">
									<p class="price-content"><span>€ 19.900</span> € 19.900</p>
									<p class="button-container"><a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a></p>
								</div>
							</div>
							<div class="col-12 col-md-6 col-xxl-4 car-item">
								<div class="title-container">
									<div class="title-5">
										VOLKSWAGEN<br> PASSAT VARIANT
									</div>
									<p>
										8ª serie Variant - 2.0 TDI Business BlueMotion
									</p>
								</div>
								<img src="https://via.placeholder.com/800x600" class="car-img" alt="">
								<div class="car-features">
									<table class="table car-features-table">
										<tbody>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-data.svg" class="feature-icon" alt=""> 05/2019</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-km.svg" class="feature-icon" alt=""> 30.000 km</td>
											</tr>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-alimentazione.svg" class="feature-icon" alt=""> Benzina</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-cambio.svg" class="feature-icon" alt=""> Manuale</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="car-price">
									<p class="price-content"><span>€ 19.900</span> € 19.900</p>
									<p class="button-container"><a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a></p>
								</div>
							</div>
							<div class="col-12 col-md-6 col-xxl-4 car-item">
								<div class="title-container">
									<div class="title-5">
										VOLKSWAGEN<br> PASSAT VARIANT
									</div>
									<p>
										8ª serie Variant - 2.0 TDI Business BlueMotion
									</p>
								</div>
								<img src="https://via.placeholder.com/800x600" class="car-img" alt="">
								<div class="car-features">
									<table class="table car-features-table">
										<tbody>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-data.svg" class="feature-icon" alt=""> 05/2019</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-km.svg" class="feature-icon" alt=""> 30.000 km</td>
											</tr>
											<tr>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-alimentazione.svg" class="feature-icon" alt=""> Benzina</td>
												<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-cambio.svg" class="feature-icon" alt=""> Manuale</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="car-price">
									<p class="price-content"><span>€ 19.900</span> € 19.900</p>
									<p class="button-container"><a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a></p>
								</div>
							</div>
						</div>
						<div class="row pt-5 mt-5">
							<div class="col-12">
								<nav aria-label="Page navigation example">
									<ul class="pagination automarca-pagination justify-content-center d-none d-xl-flex">
										<li class="page-item flex-grow-1">
											<a class="page-link text-link prev" href="#" aria-label="Previous">
												<span class="arrow"></span><span class="d-none d-sm-inline">Precedente</span>
											</a>
										</li>
										<li class="page-item active"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">4</a></li>
										<li class="page-item"><a class="page-link" href="#">5</a></li>
										<li class="page-item"><a class="page-link" href="#">6</a></li>
										<li class="page-item"><a class="page-link" href="#">7</a></li>
										<li class="page-item"><a class="page-link" href="#">8</a></li>
										<li class="page-item"><a class="page-link" href="#">9</a></li>
										<li class="page-item"><a class="page-link" href="#">10</a></li>
										<li class="page-item flex-grow-1 text-end">
											<a class="page-link text-link next" href="#" aria-label="Next">
												<span class="d-none d-sm-inline">Successiva</span><span class="arrow"></span>
											</a>
										</li>
									</ul>
									<ul class="pagination automarca-pagination justify-content-center d-flex d-xl-none">
										<li class="page-item flex-grow-1">
											<a class="page-link text-link prev" href="#" aria-label="Previous">
												<span class="arrow"></span><span class="d-none d-sm-inline">Precedente</span>
											</a>
										</li>
										<li class="page-item active"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">4</a></li>
										<li class="page-item"><a class="page-link" href="#">5</a></li>
										<li class="page-item flex-grow-1 text-end">
											<a class="page-link text-link next" href="#" aria-label="Next">
												<span class="d-none d-sm-inline">Successiva</span><span class="arrow"></span>
											</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>