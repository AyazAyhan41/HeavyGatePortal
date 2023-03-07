<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;



class Rapor extends BaseController
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

    public function gunlukSatisUsd()
    {
        $sql = "SELECT
        NVL(SITE,'TOPLAM') SITE,
        NVL(SIPARIS_TURU,'TOPLAM') SIPARIS_TURU,
        ROUND(SUM(YILLIK_FATURA_USD_TUTAR),0)     YIL_FAT_TUTAR,
        ROUND(SUM(YILLIK_SIPARIS_USD_TUTAR),0)    YIL_SIP_TUTAR,
        ROUND(SUM(YILLIK_FATURA_KG_SATIS),0)      YIL_FAT_KG,
        ROUND(SUM(YILLIK_SIPARIS_KG_SATIS),0)     YIL_SIP_KG,
        ROUND(SUM(AYLIK_FATURA_USD_TUTAR),0)     AY_FAT_TUTAR,
        ROUND(SUM(AYLIK_SIPARIS_USD_TUTAR),0)    AY_SIP_TUTAR,
        ROUND(SUM(AYLIK_FATURA_KG_SATIS),0)      AY_FAT_KG,
        ROUND(SUM(AYLIK_SIPARIS_KG_SATIS),0)     AY_SIP_KG,
        ROUND(SUM(GUNLUK_FATURA_USD_TUTAR),0)    GUN_FAT_TUTAR,
        ROUND(SUM(GUNLUK_SIPARIS_USD_TUTAR),0)   GUN_SIP_TUTAR,
        ROUND(SUM(GUNLUK_FATURA_KG_SATIS),0)     GUN_FAT_KG,
        ROUND(SUM(GUNLUK_SIPARIS_KG_SATIS),0)    GUN_SIP_KG

 FROM (
select  *
FROM (
SELECT V.SITE,
       v.siparis_turu,
       V.TUR,
       sum(v.kg_satis)  KG_SATIS,
       sum(V.USD_TUTAR) USD_TUTAR
FROM
(

SELECT 'GUNLUK_FATURA' TUR,
       L.contract SITE,
       m.c1 SIPARIS_NO,
      ((CASE WHEN CUSTOMER_ORDER_API.Get_Order_Id(L.order_no) IN ('IHR','AGI','IHK') THEN 'Yurtdisi Satis' else 'Yurtici Satis' END)
      ||'-'||CUSTOMER_ORDER_API.Get_Order_Id(L.order_no)) SIPARIS_TURU,
     decode(NVL(ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no,'FIZOZ'),'DIGER'),'HR',
       case WHEN L.part_no like 'T14-%' THEN 'LEVHA'
            WHEN L.part_no like 'T14C-00001' THEN 'COBBLE'
            WHEN L.part_no like 'T14C-00002' THEN 'SHORT PLATE'
            ELSE 'HR' END,'DIGER',
       case WHEN L.part_no like 'T10%' THEN 'HR'
            WHEN L.part_no like '2KALITELEVHASAC' THEN '2.KALITE LEVHA'
            ELSE 'DIGER' END,
            ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no, 'FIZOZ')) ENV_TURU,
      ( CASE WHEN M.C7 = 'kg' THEN M.N2
       WHEN(M.C7 = 'ad' AND M.c8 = 'kg') THEN M.N2*M.n3
       WHEN ((m.c7||m.c8) not like ('kg')) AND (INVENTORY_PART_API.Get_Catch_Unit_Meas('AG01',SALES_PART_API.Get_Part_No('AG01',M.c5)) = 'kg') and (m.c7 = 'ad') THEN
         INVENTORY_PART_API.Get_Weight_Net('AG01',SALES_PART_API.Get_Part_No('AG01',M.c5)) * m.n2
       END ) KG_SATIS,
      SUM(ifsapp.trutil_utility_api.Get_Other_Curr_Value(m.company,to_date(h.invoice_date,'DD.MM.YYYY'),
       ifsapp.invoice_api.Get_Curr_Code(m.company, m.identity,'CUSTOMER', m.invoice_id), 'USD', (m.net_curr_amount))) USD_TUTAR

  FROM ifsapp.customer_order_line l, ifsapp.invoice_item m ,CUSTOMER_ORDER_INV_HEAD_UIV h
 WHERE l.contract IN ('AG01','AG03')
   and m.company = h.company
   and m.invoice_id = h.invoice_id
   and m.invoice_type = h.invoice_type
   and m.company = l.company
   and m.c1 = l.order_no
   and m.c2 = l.line_no
   and m.c3 = l.rel_no
   and m.c5 = l.catalog_no
   and h.objstate not IN ('Cancelled')
   and l.objstate NOT IN ('Cancelled')
   and SALES_PART_API.Get_Catalog_Type_Db('AG01',M.c5) = 'INV'
   AND L.part_ownership_db = 'COMPANY OWNED'
   AND  TO_DATE(h.invoice_date,'DD.MM.YYYY') = to_date(sysdate-1,'DD.MM.YYYY')

 Group by m.company, m.identity, m.invoice_id,l.catalog_no,
          l.order_no,l.order_no,INVENTORY_PART_API.Get_Accounting_Group(L.contract,L.catalog_no),
          decode(NVL(ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no,'FIZOZ'),'DIGER'),'HR',
       case WHEN L.part_no like 'T14-%' THEN 'LEVHA'
            WHEN L.part_no like 'T14C-00001' THEN 'COBBLE'
            WHEN L.part_no like 'T14C-00002' THEN 'SHORT PLATE'
            ELSE 'HR' END,'DIGER',
       case WHEN L.part_no like 'T10%' THEN 'HR'
            WHEN L.part_no like '2KALITELEVHASAC' THEN '2.KALITE LEVHA'
            ELSE 'DIGER' END,
            ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no, 'FIZOZ')),m.c1,
            M.C7,M.c8,M.N2,M.n3 ,M.c5,L.contract

