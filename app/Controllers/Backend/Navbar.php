<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;


class Navbar extends BaseController
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

        $say = "select count(m.message_id)  from Common_Messages m where m.expires_on > SYSDATE";
        $message = "select  m.message MESAJ ,m.effective_from TARIH from Common_Messages m where m.expires_on > SYSDATE ";

        $stmt = oci_parse($this->conn, $say);
        $stmtm = oci_parse($this->conn, $message);

        oci_execute($stmt);
        oci_execute($stmtm);

        $data = [
            'mesaj' => $stmtm
        ];

        while ($row = oci_fetch_array($stmt, OCI_BOTH + OCI_RETURN_LOBS + OCI_RETURN_NULLS)) {
            $data['say'] = $row[0];

        }

        return $data;

    }
}