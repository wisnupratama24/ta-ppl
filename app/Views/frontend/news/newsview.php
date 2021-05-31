<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>


<main class="main" style="margin-top: 16vh">
      <section class="container" id="lowongan-kerja" style="margin-top: 8rem">
        <div class="d-md-flex d-block justify-content-between">
          <div class="daftar-berita">
            <h5 class="pb-3" style="font-size: 18px">home ><span style="font-weight: bold">Berita</span></h5>
            <h6 class="font-weight-bold pb-3" style="font-size: 28px">Judul Berita</h6>
            <p class="text-secondary fs-12 fw-500">BY <span style="color: #fb9128">ADMIN </span> May 13, 2021</p>
            <div class="bg-hero">
              <img src="<?= base_url()?>/assets-fe/img/bg-hero.png" width="100%" alt="Gambar Berita" />
              <p class="pt-4" style="font-size: 15px">
                <span style="font-weight: bold">Semarang, 13 Mei 2021</span>
                Deskripsi singkat Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius maxime tempore ipsam. Sit perspiciatis voluptatum optio a voluptate consequatur quos, minus similique? Nisi nihil tempora praesentium ullam qui
                molestias, doloremque deleniti deserunt? Tempora error suscipit itaque magnam quasi quaerat nulla nostrum iste quod! Possimus, sed, velit debitis facere quaerat officia delectus nihil amet obcaecati numquam rerum
                reprehenderit modi ratione libero.
              </p>
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
              <h6 class="font-weight-bold pb-3" style="font-size: 22px">Berita <span style="color: #fb9128"> Terbaru</span></h6>
              <img src="<?= base_url()?>/assets-fe/img/bg-hero.png" alt="Gmbar Lowongan" />
              <div class="desc-lowongan ml-4 pb-3">
                <div class="title">
                  <h5>Judul Berita</h5>
                  <p class="text-secondary fs-12 fw-500">BY <span style="color: #fb9128">ADMIN</span> May 13, 2021</p>
                </div>
                <div class="desc">
                  <ul class="ml-0 pl-3" style="line-height: 1.75rem">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </ul>
                </div>
              </div>
              <img src="<?= base_url()?>/assets-fe/img/bg-hero.png" alt="Gmbar Lowongan" />
              <div class="desc-lowongan ml-4 pb-3">
                <div class="title">
                  <h5>Judul Berita</h5>
                  <p class="text-secondary fs-12 fw-500">BY <span style="color: #fb9128">ADMIN</span> May 13, 2021</p>
                </div>
                <div class="desc">
                  <ul class="ml-0 pl-3" style="line-height: 1.75rem">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </ul>
                </div>
              </div>
              <img src="<?= base_url()?>/assets-fe/img/bg-hero.png" alt="Gmbar Lowongan" />
              <div class="desc-lowongan ml-4 pb-3">
                <div class="title">
                  <h5>Judul Berita</h5>
                  <p class="text-secondary fs-12 fw-500">BY <span style="color: #fb9128">ADMIN</span> May 13, 2021</p>
                </div>
                <div class="desc">
                  <ul class="ml-0 pl-3" style="line-height: 1.75rem">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </ul>
                </div>
              </div>
            </div>
          </div>
       
      </section>
    </main>
<?= $this->endSection() ?>