UNION ALL
SELECT 'AYLIK_FATURA' TUR,
       L.contract SITE,
       m.c1 SIPARIS_NO,
      ((CASE WHEN CUSTOMER_ORDER_API.Get_Order_Id(L.order_no) IN ('IHR','AGI','IHK') THEN 'Yurtdisi Satis' else 'Yurtici Satis' END)
      ||'-'||CUSTOMER_ORDER_API.Get_Order_Id(L.order_no)) SIPARIS_TURU,
     decode(NVL(ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no,'FIZOZ'),'DIGER'),'HR',
       case WHEN L.part_no like 'T14-%' THEN 'LEVHA'
            WHEN L.part_no like 'T14C-00001' THEN 'COBBLE'
            WHEN L.part_no like 'T14C-00002' THEN 'SHORT PLATE'
            ELSE 'HR' END,'DIGER',
       case WHEN L.part_no like 'T10%' THEN 'HR'
            WHEN L.part_no like '2KALITELEVHASAC' THEN '2.KALITE LEVHA'
            ELSE 'DIGER' END,
            ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no, 'FIZOZ'))ENV_TURU,
      SUM( CASE WHEN M.C7 = 'kg' THEN M.N2
       WHEN(M.C7 = 'ad' AND M.c8 = 'kg') THEN M.N2*M.n3
       WHEN ((m.c7||m.c8) not like ('kg')) AND (INVENTORY_PART_API.Get_Catch_Unit_Meas('AG01',SALES_PART_API.Get_Part_No('AG01',M.c5)) = 'kg') and (m.c7 = 'ad') THEN
         INVENTORY_PART_API.Get_Weight_Net('AG01',SALES_PART_API.Get_Part_No('AG01',M.c5)) * m.n2
       END ) KG_SATIS,
      SUM(ifsapp.trutil_utility_api.Get_Other_Curr_Value(m.company,to_date(h.invoice_date,'DD.MM.YYYY'),
       ifsapp.invoice_api.Get_Curr_Code(m.company, m.identity,'CUSTOMER', m.invoice_id), 'USD', (m.net_curr_amount))) USD_TUTAR
  FROM ifsapp.customer_order_line l, ifsapp.invoice_item m ,CUSTOMER_ORDER_INV_HEAD_UIV h
 WHERE l.contract IN ('AG01','AG03')
   and m.company = h.company
   and m.invoice_id = h.invoice_id
   and m.invoice_type = h.invoice_type
   and m.company = l.company
   and m.c1 = l.order_no
   and m.c2 = l.line_no
   and m.c3 = l.rel_no
   and m.c5 = l.catalog_no
   and h.objstate not IN ('Cancelled')
   and l.objstate NOT IN ('Cancelled')
   and SALES_PART_API.Get_Catalog_Type_Db('AG01',M.c5) = 'INV'
   AND L.part_ownership_db = 'COMPANY OWNED'
   and to_date(H.invoice_date,'DD.MM.YYYY') BETWEEN to_date('01' || to_char(sysdate, 'MM')||to_char(sysdate, 'YYYY'),'DDMMYYYY') AND last_day(sysdate)

 Group by m.company, m.identity, m.invoice_id,l.catalog_no,
          l.order_no,l.order_no,INVENTORY_PART_API.Get_Accounting_Group(L.contract,L.catalog_no),
          decode(NVL(ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no,'FIZOZ'),'DIGER'),'HR',
       case WHEN L.part_no like 'T14-%' THEN 'LEVHA'
            WHEN L.part_no like 'T14C-00001' THEN 'COBBLE'
            WHEN L.part_no like 'T14C-00002' THEN 'SHORT PLATE'
            ELSE 'HR' END,'DIGER',
       case WHEN L.part_no like 'T10%' THEN 'HR'
            WHEN L.part_no like '2KALITELEVHASAC' THEN '2.KALITE LEVHA'
            ELSE 'DIGER' END,
            ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no, 'FIZOZ')),m.c1,
            M.C7,M.c8,M.N2,M.n3 ,M.c5,L.contract

