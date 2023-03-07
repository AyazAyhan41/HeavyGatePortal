<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Yurtiçi Gelir Bütçesi Karşılaştırma
<?php $this->endSection() ?>

<?php $this->section('css'); ?>
<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Yurtiçi Gelir Bütçesi Karşılaştırma</h4>

                <!--<div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Starter</li>
                    </ol>
                </div>-->

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="col-xxl-12">
        <div class="card border card-border-success">
            <div class="card-header">

                <h6 class="card-title mb-0">İşlemler <span class="badge bg-success align-middle fs-10"></span></h6>
            </div>
            <div class="card-body">
                <p class="card-text text-end">

                    <!-- Outline Buttons -->
                    <button type="button" class="btn btn-info" data-bs-toggle="offcanvas" href="#offcanvasExample"><i class="ri-filter-3-line align-bottom me-1"></i>Süzgeç</button>
                </p>
            </div>
        </div>
    </div><!-- end col -->



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Yurtiçi Gelir Bütçesi Karşılaştırma</h5>
                </div>
                <div class="card-body">
                    <table id="buttons-datatables" class="display table table-bordered table-striped table-success" style="width:100%">
                        <thead>
                        <tr>
                            <th>Yıl</th>
                            <th>Şirket</th>
                            <th>Pazar</th>
                            <th>Satış Grubu</th>
                            <th>Satış Grubu Açıklama</th>
                            <!--<th>OCAK Hedef</th>
                            <th>Ocak Gerçekleşen</th>-->

                        </tr>
                        </thead>

                       <tbody>
                       <?php while($row = oci_fetch_array($veri,OCI_BOTH)){ ?>

                        <tr>
                               <td><?=  $row['YIL']; ?></td>
                               <th><?=  $row['SIRKET']; ?></th>
                               <th><?=  $row['PAZAR']; ?></th>
                               <td><?= $row['SATIS_GRUBU']; ?></td>
                               <td class="text-end"><?= $row['SATIS_GRUP_ACIKLAMA']; ?></td>
                              <!-- <td class="text-end"><?php /*= $row['OCAK_HEDEFLENEN_EUR_TUTAR']; */?></td>
                               <td class="text-end"><?php /*= $row['OCAK_GERCEKLESEN_EUR_TUTAR']; */?></td>-->

                           </tr>

                       <?php } ?>

                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--end row-->






    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header bg-light ">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filitre</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!--end offcanvas-header-->

        <form action="<?php echo current_url() ?>" method="get" class="d-flex flex-column justify-content-end h-100">
            <div class="offcanvas-body">
                <div class="mb-4">
                    <label for="datepicker-range" class="form-label text-muted text-uppercase fw-semibold mb-3">Site</label>
                    <select class="js-example-basic-single" name="site">
                        <option value="AG01">Ağır</option>
                        <option value="AZ01">Azak</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="datepicker-range" class="form-label text-muted text-uppercase fw-semibold mb-3">Yıl</label>
                    <select class="js-example-basic-single" name="yil">
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>

            </div>
            <!--end offcanvas-body-->
            <div class="offcanvas-footer border-top p-3 text-center hstack gap-2">
                <button class="btn btn-light w-100">Temizle</button>
                <button type="submit" class="btn btn-success w-100">Uygula</button>
            </div>
            <!--end offcanvas-footer-->
        </form>
    </div>




</div>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>





<?= script_tag('public/admin/assets/js/pages/datatables.init.js') ?>





<?php $this->endSection(); ?>
