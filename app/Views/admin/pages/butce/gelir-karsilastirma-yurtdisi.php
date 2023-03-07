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
                Gelir Bütçesi - <span class="fw-normal">Yurtdışı Gelir Bütçesi</span>
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
                <a href="#" class="breadcrumb-item">Gelir Bütçesi</a>
                <span class="breadcrumb-item active">Yurtdışı Gelir Bütçesi</span>
            </div>

            <a href="#breadcrumb_elements"
               class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
               data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>

        <div class="collapse d-lg-block ms-lg-auto" id="breadcrumb_elements">
            <div class="d-lg-flex mb-2 mb-lg-0">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_full">
                    Oransal Fark <i class="ph-play-circle ms-2"></i></button>
            </div>
        </div>
    </div>
</div>

<!-- /page header -->


<!-- Content area -->
<div class="content">

    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">Yurtdışı Gelir Karşılaştırma</h5>

            <div class="d-inline-flex ms-auto">
              <span id="load" style="display: none">
                  <div class="d-flex align-items-center">
              <strong>Yükleniyor Lütfen Bekleyiniz.</strong>
              <div class="spinner-border text-success ms-4" role="status" aria-hidden="true"></div>
            </div>

              </span>
            </div>
        </div>

        <table class="table datatable-colvis-group">
            <thead>
            <tr>
                <th>Yıl</th>
                <th>Şirket</th>
                <th>Pazar</th>
                <th>Satış Grubu</th>
                <th>Satış Grubu Açıklama</th>
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


                /*$ocak_fark = (double)$row3['OCAK_GERCEK'] / (double)$row3['OCAK_HEDEF'] * 100;
                $subat_fark = (double)$row3['SUBAT_GERCEK'] / (double)$row3['SUBAT_HEDEF'] * 100;
                $mart_fark = (double)$row3['MART_GERCEK'] / (double)$row3['MART_HEDEF'] * 100;
                $nisan_fark = (double)$row3['NISAN_GERCEK'] / (double)$row3['NISAN_HEDEF'] * 100;
                $mayis_fark = (double)$row3['MAYIS_GERCEK'] / (double)$row3['MAYIS_HEDEF'] * 100;
                $haziran_fark = (double)$row3['HAZIRAN_GERCEK'] / (double)$row3['HAZIRAN_HEDEF'] * 100;
                $temmuz_fark = (double)$row3['TEMMUZ_GERCEK'] / (double)$row3['TEMMUZ_HEDEF'] * 100;
                if (!is_null($row3['AGUSTOS_HEDEF'])) {
                    $agustos_fark = (double)$row3['AGUSTOS_GERCEK'] / (double)$row3['AGUSTOS_HEDEF'] * 100;
                } else {
                    $agustos_fark = 0;
                }
                $eylul_fark = (double)$row3['EYLUL_GERCEK'] / (double)$row3['EYLUL_HEDEF'] * 100;
                $ekim_fark = (double)$row3['EKIM_GERCEK'] / (double)$row3['EKIM_HEDEF'] * 100;
                $kasim_fark = (double)$row3['KASIM_GERCEK'] / (double)$row3['KASIM_HEDEF'] * 100;
                $aralik_fark = (double)$row3['ARALIK_GERCEK'] / (double)$row3['ARALIK_HEDEF'] * 100;*/


                ?>
                <tr>
                    <td><?= $row['YIL']; ?></td>
                    <td><?= $row['SIRKET']; ?></td>
                    <td><?= $row['PAZAR']; ?></td>
                    <td><?= $row['SATIS_GRUBU']; ?></td>
                    <td><?= $row['SATIS_GRUP_ACIKLAMA']; ?></td>
                    <td class="text-end"><?= (double)$row['OCAK_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['OCAK_GERCEK']; ?></td>
                    <td class="text-end">

                        <?php if ($ocakfark <= 0): ?>
                            <span class="text-danger"><?= $ocakfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $ocakfark ?></span>
                        <?php endif; ?>

                    </td>
                    <td class="text-end"><?= (double)$row['SUBAT_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['SUBAT_GERCEK']; ?></td>
                    <td class="text-end">
                        <?php if ($subatfark <= 0): ?>
                            <span class="text-danger"><?= $subatfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $subatfark ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= (double)$row['MART_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['MART_GERCEK']; ?></td>
                    <td class="text-end">
                        <?php if ($martfark <= 0): ?>
                            <span class="text-danger"><?= $martfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $martfark ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= (double)$row['NISAN_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['NISAN_GERCEK']; ?></td>
                    <td class="text-end">
                        <?php if ($nisanfark <= 0): ?>
                            <span class="text-danger"><?= $nisanfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $nisanfark ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= (double)$row['MAYIS_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['MAYIS_GERCEK']; ?></td>
                    <td class="text-end">
                        <?php if ($mayisfark <= 0): ?>
                            <span class="text-danger"><?= $mayisfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $mayisfark ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= (double)$row['HAZIRAN_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['HAZIRAN_GERCEK']; ?></td>
                    <td class="text-end">
                        <?php if ($haziranfark <= 0): ?>
                            <span class="text-danger"><?= $haziranfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $haziranfark ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= (double)$row['TEMMUZ_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['TEMMUZ_GERCEK']; ?></td>
                    <td class="text-end">
                        <?php if ($temmuzfark <= 0): ?>
                            <span class="text-danger"><?= $temmuzfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $temmuzfark ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= (double)$row['AGUSTOS_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['AGUSTOS_GERCEK']; ?></td>
                    <td class="text-end">
                        <?php if ($agustosfark <= 0): ?>
                            <span class="text-danger"><?= $agustosfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $agustosfark ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= (double)$row['EYLUL_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['EYLUL_GERCEK']; ?></td>
                    <td class="text-end">
                        <?php if ($eylulfark <= 0): ?>
                            <span class="text-danger"><?= $eylulfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $eylulfark ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= (double)$row['EKIM_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['EKIM_GERCEK']; ?></td>
                    <td class="text-end">
                        <?php if ($ekimfark <= 0): ?>
                            <span class="text-danger"><?= $ekimfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $ekimfark ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= (double)$row['KASIM_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['KASIM_GERCEK']; ?></td>
                    <td class="text-end">
                        <?php if ($kasimfark <= 0): ?>
                            <span class="text-danger"><?= $kasimfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $kasimfark ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end"><?= (double)$row['ARALIK_HEDEF']; ?></td>
                    <td class="text-end"><?= (double)$row['ARALIK_GERCEK']; ?></td>
                    <td class="text-end">
                        <?php if ($aralikfark <= 0): ?>
                            <span class="text-danger"><?= $aralikfark ?></span>
                        <?php else: ?>
                            <span class="text-success"><?= $aralikfark ?></span>
                        <?php endif; ?>
                    </td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /main charts -->

    <div id="modal_full" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yurtdışı Gelir Bütçesi Oransal(%)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Yurtdışı Gelir Bütçesi Oransal(%)</h5>
                        </div>

                        <table class="table datatable-colvis-oran">
                            <thead>
                            <tr>
                                <th>Pazar</th>
                                <th>Satış Grubu Açıklama</th>
                                <th>Ocak Fark</th>
                                <th>Şubat Fark</th>
                                <th>Mart Fark</th>
                                <th>Nisan Fark</th>
                                <th>Mayıs Fark</th>
                                <th>Haziran Fark</th>
                                <th>Temmuz Fark</th>
                                <th>Ağustos Fark</th>
                                <th>Eylül Fark</th>
                                <th>Ekim Fark</th>
                                <th>Kasım Fark</th>
                                <th>Aralık Fark</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php


                            while ($row3 = oci_fetch_array($tablo, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) {

                                if (!is_null($row3['OCAK_HEDEF'])) {
                                    $ocak_fark = (double)$row3['OCAK_GERCEK'] / (double)$row3['OCAK_HEDEF'] * 100;
                                } else {
                                    $ocak_fark = 0;
                                }

                                if (!is_null($row3['SUBAT_HEDEF'])) {
                                    $subat_fark = (double)$row3['SUBAT_GERCEK'] / (double)$row3['SUBAT_HEDEF'] * 100;
                                } else {
                                    $subat_fark = 0;
                                }

                                if (!is_null($row3['MART_HEDEF'])) {
                                    $mart_fark = (double)$row3['MART_GERCEK'] / (double)$row3['MART_HEDEF'] * 100;
                                } else {
                                    $mart_fark = 0;
                                }

                                if (!is_null($row3['NISAN_HEDEF'])) {
                                    $nisan_fark = (double)$row3['NISAN_GERCEK'] / (double)$row3['NISAN_HEDEF'] * 100;
                                } else {
                                    $nisan_fark = 0;
                                }

                                if (!is_null($row3['MAYIS_HEDEF'])) {
                                    $mayis_fark = (double)$row3['MAYIS_GERCEK'] / (double)$row3['MAYIS_HEDEF'] * 100;
                                } else {
                                    $mayis_fark = 0;
                                }

                                if (!is_null($row3['HAZIRAN_HEDEF'])) {
                                    $haziran_fark = (double)$row3['HAZIRAN_GERCEK'] / (double)$row3['HAZIRAN_HEDEF'] * 100;
                                } else {
                                    $haziran_fark = 0;
                                }

                                if (!is_null($row3['TEMMUZ_HEDEF'])) {
                                    $temmuz_fark = (double)$row3['TEMMUZ_GERCEK'] / (double)$row3['TEMMUZ_HEDEF'] * 100;
                                } else {
                                    $temmuz_fark = 0;
                                }

                                if (!is_null($row3['AGUSTOS_HEDEF'])) {
                                    $agustos_fark = (double)$row3['AGUSTOS_GERCEK'] / (double)$row3['AGUSTOS_HEDEF'] * 100;
                                } else {
                                    $agustos_fark = 0;
                                }

                                if (!is_null($row3['EYLUL_HEDEF'])) {
                                    $eylul_fark = (double)$row3['EYLUL_GERCEK'] / (double)$row3['EYLUL_HEDEF'] * 100;
                                } else {
                                    $eylul_fark = 0;
                                }

                                if (!is_null($row3['EKIM_HEDEF'])) {
                                    $ekim_fark = (double)$row3['EKIM_GERCEK'] / (double)$row3['EKIM_HEDEF'] * 100;
                                } else {
                                    $ekim_fark = 0;
                                }


                                if (!is_null($row3['KASIM_HEDEF'])) {
                                    $kasim_fark = (double)$row3['KASIM_GERCEK'] / (double)$row3['KASIM_HEDEF'] * 100;
                                } else {
                                    $kasim_fark = 0;
                                }

                                if (!is_null($row3['ARALIK_HEDEF'])) {
                                    $aralik_fark = (double)$row3['ARALIK_GERCEK'] / (double)$row3['ARALIK_HEDEF'] * 100;
                                } else {
                                    $aralik_fark = 0;
                                }

                                ?>
                                <tr>
                                    <td><?= $row3['PAZAR']; ?></td>
                                    <td><?= $row3['SATIS_GRUP_ACIKLAMA']; ?></td>
                                    <td class="text-end"><?= round($ocak_fark, 2) ?> %</td>
                                    <td class="text-end"><?= round($subat_fark, 2) ?> %</td>
                                    <td class="text-end"><?= round($mart_fark, 2) ?> %</td>
                                    <td class="text-end"><?= round($nisan_fark, 2) ?> %</td>
                                    <td class="text-end"><?= round($mayis_fark, 2) ?> %</td>
                                    <td class="text-end"><?= round($haziran_fark, 2) ?> %</td>
                                    <td class="text-end"><?= round($temmuz_fark, 2) ?> %</td>
                                    <td class="text-end"><?= round($agustos_fark, 2) ?> %</td>
                                    <td class="text-end"><?= round($eylul_fark, 2) ?> %</td>
                                    <td class="text-end"><?= round($ekim_fark, 2) ?> %</td>
                                    <td class="text-end"><?= round($kasim_fark, 2) ?> %</td>
                                    <td class="text-end"><?= round($aralik_fark, 2) ?> %</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_extension_colvis.js') ?>
<?= script_tag('public/admin/assets/js/vendor/visualization/echarts/echarts.min.js') ?>







<?php $this->endSection(); ?>

<?php $this->section('js') ?>

<?php $this->endSection() ?>
