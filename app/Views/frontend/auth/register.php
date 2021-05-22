<?= $this->include('frontend/auth/header') ?>
<nav>
    <div class="navbar-login container p-4 d-flex flex-md-row flex-column justify-content-between align-items-md-center">
        <?= $this->include('frontend/main/logo'); ?>
        <div class="d-flex mt-md-0 mt-4">
            <p class="text-secondary mr-4 my-auto">Sudah punya akun? </p>
            <a href="<?= base_url('login') ?>" class="btn btn-register text-dark">Login</a>
        </div>
    </div>
</nav>

<div class="row mt-4">
    <div class="col-md-4 col-10 mx-auto">
        <h2 class="mb-5">Register</h2>
        <form action="<?= base_url('register/process') ?>" method="POST" class="mt-5" id="form-register">

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" placeholder="Nama Lengkap" class="custom-input" name="nama" id="nama">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" autocomplete="off" placeholder="User@mail.com" class="custom-input" name="email" id="email">
            </div>

            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" placeholder="******" class="custom-input" name="password" id="password">
            </div>

            <label for="telp">Telp</label>
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="telp">+62</span>
                </div>
                <input type="text" class="form-control" name="tlp" aria-label="Default" id="telp">
            </div>

            <div>
                <button type="submit" id="btn-register" style="padding: 0.75rem 0;" class="btn mt-4 btn-custom-primary btn-block">Register</button>
                <p class="privacy-content">By proceeding, You understand and agree to Our use of the information that You submit in accordance with the provisions of the Privacy Policy.</p>
            </div>
        </form>

    </div>
</div>


<script>
    function disabled_button() {
        $('#btn-register').attr('disabled', 'true');
        $('#btn-register').removeClass('btn-custom-primary');
        $('#btn-register').addClass('btn-secondary');
        $('#btn-register').html("<i class='fa fa-spin fa-spinner'> </i> Loading..")
    }
    var form = document.querySelector("#form-register");
    $('#form-register').submit(function(e) {
        disabled_button();
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('register/process') ?>',
            method: "POST",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                disabled_button();
            },
            complete: function() {
                $('#btn-register').removeAttr('disabled');
                $('#btn-register').html("Register")
                $('#btn-register').removeClass('btn-secondary');
                $('#btn-register').addClass('btn-custom-primary');
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                error_handler("<?= base_url('register') ?>", xhr, thrownError);
            }
        })

    });
</script>
<?= $this->include('frontend/auth/footer') ?>