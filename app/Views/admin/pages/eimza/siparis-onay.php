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
        
        
        <?php 
        while ($row = oci_fetch_array($veri, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) { ?>

            <table class="table table-bordered datatable-complex-header">
                <thead>
                <tr>
                    <th rowspan="2"></th>
                    <th colspan="2">Talep Yeri : <?= $row['TALEP_YERI'] ?></th>
                    <th colspan="3">Para Birimi : <?= $row['PARA_BIRIMI'] ?></th>
                </tr>
                <tr>
                    <th>Sas No</th>
                    <th>Tanım</th>
                    <th>Miktar</th>
                    <th>Birim</th>
                    <th>Birim Fiyat</th>
                    <th>Toplam Tutar</th>
                    <th>Talep Eden</th>
                    <th>Tedarikçi</th>
                    <th>Ödeme Vadesi</th>
                    <th>Grup</th>
                    <th>Eldeki Miktar</th>
                    <th>Son Tarih</th>
                    <th>Son Fıyat</th>
                    <th>Son Mıktar</th>
                    <th>Mıktar Bırım</th>
                    <th>Bırım Fıyat Para Bırımı</th>
                    <th>C Tarıh</th>
                    <th>Requisition Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= $row['ORDER_NO'] ?></td>
                    <td><?= $row['TANIM'] ?></td>
                    <td><?= $row['MIKTAR'] ?></td>
                    <td><?= $row['BIRIM'] ?></td>
                    <td><?= $row['BIRIM_FIYAT'] ?></td>
                    <td><?= $row['TOPLAM_TUTAR'] ?></td>
                    <td><?= $row['TALEP_EDEN_KODU'] ?> -<?= $row['TALEP_EDEN'] ?></td>
                    <td><?= $row['NAME'] ?></td>
                    <td><?= $row['PAY_TERM_DESC'] ?></td>
                    <td><?= $row['GRUP'] ?></td>
                    <td><?= $row['ELDEKI_MIKTAR'] ?></td>
                    <td><?= $row['SON_TARIH'] ?></td>
                    <td><?= $row['SON_FIYAT'] ?></td>
                    <td><?= $row['SON_MIKTAR'] ?></td>
                    <td><?= $row['MIKTAR_BIRIM'] ?></td>
                    <td><?= $row['BIRIM_FIYAT_PARA_BIRIMI'] ?></td>
                    <td><?= $row['C_TARIH'] ?></td>
                    <td><?= $row['REQUISITION_DATE'] ?></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-outline-primary btn-labeled btn-labeled-start">
                                        <span class="btn-labeled-icon bg-primary text-white">
                                            <i class="ph-check-square-offset"></i>
                                        </span>
                            Onayla
                            <div></div></button>
                    </td>
                </tr>
                </tbody>
            </table>

        <?php } ?>
    </div>
    <!-- /main charts -->



</div>
<!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_sorting.js') ?>


<?php $this->endSection(); ?>
