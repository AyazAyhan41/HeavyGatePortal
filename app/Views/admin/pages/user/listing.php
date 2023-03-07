<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
    Admin Özet
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Admin - <span class="fw-normal">Ana Sayfa</span>
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
                <h5 class="mb-0">Basic card</h5>
            </div>

            <div class="card-body">

                <table class="table datatable-colvis-basic">
                    <thead>
                    <tr>
                        <th>Adı Soyadı</th>
                        <th>E-Posta</th>
                        <th>Grup Adı</th>
                        <th>Oluşturma Tarihi</th>
                        <th>Durumu</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $key => $user): ?>
                        <tr data-id="<?= $user->id; ?>">
                        <td><?= $user->getFullName(); ?></td>
                        <td><?= $user->getEmail(); ?></td>
                        <td><?= $user->withGroup()->getTitle(); ?></td>
                        <td><?= $user->getCreatedAt(); ?></td>
                        <td><span class="badge bg-success bg-opacity-10 text-success">Active</span></td>
                        <td>$85,600</td>
                    </tr>
                    <?php endforeach; ?>
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
<?= script_tag('public/admin/assets/js/vendor/tables/datatables/extensions/buttons.min.js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_extension_colvis.js') ?>
<?php $this->endSection() ?>
