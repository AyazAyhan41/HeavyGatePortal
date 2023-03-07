<?php $this->extend('admin/layout/main'); ?>
<script>

</script>

<?php $this->section('title'); ?>
<?= lang('Groups.text.group_list_title') ?>
<?php $this->endSection() ?>

<?php $this->section('css') ?>
<?= link_tag('public/admin/assets/libs/sweetalert2/sweetalert2.min.css') ?>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Grup Listesi</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(route_to('admin_dashboard')) ?>">Ana
                                Sayfa</a></li>
                        <li class="breadcrumb-item active"><?= lang('Groups.text.group_list_title') ?></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="orderList">
                <div class="card-header  border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1"><?= lang('Groups.text.group_list_title') ?></h5>
                        <div class="flex-shrink-0">
                            <a href="<?php echo base_url(route_to('admin_group_create')) ?>"
                               class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>
                                <?= lang('Groups.text.new_group_button') ?></a>
                            <?php if (service('request')->uri->getSegment(5) == 'delete'): ?>
                                <a href="<?php echo base_url(route_to('admin_group_listing', null)) ?>"
                                   class="btn btn-primary add-btn"> <?= lang('Groups.text.active_group_title') ?></a>

                            <?php else: ?>
                                <a href="<?php echo base_url(route_to('admin_group_listing', '/delete')) ?>"
                                   class="btn btn-danger add-btn"> <?= lang('Groups.text.delete_group_title') ?></a>


                            <?php endif; ?>
                            <!--   <button type="button" class="btn btn-info"><i class="ri-file-download-line align-bottom me-1"></i> Import</button>-->
                            <!--<button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>-->
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <form>
                        <div class="row g-3">
                            <div class="col-xxl-1 col-sm-1">
                                <div class="dropdown">
                                    <button class="btn btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        <?= lang('Groups.text.group_action') ?>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">

                                        <?php if (service('request')->uri->getSegment(5) != 'delete'): ?>
                                            <li><a class="dropdown-item all-delete" href="javascript:void(0)" data-url="<?= base_url(route_to('admin_group_delete')) ?>"><?= lang('Groups.text.all_delete') ?></a></li>
                                        <?php else: ?>
                                            <li><a class="dropdown-item all-undo-delete" href="javascript:void(0)" data-url="<?= base_url(route_to('admin_group_undo_delete')) ?>"><?= lang('Groups.text.undo_delete') ?></a></li>
                                            <li><a class="dropdown-item all-purge-delete" href="javascript:void(0)" data-url="<?= base_url(route_to('admin_group_purge_delete')) ?>"><?= lang('Groups.text.purge_delete') ?></a></li>
                                        <?php endif; ?>

                                    </ul>
                                </div>


                            </div>

                            <form action="<?php echo current_url() ?>" method="get">
                                <div class="col-xxl-5 col-sm-5">
                                    <div class="search-box">
                                        <input type="text" class="form-control search" name="search"
                                               placeholder="<?= lang('Groups.text.group_search_title') ?>">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-1 col-sm-1">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-100" onclick="SearchData();"><i
                                                    class="ri-equalizer-fill me-1 align-bottom"></i>
                                            <?= lang('Groups.text.group_search_button') ?>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!--end col-->

                            <!--end col-->
                            <div class="col-xxl-2 col-sm-4">
                                <div>

                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-1 col-sm-4">
                                <div>

                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <div class="card-body pt-0">
                    <div>
                        <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">

                        </ul>

                        <div class="table-responsive table-card mb-1">
                            <table class="table table-nowrap align-middle custom-table" id="groupTable">
                                <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    <th scope="col" style="width: 25px;">

                                    </th>
                                    <th class="sort" data-sort="slug"><?= lang('Groups.text.table_slug') ?></th>
                                    <th class="sort" data-sort="grup_adi"><?= lang('Groups.text.table_group_name') ?></th>
                                    <?php if (service('request')->uri->getSegment(5) != 'delete'): ?>
                                        <th class="sort" data-sort="olusturma_tarihi"><?= lang('Groups.text.table_crate_date') ?></th>
                                    <?php else: ?>
                                        <th class="sort" data-sort="olusturma_tarihi"><?= lang('Groups.text.table_delete_date') ?></th>
                                    <?php endif; ?>

                                    <th class="sort" data-sort="guncelleme_tarihi"><?= lang('Groups.text.table_update_date') ?></th>
                                    <th><?= lang('Groups.text.group_action') ?></th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                <?php foreach ($groups as $group): ?>
                                    <tr data-id="<?= $group->id ?>">
                                        <th scope="row">
                                            <div class="form-check">
                                                <input data-id="<?= $group->id ?>" class="form-check-input" type="checkbox" id="checkbox-<?= $group->id ?>">
                                            </div>
                                        </th>
                                        <td class="slug"><?= $group->getSlug() ?></td>
                                        <td class="grup_adi"><?= $group->getTitle() ?></td>
                                          <?php if (service('request')->uri->getSegment(5) != 'delete'): ?>
                                        <td class="olusturma_tarihi"><?= $group->getCreatedAt() ?></td>
                                        <?php else: ?>
                                        <td class="olusturma_tarihi"><?= $group->getDeletedAt() ?></td>
                                        <?php endif; ?>
                                        <td class="guncelleme_tarihi"><?= $group->getUpdatedAt() ?></td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">


                                                <?php if ($group->getDeletedAt()): ?>
                                                    <li class="list-inline-item" data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover" data-bs-placement="top"
                                                        title="<?= lang('Groups.text.undo_delete') ?>">
                                                        <button class="btn btn-success remove-item-btn undo-delete"
                                                                data-url="<?= base_url(route_to('admin_group_undo_delete')) ?>">
                                                            <i class="ri-arrow-go-back-fill fs-16"></i>
                                                        </button>
                                                    </li>
                                                <?php else: ?>
                                                    <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover" data-bs-placement="top" title="<?= lang('Groups.text.group_edit') ?>">
                                                        <a href="<?= base_url(route_to('admin_group_edit', $group->id)) ?>"
                                                           class="btn btn-primary d-inline-block edit-item-btn">
                                                            <i class="ri-pencil-fill fs-16"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item" data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover" data-bs-placement="top" title="<?= lang('Groups.text.group_delete') ?>">
                                                        <button data-url="<?= base_url(route_to('admin_group_delete')) ?>"
                                                                class="btn btn-danger delete">
                                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                                        </button>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                               colors="primary:#405189,secondary:#0ab39c"
                                               style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2"><?= lang('Groups.text.group_no_search_title') ?></h5>
                                    <p class="text-muted"><?= lang('Groups.text.group_search_content') ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <?= $pager->links('default', 'devxcms_pager'); ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!--end col-->
    </div>

</div>

<?php $this->endSection(); ?>

<?php $this->section('js') ?>

<?= script_tag('public/admin/assets/js/listing.js') ?>
<?= script_tag('public/admin/assets/js/pages/grouplist.init.js') ?>
<?php $this->endSection() ?>
