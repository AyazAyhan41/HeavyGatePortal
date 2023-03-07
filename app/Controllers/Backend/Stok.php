<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Libraries\Oracle;
use Cassandra\Date;


class Stok extends BaseController
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

    public function listing()
    {
        $sql="select CONTRACT,
       PART_NO,
       IFSAPP.INVENTORY_PART_API.Get_Description(contract, part_no) STOK_ACIKLAMA,
       CONFIGURATION_ID,
       LOCATION_NO,
       C_LOCATION_NAME,
       LOT_BATCH_NO,
       SERIAL_NO,
       IFSAPP.CONDITION_CODE_MANAGER_API.Get_Condition_Code(PART_NO,
                                                            SERIAL_NO,
                                                            LOT_BATCH_NO),
       IFSAPP.Condition_Code_API.Get_Description(IFSAPP.CONDITION_CODE_MANAGER_API.Get_Condition_Code(PART_NO,
                                                                                                      SERIAL_NO,
                                                                                                      LOT_BATCH_NO)),
       ENG_CHG_LEVEL,
       WAIV_DEV_REJ_NO,
       ACTIVITY_SEQ,
       WAREHOUSE,
       BAY_NO,
       ROW_NO,
       TIER_NO,
       BIN_NO,
       ROTABLE_PART_POOL_ID,
       QTY_ONHAND,
       CATCH_QTY_ONHAND,
       IFSAPP.Inventory_Part_API.Get_User_Default_Converted_Qty(CONTRACT,
                                                                PART_NO,
                                                                QTY_ONHAND,
                                                                'REMOVE'),
       IFSAPP.Inventory_Part_API.Get_User_Default_Converted_Qty(CONTRACT,
                                                                PART_NO,
                                                                CATCH_QTY_ONHAND,
                                                                'REMOVE',
                                                                'CATCH'),
       QTY_RESERVED,
       IFSAPP.Inventory_Part_API.Get_User_Default_Converted_Qty(CONTRACT,
                                                                PART_NO,
                                                                QTY_RESERVED,
                                                                'REMOVE'),
       QTY_IN_TRANSIT,
       CATCH_QTY_IN_TRANSIT,
       IFSAPP.Inventory_Part_API.Get_User_Default_Converted_Qty(CONTRACT,
                                                                PART_NO,
                                                                QTY_IN_TRANSIT,
                                                                'REMOVE'),
       IFSAPP.Inventory_Part_API.Get_User_Default_Converted_Qty(CONTRACT,
                                                                PART_NO,
                                                                CATCH_QTY_IN_TRANSIT,
                                                                'REMOVE',
                                                                'CATCH'),
       QTY_ONHAND - QTY_RESERVED,
       IFSAPP.Inventory_Part_API.Get_Unit_Meas(CONTRACT, PART_NO),
       IFSAPP.Inventory_Part_API.Get_Enabled_Catch_Unit_Meas(CONTRACT,
                                                             PART_NO),
       IFSAPP.Inventory_Part_API.Get_User_Default_Unit_Meas(PART_NO),
       IFSAPP.Inventory_Part_API.Get_User_Default_Unit_Meas(PART_NO,
                                                            'CATCH'),
       FREEZE_FLAG_DB,
       LAST_ACTIVITY_DATE,
       LAST_COUNT_DATE,
       LOCATION_TYPE,
       RECEIPT_DATE,
       AVAILABILITY_CONTROL_ID,
       IFSAPP.PART_AVAILABILITY_CONTROL_API.Get_Description(AVAILABILITY_CONTROL_ID),
       AVG_UNIT_TRANSIT_COST,
       COUNT_VARIANCE,
       EXPIRATION_DATE,
       IFSAPP.Inventory_Part_In_Stock_API.Get_Company_Owned_Unit_Cost(CONTRACT,
                                                                      PART_NO,
                                                                      CONFIGURATION_ID,
                                                                      LOCATION_NO,
                                                                      LOT_BATCH_NO,
                                                                      SERIAL_NO,
                                                                      ENG_CHG_LEVEL,
                                                                      WAIV_DEV_REJ_NO,
                                                                      ACTIVITY_SEQ),
       (IFSAPP.Inventory_Part_In_Stock_API.Get_Company_Owned_Unit_Cost(CONTRACT,
                                                                       PART_NO,
                                                                       CONFIGURATION_ID,
                                                                       LOCATION_NO,
                                                                       LOT_BATCH_NO,
                                                                       SERIAL_NO,
                                                                       ENG_CHG_LEVEL,
                                                                       WAIV_DEV_REJ_NO,
                                                                       ACTIVITY_SEQ)) *
       QTY_ONHAND,
       IFSAPP.Company_Finance_API.Get_Currency_Code(IFSAPP.Site_API.Get_Company(CONTRACT)),
       PART_OWNERSHIP,
       NVL(OWNING_CUSTOMER_NO, OWNING_VENDOR_NO),
       IFSAPP.Inventory_Part_In_Stock_API.Get_Owner_Name(CONTRACT,
                                                         PART_NO,
                                                         CONFIGURATION_ID,
                                                         LOCATION_NO,
                                                         LOT_BATCH_NO,
                                                         SERIAL_NO,
                                                         ENG_CHG_LEVEL,
                                                         WAIV_DEV_REJ_NO,
                                                         ACTIVITY_SEQ),
       IFSAPP.CUST_PART_ACQ_VALUE_API.Get_Acquisition_Value(OWNING_CUSTOMER_NO,
                                                            PART_NO,
                                                            SERIAL_NO,
                                                            LOT_BATCH_NO),
       QTY_ONHAND *
       IFSAPP.CUST_PART_ACQ_VALUE_API.Get_Acquisition_Value(OWNING_CUSTOMER_NO,
                                                            PART_NO,
                                                            SERIAL_NO,
                                                            LOT_BATCH_NO),
       IFSAPP.CUST_PART_ACQ_VALUE_API.Get_Currency_Code(OWNING_CUSTOMER_NO,
                                                        PART_NO,
                                                        SERIAL_NO,
                                                        LOT_BATCH_NO),
       IFSAPP.PROJECT_API.Get_Program_Id(PROJECT_ID),
       IFSAPP.PROJECT_PROGRAM_API.Get_Description(IFSAPP.SITE_API.Get_Company(CONTRACT),
                                                  IFSAPP.PROJECT_API.Get_Program_Id(PROJECT_ID)),
       PROJECT_ID,
       IFSAPP.PROJECT_API.Get_Name(PROJECT_ID),
       IFSAPP.ACTIVITY_API.Get_Sub_Project_Id(ACTIVITY_SEQ),
       IFSAPP.ACTIVITY_API.Get_Sub_Project_Description(ACTIVITY_SEQ),
       IFSAPP.ACTIVITY_API.Get_Activity_No(ACTIVITY_SEQ),
       IFSAPP.ACTIVITY_API.Get_Description(ACTIVITY_SEQ),
       PART_OWNERSHIP_DB,
       LOCATION_TYPE_DB,
       OBJID,
       IFSAPP.Site_API.Get_Company(CONTRACT),
       IFSAPP.Part_Serial_Catalog_API.Get_Operational_Condition_Db(PART_NO,
                                                                   SERIAL_NO),
       IFSAPP.Part_Catalog_API.Get_Rcpt_Issue_Serial_Track_Db(PART_NO),
       C_BORU_URETIM_STANDARDI,
       C_BORU_PROFIL_ET_KALINLIK,
       C_BOY,
       C_DESENLI_KALINLIK,
       C_CAP,
       C_DESENLI_SAC,
       C_FIZIKSEL_OZELLIK,
       C_DESEN_YUKSEKLIGI,
       C_PROFIL_URETIM_STANDARDI,
       C_KALITE,
       C_PROFIL_X_EBAT,
       C_PROFIL_Y_EBAT,
       C_GENISLIK,
       C_SOGUK_PRES_DESEN_TIPI,
       C_GENISLETILMIS_SAC_TIPI,
       C_HATVE,
       C_TABAN_KALINLIK,
       C_COIL_PART_NO,
       IFSAPP.part_catalog_api.Get_Description(C_COIL_PART_NO),
       C_COIL_LOT_BATCH_NO,
       C_CERT_ID,
       C_PO_NO,
       C_HEAT_NO,
       C_LOT_BOYU,
       C_VENDOR_NO,
       IFSAPP.Supplier_API.Get_Vendor_name(C_VENDOR_NO),
       C_IS_LOT_CONNECTED,
       C_ORIGIN,
       C_CUSTOMER_ID,
       C_CUSTOMER_NAME,
       C_RESERVED_BY,
       C_RESERVATION_DATE,
       C_RESERVE_UNTIL,
       C_NOTE_TEXT
    
  from IFSAPP.INVENTORY_PART_IN_STOCK_CFV
 where (CONTRACT = 'AG01' and QTY_ONHAND - QTY_RESERVED > 10000)
";
        $stmt = oci_parse($this->conn, $sql);

        /*$site = $this->request->getGet('site');
        $yil = $this->request->getGet('yil');
        $contract = $site;
        $year = $yil;
        oci_bind_by_name($stmt, ':year', $year);
        oci_bind_by_name($stmt, ':contract', $contract);*/
        oci_execute($stmt);

        $data['veri'] = $stmt;

        return view('admin/pages/stok/liste', $data);

        oci_close($this->conn);


    }

}