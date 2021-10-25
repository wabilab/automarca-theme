jQuery(document).ready(function($) {
    console.log(base_data);

    $("#info-form").on("submit", function (e) {
        e.preventDefault();
        $form = $(this);
        var formData = new FormData($form[0]);
        $.ajax({
            url: "http://localhost:8888/wp-json/forms/v1/add-lead",
            type: "POST",
            beforeSend: function (xhr) {
                xhr.setRequestHeader("X-WP-Nonce", base_data.nonce);
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (data, status, xhr) {
                /* $(".form-messages").fadeOut(100, function () {
                    $(this)
                        .empty()
                        .delay(200)
                        .append(
                            '<p id="form-message" class="text-small"><strong>La richiesta è stata inviata con successo!</strong></p>'
                        )
                        .fadeIn(100);
                }); */
                console.log('successo xml');
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
                console.log(data);
                /* $(".form-messages").fadeOut(100, function () {
                    $(this)
                        .empty()
                        .delay(200)
                        .append(
                            '<p id="form-message" class="text-small"><strong>Ops! C\'è stato un errore! Riprovare più tardi!</strong></p>'
                        )
                        .fadeIn(100);
                }); */
            },
        });
    });


    
});
