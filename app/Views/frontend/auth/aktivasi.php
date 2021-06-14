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
        <h2 class="mb-5 text-center">Aktivasi Akun</h2>
        <?php if ($is_active == 0) { ?>
            <p>
                Hallo, <?= $nama ?>
                <br> <br>
                Terimakasih telah melakukan pendaftaran pada website Semarangku, untuk aktivasi akun silahkan klik tombol dibawah ini :
            </p>

            <div id="alert">
            </div>
            <form action="<?= base_url('register/aktivasi') ?>" method="POST" class="mt-5" id="form-aktivasi">
                <?php csrf_field() ?>
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="csrf" />
                <input type="hidden" name="hash" value="<?= $hash ?>">
                <div>
                    <button type="submit" id="btn-aktivasi" style="padding: 0.75rem 0;" class="btn mt-4 btn-custom-primary btn-block">Aktivasi Akun</button>
                </div>
            </form>
        <?php } else { ?>
            <p class="my-3">
                Hallo, <?= $nama ?>
                <br> <br>
                Akun ini telah terverifikasi, silahkan login
            </p>

            <a href="<?= base_url('login') ?>" style="padding: 0.75rem 0;" class="btn mt-4 btn-custom-primary btn-block">Login</a>
        <?php } ?>

    </div>
</div>


<script>
    var form = document.querySelector("#form-aktivasi");
    $('#form-aktivasi').submit(function(e) {
        disabled_button('btn-aktivasi');
        $('#alert').html('');
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('register/aktivasi') ?>',
            method: "POST",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                disabled_button('btn-aktivasi');
            },
            complete: function() {
                $('#btn-aktivasi').removeAttr('disabled');
                $('#btn-aktivasi').html("Aktivasi Akun")
                $('#btn-aktivasi').removeClass('btn-secondary');
                $('#btn-aktivasi').addClass('btn-custom-primary');
            },
            success: function(response) {
                $('.csrf').val(response.token);
                console.log(response);
                if (response.state == false) {

                    if (response.msg != undefined) {

                        $('html, body').animate({
                            scrollTop: $("html, body").offset().top
                        }, 1000);
                        window.scrollTo(0, 100);

                        var htmlFailed = `
                        <div class="alert mt-4 alert-danger" role="alert">
                           ${response.msg}
                        </div>`;

                        $('#alert').html(htmlFailed);
                    }


                } else {
                    $('html, body').animate({
                        scrollTop: $("html, body").offset().top
                    }, 1000);
                    window.scrollTo(0, 100);

                    var htmlSuccess = `
                    <div class="alert mt-4 alert-success" role="alert">
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
</script>
<?= $this->include('frontend/auth/footer') ?>