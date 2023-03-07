<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Rapor Server - Rapor Oluştur
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Rapor Server - <span class="fw-normal">Rapor Oluşturma</span>
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
                <a href="#" class="breadcrumb-item">Rapor Server</a>
                <span class="breadcrumb-item active">Rapor Oluşturma</span>
            </div>

        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">


    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">Rapor Oluştur</h5>
            <div class="d-inline-flex ms-auto">
             <span id="load" style="display: none">

                  <div class="d-flex align-items-center">
              <strong>Yükleniyor Lütfen Bekleyiniz.</strong>
              <div class="spinner-border text-success ms-4" role="status" aria-hidden="true"></div>
            </div>

              </span>
            </div>
        </div>

        <form action="#">
            <div class="row mb-3">
                <label class="col-lg-3 col-form-label">Rapor Başlık:</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-lg-3 col-form-label">Form Adı:</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-lg-3 col-form-label">Acıklama:</label>
                <div class="col-lg-9">
                    <textarea type="text" class="form-control"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-lg-3 col-form-label">Sql Sorgu:</label>
                <div class="col-lg-9">
                    <textarea type="text" class="form-control" rows="5" cols="7"></textarea>
                </div>
            </div>

        </form>

    </div>
    <!-- /main charts -->


</div>
<!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/demo/demo_configurator.js') ?>
<?= script_tag('public/admin/assets/js/vendor/editors/ace/ace.js') ?>
<?= script_tag('public/admin/assets/demo/pages/editor_code.js') ?>

<?php $this->endSection(); ?>
