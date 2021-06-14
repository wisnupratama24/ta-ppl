<?php

use App\Libraries\Convert;

$convert = new Convert();

?>
<?= $this->extend('backend/layout/index') ?>

<?= $this->section('page-content') ?>

<div class="section-header">
    <h1 class="text-capitalize"><?= $title ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>"><?= appName ?></a></div>
        <div class="breadcrumb-item"><?= $title ?></div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah User</h4>
                </div>
                <div class="card-body">
                    <?= $convert->ribuan($jml_user) ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Loker</h4>
                </div>
                <div class="card-body">
                    <?= $convert->ribuan($jml_loker) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Berita</h4>
                </div>
                <div class="card-body">
                    <?= $convert->ribuan($jml_berita) ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Barang</h4>
                </div>
                <div class="card-body">
                    <?= $convert->ribuan($jml_barang) ?>
                </div>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection() ?>