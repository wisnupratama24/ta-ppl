<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets-fe/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets-fe/css/style.css" />
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets-fe/css/styleb.css" /> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets-fe/vendor/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="<?= base_url() ?>/assets-fe/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>/assets-fe/custom.js"></script>
    <script src="<?= base_url() ?>/assets-fe/vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>/assets-fe/vendor/bootstrap/js/bootstrap.min.js"></script>
    <title><?= $title ?? 'Semarang' ?></title>

    <script>
        function invalidFeedback(key, msg) {
            var htmlFeedback = `<div class="invalid-feedback ${key}" style='margin-top:5px; text-transform:capitalize;'> ${msg}</div>`;
            return htmlFeedback;
        };

        function disabled_button(element) {
            console.log(element);
            $(`#${element}`).attr('disabled', true);
            $(`#${element}`).html("<i class='fa fa-spin fa-spinner'> </i>");
        }

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

<body>