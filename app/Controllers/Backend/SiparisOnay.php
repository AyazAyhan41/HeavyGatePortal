<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;



class SiparisOnay extends BaseController
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

    public function index()
    {
        $sql = "select * from ifsapp.f8qry_sa_siparis_onay a";

        $stmt = oci_parse($this->conn, $sql);
        oci_execute($stmt);

        $data['veri'] = $stmt;

        return view('admin/pages/eimza/siparis-onay', $data);
    }

}