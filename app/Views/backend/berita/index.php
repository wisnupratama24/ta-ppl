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
                <div class="card-body">
                    <div class="form-group">
                        <a class="btn btn-sm btn-outline-primary" href="<?= base_url('admin/berita/form') ?>" id="btn-tambah"><i class="fa fa-plus-circle"></i> Tambah</a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-secondary btn-refersh">Refresh</a>
                    </div>

                    <!--begin: Datatable -->
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover table-striped dataTable" id="dataTable" style="width:100%">
                            <thead>
                                <tr class="bg-primary text-white ">
                                    <th width="5%">No</th>
                                    <th>Judul</th>
                                    <th width="10%" class="text-center">Action</th>
                                </tr>
                                <tr>
                                    <?php
                                    $no = 1;
                                    foreach ($berita as $data) { ?>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['judul'] ?></td>
                                        <td>
                                            <div class="d-flex m-auto justify-content-center">
                                                <form action="<?= base_url('admin/berita/delete') ?>" method="post">
                                                    <?php csrf_field() ?>
                                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="csrf" />
                                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>

                                                <a href="<?= base_url('berita/form') ?>/<?= $data['id'] ?>" class="btn btn-primary btn-sm ml-2">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>" class="csrf" />
</div>

<?= $this->endSection() ?>