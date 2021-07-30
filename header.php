<?php

/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">

	<!-- Force IE to use the latest rendering engine available -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- If Site Icon isn't set in customizer -->
	<?php if (!function_exists('has_site_icon') || !has_site_icon()) { ?>
		<!-- Icons & Favicons -->
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
	<?php } ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>

</head>

<?php
// $pages = get_pages([
// 	'exclude' => [23, 25],
// 	'sort_column' => 'menu_order'
// ]);
?>

<body <?php body_class(); ?>>
	<nav class="container-fluid fixed-top">
		<div class="row bg-light-blue-3 justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row">
					<div class="col-auto">
						<a class="header-top-link" href="tel:04221830651">
							<div class="d-flex header-top-item">
								<div class="flex-shrink-0">
									<img src="<?= get_template_directory_uri(); ?>/assets/images/icona-tel-assist.svg" class="header-top-icon" alt="">
								</div>
								<div class="flex-grow-1 ms-3 d-none d-xl-block">
									<p><small>ASSISTENZA</small>+39.04221830651</p>
								</div>
							</div>
						</a>
					</div>
					<div class="col-auto">
						<a class="header-top-link" href="tel:04221830300">
							<div class="d-flex header-top-item">
								<div class="flex-shrink-0">
									<img src="<?= get_template_directory_uri(); ?>/assets/images/icona-tel-assist.svg" class="header-top-icon" alt="">
								</div>
								<div class="flex-grow-1 ms-3 d-none d-xl-block">
									<p><small>VENDITA</small>+39.04221830300</p>
								</div>
							</div>
						</a>
					</div>
					<div class="col-auto">
						<a class="header-top-link" href="https://wa.me/393519391880">
							<div class="d-flex header-top-item">
								<div class="flex-shrink-0">
									<img src="<?= get_template_directory_uri(); ?>/assets/images/icona-contattaci.svg" class="header-top-icon" alt="">
								</div>
								<div class="flex-grow-1 ms-3 d-none d-xl-block">
									<p><small>CONTATTACI</small>+39.35193918801</p>
								</div>
							</div>
						</a>
					</div>
					<div class="col-auto ms-auto reviews-top-nav">
						<p>Recensioni</p>
					</div>
					<div class="col-auto ms-auto top-nav-menu d-none d-lg-block">
						<div class="nav justify-content-end ms-auto">
							<a class="nav-link menu-link <?= $pagename == 'magazine' || is_singular('post') ? 'active' : '' ?>" data-text="Magazine" href="<?= get_permalink(get_page_by_path('magazine')) ?>" tabindex="-1">Magazine</a>
							<a class="nav-link menu-link <?= $pagename == 'contatti' || $pagename == 'silea' || $pagename == 'conegliano' || $pagename == 'mestre' || $pagename == 'centro-dellusato' || $pagename == 'automarca-mazda' ? 'active' : '' ?>" data-text="Contatti" href="<?= get_permalink(get_page_by_path('contatti')) ?>" tabindex="-1">Contatti</a>
							<a class="nav-link menu-link <?= $pagename == 'lavora-con-noi' ? 'active' : '' ?>" data-text="Lavora con noi" href="<?= get_permalink(get_page_by_path('contatti')) ?>" tabindex="-1">Lavora con noi</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row bg-blue justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="navbar navbar-expand-lg bg-transparent" id="menu">
					<div class="container-fluid px-0 justify-content-center">
						<a class="navbar-brand me-auto" href="<?= get_permalink(get_page_by_path('home')) ?>">
							<img src="<?= get_template_directory_uri(); ?>/assets/images/logo.svg" class="d-none d-lg-inline header-logo" alt="">
							<img src="https://via.placeholder.com/50" class="d-inline d-lg-none header-logo" alt="">
						</a>
						<button class="navbar-toggler d-inline d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#search-form" aria-controls="search-form" aria-expanded="false" aria-label="search-form">
							<img src=<?= get_template_directory_uri() ?>/assets/images/search-icon.svg" alt="" width="20" height="20">
						</button>
						<button id="menu-open-button" class="navbar-toggler hamburger hamburger--squeeze ms-2 ms-sm-3 me-0" type="button" data-bs-toggle="collapse" data-bs-target="#menu-collapse" aria-controls="menu-collapse" aria-expanded="false" aria-label="Toggle navigation">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
						<div class="collapse search-form-collapse d-lg-none" id="search-form">
							<form class="d-flex header-form" action="<?php echo home_url('/'); ?>">
								<div class="input-group">
									<input type="search" class="form-control form-control-lg" id="search-field" class="search-field" placeholder="Cerca" value="<?php echo get_search_query() ?>" name="s" title="Cerca" aria-describedby="search-button">
									<button class="btn btn-automarca-transparent" type="submit" id="search-button"><img src="<?= get_template_directory_uri() ?>/assets/images/search-icon.svg" alt="" width="20" height="20"></button>
								</div>
							</form>
						</div>
						<div class="collapse navbar-collapse ms-lg-5" id="menu-collapse">
							<ul class="navbar-nav ms-auto">
								<li class="nav-item dropdown">
									<a class="nav-link menu-link dropdown-toggle <?= $pagename == 'nuovo' ? 'active' : '' ?>" role="button" id="dropdown-new" data-bs-toggle="dropdown" aria-expanded="false" data-text="nuovo" data-bs-offset="50,50" href="#">nuovo</a>
									<ul class="dropdown-menu" aria-labelledby="dropdown-new">
										<li><a class="dropdown-item" href="#">Ford</a></li>
										<li><a class="dropdown-item" href="#">Mazda</a></li>
									</ul>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link menu-link dropdown-toggle <?= $pagename == 'km0' ? 'active' : '' ?>" role="button" id="dropdown-km0" data-bs-toggle="dropdown" aria-expanded="false" data-text="km0" href="#">KM0</a>
									<ul class="dropdown-menu" aria-labelledby="dropdown-km0">
										<li><a class="dropdown-item" href="#">Auto</a></li>
										<li><a class="dropdown-item" href="#">Veicoli Commerciali</a></li>
									</ul>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link menu-link dropdown-toggle <?= $pagename == 'usato' ? 'active' : '' ?>" role="button" id="dropdown-used" data-bs-toggle="dropdown" aria-expanded="false" data-text="usato" href="#">usato</a>
									<ul class="dropdown-menu" aria-labelledby="dropdown-used">
										<li><a class="dropdown-item" href="#">Auto</a></li>
										<li><a class="dropdown-item" href="#">Veicoli Commerciali</a></li>
									</ul>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link menu-link dropdown-toggle <?= $pagename == 'noleggio' ? 'active' : '' ?>" role="button" id="dropdown-rent" data-bs-toggle="dropdown" aria-expanded="false" data-text="noleggio" href="#" tabindex="-1">noleggio</a>
									<ul class="dropdown-menu" aria-labelledby="dropdown-rent">
										<li><a class="dropdown-item" href="#">Lungo Termine</a></li>
										<li><a class="dropdown-item" href="#">Breve Termine</a></li>
									</ul>
								</li>
								<li class="nav-item">
									<a class="nav-link menu-link <?= $pagename == 'business' ? 'active' : '' ?>" data-text="business" href="<?= get_permalink(get_page_by_path('business')) ?>" tabindex="-1">business</a>
								</li>
								<li class="nav-item">
									<a class="nav-link menu-link <?= $pagename == 'assistenza' ? 'active' : '' ?>" data-text="assistenza" href="<?= get_permalink(get_page_by_path('assistenza')) ?>" tabindex="-1">assistenza</a>
								</li>
								<li class="nav-item d-block d-lg-none">
									<a class="nav-link menu-link <?= $pagename == 'magazine' || is_singular('post') ? 'active' : '' ?>" data-text="magazine" href="<?= get_permalink(get_page_by_path('magazine')) ?>" tabindex="-1">magazine</a>
								</li>
								<li class="nav-item d-block d-lg-none">
									<a class="nav-link menu-link <?= $pagename == 'contatti' || $pagename == 'silea' || $pagename == 'conegliano' || $pagename == 'mestre' || $pagename == 'centro-dellusato' || $pagename == 'automarca-mazda' ? 'active' : '' ?>" data-text="contatti" href="<?= get_permalink(get_page_by_path('contatti')) ?>" tabindex="-1">contatti</a>
								</li>
								<li class="nav-item d-block d-lg-none">
									<a class="nav-link menu-link <?= $pagename == 'lavora-con-noi' ? 'active' : '' ?>" data-text="lavora con noi" href="<?= get_permalink(get_page_by_path('contatti')) ?>" tabindex="-1">lavora con noi</a>
								</li>
							</ul>
							<form class="header-form d-none d-lg-flex ms-0" action="<?php echo home_url('/'); ?>">
								<div class="input-group">
									<input type="search" class="form-control form-control-lg" id="search-field" class="search-field" placeholder="Cerca" value="<?php echo get_search_query() ?>" name="s" title="Cerca" aria-describedby="search-button">
									<button class="btn btn-automarca-transparent" type="submit" id="search-button"><img src="<?= get_template_directory_uri() ?>/assets/images/search-icon.svg" alt="" width="20" height="20"></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>