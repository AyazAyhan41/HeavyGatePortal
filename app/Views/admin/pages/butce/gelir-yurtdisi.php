<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
    Gelir Bütcesi - Yurtdışı Gelir Bütçesi
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Gelir Bütçesi - <span class="fw-normal">Yurtdışı Gelir Bütçesi</span>
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
                    <span class="breadcrumb-item active">Yurtdışı Gelir Bütçesi</span>
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
                <h5 class="mb-0">YURTDIŞI GELİR BÜTÇESİ (€)</h5>
                <div class="d-inline-flex ms-auto">
              <span id="load" style="display: none">

                  <div class="d-flex align-items-center">
              <strong>Yükleniyor Lütfen Bekleyiniz.</strong>
              <div class="spinner-border text-success ms-4" role="status" aria-hidden="true"></div>
            </div>

              </span>
                </div>
            </div>

            <table class="table datatable-colvis-restore">
                <thead>
                <tr>
                    <th>PAZAR</th>
                    <th>SITE</th>
                    <th>Muhasebe Grubu</th>
                    <th>AÇIKLAMA</th>
                    <th class="text-end">Tutar</th>
                    <th>Ocak</th>
                    <th>Şubat</th>
                    <th>Mart</th>
                    <th>Nisan</th>
                    <th>Mayıs</th>
                    <th>Haziran</th>
                    <th>Temmuz</th>
                    <th>Ağustos</th>
                    <th>Eylül</th>
                    <th>Ekim</th>
                    <th>Kasım</th>
                    <th>Aralık</th>
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
               while($row = oci_fetch_array($veri,OCI_BOTH)){


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
                   $genel_top += (float)$row['OCAK_TUTAR']
                       + (float)$row['SUBAT_TUTAR']
                       + (float)$row['MART_TUTAR']
                       + (float)$row['NISAN_TUTAR']
                       + (float)$row['MAYIS_TUTAR']
                       + (float)$row['HAZIRAN_TUTAR']
                       + (float)$row['TEMMUZ_TUTAR']
                       + (float)$row['AGUSTOS_TUTAR']
                       + (float)$row['EYLUL_TUTAR']
                       + (float)$row['EKIM_TUTAR']
                       + (float)$row['KASIM_TUTAR']
                       + (float)$row['ARALIK_TUTAR'];

                   ?>
               <tr>
                   <td><?=  $row['PAZAR']; ?></td>
                   <td><?=  $row['CONTRACT']; ?></td>
                   <td><?=  $row['MUHGRUP']; ?></td>
                   <td><?= $row['MUHACIK']; ?></td>
                   <td class="text-end"><?php $topla =
                           (double)$row['OCAK_TUTAR']
                           +(double)$row['SUBAT_TUTAR']
                           +(double)$row['MART_TUTAR']
                           +(double)$row['NISAN_TUTAR']
                           +(double)$row['MAYIS_TUTAR']
                           +(double)$row['HAZIRAN_TUTAR']
                           +(double)$row['TEMMUZ_TUTAR']
                           +(double)$row['AGUSTOS_TUTAR']
                           +(double)$row['EYLUL_TUTAR']
                           +(double)$row['EKIM_TUTAR']
                           +(double)$row['KASIM_TUTAR']
                           +(double)$row['ARALIK_TUTAR'];
                       echo number_format($topla, 2) ;?></td>
                   <td class="text-end"><?= number_format((double)$row['OCAK_TUTAR'], 2)  ; ?></td>
                   <td class="text-end"><?= number_format((double)$row['SUBAT_TUTAR'], 2)  ; ?></td>
                   <td class="text-end"><?= number_format((double)$row['MART_TUTAR'], 2)  ; ?></td>
                   <td class="text-end"><?= number_format((double)$row['NISAN_TUTAR'], 2)  ; ?></td>
                   <td class="text-end"><?= number_format((double)$row['MAYIS_TUTAR'], 2)  ; ?></td>
                   <td class="text-end"><?= number_format((double)$row['HAZIRAN_TUTAR'], 2)  ; ?></td>
                   <td class="text-end"><?= number_format((double)$row['TEMMUZ_TUTAR'], 2)  ; ?></td>
                   <td class="text-end"><?= number_format((double)$row['AGUSTOS_TUTAR'], 2)  ; ?></td>
                   <td class="text-end"><?= number_format((double)$row['EYLUL_TUTAR'], 2)  ; ?></td>
                   <td class="text-end"><?= number_format((double)$row['EKIM_TUTAR'], 2)  ; ?></td>
                   <td class="text-end"><?= number_format((double)$row['KASIM_TUTAR'], 2)  ; ?></td>
                   <td class="text-end"><?= number_format((double)$row['ARALIK_TUTAR'], 2)  ; ?></td>

               </tr>
               <?php } ?>
               </tbody>
                <tfoot>
                <th class="text-end"></th>
                <th class="text-end"></th>
                <th class="text-end"></th>
                <th class="text-center">Toplam</th>
                <th class="text-end"><?= "€" . number_format($genel_top, 2) ?></th>
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
