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

                <a href="#page_header"
                   class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                   data-bs-toggle="collapse">
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


        <div class="card border-top border-top-width-3 border-top-success border-bottom border-bottom-width-3 border-bottom-success rounded-0">
            <div class="card-header">
                <h6 class="mb-0">Gelir Tablosu</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable-highlight">
                        <thead>
                        <tr>
                            <th>Şirket</th>
                            <th>Satır Kodu</th>
                            <th>Tanım</th>
                            <th>Tutar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($row = oci_fetch_array($gelirtablosu, OCI_BOTH+OCI_ASSOC+OCI_RETURN_LOBS)) {
                            ?>

                                    <tr>
                                        <td><?= $row['ŞİRKET'] ?></td>
                                        <td><b><?= $row['SATIR_KODU'] ?></b></td>
                                        <td><?= $row['TANIM'] ?></td>
                                        <?php if ($row['HESAPLANMIŞ_TUTAR'] <= 0): ?>
                                            <td>
                                            <span class="bg-danger py-1 px-2 rounded">
                                                <span class="text-white"><?= $row['HESAPLANMIŞ_TUTAR'] ?></span>
                                            </span>
                                            </td>
                                        <?php else: ?>
                                        <td>
                                            <span class="bg-success py-1 px-2 rounded"><span class="text-white"><?= $row['HESAPLANMIŞ_TUTAR'] ?></span></span>
                                        </td>
                                        <?php endif; ?>
                                    </tr>

                                <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /main charts -->


    </div>
    <!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_advanced.js') ?>


<?php $this->endSection(); ?>
<?php
