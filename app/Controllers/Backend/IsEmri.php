<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Libraries\Oracle;
use Cassandra\Date;


class IsEmri extends BaseController
{
    protected $conn;

    public function __construct()
    {
        putenv("NLS_LANG=TURKISH_TURKEY.TR8MSWIN1254");
        $conn = oci_connect('IFSAPP', 'XckxqK7kjc', '(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.228)(PORT = 1521)))(CONNECT_DATA=(SID=TEST)))', 'AL32UTF8');

        $this->conn = $conn;
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
    }


    public function listing()
    {
        /*$SQL = "select
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
  from IFSAPP.AH_VEHICLE_REGISTRATION_CFV a where REG_TYPE = :musteri
";

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

        $data = [
            'veri' => $stmt,

        ];*/

        return view('admin/pages/isemri/listing');
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

            $sql = "";
            $stmt = oci_parse($this->conn, $sql);
            oci_execute($stmt);
        }


        return view('admin/pages/isemri/create');
    }

}
