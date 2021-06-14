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
      <div id="alert" class="py-3">
      </div>
      <div class="p-5">
        <form action="<?= base_url('marketplace/submit') ?>/<?= $id ?>" method="post" id="form-jual">
          <?php csrf_field() ?>
          <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="csrf" />
          <input type="hidden" name="id" value="<?= $id ?>" class="csrf" />

          <div class="form-group row">
            <label for="nama-product" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
              <input type="text" class="form-control custom-input-marketplace" name="nama" id="nama" value="<?= $nama ?>" placeholder="Nama Produk" />
            </div>
          </div>

          <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control custom-input-marketplace" value="<?= $harga ?>" name="harga" id="harga" placeholder="Harga" />
            </div>
          </div>

          <div class="form-group row">
            <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control custom-input-marketplace" value="<?= $lokasi ?>" name="lokasi" id="lokasi" placeholder="Lokasi" />
            </div>
          </div>

          <div class="form-group row">
            <label for="desc" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
              <textarea rows="5" class="form-control custom-input-marketplace" name="deskripsi" id="deskripsi"><?= $deskripsi ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
              <select class="custom-input-marketplace form-control" style="height: 3rem;" id="kategori" name="kategori">
                <option value="Makanan dan Minuman" <?= $kategori == 'Makanan dan Minuman' ? 'selected' : '' ?>>Makanan dan Minuman</option>
                <option value="Handphone, Komputer dan aksesoris" <?= $kategori == 'Handphone, Komputer dan aksesoris' ? 'selected' : '' ?>>Handphone, Komputer dan aksesoris</option>
                <option value="Fashion Wanita & Pria" <?= $kategori == 'Fashion Wanita & Pria' ? 'selected' : '' ?>>Fashion Wanita & Pria</option>
                <option value="Fashion Bayi & Anak" <?= $kategori == 'Fashion Bayi & Anak' ? 'selected' : '' ?>>Fashion Bayi & Anak</option>
                <option value="Alat Sekolah & Olahraga" <?= $kategori == 'Alat Sekolah & Olahraga' ? 'selected' : '' ?>>Alat Sekolah & Olahraga</option>
                <option value="Jam Tangan" <?= $kategori == 'Jam Tangan' ? 'selected' : '' ?>></option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
            <div class="col-sm-10">
              <select class="custom-input-marketplace form-control" id="kondisi" name="kondisi" style="width: 100%;height:3rem;">
                <option value="Baru" <?= $kondisi == 'Baru' ? 'selected' : '' ?>>Baru</option>
                <option value="Bekas" <?= $kondisi == 'Bekas' ? 'selected' : '' ?>>Bekas</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Unggah Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control custom-input-marketplace" name="image" id="image" />
            </div>

          </div>

          <?php if ($id != null) { ?>
            <input type="hidden" name="old_image" value="<?= $image ?>">
            <div class="form-group row">
              <label for="image" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <img src="<?= base_url() ?>/uploads/<?= $image ?>" alt="<?= $nama ?>" style="width: 150px; height:150px;">
              </div>

            </div>
          <?php } ?>
          <div class="pt-5">
            <button type="submit" id="btn-jual" style="padding: 0.75rem 0;" class="btn mt-4 btn-custom-primary btn-block"><?= $btn_name ?></button>
          </div>
        </form>

      </div>
    </div>
  </div>
</main>

<script>
  $('#form-jual').submit(function(e) {
    let btn_name = "<?= $btn_name ?>";
    $('#alert').html('');
    e.preventDefault();
    $.ajax({
      url: $(this).attr('action'),
      method: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      beforeSend: function() {
        disabled_button('btn-jual');
      },
      complete: function() {
        $('#btn-jual').removeAttr('disabled');
        $('#btn-jual').html(btn_name);
        $('#btn-jual').removeClass('btn-secondary');
        $('#btn-jual').addClass('btn-custom-primary');
      },
      success: function(response) {
        $('.csrf').val(response.token);
        console.log(response);
        if (response.state == false) {
          var responseError = response.error;
          $.each(responseError, function(key, message) {
            if (message != '') {
              var elm = $('.' + key).length;
              if (elm > 0) {
                $('#' + key).next().remove();
              }
              var htmlFeedback = invalidFeedback(key, message);
              $('#' + key).addClass('is-invalid');
              $('#' + key).after(htmlFeedback);
            } else {
              $('#' + key).removeClass('is-invalid');
            }
          })

          if (response.msg != undefined) {

            $('html, body').animate({
              scrollTop: $("html, body").offset().top
            }, 1000);
            window.scrollTo(0, 100);

            var htmlFailed = `
                        <div class="alert alert-danger" role="alert">
                           ${response.msg}
                        </div>`;

            $('#alert').html(htmlFailed);
          }


        } else {
          $('html, body').animate({
            scrollTop: $("html, body").offset().top
          }, 1000);
          window.scrollTo(0, 100);

          $('#form-jual').trigger('reset');
          $(".is-invalid").removeClass('is-invalid');
          $('.invalid-feedback').remove();

          window.location.href = "<?= base_url('marketplace/list') ?>";
        }

      },
      error: function(xhr, ajaxOptions, thrownError) {
        error_handler("<?= base_url('marketplace/jual') ?>", xhr, thrownError);
      }
    })

  });
</script>
<?= $this->endSection() ?>