<?php
include_once('./_common.php');

$mb_no = trim($_REQUEST['it_id']);
$mb_no = str_pad($mb_no, 10, "0", STR_PAD_LEFT); //10자리로 채운다. 0000000001

$SQL = "update g5_shop_item set approve = 1 ,it_use = 1, auth_date = now() where it_id = '{$mb_no}'";

$result = sql_query($SQL, false);
echo $result;

?>