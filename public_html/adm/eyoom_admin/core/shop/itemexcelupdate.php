<?php
/**
 * @file    /adm/eyoom_admin/core/shop/itemexcelupdate.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "400300";

// 상품이 많을 경우 대비 설정변경
set_time_limit ( 0 );
ini_set('memory_limit', '50M');

auth_check_menu($auth, $sub_menu, "w");

function only_number($n)
{
    return preg_replace('/[^0-9]/', '', $n);
}

$is_upload_file = (isset($_FILES['excelfile']['tmp_name']) && $_FILES['excelfile']['tmp_name']) ? 1 : 0;

if(!$is_upload_file){
    alert("엑셀 파일을 업로드해 주세요.");
}

if($is_upload_file) {
    
    $file = $_FILES['excelfile']['tmp_name'];
    $upload = array();
    
    $chars_array = array_merge(range(0,9), range('a','z'), range('A','Z'));
    $tmp_file  = $_FILES['excelfile']['tmp_name'];
    $filename  = $_FILES['excelfile']['name'];
    
    $filename  = get_safe_filename($filename);

    if (is_uploaded_file($tmp_file)) {
        
        $upload['source'] = $filename;
        
        
        // 아래의 문자열이 들어간 파일은 -x 를 붙여서 웹경로를 알더라도 실행을 하지 못하도록 함
        $filename = preg_replace("/\.(php|pht|phtm|htm|cgi|pl|exe|jsp|asp|inc|phar)/i", "$0-x", $filename);
        shuffle($chars_array);
        $shuffle = implode('', $chars_array);

        $upload['file'] = md5(sha1($_SERVER['REMOTE_ADDR'])).'_'.substr($shuffle,0,8).'_'.replace_filename($filename);
        $dest_file = G5_DATA_PATH.'/exceldoc/'.$upload['file'];
        
        // 업로드가 안된다면 에러메세지 출력하고 죽어버립니다.
        $error_code = move_uploaded_file($tmp_file, $dest_file) or die($_FILES['excelfile']['error']);
        
        // 올라간 파일의 퍼미션을 변경합니다.
        chmod($dest_file, G5_FILE_PERMISSION);

        $sql = " INSERT INTO g5_exceldoc
                     SET mb_id = '".$member['mb_id']."',
                         bf_file = '".$upload['file']."',
                         bf_source = '".$upload['source']."',
                         bf_datetime = '".G5_TIME_YMDHIS."'
                        ";
        
        sql_query($sql);

        $succ_count++;
        $fail_count = 0;
    }else{
        $succ_count = 0;
        $fail_count++;
    }   
}else{
    $succ_count = 0;
    $fail_count++;
}  