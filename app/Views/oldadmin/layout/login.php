<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="detached" data-sidebar="light" data-topbar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>Heavy Gate | <?php $this->renderSection('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <?= link_tag('public/admin/assets/images/favicon.ico','shortcut icon') ?>


    <!-- Layout config Js -->
    <?= link_tag('public/admin/assets/js/layout.js') ?>
    <!-- Bootstrap Css -->
    <?= link_tag('public/admin/assets/css/bootstrap.min.css') ?>
    <!-- Icons Css -->
    <?= link_tag('public/admin/assets/css/icons.min.css') ?>

    <!-- App Css-->
    <?= link_tag('public/admin/assets/css/app.min.css') ?>
    <!-- custom Css-->
    <?= link_tag('public/admin/assets/css/custom.min.css') ?>
    <?= csrf_meta() ?>
    <?php $this->renderSection('css'); ?>

</head>

<body>

<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <?php $this->renderSection('content') ?>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>document.write(new Date().getFullYear())</script> Agir Haddecilik Yazılım Geliştirme <i class="mdi mdi-heart text-danger"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<?= script_tag('public/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>
<?= script_tag('public/admin/assets/libs/simplebar/simplebar.min.js') ?>
<?= script_tag('public/admin/assets/libs/node-waves/waves.min.js') ?>
<?= script_tag('public/admin/assets/libs/feather-icons/feather.min.js') ?>
<?= script_tag('public/admin/assets/js/pages/plugins/lord-icon-2.1.0.js') ?>
<?= script_tag('https://cdn.jsdelivr.net/npm/toastify-js') ?>
<?= script_tag('public/admin/assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>
<?= script_tag('public/admin/assets/libs/flatpickr/flatpickr.min.js') ?>


<!-- particles js -->
<?= script_tag('public/admin/assets/libs/particles.js/particles.js') ?>
<!-- particles app js -->
<?= script_tag('public/admin/assets/js/pages/particles.app.js') ?>
<!-- password-addon init -->
<?= script_tag('public/admin/assets/js/pages/password-addon.init.js') ?>

<?php $this->renderSection('js'); ?>

</body>

</html>