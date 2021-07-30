<?php

/**
 * Pagina Home
 */

get_header(); ?>
<main class="page-wrapper">
	<header class="container-fluid section">
		<div class="row with-logo-element">
			<div class="col-12 col-lg-6 bg-light-blue section-padding header order-2 order-lg-1">
				<div class="row justify-content-start justify-content-xxl-center">
					<div class="col-12 col-xl-11 me-auto me-xxl-0 col-xxl-8">
						<div class="title-1">
							Abbiamo l'auto<br> perfetta per te.
						</div>
						<p>
							Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum has been
						</p>
						<form class="row search-form" action="<?php echo home_url('/'); ?>">
							<div class="col-6 col-md-3 form-col">
								<div class="d-grid gap-2">
									<input type="radio" class="btn-check filterradio" data-action="<?= get_permalink(get_page_by_path('nuovo')) ?>" name="condition" value="new" id="new" autocomplete="off" checked>
									<label class="btn btn-automarca-check" for="new">nuovo</label>
								</div>
							</div>
							<div class="col-6 col-md-3 form-col">
								<div class="d-grid gap-2">
									<input type="radio" class="btn-check filterradio" data-action="<?= get_permalink(get_page_by_path('usato')) ?>" name="condition" value="used" id="used" autocomplete="off">
									<label class="btn btn-automarca-check" for="used">usato</label>
								</div>
							</div>
							<div class="col-6 col-md-3 form-col">
								<div class="d-grid gap-2">
									<input type="radio" class="btn-check filterradio" data-action="<?= get_permalink(get_page_by_path('km0')) ?>" name="condition" value="km0" id="km0" autocomplete="off">
									<label class="btn btn-automarca-check" for="km0">km0</label>
								</div>
							</div>
							<div class="col-6 col-md-3 form-col">
								<div class="d-grid gap-2">
									<input type="radio" class="btn-check filterradio" data-action="<?= get_permalink(get_page_by_path('noleggio')) ?>" name="condition" value="rent" id="rent" autocomplete="off">
									<label class="btn btn-automarca-check" for="rent">noleggio</label>
								</div>
							</div>
							<div class="col-12 form-col">
								<select class="form-select" name="make" id="" aria-label="Veicolo Commerciale" disabled>
									<option selected>Veicolo commerciale</option>
									<option value="1">Sì</option>
									<option value="0">No</option>
								</select>
							</div>
							<div class="col-12 form-col">
								<select class="form-select" name="make" id="brand" aria-label="Marca">
									<option value="" selected>Marca</option>
									<option value="Ford">Ford</option>
									<option value="Mazda">Mazda</option>
									<option value="Volkswagen">Volkswagen</option>
								</select>
							</div>
							<div class="col-12 form-col">
								<select class="form-select" name="model" id="model" aria-label="Modello">
									<option value="" selected>Modello</option>
									<option value="Fiesta_4_serie">Fiesta 4ª serie</option>
									<option value="Fiesta_7_serie">Fiesta 7ª serie</option>
									<option value="Mondeo_3_serie">Mondeo 3ª serie</option>
									<option value="Fiesta_5_serie">Fiesta 5ª serie</option>
								</select>
							</div>
							<div class="col-12 form-col">
								<select class="form-select" name="max_price" id="max-price" aria-label="Marca">
									<option value="" selected>prezzo fino a ...</option>
									<option value="-2">-2</option>
									<option value="15000">15.000</option>
									<option value="20000">20.000</option>
								</select>
							</div>
							<div class="col-12 form-col">
								<select class="form-select" name="km_until" id="km-until" aria-label="Marca">
									<option value="" selected>km fino a ...</option>
									<option value="20000">20.000</option>
									<option value="40000">40.000</option>
									<option value="50000">50.000</option>
								</select>
							</div>
							<div class="col-12 form-col">
								<input type="text" class="form-control" placeholder="anno" name="year" id="year">
							</div>
							<div class="col-12 form-col">
								<select class="form-select" name="fuel_type" id="fuel_type">
									<option value="" selected>Alimentazione<option>
									<option value="benzina_verde">Benzina verde</option>
									<option value="benzina_super">Benzina Super</option>
									<option value="diesel">Diesel</option>
									<option value="ibrida">Ibrida</option>
									<option value="elettrica">Elettrica</option>
								</select>
							</div>
							<div class="col-12 form-col">
								<select class="form-select" name="transmission" id="transmission">
									<option value="" selected>Cambio<option>
									<option value="automatico">Automatico</option>
									<option value="manuale">Manuale</option>
								</select>
							</div>
							<div class="col-12 form-col">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="true" name="novice_drivers" id="novice-drivers">
									<label class="form-check-label" for="novice-drivers">
										Neopatentati
									</label>
								</div>
							</div>
							<div class="col-12 form-col">
								<button id="filter-submit" type="button" class="btn btn-automarca block"><span id="count-result">400</span> <span>risultati<span class="arrow"></span></span></button>
							</div>
							<div class="col-12 form-col">
								<a href=""  class="reset-link" id="reset-search">reimposta ricerca</a>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6 order-1 order-lg-2 home-header-slider-container">
				<img src="<?= get_template_directory_uri(); ?>/assets/images/home/simbolo.svg" width="300" class="logo-element" alt="logo icon">
				<div class="row h-100 justify-content-center align-items-center">
					<div class="col-12">
						<?php $slides = get_field('slide'); ?>
						<div class="home-slider">
							<?php foreach ($slides as $slide) { ?>

								<div class="home-slide">
									<div class="container-fluid slide-container px-0 px-xxl-5">
										<div class="row">
											<div class="col-12 col-md-10 offset-md-2 col-xxl-8 offset-xxl-4">
												<img src="<?= $slide['immagine']['sizes']['rta_thumb_center_center_800x500'] ?>" class="img-fluid" alt="ecoincentivi">
											</div>
											<div class="col-12 col-md-10 col-xxl-8 inner-mar-top">
												<div class="title-1">
													<?= $slide['titolo'] ?>
												</div>
												<p>
													<?= $slide['testo'] ?>
												</p>
												<p>
													<a class="btn btn-automarca-1" href="<?= $slide['link_bottone'] ?>"><span>scopri subito<span class="arrow"></span></span></a>
												</p>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<!-- <div class="home-slide">
								<div class="container-fluid slide-container px-0 px-xxl-5">
									<div class="row">
										<div class="col-12 col-md-10 offset-md-2 col-xxl-8 offset-xxl-4">
											<img src="https://via.placeholder.com/800x500" class="img-fluid" alt="ecoincentivi">
										</div>
										<div class="col-12 col-md-10 col-xxl-8 inner-mar-top">
											<div class="title-1">
												Ecoincentivi, cosa sono e come funzionano
											</div>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknoa
											</p>
											<p>
												<a class="btn btn-automarca-1" href="#">scopri subito</a>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="home-slide">
								<div class="container-fluid slide-container px-0 px-xxl-5">
									<div class="row">
										<div class="col-12 col-md-10 offset-md-2 col-xxl-8 offset-xxl-4">
											<img src="https://via.placeholder.com/800x500" class="img-fluid" alt="ecoincentivi">
										</div>
										<div class="col-12 col-md-10 col-xxl-8 inner-mar-top">
											<div class="title-1">
												Ecoincentivi, cosa sono e come funzionano
											</div>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknoa
											</p>
											<p>
												<a class="btn btn-automarca-1" href="#">scopri subito</a>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="home-slide">
								<div class="container-fluid slide-container px-0 px-xxl-5">
									<div class="row">
										<div class="col-12 col-md-10 offset-md-2 col-xxl-8 ooffset-xxl-4">
											<img src="https://via.placeholder.com/800x500" class="img-fluid" alt="ecoincentivi">
										</div>
										<div class="col-12 col-md-10 col-xxl-8 inner-mar-top">
											<div class="title-1">
												Ecoincentivi, cosa sono e come funzionano
											</div>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknoa
											</p>
											<p>
												<a class="btn btn-automarca-1" href="#">scopri subito</a>
											</p>
										</div>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- NEW CARS -->
	<section class="container-fluid section section-padding">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="title-1 text-center mar-big">
					I veicoli nuovi
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- KM0 CARS -->
	<section class="container-fluid section section-padding bg-light-blue-1">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="title-1 text-center mar-big">
					La nostra selezione<br> per i km0
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- USED CARS -->
	<section class="container-fluid section section-padding">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="title-1 text-center mar-big">
					La nostra offerta<br> di auto usate
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-xxl-3 car-item">
						<div class="title-container">
							<div class="title-5">
								VOLKSWAGEN<br> PASSAT VARIANT
							</div>
							<p>
								8ª serie Variant - 2.0 TDI Business BlueMotion
							</p>
						</div>
						<img data-src="https://via.placeholder.com/800x600" class="car-img lazyload" alt="">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 car-item">
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
							<p class="button-container">
								<a class="btn btn-automarca-car" href="#"><span>Scopri <span class="arrow"></span></span></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- RENT -->
	<section class="container-fluid section section-padding bg-light-blue-1">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="title-1 mar-big">
					Scopri i vantaggi<br> del noleggio
				</div>
				<div class="row mb-5">
					<div class="col-12 col-lg-6 col-xl-4 mb-4">
						<div class="d-flex">
							<div class="flex-shrink-0">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-modello.svg" class="rent-icon" alt="">
							</div>
							<div class="flex-grow-1 ms-3">
								<p><strong>SCEGLI IL MODELLO</strong><br>
									Scegli l’allestimento ed il modello che si adatta al meglio alle tue esigenze.</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 col-xl-4 offset-xl-2 mb-4">
						<div class="d-flex">
							<div class="flex-shrink-0">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-24-7.svg" class="rent-icon" alt="">
							</div>
							<div class="flex-grow-1 ms-3">
								<p><strong>SEMPRE AL TUO SERVIZIO</strong><br>
									Siamo aperti 7 giorni su 7 chiama il nostro numero verde.</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 col-xl-4 ">
						<div class="d-flex">
							<div class="flex-shrink-0">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-durata.svg" class="rent-icon" alt="">
							</div>
							<div class="flex-grow-1 ms-3">
								<p><strong>SCEGLI LA DURATA</strong><br>
									Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing.</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 col-xl-4 offset-xl-2">
						<div class="d-flex">
							<div class="flex-shrink-0">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-kasko.svg" class="rent-icon" alt="">
							</div>
							<div class="flex-grow-1 ms-3">
								<p><strong>VIAGGIA IN SICUREZZA</strong><br>
									Non ti preoccupare, ogni noleggio è incluso di KASKO ed RCA.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6">
						<img data-src="<?= get_template_directory_uri(); ?>/assets/images/home/noleggio-corto.jpg" class="img-fluid mb-4 lazyload" alt="">
						<div class="title-4">Noleggio breve termine</div>
						<p>Scopri cos’è e come funziona il noleggio a breve termine e quali sono i servizi inclusi, anche per privati. Esplora le nostre offerte</p>
						<p>
							<a class="btn btn-automarca-1" href="#"><span>scopri di più<span class="arrow"></span></span></a>
						</p>
					</div>
					<div class="col-12 col-md-6">
						<img data-src="<?= get_template_directory_uri(); ?>/assets/images/home/noleggio-lungo.jpg" class="img-fluid mb-4 lazyload" alt="">
						<div class="title-4">Noleggio lungo termine</div>
						<p>Scopri cos’è e come funziona il noleggio a lungo termine e quali sono i servizi inclusi, anche per privati. Esplora le nostre offerte</p>
						<p>
							<a class="btn btn-automarca-1" href="#"><span>scopri di più<span class="arrow"></span></span></a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- SERVICE CENTER  -->
	<section class="container-fluid section section-padding">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row">
					<div class="col-12 col-lg-6 col-xl-4 mar-b-lg-30">
						<div class="title-1">
							Il nostro centro assistenza
						</div>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
						<div class="list-container">
							<div class="d-flex align-items-center mb-3">
								<div class="flex-shrink-0">
									<img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-assistenza.svg" class="service-icon" alt="">
								</div>
								<div class="flex-grow-1 ms-3">
									<p><strong>ASSISTENZA</strong></p>
								</div>
							</div>
							<div class="d-flex align-items-center mb-3">
								<div class="flex-shrink-0">
									<img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-tagliando.svg" class="service-icon" alt="">
								</div>
								<div class="flex-grow-1 ms-3">
									<p><strong>TAGLIANDO</strong></p>
								</div>
							</div>
							<div class="d-flex align-items-center">
								<div class="flex-shrink-0">
									<img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-manutenzione.svg" class="service-icon" alt="">
								</div>
								<div class="flex-grow-1 ms-3">
									<p><strong>OFFICINA</strong></p>
								</div>
							</div>
						</div>
						<p>
							<a class="btn btn-automarca-1" href="#"><span>scopri di più<span class="arrow"></span></span></a>
						</p>
					</div>
					<div class="col-12 col-lg-6 offset-xl-2">
						<img data-src="<?= get_template_directory_uri(); ?>/assets/images/home/assistenza.jpg" class="img-fluid mb-4 lazyload" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- NEWS -->
	<section class="container-fluid section section-padding bg-light-blue-1">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row">
					<div class="col-12 col-lg-6 col-xl-5 mar-b-lg-30">
						<div class="title-1">
							10 consigli per acquistare un’auto usata
						</div>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque quasi vel nulla provident ullam numquam placeat similique sunt aliquid officia velit tempora ut obcaecati illo, veritatis esse consequuntur assumenda. Fuga.</p>
						<p>
							<a class="btn btn-automarca-1" href="#"><span>leggi tutto<span class="arrow"></span></span></a>
						</p>
					</div>
					<div class="col-12 col-lg-6 offset-xl-1">
						<img src="https://via.placeholder.com/800x500" class="img-fluid" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- NEWSLETTER -->
	<section class="container-fluid section section-padding-sm bg-light-blue">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row">
					<div class="col-12 col-lg-6 col-xl-7 mar-b-lg-30">
						<div class="title-1">
							Iscriviti alla nostra newsletter
						</div>
						<p>Per ricevere le migliori offerte di Automarca</p>
					</div>
					<div class="col-12 col-lg-6 col-xl-5">
						<form class="automarca-form row">
							<div class="col-12 col-lg-6 mb-3">
								<input type="text" class="form-control" id="name" placeholder="Nome Cognome *">
							</div>
							<div class="col-12 col-lg-6 mb-3">
								<input type="email" class="form-control" id="email" placeholder="Email *">
							</div>
							<div class="col-12 col-lg-6 mb-3">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="privacy">
									<label class="form-check-label" for="privacy">(Richiesto) Acconsento al trattamento dei dati personali - <a href="#">Privacy policy</a></label>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="cookie">
									<label class="form-check-label" for="cookie">(Facoltativo) Acconsento al trattamento dei dati per fini commerciali e di marketing</label>
								</div>
							</div>
							<div class="col-12 col-lg-6 mb-3">
								<button type="submit" class="btn btn-automarca"><span>iscriviti <span class="arrow"></span></span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- PREFOOTER -->
	<section class="container-fluid section-padding bg-light-blue-1 home-prefooter">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="title-1 text-center">
					Quale auto cerchi?
				</div>
				<p class="text-center">Scopri qui l’offerta automarca</p>
				<div class="row justify-content-center justify-content-xl-between mar-t-xxl-80">
					<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start">
						<p><strong>Audi</strong></p>
						<ul class="list-unstyled">
							<li>Audi A1</li>
							<li>Audi A3</li>
							<li>Audi A4</li>
							<li>Audi A6</li>
							<li>Audi Q3</li>
							<li>Altri Modelli Audi</li>
						</ul>
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start mar-t-xs-30">
						<p><strong>BMW</strong></p>
						<ul class="list-unstyled">
							<li>BMW Serie 1</li>
							<li>BMW Serie 3</li>
							<li>BMW Serie 5</li>
							<li>BMW X1</li>
							<li>BMW X3</li>
							<li>Altri Modelli BMW</li>
						</ul>
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start mar-t-lg-30">
						<p><strong>Ford</strong></p>
						<ul class="list-unstyled">
							<li>Ford Fiesta</li>
							<li>Ford Kuga</li>
							<li>Ford Focus</li>
							<li>Ford Ecosport</li>
							<li>Ford Puma</li>
							<li>Altri Modelli Ford</li>
						</ul>
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-start text-center text-xl-start mar-t-lg-30">
						<p><strong>Fiat</strong></p>
						<ul class="list-unstyled">
							<li>Fiat 500</li>
							<li>Fiat 500L</li>
							<li>Fiat Panda</li>
							<li>Fiat Punto</li>
							<li>Fiat Tipo</li>
							<li>Altri Modelli Fiat</li>
						</ul>
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start mar-t-lg-30">
						<p><strong>Altre marche</strong></p>
						<ul class="list-unstyled">
							<li>Peugeot</li>
							<li>Mercedes</li>
							<li>Opel</li>
							<li>Renault</li>
							<li>Volkswagen</li>
							<li>Altre marche</li>
						</ul>
					</div>
				</div>
				<div class="row justify-content-center justify-content-xl-between mar-t-xs-30 mar-t-sm-80 mar-t-xxl-100">
					<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start">
						<p><strong>Carrozzeria</strong></p>
						<ul class="list-unstyled">
							<li>Utilitarie</li>
							<li>Berline</li>
							<li>SUV</li>
							<li>Coupe</li>
						</ul>
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start mar-t-xs-30">
						<p><strong>Lorem ipsum</strong></p>
						<ul class="list-unstyled">
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
						</ul>
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start mar-t-lg-30">
						<p><strong>Lorem ipsum</strong></p>
						<ul class="list-unstyled">
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
						</ul>
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start mar-t-lg-30">
						<p><strong>Lorem ipsum</strong></p>
						<ul class="list-unstyled">
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
						</ul>
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start mar-t-lg-30">
						<p><strong>Supporto</strong></p>
						<ul class="list-unstyled">
							<li>Rottamazione</li>
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
							<li>Lorem ipsum</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>