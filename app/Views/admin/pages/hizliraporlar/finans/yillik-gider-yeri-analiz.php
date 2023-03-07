<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Hızlı Raporlar - Yıllık Gider Yeri Analizi
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Hızlı Raporlar - <span class="fw-normal">Yıllık Gider Yeri Analizi</span>
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
                <a href="#" class="breadcrumb-item">Hızlı Raporlar</a>
                <span class="breadcrumb-item active">Yıllık Gider Yeri Analizi</span>
            </div>

        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Filitre</h5>
        </div>

        <div class="card-body">
            <form action="<?= current_url() ?>" method="GET">
                <div class="mb-3 row">
                    <label class="col-form-label col-lg-3">Yıl Seçim</label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <select class="form-control select" name="yil" data-width="1%">

                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                            <button type="submit" class="btn btn-success">Sorgula</button>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-form-label col-lg-3">Gider Yeri</label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <select class="form-control select" name="gy" data-width="1%">
                                <option value="">Seçiniz</option>
                                <?php while ($row2 = oci_fetch_array($gy, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) { ?>
                                <option value="<?= $row2['CODE_B'] ?>"><?= $row2['DESCRIPTION'] ?></option>
                                <?php } ?>
                                
                            </select>
                            <button type="submit" class="btn btn-success">Sorgula</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>


    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Yıllık Gider Yeri Analizi</h5>
        </div>

        <div class="card-body">

        </div>

        <table class="table datatable-reorder">
            <thead>
            <tr>
                <th>Hesap Yılı</th>
                <th>Gelir Yeri</th>
                <th>Gelir Yeri Tanım</th>
                <th>GC</th>
                <th>Indirimsiz TL Tutar</th>
                <th>OCAK</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = oci_fetch_array($veri, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) { ?>
                <tr>
                    <td><?= $row['ACCOUNTING_YEAR'] ?></td>
                    <td><?= $row['GY'] ?></td>
                    <td><?= $row['GY_TANIM'] ?></td>
                    <td><?= $row['GC'] ?></td>
                    <td><?= $row['GC_TANIM'] ?></td>
                    <td><?= $row['AY01'] ?></td>
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

<?= script_tag('public/admin/assets/js/vendor/tables/datatables/extensions/col_reorder.min.js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_extension_reorder.js') ?>


<?php $this->endSection(); ?>
