<?php
/**
 * @file    /adm/eyoom_admin/core/shop/itemlist.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "400330";

$action_url1 = G5_ADMIN_URL . '/?dir=shop&amp;pid=itemlistupdate&amp;smode=1';

auth_check_menu($auth, $sub_menu, "r");

$fr_date = isset($_GET['fr_date']) ? trim($_GET['fr_date']) : '';
$to_date = isset($_GET['to_date']) ? trim($_GET['to_date']) : '';

/**
 * 1차 상품 분류 가져오기
 */
$fields = " ca_id, ca_name ";
$cate1 = $shop->get_goods_cate1($fields);
if (!$cate1) $cate1 = array();

$where = " and ";
$sql_search = "";
if ($stx != "") {
    if ($sfl != "") {
        $sql_search .= " $where $sfl like '%$stx%' ";
        $where = " and ";
    }
    if ($save_stx != $stx)
        $page = 1;
}

// 기간검색이 있다면
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $fr_date) ) $fr_date = '';
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $to_date) ) $to_date = '';

if ($sdt == 'it_time') {
    $sdt_target = 'it_time';
} else if ($sdt == 'it_update_time') {
    $sdt_target = 'it_update_time';
}

if ($sdt_target && $fr_date && $to_date) {
    $sql_search .= " and $sdt_target between '$fr_date 00:00:00' and '$to_date 23:59:59' ";
    $qstr .= "&amp;sdt={$sdt_target}&amp;fr_date={$fr_date}&amp;to_date={$to_date}";
}

/**
 * 서브 카테고리
 */
$cate2 = $cate3 = $cate4 = array();
$cate_a = isset($_GET['cate_a']) ? clean_xss_tags(trim($_GET['cate_a'])) : '';
$cate_b = isset($_GET['cate_b']) ? clean_xss_tags(trim($_GET['cate_b'])) : '';
$cate_c = isset($_GET['cate_c']) ? clean_xss_tags(trim($_GET['cate_c'])) : '';
$ituse = isset($_GET['ituse']) ? clean_xss_tags(trim($_GET['ituse'])) : '';
$itsoldout = isset($_GET['itsoldout']) ? clean_xss_tags(trim($_GET['itsoldout'])) : '';
$itype = isset($_GET['itype']) ? clean_xss_tags(trim($_GET['itype'])) : '';


if ($sfl == "")  $sfl = "it_name";

$sql_common = " from g5_exceldoc where (1) ";

$sql_common .= $sql_search;

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

if (!$sst) {
    $sst  = "wr_id";
    $sod = "desc";
}
$sql_order = "order by $sst $sod";

//if(!$is_admin) $sql_where = "where mb_id = '".$member['mb_id']."'";

$sql  = " select *
           $sql_common
           $sql_order
           limit $from_record, $rows ";

$result = sql_query($sql);

//$qstr  = $qstr.'&amp;sca='.$sca.'&amp;page='.$page;
$qstr  = $qstr.'&amp;sca='.$sca.'&amp;page='.$page.'&amp;save_stx='.$stx;

$k=0;
$list = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $list[$k] = $row;
    
    $list_num = $total_count - ($page - 1) * $rows;
    $list[$i]['num'] = $list_num - $k;
    $k++;
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