UNION ALL
SELECT 'YILLIK_FATURA' TUR,
       L.contract SITE,
       m.c1 SIPARIS_NO,
      ((CASE WHEN CUSTOMER_ORDER_API.Get_Order_Id(L.order_no) IN ('IHR','AGI','IHK') THEN 'Yurtdisi Satis' else 'Yurtici Satis' END)
      ||'-'||CUSTOMER_ORDER_API.Get_Order_Id(L.order_no)) SIPARIS_TURU,
     decode(NVL(ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no,'FIZOZ'),'DIGER'),'HR',
       case WHEN L.part_no like 'T14-%' THEN 'LEVHA'
            WHEN L.part_no like 'T14C-00001' THEN 'COBBLE'
            WHEN L.part_no like 'T14C-00002' THEN 'SHORT PLATE'
            ELSE 'HR' END,'DIGER',
       case WHEN L.part_no like 'T10%' THEN 'HR'
            WHEN L.part_no like '2KALITELEVHASAC' THEN '2.KALITE LEVHA'
            ELSE 'DIGER' END,
            ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no, 'FIZOZ'))ENV_TURU,
      SUM( CASE WHEN M.C7 = 'kg' THEN M.N2
       WHEN(M.C7 = 'ad' AND M.c8 = 'kg') THEN M.N2*M.n3
       WHEN ((m.c7||m.c8) not like ('kg')) AND (INVENTORY_PART_API.Get_Catch_Unit_Meas('AG01',SALES_PART_API.Get_Part_No('AG01',M.c5)) = 'kg') and (m.c7 = 'ad') THEN
         INVENTORY_PART_API.Get_Weight_Net('AG01',SALES_PART_API.Get_Part_No('AG01',M.c5)) * m.n2
       END ) KG_SATIS,
      SUM(ifsapp.trutil_utility_api.Get_Other_Curr_Value(m.company,to_date(h.invoice_date,'DD.MM.YYYY'),
       ifsapp.invoice_api.Get_Curr_Code(m.company, m.identity,'CUSTOMER', m.invoice_id), 'USD', (m.net_curr_amount))) USD_TUTAR
  FROM ifsapp.customer_order_line l, ifsapp.invoice_item m ,CUSTOMER_ORDER_INV_HEAD_UIV h
 WHERE l.contract IN ('AG01','AG03')
   and m.company = h.company
   and m.invoice_id = h.invoice_id
   and m.invoice_type = h.invoice_type
   and m.company = l.company
   and m.c1 = l.order_no
   and m.c2 = l.line_no
   and m.c3 = l.rel_no
   and m.c5 = l.catalog_no
   and h.objstate not IN ('Cancelled')
   and l.objstate NOT IN ('Cancelled')
   and SALES_PART_API.Get_Catalog_Type_Db('AG01',M.c5) = 'INV'
   AND L.part_ownership_db = 'COMPANY OWNED'
   and to_date(H.invoice_date,'DD.MM.YYYY') BETWEEN to_date('01' || '01'||to_char(sysdate, 'YYYY'),'DDMMYYYY')
    AND to_date('31' || '12'||to_char(sysdate, 'YYYY'),'DDMMYYYY')

 Group by m.company, m.identity, m.invoice_id,l.catalog_no,
          l.order_no,l.order_no,INVENTORY_PART_API.Get_Accounting_Group(L.contract,L.catalog_no),
          decode(NVL(ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no,'FIZOZ'),'DIGER'),'HR',
       case WHEN L.part_no like 'T14-%' THEN 'LEVHA'
            WHEN L.part_no like 'T14C-00001' THEN 'COBBLE'
            WHEN L.part_no like 'T14C-00002' THEN 'SHORT PLATE'
            ELSE 'HR' END,'DIGER',
       case WHEN L.part_no like 'T10%' THEN 'HR'
            WHEN L.part_no like '2KALITELEVHASAC' THEN '2.KALITE LEVHA'
            ELSE 'DIGER' END,
            ifsapp.inventory_part_char_api.Get_Attr_Value(L.contract, L.part_no, 'FIZOZ')),m.c1,
            M.C7,M.c8,M.N2,M.n3 ,M.c5,L.contract

