<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>
    <main class="main" style="margin-top: 16vh">
      <section class="container" id="hero">
        <div class="row flex align-items-top">
          <div class="col-md-6">
            <div class="figure">
              <img src="<?= base_url()?>/assets-fe/img/bg-hero.png" width="100%" alt="Gambar Semarang Kota" id="mainImg" />
            </div>
            <div class="owl-carousel owl-theme mt-5">
              <img src="<?= base_url()?>/assets-fe/img/news-1.jpeg" alt="" id="thumb1" class="img-publish" />
              <img src="<?= base_url()?>/assets-fe/img/bg-hero.png" alt="" id="thumb2" class="img-publish" />
              <img src="<?= base_url()?>/assets-fe/img/default.jpg" alt="" id="thumb3" class="img-publish" />
              <img src="<?= base_url()?>/assets-fe/img/news-1.jpeg" alt="" id="thumb4" class="img-publish" />
              <img src="<?= base_url()?>/assets-fe/img/wisata-1.png"s alt="" id="thumb5" class="img-publish" />
              <img src="<?= base_url()?>/assets-fe/img/bg-wisata-2.png" alt="" id="thumb6" class="img-publish" />
              <img src="<?= base_url()?>/assets-fe/img/wisata-3.png" alt="" id="thumb7" class="img-publish" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="title">
              <h3>Nama Produk</h3>
              <h2 class="mt-3">Rp. 000000000</h2>
              <hr align="center" size="2" noshade />
              <p></p>
              <div class="column">
                <h4>Merk</h4>
                <h4>Kategori</h4>
                <h4>Kondisi</h4>
                <h4>Lokasi</h4>
                <h4>Stock</h4>
              </div>
              <div class="inputs">
                <h5>SMG_Jaya</h5>
                <h5>Fashion Anak</h5>
                <h5>Baru</h5>
                <h5>Jl Rose 12345, Semarang</h5>
                <h5>100</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="dproduk">
          <h3>Deskripsi Produk</h3>
          <p ml-2>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus voluptatum, provident iste eum pariatur accusantium et totam maiores sint impedit eius fuga aspernatur quisquam adipisci vero. Ratione, laudantium. Provident,
            debitis!
          </p>
          <p ml-2>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus voluptatum, provident iste eum pariatur accusantium et totam maiores sint impedit eius fuga aspernatur quisquam adipisci vero. Ratione, laudantium. Provident,
            debitis!
          </p>
          <button class="btn btn-custom-primary btn-hover-primaryy">Chat Penjual</button>
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




