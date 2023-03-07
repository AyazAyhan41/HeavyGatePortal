<?php

namespace App\Controllers\Backend\Raporlar;

use App\Controllers\BaseController;
use App\Libraries\Oracle;
use Cassandra\Date;


class Finans extends BaseController
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

    public function yillikGiderYeriAnaliz($yil = '2023')
    {

        if (is_null($yil)){
            $yil = '2023';
        }else{
            $yil = $this->request->getGet('yil');
        }



        //$yil = '2023';
        $sql = "SELECT v.accounting_year,
       v.code_b GY,
       Code_B_API.Get_Description(v.company, v.code_b) gy_tanim,
       v.code_c GC,
       Code_C_API.Get_Description(v.company, v.code_c) gc_tanim,
       --01
       sum(CASE
             WHEN v.accounting_period = 1 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay01,
       --02
       sum(CASE
             WHEN v.accounting_period = 2 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay02,
       --03
       sum(CASE
             WHEN v.accounting_period = 3 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay03,
       --04
       sum(CASE
             WHEN v.accounting_period = 4 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay04,
       --05
       sum(CASE
             WHEN v.accounting_period = 5 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay05,
       --06
       sum(CASE
             WHEN v.accounting_period = 6 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay06,
       --07
       sum(CASE
             WHEN v.accounting_period = 7 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay07,
       --08
       sum(CASE
             WHEN v.accounting_period = 8 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay08,
       --09
       sum(CASE
             WHEN v.accounting_period = 9 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay09,
       --10
       sum(CASE
             WHEN v.accounting_period = 10 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay10,
       --11
       sum(CASE
             WHEN v.accounting_period = 11 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay11,
       --12
       sum(CASE
             WHEN v.accounting_period = 12 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay12,
       --     
       sum(nvl(v.debet_amount, 0)) - sum(nvl(v.credit_amount, 0)) toplam_bakiye
  FROM ifsapp.trype_all_voucher_qry v
 WHERE v.company = 'AZAK'
   AND v.accounting_year like NVL(:yil, '2016')
   AND v.code_b = :gy
   AND v.account LIKE '7%'
 AND v.voucher_type != 'MDF'
 GROUP BY v.company, v.accounting_year, v.code_b, v.code_c";

        if ($this->request->getGet('gy') != '')
        {
            $sql = "SELECT v.accounting_year,
       v.code_b GY,
       Code_B_API.Get_Description(v.company, v.code_b) gy_tanim,
       v.code_c GC,
       Code_C_API.Get_Description(v.company, v.code_c) gc_tanim,
       --01
       sum(CASE
             WHEN v.accounting_period = 1 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay01,
       --02
       sum(CASE
             WHEN v.accounting_period = 2 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay02,
       --03
       sum(CASE
             WHEN v.accounting_period = 3 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay03,
       --04
       sum(CASE
             WHEN v.accounting_period = 4 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay04,
       --05
       sum(CASE
             WHEN v.accounting_period = 5 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay05,
       --06
       sum(CASE
             WHEN v.accounting_period = 6 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay06,
       --07
       sum(CASE
             WHEN v.accounting_period = 7 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay07,
       --08
       sum(CASE
             WHEN v.accounting_period = 8 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay08,
       --09
       sum(CASE
             WHEN v.accounting_period = 9 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay09,
       --10
       sum(CASE
             WHEN v.accounting_period = 10 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay10,
       --11
       sum(CASE
             WHEN v.accounting_period = 11 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay11,
       --12
       sum(CASE
             WHEN v.accounting_period = 12 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay12,
       --     
       sum(nvl(v.debet_amount, 0)) - sum(nvl(v.credit_amount, 0)) toplam_bakiye
  FROM ifsapp.trype_all_voucher_qry v
 WHERE v.company = 'AZAK'
   AND v.accounting_year like NVL(:yil, '2016')
   AND v.code_b = :gy
   AND v.account LIKE '7%'
 AND v.voucher_type != 'MDF'
 GROUP BY v.company, v.accounting_year, v.code_b, v.code_c";
        }else{
            $sql = "SELECT v.accounting_year,
       v.code_b GY,
       Code_B_API.Get_Description(v.company, v.code_b) gy_tanim,
       v.code_c GC,
       Code_C_API.Get_Description(v.company, v.code_c) gc_tanim,
       --01
       sum(CASE
             WHEN v.accounting_period = 1 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay01,
       --02
       sum(CASE
             WHEN v.accounting_period = 2 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay02,
       --03
       sum(CASE
             WHEN v.accounting_period = 3 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay03,
       --04
       sum(CASE
             WHEN v.accounting_period = 4 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay04,
       --05
       sum(CASE
             WHEN v.accounting_period = 5 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay05,
       --06
       sum(CASE
             WHEN v.accounting_period = 6 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay06,
       --07
       sum(CASE
             WHEN v.accounting_period = 7 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay07,
       --08
       sum(CASE
             WHEN v.accounting_period = 8 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay08,
       --09
       sum(CASE
             WHEN v.accounting_period = 9 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay09,
       --10
       sum(CASE
             WHEN v.accounting_period = 10 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay10,
       --11
       sum(CASE
             WHEN v.accounting_period = 11 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay11,
       --12
       sum(CASE
             WHEN v.accounting_period = 12 THEN
              nvl(v.debet_amount, 0) - nvl(v.credit_amount, 0)
             ELSE
              0
           END) ay12,
       --     
       sum(nvl(v.debet_amount, 0)) - sum(nvl(v.credit_amount, 0)) toplam_bakiye
  FROM ifsapp.trype_all_voucher_qry v
 WHERE v.company = 'AZAK'
   AND v.accounting_year like NVL(:yil, '2016')
   AND v.account LIKE '7%'
 GROUP BY v.company, v.accounting_year, v.code_b, v.code_c";
        }


        $gy= "select OBJID,
       OBJVERSION,
       COMPANY,
       CODE_B,
       DESCRIPTION,
       VALID_FROM,
       VALID_UNTIL,
       IFSAPP.ACCOUNTING_CODESTR_COMPL_API.Connect_To_Account(COMPANY,
                                                              'B',
                                                              CODE_B),
       TEXT,
       IFSAPP.ACCOUNTING_ATTRIBUTE_CON_API.Connect_To_Attribute(COMPANY,
                                                                'B',
                                                                CODE_B),
       CONS_COMPANY,
       CONS_CODE_PART,
       CONS_CODE_PART_VALUE,
       IFSAPP.Accounting_Code_Part_Value_API.Get_Description(CONS_COMPANY,
                                                             CONS_CODE_PART,
                                                             CONS_CODE_PART_VALUE)
  from IFSAPP.CODE_B
  where COMPANY = 'AZAK'
   and COMPANY = 'AZAK'
 order by SORT_VALUE";

        $stmt = oci_parse($this->conn, $sql);
        $stmt2 = oci_parse($this->conn, $gy);

        $year = $yil;

        if ($this->request->getGet('gy') !='')
        {
            $gyeri = $this->request->getGet('gy');
            oci_bind_by_name($stmt, ':gy', $gyeri);
        }


        oci_bind_by_name($stmt, ':yil', $year);


        oci_execute($stmt);
        oci_execute($stmt2);


        $data['veri'] = $stmt;
        $data['gy'] = $stmt2;


        return view('admin/pages/hizliraporlar/finans/yillik-gider-yeri-analiz', $data);

        oci_close($this->conn);




    }
}