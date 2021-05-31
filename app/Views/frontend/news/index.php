<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>

<main class="main" style="margin-top: 16vh">
      <section class="container" id="lowongan-kerja" style="margin-top: 8rem">
        <div class="d-md-flex d-block justify-content-between">
          <div class="daftar-berita d-block">
            <div class="wrap-lowongan d-flex align-items-start px-3 pt-3 pb-5" style="border-bottom: 2px solid #9ca3af">
              <div class="image-lowongan">
                <img src="<?= base_url()?>/assets-fe/img/default.jpg" alt="Gmbar Lowongan" style="width: 220px" />
              </div>
              <div class="desc-lowongan ml-4">
                <div class="title">
                  <h5>Judull Berita</h5>
                  <p class="text-secondary fs-12 fw-500">BY <span style="color: #fb9128">ADMIN</span> May 13, 2021</p>
                </div>
                <div class="desc">
                  <ul class="ml-0 pl-3" style="line-height: 1.75rem">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                  </ul>
                </div>
                <a href="<?= base_url('/newsview') ?>"><button class="btn bg-blue-800 btn-custom-primary mt-2">Read More</button></a>
              </div>
            </div>

            <div class="wrap-lowongan mt-5 d-flex align-items-start px-3 pt-3 pb-5" style="border-bottom: 2px solid #9ca3af">
              <div class="image-lowongan">
                <img src="<?= base_url()?>/assets-fe/img/default.jpg" alt="Gmbar Lowongan" style="width: 220px" />
              </div>
              <div class="desc-lowongan ml-4">
                <div class="title">
                  <h5>Judul Berita</h5>
                  <p class="text-secondary fs-12 fw-500">BY <span style="color: #fb9128">ADMIN</span> May 13, 2021</p>
                </div>
                <div class="desc">
                  <ul class="ml-0 pl-3" style="line-height: 1.75rem">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </ul>
                </div>
                <a href="<?= base_url('/newsview') ?>"><button class="btn bg-blue-800 btn-custom-primary mt-2">Read More</button></a>
              </div>
            </div>

            <div class="wrap-lowongan mt-5 d-flex align-items-start px-3 pt-3 pb-5" style="border-bottom: 2px solid #9ca3af">
              <div class="image-lowongan">
                <img src="<?= base_url()?>/assets-fe/img/default.jpg" alt="Gmbar Lowongan" style="width: 220px" />
              </div>
              <div class="desc-lowongan ml-4">
                <div class="title">
                  <h5>Judul Berita</h5>
                  <p class="text-secondary fs-12 fw-500">BY <span style="color: #fb9128">ADMIN</span> May 13, 2021</p>
                </div>
                <div class="desc">
                  <ul class="ml-0 pl-3" style="line-height: 1.75rem">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </ul>
                </div>
                <a href="<?= base_url('/newsview') ?>"><button class="btn bg-blue-800 btn-custom-primary mt-2">Read More</button></a>
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
              <h6 class="font-weight-bold pb-3" style="font-size: 22px">Berita <span style="color: #fb9128"> Terbaru</span></h6>
              <img src="<?= base_url()?>/assets-fe/img/default.jpg" alt="Gmbar Lowongan" />
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
              <img src="<?= base_url()?>/assets-fe/img/default.jpg" alt="Gmbar Lowongan" />
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
              <img src="<?= base_url()?>/assets-fe/img/default.jpg" alt="Gmbar Lowongan" />
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