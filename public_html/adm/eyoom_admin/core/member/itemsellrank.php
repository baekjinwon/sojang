<?php
/**
 * @file    /adm/eyoom_admin/core/shopetc/itemsellrank.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "400360";

auth_check_menu($auth, $sub_menu, "r");

$fr_date = (isset($_GET['fr_date']) && preg_match("/[0-9]/", $_GET['fr_date'])) ? $_GET['fr_date'] : '';
$to_date = (isset($_GET['to_date']) && preg_match("/[0-9]/", $_GET['to_date'])) ? $_GET['to_date'] : date("Ymd", time());

/**
 * 1차 상품 분류 가져오기
 */
$fields = " ca_id, ca_name ";
$cate1 = $shop->get_goods_cate1($fields);
if (!$cate1) $cate1 = array();

$sql  = " select a.it_id,a.od_id,
                 b.*,                 
                 SUM(ct_qty) as ct_status_sum
            from {$g5['g5_shop_cart_table']} a, {$g5['g5_shop_item_table']} b ";
$sql .= " where a.it_id = b.it_id ";
$sql .= " and (b.it_id != '1659019167' and b.it_id != '1672642574') ";

if ($stx != "") {
    if ($sfl != "") {
        $sql .= " and $sfl like '%$stx%' ";
    }
    if ($save_stx != $stx)
        $page = 1;
}

if (!$to_date) $to_date = date("Ymd", time());

if ($fr_date && $to_date)
{
    $fr = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $fr_date);
    $to = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $to_date);
    $sql .= " and a.ct_time between '$fr_date 00:00:00' and '$to_date 23:59:59' ";
}


if (!$sst) {
    $sst  = "ct_status_sum";
    $sod = "desc";
}
$sql_order = "order by $sst $sod";

$sql .= " group by a.it_id
          $sql_order ";

$result = sql_query($sql);
$total_count = sql_num_rows($result);

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$rank = ($page - 1) * $rows;

$sql = $sql . " limit $from_record, $rows ";
$result = sql_query($sql);

//$qstr = 'page='.$page.'&amp;sort1='.$sort1.'&amp;sort2='.$sort2;
$qstr .= '&amp;fr_date='.$fr_date.'&amp;to_date='.$to_date;
$list = array();
for ($i=0; $row=sql_fetch_array($result); $i++)
{
    $href = shop_item_url($row['it_id']);
    $num = $rank + $i + 1;

    $list[$i] = $row;
    $list[$i]['it_name'] = preg_replace('/\r\n|\r|\n/', '', $row['it_name']);
    $list[$i]['num'] = $num;
    $list[$i]['href'] = $href;
    $list[$i]['image'] = str_replace('"', "'", get_it_image($row['it_id'], 160, 160) );

    $chk = sql_fetch("select od_time, od_receipt_time, od_cart_price, od_receipt_price, od_status from g5_shop_order where od_id='".$row['od_id']."' order by od_id desc ");

    $list[$i]['od_time'] = $chk['od_time'];
    $list[$i]['od_receipt_time'] = $chk['od_receipt_time'];
    $list[$i]['od_cart_price'] = $chk['od_cart_price'];
    $list[$i]['od_receipt_price'] = $chk['od_receipt_price'];
    $list[$i]['od_status'] = $chk['od_status'];
}

/**
 * 페이징
 */
$paging = $eb->set_paging('admin', $dir, $pid, $qstr);

/**
 * 검색버튼
 */
$frm_submit  = ' <div class="text-center margin-top-10 margin-bottom-10"> ';
$frm_submit .= ' <input type="submit" value="검색" class="btn-e btn-e-lg btn-e-dark" accesskey="s">' ;
$frm_submit .= '</div>';