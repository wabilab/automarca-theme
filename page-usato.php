<?php

/**
 * Pagina Nuovo
 */

include 'array.php';


session_start();
// INITIALIZE QUERY VARS
$marca = get_query_var('param1');
$modello = substr(get_query_var('param2'), 1, strlen(get_query_var('param2')));
$alimentazione = substr(get_query_var('param3'), 1, strlen(get_query_var('param3')));


//CHECK QUERY VARS POSITION IN URL
if(in_array(strtolower($marca), $alimentazioniArr)) {
	$alimentazione = $marca;
	$marca == '';
} else if (in_array(strtolower($modello), $alimentazioniArr)) {
	$alimentazione = $modello;
	$modello == '';
}

if (!in_array(ucfirst($marca), $marcheArr)) {
	$modello = $marca;
	$marca = '';
}

// SANITIZE QUERY VARS
$filtri = array(
	'marca' => $marca,
	'modello' => $modello,
	'alimentazione' =>  $alimentazione
);
// if (in_array(strtolower($filtri['marca']), $alimentazioniArr)) {
// 	$filtri['alimentazione'] = $filtri['marca'];
// 	$filtri['marca'] = '';
// 	$filtri['modello'] = '';
// } else if (in_array(strtolower($filtri['modello']), $alimentazioniArr)) {
// 	$filtri['alimentazione'] = $filtri['modello'];
// 	$filtri['modello'] = '';
// }

// if (!in_array(ucfirst($filtri['marca']), $marcheArr)) {
// 	$filtri['modello'] = ucfirst($filtri['marca']);
// 	$filtri['marca'] = '';
// }

// SESSION VARIABLES
$_SESSION['marca'] = str_replace('_', ' ', $filtri['marca']);
$_SESSION['modello'] = str_replace('_', '-', $filtri['modello']);
$_SESSION['alimentazione'] = str_replace('_', ' ', $filtri['alimentazione']);

if (isset($_GET['maxPrice'])) {
	$_SESSION['prezzo'] = str_replace('_', '-', $_GET['maxPrice']);
}
if (isset($_GET['km'])) {
	$_SESSION['km'] = $_GET['km'];
}
if (isset($_GET['anno'])) {
	$_SESSION['anno'] = $_GET['anno'];
}
if (isset($_GET['order'])) {
	$_SESSION['order'] = $_GET['order'];
}

//COMPILE QUERY ARRAY 
$queryArr = ['relation' => 'AND'];

foreach ($filtri as $k => $q) {
	if ($q != 'all' && $q != null && $q != '') {
		if ($k == 'modello') {
			$key = 'search_model';
		} else if ($k == 'marca') {
			$key = 'search_marca';
		} else if ($k == 'alimentazione') {
			$key = 'search_fuel';
		};
		$arr = array(
			'key' => $key,
			'value' => $q,
			'compare' => 'LIKE'
		);
		$queryArr[] = $arr;
	}
}

foreach ($_GET as $k => $v) {
	if ($v != 'all' && $v != '' && $k != 'order' && isset($v)) {
		if ($k == 'maxPrice') {
			$arr = array(
				'key' => 'prezzo',
				'value' => $v,
				'compare' => '<',
				'type' => 'NUMERIC'
			);
		} else if ($k == 'km') {
			$arr = array(
				'key' => $k,
				'value' => $v,
				'compare' => '<',
				'type' => 'NUMERIC'
			);
		} else if ($k == 'anno') {
			$arr = array(
				'key' => 'anno_immatricolazione',
				'value' => $v,
				'compare' => '>=',
				'type' => 'NUMERIC'
			);
		} else if ($k == 'novice') {
			if ($v == 'true') {
				$arr = array(
					'key' => 'kw',
					'value' => 95,
					'compare' => '<',
					'type' => 'NUMERIC'
				);
			}
		} else if ($k == 'tipologia') {
			$arr = array(
				'key' => 'tipologia',
				'value' => $v,
				'compare' => 'LIKE'
			);
		};

		$queryArr[] = $arr;
	}
}

