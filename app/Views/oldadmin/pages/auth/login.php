<?php $this->extend('admin/layout/login'); ?>

<?php $this->section('title'); ?>
<?= lang('Login.text.title') ?>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<div class="auth-page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mt-sm-5 mb-4 text-white-50">
                    <div>
                        <a href="index.html" class="d-inline-block auth-logo">
                            <img src="<?php echo base_url('public/admin/assets/images/agir-logo.png') ?>" alt="" height="100">
                        </a>
                    </div>
                    <p class="mt-3 fs-15 fw-medium">Agir Haddecilik Heavy Gate Portal</p>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-4">
                    <?= $this->include('admin/layout/partials/errors'); ?>
                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary"><?= lang('Login.text.welcome') ?></h5>
                            <p class="text-muted"><?= lang('Login.text.content') ?></p>
                        </div>
                        <div class="p-2 mt-4">
                            <form action="<?php echo base_url(route_to('admin_login')) ?>" method="post">
                                <?= csrf_field() ?>

                                <div class="mb-3">
                                    <label for="username" class="form-label"><?= lang('Input.text.email') ?></label>
                                    <input type="text" class="form-control" id="username" name="email" placeholder="<?= lang('Input.text.email') ?>">
                                </div>

                                <div class="mb-3">
                                    <div class="float-end">
                                        <a href="<?php echo base_url(route_to('admin_forgot_password')) ?>" class="text-muted"><?= lang('ForgotPassword.text.title') ?></a>
                                    </div>
                                    <label class="form-label" for="password-input"><?= lang('Input.text.password') ?></label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5" placeholder="<?= lang('Input.text.password') ?>" name="password" id="password-input">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                </div>


                                <div class="mt-4">
                                    <button class="btn btn-info w-100" type="submit"><?= lang('Login.text.login_button') ?></button>
                                </div>


                            </form>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

<?php $this->endSection(); ?>


