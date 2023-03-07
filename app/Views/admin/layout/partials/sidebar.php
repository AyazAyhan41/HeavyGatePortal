<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

                <div>
                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(route_to('admin_dashboard')) ?>" class="nav-link active">
                        <i class="ph-house"></i>
                        <span>
									Ana Sayfa
								</span>
                    </a>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-plus"></i>
                        <span>Gelir Bütçesi</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_yurtici_butce_liste')) ?>" class="nav-link" onclick="showLoader()">Yurtiçi Gelir Bütçesi</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_yurtdisi_butce_liste',null)) ?>" class="nav-link" onclick="showLoader()">Yurtdışı Gelir Bütçesi</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_gelir_karislastirma_yurtici')) ?>" class="nav-link" onclick="showLoader()">Yurtiçi Bütçesi Karşılaştırma</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_gelir_karislastirma_yurtdisi')) ?>" class="nav-link" onclick="showLoader()">Yurtdışı Bütçesi Karşılaştırma</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-minus"></i>
                        <span>Gider Bütçesi</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_gider_liste')) ?>" class="nav-link">Gider Bütçesi</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_gider_karislastirma_hesap')) ?>" class="nav-link">Karşılaştırma (Hesap)</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_gider_karislastirma_gideryeri')) ?>" class="nav-link">Karşılaştırma (Gider Çeşidi)</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-users"></i>
                        <span>Müşteriler</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_musteri_listesi')) ?>" class="nav-link">Müşteri Listesi</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-car"></i>
                        <span>Araç İşlemleri</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_arac_kayit')) ?>" class="nav-link">Araç Kayıt</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-cardholder"></i>
                        <span>İş Emri</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_isemri_tolarans_listesi')) ?>" class="nav-link">Tolarans Listesi</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_ozet')) ?>" class="nav-link">İş Emri Özet</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-files"></i>
                        <span>Finansal Raporlama</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_nakit_gelir_tablosu')) ?>" class="nav-link">Gelir Listesi</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_stok_yillik_gider_yeri',null)) ?>" class="nav-link">Yıllık Gider Yeri Analizi</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-gauge"></i>
                        <span>Analizler</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_musteri_analiz_listesi')) ?>" class="nav-link">Multi-Company Customer Analysis</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_tedarikci_analiz_listesi')) ?>" class="nav-link">Multi-Company Supplier Analysis</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-phone-disconnect"></i>
                        <span>Telefon Rehber</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_telefon_rehber_list')) ?>" class="nav-link">Telefon Listesi</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(route_to('admin_telefon_rehber_add')) ?>" class="nav-link">Yeni Telefon Ekle</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-table"></i>
                        <span>Raporlari</span>
                    </a>
                    <ul class="nav-group-sub collapse" style="">
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">Ağır Raporlar</a>
                            <ul class="nav-group-sub collapse" style="">
                                <li class="nav-item"><a href="#" class="nav-link">Rapor</a></li>

                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">Azak Raporlar</a>
                            <ul class="nav-group-sub collapse" style="">
                                <li class="nav-item"><a href="<?php echo base_url(route_to('admin_rapor_envarter_planlama')) ?>" class="nav-link">Envarter Planlama Raporu</a></li>
                                <li class="nav-item"><a href="<?php echo base_url(route_to('admin_rapor_faturalandirilmamis_sevkiyatlar')) ?>" class="nav-link">Faturalandırılmamış Sevkiyatlar</a></li>
                                <li class="nav-item"><a href="<?php echo base_url(route_to('admin_rapor_otuz_gun_uzeri_acik_isemri')) ?>" class="nav-link">30 Gün Üzeri Acık İş Emirleri</a></li>

                            </ul>
                        </li>


                    </ul>
                </li>


                <!--<li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-layout"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="index.html" class="nav-link active">Default layout</a></li>
                        <li class="nav-item"><a href="../../layout_2/full/index.html" class="nav-link">Layout 2</a></li>
                        <li class="nav-item"><a href="../../layout_3/full/index.html" class="nav-link">Layout 3</a></li>
                        <li class="nav-item"><a href="../../layout_4/full/index.html" class="nav-link">Layout 4</a></li>
                        <li class="nav-item"><a href="../../layout_5/full/index.html" class="nav-link">Layout 5</a></li>
                        <li class="nav-item"><a href="../../layout_6/full/index.html" class="nav-link">Layout 6</a></li>
                        <li class="nav-item"><a href="../../layout_7/full/index.html" class="nav-link disabled">Layout 7 <span class="badge align-self-center ms-auto">Coming soon</span></a></li>
                    </ul>
                </li>-->


            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>