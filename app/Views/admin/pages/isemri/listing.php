<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
İş Emri - Tolarans Ekleme
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                İş Emri - <span class="fw-normal">Tolarans Ekleme</span>
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
                <a href="#" class="breadcrumb-item">İş Emri</a>
                <span class="breadcrumb-item active">Tolarans Ekleme</span>
            </div>

        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">


    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">Tolarans Ekleme</h5>
            <div class="d-inline-flex ms-auto">
             <span id="load" style="display: none">

                  <div class="d-flex align-items-center">
              <strong>Yükleniyor Lütfen Bekleyiniz.</strong>
              <div class="spinner-border text-success ms-4" role="status" aria-hidden="true"></div>
            </div>

              </span>
            </div>
        </div>

        <table class="table datatable-basic table-bordered">
            <thead>
            <tr>
                <th>Ürün Grubu</th>
                <th>Ürün Kodu</th>
                <th>Kontrol Noktası</th>
                <th>Kontrol Tipi</th>
                <th>Tolerans</th>
                <th class="text-center">İşlemler</th>

            </tr>
            </thead>
            <tbody>

                <tr>
                    <td>M001</td>
                    <td>M001</td>
                    <td>Diş Açma</td>
                    <td>Çap Toleransı</td>
                    <td>57</td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-article  me-2"></i>
                                        Düzenle
                                    </a>
                                </div>
                            </div>
                        </div>
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
<?= script_tag('public/admin/assets/demo/pages/datatables_basic.js') ?>

<?php $this->endSection(); ?>
