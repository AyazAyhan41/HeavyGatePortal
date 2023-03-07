<!doctype html>
<html lang="tr" data-layout="vertical" data-layout-style="detached" data-sidebar="light" data-topbar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=windows-1254" />
    <title><?php $this->renderSection('title') ?> | Heavy Gate Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->

    <?= link_tag('public/admin/assets/images/favicon.ico','shortcut icon','text/css') ?>

    <!-- Layout config Js -->
    <?= link_tag('public/admin/assets/js/layout.js','application/javascript','text/css') ?>
    <!-- Bootstrap Css -->
    <?= link_tag('public/admin/assets/css/bootstrap.min.css') ?>
    <!-- Icons Css -->
    <?= link_tag('public/admin/assets/css/icons.min.css') ?>
    <!-- App Css-->
    <?= link_tag('public/admin/assets/css/app.min.css') ?>
    <!-- custom Css-->
    <?= link_tag('public/admin/assets/css/custom.min.css') ?>
    <?= link_tag('public/admin/assets/css/iziToast.css') ?>
    <?= csrf_meta() ?>
    <?php $this->renderSection('css') ?>


</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="layout-width">
            <?= $this->include('admin/layout/partials/navbar'); ?>
        </div>
    </header>
    <!-- ========== App Menu ========== -->
    <?= $this->include('admin/layout/partials/menu'); ?>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <?= $this->renderSection('content') ?>
        </div>
        <!-- End Page-content -->

        <?=  $this->include('admin/layout/partials/footer'); ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->



<!-- Theme Settings -->



<!-- JAVASCRIPT -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    let purgeDelete = {
        title : '<?= lang('General.text.purge_delete_title') ?>',
        footer : '<p class="fs-14 text-muted mb-0"><?= lang('General.text.purge_delete_footer') ?></p>',
        confirmButtonText : '<?= lang('General.text.purge_delete_confirm') ?>',
        cancelButtonText : '<?= lang('General.text.purge_delete_cancel') ?>',
    }
 </script>
<?= script_tag('public/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>
<?= script_tag('public/admin/assets/libs/simplebar/simplebar.min.js') ?>
<?= script_tag('public/admin/assets/libs/node-waves/waves.min.js') ?>
<?= script_tag('public/admin/assets/libs/feather-icons/feather.min.js') ?>
<?= script_tag('public/admin/assets/js/pages/plugins/lord-icon-2.1.0.js') ?>
<?= script_tag('https://cdn.jsdelivr.net/npm/toastify-js') ?>
<?= script_tag('public/admin/assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>
<?= script_tag('public/admin/assets/libs/flatpickr/flatpickr.min.js') ?>
<?= script_tag('public/admin/assets/js/devx.js') ?>
<?= script_tag('public/admin/assets/js/iziToast.js') ?>
<?= script_tag('public/admin/assets/libs/list.js/list.min.js') ?>
<?= script_tag('public/admin/assets/libs/list.pagination.js/list.pagination.min.js') ?>
<?= script_tag('public/admin/assets/libs/sweetalert2/sweetalert2.min.js') ?>



<!-- apexcharts -->
<?= script_tag('public/admin/assets/libs/apexcharts/apexcharts.min.js') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/dayjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/plugin/quarterOfYear.min.js"></script>
<?php /*= script_tag('public/admin/assets/js/pages/apexcharts-column.init.js') */?>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?= script_tag('public/admin/assets/js/pages/select2.init.js') ?>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<?php $this->renderSection('js') ?>


<?= script_tag('public/admin/assets/libs/apexcharts/apexcharts.min.js') ?>
<?= script_tag('public/admin/assets/libs/jsvectormap/js/jsvectormap.min.js') ?>
<?= script_tag('public/admin/assets/libs/jsvectormap/maps/world-merc.js') ?>
<?= script_tag('public/admin/assets/libs/swiper/swiper-bundle.min.js') ?>
<?= script_tag('public/admin/assets/js/pages/dashboard-ecommerce.init.js') ?>

<!-- App js -->
<?= script_tag('public/admin/assets/js/app.js') ?>



</body>

</html>