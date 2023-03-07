<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Admin Özet
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<div class="content-inner">

    <!-- Content area -->
    <div class="content d-flex justify-content-center align-items-center">

        <!-- Container -->
        <div class="flex-fill">

            <!-- Error title -->
            <div class="text-center mb-4">
                <img src="<?= base_url('assets/images/error_bg.svg'); ?>" class="img-fluid mb-3" height="230" alt="">
                <h1 class="display-3 fw-semibold lh-1 mb-3"><?= lang('Permissions.text.error_title'); ?></h1>
                <h6 class="w-md-25 mx-md-auto"><?= lang('Permissions.text.error_content'); ?></h6>
            </div>
            <!-- /error title -->


            <!-- Error content -->
            <div class="text-center">
                <a href="<?php echo base_url(route_to('admin_dashboard')); ?>" class="btn btn-primary">
                    <i class="ph-house me-2"></i>
                    <?= lang('Permissions.text.error_button'); ?>
                </a>
            </div>
            <!-- /error wrapper -->

        </div>
        <!-- /container -->

    </div>
    <!-- /content area -->

</div>

<?php $this->endSection(); ?>
