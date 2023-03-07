<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?php echo base_url(route_to('admin_dashboard')) ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo base_url('public/admin/assets/images/agir-logo.png') ?>" alt="" height="100">
                    </span>
            <span class="logo-lg">
                        <img src="<?php echo base_url('public/admin/assets/images/agir-logo.png') ?>" alt="" height="100">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo base_url('public/admin/assets/images/agir-logo.png') ?>" alt="" height="100">
                    </span>
            <span class="logo-lg">
                        <img src="<?php echo base_url('public/admin/assets/images/agir-logo.png') ?>" alt="" height="100">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo base_url(route_to('admin_dashboard')) ?>">
                        <i class="ri-honour-line"></i> <span data-key="t-dashboard">Admin Özet</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#groupYonetimi" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="groupYonetimi">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Grup Yönetimi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="groupYonetimi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo base_url(route_to('admin_group_listing',null)) ?>" class="nav-link" data-key="t-admin-group-listing"> Grup Listesi </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(route_to('admin_group_create')) ?>" class="nav-link" data-key="t-yeni-grup-ekle"> Yeni Grup Ekle </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#kullaniciYonetimi" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="kullaniciYonetimi">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-kullaniciYonetim">Kullanıcı Yönetimi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="kullaniciYonetimi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo base_url(route_to('admin_user_listing',null)) ?>" class="nav-link" data-key="t-admin-group-listing"> Kullanıcı Listesi </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(route_to('admin_group_create')) ?>" class="nav-link" data-key="t-yeni-grup-ekle"> Yeni Kullanıcı Ekle </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Raporlar" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="Raporlar">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-raporlar">Raporlar</span>
                    </a>
                    <div class="collapse menu-dropdown" id="Raporlar">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo base_url(route_to('admin_crm_raporlar')) ?>" class="nav-link" data-key="t-crm-raporlari"> CRM Raporları </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(route_to('admin_satis_kararlilik')) ?>" class="nav-link" data-key="t-satis-kararlilik-raporlari"> Satış Kararlılık Raporu </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Butce" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="Butce">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-Butce">Gelir Bütçesi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="Butce">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo base_url(route_to('admin_yurtici_butce_liste','?site=AZ01&yil=2023')) ?>" class="nav-link" data-key="t-crm-gelir-butce"> Yurtiçi Gelir Bütçesi </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(route_to('admin_yurtdisi_butce_liste',null)) ?>" class="nav-link" data-key="t-crm-yurtdisi-butce"> Yurtdışı Gelir Bütçesi </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url(route_to('admin_gelir_karislastirma')) ?>" class="nav-link" data-key="t-crm-gelir-karsilastirma"> Gelir Bütçesi Karşılaştırma </a>
                            </li>
                            <!--<li class="nav-item">
                                <a href="<?php /*echo base_url(route_to('admin_satis_kararlilik')) */?>" class="nav-link" data-key="t-satis-kararlilik-raporlari"> Satış Kararlılık Raporu </a>
                            </li>-->
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#GiderButce" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="GiderButce">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-giderButce">Gider Bütçesi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="GiderButce">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo base_url(route_to('admin_gider_liste')) ?>" class="nav-link" data-key="t-crm-gelir-butce"> Gider Bütçesi </a>
                            </li>
                            <!--<li class="nav-item">
                                <a href="<?php /*echo base_url(route_to('admin_satis_kararlilik')) */?>" class="nav-link" data-key="t-satis-kararlilik-raporlari"> Satış Kararlılık Raporu </a>
                            </li>-->
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="ri-share-line"></i> <span data-key="t-multi-level">Raporlar</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Level
                                    Ağır Haddecilik
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAccount">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-key="t-level-2.1"> Günlük Satış USD </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Analytics </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects.html" class="nav-link" data-key="t-projects"> Projects </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-nft.html" class="nav-link" data-key="t-nft"> NFT <span class="badge badge-pill bg-danger" data-key="t-new">New</span></a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>