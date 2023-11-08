<?php
/**
 * @file    /adm/eyoom_admin/core/shopetc/itemsellrank.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "400350";

auth_check_menu($auth, $sub_menu, "r");

$fr_date = (isset($_GET['fr_date']) && preg_match("/[0-9]/", $_GET['fr_date'])) ? $_GET['fr_date'] : '';
$to_date = (isset($_GET['to_date']) && preg_match("/[0-9]/", $_GET['to_date'])) ? $_GET['to_date'] : date("Ymd", time());

$sql  = " select *, count(it_id) as cnt
            from g5_download_logs ";
$sql .= " where (1) ";
$sql .= " group by it_id ";

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
    $sst  = "cnt";
    $sod = "desc";
}
$sql_order = "order by $sst $sod";

$sql .= " $sql_order ";

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
$number = 0;
for ($i=0; $row=sql_fetch_array($result); $i++)
{
    $it = sql_fetch("select it_name, it_id from g5_shop_item where it_id='".$row['it_id']."'");
    $chk = sql_fetch("select od_time, od_receipt_time, od_cart_price, od_receipt_price, od_status from g5_shop_order where od_id='".$row['od_id']."' order by od_id desc ");
    
    if(!$it['it_name']) continue;    
    if($row['od_id'] == 'prime') continue;

    $href = shop_item_url($row['it_id']);
    $num = $rank + $i + 1;

    $list[$number] = $row;

    $list[$number]['it_name'] = preg_replace('/\r\n|\r|\n/', '', $it['it_name']);
    $list[$number]['num'] = $num;
    $list[$number]['href'] = $href;
    $list[$number]['image'] = str_replace('"', "'", get_it_image($it['it_id'], 160, 160) );
    $list[$number]['od_time'] = $chk['od_time'];
    //$list[$i]['query'] = "select it_name, it_id from g5_shop_item where it_id='".$row['it_id']."'";
    $list[$number]['od_receipt_time'] = $chk['od_receipt_time'];
    $list[$number]['od_cart_price'] = $chk['od_cart_price'];
    $list[$number]['od_receipt_price'] = $chk['od_receipt_price'];
    $list[$number]['od_status'] = $chk['od_status'];
    $number++;
}

//print_r2($list);
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