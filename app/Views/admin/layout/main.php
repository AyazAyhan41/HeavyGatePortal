<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php $this->renderSection('title') ?> | Heavy Gate Portal</title>

    <?= link_tag('public/admin/assets/fonts/inter/inter.css') ?>
    <?= link_tag('public/admin/assets/icons/phosphor/styles.min.css') ?>
    <?= link_tag('public/admin/assets/css/ltr/all.min.css') ?>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <?= csrf_meta() ?>
    <?= link_tag('public/admin/assets/css/iziToast.css') ?>
    <?php $this->renderSection('css') ?>


    <!-- Core JS files -->
    <?= script_tag('public/admin/assets/demo/demo_configurator.js') ?>
    <?= script_tag('public/admin/assets/js/bootstrap/bootstrap.bundle.min.js') ?>


    <!-- /core JS files -->

    <!-- Theme JS files -->
    <?= script_tag('public/admin/assets/js/jquery/jquery.min.js') ?>
    <?= script_tag('public/admin/assets/js/vendor/visualization/d3/d3.min.js') ?>
    <?= script_tag('public/admin/assets/js/vendor/visualization/d3/d3_tooltip.js') ?>
    <?= script_tag('public/admin/assets/js/vendor/tables/datatables/datatables.min.js') ?>
    <?= script_tag('public/admin/assets/js/vendor/tables/datatables/extensions/buttons.min.js') ?>
    <?= script_tag('public/admin/assets/js/vendor/ui/moment/moment.min.js') ?>
    <?= script_tag('public/admin/assets/js/vendor/pickers/daterangepicker.js') ?>
    <?= script_tag('public/admin/assets/js/vendor/pickers/datepicker.min.js') ?>

    <?= script_tag('public/admin/assets/js/app.js') ?>
    <?= script_tag('public/admin/assets/demo/pages/dashboard.js') ?>
    <?= script_tag('public/admin/assets/demo/charts/pages/dashboard/streamgraph.js') ?>
    <?= script_tag('public/admin/assets/demo/charts/pages/dashboard/sparklines.js') ?>
    <?= script_tag('public/admin/assets/demo/charts/pages/dashboard/lines.js') ?>
    <?= script_tag('public/admin/assets/demo/charts/pages/dashboard/areas.js') ?>
    <?= script_tag('public/admin/assets/demo/charts/pages/dashboard/donuts.js') ?>
    <?= script_tag('public/admin/assets/demo/charts/pages/dashboard/bars.js') ?>
    <?= script_tag('public/admin/assets/demo/charts/pages/dashboard/progress.js') ?>
    <?= script_tag('public/admin/assets/demo/charts/pages/dashboard/heatmaps.js') ?>
    <?= script_tag('public/admin/assets/demo/charts/pages/dashboard/pies.js') ?>
    <?= script_tag('public/admin/assets/demo/charts/pages/dashboard/bullets.js') ?>
    <?= script_tag('public/admin/assets/js/vendor/notifications/bootbox.min.js') ?>
    <?= script_tag('public/admin/assets/demo/pages/components_modals.js') ?>


    <?php $this->renderSection('js') ?>

    <!-- /theme JS files -->

</head>

<body>


<!-- Main navbar -->
<?= $this->include('admin/layout/partials/navbar'); ?>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <?= $this->include('admin/layout/partials/sidebar'); ?>
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">


            <?= $this->renderSection('content') ?>


            <!-- Footer -->
            <?= $this->include('admin/layout/partials/footer'); ?>
            <!-- /footer -->

        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->


