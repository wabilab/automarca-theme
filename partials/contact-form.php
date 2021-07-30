<section class="container-fluid section section-padding-sm bg-light-blue">
    <div class="row justify-content-center">
        <div class="col-12 col-xxl-10">
            <div class="title-2">
                Contattaci ora!
            </div>
            <form class="row contact-form" action="#">
                <input type="hidden" id="branch-offices" name="branch_office" value="<?= $branch_name ?>">
                <div class="col-12 col-md-6 form-col">
                    <input type="text" class="form-control" name="first_name" id="first-name" placeholder="Nome*" required>
                </div>
                <div class="col-12 col-md-6 form-col">
                    <input type="text" class="form-control" name="last_name" id="last-name" placeholder="Cognome*" required>
                </div>
                <div class="col-12 col-md-6 form-col">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email*" required>
                </div>
                <div class="col-12 col-md-6 form-col">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Telefono*" required>
                </div>
                <div class="col-12 form-col">
                    <textarea name="message" class="form-control" id="message" rows="10" placeholder="Messaggio*" required></textarea>
                </div>
                <div class="col-12 form-col">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="privacy" required>
                        <label class="form-check-label" for="privacy">(Richiesto) Acconsento al trattamento dei dati personali - <a href="#">Privacy policy</a></label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="cookie">
                        <label class="form-check-label" for="cookie">(Facoltativo) Acconsento al trattamento dei dati per fini commerciali e di marketing</label>
                    </div>
                </div>
                <div class="col-12 form-col">
                    <button type="submit" class="btn btn-automarca">Invia richiesta</button>
                </div>
            </form>
        </div>
    </div>
</section>