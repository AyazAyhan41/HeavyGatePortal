<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Libraries\EmailTo;
use Dompdf\Dompdf;

class Raporlar extends BaseController
{

    protected $conn;
    protected $emailTo;

    protected $session;

    public function __construct()
    {
        putenv("NLS_LANG=TURKISH_TURKEY.TR8MSWIN1254");
        $conn = oci_connect('IFSAPP', 'XckxqK7kjc', '(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.228)(PORT = 1521)))(CONNECT_DATA=(SID=TEST)))','AL32UTF8');

        $this->conn = $conn;
        $this->emailTo = new EmailTo();
        $this->session = \Config\Services::session();
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
    }

    public function gunlukKur()
    {
        $sql = "SELECT to_char(sysdate-1, 'dd.mm.yyyy') tarih,
       t.CURRENCY_TYPE tur,
       t.description tanim,
       nvl(to_char(usd.CURRENCY_RATE), 'KUR YOK') usd,
       nvl(to_char(eur.CURRENCY_RATE), 'KUR YOK') eur,
       nvl(to_char(gbp.CURRENCY_RATE), 'KUR YOK') gbp
  FROM currency_type t,
       currency_rate usd,
       currency_rate eur,
       currency_rate gbp
 WHERE t.company = 'AGIR'
   AND t.ref_currency_code = 'TL'
   AND usd.company(+) = t.company
   AND usd.currency_type(+) = t.CURRENCY_TYPE
   AND usd.currency_code(+) = 'USD'
   AND usd.valid_from(+) = TRUNC(SYSDATE)
   AND eur.company(+) = t.company
   AND eur.currency_type(+) = t.CURRENCY_TYPE
   AND eur.currency_code(+) = 'EUR'
   AND eur.valid_from(+) = TRUNC(SYSDATE)
   AND gbp.company(+) = t.company
   AND gbp.currency_type(+) = t.CURRENCY_TYPE
   AND gbp.currency_code(+) = 'GBP'
   AND gbp.valid_from(+) = TRUNC(SYSDATE)
";

        $stmt = oci_parse($this->conn, $sql);

        oci_execute($stmt);


            $data = [
            'veri' => $stmt,

        ];


        return view('admin/pages/raporlar/gunluk-kur',$data);
    }

    public function operasyonHurdalamaGunluk()
    {
        $sql = "select t.date_applied TARIH,
       T.part_no PARTNO,
       INVENTORY_PART_API.Get_Description(T.contract, T.part_no) ACIKLAMA,
       T.order_no || '-' || T.release_no || '-' || T.sequence_no IS_EMRI,
       T.transaction TUR,
       T.quantity AD,
       INVENTORY_PART_API.Get_Weight_Net(T.contract, T.part_no) *
       T.quantity KG,
       T.reject_code HURDA_KODU,
       SCRAPPING_CAUSE_API.Get_Reject_Message(T.reject_code) ACK,
       T.source HURDA_NOTU
  from IFSAPP.INVENTORY_TRANSACTION_HIST2 t
  
   ";

        $stmt = oci_parse($this->conn, $sql);

        oci_execute($stmt);

       /* while ($row = oci_fetch_array($stmt, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) {

            var_dump($row);
            die();
        }*/


            $data = [
            'veri' => $stmt,

        ];


        return view('admin/pages/raporlar/operasyon-hurdalama-gunluk',$data);
    }

    public function satiskararlilikrapor()
    {
        return view('admin/pages/raporlar/satiskararlilik');
    }


    public function envarterPlanlamaRaporu()
    {
        $epr = "select t.contract SITE,
       T.part_no STOK_KODU,
       INVENTORY_PART_API.Get_Description(T.contract,T.part_no) STOK_ACIKLAMA,
       max(T.safety_stock) EMNIYET_STOK,
       sum(r.qty_onhand) ELDEKI_MIKTAR,
       sum(r.qty_reserved) REZERVE_MIKTAR,
       sum(r.qty_onhand)-sum(r.qty_reserved) KULLANILABILIR_MIK,
       max(T.min_order_qty) MIN_LOT_BUYUKLUGU
         from INVENTORY_PART_PLANNING t , INVENTORY_PART_IN_STOCK r 
         WHERE t.contract = r.contract
           and t.part_no  = r.part_no 
           and T.contract ='AZ01' 
           and T.part_no not like ('AS%')
           and t.part_no not like ('S%') 
           and t.part_no like ('Y%')
           and INVENTORY_PART_API.Get_Part_Status(T.contract,T.part_no ) = 'A'
           group by t.contract,T.part_no,T.safety_stock";

        $stmt = oci_parse($this->conn, $epr);

        oci_execute($stmt);

       $data = [
         'veri' => $stmt
       ];

        return view('admin/pages/raporlar/envarterplanlamarapor',$data);
    }

