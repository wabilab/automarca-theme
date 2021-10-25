<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

<main class="page-wrapper">
	<header class="container-fluid section bg-green section-padding header-page">
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
						<img src="<?= get_template_directory_uri(); ?>/assets/images/automarca-business.svg" width="250" alt="">
					</div>
				</div>
			</div>
		</div>
	</header>
	<section class="container-fluid section section-padding bg-light-blue-1">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row">
					<div class="col-12 col-lg-6 col-xl-5 align-self-center">
						<div class="title-1">
							Le nostre soluzioni per il vostro business
						</div>
						<p>
							Automarca pensa alle <strong>aziende</strong> e quindi alla gestione e creazione di flotte aziendali, alla vendita di furgoni e van a prezzi scontati, agevolati e con condizioni di sconto particolari che vengono pensate apposta per chi deve creare una squadra di veicoli da lavoro o necessita di un veicolo per il suo business.
						</p>
					</div>
					<div class="col-12 col-lg-6 offset-xl-1 with-element mt-4 mt-lg-0">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/business/soluzioni.jpg" class="img-fluid" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="container-fluid section section-padding bg-light-blue-1">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row">
					<div class="col-12 col-lg-6 with-element order-2 order-lg-1 mt-4 mt-lg-0">
						<img src="https://via.placeholder.com/1000x700" class="img-fluid" alt="">
					</div>
					<div class="col-12 col-lg-6 col-xl-5 offset-xl-1 align-self-center order-1 order-lg-2">
						<div class="title-1">
							Lavora senza pensieri
						</div>
						<p>
							Creare la tua <strong>flotta aziendale</strong> non è mai stato così semplice, noi con tutti i nostri brand possiamo farti scegliere il meglio e offrirti il comfort che cerchi. Infatti, nelle nostre 9 concessionarie mettiamo a disposizione auto con svariati optional e caratteristiche uniche.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="container-fluid section section-padding bg-light-blue-1">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row">
					<div class="col-12 col-lg-6 col-xl-5 align-self-center">
						<div class="title-1">
							Tutti i servizi dopo l'acquisto
						</div>
						<p>
							Poniamo un occhio di riguardo verso le aziende e i liberi professionisti anche dopo la vendita: la nostra attenzione infatti si muove verso l’assistenza dove riserviamo pacchetti di manutenzione, corsie preferenziali di intervento e sconti sul <strong>tagliando auto</strong> e assistenza.
						</p>
					</div>
					<div class="col-12 col-lg-6 offset-xl-1 with-element mt-4 mt-lg-0">
						<img src="https://via.placeholder.com/1000x700" class="img-fluid" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>