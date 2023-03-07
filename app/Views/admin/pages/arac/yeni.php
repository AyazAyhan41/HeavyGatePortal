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
        <div class="card-header">
            <h5 class="mb-0">Araç Kayıt</h5>
        </div>


        <div class="card-body border-top">
            <form action="<?= current_url() ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">Kayıt Tipi :</label>
                    <select class="form-control form-control-select2" name="kayit_tipi">
                        <option value="KendiAracimiz">Kendi Aracimiz</option>
                        <option value="NakliyeFirmasi">Nakliye Firmasi</option>
                        <option value="MusterininAraci">Musterinin Araci</option>
                        <option value="TedarikcininAraci">Tedarikcinin Araci</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Site:</label>
                    <input type="text" class="form-control" value="AZ01" name="site" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kayıt Eden:</label>
                    <input type="text" class="form-control" value="IFSAPP" name="kayit_eden" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kayıt Tarihi:</label>
                    <input type="text" class="form-control" value="<?= date('Y-m-d H:s:i') ?>" name="kayit_tarih" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Plaka:</label>
                    <input type="text" class="form-control" name="plaka">
                </div>

                <div class="mb-3">
                    <label class="form-label">Sürücü :</label>
                    <input type="text" class="form-control"  name="surucu">
                </div>


                <div class="mb-3">
                    <label class="form-label">Geliş Tarihi:</label>
                    <input type="text" class="form-control datepicker-basic" name="gelis_tarih">
                </div>

                <div class="mb-3">
                    <label class="form-label">Fabrika Giriş Tarihi:</label>
                    <input type="text" class="form-control datepicker-basic2" name="fab_giris_tarih">
                </div>


                <div class="mb-3">
                    <label class="form-label">Sürücü Tc:</label>
                    <input type="text" class="form-control" name="surucu_tc">
                </div>





                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Kaydet <i class="ph-floppy-disk ms-2"></i></button>
                </div>
            </form>
        </div>
    </div>



</div>
<!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>

<?= script_tag('public/admin/assets/demo/pages/picker_date.js') ?>

<?php $this->endSection(); ?>
