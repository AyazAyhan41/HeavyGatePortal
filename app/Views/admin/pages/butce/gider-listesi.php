<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Gider Bütçesi
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Gider Bütçesi - <span class="fw-normal">Gider Bütçe Listesi</span>
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
                <!-- <a href="#" class="breadcrumb-item">Gider Bütçesi</a>-->
                <span class="breadcrumb-item active">Gider Bütçesi</span>
            </div>

        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <!-- Main charts -->
    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">Gider Bütçesi</h5>
            <div class="d-inline-flex ms-auto">
              <span id="load" style="display: none">
                <div class="text-center">
                    <i class="fa fa-spinner fa-2x fa-spin"></i> Yükleniyor Lütfen Bekleyiniz.
                </div>
              </span>
            </div>
        </div>

        <table class="table datatable-colvis-gider">
            <thead>
            <tr>
                <th>Şirket</th>
                <th>Hesap</th>
                <th>Hesap Açıklama</th>
                <th class="text-end">Ocak</th>
                <th class="text-end">Şubat</th>
                <th class="text-end">Mart</th>
                <th class="text-end">Nisan</th>
                <th class="text-end">Mayıs</th>
                <th class="text-end">Haziran</th>
                <th class="text-end">Temmuz</th>
                <th class="text-end">Ağustos</th>
                <th class="text-end">Eylül</th>
                <th class="text-end">Ekim</th>
                <th class="text-end">Kasım</th>
                <th class="text-end">Aralık</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $ocak_top = 0;
            $subat_top = 0;
            $mart_top = 0;
            $nisan_top = 0;
            $mayis_top = 0;
            $haziran_top = 0;
            $temmuz_top = 0;
            $agustos_top = 0;
            $eylul_top = 0;
            $ekim_top = 0;
            $kasim_top = 0;
            $aralik_top = 0;
            $genel_top = 0;

            while ($row = oci_fetch_array($veri, OCI_BOTH)) {

                $fmt = numfmt_create('de_DE', NumberFormatter::CURRENCY);
                $ocak_top += (float)$row['OCAK_TUTAR'];
                $subat_top += (float)$row['SUBAT_TUTAR'];
                $mart_top += (float)$row['MART_TUTAR'];
                $nisan_top += (float)$row['NISAN_TUTAR'];
                $mayis_top += (float)$row['MAYIS_TUTAR'];
                $haziran_top += (float)$row['HAZIRAN_TUTAR'];
                $temmuz_top += (float)$row['TEMMUZ_TUTAR'];
                $agustos_top += (float)$row['AGUSTOS_TUTAR'];
                $eylul_top += (float)$row['EYLUL_TUTAR'];
                $ekim_top += (float)$row['EKIM_TUTAR'];
                $kasim_top += (float)$row['KASIM_TUTAR'];
                $aralik_top += (float)$row['ARALIK_TUTAR'];

                ?>
                <tr>
                    <td><?= $row['SIRKET']; ?></td>
                    <td><?= $row['HESAP']; ?></td>
                    <td><?= $row['HESAPACIKLAMA']; ?></td>
                    <td class="text-end"><?= number_format((double)$row['OCAK_TUTAR'], 2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['SUBAT_TUTAR'], 2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['MART_TUTAR'], 2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['NISAN_TUTAR'], 2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['MAYIS_TUTAR'], 2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['HAZIRAN_TUTAR'], 2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['TEMMUZ_TUTAR'], 2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['AGUSTOS_TUTAR'], 2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['EYLUL_TUTAR'], 2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['EKIM_TUTAR'], 2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['KASIM_TUTAR'], 2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['ARALIK_TUTAR'], 2); ?></td>

                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <th class="text-end"></th>
            <th class="text-end"></th>
            <th class="text-center">Toplam</th>
            <th class="text-end"><?= "€" . number_format($ocak_top, 2) ?></th>
            <th class="text-end"><?= "€" . number_format($subat_top, 2) ?></th>
            <th class="text-end"><?= "€" . number_format($mart_top, 2) ?></th>
            <th class="text-end"><?= "€" . number_format($nisan_top, 2) ?></th>
            <th class="text-end"><?= "€" . number_format($mayis_top, 2) ?></th>
            <th class="text-end"><?= "€" . number_format($haziran_top, 2) ?></th>
            <th class="text-end"><?= "€" . number_format($temmuz_top, 2) ?></th>
            <th class="text-end"><?= "€" . number_format($agustos_top, 2) ?></th>
            <th class="text-end"><?= "€" . number_format($eylul_top, 2) ?></th>
            <th class="text-end"><?= "€" . number_format($ekim_top, 2) ?></th>
            <th class="text-end"><?= "€" . number_format($kasim_top, 2) ?></th>
            <th class="text-end"><?= "€" . number_format($aralik_top, 2) ?></th>
            </tfoot>
        </table>
    </div>
    <!-- /main charts -->


</div>
<!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_extension_colvis.js') ?>
<?php $this->endSection(); ?>