UNION ALL
SELECT 'GUNLUK_SIPARIS' TUR,
       s.contract SITE,
       s.siparis_no SIPARIS_NO,
       ((CASE WHEN CUSTOMER_ORDER_API.Get_Order_Id(S.siparis_no) IN ('IHR','AGI','IHK') THEN 'Yurtdisi Satis' else 'Yurtici Satis' END)
       ||'-'||CUSTOMER_ORDER_API.Get_Order_Id(S.siparis_no)) SIPARIS_TURU,
       decode(NVL(ifsapp.inventory_part_char_api.Get_Attr_Value(S.contract,S.malz_no,'FIZOZ'),'DIGER'),'HR',
       case WHEN S.malz_no like 'T14-%' THEN 'LEVHA'
            WHEN S.malz_no like 'T14C-00001' THEN 'COBBLE'
            WHEN S.malz_no like 'T14C-00002' THEN 'SHORT PLATE'
            ELSE 'HR' END,'DIGER',
       case WHEN S.malz_no like 'T10%' THEN 'HR'
            WHEN S.malz_no like '2KALITELEVHASAC' THEN '2.KALITE LEVHA'
            ELSE 'DIGER' END,
            ifsapp.inventory_part_char_api.Get_Attr_Value(S.contract,S.malz_no, 'FIZOZ')) ENV_TURU,
       SUM(s.satis_kg) KG_SATIS,
   SUM(S.net_tutar_usd) USD_TUTAR
  FROM ifsapp.ah_satislar S
 WHERE TO_DATE(S.siparis_tarihi,'DD.MM.YYYY') = to_date(sysdate,'DD.MM.YYYY')
   AND s.contract IN('AG01','AG03')
   AND SALES_PART_API.Get_Catalog_Type_Db(S.contract,S.malz_no) = 'INV'

   AND ( SELECT A.part_ownership_db  FROM CUSTOMER_ORDER_LINE A WHERE A.order_no = S.siparis_no AND A.line_no = S.satir_no AND A.rel_no = S.yayin_no) ='COMPANY OWNED'
   AND s.baslik_durum not in 'Cancalled'
 GROUP BY S.siparis_no,S.contract,S.malz_no

