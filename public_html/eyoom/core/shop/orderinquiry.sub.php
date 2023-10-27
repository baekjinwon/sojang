<?php
/**
 * core file : /eyoom/core/shop/orderinquiry.sub.php
 */
if (!defined('_EYOOM_')) exit;

if (!defined("_ORDERINQUIRY_")) exit; // 개별 페이지 접근 불가

/**
 * 주문내역
 */
$sql = "select ifnull(b.it_id,'d') AS logs_it_id , a.*
			FROM g5_shop_order a
			LEFT JOIN g5_download_logs b
			ON a.od_id = b.od_id
          where a.mb_id = '{$member['mb_id']}'
		  GROUP BY od_id
		  order by od_id desc
          $limit ";
$result = sql_query($sql);
$list = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $uid = md5($row['od_id'].$row['od_time'].$row['od_ip']);

	switch($row['od_status']) {
		case '주문':
			$od_status = '입금확인중';
			$od_status_number = 1;
			break;
		case '입금':
			$od_status = '입금완료';
			$od_status_number = 2;
			break;
		case '준비':
			$od_status = '상품준비중';
			$od_status_number = 3;
			break;
		case '배송':
			$od_status = '상품배송';
			$od_status_number = 4;
			break;
		case '완료':
			$od_status = '완료';
			$od_status_number = 5;
			break;
		case '취소':
			$od_status = '취소';
			$od_status_number = 6;
			break;		
		default:
			// if($row['logs_it_id'] == "d"){
			// 	$od_status = '완료';
			// 	$od_status_number = 5;
			// }else{
			// 	$od_status = '주문취소';
			// 	$od_status_number = 6;
			// }
			
			break;
	}
	$sql3 = "SELECT COUNT(*) as CNT FROM g5_shop_item_use where it_id = '{$resultdata['it_id']}' and od_id = '{$row['od_id']}'";
	$useresultdata = sql_fetch($sql3);
	$list[$i]['itemusebl'] = $useresultdata['CNT'];
	$list[$i]['ct_id'] = $row['ct_id'];
	$list[$i]['od_id'] = $row['od_id'];
	$list[$i]['od_time'] = $row['od_time'];
	$list[$i]['od_cart_count'] = $row['od_cart_count'];
	$list[$i]['od_receipt_price'] = $row['od_receipt_price'];
	$list[$i]['od_misu'] = $row['od_misu'];
	$list[$i]['od_price'] = $row['od_cart_price'] + $row['od_send_cost'] + $row['od_send_cost2'];
	$list[$i]['href'] = G5_SHOP_URL.'/orderinquiryview.php?od_id='.$row['od_id'].'&amp;uid='.$uid;
	$list[$i]['od_status_number'] = $od_status_number;
	$list[$i]['od_status'] = $od_status;
}
$count = count((array)$list);

/**
 * 페이징
 */
$paging = $eb->set_paging('orderinquiry', '', $qstr);

/**
 * 이윰 테마파일 출력
 */
include_once(EYOOM_THEME_SHOP_SKIN_PATH.'/orderinquiry.sub.skin.html.php');