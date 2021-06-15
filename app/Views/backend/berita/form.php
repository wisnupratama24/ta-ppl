<?= $this->extend('backend/layout/index') ?>

<?= $this->section('page-content') ?>

<div class="section-header">
    <h1 class="text-capitalize"><?= $title ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><?= appName ?></a></div>
        <div class="breadcrumb-item"><?= $title ?></div>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="p-4">
                    <div id="alert" class="my-3">
                    </div>
                    <form id="form-data" action="<?= base_url('admin/berita/submit') ?>/<?= $id ?>" method="POST" enctype="multipart/form-data">
                        <?php csrf_field() ?>
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="csrf" />
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?= $judul ?>">
                        </div>

                        <div class="form-group pt-3">
                            <label for="image">Image Berita</label>
                            <input id="image" type="file" class="form-control" name="image" />
                        </div>

                        <?php if ($id != null) { ?>
                            <input type="hidden" name="old_image" value="<?= $image ?>">
                            <div class="form-group">
                                <img src="<?= base_url() ?>/uploads/<?= $image ?>" alt="<?= $judul ?>" style="width: 150px; height:150px;">
                            </div>
                        <?php } ?>

                        <div class="form-group pt-3">
                            <label for="isi">Isi Berita</label>
                            <textarea id="isi" name="isi" rows="7"><?= $isi ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Pending" <?= $status == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="Publish" <?= $status == 'Publish' ? 'selected' : '' ?>>Publish</option>
                            </select>
                        </div>

                        <div class="modal-footer" style="border: none;">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal" aria-label="Close">
                                Batal
                            </button>
                            <button type="submit" id="btn-submit" class="btn btn-outline-success btn-sm">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#isi').summernote({
            height: "700px",
            styleWithSpan: false
        });

        $('#form-data').submit(function(e) {
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
                    disabled_button('btn-submit');
                },
                complete: function() {
                    $('#btn-submit').removeAttr('disabled');
                    $('#btn-submit').html("data");
                    $('#btn-submit').removeClass('btn-secondary');
                    $('#btn-submit').addClass('btn-custom-primary');
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

                        window.location.href = "<?= base_url('admin/berita') ?>";
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    error_handler("<?= base_url('data') ?>", xhr, thrownError);
                }
            })

        });
    });
</script>
<?= $this->endSection() ?>