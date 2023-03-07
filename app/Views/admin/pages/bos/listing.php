<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Gelir Bütcesi - Yurtiçi Gelir Karşılaştırma
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Gelir Bütçesi - <span class="fw-normal">Yurtiçi Gelir Karşılaştırma</span>
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


    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">Yurtiçi Gelir Karşılaştırma</h5>
            <div class="d-inline-flex ms-auto">
             <span id="load" style="display: none">

                  <div class="d-flex align-items-center">
              <strong>Yükleniyor Lütfen Bekleyiniz.</strong>
              <div class="spinner-border text-success ms-4" role="status" aria-hidden="true"></div>
            </div>

              </span>
            </div>
        </div>

        <table class="table datatable-colvis-group">
            <thead>
            <tr>
                <th>Yıl</th>
                <th>Şirket</th>
                <th>Pazar</th>
                <th>Satış Grubu</th>
                <th>Satış Grubu Açıklama</th>
                <th>OCAK Hedef</th>
                <th>Ocak Gerçekleşen</th>
                <th>Ocak Fark</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <td>asd</td>
                <td>asd</td>
                <td>asd</td>
                <td>asd</td>
                <td>asd</td>
                <td class="text-end">asd</td>
                <td class="text-end">asd</td>
                <td class="text-end">

                    asd

                </td>

            </tr>
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
