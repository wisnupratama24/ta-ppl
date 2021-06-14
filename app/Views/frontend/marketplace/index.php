<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>


<main class="main marketplace" style="margin-top: 16vh">
  <section class="container" id="lowongan-kerja" style="margin-top: 8rem">
    <div class="d-md-flex d-block justify-content-between">
      <div class="wrap-marketplace row">
        <div class="card-product col-md-4 col-6 mt-md-0 mt-4">
          <div>
            <img src="<?= base_url('uploads') ?>/default.png" alt="Foto Product">
          </div>
          <div class="decs-product mt-3" style="line-height: 10px;">
            <p class="fs-16">Celana Joger Keren</p>
            <p class="color-price fs-16">Rp. 10.000,-</p>
            <p class="mt-4 text-secondary fs-12">Post on 31 Juni 2019</p>
          </div>
        </div>

        <div class="card-product col-md-4 col-6 mt-md-0 mt-4">
          <div>
            <img src="<?= base_url('uploads') ?>/default.png" alt="Foto Product">
          </div>
          <div class="decs-product mt-3" style="line-height: 10px;">
            <p class="fs-16">Celana Joger Keren</p>
            <p class="color-price fs-16">Rp. 10.000,-</p>
            <p class="mt-4 text-secondary fs-12">Post on 31 Juni 2019</p>
          </div>
        </div>

        <div class="card-product col-md-4 col-6 mt-md-0 mt-4">
          <div>
            <img src="<?= base_url('uploads') ?>/default.png" alt="Foto Product">
          </div>
          <div class="decs-product mt-3" style="line-height: 10px;">
            <p class="fs-16">Celana Joger Keren</p>
            <p class="color-price fs-16">Rp. 10.000,-</p>
            <p class="mt-4 text-secondary fs-12">Post on 31 Juni 2019</p>
          </div>
        </div>
      </div>
      <div class="lowongan-right pl-4">
          <div> 
          <div>
              <div class="custom-input d-flex align-items-center">
                <span>
                  <i class="fa fa-search"></i>
                </span>
                <input type="text" class="custom-input-group pl-3" placeholder="Cari Barang" />
              </div>
            </div>

            <div class="">
              <button style="padding: 0.75rem 0" class="btn mt-4 btn-custom-primary btn-block">Cari Barang</button>
            </div>
          </div>
       <div>
          <?php if(session()->get('logged_in')) { ?>
              <button style="padding: 0.75rem 0" class="btn mt-4 btn-custom-primary btn-block">Jual Barang</button>

          <?php } else { ?>
              <div class="d-flex">
              <p>Jual barang? </p>
              <a href="">Login Sekarang</a>
              </div>
          <?php } ?>
       </div>
      </div>
    </div>
  </section>
</main>
<?= $this->endSection() ?>