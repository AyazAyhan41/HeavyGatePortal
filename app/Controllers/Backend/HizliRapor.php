<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class HizliRapor extends BaseController
{
    protected $conn;

    public function __construct()
    {
        putenv("NLS_LANG=TURKISH_TURKEY.TR8MSWIN1254");
        $conn = oci_connect('IFSAPP', 'Sakura169', '(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.3.209)(PORT = 1521)))(CONNECT_DATA=(SID=PROD)))', 'AL32UTF8');

        $this->conn = $conn;
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
    }

    public function antiDampingSatisFaturaOzet()
    {
        $antidamping = "
                    SELECT z.hesap,
                           z.mg,
                           SUM ( z.satis_metre) SATIŞ_METRE,
                           SUM ( z.satis_tonaj) SATIŞ_TONAJ,
                           ROUND (SUM ( z.indirimsiz_TL_tutar),2) INDIRIMSIZ_TL ,
                           ROUND (SUM ( z.net_TL_tutar),2) NET_TL
                           FROM AH_ANTDAMPING_SATIS_FAT_OZT z
                    WHERE z.mg  LIKE NVL ('%','%')
                    AND z. mg IN ( 'M021' ,'M029' , 'TM013' ,'TM020' , 'TM021')
                    AND z.hesap  LIKE NVL ('%','%') 
                    AND TRUNC( z.Fatura_Tarihi) BETWEEN to_date('01.01.2022','dd.mm.yyyy') AND to_date('01.03.2023','dd.mm.yyyy')
                    GROUP BY z.hesap,
                    z.mg
";

        $stmt = oci_parse($this->conn, $antidamping);

        oci_execute($stmt);

        $data['rapor'] = $stmt;

        return view('admin/pages/hizliraporlar/antidamping-satis-fatura-ozet',$data);

        oci_close($this->conn);
        
    }
}