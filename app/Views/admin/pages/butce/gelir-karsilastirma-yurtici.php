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
            <div class="card-header d-flex flex-wrap">
                <h5 class="mb-0">Yurtiçi Gelir Karşılaştırma</h5>
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
               <?php


               while ($row = oci_fetch_array($veri, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) { ?>
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



    </div>
    <!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_extension_colvis.js') ?>
<?= script_tag('public/admin/assets/js/vendor/visualization/echarts/echarts.min.js') ?>

<?php while($row2 = oci_fetch_array($tablo,OCI_BOTH+OCI_RETURN_LOBS+OCI_RETURN_NULLS)) {
/*$datahedef = array((double)$row2['OCAK_HEDEF'],(double)$row2['SUBAT_HEDEF'],(double)$row2['MART_HEDEF'],(double)$row2['NISAN_HEDEF'],(double)$row2['MAYIS_HEDEF'],(double)$row2['HAZIRAN_HEDEF'],(double)$row2['TEMMUZ_HEDEF'],(double)$row2['AGUSTOS_HEDEF'],(double)$row2['EYLUL_HEDEF'],(double)$row2['EKIM_HEDEF'],(double)$row2['KASIM_HEDEF'],(double)$row2['ARALIK_HEDEF']);
$datagecek = array((double)$row2['OCAK_GERCEK'],(double)$row2['SUBAT_GERCEK'],(double)$row2['MART_GERCEK'],(double)$row2['NISAN_GERCEK'],(double)$row2['MAYIS_GERCEK'],(double)$row2['HAZIRAN_GERCEK'],(double)$row2['TEMMUZ_GERCEK'],(double)$row2['AGUSTOS_GERCEK'],(double)$row2['EYLUL_GERCEK'],(double)$row2['EKIM_GERCEK'],(double)$row2['KASIM_GERCEK'],(double)$row2['ARALIK_GERCEK']);*/
    $ocak_fark = (float)$row2['OCAK_HEDEF'] - (float)$row2['OCAK_GERCEK'];
    $subat_fark = (float)$row2['SUBAT_HEDEF']-(float)$row2['SUBAT_GERCEK'];
    $dataRes = json_encode($ocak_fark);
    $labelRes = json_encode($subat_fark);
    echo $dataRes;
}?>





<?php $this->endSection(); ?>
