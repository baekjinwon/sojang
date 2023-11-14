<?php
include_once('./_common.php');


 /*================================================================================
        php_writeexcel http://www.bettina-attack.de/jonny/view.php/projects/php_writeexcel/
        =================================================================================*/

        include_once(G5_LIB_PATH.'/Excel/php_writeexcel/class.writeexcel_workbook.inc.php');
        include_once(G5_LIB_PATH.'/Excel/php_writeexcel/class.writeexcel_worksheet.inc.php');

        $fname = tempnam(G5_DATA_PATH, "tmp-orderlist.xls");
        $workbook = new writeexcel_workbook($fname);
        $worksheet = $workbook->addworksheet();

        // Put Excel data
        $fr_date = isset($_REQUEST['fr_date']) ? preg_replace('/[^0-9 :_\-]/i', '', $_REQUEST['fr_date']) : '';
$to_date = isset($_REQUEST['to_date']) ? preg_replace('/[^0-9 :_\-]/i', '', $_REQUEST['to_date']) : '';
$fr_date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $fr_date);

$data = array('주문번호','서식등록일','법률서식명', '판매가격', '수수료', '다운로드건수' , '실제판매건수' );
$data = array_map('iconv_euckr', $data);

$col = 0;
foreach($data as $cell) {
    $worksheet->write(0, $col++, $cell);
}

// $sql = "SELECT sum(aa.od_send_cost) as od_send_cost
//         , SUM(od_receipt_price) as od_receipt_price
//         , SUM(od_receipt_point) as od_receipt_point
//         , SUM(od_cart_price) as od_cart_price
//         , SUM(od_cancel_price) as od_cancel_price
//         , SUM(od_misu) as od_misu
//         , SUM(orderprice) as orderprice
//         , SUM(couponprice) as couponprice
//         , aa.od_date
//         , aa.od_id
//         , aa.it_id
//         , aa.od_settle_case
//         ,(SELECT SUM(po_point) FROM g5_point where mb_id = bb.create_id and SUBSTRING(po_datetime , 1,10) = '$fr_date' AND po_rel_table = '@download') AS po_point
//         ,(SELECT COUNT(*) FROM g5_download_logs dd where dd.od_id = 'prime' and SUBSTRING(dd.create_date , 1,10) = '$fr_date' AND dd.create_id = bb.create_id) AS primecnt
//         ,(SELECT COUNT(*) FROM g5_download_logs dd where dd.od_id != 'prime' and SUBSTRING(dd.create_date , 1,10) = '$fr_date' AND dd.create_id = bb.create_id) AS normalcnt
//         , bb.create_id
//         , bb.it_name
//         , bb.it_time FROM (
//         SELECT a.od_id,
//                         SUBSTRING(od_time , 1,10) as od_date,
//                         od_send_cost,
//                         od_settle_case,
//                         od_receipt_price,
//                         od_receipt_point,
//                         od_cart_price,
//                         od_cancel_price,
//                         od_misu,
//                         (od_cart_price + od_send_cost + od_send_cost2) as orderprice,
//                         (od_cart_coupon + od_coupon + od_send_coupon) as couponprice,
                       
//                         b.it_id
//                    from g5_shop_order a
//                    LEFT JOIN g5_shop_cart b
//                    ON a.od_id = b.od_id
//                   where SUBSTRING(od_time , 1,10) = '$fr_date'
//                   and b.it_id not in ('1659019167','1672642574','1672642610','1672642648')
//                   order by od_time DESC) aa
//                  LEFT JOIN g5_shop_item bb
//                  ON aa.it_id = bb.it_id
//                  where bb.create_id = '{$member['mb_id']}'
//                  GROUP BY aa.od_date , bb.create_id , aa.od_settle_case , aa.od_id";
  //var_dump($sql);

$sql  = "select 
            od_id,
            od_name, 
            mb_id,
            SUBSTRING(od_time , 1,10) as od_date,
            od_send_cost,
            od_settle_case,
            od_receipt_price, 
            od_receipt_point,
            od_cart_price,
            od_cancel_price,
            od_misu,
            (od_cart_price + od_send_cost + od_send_cost2) as orderprice,
            (od_cart_coupon + od_coupon + od_send_coupon) as couponprice            
             ";
