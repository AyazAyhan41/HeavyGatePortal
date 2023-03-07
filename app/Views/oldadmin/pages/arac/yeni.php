<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Yeni Araç Kayıt
<?php $this->endSection() ?>

<?php $this->section('css') ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Yeni Grup Ekle</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active">Yeni Araç Kayıt</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xxl-12">
            <div class="card border card-border-dark">
                <form action="<?= current_url() ?>" method="post">
                    <?= csrf_field() ?>
                <div class="card-header">
                    <span class="float-end"></span>
                    <h6 class="card-title mb-0">Araç Bilgileri</h6>
                </div>


                <div class="card-body">



                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">Kayıt Tipi</label>
                                    <select class="js-example-basic-single" name="kayit_tipi">
                                        <option value="KendiAracimiz">Kendi Aracimiz</option>
                                        <option value="NakliyeFirmasi">Nakliye Firmasi</option>
                                        <option value="MusterininAraci">Musterinin Araci</option>
                                        <option value="TedarikcininAraci">Tedarikcinin Araci</option>
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="lastNameinput" class="form-label">Site</label>
                                    <input type="text" class="form-control" value="AZ01" name="site" readonly>
                                </div>
                            </div><!--end col-->
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="lastNameinput" class="form-label">Kayıt Eden</label>
                                    <input type="text" class="form-control" value="IFSAPP" name="kayit_eden" readonly>
                                </div>
                            </div><!--end col-->

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="lastNameinput" class="form-label">Kayıt Tarihi</label>
                                    <input type="text" class="form-control" value="<?= date('Y-m-d H:s:i') ?>" name="kayit_tarih" readonly>
                                </div>
                            </div><!--end col-->

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="lastNameinput" class="form-label">Plaka</label>
                                    <input type="text" class="form-control" name="plaka" >
                                </div>
                            </div><!--end col-->

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="lastNameinput" class="form-label">Sürücü</label>
                                    <input type="text" class="form-control" name="surucu" >
                                </div>
                            </div><!--end col-->

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="lastNameinput" class="form-label">Geliş Tarihi</label>
                                    <input type="text" class="form-control" name="gelis_tarih" data-provider="flatpickr" data-date-format="d.m.y" data-enable-time >
                                </div>
                            </div><!--end col-->

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="lastNameinput" class="form-label">Fabrika Giriş Tarihi</label>
                                    <input type="text" class="form-control" name="fab_giris_tarih" data-provider="flatpickr" data-date-format="d.m.y" data-enable-time >
                                </div>
                            </div><!--end col-->

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="lastNameinput" class="form-label">Sürücü T.C</label>
                                    <input type="text" class="form-control" name="surucu_tc" >
                                </div>
                            </div><!--end col-->
                            
                        </div><!--end row-->

                </div>

                    <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success">Kayıt</button>
                    </div>
                </form>
            </div>
        </div><!-- end col -->
    </div>

</div>

<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?= script_tag('public/admin/assets/js/pages/select2.init.js') ?>


<?php $this->endSection() ?>