UNION ALL
SELECT 'AYLIK_SIPARIS' TUR,
       s.contract SITE,
       s.siparis_no SIPARIS_NO,
       ((CASE WHEN CUSTOMER_ORDER_API.Get_Order_Id(S.siparis_no) IN ('IHR','AGI','IHK') THEN 'Yurtdisi Satis' else 'Yurtici Satis' END)
       ||'-'||CUSTOMER_ORDER_API.Get_Order_Id(S.siparis_no)) siparis_turu,
       decode(NVL(ifsapp.inventory_part_char_api.Get_Attr_Value(S.contract,S.malz_no,'FIZOZ'),'DIGER'),'HR',
       case WHEN S.malz_no like 'T14-%' THEN 'LEVHA'
            WHEN S.malz_no like 'T14C-00001' THEN 'COBBLE'
            WHEN S.malz_no like 'T14C-00002' THEN 'SHORT PLATE'
            ELSE 'HR' END,'DIGER',
       case WHEN S.malz_no like 'T10%' THEN 'HR'
            WHEN S.malz_no like '2KALITELEVHASAC' THEN '2.KALITE LEVHA'
            ELSE 'DIGER' END,
            ifsapp.inventory_part_char_api.Get_Attr_Value(S.contract,S.malz_no, 'FIZOZ')) ENV_TURU,
       SUM(s.satis_kg) KG_SATIS,
   SUM(S.net_tutar_usd) USD_TUTAR
  FROM ifsapp.ah_satislar S
 WHERE to_date(s.siparis_tarihi,'DD.MM.YYYY') BETWEEN to_date('01' || to_char(sysdate, 'MM')||to_char(sysdate, 'YYYY'),'DDMMYYYY') AND last_day(sysdate)
   AND s.contract IN('AG01','AG03')
   AND SALES_PART_API.Get_Catalog_Type_Db(S.contract,S.malz_no) = 'INV'

   AND ( SELECT A.part_ownership_db  FROM CUSTOMER_ORDER_LINE A WHERE A.order_no = S.siparis_no AND A.line_no = S.satir_no AND A.rel_no = S.yayin_no) ='COMPANY OWNED'
   AND s.baslik_durum not in 'Cancalled'
 GROUP BY S.siparis_no,S.contract,S.malz_no
 UNION ALL
