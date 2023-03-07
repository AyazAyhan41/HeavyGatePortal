<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Heavy Gate | <?php $this->renderSection('title'); ?></title>

    <?= link_tag('public/admin/assets/fonts/inter/inter.css') ?>
    <?= link_tag('public/admin/assets/icons/phosphor/styles.min.css') ?>
    <?= link_tag('public/admin/assets/css/ltr/all.min.css') ?>
    <?php $this->renderSection('css'); ?>

    <!-- Core JS files -->
    <?= script_tag('public/admin/assets/demo/demo_configurator.js') ?>
    <?= script_tag('public/admin/assets/js/bootstrap/bootstrap.bundle.min.js') ?>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <?= script_tag('public/admin/assets/js/app.js') ?>
    <?php $this->renderSection('js'); ?>
    <!-- /theme JS files -->

</head>

<body class="bg-dark">

<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Content area -->
            <?php $this->renderSection('content') ?>
            <!-- /content area -->

        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
</html>
