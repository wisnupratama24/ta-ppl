<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>
    <main class="main" style="margin-top: 16vh">
      <section class="container" id="hero">
        <div class="row flex align-items-top">
          <div class="col-md-6">
            <div class="figure">
              <img src="<?= base_url('uploads') ?>/default.png" width="100%" alt="Photo Product" id="mainImg" />
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
                <h4>Stock</h4>
                <h4>Lokasi</h4>
              </div>
              <div class="inputs">
                <h5>SMG_Jaya</h5>
                <h5>Fashion Anak</h5>
                <h5>Baru</h5>
                <h5>100</h5>
                <h5>Jl Rose 12345, Semarang  </h5>
              </div>
            </div>
          </div>
        </div>
        <div class="dproduk mt-5">
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
    <?= $this->endSection() ?>