$sql .= " from g5_shop_order ";
$sql .= " where SUBSTRING(od_time,1,10) = '$date' ";
$sql .= " order by od_time desc ";

$result = sql_query($sql);
$save_it_id = '';

for($i=0; $row=sql_fetch_array($result); $i++)
{
    $txt2 = " select it_id from g5_shop_cart where od_id='".$row['od_id']."' ";
    $res2 = sql_query($txt2);

    for($a=0;$a<$row2=sql_fetch_array($res2);$a++){

        $it = sql_fetch("select it_id,create_id, it_name, it_time from g5_shop_item where it_id='".$row2['it_id']."'");
        
        //프리미엄상품은 제외
        if($row2['it_id'] == '1659019167' or $row2['it_id'] == '1672642574' or $row2['it_id'] == '1672642610' or $row2['it_id'] == '1672642648'  ) continue;
        
        //관리자가 아닐 경우 created_id 체크
        if($member['mb_level'] < 8){
            if($it['create_id'] != $member['mb_id']) continue;            
        }

        if ($row['mb_id'] == '') { // 비회원일 경우는 주문자로 링크
            $href = EYOOM_ADMIN_URL."/?dir=shop&amp;pid=orderlist&amp;sel_field=od_name&amp;search=".$row['od_name'];
        } else { // 회원일 경우는 회원아이디로 링크
            $href = EYOOM_ADMIN_URL."/?dir=shop&amp;pid=orderlist&amp;sel_field=mb_id&amp;search=".$row['mb_id'];
        }

        $receipt_bank = $receipt_card = $receipt_vbank = $receipt_iche = $receipt_easy = $receipt_hp = 0;
        if($row['od_settle_case'] == '무통장')
            $receipt_bank = $row['od_receipt_price'];
        if($row['od_settle_case'] == '가상계좌')
            $receipt_vbank = $row['od_receipt_price'];
        if($row['od_settle_case'] == '계좌이체')
            $receipt_iche = $row['od_receipt_price'];
        if($row['od_settle_case'] == '휴대폰')
            $receipt_hp = $row['od_receipt_price'];
        if($row['od_settle_case'] == '신용카드')
            $receipt_card = $row['od_receipt_price'];
        if(in_array($row['od_settle_case'], array('간편결제', 'KAKAOPAY', 'lpay', 'inicis_payco', 'inicis_kakaopay', '삼성페이'))) {
            $receipt_easy = $row['od_receipt_price'];
        }

        //수수료 
        $po = sql_fetch(" select SUM(po_point) as po_point from g5_point where mb_id = '".$it['create_id']."' and po_rel_action = '".$row['od_id']."' and substring(po_datetime,1,10) = '$date' and po_rel_table='@download' ");

        //프리미엄 다운로드 카운트
        $pcnt = sql_fetch(" select count(*) as cnt from g5_download_logs where od_id = 'prime' and substring(create_date,1,10) and create_id = '".$it['create_id']."' ");

        //비프리미엄 다운로드 카운트
        $ncnt = sql_fetch(" select count(*) as cnt from g5_download_logs where od_id != 'prime' and substring(create_date,1,10) and create_id = '".$it['create_id']."' ");
        


        $list[$num] = $row;
        $list[$num]['href'] = $href;
        $list[$num]['normalcnt'] = $ncnt['cnt'];
        $list[$num]['receipt_bank'] = $receipt_bank;
        $list[$num]['receipt_card'] = $receipt_card;
        $list[$num]['receipt_vbank'] = $receipt_vbank;
        $list[$num]['receipt_iche'] = $receipt_iche;
        $list[$num]['receipt_hp'] = $receipt_hp;
        $list[$num]['it_name'] = $it['it_name'];
        $list[$num]['it_time'] = $it['it_time'];
        $list[$num]['primecnt'] = $pcnt['cnt'];
        $list[$num]['normalcnt'] = $ncnt['cnt'];

        $xdate = substr($row['od_id'],0,4).'-'.substr($row['od_id'],4,2).'-'.substr($row['od_id'],6,2);
        $od_name = iconv('utf-8','euc-kr//TRANSLIT',$row['od_name']);
        $row = array_map('iconv_euckr', $row);
        $worksheet->write($i, 0, ' '.$row['od_id']);
        $worksheet->write($i ,1, $it['it_time']);
        $worksheet->write($i ,2, $it['it_name']);
        $worksheet->write($i, 3, $row['orderprice']);
        $worksheet->write($i, 4, $po['po_point']);
        $worksheet->write($i, 5, $pcnt['cnt'] + $ncnt['cnt']);
        $worksheet->write($i, 6, $ncnt['cnt']);
        

        $tot['orderprice']    += $row['orderprice'];
        $tot['ordercancel']   += $row['od_cancel_price'];
        $tot['coupon']        += $row['couponprice'];
        $tot['primecnt']      += $pcnt['cnt'];
        $tot['normalcnt']     += $ncnt['cnt'];
        $tot['po_point']      += $po['po_point'];
        $tot['receipt_bank']  += $receipt_bank;
        $tot['receipt_vbank'] += $receipt_vbank;
        $tot['receipt_iche']  += $receipt_iche;
        $tot['receipt_card']  += $receipt_card;
        $tot['receipt_easy']  += $receipt_easy;
        $tot['receipt_hp']    += $receipt_hp;
        $tot['receipt_point'] += $row['od_receipt_point'];
        $tot['misu']          += $row['od_misu'];

        $num++;
    }

    $sum['normalcnt'] += $row['normalcnt'];
    $sum['primecnt'] += $row['primecnt'];
    $sum['orderprice'] += $row['orderprice'];
    $sum['couponprice'] += $row['couponprice'];
    $sum['receipt_bank'] += $row['receipt_bank'];
    $sum['receipt_vbank'] += $row['receipt_vbank'];
    $sum['receipt_iche'] += $row['receipt_iche'];
    $sum['receipt_card'] += $row['receipt_card'];
    $sum['receipt_easy'] += $row['receipt_easy'];
    $sum['od_receipt_point'] += $row['od_receipt_point'];
    $sum['od_cancel_price'] += $row['od_cancel_price'];
    $sum['od_misu'] += $row['od_misu'];
    $sum['receipt_hp'] += $row['receipt_hp'];
    $sum['po_point'] += $row['po_point'];
}

