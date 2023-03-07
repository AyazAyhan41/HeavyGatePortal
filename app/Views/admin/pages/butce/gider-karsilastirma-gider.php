<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Gider Bütcesi - Gider Çeşidi Bazında Karşılaştırma
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Gider Bütçesi - <span class="fw-normal">Gider Çeşidi Bazında Karşılaştırma</span>
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
                <a href="#" class="breadcrumb-item">Gider Bütçesi</a>
                <span class="breadcrumb-item active">Gider Çeşidi Bazında Karşılaştırma</span>
            </div>

        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">




    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">Gider Çeşidi Bazında Karşılaştırma</h5>
            <div class="d-inline-flex ms-auto">
             <span id="load" style="display: none">

                  <div class="d-flex align-items-center">
              <strong>Yükleniyor Lütfen Bekleyiniz.</strong>
              <div class="spinner-border text-success ms-4" role="status" aria-hidden="true"></div>
            </div>

              </span>
            </div>
        </div>

        <table class="table datatable-colvis-gider2">
            <thead>
            <tr>
                <th>Yıl</th>
                <th>Şirket</th>
                <th>Gider Çeşidi</th>
                <th>Gider Çeşidi Açıklama</th>
                <th>OCAK Hedef</th>
                <th>Ocak Gerçekleşen</th>
                <th>Ocak Fark</th>
                <th>Şubat Hedef</th>
                <th>Şubat Gerçekleşen</th>
                <th>Şubat Fark</th>
                <th>Mart Hedef</th>
                <th>Mart Gerçekleşen</th>
                <th>Mart Fark</th>
                <th>Nisan Hedef</th>
                <th>Nisan Gerçekleşen</th>
                <th>Nisan Fark</th>
                <th>Mayıs Hedef</th>
                <th>Mayıs Gerçekleşen</th>
                <th>Mayıs Fark</th>
                <th>Haziran Hedef</th>
                <th>Haziran Gerçekleşen</th>
                <th>Haziran Fark</th>
                <th>Temmuz Hedef</th>
                <th>Temmuz Gerçekleşen</th>
                <th>Temmuz Fark</th>
                <th>Ağustos Hedef</th>
                <th>Ağustos Gerçekleşen</th>
                <th>Ağustos Fark</th>
                <th>Eylül Hedef</th>
                <th>Eylül Gerçekleşen</th>
                <th>Eylül Fark</th>
                <th>Ekim Hedef</th>
                <th>Ekim Gerçekleşen</th>
                <th>Ekim Fark</th>
                <th>Kasım Hedef</th>
                <th>Kasım Gerçekleşen</th>
                <th>Kasım Fark</th>
                <th>Aralık Hedef</th>
                <th>Aralık Gerçekleşen</th>
                <th>Aralık Fark</th>

            </tr>
            </thead>
            <tbody>
            <?php while ($row = oci_fetch_array($veri, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) { ?>
                <?php

                $ocakfark = (double)$row['OCAK_GERCEK'] - (double)$row['OCAK_HEDEF'];
                $subatfark = (double)$row['SUBAT_GERCEK'] - (double)$row['SUBAT_HEDEF'];
                $martfark = (double)$row['MART_GERCEK'] - (double)$row['MART_HEDEF'];
                $nisanfark = (double)$row['NISAN_GERCEK'] - (double)$row['NISAN_HEDEF'];
                $mayisfark = (double)$row['MAYIS_GERCEK'] - (double)$row['MAYIS_HEDEF'];
                $haziranfark = (double)$row['HAZIRAN_GERCEK'] - (double)$row['HAZIRAN_HEDEF'];
                $temmuzfark = (double)$row['TEMMUZ_GERCEK'] - (double)$row['TEMMUZ_HEDEF'];
                $agustosfark = (double)$row['AGUSTOS_GERCEK'] - (double)$row['AGUSTOS_HEDEF'];
                $eylulfark = (double)$row['EYLUL_GERCEK'] - (double)$row['EYLUL_HEDEF'];
                $ekimfark = (double)$row['EKIM_GERCEK'] - (double)$row['EKIM_HEDEF'];
                $kasimfark = (double)$row['KASIM_GERCEK'] - (double)$row['KASIM_HEDEF'];
                $aralikfark = (double)$row['ARALIK_GERCEK'] - (double)$row['ARALIK_HEDEF'];


                ?>
                <tr>
                    <td><?= $row['YIL']; ?></td>
                    <td><?= $row['SIRKET']; ?></td>
                    <td><?= $row['GIDER_CESIDI']; ?></td>
                    <td><?= $row['GC_ACIKLAMASI']; ?></td>
                    <td class="text-end"><?= number_format((double)$row['OCAK_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['OCAK_GERCEK'],2); ?></td>
                    <td class="text-end">

                        <?php if ($ocakfark <= 0): ?>
                            <span class="text-danger"><?= number_format($ocakfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($ocakfark,2) ?></span>
                        <?php endif; ?>

                    </td>
                    <td class="text-end"><?= number_format((double)$row['SUBAT_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['SUBAT_GERCEK'],2); ?></td>
                    <td class="text-end">
                        <?php if ($subatfark <= 0): ?>
                            <span class="text-danger"><?= number_format($subatfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($subatfark,2) ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= number_format((double)$row['MART_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['MART_GERCEK'],2); ?></td>
                    <td class="text-end">
                        <?php if ($martfark <= 0): ?>
                            <span class="text-danger"><?= number_format($martfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($martfark,2) ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= number_format((double)$row['NISAN_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['NISAN_GERCEK'],2); ?></td>
                    <td class="text-end">
                        <?php if ($nisanfark <= 0): ?>
                            <span class="text-danger"><?= number_format($nisanfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($nisanfark,2) ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= number_format((double)$row['MAYIS_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['MAYIS_GERCEK'],2); ?></td>
                    <td class="text-end">
                        <?php if ($mayisfark <= 0): ?>
                            <span class="text-danger"><?= number_format($mayisfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($mayisfark,2) ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= number_format((double)$row['HAZIRAN_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['HAZIRAN_GERCEK'],2); ?></td>
                    <td class="text-end">
                        <?php if ($haziranfark <= 0): ?>
                            <span class="text-danger"><?= number_format($haziranfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($haziranfark,2) ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= number_format((double)$row['TEMMUZ_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['TEMMUZ_GERCEK'],2); ?></td>
                    <td class="text-end">
                        <?php if ($temmuzfark <= 0): ?>
                            <span class="text-danger"><?= number_format($temmuzfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($temmuzfark,2) ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= number_format((double)$row['AGUSTOS_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['AGUSTOS_GERCEK'],2); ?></td>
                    <td class="text-end">
                        <?php if ($agustosfark <= 0): ?>
                            <span class="text-danger"><?= number_format($agustosfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($agustosfark,2) ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= number_format((double)$row['EYLUL_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['EYLUL_GERCEK'],2); ?></td>
                    <td class="text-end">
                        <?php if ($eylulfark <= 0): ?>
                            <span class="text-danger"><?= number_format($eylulfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($eylulfark,2) ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= number_format((double)$row['EKIM_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['EKIM_GERCEK'],2); ?></td>
                    <td class="text-end">
                        <?php if ($ekimfark <= 0): ?>
                            <span class="text-danger"><?= number_format($ekimfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($ekimfark,2) ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= number_format((double)$row['KASIM_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['KASIM_GERCEK'],2); ?></td>
                    <td class="text-end">
                        <?php if ($kasimfark <= 0): ?>
                            <span class="text-danger"><?= number_format($kasimfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($kasimfark,2) ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= number_format((double)$row['ARALIK_HEDEF'],2); ?></td>
                    <td class="text-end"><?= number_format((double)$row['ARALIK_GERCEK'],2); ?></td>
                    <td class="text-end">
                        <?php if ($aralikfark <= 0): ?>
                            <span class="text-danger"><?= number_format($aralikfark,2) ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= number_format($aralikfark,2) ?></span>
                        <?php endif; ?>
                    </td>

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
<?= script_tag('public/admin/assets/demo/pages/datatables_extension_colvis.js') ?>
<?= script_tag('public/admin/assets/js/vendor/visualization/echarts/echarts.min.js') ?>
<?= script_tag('public/admin/assets/js/vendor/forms/selects/select2.min.js') ?>
<?= script_tag('public/admin/assets/demo/pages/form_select2.js') ?>




<?php $this->endSection(); ?>
