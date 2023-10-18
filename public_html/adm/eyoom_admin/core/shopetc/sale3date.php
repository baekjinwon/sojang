<?php
/**
 * @file    /adm/eyoom_admin/core/shopetc/sale1date.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "400410";

auth_check_menu($auth, $sub_menu, "r");

$fr_date = isset($_REQUEST['fr_date']) ? preg_replace('/[^0-9 :_\-]/i', '', $_REQUEST['fr_date']) : '';
$to_date = isset($_REQUEST['to_date']) ? preg_replace('/[^0-9 :_\-]/i', '', $_REQUEST['to_date']) : '';

$fr_date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $fr_date);
$to_date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $to_date);

$sql = "SELECT sum(aa.od_send_cost) as od_send_cost
, SUM(od_receipt_price) as od_receipt_price
, SUM(od_receipt_point) as od_receipt_point
, SUM(od_cart_price) as od_cart_price
, SUM(od_cancel_price) as od_cancel_price
, SUM(od_misu) as od_misu
, SUM(orderprice) as orderprice
, SUM(couponprice) as couponprice
, aa.od_date
, aa.od_id
, aa.it_id
, bb.create_id 
,(SELECT SUM(po_point) FROM g5_point where mb_id = bb.create_id and SUBSTRING(po_datetime , 1,10) = aa.od_date AND po_rel_table = '@download') AS po_point
, (SELECT COUNT(*) FROM g5_download_logs dd where dd.od_id = 'prime' and SUBSTRING(dd.create_date , 1,10) = aa.od_date AND dd.create_id = bb.create_id) AS primecnt
, (SELECT COUNT(*) FROM g5_download_logs dd where dd.od_id != 'prime' and SUBSTRING(dd.create_date , 1,10) = aa.od_date  AND dd.create_id = bb.create_id) AS normalcnt
FROM (
SELECT a.od_id,
                SUBSTRING(od_time , 1,10) as od_date,
                od_send_cost,
                od_settle_case,
                od_receipt_price,
                od_receipt_point,
                od_cart_price,
                od_cancel_price,
                od_misu,
                (od_cart_price + od_send_cost + od_send_cost2) as orderprice,
                (od_cart_coupon + od_coupon + od_send_coupon) as couponprice,
                b.it_id
           from g5_shop_order a
           LEFT JOIN g5_shop_cart b
           ON a.od_id = b.od_id
          where SUBSTRING(od_time , 1,10) BETWEEN '$fr_date' AND '$to_date'
          and b.it_id not in ('1659019167','1672642574','1672642610','1672642648')
          order by od_time DESC) aa
         LEFT JOIN g5_shop_item bb
         ON aa.it_id = bb.it_id
         where bb.create_id = '{$member['mb_id']}'
         GROUP BY aa.od_date , bb.create_id , aa.od_settle_case";

$result = sql_query($sql);

$save = array('ordercount'=>0, 'orderprice'=>0, 'ordercancel'=>0, 'ordercoupon'=>0, 'receiptbank'=>0, 'receiptvbank'=>0, 'receiptiche'=>0, 'receipthp'=>0, 'receiptcard'=>0, 'receiptpoint'=>0, 'misu'=>0, 'receipteasy'=>0);
$tot = array('ordercount'=>0, 'orderprice'=>0, 'ordercancel'=>0, 'ordercoupon'=>0, 'receiptbank'=>0, 'receiptvbank'=>0, 'receiptiche'=>0, 'receipthp'=>0, 'receiptcard'=>0, 'receiptpoint'=>0, 'misu'=>0, 'receipteasy'=>0);

for ($i=0; $row=sql_fetch_array($result); $i++) {
    $date = $row['od_date'];
    $sale_data[$date."|".$i][$i] = $row;
}

if (!$sale_data) $sale_data = array();

$i=0;
$list = array();
foreach($sale_data as $od_date => $data) {
    $sale_info = get_sale_info($data);

    $list[$i]['od_date'] = explode("|",$od_date)[0];
    $list[$i]['save'] = $sale_info['save'];
    $list[$i]['count'] = $sale_info['count'];
    $i++;
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
        $save['normalcnt']          = $row['normalcnt'];

        $save['po_point']           = $row['po_point'];
        $save['create_id']           = $row['create_id'];

        $tot['ordercount']++;
        $tot['orderprice']     += $row['orderprice'];
        $tot['ordercancel']    += $row['od_cancel_price'];
        $tot['ordercoupon']    += $row['couponprice'];
        $tot['primecnt']      += $row['primecnt'];
        $tot['normalcnt']     += $row['normalcnt'];
        if($row['od_settle_case'] == '무통장')
            $tot['receiptbank']    += $row['od_receipt_price'];
        if($row['od_settle_case'] == '가상계좌')
            $tot['receiptvbank']    += $row['od_receipt_price'];
        if($row['od_settle_case'] == '계좌이체')
            $tot['receiptiche']    += $row['od_receipt_price'];
        if($row['od_settle_case'] == '휴대폰')
            $tot['receipthp']    += $row['od_receipt_price'];
        if($row['od_settle_case'] == '신용카드')
            $tot['receiptcard']    += $row['od_receipt_price'];
        $tot['receiptpoint']  += $row['od_receipt_point'];
        $tot['po_point']      += $row['po_point'];
        $tot['misu']           += $row['od_misu'];

        if(in_array($row['od_settle_case'], array('간편결제', 'KAKAOPAY', 'lpay', 'inicis_payco', 'inicis_kakaopay', '삼성페이'))) {
            $save['receipteasy'] += $row['od_receipt_price'];
            $tot['receipteasy'] += $row['od_receipt_price'];
        }
    }
    
    $output['save'] = $save;
    $output['count'] = count((array)$row_array);

    return $output;
}