SELECT 'YILLIK_SIPARIS' TUR,
       s.contract SITE,
       s.siparis_no SIPARIS_NO,
       ((CASE WHEN CUSTOMER_ORDER_API.Get_Order_Id(S.siparis_no) IN ('IHR','AGI','IHK') THEN 'Yurtdisi Satis' else 'Yurtici Satis' END)
       ||'-'||CUSTOMER_ORDER_API.Get_Order_Id(S.siparis_no)) siparis_turu,
       decode(NVL(ifsapp.inventory_part_char_api.Get_Attr_Value(S.contract,S.malz_no,'FIZOZ'),'DIGER'),'HR',
       case WHEN S.malz_no like 'T14-%' THEN 'LEVHA'
            WHEN S.malz_no like 'T14C-00001' THEN 'COBBLE'
            WHEN S.malz_no like 'T14C-00002' THEN 'SHORT PLATE'
            ELSE 'HR' END,'DIGER',
       case WHEN S.malz_no like 'T10%' THEN 'HR'
            WHEN S.malz_no like '2KALITELEVHASAC' THEN '2.KALITE LEVHA'
            ELSE 'DIGER' END,
            ifsapp.inventory_part_char_api.Get_Attr_Value(S.contract,S.malz_no, 'FIZOZ')) ENV_TURU,
       SUM(s.satis_kg) KG_SATIS,
   SUM(S.net_tutar_usd) USD_TUTAR
  FROM ifsapp.ah_satislar S
 WHERE to_date(s.siparis_tarihi,'DD.MM.YYYY') BETWEEN to_date('01' || '01'||to_char(sysdate, 'YYYY'),'DDMMYYYY')
    AND to_date('31' || '12'||to_char(sysdate, 'YYYY'),'DDMMYYYY')
   AND s.contract IN('AG01','AG03')
   AND SALES_PART_API.Get_Catalog_Type_Db(S.contract,S.malz_no) = 'INV'

   AND ( SELECT A.part_ownership_db  FROM CUSTOMER_ORDER_LINE A WHERE A.order_no = S.siparis_no AND A.line_no = S.satir_no AND A.rel_no = S.yayin_no) ='COMPANY OWNED'
   AND s.baslik_durum not in 'Cancalled'
 GROUP BY S.siparis_no,S.contract,S.malz_no

  ) V

  GROUP BY SITE,siparis_turu,TUR  )

   PIVOT ( SUM(USD_TUTAR)USD_TUTAR,
           SUM(KG_SATIS)KG_SATIS
            for (TUR)
              IN( 'GUNLUK_FATURA' AS GUNLUK_FATURA,
                   'AYLIK_FATURA' AS AYLIK_FATURA,
                   'YILLIK_FATURA' AS YILLIK_FATURA,
                   'YILLIK_SIPARIS' AS YILLIK_SIPARIS,
                    'GUNLUK_SIPARIS' AS GUNLUK_SIPARIS,
                     'AYLIK_SIPARIS' AS AYLIK_SIPARIS))
)
 group by
 GROUPING SETS ((SITE,SIPARIS_TURU),ROLLUP(SITE))
";

        $stmt = oci_parse($this->conn, $sql);

        oci_execute($stmt);

        $data = [
            'veri' => $stmt,

        ];

        return view('admin/pages/raporlar/gunluk-satis-usd', $data);

        oci_close($this->conn);
    }


    public function satisSiparisleri()
    {
        $sql = "select x.order_no siparis_no,
x.Musteri,
x.Koordinator,
x.Satis_Temsilcisi,
x.Teslim_Tarihi,
round(sum(x.tutar),2) Tutar,
x.currency_code doviz
from(select a.order_no,
CUSTOMER_INFO_API.Get_Name(a.customer_no) Musteri,
ORDER_COORDINATOR_API.Get_Name(a.authorize_code) Koordinator,
SALES_PART_SALESMAN_API.Get_Name(a.salesman_code) Satis_Temsilcisi,
a.wanted_delivery_date Teslim_Tarihi,
(b.sale_unit_price*b.buy_qty_due*(1-(b.discount/100)))+((b.sale_unit_price*b.buy_qty_due*(1-(b.discount/100)))*(STATUTORY_FEE_API.Get_Fee_Rate('AZAK',b.fee_code)*0.01)) tutar,
a.currency_code
from Customer_Order a, customer_order_line b 
where a.order_no=b.order_no
and a.objstate='Planned'
and a.contract like 'AZ%'
group by a.order_no,CUSTOMER_INFO_API.Get_Name(a.customer_no),ORDER_COORDINATOR_API.Get_Name(a.authorize_code),SALES_PART_SALESMAN_API.Get_Name(a.salesman_code),a.wanted_delivery_date,
b.buy_qty_due,b.sale_unit_price,a.currency_code,b.discount,b.fee_code) x
group by x.order_no,x.musteri,x.koordinator,x.satis_temsilcisi,x.teslim_tarihi,x.currency_code
order by x.teslim_tarihi";

        $stmt = oci_parse($this->conn, $sql);

        oci_execute($stmt);

        $data = [
            'veri' => $stmt,

        ];

        return view('admin/pages/raporlar/satis-siparisleri', $data);

        oci_close($this->conn);
    }



}