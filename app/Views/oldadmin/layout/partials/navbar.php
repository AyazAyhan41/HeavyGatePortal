<div class="navbar-header">
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box horizontal-logo">
            <a href="<?php echo base_url(route_to('admin_dashboard')) ?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo base_url('public/admin/assets/images/agir-logo.png') ?>" alt="" height="70">
                        </span>
                <span class="logo-lg">
                            <img src="<?php echo base_url('public/admin/assets/images/agir-logo.png') ?>" alt="" height="70">
                        </span>
            </a>

            <a href="<?php echo base_url(route_to('admin_dashboard')) ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo base_url('public/admin/assets/images/agir-logo.png') ?>" alt="" height="70">
                        </span>
                <span class="logo-lg">
                            <img src="<?php echo base_url('public/admin/assets/images/agir-logo.png') ?>" alt="" height="70">
                        </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
        </button>

        <!-- App Search-->
        <form class="app-search d-none d-md-block">
            <div class="position-relative">
            </div>

        </form>
    </div>

    <div class="d-flex align-items-center">

        <div class="dropdown d-md-none topbar-head-dropdown header-item">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-search fs-22"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                <form class="p-3">
                    <div class="form-group m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="dropdown ms-1 topbar-head-dropdown header-item">
           <!-- <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img id="header-lang-img" src="<?php /*echo base_url('public/admin/assets/images/flags/us.svg') */?>" alt="Header Language" height="20" class="rounded">
            </button>-->
            <div class="dropdown-menu dropdown-menu-end">

                <!-- item-->
               <!-- <a href="javascript:void(0);" class="dropdown-item notify-item language py-2" data-lang="en" title="English">
                    <img src="<?php /*echo base_url('public/admin/assets/images/flags/us.svg') */?>" alt="user-image" class="me-2 rounded" height="18">
                    <span class="align-middle">English</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp" title="Spanish">
                    <img src="<?php /*echo base_url('public/admin/assets/images/flags/spain.svg') */?>" alt="user-image" class="me-2 rounded" height="18">
                    <span class="align-middle">Española</span>
                </a>-->
            </div>
        </div>

        <div class="dropdown topbar-head-dropdown ms-1 header-item">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class='bx bx-category-alt fs-22'></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-0 fw-semibold fs-15"> Web Apps </h6>
                        </div>
                        <div class="col-auto">
                            <a href="#!" class="btn btn-sm btn-soft-info"> View All Apps
                                <i class="ri-arrow-right-s-line align-middle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="p-2">
                    <div class="row g-0">
                        <div class="col">
                            <a class="dropdown-icon-item" href="#!">
                                <img src="<?php echo base_url('public/admin/assets/images/brands/github.png') ?>" alt="Github">
                                <span>GitHub</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#!">
                                <img src="<?php echo base_url('public/admin/assets/images/brands/bitbucket.png') ?>" alt="bitbucket">
                                <span>Bitbucket</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#!">
                                <img src="<?php echo base_url('public/admin/assets/images/brands/dribbble.png') ?>" alt="dribbble">
                                <span>Dribbble</span>
                            </a>
                        </div>
                    </div>

                    <div class="row g-0">
                        <div class="col">
                            <a class="dropdown-icon-item" href="#!">
                                <img src="<?php echo base_url('public/admin/assets/images/brands/dropbox.png') ?>" alt="dropbox">
                                <span>Dropbox</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#!">
                                <img src="<?php echo base_url('public/admin/assets/images/brands/mail_chimp.png') ?>" alt="mail_chimp">
                                <span>Mail Chimp</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#!">
                                <img src="<?php echo base_url('public/admin/assets/images/brands/slack.png') ?>" alt="slack">
                                <span>Slack</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="ms-1 header-item d-none d-sm-flex">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                <i class='bx bx-fullscreen fs-22'></i>
            </button>
        </div>

        <div class="ms-1 header-item d-none d-sm-flex">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                <i class='bx bx-moon fs-22'></i>
            </button>
        </div>



        <div class="dropdown ms-sm-3 header-item topbar-user">
            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <?php if(session('userData.email') == 'bugrahanacikalin@agirhaddecilik.com')
                            { ?>
                                <img class="rounded-circle header-profile-user" src="<?php echo base_url('public/admin/assets/images/bugrabey.jpg') ?>" alt="Header Avatar">
                            <?php } else { ?>
                                <img class="rounded-circle header-profile-user" src="<?php echo base_url('public/admin/assets/images/fav.png') ?>" alt="Header Avatar">
                            <?php } ?>
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= session('userData.name') ?></span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><?= session('userData.email') ?></span>
                            </span>
                        </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <h6 class="dropdown-header">Hoşgeldiniz <?= session('userData.name') ?>!</h6>
                <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle"><?= lang('Navbar.text.profile') ?></span></a>
                <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-account-settings text-muted fs-16 align-middle me-1"></i> <span class="align-middle"><?= lang('Navbar.text.account_setting') ?></span></a>
               <a class="dropdown-item" href="<?php echo base_url(route_to('admin_logout')) ?>"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout"><?= lang('Navbar.text.logout') ?></span></a>
            </div>
        </div>
    </div>
</div>