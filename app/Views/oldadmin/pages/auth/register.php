<?php $this->extend('admin/layout/login'); ?>

<?php $this->section('title'); ?>
Kayıt Ol
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<div class="auth-page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mt-sm-5 mb-4 text-white-50">
                    <div>
                        <a href="index.html" class="d-inline-block auth-logo">
                            <img src="assets/images/logo-light.png" alt="" height="20">
                        </a>
                    </div>
                    <p class="mt-3 fs-15 fw-medium">DevxCMS Yönetilebilir Kurusaml Yazılım</p>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-4">

                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary">Yeni Kullanıcı Kayıt</h5>
                            <p class="text-muted">ücretsiz Kayıt olabilirsiniz.</p>
                        </div>
                        <div class="p-2 mt-4">
                            <form class="needs-validation" method="post" action="<?= base_url(route_to('admin_register')); ?>">
                                <?= csrf_field() ?>

                                <div class="mb-3">
                                    <label for="first_name" class="form-label"><?= lang('Input.text.first_name'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?= lang('Input.text.first_name'); ?>" required autofocus>
                                </div>

                                <div class="mb-3">
                                    <label for="sur_name" class="form-label"><?= lang('Input.text.last_name'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="sur_name" name="sur_name" placeholder="<?= lang('Input.text.last_name'); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label"><?= lang('Input.text.email'); ?> <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="<?= lang('Input.text.email'); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password-input"><?= lang('Input.text.password'); ?></label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" class="form-control pe-5 password-input" onpaste="return false" name="password" placeholder="<?= lang('Input.text.password'); ?>" id="password-input" required>
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password-input2"><?= lang('Input.text.password2'); ?></label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" class="form-control pe-5 password-input" onpaste="return false" name="password2" placeholder="<?= lang('Input.text.password2'); ?>" id="password-input2" required>
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="agree" id="formCheck1">
                                        <label class="form-check-label" for="formCheck1">
                                            <?= lang('Register.text.contract'); ?>
                                        </label>
                                    </div>

                                </div>


                                <div class="mt-4">
                                    <button class="btn btn-info w-100" type="submit"> <?= lang('Register.text.button'); ?></button>
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
