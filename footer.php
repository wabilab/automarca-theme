<?php

/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<footer class="footer container-fluid">
	<div class="row justify-content-center bg-blue">
		<div class="col-12 col-xxl-10">
			<div class="row footer-top gx-4 gx-md-0">
				<div class="col-12 col-md-6 logo-container">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/logo.svg" width="300" class="footer-logo" alt="">
				</div>
				<div class="col-12 col-md-4 col-lg-3 col-xxl-2 ms-auto text-end align-self-end social-container">
					<ul class="nav justify-content-center justify-content-md-between">
						<li class="nav-item">
							<a class="nav-link social-link" target="_blank" rel="nofollow, external" href="https://www.facebook.com/AutomarcaSpA/"><img src="<?= get_template_directory_uri(); ?>/assets/images/facebook.svg" class="social-icon" alt=""></a>
						</li>
						<li class="nav-item">
							<a class="nav-link social-link" target="_blank" rel="nofollow, external" href="https://wa.me/393519391880"><img src="<?= get_template_directory_uri(); ?>/assets/images/whatsapp.svg" class="social-icon" alt=""></a>
						</li>
						<li class="nav-item">
							<a class="nav-link social-link" target="_blank" rel="nofollow, external" href="https://www.youtube.com/channel/UCsgjZdLKwRdRg_3GwM6ut6Q"><img src="<?= get_template_directory_uri(); ?>/assets/images/youtube.svg" class="social-icon" alt=""></a>
						</li>
						<li class="nav-item">
							<a class="nav-link social-link" target="_blank" rel="nofollow, external" href="https://www.linkedin.com/company/automarca-s.p.a./"><img src="<?= get_template_directory_uri(); ?>/assets/images/linkedin.svg" class="social-icon" alt=""></a>
						</li>
						<li class="nav-item">
							<a class="nav-link social-link" target="_blank" rel="nofollow, external" href="https://www.instagram.com/automarca_ford/"><img src="<?= get_template_directory_uri(); ?>/assets/images/instagram.svg" class="social-icon" alt=""></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row footer-bottom justify-content-center justify-content-xl-between">
				<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start">
					<p>
						<strong>Automarca Plus</strong><br>
						Via Guglielmo Marconi, 50 - 31021<br>
						Mogliano Veneto (TV)<br>
						T. +39 041 8622421
					</p>
				</div>
				<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start mar-t-xs-30">
					<p>
						<strong>Automarca SpA (San Fior)</strong><br>
						Via Bradolini, 2/4 - 31020<br>
						San Fior (TV)<br>
						T. +39 0438 400446
					</p>
				</div>
				<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start mar-t-sm-30">
					<p>
						<strong>Automarca SpA (Silea)</strong><br>
						Via Ernesto Calzavara, 1 - 31057<br>
						Silea (TV)<br>
						T. +39 0422 3020
					</p>
				</div>
				<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start mar-t-lg-30">
					<p>
						<strong>Automarca SpA (Mestre)</strong><br>
						Via Linghindal, 10 - 30172<br>
						Mestre (VE)<br>
						T. +39 0418 628632
					</p>
				</div>
				<div class="col-12 col-sm-6 col-md-4 col-xl-auto text-center text-xl-start mar-t-lg-30">
					<p>
						<strong>Concessionaria Mazda Treviso</strong><br>
						Via Callalta, 21 - 31100<br>
						Fiera (TV)<br>
						T. +39 0422 362480
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row lower-footer justify-content-center">
		<div class="col-12 col-xxl-10">
			<div class="row">
				<div class="col-12 col-xl-4">
					<p>&copy; <?= date('Y') ?> Tutti i diritti riservati - Automarca S.p.A. - Via Ernesto Calzavara 1, Silea (TV)<br>
						P.IVA 00191440262 - REA TV n.97656 Cap. Soc. € 500.000 i.v.</p>
				</div>
				<div class="col-12 col-xl-8">
					<ul class="nav flex-column flex-sm-row legal-links justify-content-end align-items-center">
						<a href="#" class="nav-link">Privacy Policy Ford Italia</a>
						<a href="#" class="nav-link">Privacy Policy Automarca S.P.A.</a>
						<a href="#" class="nav-link">Cookie Policy</a>
						<a href="#" class="nav-link">Impostazioni di tracciamento</a>
						<a href="#" class="nav-link">Termini e condizioni</a>
						<a href="https://www.wabi.it" target="_blank" class="nav-link">Credits</a>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer> <!-- end .footer -->

<?php wp_footer(); ?>

</body>

</html> <!-- end page -->