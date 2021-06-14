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
      <p class="fw-600 ml-4" style="font-size:36px;">Jual Barang</p>
    </div>

    <div class="py-3">
      <hr>
    </div>

    <div class="body-post-product" style="background-color: white; border-radius:8px;">
      <div class="p-5">
        <form action="" id="post-product">
          <div class="form-group row">
            <label for="nama-product" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
              <input type="text" class="form-control custom-input-marketplace" id="nama-product" placeholder="Nama Produk" />
            </div>
          </div>

          <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control custom-input-marketplace" id="harga" placeholder="Harga" />
            </div>
          </div>

          <div class="form-group row">
            <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control custom-input-marketplace" id="lokasi" placeholder="Lokasi" />
            </div>
          </div>

          <div class="form-group row">
            <label for="desc" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
              <textarea rows="5" class="form-control custom-input-marketplace" id="desc"> </textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
              <select class="custom-input-marketplace form-control" style="height: 3rem;" id="kategori">
                <option selected>Makanan dan Minuman</option>
                <option value="1">Handphone, Komputer dan aksesoris</option>
                <option value="2">Fashion Wanita & Pria</option>
                <option value="3">Fashion Bayi & Anak</option>
                <option value="4">Alat Sekolah & Olahraga</option>
                <option value="5">Jam Tangan</option>
                <option value="6">Barang Elektronik & Musik</option>
                <option value="7">Perawatan & Kecantikan</option>
                <option value="8">Perlengkapan Rumah & Otomotif</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
            <div class="col-sm-10">
              <select class="custom-input-marketplace form-control" id="kondisi" style="width: 100%;height:3rem;">
                <option value="Baru" selected>Baru</option>
                <option value="Bekas">Bekas</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Unggah Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control custom-input-marketplace" id="image" />
            </div>
          </div>

          <div class="pt-5">
            <button type="submit" id="btn-register" style="padding: 0.75rem 0;" class="btn mt-4 btn-custom-primary btn-block">Posting Jualan</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</main>

<?= $this->endSection() ?>