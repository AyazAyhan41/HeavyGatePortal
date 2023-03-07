<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;



class Satis extends BaseController
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

    public function acikSiparisRaporu()
    {
        $sql = "select c.contract SİTE,
       c.order_no,
       c.line_no,
       c.rel_no,
       ifsapp.customer_order_api.Get_Order_Id(c.order_no) SİPARİŞ_TÜRÜ,
       CASE
         WHEN ifsapp.customer_order_api.Get_Order_Id(c.order_no) IN
              ('BGP', 'IHK', 'IHR') THEN
          'YD'
         WHEN ifsapp.customer_order_api.Get_Order_Id(c.order_no) IN
              ('HRD', 'IZM', 'KNS', 'NO', 'TKS', 'TRS', 'TS') THEN
          'YI'
       END YIYD,
       c.customer_no,
       ifsapp.Cust_Ord_Customer_API.Get_Name(c.customer_no) MÜŞTERİ_ADI,
       CASE
         when ifsapp.inventory_part_api.Get_Accounting_Group(c.contract,
                                                             c.part_no) IN
              ('M006',
               'M007',
               'M009',
               'H013',
               'H014',
               'H007',
               'TM006',
               'TM007') THEN
          'DUZSAC'
         when ifsapp.inventory_part_api.Get_Accounting_Group(c.contract,
                                                             c.part_no) IN
              ('M001',
               'M002',
               'M003',
               'M004',
               'M005',
               'TM001',
               'TM002',
               'TM003',
               'TM004',
               'TM005') THEN
          CONCAT(CONCAT(UPPER((select d.characteristic_value_desc
                                from ifsapp.DISCRETE_CHARAC_VALUE d
                               WHERE d.characteristic_code = 'DSSC'
                                 AND d.characteristic_value =
                                     ifsapp.INVENTORY_PART_CHAR_API.Get_Attr_Value(c.contract,
                                                                                   c.part_no,
                                                                                   'DSSC'))),
                        ' '),
                 'DESENLİ SAC')
         when ifsapp.inventory_part_api.Get_Accounting_Group(c.contract,
                                                             c.part_no) IN
              ('H001', 'H002', 'H003', 'H004', 'H005', 'H006') THEN
          'RULOSAC'
         when ifsapp.inventory_part_api.Get_Accounting_Group(c.contract,
                                                             c.part_no) IN
              ('H008',
               'H009',
               'H010',
               'H011',
               'M012',
               'M013',
               'M014',
               'M015') THEN
          'DILINMISBANT'
         when ifsapp.inventory_part_api.Get_Accounting_Group(c.contract,
                                                             c.part_no) IN
              ('M010',
               'M024',
               'M025',
               'M026',
               'TM010',
               'TM024',
               'TM025',
               'TM026') THEN
          'GENISLETILMIS'
         when ifsapp.inventory_part_api.Get_Accounting_Group(c.contract,
                                                             c.part_no) IN
              ('H003',
               'H010',
               'H013',
               'M004',
               'M014',
               'M008',
               'M018',
               'M022',
               'M025',
               'TM004',
               'TM018',
               'TM022',
               'TM025') THEN
          'GALVANIZLISAC'
         when ifsapp.inventory_part_api.Get_Accounting_Group(c.contract,
                                                             c.part_no) IN
              ('M016',
               'M017',
               'M018',
               'M019',
               'TM016',
               'TM017',
               'TM018',
               'TM019',
               'M033') THEN
          'BORU'
         when ifsapp.inventory_part_api.Get_Accounting_Group(c.contract,
                                                             c.part_no) IN
              ('M020',
               'M021',
               'M022',
               'M023',
               'TM020',
               'TM021',
               'TM022',
               'TM023',
               'M029',
               'M030',
               'M031',
               'M032',
               'M034') THEN
          'PROFIL'
         else
          'DİĞER'
       end TÜR,
       
       nvl(round(c.desired_qty / 1000, 2), 0) İSTENEN_MİKTAR,
       nvl(c.buy_qty_due, 0) SATIŞ_MİKTARI,
       c.sales_unit_meas SATIŞ_ÖB,
       nvl(ROUND((c.adjusted_weight_net) / 1000, 2), 0) AĞIRLIK,
       nvl(CASE
             WHEN p.unit_meas = 'ad' THEN
              ROUND((c.qty_assigned * p.weight_net) / 1000, 2)
             WHEN p.unit_meas = 'kg' THEN
              ROUND((c.qty_assigned / 1000), 2)
           END,
           0) REZERVE_MİKTAR,
       nvl(CASE
             WHEN p.unit_meas = 'ad' THEN
              ROUND((c.qty_shipped * p.weight_net) / 1000, 2)
             WHEN p.unit_meas = 'kg' THEN
              round((c.qty_shipped / 1000), 2)
           END,
           0) qty_shipped,
       nvl(ROUND((c.adjusted_weight_net) / 1000, 2) -
           (CASE
              WHEN p.unit_meas = 'ad' THEN
               ROUND(((c.qty_assigned * p.weight_net) / 1000) +
                     ((c.qty_shipped * p.weight_net) / 1000),
                     2)
              WHEN p.unit_meas = 'kg' THEN
               ROUND((c.qty_assigned / 1000) + (c.qty_shipped / 1000), 2)
            END),
           0) Açık_Tonaj,
       nvl(ROUND((c.adjusted_weight_net) / 1000, 2) -
           (CASE
              WHEN p.unit_meas = 'ad' THEN
               ROUND((c.qty_shipped * p.weight_net) / 1000, 2)
              WHEN p.unit_meas = 'kg' THEN
               ROUND((c.qty_shipped / 1000), 2)
            END),
           0) Toplam_Açık_Tonaj,
       c.wanted_delivery_date TESLİMAT_TARİH_SAAT,
       IFSAPP.Mpccom_Ship_Via_API.Get_Description(ifsapp.customer_order_api.Get_Ship_Via_Code(c.order_no)) SEVK_ARACI_TANIMI,
       ifsapp.CUSTOMER_INFO_ADDRESS_API.Get_Country(c.customer_no,
                                                    (Select m.ship_addr_no
                                                       From ifsapp.customer_order m
                                                      where m.order_no =
                                                            c.order_no)) ÜLKE,
       case
         when ((c.wanted_delivery_date < SYSDATE) OR
              (to_number(to_char(c.wanted_delivery_date, 'MM')) =
              to_number(to_char(sysdate, 'MM')))) THEN
          to_number(to_char(sysdate, 'MM'))
         ELSE
          to_number(to_char(c.wanted_delivery_date, 'MM'))
       END Projeksiyon
  FROM ifsapp.customer_order_line c, ifsapp.inventory_part p
 WHERE p.contract(+) = c.contract
   AND p.part_no(+) = c.part_no
   AND ifsapp.customer_order_api.Get_Order_Id(c.order_no) NOT LIKE 'FSN%'
   AND c.objstate in ('Released', 'Reserved', 'PartiallyDelivered')
   AND c.ship_via_code not LIKE 'IM%'
";

        $stmt = oci_parse($this->conn, $sql);
        oci_execute($stmt);

        $data = [
            'veri' => $stmt,

        ];

        return view('admin/pages/satis/acik-siparis-raporu', $data);

        oci_close($this->conn);


    }
}