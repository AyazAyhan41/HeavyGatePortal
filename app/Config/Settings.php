<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Settings extends BaseConfig
{
    public $stopAuthFilter = [
        'login',
        'register',
        'forgot-password',
        'reset-password',
        'verification',

    ];

    public $permissions = [

        'admin_login' => 'Permissions.text.admin_login',
        'group_listing' => 'Permissions.text.group_listing',
        'group_create' => 'Permissions.text.group_create',
        'group_edit' => 'Permissions.text.group_edit',
        'group_delete' => 'Permissions.text.group_delete',
        'group_undo_delete' => 'Permissions.text.group_undo_delete',
        'group_purge_delete' => 'Permissions.text.group_purge_delete',
        'user_Listing' => 'Permissions.text.user_listing',
        'butce_yurtici_list' => 'Yurtiçi Bütçe Listesi Görme Yetkisi',
        'butce_yurtdisi_list' => 'Yurtiçi Bütçe Listesi Görme Yetkisi',
        'butce_gelir_karsilastirmaYi' => 'Yurtiçi Bütçe Karşılaştırma Yetkisi',
        'butce_gelir_karsilastirmaYd' => 'Yurtdışı Bütçe Karşılaştırma Yetkisi',
        'butce_gider_list' => 'Gider Bütçesi Görme Yetkisi',
        'butce_gider_karsilastirma_Hesap' => 'Bütçe Karşılaştırma Hesap Görme Yetkisi',
        'butce_gider_karsilastirma_GiderYeri' => 'Gider Yeri Bütçe Karşılaştırma Görem Yetkisi',
        'musteri_listesi' => 'Müşteri Listesi Görme Yetkisi',
        'arac_yeni' => 'Araç Kayıt Etme Yetkisi',
        'isemri_tolerans_liste' => 'İş Emri Tolerans Ekleme Yetkisi',
        'nakit_gelirtablosu' => 'Finansal Raporlama Gelir Listesi Görme Yetkisi',
        'stok_yillik_gider_yeri' => 'Yıllık gideryeri Analizi Görme Yetkisi',
        'analiz_musteri_liste' => 'Multi-Company Customer Analysis Görme Yetkisi',
        'analiz_tedarkici_liste' => 'Multi-Company Customer Analysis Görme Yetkisi'

    ];

}