$queryArr[] = array(
	'key' => 'tipologia_vendita',
	'value' => 'usata',
	'compare' => 'LIKE'
);


//COMPILE URL WITH $_GET VARIABLES
$url_params = '';

$params_index = 0;
foreach ($_GET as $k => $v) {
	if ($k != 'pagina') {
		if ($params_index == 0) {
			$url_params .= '?' . $k . '=' . $v;
		} else {
			$url_params .= '&' . $k . '=' . $v;
		}
		$params_index++;
	}
}

if ((count($_GET) == 1 && isset($_GET['pagina'])) || count($_GET) == 0) {
	$concat = '?';
} else {
	$concat = '&';
}

// COMPILE ORDER VARIABLE
if (isset($_GET['order'])) {
	$orderarr = explode('_', $_GET['order']);
} else {
	$orderarr[] = 'prezzo';
	$orderarr[] = 'asc';
}

if ($orderarr[0] == 'prezzo' || $orderarr[0] == 'km') {
	$orderby = 'meta_value_num';
} else {
	$orderby = 'meta_value';
}

//PAGE VARIABLE
$paged = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

//POSTS PER PAGE
$posts_per_page  = 6;

//QUERY ARGS
$args = array(
	'post_type' => 'auto-in-vendita',
	'meta_query' => $queryArr,
	'meta_key' => $orderarr[0],
	'orderby' => $orderby,
	'order' => strtoupper($orderarr[1]),
	'posts_per_page' => $posts_per_page,
	'paged' => $paged
);

//GET FILTERED CARS
$cars = new WP_Query($args);
//GET PAGE
$page_num = $cars->max_num_pages;

