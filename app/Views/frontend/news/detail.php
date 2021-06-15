<?php

use App\Libraries\Convert;

$convert = new Convert();

?>
<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>


<main class="main" style="margin-top: 16vh">
  <section class="container" id="lowongan-kerja" style="margin-top: 8rem">
    <div class="d-md-flex d-block justify-content-between">
      <div class="daftar-berita">

        <nav aria-label="breadcrumb" style="margin-left:-10px;">
          <ol class="breadcrumb fs-12" style="background: none;">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="color-secondary"><?= appName ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $berita['judul'] ?></li>
          </ol>
        </nav>


        <h6 class="font-weight-bold pb-3" style="font-size: 28px"><?= $berita['judul'] ?></h6>
        <p class="text-secondary fs-12 fw-500">BY <span style="color: #fb9128"><?= $berita['nama'] ?> </span> <?= $convert->tanggal_indo($berita['created_at']) ?></p>
        <div class="bg-hero">
          <img src="<?= base_url('uploads') ?>/<?= $berita['image'] ?>" width="100%" alt="Gambar Berita" />
          <div class="pt-4" style="font-size: 15px">
            <!-- <span style="font-weight: bold">Semarang, 13 Mei 2021</span> -->
            <?= $berita['isi'] ?>
          </div>
        </div>
      </div>

      <div class="berita-right pl-4">
        <div>
          <div class="custom-input d-flex align-items-center">
            <span>
              <i class="fa fa-search"></i>
            </span>
            <input type="text" class="custom-input-group pl-3" placeholder="Cari Berita" />
          </div>
        </div>

        <div class="sidebar">
          <h6 class="font-weight-bold pb-3" style="font-size: 22px">Lowongan <span style="color: #fb9128"> Terbaru</span></h6>
          <div class="d-flex flex-column">
            <?php $no = 1;
            foreach ($loker as $lo) { ?>
              <?php if ($no <= 3) { ?>
                <div class="mt-1">
                  <img src="<?= base_url('uploads') ?>/<?= $lo['image'] ?>" alt="<?= $lo['posisi'] ?>" />
                  <div class="desc-lowongan ml-4 pb-3">
                    <div class="title">
                      <h6 class="fs-16"><?= $lo['posisi'] ?></h6>
                      <div class="pl-5">
                        <ul class="fs-12" style="line-height: 1.275rem">
                          <li><?= $lo['tipe'] ?> - Rp. <?= $convert->ribuan($lo['gaji']) ?>,-</li>
                          <li><?= $lo['lokasi'] ?></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>

            <?php } ?>
          </div>
        </div>
      </div>

  </section>
</main>
<?= $this->endSection() ?>