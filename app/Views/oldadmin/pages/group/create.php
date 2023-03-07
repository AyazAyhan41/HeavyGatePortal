<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
<?= lang('Groups.text.new_group_button') ?>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><?= lang('Groups.text.new_group_button') ?></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Ana Sayfa</a>
                        </li>
                        <li class="breadcrumb-item active"><?= lang('Groups.text.new_group_button') ?></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xxl-12">
            <div class="card border card-border-dark">
                <div class="card-header">
                    <span class="float-end"><?= $this->include('admin/layout/partials/errors'); ?></span>
                    <h6 class="card-title mb-0">Yeni Grup Ekle</h6>
                </div>
                <form action="<?= current_url() ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="card-body">


                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <?php foreach (devx_language() as $key => $lang): ?>
                                <li class="nav-item <?= $key == 0 ? 'active' : ''; ?>">
                                    <a class="nav-link" data-bs-toggle="tab" href="#<?= $lang->getCode() ?>" role="tab"
                                       aria-selected="false">
                                        <img style="margin-right: 10px;" width="20px"
                                             src="<?= $lang->getFlag() ?>"><?= $lang->getTitle() ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content  text-muted">
                            <?php foreach (devx_language() as $key => $lang): ?>
                                <div class="tab-pane <?= $key == 0 ? 'active' : '' ?>" id="<?= $lang->getCode() ?>"
                                     role="tabpanel">
                                    <div class="live-preview">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="grupAdi<?= $lang->getCode() ?>" class="form-label"><?= lang('Groups.text.new_group_title') ?>
                                                        [<?= $lang->getTitle() ?>]</label>
                                                    <input type="text" name="title[<?= $lang->getCode() ?>]"
                                                           class="form-control" placeholder=""
                                                           id="grupAdi<?= $lang->getCode() ?>" required>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="card-title mb-2 flex-grow-1"><?= lang('Groups.text.group_permissions') ?></h4>
                                    <?php foreach (config('settings')->permissions as $pkey => $pvalue): ?>
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?= lang($pvalue) ?>
                                                <span>
                                                        <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                            <input type="checkbox" class="form-check-input"
                                                                   name="permission[<?= $pkey ?>]" id="permit-<?= $pkey ?>">
                                                            <label class="form-check-label"
                                                                   for="permit-<?= $pkey ?>"></label>
                                                        </div>
                                                    </span>
                                            </li>
                                        </ul>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-end">
                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light"><i class="ri-save-line label-icon align-middle fs-16 me-2"></i> <?= lang('Groups.text.group_save_button') ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- end col -->
    </div>

</div>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<?= script_tag('public/admin/assets/libs/prismjs/prism.js') ?>
<?php $this->endSection(); ?>
