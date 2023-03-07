<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Admin Özet
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Erişim İzni Hatası</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(route_to('admin_dashboard')) ?>">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Erişim İzni Hatası</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">
                <div class="card-body p-4 text-center">
                    <div class="avatar-lg mx-auto mt-2">
                        <div class="avatar-title bg-light text-danger display-3 rounded-circle">
                            <i class="ri-error-warning-line"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-2">
                        <h4><?= lang('Permissions.text.error_title'); ?></h4>
                        <p class="text-muted mx-4"><?= lang('Permissions.text.error_content'); ?></p>
                        <div class="mt-4">
                            <a href="<?php echo base_url(route_to('admin_dashboard')); ?>" class="btn btn-info w-100"><?= lang('Permissions.text.error_button'); ?></a>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

        </div>
    </div>

</div>

<?php $this->endSection(); ?>
