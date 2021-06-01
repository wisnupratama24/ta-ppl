<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>


<main class="main" style="margin-top: 16vh">
      <section class="container" id="lowongan-kerja" style="margin-top: 8rem">
        <div class="d-md-flex d-block justify-content-between">
          <div class="daftar-lowongan d-block" style="width: 750px">
            <!-- Gambar Market Place -->
            <main class="grid">
              <article>
                <img src="<?= base_url()?>/assets-fe/img/bg-hero.png" alt="" />
                <div class="text">
                 <h3>Rp.10.000,.</h3>
                  <h6>Nama Produk</h6>
                  <p>Semarang, jawa tengah</p>
                </div>
              </article>
              <article>
                <img src="<?= base_url()?>/assets-fe/img/wisata-2.png" alt="" />
                <div class="text">
                  <h3>Rp.10.000,.</h3>
                  <h6>Nama Produk</h6>
                  <p>Semarang, jawa tengah</p>
                </div>
              </article>
              <article>
                <img src="<?= base_url() ?>/assets-fe/img/wisata-1.png" alt="" />
                <div class="text">
                  <h3>Rp.10.000,.</h3>
                  <h6>Nama Produk</h6>
                  <p>Semarang, jawa tengah</p>
                </div>
              </article>
              <article>
                <img src="<?= base_url() ?>/assets-fe/img/bg-hero.png" alt="" />
                <div class="text">
                  <h3>Rp.10.000,.</h3>
                  <h6>Nama Produk</h6>
                  <p>Semarang, jawa tengah</p>
                </div>
              </article>
              <article>
                <img src="<?= base_url()?>/assets-fe/img/bg-hero.png" alt="" />
                <div class="text">
                  <h3>Rp.10.000,.</h3>
                  <h6>Nama Produk</h6>
                  <p>Semarang, jawa tengah</p>
                </div>
              </article>
              <article>
                <img src="<?= base_url()?>/assets-fe/img/bg-hero.png" alt="" />
                <div class="text">
                  <h3>Rp.10.000,.</h3>
                  <h6>Nama Produk</h6>
                  <p>Semarang, jawa tengah</p>
                </div>
              </article>
            </main>
          </div>
          <div class="lowongan-right">
            <div>
              <div class="custom-input d-flex align-items-center">
                <span>
                  <i class="fa fa-search"></i>
                </span>
                <input type="text" class="custom-input-group pl-3" placeholder="Cari Lowongan" />
              </div>
            </div>

            <div class=" pb-3">
              <div class="title">
                <i class="fa fa-home fa-2x "><span style="color: #0d0e6e; margin-left:1em ; font-size: 20px;">Beranda</span></i>
              </div>
              <div class="title mt-4">
                <i class="fa fa-user-circle fa-2x "><span style="color: #0d0e6e; margin-left:1em ; font-size: 20px;">Akun Saya</span></i>
              </div>
              </div>
              <a href="<?= base_url('/marketplacesell') ?>" class="btn mt-4 text-white btn-custom-primary btn-hover-primary btn-block">Jual Barang</a>
            </div>
          </div>
        </div>
      </section>
    </main>
<?= $this->endSection() ?>