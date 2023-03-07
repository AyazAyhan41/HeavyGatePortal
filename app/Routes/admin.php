<?php

$routes->group('admin', function ($routes){
    $routes->match(['get','post'],'login', 'Backend\Login::index', ['as' => 'admin_login']);
    $routes->get('logout', 'Backend\Login::logout', ['as' => 'admin_logout']);
    $routes->match(['get','post'],'register', 'Backend\Register::index', ['as' => 'admin_register']);
    $routes->match(['get','post'],'forgot-password', 'Backend\Forgot::index', ['as' => 'admin_forgot_password']);
    $routes->match(['get','post'],'reset-password', 'Backend\Forgot::resetPassword', ['as' => 'admin_reset_password']);
    $routes->group('verification', function ($routes){
        $routes->get('account/(:segment)', 'Backend\Verification::account/$1', ['as' => 'admin_account_verify']);
        $routes->get('forgot-password/(:segment)', 'Backend\Verification::forgot/$1', ['as' => 'admin_forgot_verify']);
    });
    $routes->get('dashboard', 'Backend\Dashboard::index', ['as' => 'admin_dashboard']);
    $routes->get('dashboartest', 'Backend\Dashboard3::index', ['as' => 'admin_dashboard_test']);
    $routes->get('ozet', 'Backend\Dashboard2::index', ['as' => 'admin_ozet']);
    $routes->get('crmraporlar', 'Backend\Raporlar::crmraporlar', ['as' => 'admin_crm_raporlar']);
    $routes->get('satiskararlilik', 'Backend\Raporlar::satiskararlilikrapor', ['as' => 'admin_satis_kararlilik']);
    $routes->get('permissions/failed', 'Backend\Permissions::error', ['as' => 'admin_permissions_error']);

    $routes->group('eimza',function ($routes) {
        $routes->get('siparis/onayi','Backend\SiparisOnay::index',['as' => 'admin_eimza_siparis_onay']);
    });

    $routes->group('group',function ($routes){
        $routes->get('listing(:any)','Backend\Group::listing$1',['as'=>'admin_group_listing']);
        $routes->match(['get','post'],'create','Backend\Group::create',['as' => 'admin_group_create']);
        $routes->match(['get','post'],'edit/(:num)','Backend\Group::edit/$1',['as' => 'admin_group_edit']);
        $routes->post('delete','Backend\Group::delete',['as' => 'admin_group_delete']);
        $routes->post('undo-delete','Backend\Group::undoDelete',['as' => 'admin_group_undo_delete']);
        $routes->post('purge-delete','Backend\Group::purgeDelete',['as' => 'admin_group_purge_delete']);
    });

    $routes->group('butce', function ($routes){
        //$routes->get('gelir(:any)','Backend\Butce::listing$1',['as' => 'admin_butce_gelir']);
        $routes->get('yurtici/list','Backend\Butce::yurtciListe',['as' => 'admin_yurtici_butce_liste']);
        $routes->get('yurtdisi/list','Backend\Butce::yurtdisiListe',['as' => 'admin_yurtdisi_butce_liste']);
        $routes->get('gider/list','Backend\Butce::giderListe',['as' => 'admin_gider_liste']);
        $routes->get('gelir/karsilastirmaYi','Backend\Butce::gelirKarsilastirmaYi',['as' => 'admin_gelir_karislastirma_yurtici']);
        $routes->get('gelir/karsilastirmaYd','Backend\Butce::gelirKarsilatirmaYd',['as' => 'admin_gelir_karislastirma_yurtdisi']);
        $routes->get('gider/karsilastirma/Hesap','Backend\Butce::giderKarsilastirmaHesap',['as' => 'admin_gider_karislastirma_hesap']);
        $routes->get('gider/karsilastirma/GiderYeri','Backend\Butce::giderKarsilastirmaGiderYeri',['as' => 'admin_gider_karislastirma_gideryeri']);
    });

    $routes->group('satis', function ($routes){
        //$routes->get('gelir(:any)','Backend\Butce::listing$1',['as' => 'admin_butce_gelir']);
        $routes->get('siparis/liste','Backend\Satis::acikSiparisRaporu',['as' => 'admin_satis_acik_siparis']);
    });

    $routes->group('nakit', function ($routes){
        $routes->get('akis','Backend\NakitAkis::index',['as' => 'admin_nakit_akis_raporu']);
        $routes->get('gelirtablosu','Backend\NakitAkis::gelirTablosu',['as' => 'admin_nakit_gelir_tablosu']);
        $routes->get('bilanco','Backend\NakitAkis::bilanco',['as' => 'admin_nakit_bilanco']);
    });

    $routes->group('musteri', function ($routes){
        //$routes->get('gelir(:any)','Backend\Butce::listing$1',['as' => 'admin_butce_gelir']);
        $routes->get('listesi','Backend\Musteri::listing',['as' => 'admin_musteri_listesi']);
        $routes->get('detay/(:any)','Backend\Musteri::musteriDetay/$1',['as' => 'admin_musteri_detay']);
        /*$routes->match(['get','post'], 'detay(:num)', 'Backend\Musteri::musteriDetay\$1', ['as' => 'admin_musteri_detay']);*/
    });

    $routes->group('analiz', function ($routes){
        $routes->get('musteri/liste','Backend\Analiz::listing',['as' => 'admin_musteri_analiz_listesi']);
        $routes->get('musteri/detay/(:any)','Backend\Analiz::analizDetay/$1',['as' => 'admin_musteri_analiz_detay']);
        $routes->get('tedarkici/liste','Backend\Analiz::tedarikciListing',['as' => 'admin_tedarikci_analiz_listesi']);
    });

    $routes->group('isemri', function ($routes){
        $routes->get('tolerans/liste','Backend\IsEmri::listing',['as' => 'admin_isemri_tolarans_listesi']);
    });


    $routes->group('telefon', function ($routes){
        //$routes->get('gelir(:any)','Backend\Butce::listing$1',['as' => 'admin_butce_gelir']);
        $routes->get('rehber/list','Backend\Telefon::index',['as' => 'admin_telefon_rehber_list']);
        $routes->match(['get','post'],'rehber/add','Backend\Telefon::add',['as' => 'admin_telefon_rehber_add']);
        $routes->post('rehber/delete', 'Backend\Telefon::delete', ['as' => 'admin_telefon_rehber_delete']);
        $routes->match(['get','post'],'rehber/edit/(:num)','Backend\Telefon::edit/$1',['as' => 'admin_telefon_rehber_edit']);
    });

    $routes->group('arac',function ($routes){
       $routes->get('liste','Backend\AracKayit::index',['as' => 'admin_arac_liste']);
       $routes->match(['get','post'],'yeni','Backend\AracKayit::new',['as' => 'admin_arac_kayit']);
    });

    $routes->group('raporlar', function ($routes){
        $routes->get('gunluk/kur','Backend\Raporlar::gunlukKur',['as' => 'admin_rapor_gunluk_kur']);
        $routes->get('epr','Backend\Raporlar::epr',['as' => 'admin_rapor_envarter_planlama']);
        $routes->get('faturalandirilmamis/sevkiyatlar','Backend\Raporlar::faturalandirilmamisSevkiyatlar',['as' => 'admin_rapor_faturalandirilmamis_sevkiyatlar']);
        $routes->get('otuzgunuzeriacikisemri','Backend\Raporlar::otuzGunUzeri',['as' => 'admin_rapor_otuz_gun_uzeri_acik_isemri']);
        /*$routes->get('operasyon/hurdalama','Backend\Raporlar::operasyonHurdalamaGunluk',['as' => 'admin_rapor_operasyon_hurdalama']);*/
        /*$routes->get('azak/satissiparislari','Backend\Rapor::satisSiparisleri',['as' => 'admin_rapor_azak_satis_siparisleri']);*/

        $routes->match(['get','post'],'olustur','Backend\Raporlar::add',['as' => 'admin_rapor_olustur']);

    });

    $routes->group('user',function ($routes) {
       $routes->get('listing(:any)','Backend\Users::listing$1',['as' => 'admin_user_listing']);
    });


    $routes->group('hizlirapor',function ($routes) {
        $routes->get('antidamping','Backend\HizliRapor::antiDampingSatisFaturaOzet',['as' => 'admin_hizli_antidamping']);
    });

    $routes->group('stok',function ($routes) {
        $routes->get('liste','Backend\Stok::listing',['as' => 'admin_stok_listesi']);
        $routes->get('yillik/gider/yeri(:any)','Backend\Raporlar\Finans::yillikGiderYeriAnaliz$1',['as' => 'admin_stok_yillik_gider_yeri']);
    });






});



