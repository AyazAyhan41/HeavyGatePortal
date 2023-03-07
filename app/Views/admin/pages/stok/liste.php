<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Stoklar - Stok Listesi
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Stoklar - <span class="fw-normal">Stok Listesi</span>
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
                <a href="#" class="breadcrumb-item">Stoklar</a>
                <span class="breadcrumb-item active">Stok Listesi</span>
            </div>

        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">


    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Stok Listesi</h5>
        </div>

        <div class="card-body">

        </div>

        <table class="table datatable-reorder">
            <thead>
            <tr>
                <th>Site</th>
                <th>Stok Kodu/th>
                <th>Stok Adı</th>

            </tr>
            </thead>
            <tbody>
            <?php while ($row = oci_fetch_array($veri, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) { ?>
                <tr>
                    <td><?= $row['CONTRACT'] ?></td>
                    <td><?= $row['PART_NO'] ?></td>
                    <td><?= $row['STOK_ACIKLAMA'] ?></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /main charts -->



</div>
<!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>

<?= script_tag('public/admin/assets/js/vendor/tables/datatables/extensions/col_reorder.min.js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_extension_reorder.js') ?>


<?php $this->endSection(); ?>