get_header();
?>

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
						<img src="<?= get_template_directory_uri() ?>/assets/images/automarca-plus.svg" width="250" alt="">
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php
	// var_dump($queryArr);
	?>
	<!-- ATTENZIONE FLAG PER IL REDIRECT -->
	<input hidden type="radio" class="btn-check filterradio" name="condition" value="usata" id="usata" autocomplete="off" checked>
	<!-- ******************************* -->
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
										<div class="col-12 form-col">
											<label class="form-label" for="brand">Marca</label>
											<select class="form-select live-filter" name="make" id="brand-usato" aria-label="Marca">
												<option value="all">Tutte le marche</option>
												<?php foreach ($models as $model => $modelArr) : ?>
													<option value="<?= strtolower(str_replace(' ', '_', $model)) ?>" <?= isset($_SESSION['marca']) && $_SESSION['marca'] == strtolower(str_replace(' ', '_', $model))  ? 'selected' : '' ?>><?= $model; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="model">Modello</label>
											<select class="form-select model-select live-filter" name="model" id="model" aria-label="Modello">

												<option value="all">Tutti i modelli</option>
												<?php foreach ($models[ucfirst($filtri['marca'])] as $model) : ?>
													<option <?= ($_SESSION['modello'] == strtolower(str_replace(' ', '_', $model))) ? 'selected' : '';   ?> value="<?= strtolower(str_replace(' ', '_', $model)) ?>"><?= $model; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="max-price">Prezzo fino a</label>
											<select class="form-select live-filter" name="max_price" id="max-price" aria-label="Marca">
												<option value="">prezzo fino a ...</option>
												<?php if ($_SESSION['prezzo'] != '' && $_SESSION['prezzo'] != NULL) : ?>
													<option selected value="<?= $_SESSION['prezzo'] ?>"><?= $_SESSION['prezzo'] ?> €</option>
												<?php
												endif;
												echo "<option value='500'>500 €</option>";
												for ($i = 1000; $i <= 500000; $i += 1000) {
													$price = number_format($i, 0, ',', '.') . ' €';
													echo "<option value='$i' $selected>$price</option>";
												}
												?>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="km-until">Km fino a</label>
											<select class="form-select live-filter" name="km_until" id="km-until" aria-label="Marca">
												<option value="">Qualsiasi</option>
												<?php if ($_SESSION['km'] != '' && $_SESSION['km'] != NULL) : ?>
													<option selected value="<?= $_SESSION['km'] ?>"><?= $_SESSION['km'] . ' km' ?></option>
												<?php
												endif;
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
											<select class="form-select live-filter" placeholder="anno" name="year" id="year">
												<option value="">Qualsiasi</option>
												<?php if ($_SESSION['anno'] != '' && $_SESSION['anno'] != NULL) : ?>
													<option selected value="<?= $_SESSION['anno'] ?>"><?= $_SESSION['anno'] ?></option>
												<?php
												endif;
												$year = date('Y');
												for ($i = $year; $i >= 1930; $i--) {
													echo "<option value='$i' $selected>$i</option>";
												}
												?>
											</select>
										</div>
										<div class="col-12 form-col">
											<label class="form-label" for="fuel_type">Alimentazione</label>
											<select class="form-select live-filter" placeholder="alimentazione" name="fuel_type" id="fuel_type">
												<option value="">Tutte</option>
												<?php if ($_SESSION['alimentazione'] != '' && $_SESSION['alimentazione'] != NULL) : ?>
													<option selected value="<?= $_SESSION['alimentazione'] ?>"><?= $_SESSION['alimentazione'] ?></option>
												<?php endif; ?>
												<option value="benzina">Benzina</option>
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
											<select class="form-select live-filter" placeholder="cambio" name="transmission" id="transmission">
												<option value="">Tutte</option>
												<option value="manuale">Manuale</option>
												<option value="automatico">Automatico</option>
											</select>
										</div>
										<div class="col-12 form-col">
											<div class="form-check">
												<input class="form-check-input live-filter" type="checkbox" value="true" name="novice_drivers" id="novice-drivers">
												<label class="form-check-label" for="novice-drivers">
													Neopatentati
												</label>
											</div>
										</div>
									</form>
									<p class="text-end"><a class="reset-link" id="reset-search">reimposta ricerca</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-8">
						<div class="cars-search-title-container">
							<div class="cars-search-title title-2"><?= count($cars->posts) * $page_num; ?> Offerte per la tua ricerca</div>
							<div class="cars-order d-flex">
								<p>Ordina:</p>
								<select class="form-select-2 order-select" name="order" id="order" aria-label="Ordina">
									<option <?= !isset($_SESSION['order']) ? 'selected' : '' ?> value="">Ordina</option>
									<option <?= isset($_SESSION['order']) && $_SESSION['order'] == 'prezzo_asc' ? 'selected' : '' ?> value="prezzo_asc">Dal più economico</option>
									<option <?= isset($_SESSION['order']) && $_SESSION['order'] == 'prezzo_desc' ? 'selected' : '' ?> value="prezzo_desc">Dal più caro</option>
									<option <?= isset($_SESSION['order']) && $_SESSION['order'] == 'modello_asc' ? 'selected' : '' ?> value="modello_asc">Modello (A - Z)</option>
									<option <?= isset($_SESSION['order']) && $_SESSION['order'] == 'modello_desc' ? 'selected' : '' ?> value="modello_desc">Modello (Z - A)</option>
									<option <?= isset($_SESSION['order']) && $_SESSION['order'] == 'km_asc' ? 'selected' : '' ?> value="km_asc">Chilometraggio crescente</option>
									<option <?= isset($_SESSION['order']) && $_SESSION['order'] == 'km_desc' ? 'selected' : '' ?> value="km_desc">Chilometraggio decrescente</option>
								</select>
							</div>
						</div>
						<div class="active-filters-container">
							<?php

							if (count($_SESSION) != 0) {
								foreach ($_SESSION as $k => $v) {
									if (($k != 'pagina' && $k != 'order') && strlen($v) != 0) {
										$value = $v;
										if ($k == 'marca') {
											$value = $v == 'bmw' || $v == 'mg' || $v == 'ds' || $v == 'ktm' ? strtoupper($v) : ucfirst($v);
										}
										echo "<div class=\"automarca-active-filter\">
											<span class=\"filter-widged\">$value</span><a href=\"#\" class=\"remove-filter\" data-filter data-type=\"$k\"></a>
										</div>";
									}
								}
							}
							?>
						</div>
						<div class="remove-all-container mt-3">
							<p><a href="#" class="reset-link" id="reset-filters">Rimuovi tutti i filtri</a></p>
						</div>
						<div class="row mt-5 cars-grid">
							<?php
							if ($cars->have_posts()) {
								while ($cars->have_posts()) {
									$cars->the_post();
							?>
									<div class="col-12 col-md-6 col-xxl-4 car-item">
										<div class="title-container">
											<div class="title-5">
												<?= get_field('marca', get_the_ID()) ?><br> <?= get_field('modello', get_the_ID()) ?>
											</div>
											<p>
												<?= get_field('descrizione', get_the_ID()) ?>
											</p>
										</div>
										<img src="<?= get_field('foto_1', get_the_ID()); ?>" class="car-img" alt="">
										<div class="car-features">
											<table class="table car-features-table">
												<tbody>
													<tr>
														<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-data.svg" class="feature-icon" alt=""> <?= get_field('anno_immatricolazione', get_the_ID()); ?></td>
														<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-km.svg" class="feature-icon" alt=""> <?= get_field('km', get_the_ID()) ?> km</td>
													</tr>
													<tr>
														<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-alimentazione.svg" class="feature-icon" alt=""><?= get_field('alimentazione', get_the_ID()) ?></td>
														<td><img src="<?= get_template_directory_uri(); ?>/assets/images/home/icona-cambio.svg" class="feature-icon" alt=""><?= get_field('cambio', get_the_ID()) ?></td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="car-price">
											<p class="price-content">&euro; <?= number_format(floatval(get_field('field_60ffc47b7d1cf', get_the_ID())), 0, ',', '.'); ?></p>
											<p class="button-container"><a class="btn btn-automarca-car" href="<?= get_the_permalink(get_the_ID()) ?>"><span>Scopri <span class="arrow"></span></span></a></p>
										</div>
									</div>
							<?php
								};
							};

							?>
						</div>
						<?php if ($page_num > 1) : ?>
							<div class="row pt-5 mt-5">
								<div class="col-12">
									<nav aria-label="Page navigation example">
										<ul class="pagination automarca-pagination justify-content-center d-none d-xl-flex">
											<?php if ($paged != 1) : ?>
												<li class="page-item flex-grow-1">
													<a class="page-link text-link prev" href="<?= $url_params . $concat ?>pagina=<?= $paged - 1 ?>" aria-label="Previous">
														<span class="arrow"></span><span class="d-none d-sm-inline">Precedente</span>
													</a>
												</li>
												<?php
											endif;
											for ($y = $paged - 3; $y < $paged; $y++) {
												if ($y > 0) :
												?>
													<li class="page-item"><a class="page-link" href="<?= $url_params . $concat ?>pagina=<?= $y ?>"><?= $y ?></a></li>
											<?php
												endif;
											} ?>
											<li class="page-item active"><a class="page-link" href="<?= $url_params . $concat ?>pagina=<?= $paged ?>"><?= $paged  ?></a></li>
											<?php
											for ($i = $paged + 1; $i < $paged + 4 && $i <= $page_num; $i++) { ?>
												<li class="page-item"><a class="page-link" href="<?= $url_params . $concat ?>pagina=<?= $i ?>"><?= $i  ?></a></li>
											<?php
											}
											if ($paged < $page_num) :
											?>
												<li class="page-item flex-grow-1 text-end">
													<a class="page-link text-link next" href="<?= $url_params . $concat ?>pagina=<?= $paged + 1 ?>" aria-label="Next">
														<span class="d-none d-sm-inline">Successiva</span><span class="arrow"></span>
													</a>
												</li>
											<?php
											endif;
											?>
										</ul>
									</nav>
								</div>
							</div>
					</div>
				<?php
						endif;
				?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer(); ?>