    public function epr(){
        $epr = "select t.contract SITE,
       T.part_no STOK_KODU,
       INVENTORY_PART_API.Get_Description(T.contract,T.part_no) STOK_ACIKLAMA,
       max(T.safety_stock) EMNIYET_STOK,
       sum(r.qty_onhand) ELDEKI_MIKTAR,
       sum(r.qty_reserved) REZERVE_MIKTAR,
       sum(r.qty_onhand)-sum(r.qty_reserved) KULLANILABILIR_MIK,
       max(T.min_order_qty) MIN_LOT_BUYUKLUGU
         from INVENTORY_PART_PLANNING t , INVENTORY_PART_IN_STOCK r 
         WHERE t.contract = r.contract
           and t.part_no  = r.part_no 
           and T.contract ='AZ01' 
           and T.part_no not like ('AS%')
           and t.part_no not like ('S%') 
           and t.part_no like ('Y%')
           and INVENTORY_PART_API.Get_Part_Status(T.contract,T.part_no ) = 'A'
           group by t.contract,T.part_no,T.safety_stock";

        $stmt = oci_parse($this->conn, $epr);

        oci_execute($stmt);

        $data = [
            'veri' => $stmt
        ];

        $email  = new EmailTo();

        $mailler =  $this->session->get('userData.email');

        $send = $this->emailTo->settings()->setposta($mailler)->eprapor(view('admin/pages/raporlar/envarterplanlamarapor',$data))->send();

        if ($send) {
            $data['baslik'] = "Azak Faturalandırılmamış Sevkiyat Raporu";
            return view('admin/pages/raporlar/basarili',$data);
        }else {
            echo "hata var";
        }

    }


    public function faturalandirilmamisSevkiyatlar(){
        $epr = "SELECT B.SHIPMENT_ID SEVK_NO,
       TRUNC(IFSAPP.CUSTOMER_ORDER_DELIVERY_API.GET_SHIPMENT_DELIVERED_DATE(IFSAPP.CUSTOMER_ORDER_DELIV_NOTE_API.GET_DELNOTE_NO_FOR_SHIPMENT(B.SHIPMENT_ID))) FIILI_SEVK_TARIHI,
       TRUNC(IFSAPP.TRSHIP_DELNOTE_API.Get_Deliv_Note_Date(B.SHIPMENT_ID)) IRSALIYE_TARIHI,
       B.DELIVER_TO_CUSTOMER_NO MUSTERI_NO,
       IFSAPP.CUSTOMER_INFO_API.GET_NAME(B.DELIVER_TO_CUSTOMER_NO) MUSTERI_Adı,
       UPPER(IFSAPP.TRSHIP_DELNOTE_API.GET_OFFICIAL_INFO(B.SHIPMENT_ID)) MATBU_IRSALIYE_NO,
       substr(ifsapp.ah_shipment_util_api.Get_Shipment_Amount_Info(b.shipment_id),1,INSTR(ifsapp.ah_shipment_util_api.Get_Shipment_Amount_Info(b.shipment_id),  ' '))TUTAR_BILGISI,
       SUBSTR(ifsapp.ah_shipment_util_api.Get_Shipment_Amount_Info(b.shipment_id),INSTR(ifsapp.ah_shipment_util_api.Get_Shipment_Amount_Info(b.shipment_id),  ' ') + 1,LENGTH(ifsapp.ah_shipment_util_api.Get_Shipment_Amount_Info(b.shipment_id))) PARA_BIRIMI
       
       
  FROM IFSAPP.SHIPMENT B
WHERE B.contract = 'AZ01'
   AND B.OBJSTATE = 'Closed'
and TRUNC(IFSAPP.TRSHIP_DELNOTE_API.Get_Deliv_Note_Date(B.SHIPMENT_ID)) > to_date('01.01.2022','DD.MM.YYYY')
   and b.shipment_id not in ('100807','178843')-- MCA BOSAL METAL firması 03.09.2020 tarihinde deneme için gönderilen ürünlerin sevkiyatı Destek Talebi #2101 nolu göreve istinaden 
                               -- rapora gelmeyecektir.   
   AND (trunc(sysdate) -
       TRUNC((Select d.deliv_note_date
                From IFSAPP.TRSHIP_DELNOTE d
               where d.shipment_id = B.shipment_id))) > 5
   AND NOT EXISTS
(SELECT A.SHIPMENT_ID
          FROM ifsapp.AH_SHIPMENT_INVOICE_CON A
         WHERE A.SHIPMENT_ID = B.SHIPMENT_ID)
   AND b.shipment_id IN (SELECT so.shipment_id
                           FROM ifsapp.shipment_order_line so
                          WHERE so.shipment_id = b.shipment_id
                          AND ifsapp.customer_order_line_api.Get_Discount(so.order_no,so.line_no,so.rel_no,so.line_item_no) != 100
                          AND ifsapp.customer_order_api.Get_Order_Id(so.order_no) NOT LIKE 'FSN%'
                          GROUP BY so.shipment_id)";

        $stmt = oci_parse($this->conn, $epr);

        oci_execute($stmt);

        $data = [
            'veri' => $stmt
        ];


        $email  = new EmailTo();

        $mailler = $this->session->get('userData.email');

        $send = $this->emailTo->settings()->setposta($mailler)->faturalandirilmamissevkiyat(view('admin/pages/raporlar/azak/faturalandirilmamis-sevkiyat',$data))->send();

        if ($send) {
            $data['baslik'] = "Azak - Faturalandırılmamış Sevkiyat Raporu";
            return view('admin/pages/raporlar/basarili',$data);
        }else {
            echo "hata var";
        }

    }

