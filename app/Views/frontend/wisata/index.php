<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>

<main class="main" style="margin-top: 16vh">
      <section id="wisata">
        <div class="title">
          <h3 class="text-center font-weight-bold">5 Rekomendasi Tempat Wisata Semarang</h3>
        </div>

        <div class="owl-carousel container d-flex justify-content-between mt-5">
          <div class="bg-wisata">
            <div>
              <img src="<?= base_url()?>/assets-fe/img/wisata-5.png" alt="Wisata 1" />
            </div>
            <div class="desc">
              <h5>Tugu Muda</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quam dolorem sapiente aliquam,</p>
            </div>
          </div>
          <div class="bg-wisata">
            <div>
              <img src="<?= base_url()?>/assets-fe/img/wisata-6.png" alt="Wisata 1" />
            </div>
            <div class="desc">
              <h5>Kota Tua</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quam dolorem sapiente aliquam,</p>
            </div>
          </div>
          <div class="bg-wisata">
            <div>
              <img src="<?= base_url()?>/assets-fe/img/wisata-4.png" alt="Wisata 1" />
            </div>
            <div class="desc">
              <h5>Saloka Theme Park</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quam dolorem sapiente aliquam,</p>
            </div>
          </div>
        </div>
      </section>
    </main>


<?= $this->endSection() ?>