<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>

<main class="main" style="margin-top: 16vh">
      <section class="container" id="lowongan-kerja" style="margin-top: 8rem">
        <div class="d-md-flex d-block justify-content-between">
          <div class="daftar-lowongan d-block" style="flex: 2">
            <div class="wrap-lowongan d-flex align-items-start px-3" style="border-bottom: 2px solid #a7b5ce">
              <div class="lingkaran" >
                <i class="fa fa-shopping-cart fa-4x"></i>
              </div>
              <h6 class="font-weight-bold mt-4 ml-4" style="font-size: 30px">Jual Barang</h6>
            </div>
            <h6 class="font-weight-bold mt-5 d-flex align-items-start px-3 pt-3 pb-5" style="font-size: 30px">Tambah Produk</h6>
            <div class="kotak">
              <h6 class="font-weight-bold mt-3 d-flex align-items-start px-3 pt-3 pb-5" style="font-size: 22px">Detail Produk</h6>
              <form>
                <div class="form-group row">
                  <label for="Produk" class="col-sm-2 col-form-label pl-5">Nama Produk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Produk" placeholder="Nama Produk" />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lokasi" class="col-sm-2 col-form-label pl-5">Lokasi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="lokasi" placeholder="Lokasi Tempat Produk" />
                  </div>
                </div>
            
                <div class="form-group row">
                  <label for="deskripsi" class="col-sm-2 col-form-label pl-5">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="5" placeholder="Deskripsi"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kategori" class="col-sm-2 col-form-label pl-5">Kategori</label>
                  <div class="col-sm-10">
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
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
                  <label for="Merk" class="col-sm-2 col-form-label pl-5">Merk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Merk" placeholder="Opsional" />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kondisi" class="col-sm-2 col-form-label pl-5">Kondisi</label>
                  <div class="col-sm-10">
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected>Baru</option>
                      <option value="1">Bekas</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Stock" class="col-sm-2 col-form-label pl-5">Stock</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Merk" placeholder="Mohon masukan angkanya" />
                  </div>
                </div>
              </form>
            </div>
            <div class="kotak">
              <h6 class="font-weight-bold mt-3 d-flex align-items-start px-3 pt-3 pb-5" style="font-size: 22px">Kisaran Harga</h6>
              <form>
                <div class="form-group row">
                  <label for="Produk" class="col-sm-2 col-form-label pl-5">Harga Minimal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Produk" placeholder="Mohon masukkan angka" />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lokasi" class="col-sm-2 col-form-label pl-5">Harga Maksimal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="lokasi" placeholder="Mohon masukkan angka" />
                  </div>
              </form>
            </div>
          </div>
		     <div class="kotak">
              <h6 class="font-weight-bold mt-3 d-flex align-items-start px-3 pt-3 pb-5" style="font-size: 22px">Foto</h6>
              <form>
                <div class="form-group row">
                  <label for="foto" class="col-sm-2 col-form-label pl-5">Unggah Foto</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control form-control-lg " style=" align-items: center; justify-content: center;" id="Image" placeholder="hi" />
                  </div>
                </div>
              </form>
			  </div>
        <center>
          <a href="#" class="btn btn-warning btn-md" type="submit">Submit</a> 
          <a href="#" class="btn btn-warning btn-md" type="reset">Reset</a>
        </center>
      </section>
    </main>

<?= $this->endSection() ?>