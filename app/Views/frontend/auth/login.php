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
            <div class="col-md-6">
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
            <div class="col-md-6">
                <h2 class="mb-5">Log in</h2>
                <form action="" class="mt-5">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" autocomplete="off" placeholder="User@mail.com" class="custom-input" name="email" id="email" />
                    </div>

                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input type="password" placeholder="******" class="custom-input" name="password" id="password" />
                    </div>

                    <div>
                        <button style="padding: 0.75rem 0" class="btn mt-4 btn-custom-primary btn-block">Log me in</button>
                        <p class="privacy-content">By proceeding, You understand and agree to Our use of the information that You submit in accordance with the provisions of the Privacy Policy.</p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?= $this->include('frontend/auth/footer') ?>