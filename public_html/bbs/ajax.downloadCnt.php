<?php
include_once('./_common.php');

$point = isset($_POST['point']) ? trim($_POST['point']) : '';
$it_id = isset($_POST['it_id']) ? trim($_POST['it_id']) : '';
$mb_id = isset($_POST['mb_id']) ? trim($_POST['mb_id']) : '';
$od_id = isset($_POST['od_id']) ? trim($_POST['od_id']) : '';
$r_type = isset($_POST['r_type']) ? trim($_POST['r_type']) : '';


$itemsql = "select * from g5_shop_item where it_id = '{$it_id}'";
$itemresult = sql_fetch($itemsql);

$downcntsql = "update g5_shop_item set down_cnt = down_cnt+1 where it_id = '{$it_id}'";
sql_query($downcntsql,false);
$cr_mb_id = $itemresult['create_id'];

$checksql = "select count(*) as cnt from g5_point where po_rel_id = '{$cr_mb_id}' and po_rel_action = '{$it_id}' and po_rel_table = '@download'";
$checkresult = sql_fetch($checksql);

$checksql2 = "select count(*) as cnt from g5_download_logs where mb_id = '{$mb_id}' and it_id = '{$it_id}' and od_id = 'prime'";
$checkresult2 = sql_fetch($checksql2);

$chk_date = date("Y-m-d H:i");
$is_use = sql_fetch("select * from g5_download_logs where it_id='{$it_id}' and od_id='{$od_id}' and mb_id='{$mb_id}' and create_id='{$itemresult['create_id']}' and create_date regexp '$chk_date' ");

if($is_use['od_id']){}
else{
    $downloadlogs = "insert into g5_download_logs values ('{$it_id}','{$od_id}','{$mb_id}','{$itemresult['create_id']}','','{$r_type}',now())";
    sql_query($downloadlogs,false);    
}

if($checkresult2['cnt'] == '0'){
    if($r_type == "1"){
        //prime
        $r_point = ($itemresult['it_price'] * 1) * (1 / 100);
    }else{
        $r_point = (($itemresult['it_price'] * 1) * (99 / 100)) * (($itemresult['it_commission_rate'] * 1) / 100);
    }
    
    insert_point($cr_mb_id, $r_point , '파일다운로드', '@download', $mb_id, $od_id);
    $free_check_sql = "update g5_member set free_count = free_count - 1 where mb_id = '$mb_id'";
    sql_query($free_check_sql , false);
/*
$od_id = get_session('ss_order_id');   
// 주문서에 입력
$sql = " insert g5_shop_order
set od_id             = '{$od_id}',
    mb_id             = '{$mb_id}',
    od_pwd            = '',
    od_name           = '',
    od_email          = '',
    od_tel            = '',
    od_hp             = '',
    od_zip1           = '',
    od_zip2           = '',
    od_addr1          = '',
    od_addr2          = '',
    od_addr3          = '',
    od_addr_jibeon    = '',
    od_b_name         = '',
    od_b_tel          = '',
    od_b_hp           = '',
    od_b_zip1         = '',
    od_b_zip2         = '',
    od_b_addr1        = '',
    od_b_addr2        = '',
    od_b_addr3        = '',
    od_b_addr_jibeon  = '',
    od_deposit_name   = '',
    od_memo           = '',
    od_cart_count     = '',
    od_cart_price     = '',
    od_cart_coupon    = '',
    od_send_cost      = '',
    od_send_coupon    = '',
    od_send_cost2     = '',
    od_coupon         = '',
    od_receipt_price  = '',
    od_receipt_point  = '',
    od_bank_account   = '',
    od_receipt_time   = '',
    od_misu           = '',
    od_pg             = '',
    od_tno            = '',
    od_app_no         = '',
    od_escrow         = '',
    od_tax_flag       = '',
    od_tax_mny        = '',
    od_vat_mny        = '',
    od_free_mny       = '',
    od_status         = '완료',
    od_shop_memo      = '',
    od_hope_date      = '',
    od_time           = '".G5_TIME_YMDHIS."',
    od_ip             = '',
    od_settle_case    = '',
    od_other_pay_type = '',
    od_test           = ''
    ";
$result = sql_query($sql, false);

*/
    echo 1;
}else{
    echo 0;
}
