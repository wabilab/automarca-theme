<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

<main class="page-wrapper">
	<header class="container-fluid section bg-transparent section-padding header-page">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row align-items-center">
					<div class="col-12 col-sm-6 text-center text-sm-start">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center justify-content-sm-start">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item active" aria-current="page"><?php the_title() ?></li>
							</ol>
						</nav>
					</div>
					<div class="col-12 col-sm-6 text-center text-sm-end">

					</div>
				</div>
			</div>
		</div>
	</header>
	<section class="container-fluid section section-padding-sm">
		<div class="row justify-content-center">
			<div class="col-12 col-xxl-10">
				<div class="row">
					<div class="col-12">
						<div class="title-1">
							Le nostre sedi
						</div>
						<div class="row inner-mar-top-2">
							<div class="col-12 col-md-6 col-xl-4 contact-item">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/contatti/automarca-silea.jpg" class="img-fluid contact-img " alt="">
								<div class="title-4 contact-title">SILEA</div>
								<p class="contact-info">
									Via Calzavara, 1<br>
									31057, Silea (TV)<br>
									info@automarca.it
								</p>
								<p class="contact-phone">
									<a href="tel:+3904223020"><img style="width: 20px" src="<?= get_template_directory_uri() ?>/assets/images/contatti/chiamaci.svg"> +39 0422 3020</a>
								</p>
								<p>
									<a class="btn btn-automarca-sm" href="<?= get_permalink(get_page_by_path('contatti/silea')) ?>"><span>Orari e contatti<span class="arrow"></span></span></a>
								</p>
							</div>
							<div class="col-12 col-md-6 col-xl-4 contact-item">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/contatti/automarca-conegliano.jpg" class="img-fluid contact-img " alt="">
								<div class="title-4 contact-title">CONEGLIANO</div>
								<p class="contact-info">
									Via Bradolini, 2/4<br>
									31020, San Fior (TV)<br>
									info@automarca.it
								</p>
								<p class="contact-phone">
									<a href="tel:+390438400446"><img style="width: 20px" src="<?= get_template_directory_uri() ?>/assets/images/contatti/chiamaci.svg"> +39 0438 400446</a>
								</p>
								<p>
									<a class="btn btn-automarca-sm" href="<?= get_permalink(get_page_by_path('contatti/conegliano')) ?>"><span>Orari e contatti<span class="arrow"></span></span></a>
								</p>
							</div>
							<div class="col-12 col-md-6 col-xl-4 contact-item">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/contatti/automarca-mestre.jpg" class="img-fluid contact-img " alt="">
								<div class="title-4 contact-title">MESTRE</div>
								<p class="contact-info">
									Via Linghindal, 10<br>
									30172, Mestre (VE)<br>
									info@automarca.it
								</p>
								<p class="contact-phone">
									<a href="tel:+390418628632"><img style="width: 20px" src="<?= get_template_directory_uri() ?>/assets/images/contatti/chiamaci.svg"> +39 0418 628632</a>
								</p>
								<p>
									<a class="btn btn-automarca-sm" href="<?= get_permalink(get_page_by_path('contatti/mestre')) ?>"><span>Orari e contatti<span class="arrow"></span></span></a>
								</p>
							</div>
							<div class="col-12 col-md-6 col-xl-4 contact-item">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/contatti/automarca-mogliano.jpg" class="img-fluid contact-img " alt="">
								<div class="title-4 contact-title">CENTRO DELL’USATO</div>
								<p class="contact-info">
									Via Marconi, 50<br>
									31021, Mogliano Veneto (TV)<br>
									info@automarca.it
								</p>
								<p class="contact-phone">
									<a href="tel:+390418622421"><img style="width: 20px" src="<?= get_template_directory_uri() ?>/assets/images/contatti/chiamaci.svg"> +39 041 8622421</a>
								</p>
								<p>
									<a class="btn btn-automarca-sm" href="<?= get_permalink(get_page_by_path('contatti/centro-dellusato')) ?>"><span>Orari e contatti<span class="arrow"></span></span></a>
								</p>
							</div>
							<div class="col-12 col-md-6 col-xl-4 contact-item">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/contatti/automarca-silea-fiera.jpg" class="img-fluid contact-img " alt="">
								<div class="title-4 contact-title">AUTOMARCA MAZDA</div>
								<p class="contact-info">
									Via Callalta, 21<br>
									31100, Fiera (TV)<br>
									mazdatreviso@automarca.it
								</p>
								<p class="contact-phone">
									<a href="tel:+390422362480"><img style="width: 20px" src="<?= get_template_directory_uri() ?>/assets/images/contatti/chiamaci.svg"> +39 0422 362480</a>
								</p>
								<p>
									<a class="btn btn-automarca-sm" href="<?= get_permalink(get_page_by_path('contatti/automarca-mazda')) ?>"><span>Orari e contatti<span class="arrow"></span></span></a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>