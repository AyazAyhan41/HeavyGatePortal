<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Analizler - Multi-Company Customer Analysis
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Gelir Bütçesi - <span class="fw-normal">Multi-Company Customer Analysis</span>
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
                <a href="#" class="breadcrumb-item">Analizler</a>
                <span class="breadcrumb-item active">Multi-Company Customer Analysis</span>
            </div>

        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">


    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">Müşteri Listesi</h5>
            <div class="d-inline-flex ms-auto">
             <span id="load" style="display: none">

                  <div class="d-flex align-items-center">
              <strong>Yükleniyor Lütfen Bekleyiniz.</strong>
              <div class="spinner-border text-success ms-4" role="status" aria-hidden="true"></div>
            </div>

              </span>
            </div>
        </div>

        <table class="table datatable-analiz table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Müşteri Adı</th>
                <th class="text-center">İşlemler</th>


            </tr>
            </thead>
            <tbody>
            <?php


            while ($row = oci_fetch_array($liste, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) { ?>
            <tr>
                <td><?= $row['IDENTITY'] ?></td>
                <td><?= $row['NAME'] ?></td>
                <td class="text-center">
                    <a href="<?= base_url(route_to('admin_musteri_analiz_detay',$row['IDENTITY'])); ?>" class="btn btn-success btn-icon">
                        <i class="ph-eye"></i>
                    </a>
                </td>
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
<?= script_tag('public/admin/assets/demo/pages/datatables_basic.js') ?>

<?php $this->endSection(); ?>
