<?= $this->extend('backend/layout/index') ?>

<?= $this->section('page-content') ?>

<div class="section-header">
    <h1 class="text-capitalize"><?= $title ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>"><?= appName ?></a></div>
        <div class="breadcrumb-item"><?= $title ?></div>
    </div>
</div>


<?= $this->endSection() ?>