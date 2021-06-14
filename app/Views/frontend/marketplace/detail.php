<?php

use App\Libraries\Convert;

$convert = new Convert();

?>
<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>
<main class="main" style="margin-top: 16vh">
  <section class="container" id="hero">
    <div class="row flex align-items-top">
      <div class="col-md-3">
        <div class="figure">
          <img src="<?= base_url('uploads') ?>/<?= $barang['image'] ?>" style="width: 250px; height:250px;" alt="Photo Product" id="mainImg" />
        </div>
      </div>
      <div class="col-md-9">
        <div class="title">
          <h3><?= $barang['nama'] ?></h3>
          <h2 class="mt-3">Rp. <?= $convert->ribuan($barang['harga']) ?>,-</h2>
          <hr align="center" size="2" noshade />
        </div>

        <div>
          <table width="100%">
            <tr>
              <td width="30%">Lokasi</td>
              <td>:</td>
              <td class="text-capitalize"><?= $barang['lokasi'] ?></td>
            </tr>
            <tr>
              <td width="30%">Kondisi</td>
              <td>:</td>
              <td class="text-capitalize"><?= $barang['kondisi'] ?></td>
            </tr>
            <tr>
              <td width="30%">Kategori</td>
              <td>:</td>
              <td class="text-capitalize"><?= $barang['kategori'] ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="dproduk mt-5">
      <h3>Deskripsi Produk</h3>
      <p class="fs-16 text-secondary" style="line-height: 1.75rem;">
        <?= $barang['deskripsi'] ?>
      </p>
      <button class="btn btn-custom-primary btn-hover-primaryy">Chat Penjual</button>
    </div>
  </section>
</main>
<?= $this->endSection() ?>