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
        <div class="content">
            <div class="col-md-6 ">
                <h6>Berita Terbaru</h6>
                <div class="news-login mt-4">
                    <div class="d-flex">
                        <div class="mr-3">
                            <img src="/assets/img/news-1.jpeg" width="130px" alt="Berita" />
                        </div>
                        <div>
                            <div class="d-flex justify-content-between w-75">
                                <p style="font-size: 12px; color: #fb9128">News Update</p>
                                <p class="tanggal-news">18 Apr</p>
                            </div>
                            <a href="/" class="title-news">
                                <h6>Hendi Tegaskan Masuk Semarang Wajib Isi Aplikasi Sidatang</h6>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex my-4">
                        <div class="mr-3">
                            <img src="/assets/img/news-1.jpeg" width="130px" alt="Berita" />
                        </div>
                        <div>
                            <div class="d-flex justify-content-between w-75">
                                <p style="font-size: 12px; color: #fb9128">News Update</p>
                                <p class="tanggal-news">18 Apr</p>
                            </div>
                            <a href="/" class="title-news">
                                <h6>Hendi Tegaskan Masuk Semarang Wajib Isi Aplikasi Sidatang</h6>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="mr-3">
                            <img src="/assets/img/news-1.jpeg" width="130px" alt="Berita" />
                        </div>
                        <div>
                            <div class="d-flex justify-content-between w-75">
                                <p style="font-size: 12px; color: #fb9128">News Update</p>
                                <p class="tanggal-news">18 Apr</p>
                            </div>
                            <a href="/" class="title-news">
                                <h6>Hendi Tegaskan Masuk Semarang Wajib Isi Aplikasi Sidatang</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-md-0 mb-5">
                <h2 class="mb-5">Log in</h2>
                <div id="alert">
                </div>
                <form action="<?= base_url('login/process') ?>" method="POST" class="mt-5" id="form-login">
                    <?php csrf_field() ?>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="csrf" />
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" required autocomplete="off" placeholder="User@mail.com" class="custom-input" name="email" id="email" />
                    </div>

                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input type="password" required placeholder="******" class="custom-input" name="password" id="password" />
                    </div>

                    <div>
                        <button type="submit" id="btn-login" style="padding: 0.75rem 0" class="btn mt-4 btn-custom-primary btn-block">Log me in</button>
                        <p class="privacy-content">Dengan melanjutkan, Anda memahami dan menyetujui penggunaan Kami atas informasi yang Anda sampaikan sesuai dengan ketentuan Kebijakan Privasi.</p>
                    </div>

                    <div class="mt-5 text-center d-flex fs-12 justify-content-center">
                        <p class="text-secondary "> Lupa kata sandi? </p> <a href="<?= base_url('password/forgot') ?>" class="ml-1">Klik Disini</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<script>
    var form = document.querySelector("#form-login");
    $('#form-login').submit(function(e) {
        disabled_button('btn-login');
        $('#alert').html('');
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('login/process') ?>',
            method: "POST",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                disabled_button('btn-login');
            },
            complete: function() {
                $('#btn-login').removeAttr('disabled');
                $('#btn-login').html("Log me in")
                $('#btn-login').removeClass('btn-secondary');
                $('#btn-login').addClass('btn-custom-primary');
            },
            success: function(response) {
                $('.csrf').val(response.token);
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
                    window.location.href = '/';
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