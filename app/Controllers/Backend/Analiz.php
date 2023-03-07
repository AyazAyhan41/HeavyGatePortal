<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Libraries\Oracle;
use Cassandra\Date;


class Analiz extends BaseController
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

    public function listing()
    {
        $liste = "select objid, IDENTITY, NAME from MULTI_CUS_DETAILS_QRY where IDENTITY != 'OR%'";

        $stmt = oci_parse($this->conn, $liste);

        oci_execute($stmt);

        $data['liste'] = $stmt;


        return view('admin/pages/analiz/multi-company-listing',$data);

        oci_close($this->conn);


    }

    public function analizDetay($musteri_no = null,$sirket = null)
    {

        if (is_null($sirket)){
            $sirket = 'AGIR';
        }

        $detay = "select OBJID,
       OBJVERSION,COMPANY,
    IDENTITY,
       INVOICE_ID,
       PARTY_TYPE,
       LEDGER_ITEM_SERIES_ID,
       LEDGER_ITEM_ID,
       INSTALLMENT_ID,
       SELF_BILLING_REF,
       NCF_REFERENCE,
       ORDER_REFERENCE,
       LEDGER_ITEM_VERSION,
       IDENTITY,
       IDENTITY_NAME,
       ADV_INV,
       CORRECTION_INVOICE,
       CORRECTION_EXISTS,
       LEDGER_DATE,
       PAY_TERM_BASE_DATE,
       DUE_DATE,
       REMINDER_DATE,
       REMINDER_LEVEL,
       INTEREST_CALC_DATE,
       PAYMENT_PLAN,
       BLOCK_FOR_DIRECT_DEBITING,
       FULLY_PAID,
       IS_CANCELLED,
       REASON_CODE_EXIST,
       LEDGER_STATUS_TYPE,
       BAD_DEBT_LEVEL,
       VOUCHER_TYPE,
       VOUCHER_NO,
       CURRENCY,
       INV_AMOUNT,
       OPEN_AMOUNT,
       IFSAPP.Company_Finance_API.Get_Currency_Code(COMPANY) DOVIZ,
       INV_DOM_AMOUNT,
       OPEN_DOM_AMOUNT,
       INTEREST_CURR_AMOUNT,
       DECODE(CURRENCY,
              IFSAPP.Company_Finance_API.Get_Currency_Code(COMPANY),
              INTEREST_CURR_AMOUNT,
              DECODE(INTEREST_CURR_AMOUNT,
                     0,
                     0,
                     IFSAPP.Ledger_Transaction_API.Get_Paid_Interest_Dom_Amount(COMPANY,
                                                                                IDENTITY,
                                                                                PARTY_TYPE,
                                                                                LEDGER_ITEM_SERIES_ID,
                                                                                LEDGER_ITEM_ID,
                                                                                LEDGER_ITEM_VERSION))),
       FINE_CURR_AMOUNT,
       DECODE(CURRENCY,
              IFSAPP.Company_Finance_API.Get_Currency_Code(COMPANY),
              FINE_CURR_AMOUNT,
              DECODE(FINE_CURR_AMOUNT,
                     0,
                     0,
                     IFSAPP.Ledger_Transaction_API.Get_Paid_Fine_Dom_Amount(COMPANY,
                                                                            IDENTITY,
                                                                            PARTY_TYPE,
                                                                            LEDGER_ITEM_SERIES_ID,
                                                                            LEDGER_ITEM_ID,
                                                                            LEDGER_ITEM_VERSION))),
       MATCHING_ID,
       PAYER,
       WAY_ID,
       CASH_ACCOUNT,
       IS_NOTE,
       BRANCH,
       INVOICE_ID,
       PAYMENT_ID,
       SERIES_ID,
       IFSAPP.ON_ACCOUNT_LEDGER_ITEM_API.Get_Contract_No(COMPANY,
                                                         IDENTITY,
                                                         PARTY_TYPE_DB,
                                                         LEDGER_ITEM_SERIES_ID,
                                                         LEDGER_ITEM_ID,
                                                         LEDGER_ITEM_VERSION),
       BAD_DEBT_PROV_AMT,
       BAD_DEBT_PROV_AMT_IN_ACC,
       MEDIA_CODE,
       SEND_STATUS,
       CODE_A,
       Decode(Code_A,
              NULL,
              NULL,
              IFSAPP.Text_Field_Translation_API.Get_Text(company,
                                                         'CODEA',
                                                         Code_A)),
       INV_TYPE_DESC
  from CUST_INV_INT_FINE_ALL_QRY
 where IDENTITY = :id 
   and IDENTITY = :id
   and COMPANY = :sirket
   and (OPEN_AMOUNT != 0)
 order by COMPANY, LEDGER_DATE, LEDGER_ITEM_SERIES_ID, LEDGER_ITEM_ID ASC";

        $stmt = oci_parse($this->conn, $detay);



        oci_bind_by_name($stmt, ':id', $musteri_no);
        oci_bind_by_name($stmt, ':sirket', $sirket);


        oci_execute($stmt);

        $data['detay'] = $stmt;


        return view('admin/pages/analiz/multi-company-detay',$data);

        oci_close($this->conn);

    }

    public function tedarikciListing()
    {
        $tedarikci = "select objid, IDENTITY, NAME from MULTI_SUP_DETAILS_QRY t where t.identity != 'OR0001' AND t.identity != 'OR0002' AND t.identity != 'OR0003'";

        $stmt = oci_parse($this->conn, $tedarikci);

        oci_execute($stmt);

        $data['liste'] = $stmt;


        return view('admin/pages/analiz/multi-supplier-listing',$data);

        oci_close($this->conn);

    }
}