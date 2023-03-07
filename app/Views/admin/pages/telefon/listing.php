<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
    Telefon Rehber
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Telefon - <span class="fw-normal">Rehber</span>
                </h4>

                <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>


        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="#" class="breadcrumb-item">Home</a>
                    <span class="breadcrumb-item active">Dashboard</span>
                </div>

                <a href="#breadcrumb_elements" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>


        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Telefon Listesi</h5>
            </div>

            <div class="card-body">

                <table class="table datatable-basic">
                    <thead>
                    <tr>
                        <th>Adı</th>
                        <th>Soyadı</th>
                        <th>Dahili</th>
                        <th>Durum</th>
                        <th>işlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($telefons as $telefon){ ?>
                        <tr data-id="<?= $telefon->id; ?>">
                            <td><?= $telefon->getFirstName() ?></td>
                            <td><?= $telefon->getSurName() ?></td>
                            <td><?= $telefon->getPhone() ?></td>
                            <td style="display: none"></td>
                            <td><?php if ($telefon->getStatus() == USER_ACTIVE) { ?>
                                <span class="badge bg-success bg-opacity-10 text-success">Aktif</span>
                                <?php } else {  ?>
                                <span class="badge bg-danger bg-opacity-10 text-danger">Pasif</span>
                                <?php } ?>
                            
                            </td>
                            <td>
                                <a href="<?= base_url(route_to('admin_telefon_rehber_edit', $telefon->id)); ?>" class="btn btn-success btn-icon">
                                    <i class="ph-pencil"></i>
                                </a>
                                <a data-url="<?= base_url(route_to('admin_telefon_rehber_delete')); ?>" href="javascript:void(0)" class="btn btn-danger btn-icon delete">
                                    <i class="ph-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /main charts -->



    </div>
    <!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/js/vendor/tables/datatables/datatables.min.js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_basic.js') ?>

<?php $this->endSection() ?>
