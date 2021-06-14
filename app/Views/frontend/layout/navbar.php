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
                    <a href="<?= base_url('/marketplace') ?>" class="<?= $active == 'marketplace' ? 'active' : '' ?>"> Marketplace </a>
                </li>
                <li>
                    <a href="<?= base_url('/news') ?>"> Berita </a>
                </li>
            </ul>


            <div class="button-right">
                <?php if (session()->get('logged_in')) { ?>

                     <div class="dropdown">

                        <div class="d-flex align-items-center relative" style="cursor: pointer;user-select: none;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?= base_url('uploads') ?>/ava.png" alt="Default Avatar" style="width:30px;">
                            <p class="ml-3 my-auto">
                                <?= session()->get('nama') ?>
                            </p>
                        </div>
                        <div class="dropdown-menu mt-3" aria-labelledby="dropdownMenuButton" style="width: 100%;">
                            <a href="<?= base_url('marketplace/list') ?>" class="dropdown-item">Jualanku</a>
                            <a href="<?= base_url('logout') ?>" class="dropdown-item">Logout</a>
                        </div>
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