<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Gelir Bütcesi - Yurtiçi Gelir Bütçesi
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Gelir Bütçesi - <span class="fw-normal">Yurtiçi Gelir Bütçesi</span>
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
                <a href="#" class="breadcrumb-item">Gelir Bütçesi</a>
                <span class="breadcrumb-item active">Yurti.i Gelir Bütçesi</span>
            </div>

        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <!-- Main charts -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">YURTİÇİ GELİR BÜTÇESİ (€)</h5>
        </div>

        <table class="table datatable-colvis-restore">
            <thead>
            <tr>
                <th>Tarih</th>
                <th>Tür</th>
                <th>Tanım</th>
                <th class="text-end">USD</th>
                <th class="text-end">EUR</th>
                <th class="text-end">GBP</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = oci_fetch_array($veri,OCI_BOTH)){ ?>
                <tr>
                    <td><?=  $row['TARIH']; ?></td>
                    <td><?=  $row['TUR']; ?></td>
                    <td><?=  $row['TANIM']; ?></td>

                    <td class="text-end"><?=  (double)$row['usd']; ?></td>
                    <td class="text-end"><?=  (double)$row['eur']; ?></td>
                    <td class="text-end"><?=  (double)$row['gbp']; ?></td>

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
<?= script_tag('public/admin/assets/demo/pages/datatables_extension_colvis.js') ?>
<?php $this->endSection(); ?>
