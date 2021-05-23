<?= $this->include('frontend/auth/header') ?>

<nav>
    <div class="navbar-login container p-4 d-flex flex-md-row flex-column justify-content-between align-items-md-center">
        <?= $this->include('frontend/main/logo') ?>

        <div class="d-flex mt-md-0 mt-4">
            <p class="text-secondary mr-4 my-auto">Tidak punya akun?</p>
            <a href="<?= base_url('register') ?>" class="btn btn-register text-dark">Register</a>
        </div>
    </div>
</nav>

<main class="main d-flex align-items-center mt-md-5 mt-3">
    <section class="login container p-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2 class="mb-2 text-center">Lupa Kata Sandi</h2>
                <div class="text-center text-secondary mb-5">
                    Kami akan mengirimkan link untuk mengatur ulang kata sandimu
                </div>

                <div id="alert">
                </div>
                <form action="<?= base_url('password/forgot/process') ?>" method="POST" class="mt-5" id="form-forgot">
                    <?php csrf_field() ?>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="csrf" />
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" required autocomplete="off" placeholder="User@mail.com" class="custom-input" name="email" id="email" />
                    </div>

                    <div>
                        <button type="submit" style="padding: 0.75rem 0" id="btn-forgot" class="btn mt-4 btn-custom-primary btn-block">Kirim link verifikasi</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>


<script>
    var form = document.querySelector("#form-forgot");
    $('#form-forgot').submit(function(e) {
        disabled_button('btn-forgot');
        $('#alert').html('');
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('password/forgot/process') ?>',
            method: "POST",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                disabled_button('btn-forgot');
            },
            complete: function() {
                $('#btn-forgot').removeAttr('disabled');
                $('#btn-forgot').html("Kirim link verifikasi")
                $('#btn-forgot').removeClass('btn-secondary');
                $('#btn-forgot').addClass('btn-custom-primary');
            },
            success: function(response) {
                $('.csrf').val(response.token);
                console.log(response);
                if (response.state == false) {
                    var responseError = response.error;

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

                    $('#form-forgot').trigger('reset');
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