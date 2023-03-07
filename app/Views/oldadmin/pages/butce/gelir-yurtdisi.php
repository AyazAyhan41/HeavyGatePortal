<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Yıllık Gelir Bütcesi
<?php $this->endSection() ?>

<?php $this->section('css'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Yurtdışı Gelir Bütçesi</h4>

               <!-- <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Starter</li>
                    </ol>
                </div>-->

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">

        <div class="col-md-12">

            <table class="table table-warning table-striped align-middle table-nowrap ">
                <thead>
                <tr>
                    <th scope="col">PAZAR</th>
                    <th scope="col">SITE</th>
                    <th scope="col">Muhasebe Grubu</th>
                    <th scope="col">AÇIKLAMA</th>
                    <th scope="col">Döviz</th>
                    <th scope="col">Tutar</th>
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


                <?php while($row = oci_fetch_array($veri,OCI_BOTH)){ ?>

                    <tr>
                        <td><?=  $row['PAZAR']; ?></td>
                        <th><?=  $row['CONTRACT']; ?></th>
                        <th><?=  $row['MUHGRUP']; ?></th>
                        <td><?= $row['MUHACIK']; ?></td>
                        <td>€</td>
                        <td> <?php $topla =
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
                            echo $topla;?>
                        </td>
                        <td><?=  (double)$row['OCAK_TUTAR']; ?></td>
                        <td><?=  (double)$row['SUBAT_TUTAR']; ?></td>
                        <td><?=  (double)$row['MART_TUTAR']; ?></td>
                        <td><?=  (double)$row['NISAN_TUTAR']; ?></td>
                        <td><?=  (double)$row['MAYIS_TUTAR']; ?></td>
                        <td><?=  (double)$row['HAZIRAN_TUTAR']; ?></td>
                        <td><?=  (double)$row['TEMMUZ_TUTAR']; ?></td>
                        <td><?=  (double)$row['AGUSTOS_TUTAR']; ?></td>
                        <td><?=  (double)$row['EYLUL_TUTAR']; ?></td>
                        <td><?=  (double)$row['EKIM_TUTAR']; ?></td>
                        <td><?=  (double)$row['KASIM_TUTAR']; ?></td>
                        <td><?=  (double)$row['ARALIK_TUTAR']; ?></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

        </div>


    </div>

</div>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<?= script_tag('public/admin/assets/js/pages/datatables.init-gelir.js') ?>
<?php $this->endSection(); ?>
