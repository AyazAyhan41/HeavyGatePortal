<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Raporlar - Operasyon Hurdalama Günlük
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Raporlar - <span class="fw-normal">Operasyon Hurdalama Günlük</span>
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
                <a href="#" class="breadcrumb-item">Raporlar</a>
                <span class="breadcrumb-item active">Operasyon Hurdalama Günlük</span>
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
            <h5 class="mb-0">Operasyon Hurdalama Günlük</h5>
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>Tarih</th>
                <th>Part No</th>
                <th>Acıklama</th>
                <th>İş Emri</th>
                <th>İşlem</th>
                <th>Adet</th>
                <th>KG</th>
                <th>Hurda Kodu</th>
                <th>ACK</th>
                <th>Hurda Notu</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = oci_fetch_array($veri,OCI_BOTH+OCI_RETURN_LOBS+OCI_RETURN_NULLS)){ ?>
                <tr>
                    <td><?=  $row['TARIH']; ?></td>
                    <td><?=  $row['PARTNO']; ?></td>
                    <td><?=  $row['ACIKLAMA']; ?></td>
                    <td><?=  $row['IS_EMRI']; ?></td>
                    <td><?=  $row['TUR']; ?></td>
                    <td><?=  $row['AD']; ?></td>
                    <td><?=  $row['KG']; ?></td>
                    <td><?=  $row['HURDA_KODU']; ?></td>
                    <td><?=  $row['ACK']; ?></td>
                    <td><?=  $row['HURDA_NOTU']; ?></td>

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
