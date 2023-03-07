<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Libraries\Oracle;
use Cassandra\Date;


class AracKayit extends BaseController
{
    protected $conn;

    public function __construct()
    {
        putenv("NLS_LANG=TURKISH_TURKEY.TR8MSWIN1254");
        $conn = oci_connect('IFSAPP', 'XckxqK7kjc', '(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.228)(PORT = 1521)))(CONNECT_DATA=(SID=TEST)))','AL32UTF8');

        $this->conn = $conn;
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
    }

    public function index()
    {

        $SQL = "select 
       a.REG_ID KAYITID,
       a.CONTRACT,
       a.REG_TYPE KAYITTIPI,
       a.REG_DATE VARISTARIH,
       a.USER_ID,
       a.MCH_CODE PLAKA,
       a.DRIVER,
       a.CUSTOMER_NO CUSTNO,
       nvl(CHECK_OUT_DATE,'01/01/0001') FABRIKA_GIRIS,
       a.ARRIVAL_DATE,
       nvl(CHECK_IN_DATE,'01/01/0001') FABCIKISTARIH,
       a.ARRIVAL_KM_VALUE,
       a.CHECK_OUT_KM_VALUE,
       a.STATE,
       a.FORWARDER_ID,
       IFSAPP.FORWARDER_INFO_API.Get_Name(FORWARDER_ID),
       nvl(IFSAPP.cust_ord_customer_api.Get_Name(customer_no), CUSTOMER_NO),
       nvl(IFSAPP.person_info_api.Get_Name(DRIVER), DRIVER),
       
       :ihtiyac,
       :verilen,
       :lokasyon
  from IFSAPP.AH_VEHICLE_REGISTRATION_CFV a where REG_TYPE = :musteri";

        $stmt = oci_parse($this->conn, $SQL);

        $ihtiyac = 'CF$'."_IHTIYAC_TAKOZ_ADET IHTIYACTAKOZADET,";
        $verilen = 'CF$'."_VERILEN_TAKOZ VERILENTAKOZADET,";
        $lokasyon = 'CF$'."_LOKASYON LOKASYON,";
        $year = 'MusterininAraci';

        oci_bind_by_name($stmt, ':ihtiyac', $ihtiyac);
        oci_bind_by_name($stmt, ':verilen', $verilen);
        oci_bind_by_name($stmt, ':lokasyon', $lokasyon);
        oci_bind_by_name($stmt, ':musteri', $year);
        oci_execute($stmt);

        $data = ['veri' => $stmt];

        return view('admin/pages/arac/list',$data);

    }


    public function new()
    {

        if ($this->request->getMethod() == 'post') {

            $kayit_tipi = $this->request->getPost('kayit_tipi');
            $site = $this->request->getPost('site');
            $kayit_eden = $this->request->getPost('kayit_eden');
            $kayit_tarih = $this->request->getPost('kayit_tarih');
            $plaka = $this->request->getPost('plaka');
            $surucu = $this->request->getPost('surucu');
            $gelis_tarih = $this->request->getPost('gelis_tarih');
            $fab_giris_tarih = $this->request->getPost('fab_giris_tarih');
            $surucu_tc = $this->request->getPost('surucu_tc');
            $cf = "CF$";
            $tc = "_TC_NO";

            $deger = $cf.$tc;

            $sql = "
            DECLARE
   a_ VARCHAR2(32000) := NULL; --p0
   b_ VARCHAR2(32000) := NULL; --p1
   c_ VARCHAR2(32000) := '.$deger.'||chr(31)||'$surucu_tc'||chr(30); --p2
   d_ VARCHAR2(32000) := 'REG_TYPE'||chr(31)||'$kayit_tipi'||chr(30)||'CONTRACT'||chr(31)||'$site'||chr(30)||'USER_ID'||chr(31)||'$kayit_eden'||chr(30)||'REG_DATE'||chr(31)||'$kayit_tarih'||chr(30)||'MCH_CODE'||chr(31)||'$plaka'||chr(30)||'DRIVER'||chr(31)||'$surucu'||chr(30)||'ARRIVAL_DATE'||chr(31)||'$gelis_tarih'||chr(30)||'CHECK_IN_DATE'||chr(31)||'$fab_giris_tarih'||chr(30); --p3
   e_ VARCHAR2(32000) := 'DO'; --p4
BEGIN

    
IFSAPP.AH_VEHICLE_REGISTRATION_API.NEW__( a_ , b_ , c_ , d_ , e_ );
    
END;
            ";



            $stmt = oci_parse($this->conn, $sql);



            oci_execute($stmt);


            /*$url_name = $_POST['textfield'];
            $anchor_text = $_POST['textfield2'];
            $description = $_POST['textfield3'];

            $sql = 'INSERT INTO URL(Url_ID,Url_Name,Anchor_Text,Description) '.
                'VALUES(9, :url, :anchor, :description)';

            $compiled = oci_parse($db, $sql);

            oci_bind_by_name($compiled, ':url', $url_name);
            oci_bind_by_name($compiled, ':anchor', $anchor_text);
            oci_bind_by_name($compiled, ':description', $description);

            oci_execute($compiled);*/


        }


        return view('admin/pages/arac/yeni');
    }
}