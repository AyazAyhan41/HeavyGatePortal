<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Numara Ekleme
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Rehber - <span class="fw-normal">Numara Ekle</span>
            </h4>

            <a href="#page_header"
               class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
               data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>


    </div>

    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                <a href="#" class="breadcrumb-item">Rehber</a>
                <span class="breadcrumb-item active">Numara Ekle</span>
            </div>
        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <!-- Main charts -->
    <div class="card">
        <span class="float-end"><?= $this->include('admin/layout/partials/errors'); ?></span>
        <div class="card-header">
            <h5 class="mb-0">Numara Ekle</h5>
        </div>

        <div class="card-body">
            <form action="<?= current_url() ?>" method="post">
                <?= csrf_field() ?>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">Adı:</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="first_name" placeholder="Adı">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">Soyadı :</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="sur_name" placeholder="Soyadı">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">Telefon :</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="phone" maxlength="4" placeholder="Telefon">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">Durum :</label>
                    <div class="col-lg-9">
                        <select class="form-control form-control-select2" name="status">
                                <option value="<?= STATUS_ACTIVE ?>">Aktif</option>
                                <option value="<?= STATUS_PASSIVE ?>">Pasif</option>
                        </select>
                    </div>
                </div>


                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Kaydet <i class="ph-floppy-disk ms-2"></i></button>
                </div>
            </form>
        </div>
    </div>

    <!-- /main charts -->


</div>
<!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/js/vendor/tables/datatables/datatables.min.js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_basic.js') ?>
<?php $this->endSection(); ?>
