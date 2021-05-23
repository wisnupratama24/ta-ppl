<nav class="fixed-top">
    <div class="navbar container">
        <div>
            <h6 class="font-weight-bold" style="font-size: 22px">Sem<span style="color: #fb9128">arangku.</span></h6>
        </div>
        <div class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="menus navbar-active">
            <ul>
                <li>
                    <a href="<?= base_url('/') ?>" class="<?= $active == '/' ? 'active' : '' ?>"> Home </a>
                </li>
                <li>
                    <a href="<?= base_url('/loker') ?>" class="<?= $active == 'loker' ? 'active' : '' ?>"> Lowongan Kerja </a>
                </li>
                <li>
                    <a href="<?= base_url('/marketplace') ?>"> Marketplace </a>
                </li>
                <li>
                    <a href="<?= base_url('/berita') ?>"> Berita </a>
                </li>
            </ul>


            <div class="button-right">
                <?php if (session()->get('logged_in')) { ?>
                    <div class="d-flex align-items-center" style="cursor: pointer;">
                        <img src="<?= base_url('uploads') ?>/ava.png" alt="Default Avatar" style="width:30px;">
                        <p class="ml-3 my-auto">
                            <?= session()->get('nama') ?>
                        </p>
                    </div>
                <?php } else { ?>
                    <a href="<?= base_url('login') ?>" class="btn text-white btn-custom-primary btn-hover-primary">Login</a>
                    <a href="<?= base_url('register') ?>" class="btn btn-register text-dark">Register</a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>

<script>
    $(document).ready(function() {
        $(".hamburger").click(function() {
            $(".menus").toggleClass("navbar-active");
        });
    });
</script>