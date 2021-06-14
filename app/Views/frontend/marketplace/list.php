<?php

use App\Libraries\Convert;

$convert = new Convert();

?>

<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>


<main class="main" id="post-product" style="margin-top: 16vh">
  <div class="container">
    <div class="title d-flex align-items-center">
      <div class="icon " style="background-color: #F8BD49;width:90px; height:90px; border-radius:50%;position: relative;">
        <div class="d-flex justify-content-center align-items-center" style="position: absolute; top:20%; left:20%;">
          <i class="fa fa-shopping-cart fa-3x"></i>
        </div>
      </div>
      <p class="fw-600 ml-4" style="font-size:36px;">Jualanku</p>
    </div>

    <div class="py-3">
      <hr>
    </div>

    <div>
      <?php foreach ($barang as $data) { ?>
        <div class="card w-100 my-3">
          <div class="card-body d-flex">
            <div>
              <img src="<?= base_url() ?>/uploads/<?= $data['image'] ?>" alt="<?= $data['nama'] ?>" style="width: 150px; height:150px;">
            </div>
            <div class="decs-product ml-3" style="line-height: 10px;">
              <div class="d-flex justify-content-between">
                <div style="flex: 9;">
                  <p class="fs-20">
                    <?= $data['nama'] ?>
                  </p>
                </div>
                <div style="flex: 1;">
                  <div class="d-flex">
                    <form action="<?= base_url('marketplace/delete') ?>" method="post">
                      <?php csrf_field() ?>
                      <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="csrf" />
                      <input type="hidden" name="id" value="<?= $data['id'] ?>">
                      <button type="submit" class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt"></i>
                      </button>
                    </form>

                    <a href="<?= base_url('marketplace/form') ?>/<?= $data['id'] ?>" class="btn btn-primary btn-sm ml-2">
                      <i class="far fa-edit"></i>
                    </a>
                  </div>
                </div>

              </div>
              <p class="color-price fs-16">Rp. <?= $convert->ribuan($data['harga']) ?>,-</p>
              <p class="my-3 text-secondary" style="line-height: 1.275rem; font-size:13px;"><?= $data['deskripsi'] ?></p>
              <p class="mt-4 text-secondary fs-12">Posting pada <?= $convert->tanggal_indo($data['created_at'], true) ?></p>
            </div>
          </div>

          <div class="button">

          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</main>

<?= $this->endSection() ?>