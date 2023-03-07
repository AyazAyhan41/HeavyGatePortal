<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Libraries\Oracle;
use Cassandra\Date;


class Personel extends BaseController
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

    public function izinListe()
    {

    }
}