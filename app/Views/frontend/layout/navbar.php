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
                    <a href="<?= base_url('/') ?>"> Home </a>
                </li>
                <li>
                    <a href="<?= base_url('/lowongan-kerja') ?>"> Lowongan Kerja </a>
                </li>
                <li>
                    <a href="<?= base_url('/marketplace') ?>"> Marketplace </a>
                </li>
                <li>
                    <a href="<?= base_url('/berita') ?>"> Berita </a>
                </li>
            </ul>

            <div class="button-right">
                <button class="btn btn-custom-primary btn-hover-primary">Login</button>
                <button class="btn btn-register">Register</button>
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