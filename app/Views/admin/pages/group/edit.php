<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Admin Özet
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Grup Listesi - <span class="fw-normal">Grup Yönetimi</span>
            </h4>

            <a href="#page_header"
               class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
               data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>


    </div>

    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                <a href="#" class="breadcrumb-item">Grup Yönetimi</a>
                <span class="breadcrumb-item active">Grup Listesi</span>
            </div>
        </div>


    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <!-- Main charts -->
    <div class="card">
        <span class="float-end"><?= $this->include('admin/layout/partials/errors'); ?></span>
        <div class="card-header">

            <h5 class="mb-0">Grup Listesi</h5>
        </div>

        <div class="card-body">
            <form action="<?= current_url() ?>" method="post">
                <?= csrf_field() ?>

                <div class="col-xxl-12">
                    <ul class="nav nav-tabs mb-3">
                        <?php foreach (devx_language() as $key => $lang): ?>
                            <li class="nav-item">
                                <a href="#<?= $lang->getCode() ?>" class="nav-link <?= $key == 0 ? 'active' : ''; ?>"
                                   data-bs-toggle="tab">
                                    <img style="margin-right: 10px;" width="20px"
                                         src="<?= $lang->getFlag() ?>"><?= $lang->getTitle() ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="tab-content">
                        <?php foreach (devx_language() as $key => $lang): ?>
                            <div class="tab-pane fade show <?= $key == 0 ? 'active' : '' ?>"
                                 id="<?= $lang->getCode() ?>">
                                <label class="form-label"><?= lang('Groups.text.new_group_title') ?>
                                    [<?= $lang->getTitle() ?>]</label>
                                <input value="<?= $group->getTitle($lang->getCode()); ?>"
                                       type="text"
                                       name="title[<?= $lang->getCode() ?>]"
                                       class="form-control"
                                    <?= $group->getSlug() == DEFAULT_ADMIN_GROUP ? 'disabled' : '' ?>
                                       required
                                >
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="col-xxl-12 mt-3">
                        <?php foreach (config('settings')->permissions as $pkey => $pvalue): ?>
                            <div class="list-group">
                                <div class="list-group-item d-flex">
                                    <?= lang($pvalue) ?>
                                    <span class="badge text-success ms-auto">

                                   <div class="form-check form-switch mb-2">
													<input type="checkbox" class="form-check-input" id="sc_ls_c"
                                                           name="permission[<?= $pkey ?>]" <?= $group->permitControl($pkey) ? 'checked' : '' ?> id="permit-<?= $pkey ?>" <?= $group->getSlug() == DEFAULT_ADMIN_GROUP ? 'disabled' : '' ?>>
													<label class="form-check-label" for="permit-<?= $pkey ?>"></label>
                                   </div>

                               </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary btn-labeled btn-labeled-start">
                                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                                            <i class="ph-check-square-offset"></i>
                                        </span>
                        <?= lang('Groups.text.group_update_button') ?>
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- /main charts -->


</div>
<!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/js/vendor/tables/datatables/datatables.min.js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_basic.js') ?>
<?php $this->endSection(); ?>
