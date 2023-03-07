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
    <div class="d-lg-flex align-items-lg-start">

        <!-- Left sidebar component -->
        <div class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none me-lg-3">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- Navigation -->
                <div class="card">
                    <div class="sidebar-section-body text-center">
                        <?php

   
               while($row = oci_fetch_array($musteri,OCI_BOTH)){ ?>
                        <h6 class="mb-0"><?= $row['NAME'] ?></h6>
                        <?php } ?>
                    </div>

                    <ul class="nav nav-sidebar">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-bs-toggle="tab">
                                <i class="ph-user me-2"></i>
                                Adres Bilgileri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#schedule" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-calendar me-2"></i>
                                Cari İşlemler
                                <span class="fs-sm fw-normal text-muted ms-auto">02:56pm</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /left sidebar component -->


        <!-- Right content -->
        <div class="tab-content flex-fill">
            <div class="tab-pane fade active show" id="profile">

                <!-- Profile info -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Adres Detay</h5>
                    </div>

                    <div class="card-body">
                        <?php


                        while($row2 = oci_fetch_array($adres,OCI_BOTH)){ ?>
                        <h6 class="mb-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ülke</label>
                                        <input type="text" value="<?= $row2['COUNTRY'] ?>" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">İl</label>
                                        <input type="text" value="<?= $row2['COUNTY'] ?>" readonly class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">İlçe</label>
                                        <input type="text" value="<?= $row2['STATE'] ?>" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Adres</label>
                                        <input type="text" value="<?= $row2['ADDRESS1'] ?>" readonly class="form-control">
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                    </div>
                </div>
                <!-- /profile info -->
            </div>

            <div class="tab-pane fade" id="schedule">

                <!-- Schedule -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Cari İşlemler</h5>
                    </div>

                    <div class="card-body">
                        <table class="table datatable-basic table-bordered">
                            <thead>
                            <tr>
                                <th>Şirket</th>
                                <th>Tür</th>
                                <th>Fatura No</th>
                                <th>Açıklama</th>
                                <th>İşlem Tarihi</th>
                                <th>Fiş Tarihi</th>
                                <th>Vade Tarihi</th>
                                <th>Vade Gün</th>
                                <th>Borç Tutar</th>
                                <th>Alacak Tutar</th>
                                <th>Kalan Gün</th>
                                <th>Döviz</th>
                                <th>Kur</th>
                                <th>Tutar</th>
                                <th>Açık Tutar</th>
                                <th>Fiş İşlem No</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php


                            while ($row3 = oci_fetch_array($cari, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) { ?>
                                <tr>
                                    <td><?= $row3['COMPANY'] ?></td>
                                    <td><?= $row3['TUR'] ?></td>
                                    <td><?= $row3['FATURA_NO'] ?></td>
                                    <td><?= $row3['ACIKLAMA'] ?></td>
                                    <td><?= $row3['ISLEM_TARIHI'] ?></td>
                                    <td><?= $row3['FIS_TARIHI'] ?></td>
                                    <td><?= $row3['VADE_TARIHI'] ?></td>
                                    <td><?= $row3['KALAN'] ?></td>
                                    <td><?= $row3['BORC'] ?></td>
                                    <td><?= $row3['ALACAK'] ?></td>
                                    <td><?= $row3['KALAN_GUN_SAYISI'] ?></td>
                                    <td><?= $row3['DOVIZ'] ?></td>
                                    <td><?= $row3['KUR'] ?></td>
                                    <td><?= $row3['TUTAR'] ?></td>
                                    <td><?= $row3['ACIK_TUTAR'] ?></td>
                                    <td><?= $row3['IFS_ISLEM_NO'] ?></td>


                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /schedule -->

            </div>
        </div>
        <!-- /right content -->

    </div>
</div>
<!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_basic.js') ?>

<?php $this->endSection(); ?>
