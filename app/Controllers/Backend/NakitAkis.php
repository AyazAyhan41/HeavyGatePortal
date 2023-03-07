<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Libraries\Oracle;
use Cassandra\Date;


class NakitAkis extends BaseController
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
        /* $nakit = "select d.*,
case when rownum<3 THEN
    d.'0'
    when d.BANKABAKIYE = Çıkan Bakiye Then
       d.'>'
    else
     (d.'0'+d.'1'+d.'2'+d.'3'+d.'4'+d.'5'+d.'6'+d.'7'+d.'1 Hafta'+d.'>') 
   end 'Satir Toplam',
(select to_char(trunc(sysdate+7),dd.mm.yyyy) From Dual) 'YediGünSonra',
(select to_char(trunc(sysdate+1),dd.mm.yyyy) From Dual) 'Yarin',
(select to_char(trunc(sysdate+2),dd.mm.yyyy) From Dual) 'İkiGünSonra',
(select to_char(trunc(sysdate+3),dd.mm.yyyy) From Dual) 'ÜçGünSonra',
(select to_char(trunc(sysdate+4),dd.mm.yyyy) From Dual) 'DörtGünSonra',
(select to_char(trunc(sysdate+5),dd.mm.yyyy) From Dual) 'BeşGünSonra',
(select to_char(trunc(sysdate+6),dd.mm.yyyy) From Dual) 'AltıGünSonra',
(select to_char(trunc(sysdate+14),dd.mm.yyyy) From Dual) 'OndörtGünSonra',
(select to_char(trunc(sysdate+14),dd.mm.yyyy)From Dual) 'Tarih1',
(select to_char(trunc(sysdate+30),dd.mm.yyyy)From Dual) 'Tarih2'
From (select Gb,Banka Bakiye BANKABAKIYE,round(sum(r.Nakit_Akış_Usd)/1000,0) '0',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '1',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '2', 
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '3',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '4',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '5',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '6',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5'+s.'6' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '7',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5'+s.'6'+s.'7' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '1 Hafta',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5'+s.'6'+s.'7'+s.'1 Hafta' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '>'

From (Select Bakiye Bakiye,Banka Bakiyesi Banka_Bakiyesi,
   case when q.currency_code = TL Then
        round((sum(q.amount)/(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))),0)
        when q.currency_code = USD Then
        sum(q.currency_amount)
        when q.currency_code = EUR Then
        sum(q.currency_amount)*(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,EUR,MBDS,sysdate)/ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))
        when q.currency_code = GBP Then
        sum(q.currency_amount)*(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,GBP,MBDS,sysdate)/ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))
   end Nakit_Akış_Usd,
  --(sum(q.amount)/(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))) Nakit_Akış_Usd,
  NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL
   From ifsapp.TRYPE_ALL_VOUCHER_QRY q
  where q.account like 102% and q.company<>AZAK 
  and q.voucher_no<>2019010001
  and q.voucher_date between to_date(1.1.2000,dd.mm.yyyy) and trunc(SYSDATE) - 1 / (24*60*60)
  group by q.company,q.code_d,q.account,q.currency_code) r
  group by r.Bakiye,r.Banka_Bakiyesi
union all
select NULL,Toplam,round(sum(r.Nakit_Akış_Usd)/1000,0) '0',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '1',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '2', 
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '3',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '4',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '5',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '6',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5'+s.'6' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '7',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5'+s.'6'+s.'7' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '1 Hafta',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5'+s.'6'+s.'7'+s.'1 Hafta' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '>'
From (Select Bakiye Bakiye,Banka Bakiyesi Banka_Bakiyesi,
        case when q.currency_code = TL Then
        round((sum(q.amount)/(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))),0)
        when q.currency_code = USD Then
        sum(q.currency_amount)
        when q.currency_code = EUR Then
        sum(q.currency_amount)*(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,EUR,MBDS,sysdate)/ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))
        when q.currency_code = GBP Then
        sum(q.currency_amount)*(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,GBP,MBDS,sysdate)/ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))
        end Nakit_Akış_Usd,
  --(sum(q.amount)/(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))) Nakit_Akış_Usd,
  NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL
   From ifsapp.TRYPE_ALL_VOUCHER_QRY q
  where q.account like 102% and q.company<>AZAK 
  and q.voucher_no<>2019010001
  and q.voucher_date between to_date(1.1.2000,dd.mm.yyyy) and trunc(SYSDATE) - 1 / (24*60*60)
  group by q.company,q.code_d,q.account,q.currency_code) r
  group by r.Bakiye,r.Banka_Bakiyesi
union all
(Select * From  IFSAPP.AH_NAKIT_AKIS a where a.cfa_in_out not in (Disarida,Toplam))
  UNION ALL
  select NULL,Giriş Toplam,sum('0'),sum('1'),sum('2'), 
  sum('3'),sum('4'),sum('5'),sum('6'),sum('7'),sum('1 Hafta'),sum('>')
  From ((Select * From  IFSAPP.AH_NAKIT_AKIS a where a.cfa_in_out not in (Disarida,Toplam)))
  union all
  (Select * From  IFSAPP.AH_NAKIT_AKIS a where a.cfa_in_out = Disarida)
  UNION ALL
  select NULL,Çıkış Toplam,sum('0'),sum('1'),sum('2'), 
  sum('3'),sum('4'),sum('5'),sum('6'),sum('7'),sum('1 Hafta'),sum('>')
  From (Select * From  IFSAPP.AH_NAKIT_AKIS a where a.cfa_in_out = Disarida)
  union all
  select NULL,Net Nakit Akışı,sum('0'),sum('1'),sum('2'), 
  sum('3'),sum('4'),sum('5'),sum('6'),sum('7'),sum('1 Hafta'),sum('>')
  From (select * From IFSAPP.AH_NAKIT_AKIS m where m.cfa_in_out<>Toplam)
  union all
  select NULL,Çıkan Bakiye,
  sum('0'),sum('1'),sum('2'),sum('3'),sum('4'),sum('5'),sum('6'),sum('7'),sum('1 Hafta'),sum('>') 
  From 
  (select NULL,Gelen Bakiye,round(sum(r.Nakit_Akış_Usd)/1000,0) '0',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '1',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '2', 
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '3',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '4',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '5',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '6',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5'+s.'6' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '7',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5'+s.'6'+s.'7' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '1 Hafta',
round(sum(r.Nakit_Akış_Usd)/1000,0)+(select s.'0'+s.'1'+s.'2'+s.'3'+s.'4'+s.'5'+s.'6'+s.'7'+s.'1 Hafta' From ifsapp.AH_NAKIT_AKIS s where s.cfa_in_out = Toplam) '>'
From (Select Bakiye Bakiye,Banka Bakiyesi Banka_Bakiyesi,
  case when q.currency_code = TL Then
  round((sum(q.amount)/(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))),0)
  when q.currency_code = USD Then
 sum(q.currency_amount)
  when q.currency_code = EUR Then
  sum(q.currency_amount)*(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,EUR,MBDS,sysdate)/ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))
  when q.currency_code = GBP Then
  sum(q.currency_amount)*(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,GBP,MBDS,sysdate)/ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))
  end Nakit_Akış_Usd,
  --(sum(q.amount)/(ifsapp.CURRENCY_RATE_API.Get_Currency_Rate(q.company,USD,MBDS,sysdate))) Nakit_Akış_Usd,
  NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL
   From ifsapp.TRYPE_ALL_VOUCHER_QRY q
  where q.account like 102% and q.company<>AZAK 
  and q.voucher_no<>2019010001
  and q.voucher_date between to_date(1.1.2000,dd.mm.yyyy) and trunc(SYSDATE) - 1 / (24*60*60)
  group by q.company,q.code_d,q.account,q.currency_code) r
  group by r.Bakiye,r.Banka_Bakiyesi
  union all
  select * From IFSAPP.AH_NAKIT_AKIS s where s.cfa_in_out<>Toplam)) d"; */


        return view('admin/pages/nakit/akis');
    }

    public function gelirTablosu()
    {
        $gelir = "Select p.company ŞİRKET,p.accounting_year MUHASEBE_YILI,p.accounting_period MUHASEBE_PERİYODU,
p.report_code RAPOR_KODU,
p.version_code VERSİYON_KODU,
r.row_code SATIR_KODU,
r.description TANIM,
r.left_amount SOL_TUTAR,
r.right_amount SAĞ_TUTAR,
r.calculated_amount HESAPLANMIŞ_TUTAR
From ifsapp.TRYPE_REPORT_RESULT_HEAD p,ifsapp.TRYPE_REPORT_RESULT_DET r
where p.company = r.company and p.accounting_year = r.accounting_year and p.accounting_period = r.accounting_period
and p.report_code = r.report_code
and p.company like nvl('AGIR','%')
and 
  (
         (to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
           to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+30 and substr('2022-01',6,7)='01')
          or
         (substr('2022-01',6,7)='02' and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
           to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+28)
          or
         (substr('2022-01',6,7)='03' and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
           to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+30)
          or 
         (substr('2022-01',6,7)='04' and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
           to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+29)
         or
         (substr('2022-01',6,7)='05' and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
           to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+30)
         or
         (substr('2022-01',6,7)='06' and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
          to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+29)
         or
         (substr('2022-01',6,7)='07' and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
          to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+30)
         or
         (substr('2022-01',6,7)='08' and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
         to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+30)
         or
         (substr('2022-01',6,7)='09' and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
         to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+29)
         or
         (substr('2022-01',6,7)='10' and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
         to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+30)
         or
         (substr('2022-01',6,7)='11' and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
         to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+29)
        or
         (substr('2022-01',6,7)='12' and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm') between 
         to_date('2022-01','yyyy.mm') and to_date('2022-01','yyyy.mm')+30)
         or 
         (('2022-01' is null and '2022-01' is null) and to_date(concat(concat(p.accounting_year,'-'),p.accounting_period),'yyyy.mm')
         between  to_date('1.01.2017','dd.mm.yyyy') and sysdate)
  )
and
 (
        'B'='B' and substr(p.report_code,5,1)='B'
        or
        'G'='G' and substr(p.report_code,5,1)='G'
        or
       'G' is null and substr(p.report_code,5,1) in ('B','G')

 ) ";

        $stmt = oci_parse($this->conn, $gelir);
        oci_execute($stmt);

        $data['gelirtablosu'] = $stmt;


        return view('admin/pages/nakit/gelirtablosu',$data);
    }

    public function bilanco()
    {
        $bilanco = "Select p.company           ŞİRKET,
       p.accounting_year   MUHASEBE_YILI,
       p.accounting_period MUHASEBE_PERİYODU,
       p.report_code       RAPOR_KODU,
       p.version_code      VERSİYON_KODU,
       r.row_code          SATIR_KODU,
       r.description       TANIM,
       r.left_amount       SOL_TUTAR,
       r.right_amount      SAĞ_TUTAR,
       r.calculated_amount HESAPLANMIŞ_TUTAR
  From ifsapp.TRYPE_REPORT_RESULT_HEAD p, ifsapp.TRYPE_REPORT_RESULT_DET r
 where p.company = r.company
   and p.accounting_year = r.accounting_year
   and p.accounting_period = r.accounting_period
   and p.report_code = r.report_code
   and p.company like nvl('AGIR', '%')
   and ((to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 30 and
       substr('2022-01', 6, 7) = '01') or
       (substr('2022-01', 6, 7) = '02' and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 28) or
       (substr('2022-01', 6, 7) = '03' and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 30) or
       (substr('2022-01', 6, 7) = '04' and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 29) or
       (substr('2022-01', 6, 7) = '05' and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 30) or
       (substr('2022-01', 6, 7) = '06' and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 29) or
       (substr('2022-01', 6, 7) = '07' and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 30) or
       (substr('2022-01', 6, 7) = '08' and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 30) or
       (substr('2022-01', 6, 7) = '09' and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 29) or
       (substr('2022-01', 6, 7) = '10' and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 30) or
       (substr('2022-01', 6, 7) = '11' and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 29) or
       (substr('2022-01', 6, 7) = '12' and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('2022-01', 'yyyy.mm') and
       to_date('2022-01', 'yyyy.mm') + 30) or
       (('2022-01' is null and '2022-01' is null) and
       to_date(concat(concat(p.accounting_year, '-'), p.accounting_period),
                 'yyyy.mm') between to_date('1.01.2017', 'dd.mm.yyyy') and
       sysdate))
   and ('B' = 'B' or 'G' = 'B' or
       'B' is null and substr(p.report_code, 5, 1) in ('B', 'B')
       
       )

";

        $stmt = oci_parse($this->conn, $bilanco);
        oci_execute($stmt);
        $data['bilanco'] = $stmt;


        return view('admin/pages/nakit/bilanco',$data);
    }

}