<?= $this->include('frontend/auth/header') ?>
<nav>
    <div class="navbar-login container p-4 d-flex flex-md-row flex-column justify-content-between align-items-md-center">
        <?= $this->include('frontend/main/logo'); ?>
        <div class="d-flex mt-md-0 mt-4">
            <p class="text-secondary mr-4 my-auto">Sudah punya akun? </p>
            <a href="<?= base_url('login') ?>" class="btn btn-register text-dark">Login</a>
        </div>
    </div>
</nav>

<div class="row mt-4">
    <div class="col-md-4 col-10 mx-auto">
        <h2 class="mb-5">Register</h2>
        <div id="alert">
        </div>

        <form action="<?= base_url('register/process') ?>" method="POST" class="mt-5" id="form-register">
            <?php csrf_field() ?>
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="csrf" />
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" placeholder="Nama Lengkap" class="form-control custom-input" name="nama" id="nama">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" autocomplete="off" placeholder="User@mail.com" class="form-control custom-input " name="email" id="email">
            </div>

            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" placeholder="******" class="form-control custom-input" name="password" id="password">
            </div>

            <div class="form-group mt-3">
                <label for="password_conf">Password</label>
                <input type="password" placeholder="******" class="form-control custom-input" name="password_conf" id="password_conf">
            </div>

            <div class="form-group mt-3">
                <label for="tlp">Telp</label>
                <input type="text" placeholder="0812345678" class="form-control custom-input" name="tlp" id="tlp">
            </div>

            <div>
                <button type="submit" id="btn-register" style="padding: 0.75rem 0;" class="btn mt-4 btn-custom-primary btn-block">Register</button>
                <p class="privacy-content">By proceeding, You understand and agree to Our use of the information that You submit in accordance with the provisions of the Privacy Policy.</p>
            </div>
        </form>

    </div>
</div>


<script>
    var form = document.querySelector("#form-register");
    $('#form-register').submit(function(e) {
        $('#alert').html('');
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('register/process') ?>',
            method: "POST",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                disabled_button('btn-register');
            },
            complete: function() {
                $('#btn-register').removeAttr('disabled');
                $('#btn-register').html("Register");
                $('#btn-register').removeClass('btn-secondary');
                $('#btn-register').addClass('btn-custom-primary');
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

                    $('#form-register').trigger('reset');
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
        var htmlFeedback = `<div class="invalid-feedback ${key}" style='margin-top:-20px;'> ${msg}</div>`;
        return htmlFeedback;
    };
</script>
<?= $this->include('frontend/auth/footer') ?>