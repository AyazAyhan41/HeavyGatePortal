<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
Yeni Grup Ekle
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Yeni Grup Ekle</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active">Yeni Grup Ekle</li>
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
                    <span class="float-end">100%</span>
                    <h6 class="card-title mb-0">Handle to Forcast</h6>
                </div>
                <div class="card-body">
                    <p class="card-text">They all have something to say beyond the words on the page. They can come across as casual or neutral, exotic or graphic. Cosby sweater eu banh mi, qui irure terry richardson ex squid.</p>
                    <div class="text-end">
                        <a href="javascript:void(0);" class="link-dark fw-medium">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>

</div>

<?php $this->endSection(); ?>
