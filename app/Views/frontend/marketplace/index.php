<?php

use App\Libraries\Convert;

$convert = new Convert();

?>

<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>


<main class="main marketplace" style="margin-top: 16vh">
  <section class="container" id="lowongan-kerja" style="margin-top: 8rem">
    <div class="d-md-flex d-block justify-content-between">
      <div class="wrap-marketplace row" >

        <?php foreach ($barang as $data) { ?>
          <div class="card-product mr-3 mt-md-0 mt-4">
            <div>
              <img src="<?= base_url('uploads') ?>/<?= $data['image'] ?>" alt="Foto Product">
            </div>
            <div class="decs-product mt-3" style="line-height: 10px;width:100%;">
              <a href="<?= base_url('marketplace/detail') ?>/<?= $data['id'] ?>" style="text-decoration: none;" class="text-dark">
                <p class="fs-16"><?= $data['nama'] ?></p>
              </a>
              <p class="color-price fs-16">Rp. <?= $convert->ribuan($data['harga']) ?>,-</p>
              <p class="mt-4 text-secondary fs-12"><?= $convert->tanggal_indo($data['created_at'], true) ?></p>
            </div>
          </div>

        <?php } ?>

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
          <?php if (session()->get('logged_in')) { ?>
            <a href="<?= base_url('marketplace/form') ?>" style="padding: 0.75rem 0" class="btn mt-4 btn-custom-primary btn-block btn-color-green">Jual Barang</a>

          <?php } else { ?>
            <div class="d-flex mt-3">
              <p>Jual barang? </p>
              <a href="<?= base_url('/login') ?>" class="ml-2">Login Sekarang</a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
</main>
<?= $this->endSection() ?>