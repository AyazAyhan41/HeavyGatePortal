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

        <table class="table datatable-basic table-bordered">
            <thead>
            <tr>
                <th>Müşteri No</th>
                <th>Müşteri Adı</th>
                <th>Vergi No</th>
                <th>Ülke</th>
                <th>Cari Tipi</th>
                <th class="text-center">Actions</th>

            </tr>
            </thead>
            <tbody>
            <?php


            while ($row = oci_fetch_array($veri, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) { ?>
                <tr>
                    <td><?= $row['CUSTOMER_ID'] ?></td>
                    <td><?= $row['NAME'] ?></td>
                    <td><?= $row['ASSOCIATION_NO'] ?></td>
                    <td><?= $row['COUNTRY'] ?></td>
                    <td><?= $row['PARTY_TYPE'] ?></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="<?= base_url(route_to('admin_musteri_detay','/'.$row['CUSTOMER_ID'])); ?>" class="dropdown-item">
                                        <i class="ph-article  me-2"></i>
                                        Müşteri Detay
                                    </a>
                                </div>
                            </div>
                        </div>
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
