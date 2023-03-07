<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;


class Dashboard extends BaseController
{

    protected $conn;

    public function __construct()
    {
        putenv("NLS_LANG=TURKISH_TURKEY.TR8MSWIN1254");
        $conn = oci_connect('IFSAPP', 'Sakura169', '(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.3.209)(PORT = 1521)))(CONNECT_DATA=(SID=PROD)))','AL32UTF8');

        $this->conn = $conn;
        error_reporting(E_ALL);
        ini_set('display_errors', '1');

    }

    public function index()
    {

        $yurtici = "SELECT *
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
        $yurtdisi = "SELECT *
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
)QQ";
        $gider = "SELECT *
FROM (
select * from ( 
select b.BUDGET_PERIOD PERIOD,
       b.COMPANY SIRKET,
       b.ACCOUNT HESAP,
       b.ACCOUNT_DESC HESAPACIKLAMA,
       sum(b.third_currency_amount) toplam_tutar
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
        $hammade = "SELECT * FROM (
SELECT 'HAMMADDE' TUR,
       A.budget_year YIL,
       a.period DONEM,
       (CASE WHEN A.contract IN ('AZ01') THEN 'AZAK' 
              WHEN A.contract IN ('AG01','AG03') THEN 'AGIR'
               WHEN A.contract IN ('AZG1') THEN 'AZGM'
                 ELSE A.contract END) SIRKET, 
       INVENTORY_PART_API.Get_Accounting_Group(A.contract,A.part_no) SATIS_GRUBU,    
       Accounting_Group_Api.Get_Description(INVENTORY_PART_API.Get_Accounting_Group(A.contract,A.part_no)) SATIS_GRUP_ACIKLAMA,
       SUM(a.TOTAL_COST_C) EUR_TUTAR
  FROM IFSAPP.TRBUDGET_PLANNED_PRODUCTION A
WHERE A.contract = 'AZ01'
   AND A.budget_year = '2023'
GROUP BY A.budget_year,
          a.period,
          A.contract,
          SALES_PART_API.Get_Catalog_Group(A.contract,A.part_no),
          SALES_PART_API.Get_Catalog_Group_Desc(A.contract,A.part_no),A.part_no)
PIVOT ( 
            SUM(EUR_TUTAR)TUTAR
            for (DONEM)
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
                  '12' AS ARALIK ))";

        $stmt = oci_parse($this->conn, $yurtici);
        $stmt2 = oci_parse($this->conn, $yurtdisi);
        $stmt3 = oci_parse($this->conn, $gider);
        $stmt4 = oci_parse($this->conn, $hammade);
        oci_execute($stmt);
        oci_execute($stmt2);
        oci_execute($stmt3);
        oci_execute($stmt4);
        $data = [
            'yurtici' => $stmt,
            'yurtdisi' => $stmt2,
            'gider' => $stmt3,
            'hammade' => $stmt4

        ];

        return view('admin/pages/dashboard',$data);


    }

    public function aktifIsEmri()
    {
        $isemri = "select count(*) from IFSAPP.SHOP_ORD where order_code_db in( 'M', 'F', 'T') AND mro_visit_id is NULL AND ((cro_no is NULL) OR (cro_no is NOT NULL AND DISPO_ORDER_NO is NULL)) and (OBJSTATE = (select IFSAPP.SHOP_ORD_API.FINITE_STATE_ENCODE__('Planlandı' ) from dual));";

        $stmt = oci_parse($this->conn, $isemri);

    }
} 