    public function otuzGunUzeri(){
        $epr = "select az.site SIRKET_KODU,
       az.is_emri_no IS_EMRI_NO, 
       max(az.revised_qty_due) IS_EMRI_MIKTAR, 
       AZ.OBJSTATE, 
       AZ.STOK_KODU,
       AZ.STOK_ACIKLAMA, 
       MIN(AZ.OLUSTURMA_TARIH)OLUSTURMA_TARIH,
       MIN(AZ.ilk_tuketim) ILK_TUKETIM,
       MAX(AZ.son_uretim) SON_URETIM,
       AZ.OPERASYON OPERASYON,
       MAX(AZ.GIRIS_MIKTAR)GIRIS_MIKTAR, 
       MAX(AZ.HURDA_MIKTAR)HURDA_MIKTAR,
       MAX(AZ.CIKIS_MIKTAR)CIKIS_MIKTAR,
       ((MAX(AZ.GIRIS_MIKTAR) + MAX(AZ.HURDA_MIKTAR)) - MAX(AZ.CIKIS_MIKTAR)) FARK
from 
(
select s.contract SITE,  
       s.order_no ||'-'||s.release_no||'-'||s.sequence_no IS_EMRI_NO,
       (select  
               min(qw.operation_no||'-'||qw.operation_description) 
           from SHOP_ORDER_OPERATION qw Where qw.order_no = s.order_no and qw.release_no = s.release_no and qw.sequence_no = s.sequence_no 
           and qw.revised_qty_due + qw.qty_complete + QW.qty_scrapped > 0  
           and qw.oper_status_code_db not in '90') 
           OPERASYON,
       S.revised_qty_due,
       S.objstate,
       (DECODE(direction,'-',date_applied,to_Date('31.12.2099'))) ilk_tuketim,
       (DECODE(direction,'+',date_applied,NULL))                  son_uretim,
       s.part_no STOK_KODU,
       inventory_part_api.get_description(s.contract,s.part_no) STOK_ACIKLAMA,
       TRUNC(S.date_entered) OLUSTURMA_TARIH,
       S.qty_complete GIRIS_MIKTAR,
       ( SELECT SUM(OP.qty_scrapped) FROM SHOP_ORDER_OPERATION OP WHERE OP.order_no = S.order_no AND OP.release_no = S.release_no AND  OP.sequence_no = S.sequence_no AND OP.contract = S.contract ) HURDA_MIKTAR,
       T.qty_issued CIKIS_MIKTAR
  from SHOP_MATERIAL_ALLOC t, shop_ord s , inventory_transaction_hist2 H
 where t.contract ='AZ01' 
   and t.order_no = s.order_no
   AND T.release_no = S.release_no
   AND T.sequence_no = S.sequence_no
   and t.contract = s.contract
   AND S.objstate NOT IN ('Closed','Cancelled')
   AND H.order_no = S.order_no
   AND H.release_no = S.release_no
   AND H.sequence_no = S.sequence_no
   AND h.transaction_code IN ('OOREC','SOISS','BACFLUSH','OPFEED-SCP','SUNREC','UNOPFDSCP','UNISS')
   ) AZ  WHERE AZ.OLUSTURMA_TARIH <  TO_CHAR(SYSDATE - 30)
   GROUP BY az.site, az.is_emri_no,  AZ.OBJSTATE, AZ.STOK_KODU,AZ.STOK_ACIKLAMA,OPERASYON";

        $stmt = oci_parse($this->conn, $epr);

        oci_execute($stmt);

        $data = [
            'veri' => $stmt
        ];

        $email  = new EmailTo();

        $mailler =  $this->session->get('userData.email');

        $send = $this->emailTo->settings()->setposta($mailler)->otuzGunUzeri(view('admin/pages/raporlar/azak/30gunuzeriacikisemri',$data))->send();

        if ($send) {
            $data['baslik'] = "AZAK - OTUZ GÜN ÜZERİ AÇIK OLAN İŞ ERMİRLERİ";
            return view('admin/pages/raporlar/basarili',$data);
        }else {
            echo "hata var";
        }

    }


    public function add()
    {
        return view('admin/pages/raporlar/add');
    }




}