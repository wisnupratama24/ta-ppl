<?= $this->include('frontend/auth/header') ?>
<nav>
    <div class="navbar-login container p-4 d-flex flex-md-row flex-column justify-content-between align-items-md-center">
        <?= $this->include('frontend/main/logo'); ?>
    </div>
</nav>

<div class="row mt-4">
    <div class="col-md-4 col-10 mx-auto">
        <h2 class="mb-5">Reset Kata Sandi</h2>
        <div id="alert">
        </div>

        <form action="<?= base_url('password/reset/process') ?>" method="POST" class="mt-5" id="form-reset">
            <?php csrf_field() ?>
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="csrf" />

            <div class="form-group mt-3">
                <label for="password">Password Baru</label>
                <input type="password" placeholder="******" class="form-control custom-input" name="password" id="password">
            </div>

            <div class="form-group mt-3">
                <label for="password_conf">Konfirmasi Password Baru</label>
                <input type="password" placeholder="******" class="form-control custom-input" name="password_conf" id="password_conf">
            </div>

            <div>
                <button type="submit" id="btn-reset" style="padding: 0.75rem 0;" class="btn mt-4 btn-custom-primary btn-block">Reset Kata Sandi</button>
            </div>
        </form>

    </div>
</div>


<script>
    var form = document.querySelector("#form-reset");
    $('#form-reset').submit(function(e) {
        disabled_button('btn-reset');
        $('#alert').html('');
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('password/reset/process') ?>',
            method: "POST",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                disabled_button('btn-reset');
            },
            complete: function() {
                $('#btn-reset').removeAttr('disabled');
                $('#btn-reset').html("Reset Kata Sandi")
                $('#btn-reset').removeClass('btn-secondary');
                $('#btn-reset').addClass('btn-custom-primary');
            },
            success: function(response) {
                $('.csrf').val(response.token);
                console.log(response);
                if (response.state == false) {
                    var responseError = response.error;
                    $.each(responseError, function(key, message) {
                        if (message != '') {
                            var elm = $('.' + key).length;
                            if (elm > 0) {
                                $('#' + key).next().remove();
                            }
                            var htmlFeedback = invalidFeedback(key, message);
                            $('#' + key).addClass('is-invalid');
                            $('#' + key).after(htmlFeedback);
                        } else {
                            $('#' + key).removeClass('is-invalid');
                        }
                    })

                    if (response.msg != undefined) {

                        $('html, body').animate({
                            scrollTop: $("html, body").offset().top
                        }, 1000);
                        window.scrollTo(0, 100);

                        var htmlFailed = `
                        <div class="alert alert-danger" role="alert">
                           ${response.msg}
                        </div>`;

                        $('#alert').html(htmlFailed);
                    }


                } else {
                    $('html, body').animate({
                        scrollTop: $("html, body").offset().top
                    }, 1000);
                    window.scrollTo(0, 100);

                    $('#form-reset').trigger('reset');
                    $(".is-invalid").removeClass('is-invalid'); //...
                    $('.invalid-feedback').remove();

                    var htmlSuccess = `
                    <div class="alert alert-success" role="alert">
                       ${response.msg}
                    </div>`;

                    $('#alert').html(htmlSuccess);
                }

            },
            error: function(xhr, ajaxOptions, thrownError) {
                error_handler("<?= base_url('register') ?>", xhr, thrownError);
            }
        })

    });

    function invalidFeedback(key, msg) {
        var htmlFeedback = `<div class="invalid-feedback ${key}" style='margin-top:-20px;'> ${msg}</div>`
        return htmlFeedback;
    }
</script>
<?= $this->include('frontend/auth/footer') ?>