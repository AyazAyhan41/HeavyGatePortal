<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Rapor Gönderme - <?= $baslik ?>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Rapor Gönderme - <span class="fw-normal"> <?= $baslik ?></span>
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
                <a href="#" class="breadcrumb-item">Raprolar</a>
                <span class="breadcrumb-item active"><?= $baslik ?></span>
            </div>

        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">


    <div class="alert alert-success alert-icon-start alert-dismissible fade show">
											<span class="alert-icon bg-success text-white">
												<i class="ph-check-circle"></i>
											</span>
        <span class="fw-semibold">Rapor Gönderim Başarılı!</span> <?= $baslik ?> Başarılı Bir Şekidle Gönderildi.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <!-- /main charts -->



</div>
<!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>


<?php $this->endSection(); ?>
