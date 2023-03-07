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

                <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
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
            <div class="card-header">
                <h5 class="mb-0">Grup Listesi</h5>
            </div>



            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th><?= lang('Groups.text.table_slug') ?></th>
                    <th><?= lang('Groups.text.table_group_name') ?></th>
                    <?php if (service('request')->uri->getSegment(5) != 'delete'): ?>
                        <th><?= lang('Groups.text.table_crate_date') ?></th>
                    <?php else: ?>
                        <th><?= lang('Groups.text.table_delete_date') ?></th>
                    <?php endif; ?>
                    <th><?= lang('Groups.text.table_update_date') ?></th>
                    <th class="text-center"><?= lang('Groups.text.group_action') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($groups as $group){ ?>
                    <tr>
                        <td><?= $group->getSlug() ?></td>
                        <td><?= $group->getTitle() ?></a></td>
                        <?php if (service('request')->uri->getSegment(5) != 'delete'): ?>
                            <td><?= $group->getCreatedAt() ?></td>
                        <?php else: ?>
                            <td><?= $group->getDeletedAt() ?></td>
                        <?php endif; ?>
                        <td><?= $group->getUpdatedAt() ?></td>

                        <td class="text-center">
                            <a href="<?= base_url(route_to('admin_group_edit', $group->id)) ?>" class="btn btn-outline-success btn-icon">
                                <i class="ph-note-pencil"></i>
                            </a>
                            <a href="<?= base_url(route_to('admin_group_delete')) ?>" class="btn btn-outline-danger btn-icon">
                                <i class="ph-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- /main charts -->



    </div>
    <!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<?= script_tag('public/admin/assets/js/vendor/tables/datatables/datatables.min.js') ?>
<?= script_tag('public/admin/assets/demo/pages/datatables_basic.js') ?>
<?php $this->endSection(); ?>