<!-- Notifications -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
    <div class="offcanvas-header py-0">
        <h5 class="offcanvas-title py-3">Activity</h5>
        <button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill"
                data-bs-dismiss="offcanvas">
            <i class="ph-x"></i>
        </button>
    </div>

    <div class="offcanvas-body p-0">
        <div class="bg-light fw-medium py-2 px-3">New notifications</div>
        <div class="p-3">
            <div class="d-flex align-items-start mb-3">
                <a href="#" class="status-indicator-container me-3">
                    <img src="../../../assets/images/demo/users/face1.jpg" class="w-40px h-40px rounded-pill" alt="">
                    <span class="status-indicator bg-success"></span>
                </a>
                <div class="flex-fill">
                    <a href="#" class="fw-semibold">James</a> has completed the task <a href="#">Submit documents</a>
                    from <a href="#">Onboarding</a> list

                    <div class="bg-light rounded p-2 my-2">
                        <label class="form-check ms-1">
                            <input type="checkbox" class="form-check-input" checked disabled>
                            <del class="form-check-label">Submit personal documents</del>
                        </label>
                    </div>

                    <div class="fs-sm text-muted mt-1">2 hours ago</div>
                </div>
            </div>

            <div class="d-flex align-items-start mb-3">
                <a href="#" class="status-indicator-container me-3">
                    <img src="../../../assets/images/demo/users/face3.jpg" class="w-40px h-40px rounded-pill" alt="">
                    <span class="status-indicator bg-warning"></span>
                </a>
                <div class="flex-fill">
                    <a href="#" class="fw-semibold">Margo</a> has added 4 users to <span class="fw-semibold">Customer enablement</span>
                    channel

                    <div class="d-flex my-2">
                        <a href="#" class="status-indicator-container me-1">
                            <img src="../../../assets/images/demo/users/face10.jpg" class="w-32px h-32px rounded-pill"
                                 alt="">
                            <span class="status-indicator bg-danger"></span>
                        </a>
                        <a href="#" class="status-indicator-container me-1">
                            <img src="../../../assets/images/demo/users/face11.jpg" class="w-32px h-32px rounded-pill"
                                 alt="">
                            <span class="status-indicator bg-success"></span>
                        </a>
                        <a href="#" class="status-indicator-container me-1">
                            <img src="../../../assets/images/demo/users/face12.jpg" class="w-32px h-32px rounded-pill"
                                 alt="">
                            <span class="status-indicator bg-success"></span>
                        </a>
                        <a href="#" class="status-indicator-container me-1">
                            <img src="../../../assets/images/demo/users/face13.jpg" class="w-32px h-32px rounded-pill"
                                 alt="">
                            <span class="status-indicator bg-success"></span>
                        </a>
                        <button type="button"
                                class="btn btn-light btn-icon d-inline-flex align-items-center justify-content-center w-32px h-32px rounded-pill p-0">
                            <i class="ph-plus ph-sm"></i>
                        </button>
                    </div>

                    <div class="fs-sm text-muted mt-1">3 hours ago</div>
                </div>
            </div>

            <div class="d-flex align-items-start">
                <div class="me-3">
                    <div class="bg-warning bg-opacity-10 text-warning rounded-pill">
                        <i class="ph-warning p-2"></i>
                    </div>
                </div>
                <div class="flex-1">
                    Subscription <a href="#">#466573</a> from 10.12.2021 has been cancelled. Refund case <a href="#">#4492</a>
                    created
                    <div class="fs-sm text-muted mt-1">4 hours ago</div>
                </div>
            </div>
        </div>

        <div class="bg-light fw-medium py-2 px-3">Older notifications</div>
        <div class="p-3">
            <div class="d-flex align-items-start mb-3">
                <a href="#" class="status-indicator-container me-3">
                    <img src="../../../assets/images/demo/users/face25.jpg" class="w-40px h-40px rounded-pill" alt="">
                    <span class="status-indicator bg-success"></span>
                </a>
                <div class="flex-fill">
                    <a href="#" class="fw-semibold">Nick</a> requested your feedback and approval in support request <a
                            href="#">#458</a>

                    <div class="my-2">
                        <a href="#" class="btn btn-success btn-sm me-1">
                            <i class="ph-checks ph-sm me-1"></i>
                            Approve
                        </a>
                        <a href="#" class="btn btn-light btn-sm">
                            Review
                        </a>
                    </div>

                    <div class="fs-sm text-muted mt-1">3 days ago</div>
                </div>
            </div>

            <div class="d-flex align-items-start mb-3">
                <a href="#" class="status-indicator-container me-3">
                    <img src="../../../assets/images/demo/users/face24.jpg" class="w-40px h-40px rounded-pill" alt="">
                    <span class="status-indicator bg-grey"></span>
                </a>
                <div class="flex-fill">
                    <a href="#" class="fw-semibold">Mike</a> added 1 new file(s) to <a href="#">Product management</a>
                    project

                    <div class="bg-light rounded p-2 my-2">
                        <div class="d-flex align-items-center">
                            <div class="me-2">
                                <img src="../../../assets/images/icons/pdf.svg" width="34" height="34" alt="">
                            </div>
                            <div class="flex-fill">
                                new_contract.pdf
                                <div class="fs-sm text-muted">112KB</div>
                            </div>
                            <div class="ms-2">
                                <button type="button"
                                        class="btn btn-flat-dark text-body btn-icon btn-sm border-transparent rounded-pill">
                                    <i class="ph-arrow-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="fs-sm text-muted mt-1">1 day ago</div>
                </div>
            </div>

            <div class="d-flex align-items-start mb-3">
                <div class="me-3">
                    <div class="bg-success bg-opacity-10 text-success rounded-pill">
                        <i class="ph-calendar-plus p-2"></i>
                    </div>
                </div>
                <div class="flex-fill">
                    All hands meeting will take place coming Thursday at 13:45.

                    <div class="my-2">
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="ph-calendar-plus ph-sm me-1"></i>
                            Add to calendar
                        </a>
                    </div>

                    <div class="fs-sm text-muted mt-1">2 days ago</div>
                </div>
            </div>

            <div class="d-flex align-items-start mb-3">
                <a href="#" class="status-indicator-container me-3">
                    <img src="../../../assets/images/demo/users/face4.jpg" class="w-40px h-40px rounded-pill" alt="">
                    <span class="status-indicator bg-danger"></span>
                </a>
                <div class="flex-fill">
                    <a href="#" class="fw-semibold">Christine</a> commented on your community <a href="#">post</a> from
                    10.12.2021

                    <div class="fs-sm text-muted mt-1">2 days ago</div>
                </div>
            </div>

            <div class="d-flex align-items-start mb-3">
                <div class="me-3">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-pill">
                        <i class="ph-users-four p-2"></i>
                    </div>
                </div>
                <div class="flex-fill">
                    <span class="fw-semibold">HR department</span> requested you to complete internal survey by Friday

                    <div class="fs-sm text-muted mt-1">3 days ago</div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /notifications -->
<script>
    function showLoader() {
        var loader = document.getElementById("load");
        //console.log("clicked");
        loader.style.display = 'block';

    }

    function hideLoader() {

        var loader = document.getElementById("myname");
        console.log("clicked");
        loader.style.display = 'none';
    }
</script>
<?= script_tag('public/admin/assets/js/devx.js') ?>
<?= script_tag('public/admin/assets/js/custom.js') ?>
<?= script_tag('public/admin/assets/js/iziToast.js') ?>
</body>
</html>