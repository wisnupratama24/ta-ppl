<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Semarang &mdash; <?= $title ?> </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('') ?>/assets-fe/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css" integrity="sha512-RPxGl20NcAUAq1+Tfj8VjurpvkZaep2DeCgOfQ6afXSEgcvrLE6XxDG2aacvwjdyheM/bkwaLVc7kk82+mafkQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url('') ?>/assets-fe/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>/assets-fe/vendor/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>/assets-be/vendor/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>/assets-be/vendor/datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>/assets-be/vendor/selectpicker/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.4"></script>
    <link href="<?= base_url(''); ?>/assets-be/vendor/summernote/summernote.css" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>/assets-be/css/style.css">
    <link rel="stylesheet" href="<?= base_url('') ?>/assets-be/css/components.css">


    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/assets-fe/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?= base_url('') ?>/assets-fe/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url('') ?>/assets-be/js/stisla.js"></script>

    <script src="<?= base_url('') ?>/assets-fe/vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chocolat/0.4.8/js/jquery.chocolat.min.js"></script>
    <script src="<?= base_url(''); ?>/assets-be/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(''); ?>/assets-be/vendor/datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url(''); ?>/assets-be/vendor/selectpicker/bootstrap-select.min.js"></script>

    <script src="<?= base_url(''); ?>/assets-be/vendor/summernote/summernote.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('') ?>/assets-be/js/scripts.js"></script>
    <script src="<?= base_url('') ?>/assets-be/js/custom.js"></script>


    <!-- Page Specific JS File -->
    <script src="<?= base_url('') ?>/assets-be/js/page/index.js"></script>

    <script>
        function refreshTokens() {
            var url = "/token";
            $.get(url, function(response) {
                $(".csrf").val(response.token);
            });
        }

        function disabled_button(element) {
            console.log(element);
            $(`#${element}`).attr('disabled', true);
            $(`#${element}`).html("<i class='fa fa-spin fa-spinner'> </i>");
        }

        function invalidFeedback(key, msg) {
            var htmlFeedback = `<div class="invalid-feedback ${key}" style='margin-top:5px;text-transform:capitalize;'> ${msg}</div>`;
            return htmlFeedback;
        };

        function error_handler(url, xhr, thrownError) {
            // Swal.fire({
            //     title: '',
            //     text: "Mohon Maaf Koneksi Gagal, Data Akan Di Muat Ulang",
            //     icon: 'info',
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         window.location = url;
            //     }
            // });
            console.log(xhr.status);
            console.log(xhr.responseText);
            console.log(thrownError);
        };
    </script>
</head>