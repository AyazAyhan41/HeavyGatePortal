<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Analizler - Multi-Company Customer Analysis
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Gelir Bütçesi - <span class="fw-normal">Multi-Company Customer Analysis</span>
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
                <a href="#" class="breadcrumb-item">Analizler</a>
                <span class="breadcrumb-item active">Multi-Company Customer Analysis</span>
            </div>

        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">


    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">Müşteri Listesi</h5>
            <div class="d-inline-flex ms-auto">
                <a href="<?= base_url(route_to('admin_musteri_analiz_detay',service('request')->uri->getSegment(6).'/AGIR')); ?>" class="btn btn-secondary" style="margin-right: 5px;">AGIR</a>
                <a href="<?= base_url(route_to('admin_musteri_analiz_detay',service('request')->uri->getSegment(6).'/AZAK')); ?>" class="btn btn-primary">AZAK</a>
            </div>
        </div>

        <table class="table datatable-select-basic dataTable no-footer">
            <thead>
            <tr>
                <th>Sirket</th>
                <th>Fatura/Önödeme Seri No</th>
                <th>Fatura/Önödeme No</th>
                <th>Versiyon</th>
                <th>Açıklama</th>
                <th>Avans/Önödeme Faturası</th>
                <th>Düzeltme Faturası</th>
                <th>Fatura Ödeme Tarihi</th>
                <th>Sonraki/Önceki Vade Tar.</th>
                <th>Fatura/ÖnÖdeme Tutar</th>
                <th>Açık Tutar</th>
                <th>Döviz</th>
                <th>Muhasebe Dövizindeki Ön Ödeme Tutar</th>
                <th>İptal</th>
                <th>Muhasebe Döviz Açık Tutar</th>
                <th>Muhasebe Döviz</th>
                <th>Notlar</th>

            </tr>
            </thead>
            <tbody>
            <?php

            $fatonodeme=0;
            $fatonacik=0;

            while ($row = oci_fetch_array($detay, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) {

                $fmt = numfmt_create('de_DE', NumberFormatter::CURRENCY);
                $fatonodeme += (double)$row['INV_AMOUNT'];
                $fatonacik += (double)$row['INV_AMOUNT'];


                ?>
            <tr>
                <td><?= $row['COMPANY'] ?></td>
                <td><?= $row['IDENTITY'] ?></td>
                <td><?= $row['LEDGER_ITEM_ID'] ?></td>
                <td><?= $row['LEDGER_ITEM_VERSION'] ?></td>
                <td><?= $row['INV_TYPE_DESC'] ?></td>
                <td>
                    <?php if ($row['CORRECTION_INVOICE'] == 'TRUE'): ?>
                        <label class="form-check mb-2">
                            <input type="checkbox" class="form-check-input form-check-input-secondary" disabled checked>
                            <span class="form-check-label"></span>
                        </label>
                <?php else: ?>
                    <label class="form-check mb-2">
                        <input type="checkbox" class="form-check-input form-check-input-secondary" disabled>
                        <span class="form-check-label"></span>
                    </label>
                <?php endif; ?>
                </td>
                <td>
                    <?php if ($row['CORRECTION_EXISTS'] == 'TRUE'): ?>
                        <label class="form-check mb-2">
                            <input type="checkbox" class="form-check-input form-check-input-secondary" disabled checked>
                            <span class="form-check-label"></span>
                        </label>
                    <?php else: ?>
                        <label class="form-check mb-2">
                            <input type="checkbox" class="form-check-input form-check-input-secondary" disabled>
                            <span class="form-check-label"></span>
                        </label>
                    <?php endif; ?>
                </td>
                <td><?= $row['LEDGER_DATE'] ?></td>
                <td><?= $row['DUE_DATE'] ?></td>
                <td><?= $row['INV_AMOUNT'] ?></td>
                <td><?= $row['OPEN_AMOUNT'] ?></td>
                <td><?= $row['DOVIZ'] ?></td>
                <td><?= $row['INTEREST_CURR_AMOUNT'] ?></td>
                <td>
                    <?php if ($row['IS_CANCELLED'] == 'TRUE'): ?>
                        <label class="form-check mb-2">
                            <input type="checkbox" class="form-check-input form-check-input-secondary" disabled checked>
                            <span class="form-check-label"></span>
                        </label>
                    <?php else: ?>
                        <label class="form-check mb-2">
                            <input type="checkbox" class="form-check-input form-check-input-secondary" disabled>
                            <span class="form-check-label"></span>
                        </label>
                    <?php endif; ?>

                </td>
                <td><?= $row['INV_DOM_AMOUNT'] ?></td>
                <td><?= $row['DOVIZ'] ?></td>
                <td>
                    <?php if ($row['IS_NOTE'] == 'TRUE'): ?>
                        <label class="form-check mb-2">
                            <input type="checkbox" class="form-check-input form-check-input-secondary" disabled checked>
                            <span class="form-check-label"></span>
                        </label>
                    <?php else: ?>
                        <label class="form-check mb-2">
                            <input type="checkbox" class="form-check-input form-check-input-secondary" disabled>
                            <span class="form-check-label"></span>
                        </label>
                    <?php endif; ?>

                </td>
            </tr>

            <?php } ?>
            </tbody>
            <tfoot>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><?= number_format($fatonodeme,2) ?></th>
            <th><?= number_format($fatonacik,2) ?></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </tfoot>
        </table>
    </div>
    <!-- /main charts -->



</div>
<!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_extension_select.js') ?>

<?php $this->endSection(); ?>
