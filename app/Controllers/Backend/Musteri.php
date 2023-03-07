<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Libraries\Oracle;
use Cassandra\Date;


class Musteri extends BaseController
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

    public function listing()
    {
        $sql = "select OBJID, OBJVERSION, CUSTOMER_ID, NAME, ASSOCIATION_NO, DEFAULT_LANGUAGE, COUNTRY, CREATION_DATE, PARTY, PARTY_TYPE, DEFAULT_DOMAIN, CORPORATE_FORM from CUSTOMER_INFO";

        $stmt = oci_parse($this->conn, $sql);

        /*$site = $this->request->getGet('site');
        $yil = $this->request->getGet('yil');
        $contract = $site;
        $year = $yil;
        oci_bind_by_name($stmt, ':year', $year);
        oci_bind_by_name($stmt, ':contract', $contract);*/
        oci_execute($stmt);

        $data['veri'] = $stmt;

        return view('admin/pages/musteri/listing', $data);

        oci_close($this->conn);

    }

    public function musteriDetay(string $musteri_no = null)
    {

        $musteri = "select OBJID, OBJVERSION, CUSTOMER_ID, NAME, ASSOCIATION_NO, DEFAULT_LANGUAGE, COUNTRY, CREATION_DATE, PARTY, PARTY_TYPE, DEFAULT_DOMAIN, CORPORATE_FORM 
        from CUSTOMER_INFO where 
        CUSTOMER_ID = :musteriad";
        $adres = "select OBJID,
       OBJVERSION,
       ADDRESS_ID,
       EAN_LOCATION,
       NAME,
       CITY,
       COUNTRY,
       IN_CITY,
       JURISDICTION_CODE,
       VALID_FROM,
       VALID_TO,
       PRIMARY_CONTACT,
       SECONDARY_CONTACT,
       ADDRESS1,
       ADDRESS2,
       ZIP_CODE,
       COUNTY,
       STATE,
       COUNTRY_DB,
       CUSTOMER_ID,
       DEFAULT_DOMAIN,
       PARTY_TYPE,
       PARTY
  from IFSAPP.CUSTOMER_INFO_ADDRESS
 where CUSTOMER_ID = :musteri
   and (objid = 'AAARnsAAFAABEXXAAS')";
        $cari_islemler = "select CUSTOMER_ID,
       COMPANY,
       TUR,
       FATURA_NO,
       ACIKLAMA,
       ISLEM_TARIHI,
       FIS_TARIHI,
       VADE_TARIHI,
       VADE_TARIHI - FIS_TARIHI KALAN,
       DECODE(SIGN(TUTAR), 1, TUTAR, 0) BORC,
       DECODE(SIGN(TUTAR), -1, -TUTAR, 0) ALACAK,
       KALAN_GUN_SAYISI,
       DOVIZ,
       KUR,
       TUTAR,
       ESLESEN_TUTAR,
       ACIK_TUTAR,
       IFS_ISLEM_NO,
       CEK_NO,
       IFS_CEK_NO,
       VOUCHER_TYPE,
       ACCOUNTING_YEAR,
       VOUCHER_NO,
       COKLU_ODEME_NO,
       INVOICE_ID,
       IFSAPP.voucher_api.get_userid(company,
                                     voucher_type,
                                     accounting_year,
                                     voucher_no),
       IFSAPP.Person_Info_API.Get_Name(IFSAPP.CUST_ORD_CUSTOMER_API.Get_Salesman_Code(CUSTOMER_ID))
  from IFSAPP.TRYPE_ALL_LEDGER_PLAN_X_QRY
 where CUSTOMER_ID = :customer
   and party_type = 'CUSTOMER'";

        $stmt = oci_parse($this->conn, $musteri);
        $stmt2 = oci_parse($this->conn, $adres);
        $stmt3 = oci_parse($this->conn, $cari_islemler);

        oci_bind_by_name($stmt, ':musteriad', $musteri_no);
        oci_bind_by_name($stmt2, ':musteri', $musteri_no);
        oci_bind_by_name($stmt3, ':customer', $musteri_no);

        oci_execute($stmt);
        oci_execute($stmt2);
        oci_execute($stmt3);

        $data['musteri'] = $stmt;
        $data['adres'] = $stmt2;
        $data['cari'] = $stmt3;


        return view('admin/pages/musteri/detay', $data);

        oci_close($this->conn);



    }
}