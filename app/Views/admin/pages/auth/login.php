<?php $this->extend('admin/layout/login'); ?>

<?php $this->section('title'); ?>
<?= lang('Login.text.title') ?>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<div class="content d-flex justify-content-center align-items-center">

    <!-- Login card -->
    <form class="login-form" action="<?php echo base_url(route_to('admin_login')) ?>" method="post">
        <?= csrf_field() ?>
        <div class="card mb-0">

            <div class="card-body">
                <?= $this->include('admin/layout/partials/errors'); ?>
                <div class="text-center mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                        <img src="<?php echo base_url('public/oldadmin/assets/images/agir-logo.png') ?>" class="h-48px" alt="">
                    </div>
                    <h5 class="mb-0"><?= lang('Login.text.welcome') ?></h5>
                    <span class="d-block text-muted"><?= lang('Login.text.content') ?></span>
                </div>

                <div class="mb-3">
                    <label class="form-label"><?= lang('Input.text.email') ?></label>
                    <div class="form-control-feedback form-control-feedback-start">
                        <input type="text" class="form-control" name="email" placeholder="<?= lang('Input.text.email') ?>">
                        <div class="form-control-feedback-icon">
                            <i class="ph-user-circle text-muted"></i>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label"><?= lang('Input.text.password') ?></label>
                    <div class="form-control-feedback form-control-feedback-start">
                        <input type="password" class="form-control" name="password" placeholder="•••••••••••">
                        <div class="form-control-feedback-icon">
                            <i class="ph-lock text-muted"></i>
                        </div>
                    </div>
                </div>

                <!--<div class="d-flex align-items-center mb-3">
                    <label class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" checked>
                        <span class="form-check-label">Remember</span>
                    </label>

                    <a href="login_password_recover.html" class="ms-auto">Forgot password?</a>
                </div>-->

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100"><?= lang('Login.text.login_button') ?></button>
                </div>

                <span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
            </div>
        </div>
    </form>
    <!-- /login card -->

</div>
<?php $this->endSection(); ?>