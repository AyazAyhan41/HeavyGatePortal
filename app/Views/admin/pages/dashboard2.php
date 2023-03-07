<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
    Admin Özet
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Admin - <span class="fw-normal">Ana Sayfa</span>
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
                    <a href="#" class="breadcrumb-item">Home</a>
                    <span class="breadcrumb-item active">Dashboard 2</span>
                </div>

                <a href="#breadcrumb_elements"
                   class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                   data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>


        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Tüm Zaman İş Emri Durumları </h5>
            </div>


            <div class="card-body">
                <div class="row">
                    <?php



                    while ($row = oci_fetch_array($planlandi, OCI_BOTH)) {
                    ?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-dark text-white">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <h4 class="mb-0"><?= $row['SAY'] ?></h4>
                                    Planlı İş Emri
                                </div>

                                <i class="ph-plus ph-2x opacity-75 ms-3"></i>
                            </div>
                        </div>
                    </div>

                        <?php } ?>

                    <?php

                    while ($row2 = oci_fetch_array($yayimlandi, OCI_BOTH)) {
                        ?>
                        <div class="col-sm-6 col-xl-3">
                            <div class="card card-body bg-danger text-white">
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <h4 class="mb-0"><?= $row2['SAY'] ?></h4>
                                        Yayımlandı İş Emri
                                    </div>

                                    <i class="ph-plus ph-2x opacity-75 ms-3"></i>
                                </div>
                            </div>
                        </div>

                    <?php } ?>


                    <?php

                    while ($row3 = oci_fetch_array($kapatildi, OCI_BOTH)) {
                        ?>
                        <div class="col-sm-6 col-xl-3">
                            <div class="card card-body bg-success text-white">
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <h4 class="mb-0"><?= $row3['SAY'] ?></h4>
                                        Kapatıldı İş Emri
                                    </div>

                                    <i class="ph-plus ph-2x opacity-75 ms-3"></i>
                                </div>
                            </div>
                        </div>

                    <?php } ?>


                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body text-center">
                            <h6 class="mb-0"></h6>
                            <div class="fs-sm text-muted mb-3"></div>

                            <div class="svg-center" id="pie_progress_bar"></div>
                        </div>
                    </div>


                </div>

            </div>
        </div>


    </div>
    <!-- /content area -->
<?php $this->endSection(); ?>
<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/js/vendor/visualization/d3/d3.min.js') ?>
<?= script_tag('public/admin/assets/js/vendor/visualization/d3/d3_tooltip.js') ?>
<?= script_tag('public/admin/assets/demo/pages/widgets_stats.js') ?>
<?php $this->endSection(); ?>
