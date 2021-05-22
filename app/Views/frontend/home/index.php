<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>


<main class="main" style="margin-top: 16vh">
    <section class="container" id="hero">
        <div class="row flex align-items-center">
            <div class="col-md-6">
                <div class="bg-hero">
                    <img src="<?= base_url() ?>/assets-fe/img/bg-hero.png" width="100%" alt="Gambar Semarang Kota" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    <h3>Selamat Datang di Website Sem<span style="color: #fb9128">arangku.</span> Layanan Masyarakat Kota Semarang</h3>
                    <p class="mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quam dolorem sapiente aliquam, molestiae inventore mollitia sunt nesciunt harum obcaecati laudantium tempora ipsa. Iusto, tempore! Laudantium in, porro.
                    </p>
                    <button class="btn btn-custom-primary mt-2 btn-hover-primary">Mulai Jelajahi</button>
                </div>
            </div>
        </div>
    </section>

    <section class="container" id="lowongan">
        <div class="title">
            <h3 class="text-center">Informasi Lowongan Pekerjaan</h3>
        </div>
        <div class="owl-carousel d-flex justify-content-between mt-5">
            <div class="bg-lowongan">
                <div class="p-5">
                    <div class="title">
                        <h5 class="fs-16 text-white">Frontend Developer</h5>
                        <h6 class="text-capitalize text-secondary">PT. Mencari Cinta Sejati</h6>
                    </div>
                    <div class="desc mt-3">
                        <ul class="ml-0 pl-3 text-white" style="line-height: 1.75rem">
                            <li>Fulltime - Rp. 6.000.000,-</li>
                            <li>Semarang</li>
                        </ul>
                    </div>

                    <p class="fw-300">Lamar sebelum Selasa, 24 Juni 2021</p>
                    <button class="btn btn-block btn-custom-primary mt-4 btn-hover-primary">Detail Lowongan</button>
                </div>
            </div>
        </div>
    </section>

    <section id="marketplace">
        <div class="bg-marketplace">
            <div class="p-5 container">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-6 mt-4">
                        <h3 class="text-light">
                            Jual beli barang secara online <br />
                            baru maupun bekas...
                        </h3>
                        <button class="btn btn-custom-primary mt-4 btn-hover-primary">Lihat Marketplace</button>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <img style="height: 400px" src="<?= base_url() ?>/assets-fe/img/shop.svg" alt="Image Shopping" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="wisata">
        <div class="title">
            <h3 class="text-center">#SemarangHebat</h3>
        </div>

        <div class="owl-carousel container d-flex justify-content-between mt-5">
            <div class="bg-wisata">
                <div>
                    <img src="<?= base_url() ?>/assets-fe/img/wisata-1.png" alt="Wisata 1" />
                </div>
                <div class="desc">
                    <h5>Tugu Muda</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quam dolorem sapiente aliquam,</p>
                </div>
            </div>
            <div class="bg-wisata">
                <div>
                    <img src="<?= base_url() ?>/assets-fe/img/wisata-1.png" alt="Wisata 1" />
                </div>
                <div class="desc">
                    <h5>Tugu Muda</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quam dolorem sapiente aliquam,</p>
                </div>
            </div>
            <div class="bg-wisata">
                <div>
                    <img src="<?= base_url() ?>/assets-fe/img/wisata-1.png" alt="Wisata 1" />
                </div>
                <div class="desc">
                    <h5>Tugu Muda</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quam dolorem sapiente aliquam,</p>
                </div>
            </div>
        </div>
    </section>
</main>


<script>
    $(".owl-carousel").owlCarousel({
        margin: 10,
        autoplay: true,
        autoplayHoverPause: true,
        loop: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            300: {
                items: 1,
                nav: false,
            },
            1000: {
                items: 3,
                nav: false,
            },
        },
    });
</script>

<?= $this->endSection() ?>