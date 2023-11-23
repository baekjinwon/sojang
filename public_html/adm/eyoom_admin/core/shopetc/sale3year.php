<?php
/**
 * @file    /adm/eyoom_admin/core/shopetc/sale1year.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "400410";

auth_check_menu($auth, $sub_menu, "r");

$fr_year = isset($_REQUEST['fr_year']) ? preg_replace('/[^0-9 :_\-]/i', '', $_REQUEST['fr_year']) : '';
$to_year = isset($_REQUEST['to_year']) ? preg_replace('/[^0-9 :_\-]/i', '', $_REQUEST['to_year']) : '';

// $sql = "SELECT sum(aa.od_send_cost) as od_send_cost
// , SUM(od_receipt_price) as od_receipt_price
// , SUM(od_receipt_point) as od_receipt_point
// , SUM(od_cart_price) as od_cart_price
// , SUM(od_cancel_price) as od_cancel_price
// , SUM(od_misu) as od_misu
// , SUM(orderprice) as orderprice
// , SUM(couponprice) as couponprice
// , aa.od_date
// , aa.od_id
// , aa.it_id
// , bb.create_id 
// ,(SELECT SUM(po_point) FROM g5_point where mb_id = bb.create_id and SUBSTRING(po_datetime , 1,4) = aa.od_date AND po_rel_table = '@download') AS po_point
// , (SELECT COUNT(*) FROM g5_download_logs dd where dd.od_id = 'prime' and SUBSTRING(dd.create_date , 1,4) = aa.od_date AND dd.create_id = bb.create_id) AS primecnt
// , (SELECT COUNT(*) FROM g5_download_logs dd where dd.od_id != 'prime' and SUBSTRING(dd.create_date , 1,4) = aa.od_date  AND dd.create_id = bb.create_id) AS normalcnt
// FROM (
// SELECT a.od_id,
//                 SUBSTRING(od_time , 1,4) as od_date,
//                 od_send_cost,
//                 od_settle_case,
//                 od_receipt_price,
//                 od_receipt_point,
//                 od_cart_price,
//                 od_cancel_price,
//                 od_misu,
//                 (od_cart_price + od_send_cost + od_send_cost2) as orderprice,
//                 (od_cart_coupon + od_coupon + od_send_coupon) as couponprice,
//                 b.it_id
//            from g5_shop_order a
//            LEFT JOIN g5_shop_cart b
//            ON a.od_id = b.od_id
//           where SUBSTRING(od_time , 1,4) BETWEEN '$fr_year' AND '$to_year'
//           and b.it_id not in ('1659019167','1672642574','1672642610','1672642648')
//           order by od_time DESC) aa
//          LEFT JOIN g5_shop_item bb
//          ON aa.it_id = bb.it_id
//          where bb.create_id = '{$member['mb_id']}'
//          GROUP BY aa.od_date , bb.create_id , aa.od_settle_case
//          ORDER BY create_id , od_date";

$sql  = "select 
            od_id,
            od_name, 
            mb_id,
            SUBSTRING(od_time , 1, 4) as od_date,
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
$sql .= " where SUBSTRING(od_time , 1, 4) BETWEEN '$fr_year' AND '$to_year' ";
$sql .= " order by od_time desc ";
 $result = sql_query($sql);

$save = array('ordercount'=>0, 'orderprice'=>0, 'ordercancel'=>0, 'ordercoupon'=>0, 'receiptbank'=>0, 'receiptvbank'=>0, 'receiptiche'=>0, 'receipthp'=>0, 'receiptcard'=>0, 'receiptpoint'=>0, 'misu'=>0, 'receipteasy'=>0);
$tot = array('ordercount'=>0, 'orderprice'=>0, 'ordercancel'=>0, 'ordercoupon'=>0, 'receiptbank'=>0, 'receiptvbank'=>0, 'receiptiche'=>0, 'receipthp'=>0, 'receiptcard'=>0, 'receiptpoint'=>0, 'misu'=>0, 'receipteasy'=>0);

$i=0;
$list = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {
    
    $date = substr($row['od_date'],0,4);


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

    }

    if( !preg_match("/".$date."/",$chk_pcnt) ) {

        //수수료 
        //mb_id = '".$it['create_id']."' and
        $po = sql_fetch(" select SUM(po_point) as po_point from g5_point where po_rel_action = '".$row['od_id']."' and po_datetime regexp '$date' and po_rel_table='@download' ");

        //프리미엄 다운로드 카운트
        $pcnt = sql_fetch(" select count(*) as cnt from g5_download_logs where od_id = 'prime' and create_date regexp '$date' and create_id = '".$it['create_id']."' ");

        //비프리미엄 다운로드 카운트
        $ncnt = sql_fetch(" select count(*) as cnt from g5_download_logs where od_id != 'prime' and create_date regexp '$date' and create_id = '".$it['create_id']."' ");
        
        $list[$date]['downcnt'] += $pcnt['cnt'] + $ncnt['cnt'];
        $list[$date]['po_point'] += $po['po_point'];
        $tot['downcnt'] += $list[$date]['downcnt'];
        $tot['po_point'] += $list[$date]['po_point'];

        $chk_pcnt .= "|$date";
    }
    

    if($row['orderprice'] > 0){ 
        $list[$date]['normalcnt']++;  
        $tot['normalcnt']++;
    }         

    $list[$date]['orderprice'] += $row['orderprice'];
    $tot['orderprice'] += $row['orderprice'];  
    
}
$cnt = count((array)$list);

function get_sale_info($row_array) {
    global $tot;
    foreach($row_array as $k => $row) {
        $save['orderprice']    += $row['orderprice'];
        $save['ordercancel']   += $row['od_cancel_price'];
        $save['ordercoupon']   += $row['couponprice'];
        if($row['od_settle_case'] == '무통장')
            $save['receiptbank']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '가상계좌')
            $save['receiptvbank']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '계좌이체')
            $save['receiptiche']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '휴대폰')
            $save['receipthp']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '신용카드')
            $save['receiptcard']   += $row['od_receipt_price'];
        $save['receiptpoint']  += $row['od_receipt_point'];
        $save['misu']          += $row['od_misu'];
        $save['primecnt']          = $row['primecnt'];
        $save['normalcnt']         = $row['normalcnt'];
        $save['po_point'] = $row['po_point'];
        $save['create_id'] = $row['create_id'];
        
        $tot['ordercount']++;
        $tot['orderprice']    += $row['orderprice'];
        $tot['primecnt']      = $row['primecnt'];
        $tot['normalcnt']     = $row['normalcnt'];
        $tot['ordercancel']   += $row['od_cancel_price'];
        $tot['ordercoupon']   += $row['couponprice'];
        if($row['od_settle_case'] == '무통장')
            $tot['receiptbank']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '가상계좌')
            $tot['receiptvbank']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '계좌이체')
            $tot['receiptiche']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '휴대폰')
            $tot['receipthp']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '신용카드')
            $tot['receiptcard']   += $row['od_receipt_price'];
        $tot['receiptpoint']  += $row['od_receipt_point'];
        $tot['misu']          += $row['od_misu'];
        $tot['po_point'] +=  $row['po_point'];

        if(in_array($row['od_settle_case'], array('간편결제', 'KAKAOPAY', 'lpay', 'inicis_payco', 'inicis_kakaopay', '삼성페이'))) {
            $save['receipteasy'] += $row['od_receipt_price'];
            $tot['receipteasy'] += $row['od_receipt_price'];
        }
    }

    $output['save'] = $save;
    $output['count'] = count((array)$row_array);

    return $output;
}