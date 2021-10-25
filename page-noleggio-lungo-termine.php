<?php

/**
 * Pagina Noleggio
 */

get_header(); ?>

<main class="page-wrapper">
	<header class="container-fluid section bg-blue-1 section-padding header-page">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row align-items-center">
					<div class="col-12 col-md-6">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item active" aria-current="page"><?php the_title() ?></li>
							</ol>
						</nav>
					</div>
					<div class="col-12 col-md-6 text-end">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/automarca-noleggio.svg" width="250" alt="">
					</div>
				</div>
			</div>
		</div>
	</header>
	<section class="container-fluid section section-padding-sm bg-light-blue-1">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10 text-center">
				<div class="title-1 mar-big">
					<?php the_title() ?>
				</div>
				<p>Il Noleggio a Lungo Termine Ford Business Partner è l’alternativa alla proprietà, dedicato a privati ed aziende, che consente di utilizzare la tua Ford con la certezza dei costi, senza alcuna preoccupazione.</p>
				<p>Scopri tutti i vantaggi presso AUTOMARCA S.P.A. a Treviso e Venezia</p>
			</div>
		</div>
	</section>
	<section class="container-fluid section section-padding bg-light-blue-1">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row">
					<div class="col-12 col-lg-6 col-xl-5 align-self-center">
						<div class="title-1">
							Servizi inclusi nel canone mensile:
						</div>
						<p>
							<strong>Manutenzione ordinaria</strong><br>
							Include tutti i controlli e le sostituzioni previste in modo periodico per il tagliando di manutenzione, come il cambio dell’olio e del filtro dell’olio.<br>
							<strong>Manutenzione straordinaria</strong><br>
							Include le sostituzioni che vengono eseguite una tantum e le operazioni complesse che prevedono la sostituzione di parti danneggiate o usurate.<br>
							<strong>Assistenza</strong><br>
							- Assistenza e soccorso stradale H24<br>
							- Vettura sostitutiva (disponibile su richiesta)
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
							Coperture incluse nel canone mensile:
						</div>
						<p>
							<strong>Copertura assicurativa completa</strong>
							- RCAuto<br>
							- Incendio e Furto<br>
							- Danni al veicolo<br>
							- Infortuni<br>
							- Spese mediche del conducente a seguito d’incidente<br>
							- Gestione sinistri<br>
							<strong>Nessun costo aggiuntivo</strong><br>
							- Costi di immatricolazione inclusi<br>
							- Canone mensile fisso<br>
							- Nessuna spesa imprevista
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
							Con il Noleggio Ford Business Partner sei libero di:
						</div>
						<p>
							- Scegliere il tuo veicolo all’interno della gamma Ford<br>
							- Definire il chilometraggio e il periodo di tempo del noleggio compreso tra 12 e 72 mesi<br>
							- Decidere la quota di anticipo/deposito da versare<br>
							- Definire i servizi di cui necessiti grazie alla modularità del prodotto<br>
							I nostri consulenti ti comunicaranno immediatamente un esempio di quotazione dei canoni mensili. Al termine del contratto potrai decidere se lasciare il mezzo senza dover corrispondere nessun’altra somma (salvo eventuali danni o esubero chilometrico) o se ripartire con una nuova Ford con Ford Business Partner.
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