<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

<main class="page-wrapper">
	<header class="container-fluid section bg-red section-padding header-page">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row align-items-center">
					<div class="col-12 col-sm-6 text-center text-sm-start">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item active" aria-current="page"><?php the_title() ?></li>
							</ol>
						</nav>
					</div>
					<div class="col-12 col-sm-6 text-center text-sm-end">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/automarca-service.svg" width="250" alt="">
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
							Il nostro centro assistenza
						</div>
						<p>
							Da oltre 50 anni il reparto <strong>assistenza</strong> in Automarca è costantemente rivolto a fornirti l'assistenza necessaria a mantenere la tua vettura nelle migliori condizioni, così come quando l'hai acquistata. Ogni veicolo quando arriva in una delle nostre sedi, è trattato da tecnici altamente qualificati, che sapranno dedicare le attenzioni necessarie in ogni fase della manutenzione. I nostri servizi comprendono: lavoro di carrozzeria, elettrauto, riparazione meccanica, gommista, lavaggio, auto sostitutiva, ritiro e riconsegna veicolo.
						</p>
						<p>
							<a class="btn btn-automarca-1" href="<?= get_permalink(get_page_by_path('contatti')) ?>"><span>trova sede<span class="arrow"></span></span></a>
						</p>
					</div>
					<div class="col-12 col-lg-6 offset-xl-1 with-element mt-4 mt-lg-0">
						<img src="https://via.placeholder.com/1000x700" class="img-fluid" alt="">
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
							Sempre a disposizione per la manutenzione ordinaria e straordinaria del tuo veicolo.
						</div>
						<p>
							I tecnici di Automarca sono sempre al tuo fianco per ogni necessità, come la manutenzione ordinaria e straordinaria, con un servizio completo che ti accompagna fin dall’acquisto della tua vettura. Presso le nostre <strong>officine di Treviso, Mestre, Conegliano e Mogliano Veneto</strong>, mettiamo a tua disposizione un team di tecnici qualificati, costantemente formati e aggiornati sulle nuove tecnologie utilizzate.
						</p>
						<p>
							<a target="_blank" class="btn btn-automarca-1" href="https://www.fordautomarca.it/assistenza/prenota-intervento-officina-ford-treviso"><span>Prenota il tuo tagliando<span class="arrow"></span></span></a>
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
							Inconvenienti o anomalie? Analizziamo e risolviamo tutti i problemi del tuo mezzo.
						</div>
						<p>
							Il nostro personale del service inoltre, è a tua disposizione anche solo per darti le informazioni e i consigli sulle operazioni e i controlli più adatti da eseguire. Da noi troverai la garanzia di un’assistenza ufficiale con garanzia di un anno su tutti i ricambi utilizzati. Presso le nostre officine, avrai a disposizione una confortevole area di attesa, completa di collegamento Wi-Fi e quotidiani per rendere più piacevole l’attesa durante la riparazione. Per velocizzare le operazioni ti offriamo la possibilità di scaricare e compilare il <strong>Modulo Inconvenienti</strong> qui di seguito.
						</p>
						<p>
							<a target="_blank" class="btn btn-automarca-1" href="<?= get_template_directory_uri() ?>/assets/files/modulo-inconvenienti.pdf" download=""><span>Scarica il modulo inconvenienti<span class="arrow"></span></span></a>
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