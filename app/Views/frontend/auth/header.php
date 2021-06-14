<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url() ?>/assets-fe/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets-fe/css/style.css">
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets-fe/css/styleb.css"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


    <script src="<?= base_url() ?>/assets-fe/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>/assets-fe/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets-fe/js/custom.js"></script>

    <title><?= $title ?></title>

    <script>

        function disabled_button(element) {
            console.log(element);
            $(`#${element}`).attr('disabled', true);
            $(`#${element}`).html("<i class='fa fa-spin fa-spinner'> </i>");
        }

        function invalidFeedback(key, msg) {
            var htmlFeedback = `<div class="invalid-feedback ${key}" style='margin-top:-20px;'> ${msg}</div>`;
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

<body>