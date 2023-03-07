<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;


class Dashboard2 extends BaseController
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

    public function index()
    {
        $planlandi = "select count(*) say from IFSAPP.SHOP_ORD where order_code_db in( 'M', 'F', 'T') AND mro_visit_id is NULL AND ((cro_no is NULL) OR (cro_no is NOT NULL AND DISPO_ORDER_NO is NULL)) and (OBJSTATE = (select IFSAPP.SHOP_ORD_API.FINITE_STATE_ENCODE__('Planlandı' ) from dual))";
        $stmt = oci_parse($this->conn, $planlandi);


        oci_execute($stmt);



        $yayimlandi = "select count(*) say from IFSAPP.SHOP_ORD where order_code_db in( 'M', 'F', 'T') AND mro_visit_id is NULL AND ((cro_no is NULL) OR (cro_no is NOT NULL AND DISPO_ORDER_NO is NULL)) and (OBJSTATE = (select IFSAPP.SHOP_ORD_API.FINITE_STATE_ENCODE__('Yayımlandı' ) from dual))";
        $stmt2 = oci_parse($this->conn, $yayimlandi);
        oci_execute($stmt2);
        $kapatildi = "select Count(*) say from IFSAPP.SHOP_ORD where order_code_db in( 'M', 'F', 'T') AND mro_visit_id is NULL AND ((cro_no is NULL) OR (cro_no is NOT NULL AND DISPO_ORDER_NO is NULL)) and objstate = 'Closed'";
        $stmt3 = oci_parse($this->conn, $kapatildi);
        oci_execute($stmt3);

        $data = [
            'planlandi' => $stmt,
            'yayimlandi' => $stmt2,
            'kapatildi' => $stmt3,
        ];
        return view('admin/pages/dashboard2',$data);
    }

    public function countIsEmri()
    {


    }
}