<?php
if($_SERVER['HTTP_REFERER'] == '') exit("잘못된 접근입니다.");
include_once("../common.php");

clean_xss_tags($is_id);

if($is_id){
    
    $item_use = array();
    $list = array();
    $cnt = 0;
    $query = sql_query("select * from {$g5['g5_shop_item_use_table']} where mb_id = '{$member['mb_id']}' and is_id < '$is_id' order by is_id desc limit 5");

    for($i=0;$i<$row=sql_fetch_array($query);$i++){

        $sql1 = " select * from {$g5['member_table']} where mb_id = '{$row['mb_id']}' ";
        $row1 = sql_fetch($sql1);

        //$item_qa[$i]['mb_photo'] = $eb->mb_photo($row1['mb_id']);

        $html .= "<a href='/shop/item.php?it_id=".$row['it_id']."' class='main-latest-link main-latest-no-answer'>";
        $html .= "<div class='main-latest-member-img'>";
        //if (!$row['mb_photo']) { $html .= "<i class='fas fa-user-circle'></i>"; }
        //else { $html .= $row['mb_photo']; }
        $html .= "<i class='fas fa-user-circle'></i>";
        $html .= "</div>";
        $html .= "<div class='main-latest-cont'>";
        $html .= "<p class='ellipsis'>".conv_subject($row['is_subject'], 40)."</p>";
        $html .= "<p class='ellipsis'>
                        <span>".get_text($row1['mb_name'])."</span>
                        <span><i class='far fa-clock'></i> ".date('Y-m-d', $row['is_time'])."</span>
                  </p>";
        $html .= "</div>";
        if(!$row['is_answer']) $html .= "<span class='latest-status-indicator'></span>";
        $html .= "</a>";
        
        $next_is_limit = $row['iq_id'];

        $cnt++;
    }

    $list['html'] = $html;
    $list['next_is_limit'] = $next_is_limit;

    echo json_encode($list);
}
?>