<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Libraries\Oracle;
use Cassandra\Date;


class Butce extends BaseController
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

    public function listing($year = null)
    {
        // return view('admin/pages/butce/listing');
    }

    public function yurtciListe()
    {
        $yurticigelir = "SELECT *
FROM (
select * from ( 
select a.contract CONTRACT,
       a.budget_year YEAR,
       a.period PERIOD,
       a.cust_grup_desc PAZAR,
       a.muh_grup MUHGRUP,
       a.muh_aciklama MUHACIK,
       sum(a.total_sales_c) toplam_tutar
from (select s.contract,
       s.budget_year,
       s.cust_grup_desc,
       s.total_sales_c,
       s.period,
       inventory_part_api.Get_Accounting_Group(s.contract,s.part_no) muh_grup,
       Accounting_Group_Api.Get_Description( inventory_part_api.Get_Accounting_Group(s.contract,s.part_no)) muh_aciklama,
       s.sale_quantity
  from TRBUDGET_SALESBUDGET_OWR s
where BUDGET_YEAR = '2023'
AND s.CONTRACT = 'AZ01'
AND s.cust_grup_desc = 'Yurtiçi'
) a
GROUP BY a.contract,
       a.budget_year,
       a.period,
       a.muh_grup,
       a.muh_aciklama,
       a.cust_grup_desc) 
   pivot (
           sum(TO_NUMBER(toplam_tutar)) Tutar
           for (PERIOD)
             IN ('1' AS OCAK,
                 '2' AS SUBAT,
                 '3' AS MART,
                 '4' AS NISAN,
                 '5' AS MAYIS,
                 '6' AS HAZIRAN,
                 '7' AS TEMMUZ,
                 '8' AS AGUSTOS,
                 '9' AS EYLUL,
                 '10' AS EKIM,
                 '11' AS KASIM,
                 '12' AS ARALIK ))
)QQ";


        $stmt = oci_parse($this->conn, $yurticigelir);
        $stmt2 = oci_parse($this->conn, $yurticigelir);
        /*$site = $this->request->getGet('site');
        $yil = $this->request->getGet('yil');
        $contract = $site;
        $year = $yil;
        oci_bind_by_name($stmt, ':year', $year);
        oci_bind_by_name($stmt, ':contract', $contract);*/
        oci_execute($stmt);
        oci_execute($stmt2);

        $data['veri'] = $stmt;
        $data['tablo'] = $stmt2;

        return view('admin/pages/butce/gelir-yurtici', $data);

        oci_close($this->conn);


    }

    public function yurtdisiListe()
    {

        $sql4 = "SELECT *
FROM (
select * from ( 
select a.contract CONTRACT,
       a.budget_year YEAR,
       a.period PERIOD,
       a.cust_grup_desc PAZAR,
       a.muh_grup MUHGRUP,
       a.muh_aciklama MUHACIK,
       sum(a.total_sales_c) toplam_tutar
from (select s.contract,
       s.budget_year,
       s.cust_grup_desc,
       s.total_sales_c,
       s.period,
       inventory_part_api.Get_Accounting_Group(s.contract,s.part_no) muh_grup,
       Accounting_Group_Api.Get_Description( inventory_part_api.Get_Accounting_Group(s.contract,s.part_no)) muh_aciklama,
       s.sale_quantity
  from TRBUDGET_SALESBUDGET_OWR s
where BUDGET_YEAR = '2023'
AND s.CONTRACT = 'AZ01'
AND s.cust_grup_desc = 'Yurtdışı'
) a
GROUP BY a.contract,
       a.budget_year,
       a.period,
       a.muh_grup,
       a.muh_aciklama,
       a.cust_grup_desc) 
   pivot (
           sum(toplam_tutar) Tutar
           for (PERIOD)
             IN ('1' AS OCAK,
                 '2' AS SUBAT,
                 '3' AS MART,
                 '4' AS NISAN,
                 '5' AS MAYIS,
                 '6' AS HAZIRAN,
                 '7' AS TEMMUZ,
                 '8' AS AGUSTOS,
                 '9' AS EYLUL,
                 '10' AS EKIM,
                 '11' AS KASIM,
                 '12' AS ARALIK ))
)QQ
";


        $stmt = oci_parse($this->conn, $sql4);
        $year = 2022;
        oci_execute($stmt);
        $data = [
            'veri' => $stmt,

        ];

        return view('admin/pages/butce/gelir-yurtdisi', $data);

        oci_close($this->conn);
    }


    public function giderListe($site = 'AZAK', $yil = '2022')
    {
        $sql = "SELECT *
FROM (
select * from ( 
select b.BUDGET_PERIOD PERIOD,
       b.COMPANY SIRKET,
       b.ACCOUNT HESAP,
       b.ACCOUNT_DESC HESAPACIKLAMA,
       sum(b.amount) toplam_tutar
from (select 
          s.BUDGET_PERIOD,
       s.COMPANY,
       s.ACCOUNT,
       s.ACCOUNT_DESC,
       s.amount,
       s.third_currency_amount
  from BUDGET_PERIOD_AMOUNT1 s
where COMPANY = 'AZAK'
   and LEDGER_ID = '00'
   and BUDGET_YEAR = '2023'
   and BUDGET_VERSION = '1'
) b
GROUP BY b.BUDGET_PERIOD,
       b.COMPANY,
       b.ACCOUNT,
       b.ACCOUNT_DESC)
   pivot (
           sum(TO_NUMBER(toplam_tutar)) Tutar
           for (PERIOD)
             IN ('1' AS OCAK,
                 '2' AS SUBAT,
                 '3' AS MART,
                 '4' AS NISAN,
                 '5' AS MAYIS,
                 '6' AS HAZIRAN,
                 '7' AS TEMMUZ,
                 '8' AS AGUSTOS,
                 '9' AS EYLUL,
                 '10' AS EKIM,
                 '11' AS KASIM,
                 '12' AS ARALIK ))
)QQ";

        $stmt = oci_parse($this->conn, $sql);
        $site = $this->request->getGet('site');
        $yil = $this->request->getGet('yil');
        oci_execute($stmt);

        $direk = "SELECT *
FROM (
select * from ( 
select b.BUDGET_PERIOD PERIOD,
       b.COMPANY SIRKET,
       b.ACCOUNT HESAP,
       b.ACCOUNT_DESC HESAPACIKLAMA,
       sum(b.amount) toplam_tutar
from (select 
          s.BUDGET_PERIOD,
       s.COMPANY,
       s.ACCOUNT,
       s.ACCOUNT_DESC,
       s.amount,
       s.third_currency_amount
  from BUDGET_PERIOD_AMOUNT1 s
where COMPANY = 'AZAK'
   and LEDGER_ID = '00'
   and BUDGET_YEAR = '2023'
   and BUDGET_VERSION = '1'
) b
GROUP BY b.BUDGET_PERIOD,
       b.COMPANY,
       b.ACCOUNT,
       b.ACCOUNT_DESC)
   pivot (
           sum(TO_NUMBER(toplam_tutar)) Tutar
           for (PERIOD)
             IN ('1' AS OCAK,
                 '2' AS SUBAT,
                 '3' AS MART,
                 '4' AS NISAN,
                 '5' AS MAYIS,
                 '6' AS HAZIRAN,
                 '7' AS TEMMUZ,
                 '8' AS AGUSTOS,
                 '9' AS EYLUL,
                 '10' AS EKIM,
                 '11' AS KASIM,
                 '12' AS ARALIK ))
)QQ";

        $drk = oci_parse($this->conn, $sql);

        oci_execute($drk);

        /*while (($row = oci_fetch_object($drk)) != false) {
            // The following will output the first 11 bytes from DESCRIPTION
            $ocak_toplam = $row->OCAK_TUTAR;
        }*/


        $data = [
            'veri' => $stmt,
            /*'ocak_toplam' => $ocak_toplam*12*/


        ];

        return view('admin/pages/butce/gider-listesi', $data);

        oci_close($this->conn);


    }


    public function gelirKarsilastirmaYi()
    {
        $sql = "SELECT  YIL,
        SIRKET,
        PAZAR,
        SATIS_GRUBU,
        SATIS_GRUP_ACIKLAMA,
        sum(OCAK_HEDEFLENEN_EUR_TUTAR) OCAK_HEDEF,
        sum(OCAK_GERCEKLESEN_EUR_TUTAR) OCAK_GERCEK,
        sum(SUBAT_HEDEFLENEN_EUR_TUTAR) SUBAT_HEDEF,
        sum(SUBAT_GERCEKLESEN_EUR_TUTAR) SUBAT_GERCEK,
        sum(MART_HEDEFLENEN_EUR_TUTAR) MART_HEDEF,
        sum(MART_GERCEKLESEN_EUR_TUTAR) MART_GERCEK,
        sum(NISAN_HEDEFLENEN_EUR_TUTAR) NISAN_HEDEF,
        sum(NISAN_GERCEKLESEN_EUR_TUTAR) NISAN_GERCEK,
        sum(MAYIS_HEDEFLENEN_EUR_TUTAR) MAYIS_HEDEF,
        sum(MAYIS_GERCEKLESEN_EUR_TUTAR) MAYIS_GERCEK,
        sum(HAZIRAN_HEDEFLENEN_EUR_TUTAR) HAZIRAN_HEDEF,
        sum(HAZIRAN_GERCEKLESEN_EUR_TUTAR) HAZIRAN_GERCEK,
        sum(TEMMUZ_HEDEFLENEN_EUR_TUTAR) TEMMUZ_HEDEF,
        sum(TEMMUZ_GERCEKLESEN_EUR_TUTAR) TEMMUZ_GERCEK,
        sum(AGUSTOS_HEDEFLENEN_EUR_TUTAR) AGUSTOS_HEDEF,
        sum(AGUSTOS_GERCEKLESEN_EUR_TUTAR) AGUSTOS_GERCEK,
        sum(EYLUL_HEDEFLENEN_EUR_TUTAR) EYLUL_HEDEF,
        sum(EYLUL_GERCEKLESEN_EUR_TUTAR) EYLUL_GERCEK,
        sum(EKIM_HEDEFLENEN_EUR_TUTAR) EKIM_HEDEF,
        sum(EKIM_GERCEKLESEN_EUR_TUTAR) EKIM_GERCEK,
        sum(KASIM_HEDEFLENEN_EUR_TUTAR) KASIM_HEDEF,
        sum(KASIM_GERCEKLESEN_EUR_TUTAR) KASIM_GERCEK,
        sum(ARALIK_HEDEFLENEN_EUR_TUTAR) ARALIK_HEDEF,
        sum(ARALIK_GERCEKLESEN_EUR_TUTAR) ARALIK_GERCEK
FROM (

SELECT * FROM (
SELECT * FROM (

SELECT G.TUR,
       G.YIL,
       G.DONEM,
       G.SIRKET,
       G.PAZAR,
       G.MUSTERI_KODU,
       CUSTOMER_INFO_API.Get_Name(G.MUSTERI_KODU) MUSTERI_ACIKLAMA,
       G.SATIS_GRUBU,
       G.SATIS_GRUP_ACIKLAMA,
       G.EUR_TUTAR
FROM (
SELECT 'GERCEKLESEN' TUR,
       AH_UTIL_API.Convert_To_Number(TO_CHAR(ifsapp.invoice_api.get_invoice_date(m.company, m.identity,'CUSTOMER',m.invoice_id),'YYYY')) YIL,
       AH_UTIL_API.Convert_To_Number(TO_CHAR(ifsapp.invoice_api.get_invoice_date(m.company, m.identity,'CUSTOMER',m.invoice_id),'MM')) DONEM,
       M.company SIRKET,
       M.identity CARI_KOD,
       (SELECT h.delivery_identity FROM ifsapp.CUSTOMER_ORDER_INV_HEAD_UIV h
         WHERE h.company = m.company and h.invoice_id = m.invoice_id) MUSTERI_KODU,
      DECODE( ifsapp.customer_order_api.Get_Order_Id(l.order_no),'IHK','Yurtdışı','IHR','Yurtdışı','IHF','Yurtdışı','AGI','Yurtdışı','Yurtiçi' )PAZAR,
      SALES_PART_API.Get_Catalog_Group(l.contract,l.catalog_no) SATIS_GRUBU,    
      SALES_PART_API.Get_Catalog_Group_Desc(l.contract,l.catalog_no) SATIS_GRUP_ACIKLAMA,
    
      ifsapp.trutil_utility_api.Get_Other_Curr_Value(m.company,ifsapp.invoice_api.get_invoice_date(m.company,m.identity,'CUSTOMER', m.invoice_id),
       ifsapp.invoice_api.Get_Curr_Code(m.company, m.identity,'CUSTOMER', m.invoice_id), 'EUR', sum(m.net_curr_amount)) EUR_TUTAR
  FROM ifsapp.customer_order_line l, ifsapp.invoice_item m
WHERE l.contract = 'AZ01'

   and m.company = l.company
   and m.c1 = l.order_no
   and m.c2 = l.line_no
   and m.c3 = l.rel_no
   and m.c5 = l.catalog_no
   and (SELECT h.objstate FROM ifsapp.CUSTOMER_ORDER_INV_HEAD_UIV h
         WHERE h.company = m.company and h.invoice_id = m.invoice_id) not IN ('Cancelled')
   and l.objstate NOT IN ('Cancelled')
   and l.catalog_no not like '%NAK%'
  and TO_CHAR(ifsapp.invoice_api.get_invoice_date(m.company, m.identity,'CUSTOMER',m.invoice_id),'YYYY') = 2023
   AND NOT  ((l.catalog_type_db=('INV')) AND (customer_order_api.Get_Order_Id(l.order_no) = 'IHF'))
   AND ifsapp.invoice_api.get_invoice_date(m.company, m.identity,'CUSTOMER',m.invoice_id) <= SYSDATE
  GROUP BY m.company,m.identity,m.invoice_id,l.order_no,L.contract,L.catalog_no,m.c1,
   SALES_PART_API.Get_Catalog_Group(l.contract,l.catalog_no) ,    
   SALES_PART_API.Get_Catalog_Group_Desc(l.contract,l.catalog_no)) g WHERE G.PAZAR = 'Yurtiçi' 

---------------------------------------------------------------------------------------------------------------------------------------
UNION ALL
SELECT 'HEDEFLENEN' TUR,
       A.budget_year YIL,
       a.period DONEM,
       (CASE WHEN A.contract IN ('AZ01') THEN 'AZAK' 
              WHEN A.contract IN ('AG01','AG03') THEN 'AGIR'
               WHEN A.contract IN ('AZG1') THEN 'AZGM'
                 ELSE A.contract END) SIRKET, 
       A.cust_grup_desc PAZAR,
       A.customer_id MUSTERI_KODU,
       CUSTOMER_INFO_API.Get_Name(A.CUSTOMER_ID) MUSTERI_ACIKLAMA,
       SALES_PART_API.Get_Catalog_Group(A.contract,A.part_no) SATIS_GRUBU,    
       SALES_PART_API.Get_Catalog_Group_Desc(A.contract,A.part_no) SATIS_GRUP_ACIKLAMA,
  
       SUM(a.total_sales_c) EUR_TUTAR
  FROM IFSAPP.TRBUDGET_SALESBUDGET_OWR A
WHERE A.contract = 'AZ01'
   AND A.budget_year = '2023'
   AND A.cust_grup_desc = 'Yurtiçi' 
    
 GROUP BY A.budget_year,
          a.period,
          A.contract,
          A.customer_id,
          A.cust_grup_desc,
          SALES_PART_API.Get_Catalog_Group(A.contract,A.part_no),
          SALES_PART_API.Get_Catalog_Group_Desc(A.contract,A.part_no) 
   ) 
    PIVOT ( SUM(EUR_TUTAR)EUR_TUTAR
            for (TUR)
              IN( 'HEDEFLENEN' AS HEDEFLENEN,
                  'GERCEKLESEN' AS GERCEKLESEN ))
   )
    PIVOT ( SUM(HEDEFLENEN_EUR_TUTAR)HEDEFLENEN_EUR_TUTAR,
            SUM(GERCEKLESEN_EUR_TUTAR)GERCEKLESEN_EUR_TUTAR
            for (DONEM)
              IN( '1'  AS OCAK,
                  '2'  AS SUBAT,
                  '3'  AS MART,
                  '4'  AS NISAN,
                  '5'  AS MAYIS,
                  '6'  AS HAZIRAN,
                  '7'  AS TEMMUZ,
                  '8' AS AGUSTOS,
                  '9'  AS EYLUL,
                  '10' AS EKIM,
                  '11' AS KASIM,
                  '12' AS ARALIK )) ) 
                  GROUP BY  YIL, SIRKET, PAZAR, SATIS_GRUBU, SATIS_GRUP_ACIKLAMA
";

        $stmt = oci_parse($this->conn, $sql);
        $year = 2022;
        oci_execute($stmt);

        $data['veri'] = $stmt;
        $data['tablo'] = $stmt;

        return view('admin/pages/butce/gelir-karsilastirma-yurtici', $data);
    }

    public function gelirKarsilatirmaYd()
    {
        $sql = "SELECT  YIL,
        SIRKET,
        PAZAR,
        SATIS_GRUBU,
        SATIS_GRUP_ACIKLAMA,
        sum(OCAK_HEDEFLENEN_EUR_TUTAR) OCAK_HEDEF,
        sum(OCAK_GERCEKLESEN_EUR_TUTAR) OCAK_GERCEK,
        sum(SUBAT_HEDEFLENEN_EUR_TUTAR) SUBAT_HEDEF,
        sum(SUBAT_GERCEKLESEN_EUR_TUTAR) SUBAT_GERCEK,
        sum(MART_HEDEFLENEN_EUR_TUTAR) MART_HEDEF,
        sum(MART_GERCEKLESEN_EUR_TUTAR) MART_GERCEK,
        sum(NISAN_HEDEFLENEN_EUR_TUTAR) NISAN_HEDEF,
        sum(NISAN_GERCEKLESEN_EUR_TUTAR) NISAN_GERCEK,
        sum(MAYIS_HEDEFLENEN_EUR_TUTAR) MAYIS_HEDEF,
        sum(MAYIS_GERCEKLESEN_EUR_TUTAR) MAYIS_GERCEK,
        sum(HAZIRAN_HEDEFLENEN_EUR_TUTAR) HAZIRAN_HEDEF,
        sum(HAZIRAN_GERCEKLESEN_EUR_TUTAR) HAZIRAN_GERCEK,
        sum(TEMMUZ_HEDEFLENEN_EUR_TUTAR) TEMMUZ_HEDEF,
        sum(TEMMUZ_GERCEKLESEN_EUR_TUTAR) TEMMUZ_GERCEK,
        sum(AGUSTOS_HEDEFLENEN_EUR_TUTAR) AGUSTOS_HEDEF,
        sum(AGUSTOS_GERCEKLESEN_EUR_TUTAR) AGUSTOS_GERCEK,
        sum(EYLUL_HEDEFLENEN_EUR_TUTAR) EYLUL_HEDEF,
        sum(EYLUL_GERCEKLESEN_EUR_TUTAR) EYLUL_GERCEK,
        sum(EKIM_HEDEFLENEN_EUR_TUTAR) EKIM_HEDEF,
        sum(EKIM_GERCEKLESEN_EUR_TUTAR) EKIM_GERCEK,
        sum(KASIM_HEDEFLENEN_EUR_TUTAR) KASIM_HEDEF,
        sum(KASIM_GERCEKLESEN_EUR_TUTAR) KASIM_GERCEK,
        sum(ARALIK_HEDEFLENEN_EUR_TUTAR) ARALIK_HEDEF,
        sum(ARALIK_GERCEKLESEN_EUR_TUTAR) ARALIK_GERCEK
FROM (

SELECT * FROM (
SELECT * FROM (

SELECT G.TUR,
       G.YIL,
       G.DONEM,
       G.SIRKET,
       G.PAZAR,
       G.MUSTERI_KODU,
       CUSTOMER_INFO_API.Get_Name(G.MUSTERI_KODU) MUSTERI_ACIKLAMA,
       G.SATIS_GRUBU,
       G.SATIS_GRUP_ACIKLAMA,
       G.EUR_TUTAR
FROM (
SELECT 'GERCEKLESEN' TUR,
       AH_UTIL_API.Convert_To_Number(TO_CHAR(ifsapp.invoice_api.get_invoice_date(m.company, m.identity,'CUSTOMER',m.invoice_id),'YYYY')) YIL,
       AH_UTIL_API.Convert_To_Number(TO_CHAR(ifsapp.invoice_api.get_invoice_date(m.company, m.identity,'CUSTOMER',m.invoice_id),'MM')) DONEM,
       M.company SIRKET,
       M.identity CARI_KOD,
       (SELECT h.delivery_identity FROM ifsapp.CUSTOMER_ORDER_INV_HEAD_UIV h
         WHERE h.company = m.company and h.invoice_id = m.invoice_id) MUSTERI_KODU,
      DECODE( ifsapp.customer_order_api.Get_Order_Id(l.order_no),'IHK','Yurtdışı','IHR','Yurtdışı','IHF','Yurtdışı','AGI','Yurtdışı','Yurtiçi' )PAZAR,
      SALES_PART_API.Get_Catalog_Group(l.contract,l.catalog_no) SATIS_GRUBU,    
      SALES_PART_API.Get_Catalog_Group_Desc(l.contract,l.catalog_no) SATIS_GRUP_ACIKLAMA,
    
      ifsapp.trutil_utility_api.Get_Other_Curr_Value(m.company,ifsapp.invoice_api.get_invoice_date(m.company,m.identity,'CUSTOMER', m.invoice_id),
       ifsapp.invoice_api.Get_Curr_Code(m.company, m.identity,'CUSTOMER', m.invoice_id), 'EUR', sum(m.net_curr_amount)) EUR_TUTAR
  FROM ifsapp.customer_order_line l, ifsapp.invoice_item m
WHERE l.contract = 'AZ01'

   and m.company = l.company
   and m.c1 = l.order_no
   and m.c2 = l.line_no
   and m.c3 = l.rel_no
   and m.c5 = l.catalog_no
   and (SELECT h.objstate FROM ifsapp.CUSTOMER_ORDER_INV_HEAD_UIV h
         WHERE h.company = m.company and h.invoice_id = m.invoice_id) not IN ('Cancelled')
   and l.objstate NOT IN ('Cancelled')
   and l.catalog_no not like '%NAK%'
  and TO_CHAR(ifsapp.invoice_api.get_invoice_date(m.company, m.identity,'CUSTOMER',m.invoice_id),'YYYY') = 2023
   AND NOT  ((l.catalog_type_db=('INV')) AND (customer_order_api.Get_Order_Id(l.order_no) = 'IHF'))
   AND ifsapp.invoice_api.get_invoice_date(m.company, m.identity,'CUSTOMER',m.invoice_id) <= SYSDATE
  GROUP BY m.company,m.identity,m.invoice_id,l.order_no,L.contract,L.catalog_no,m.c1,
   SALES_PART_API.Get_Catalog_Group(l.contract,l.catalog_no) ,    
   SALES_PART_API.Get_Catalog_Group_Desc(l.contract,l.catalog_no)) g WHERE G.PAZAR = 'Yurtdışı' 

---------------------------------------------------------------------------------------------------------------------------------------
UNION ALL
SELECT 'HEDEFLENEN' TUR,
       A.budget_year YIL,
       a.period DONEM,
       (CASE WHEN A.contract IN ('AZ01') THEN 'AZAK' 
              WHEN A.contract IN ('AG01','AG03') THEN 'AGIR'
               WHEN A.contract IN ('AZG1') THEN 'AZGM'
                 ELSE A.contract END) SIRKET, 
       A.cust_grup_desc PAZAR,
       A.customer_id MUSTERI_KODU,
       CUSTOMER_INFO_API.Get_Name(A.CUSTOMER_ID) MUSTERI_ACIKLAMA,
       SALES_PART_API.Get_Catalog_Group(A.contract,A.part_no) SATIS_GRUBU,    
       SALES_PART_API.Get_Catalog_Group_Desc(A.contract,A.part_no) SATIS_GRUP_ACIKLAMA,
  
       SUM(a.total_sales_c) EUR_TUTAR
  FROM IFSAPP.TRBUDGET_SALESBUDGET_OWR A
WHERE A.contract = 'AZ01'
   AND A.budget_year = '2023'
   AND A.cust_grup_desc = 'Yurtdışı' 
    
 GROUP BY A.budget_year,
          a.period,
          A.contract,
          A.customer_id,
          A.cust_grup_desc,
          SALES_PART_API.Get_Catalog_Group(A.contract,A.part_no),
          SALES_PART_API.Get_Catalog_Group_Desc(A.contract,A.part_no) 
   ) 
    PIVOT ( SUM(EUR_TUTAR)EUR_TUTAR
            for (TUR)
              IN( 'HEDEFLENEN' AS HEDEFLENEN,
                  'GERCEKLESEN' AS GERCEKLESEN ))
   )
    PIVOT ( SUM(HEDEFLENEN_EUR_TUTAR)HEDEFLENEN_EUR_TUTAR,
            SUM(GERCEKLESEN_EUR_TUTAR)GERCEKLESEN_EUR_TUTAR
            for (DONEM)
              IN( '1'  AS OCAK,
                  '2'  AS SUBAT,
                  '3'  AS MART,
                  '4'  AS NISAN,
                  '5'  AS MAYIS,
                  '6'  AS HAZIRAN,
                  '7'  AS TEMMUZ,
                  '8' AS AGUSTOS,
                  '9'  AS EYLUL,
                  '10' AS EKIM,
                  '11' AS KASIM,
                  '12' AS ARALIK )) ) 
                  GROUP BY  YIL, SIRKET, PAZAR, SATIS_GRUBU, SATIS_GRUP_ACIKLAMA";

        $stmt = oci_parse($this->conn, $sql);
        $stmt2 = oci_parse($this->conn, $sql);
        $stmt3 = oci_parse($this->conn, $sql);
        oci_execute($stmt);
        oci_execute($stmt2);
        oci_execute($stmt3);


        $data['veri'] = $stmt;
        $data['tablo'] = $stmt2;
        $data['ozet'] = $stmt3;

        return view('admin/pages/butce/gelir-karsilastirma-yurtdisi', $data);
    }

    public function giderKarsilastirmaHesap($company = 'AZAK', $year = '2022')
    {
        $sql = "SELECT  YIL,
        SIRKET,
        HESAP,
        HESAP_ACIKLAMASI,
        sum(OCAK_HEDEF_TUTAR) OCAK_HEDEF,
        sum(OCAK_GERCEK_TUTAR) OCAK_GERCEK,
        sum(SUBAT_HEDEF_TUTAR) SUBAT_HEDEF,
        sum(SUBAT_GERCEK_TUTAR) SUBAT_GERCEK,
        sum(MART_HEDEF_TUTAR) MART_HEDEF,
        sum(MART_GERCEK_TUTAR) MART_GERCEK,
        sum(NISAN_HEDEF_TUTAR) NISAN_HEDEF,
        sum(NISAN_GERCEK_TUTAR) NISAN_GERCEK,
        sum(MAYIS_HEDEF_TUTAR) MAYIS_HEDEF,
        sum(MAYIS_GERCEK_TUTAR) MAYIS_GERCEK,
        sum(HAZIRAN_HEDEF_TUTAR) HAZIRAN_HEDEF,
        sum(HAZIRAN_GERCEK_TUTAR) HAZIRAN_GERCEK,
        sum(TEMMUZ_HEDEF_TUTAR) TEMMUZ_HEDEF,
        sum(TEMMUZ_GERCEK_TUTAR) TEMMUZ_GERCEK,
        sum(AGUSTOS_HEDEF_TUTAR) AGUSTOS_HEDEF,
        sum(AGUSTOS_GERCEK_TUTAR) AGUSTOS_GERCEK,
        sum(EYLUL_HEDEF_TUTAR) EYLUL_HEDEF,
        sum(EYLUL_GERCEK_TUTAR) EYLUL_GERCEK,
        sum(EKIM_HEDEF_TUTAR) EKIM_HEDEF,
        sum(EKIM_GERCEK_TUTAR) EKIM_GERCEK,
        sum(KASIM_HEDEF_TUTAR) KASIM_HEDEF,
        sum(KASIM_GERCEK_TUTAR) KASIM_GERCEK,
        sum(ARALIK_HEDEF_TUTAR) ARALIK_HEDEF,
        sum(ARALIK_GERCEK_TUTAR) ARALIK_GERCEK
FROM (

SELECT * FROM (
SELECT * FROM (
select 'GERCEK' TUR,
       t.company SIRKET,
       t.accounting_year YIL,
       t.accounting_period PERIYOD,
       substr(t.account,1,3) HESAP,
       (CASE WHEN substr(t.account,1,3) = 720 THEN 'DIREK_ISCILIK'
             WHEN substr(t.account,1,3) = 730 THEN 'GENEL_URETIM'
             WHEN substr(t.account,1,3) = 740 THEN 'HIZMET_GIDERLERI'
             WHEN substr(t.account,1,3) = 750 THEN 'ARGE_GIDERLERI'
             WHEN substr(t.account,1,3) = 760 THEN 'SATIS-PAZ_GIDERLERI'
             WHEN substr(t.account,1,3) = 770 THEN 'GENEL_YON_GIDERLERI'
             WHEN substr(t.account,1,3) = 780 THEN 'FINANSMAN_GIDERLERI'
               ELSE 'DIGER' END ) HESAP_ACIKLAMASI,
       nvl(t.code_b, '*') GIDER_YERI,
       IFSAPP.code_b_api.Get_Description(T.company,T.code_b) GY_ACIKLAMASI,
       nvl(t.code_c, '*') GIDER_CESIDI,
       IFSAPP.code_c_api.Get_Description(T.company,T.code_c) GC_ACIKLAMASI,
       sum(t.amount) TUTAR,
       sum(t.third_currency_amount) DOVIZ_TUTAR
  from IFSAPP.TRYPE_ALL_VOUCHER_QRY t
WHERE account in('720.01','730.01','740.01','740.99','750.01','750.99','760.01','760.99','770.01','770.99','780.01')
   and t.company = 'AZAK'
   and t.accounting_year = '2023'
   and t.accounting_period BETWEEN '1' AND '12'
   and t.voucher_type not in ('KPN','DNS')
group by t.company,
         t.accounting_year,
         t.accounting_period,
         t.account,
         t.code_b,
         t.code_c
UNION ALL
------HEDEFLENEN BUTCE-----------
select 'HEDEF' TUR,
       t.company SIRKET,
       t.budget_year YIL,
       t.budget_period PERIYOD, 
       substr(t.account,1,3) HESAP,
       (CASE WHEN substr(t.account,1,3) = 720 THEN 'DIREK_ISCILIK'
             WHEN substr(t.account,1,3) = 730 THEN 'GENEL_URETIM'
             WHEN substr(t.account,1,3) = 740 THEN 'HIZMET_GIDERLERI'
             WHEN substr(t.account,1,3) = 750 THEN 'ARGE_GIDERLERI'
             WHEN substr(t.account,1,3) = 760 THEN 'SATIS-PAZ_GIDERLERI'
             WHEN substr(t.account,1,3) = 770 THEN 'GENEL_YON_GIDERLERI'
             WHEN substr(t.account,1,3) = 780 THEN 'FINANSMAN_GIDERLERI'
               ELSE 'DIGER' END ) HESAP_ACIKLAMASI,
       nvl(t.code_b, '*') GIDER_YERI,
       IFSAPP.code_b_api.Get_Description(T.company,T.code_b) GY_ACIKLAMASI,
       nvl(t.code_c, '*') GIDER_CESIDI,
       IFSAPP.code_c_api.Get_Description(T.company,T.code_c) GC_ACIKLAMASI,
       sum(t.amount) TUTAR,
       sum(t.third_currency_amount) DOVIZ_TUTAR
FROM  IFSAPP.BUDGET_PERIOD_AMOUNT_PUB t
WHERE  t.company = 'AZAK'
  and  t.budget_year = '2023'
  and  t.budget_period BETWEEN '1' AND '12' 
group by t.company,
         t.budget_year,
         t.budget_period,
         t.account,
         t.code_b,
         t.code_c

   ) 
    PIVOT ( SUM(TUTAR)TUTAR
            for (TUR)
              IN( 'HEDEF' AS HEDEF,
                  'GERCEK' AS GERCEK ))
   )
    PIVOT ( SUM(HEDEF_TUTAR)HEDEF_TUTAR,
            SUM(GERCEK_TUTAR)GERCEK_TUTAR
            for (PERIYOD)
              IN( '1'  AS OCAK,
                  '2'  AS SUBAT,
                  '3'  AS MART,
                  '4'  AS NISAN,
                  '5'  AS MAYIS,
                  '6'  AS HAZIRAN,
                  '7'  AS TEMMUZ,
                  '8'  AS AGUSTOS,
                  '9'  AS EYLUL,
                  '10' AS EKIM,
                  '11' AS KASIM,
                  '12' AS ARALIK )) ) 
                  GROUP BY  YIL, SIRKET,HESAP,HESAP_ACIKLAMASI";

        $stmt = oci_parse($this->conn, $sql);
        oci_execute($stmt);
        $data = [
            'veri' => $stmt,
            'tablo' => $stmt,

        ];
        return view('admin/pages/butce/gider-karsilastirma-hesap', $data);


    }

    public function giderKarsilastirmaGiderYeri()
    {
        $sql = "SELECT  YIL,
        SIRKET,
        GIDER_CESIDI,
        GC_ACIKLAMASI,
        sum(OCAK_HEDEF_TUTAR) OCAK_HEDEF,
        sum(OCAK_GERCEK_TUTAR) OCAK_GERCEK,
        sum(SUBAT_HEDEF_TUTAR) SUBAT_HEDEF,
        sum(SUBAT_GERCEK_TUTAR) SUBAT_GERCEK,
        sum(MART_HEDEF_TUTAR) MART_HEDEF,
        sum(MART_GERCEK_TUTAR) MART_GERCEK,
        sum(NISAN_HEDEF_TUTAR) NISAN_HEDEF,
        sum(NISAN_GERCEK_TUTAR) NISAN_GERCEK,
        sum(MAYIS_HEDEF_TUTAR) MAYIS_HEDEF,
        sum(MAYIS_GERCEK_TUTAR) MAYIS_GERCEK,
        sum(HAZIRAN_HEDEF_TUTAR) HAZIRAN_HEDEF,
        sum(HAZIRAN_GERCEK_TUTAR) HAZIRAN_GERCEK,
        sum(TEMMUZ_HEDEF_TUTAR) TEMMUZ_HEDEF,
        sum(TEMMUZ_GERCEK_TUTAR) TEMMUZ_GERCEK,
        sum(AGUSTOS_HEDEF_TUTAR) AGUSTOS_HEDEF,
        sum(AGUSTOS_GERCEK_TUTAR) AGUSTOS_GERCEK,
        sum(EYLUL_HEDEF_TUTAR) EYLUL_HEDEF,
        sum(EYLUL_GERCEK_TUTAR) EYLUL_GERCEK,
        sum(EKIM_HEDEF_TUTAR) EKIM_HEDEF,
        sum(EKIM_GERCEK_TUTAR) EKIM_GERCEK,
        sum(KASIM_HEDEF_TUTAR) KASIM_HEDEF,
        sum(KASIM_GERCEK_TUTAR) KASIM_GERCEK,
        sum(ARALIK_HEDEF_TUTAR) ARALIK_HEDEF,
        sum(ARALIK_GERCEK_TUTAR) ARALIK_GERCEK
FROM (

SELECT * FROM (
SELECT * FROM (
select 'GERCEK' TUR,
       t.company SIRKET,
       t.accounting_year YIL,
       t.accounting_period PERIYOD,
       t.account HESAP,
       IFSAPP.account_api.Get_Description(T.company,T.account) HESAP_ACIKLAMASI,
       nvl(t.code_b, '*') GIDER_YERI,
       IFSAPP.code_b_api.Get_Description(T.company,T.code_b) GY_ACIKLAMASI,
       nvl(t.code_c, '*') GIDER_CESIDI,
       IFSAPP.code_c_api.Get_Description(T.company,T.code_c) GC_ACIKLAMASI,
       sum(t.amount) TUTAR,
       sum(t.third_currency_amount) DOVIZ_TUTAR
  from IFSAPP.TRYPE_ALL_VOUCHER_QRY t
WHERE account in('720.01','730.01','740.01','740.99','750.01','750.99','760.01','760.99','770.01','770.99','780.01')
   and t.company = 'AZAK'
   and t.accounting_year = '2023'
   and t.accounting_period BETWEEN '1' AND '12'
   and t.voucher_type not in ('KPN','DNS')
group by t.company,
         t.accounting_year,
         t.accounting_period,
         t.account,
         t.code_b,
         t.code_c
UNION ALL
------HEDEFLENEN BUTCE-----------
select 'HEDEF' TUR,
       t.company SIRKET,
       t.budget_year YIL,
       t.budget_period PERIYOD,
       t.account HESAP,
       IFSAPP.account_api.Get_Description(T.company,T.account) HESAP_ACIKLAMASI,
       nvl(t.code_b, '*') GIDER_YERI,
       IFSAPP.code_b_api.Get_Description(T.company,T.code_b) GY_ACIKLAMASI,
       nvl(t.code_c, '*') GIDER_CESIDI,
       IFSAPP.code_c_api.Get_Description(T.company,T.code_c) GC_ACIKLAMASI,
       sum(t.amount) TUTAR,
       sum(t.third_currency_amount) DOVIZ_TUTAR
FROM  IFSAPP.BUDGET_PERIOD_AMOUNT_PUB t
WHERE  t.company = 'AZAK'
  and  t.budget_year = '2023'
  and  t.budget_period BETWEEN '1' AND '12' 
group by t.company,
         t.budget_year,
         t.budget_period,
         t.account,
         t.code_b,
         t.code_c

   ) 
    PIVOT ( SUM(TUTAR)TUTAR
            for (TUR)
              IN( 'HEDEF' AS HEDEF,
                  'GERCEK' AS GERCEK ))
   )
    PIVOT ( SUM(HEDEF_TUTAR)HEDEF_TUTAR,
            SUM(GERCEK_TUTAR)GERCEK_TUTAR
            for (PERIYOD)
              IN( '1'  AS OCAK,
                  '2'  AS SUBAT,
                 '3'  AS MART,
                  '4'  AS NISAN,
                  '5'  AS MAYIS,
                  '6'  AS HAZIRAN,
                  '7'  AS TEMMUZ,
                  '81' AS AGUSTOS,
                  '9'  AS EYLUL,
                  '10' AS EKIM,
                  '11' AS KASIM,
                  '12' AS ARALIK )) ) 
                  GROUP BY  YIL, SIRKET, GIDER_CESIDI, GC_ACIKLAMASI";
        $stmt = oci_parse($this->conn, $sql);
        oci_execute($stmt);
        $data = [
            'veri' => $stmt,
            'tablo' => $stmt,

        ];
        return view('admin/pages/butce/gider-karsilastirma-gider', $data);
    }



}


