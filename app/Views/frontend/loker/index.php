<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>

<main class="main" style="margin-top: 16vh">
    <section class="container" id="lowongan-kerja" style="margin-top: 8rem">
        <div class="d-md-flex d-block justify-content-between">
            <div class="daftar-lowongan d-block" style="flex: 2">
                <div class="wrap-lowongan d-flex align-items-start px-3 pt-3 pb-5" style="border-bottom: 2px solid #9ca3af">
                    <div class="image-lowongan">
                        <img src="./assets/img/default.jpg" alt="Gmbar Lowongan" style="width: 220px" />
                    </div>
                    <div class="desc-lowongan ml-4">
                        <div class="title">
                            <h5>Frontend Developer</h5>
                            <p class="text-secondary fs-12 fw-500">PT. Nusa Bangsa Mandiri</p>
                        </div>
                        <div class="desc">
                            <ul class="ml-0 pl-3" style="line-height: 1.75rem">
                                <li>Fulltime - Rp. 6.000.000,-</li>
                                <li>Semarang</li>
                            </ul>
                        </div>
                        <p class="fw-400 fs-12">Lamar sebelum Selasa, 24 Juni 2021</p>
                        <button class="btn bg-blue-800 btn-custom-primary mt-2">Lamar Sekarang</button>
                    </div>
                </div>

                <div class="wrap-lowongan mt-5 d-flex align-items-start px-3 pt-3 pb-5" style="border-bottom: 2px solid #9ca3af">
                    <div class="image-lowongan">
                        <img src="./assets/img/default.jpg" alt="Gmbar Lowongan" style="width: 220px" />
                    </div>
                    <div class="desc-lowongan ml-4">
                        <div class="title">
                            <h5>Frontend Developer</h5>
                            <p class="text-secondary fs-12 fw-500">PT. Nusa Bangsa Mandiri</p>
                        </div>
                        <div class="desc">
                            <ul class="ml-0 pl-3" style="line-height: 1.75rem">
                                <li>Fulltime - Rp. 6.000.000,-</li>
                                <li>Semarang</li>
                            </ul>
                        </div>
                        <p class="fw-400 fs-12">Lamar sebelum Selasa, 24 Juni 2021</p>
                        <button class="btn bg-blue-800 btn-custom-primary mt-2">Lamar Sekarang</button>
                    </div>
                </div>

                <div class="wrap-lowongan mt-5 d-flex align-items-start px-3 pt-3 pb-5" style="border-bottom: 2px solid #9ca3af">
                    <div class="image-lowongan">
                        <img src="./assets/img/default.jpg" alt="Gmbar Lowongan" style="width: 220px" />
                    </div>
                    <div class="desc-lowongan ml-4">
                        <div class="title">
                            <h5>Frontend Developer</h5>
                            <p class="text-secondary fs-12 fw-500">PT. Nusa Bangsa Mandiri</p>
                        </div>
                        <div class="desc">
                            <ul class="ml-0 pl-3" style="line-height: 1.75rem">
                                <li>Fulltime - Rp. 6.000.000,-</li>
                                <li>Semarang</li>
                            </ul>
                        </div>
                        <p class="fw-400 fs-12">Lamar sebelum Selasa, 24 Juni 2021</p>
                        <button class="btn bg-blue-800 btn-custom-primary mt-2">Lamar Sekarang</button>
                    </div>
                </div>
            </div>
            <div class="lowongan-right pl-4">
                <div>
                    <div class="custom-input d-flex align-items-center">
                        <span>
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="custom-input-group pl-3" placeholder="Cari Lowongan" />
                    </div>
                </div>

                <div class="">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="parttime" name="jenis-lowongan" class="custom-control-input" />
                        <label class="custom-control-label" for="parttime">Part Time</label>
                    </div>
                    <div class="custom-control custom-radio mt-2">
                        <input type="radio" id="fulltime" name="jenis-lowongan" class="custom-control-input" />
                        <label class="custom-control-label" for="fulltime">Full Time</label>
                    </div>

                    <button style="padding: 0.75rem 0" class="btn mt-4 btn-custom-primary btn-block">Cari Lowongan</button>
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection() ?>