if ($i == 0){
    $worksheet->write($i, 0, iconv('utf-8','euc-kr//TRANSLIT',"자료가 없습니다."));
}else{
    
    $worksheet->write($i, 0, iconv('utf-8','euc-kr//TRANSLIT',"합계."));
    $worksheet->write($i, 1, '-');
    $worksheet->write($i, 2, '-');
    $worksheet->write($i, 3, $tot['orderprice']);
    $worksheet->write($i, 4, $tot['po_point']);
    $worksheet->write($i, 5, $tot['primecnt'] + $tot['normalcnt']);
    $worksheet->write($i, 6, $tot['normalcnt']);

    //  echo iconv('utf-8','euc-kr','합계,-,-,-,'.$sum['orderprice'].','.$sum['couponprice'].','.$sum['receipt_bank'].','.$sum['receipt_vbank'].','.$sum['receipt_iche'].','.$sum['receipt_card'].','.$sum['receipt_easy'].','.$sum['receipt_hp'].','.$sum['od_receipt_point'].','.$sum['od_cancel_price'].','.$sum['od_misu']);
}

$workbook->close();

header("Content-Type: application/x-msexcel; name=\"orderlist-".date("ymd", time()).".xls\"");
header("Content-Disposition: inline; filename=\"orderlist-".date("ymd", time()).".xls\"");
$fh=fopen($fname, "rb");
fpassthru($fh);
unlink($fname);

exit;
?>