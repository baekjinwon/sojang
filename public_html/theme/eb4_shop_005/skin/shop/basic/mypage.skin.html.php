<?php
/**
 * skin file : /theme/THEME_NAME/skin/shop/basic/mypage.skin.html.php
 */
if (!defined('_EYOOM_')) exit;
?>

<style>
#smb_my {margin-bottom:0}
.shop-mypage .panel-group {position:relative;margin-bottom:70px}
.shop-mypage .panel-oc-btn {position:absolute;bottom:-30px;left:50%;width:50px;height:30px;margin-left:-25px;border:1px solid #d5d5d5;border-top:0;text-align:center;padding:5px 0 0;background:#f8f8f8}
.shop-mypage .panel-oc-btn .fas {display:block;line-height:1;font-size:11px;color:#757575}
.shop-mypage .panel-oc-btn .fa-caret-down {margin-top:-5px}
.shop-mypage .panel-heading {background:#f8f8f8}
.shop-mypage .panel-body dt {float:left;width:15%;margin:3px 0;font-weight:bold}
.shop-mypage .panel-body dd {float:left;width:35%;margin:3px 0}
.shop-mypage .mypage-wishlist-container {margin-left:-10px;margin-right:-10px; display:flex; flex-wrap:wrap;  }
.shop-mypage .mypage-wishlist-box {position:relative;width:25%}
.shop-mypage .mypage-wishlist-box-pd {padding:10px}
.shop-mypage .mypage-wishlist-box-in {position:relative;border:1px solid #dadada;padding:10px;background:#fff}
.shop-mypage .mypage-wishlist-box .mypage-wishlist-img {margin-bottom:15px}
.shop-mypage .mypage-wishlist-box .mypage-wishlist-img img {display:block;width:100% \9;max-width:100%;height:auto}
.shop-mypage .mypage-wishlist-box h5 {font-size:15px}
.shop-mypage .mypage-wishlist-box .mypage-wishlist-date {font-size:13px;color:#959595}
<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
@media (max-width:991px) {
    .shop-mypage-wishlist .mypage-wishlist-box {width:33.33333%}
    .shop-mypage .mypage-wishlist-box-in { min-height:260px;  }

}
@media (max-width:767px) {
    .shop-mypage .panel-body dt {width:30%}
    .shop-mypage .panel-body dd {width:70%}
    .shop-mypage .mypage-wishlist-container {margin-left:-5px;margin-right:-5px}
    .shop-mypage .mypage-wishlist-box {width:50%}
    .shop-mypage .mypage-wishlist-box-pd {padding:5px}
}
.main-latest-wrap {
    position: relative;
    background: #fff;
    border: 1px dashed #b5b5b5;
    padding: 10px;
}
.main-latest-link {
    position: relative;
    overflow: hidden;
    display: block;
    font-size: 13px;
    color: #2c2c35;
    height: 52px;
    padding: 7px;
    transition: all 0.2s ease-in-out;
    background: #fff;
}
.main-latest-link .main-latest-member-img {
    position: absolute;
    overflow: hidden;
    top: 10px;
    left: 10px;
    width: 36px;
    height: 36px;
    border-radius: 50% !important;
}
.main-latest-link .main-latest-member-img i {
    font-size: 36px;
    color: #74747d;
}
.main-latest-link .main-latest-cont {
    position: relative;
    margin-left: 46px;
}
.ellipsis {
    display: block;
    overflow: hidden;
    white-space: nowrap;
    word-wrap: normal;
    text-overflow: ellipsis;
    -o-text-overflow: ellipsis;
}
.main-latest-link .main-latest-cont p {
    margin-bottom: 0;
    color: #2c2c35;
    font-size: 12px;
}
.main-latest-link .main-latest-cont span {
    display: inline-block;
    font-size: 11px;
    color: #7c7c89;
    margin-right: 7px;
}
.main-latest-link .latest-status-indicator {
    position: absolute;
    bottom: 7px;
    right: 7px;
    display: inline-block;
    width: 7px;
    height: 7px;
    border-radius: 50% !important;
    background: #ff0035;
}
.main-latest-wrap {
    position: relative;
    background: #fff;
    border: 1px dashed #b5b5b5;
    padding: 10px;
}
.main-latest .main-latest-none {
    display: block;
    text-align: center;
    font-size: 12px;
    color: #7c7c89;
    padding: 20px 7px;
    margin: 0;
}
<?php } ?>
</style>

<div id="fakeloader"></div>

<?php /* ---------- 마이페이지 시작 ---------- */ ?>
<div id="smb_my" class="shop-mypage">
<?php if($member['auth'] == "2") { ?>
	<div class="com-btn" style="display: flex;justify-content: right;margin-bottom: 10px;"><!-- 박찬영 수정 - 추가 -->
		<a href="/adm/" style="display: flex;align-items: center;justify-content: center;padding: 0 10px;background-color: #fd5e5a;color: #fff;height: 40px;margin-right: 3px;">법률서식 등록관리 및 내역</a>
		<a href="https://www.sojjang.com/bbs/board.php?bo_table=bankbook" style="display: flex;align-items: center;justify-content: center;padding: 0 10px;background-color: #fd5e5a;color: #fff;height: 40px;">정보관리</a>
	</div><!---->
<?php } ?>
    <div class="text-right margin-bottom-10">
        <?php if ($is_admin == 'super') { ?>
        <a href="<?php echo G5_ADMIN_URL; ?>/" class="btn-e btn-e-red">관리자</a>
        <?php } ?>
        <a href="https://www.sojjang.com/bbs/content.php?co_id=premium_buy" class="btn-e btn-e-dark" style="background-color: #fd5e5a;color: #fff;">기간제 유료회원결제</a><!-- 박찬영 수정 버튼 추가 -->
        <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=refund" class="btn-e btn-e-dark">환불 신청</a>
        <a <?php if ( !G5_IS_MOBILE ) { ?>href="javascript:void(0);" onclick="memo_modal();"<?php } else { ?>href="<?php echo G5_BBS_URL; ?>/memo.php" target="_blank"<?php } ?> class="btn-e btn-e-dark">쪽지함</a>
      
        <a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php" class="btn-e btn-e-dark">회원정보수정</a>
        <a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=member_leave.php" onclick="return member_leave();" class="btn-e btn-e-default">회원탈퇴</a>
    </div>

    <?php /* 회원정보 개요 시작 */ ?>
    <div class="panel-group accordion-default">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="fas fa-user-circle margin-right-5"></i>
                    <a href="#mypage_panel" data-toggle="collapse">
                        <strong><?php echo $member['mb_name']; ?></strong>
                       
                    </a>
                    <?php 
                         $start_date_dl = new DateTime($member['dl_start_date']);
                         $end_date_dl = new DateTime($member['dl_end_date']);
                         $current_date_dl = new DateTime(date('Y-m-d'));
                        //var_dump(date_diff( $current_date_dl, $end_date_dl ));
                        if(($start_date_dl > $current_date_dl || $end_date_dl < $current_date_dl) && $is_member == true){ ?>
                            <button class="btn-e btn-e-dark">일반회원</button>
                        <?php }else{ ?>
                            <button class="btn-e btn-e-dark">기간회원(<?php echo date_diff( $current_date_dl, $end_date_dl ) -> days; ?>)일</button>
                        <?php }?>
                </h4>
                <div class="margin-top-10">
                    <span>보유포인트</span>
                    <a <?php if ( !G5_IS_MOBILE ) { ?>href="javascript:void(0);" onclick="point_modal();"<?php } else { ?>href="<?php echo G5_BBS_URL; ?>/point.php" target="_blank"<?php } ?>><u class="color-red"><strong><?php echo number_format($member['mb_point']); ?></strong></u></a> 점
                    <a <?php if ( !G5_IS_MOBILE ) { ?>href="javascript:void(0);" onclick="point_modal();"<?php } else { ?>href="<?php echo G5_BBS_URL; ?>/point.php" target="_blank"<?php } ?> class="btn-e btn-e-xs btn-e-default margin-left-5 hidden-xs">상세보기</a>
                    <span class="margin-left-10 margin-right-10 color-light-grey">/</span>
                    <span>보유쿠폰</span>
                    <a <?php if ( !G5_IS_MOBILE ) { ?>href="javascript:void(0);" onclick="coupon_modal();"<?php } else { ?>href="<?php echo G5_SHOP_URL; ?>/coupon.php" target="_blank"<?php } ?>><u class="color-red"><strong><?php echo number_format($cp_count); ?></strong></u></a> 개
                    <a <?php if ( !G5_IS_MOBILE ) { ?>href="javascript:void(0);" onclick="coupon_modal();"<?php } else { ?>href="<?php echo G5_SHOP_URL; ?>/coupon.php" target="_blank"<?php } ?> class="btn-e btn-e-xs btn-e-default margin-left-5 hidden-xs">상세보기</a>
                </div>
            </div>
            <?php $sql_r = "select count(*) as cnt from g5_download_logs where mb_id ='{$member['mb_id']}'";
                 $result_r = sql_fetch($sql_r); ?>
            <div id="mypage_panel" class="panel-collapse collapse in">
                <div class="panel-body">
                    <dl class="op_area">
                        <dt>연락처</dt>
                        <dd><?php echo ($member['mb_tel'] ? $member['mb_tel'] : '미등록'); ?></dd>
                        <dt>E-Mail</dt>
                        <dd><?php echo ($member['mb_email'] ? $member['mb_email'] : '미등록'); ?></dd>
                        <dt>최종접속일시</dt>
                        <dd><?php echo $member['mb_today_login']; ?></dd>
                        <dt>회원가입일시</dt>
                        <dd><?php echo $member['mb_datetime']; ?></dd>
                        <dt>주소</dt>
                        <dd><?php echo sprintf("(%s%s)", $member['mb_zip1'], $member['mb_zip2']).' '.print_address($member['mb_addr1'], $member['mb_addr2'], $member['mb_addr3'], $member['mb_addr_jibeon']); ?></dd>
                        <?php if(!($start_date_dl > $current_date_dl || $end_date_dl < $current_date_dl) && $is_member == true){ ?>
                            <dt>만료일</dt>
                            <dd><?php echo $member['dl_end_date']; ?>  <a href="/shop/item.php?it_id=1659019167" class="btn-e btn-e-dark" style="margin-left:13px">기간연장하기</a></dd>
                           
                        <?php } ?>
                        <dt>다운로드 횟수</dt>
                        <dd><?php echo $result_r['cnt']; ?>회 <a href="/shop/orderinquiry.php" class="btn-e btn-e-dark" style="margin-left:13px">자세히</a></dd>
                        
                    </dl>
                </div>
            </div>
        </div>
        <a href="#mypage_panel" data-toggle="collapse" class="panel-oc-btn">
            <i class="fas fa-caret-up"></i>
            <i class="fas fa-caret-down"></i>
        </a>
    </div>
    <?php /* 회원정보 개요 끝 */ ?>

    <?php /* 최근 주문내역 시작 */ ?>
    <div class="margin-bottom-50">
        <div class="headline-short">
            <h4><strong>최근 주문내역</strong></h4>
            <a href="./orderinquiry.php" class="headline-btn btn-e btn-e-brd btn-e-default"><i class="fas fa-plus"></i> 더보기</a>
        </div>
        <?php
        // 최근 주문내역
        define("_ORDERINQUIRY_", true);

        $limit = " limit 0, 5 ";
        include $skin_dir.'/orderinquiry.sub.php';
        ?>
    </div>
    <?php /* 최근 주문내역 끝 */ ?>

    <?php /* 최근 다운로드 시작 */ ?>
    <div class="margin-bottom-50">
        <div class="headline-short">
            <h4><strong>최근 다운로드</strong></h4>
            <a href="./orderdownload.php" class="headline-btn btn-e btn-e-brd btn-e-default"><i class="fas fa-plus"></i> 더보기</a>
        </div>
        <?php
        // 최근 다운로드
       

        $limit = " limit 0, 5 ";
        include $skin_dir.'/orderdownload.sub.php';

        
/**
 * 상품문의
 */
$sql = " select * from {$g5['g5_shop_item_qa_table']} where mb_id = '{$member['mb_id']}' order by iq_id desc limit 5 ";
$result = sql_query($sql);
$item_qa = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $sql1 = " select * from {$g5['member_table']} where mb_id = '{$row['mb_id']}' ";
    $row1 = sql_fetch($sql1);

    $item_qa[$i] = $row;
    $item_qa[$i]['mb_photo'] = $eb->mb_photo($row1['mb_id']);
    $item_qa[$i]['name'] = get_text($row1['mb_name']);
    $item_qa[$i]['is_answer'] = $row['iq_answer'] ? true: false;
}

/**
 * 사용후기
 */
$sql = " select * from {$g5['g5_shop_item_use_table']} where mb_id = '{$member['mb_id']}' order by is_id desc limit 5 ";
$result = sql_query($sql);
$item_use = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $sql1 = " select * from {$g5['member_table']} where mb_id = '{$row['mb_id']}' ";
    $row1 = sql_fetch($sql1);

    $item_use[$i] = $row;
    $item_use[$i]['mb_photo'] = $eb->mb_photo($row1['mb_id']);
    $item_use[$i]['name'] = get_text($row1['mb_name']);
    $item_use[$i]['is_answer'] = $row['is_confirm'] == '1' ? true: false;
}


/**
 * 1:1
 */
$sql = " select * from g5_qa_content where mb_id = '{$member['mb_id']}' order by qa_datetime desc limit 5 ";
$result = sql_query($sql);
$item_qalist = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $sql1 = " select * from {$g5['member_table']} where mb_id = '{$row['mb_id']}' ";
    $row1 = sql_fetch($sql1);

    $item_qalist[$i] = $row;
    $item_qalist[$i]['mb_photo'] = $eb->mb_photo($row1['mb_id']);
    $item_qalist[$i]['name'] = get_text($row1['mb_name']);
    $item_qalist[$i]['is_answer'] = $row['is_confirm'] == '1' ? true: false;
}
        ?>
    </div>
    <?php /* 최근 다운로드 끝 */ ?>

    <?php /* 최근 위시리스트 시작 */ ?>
    <div class="mypage-wishlist-wrap">
        <div class="headline-short">
            <h4><strong>최근 위시리스트</strong></h4>
            <a href="<?php echo G5_SHOP_URL; ?>/wishlist.php" class="headline-btn btn-e btn-e-brd btn-e-default"><i class="fas fa-plus"></i> 더보기</a>
        </div>
        <div class="mypage-wishlist-container">
            <?php for ($i=0; $i<$wish_count; $i++) { ?>
            <div class="mypage-wishlist-box">
                <div class="mypage-wishlist-box-pd">
                    <div class="mypage-wishlist-box-in">
                        <div class="mypage-wishlist-img">
                            <?php echo $wish_list[$i]['image']; ?>
                        </div>
                        <h5><a href="<?php echo shop_item_url($wish_list[$i]['it_id']); ?>"><strong><?php echo stripslashes($wish_list[$i]['it_name']); ?></strong></a></h5>
                        <div class="mypage-wishlist-date"><i class="far fa-clock"></i> <?php echo $wish_list[$i]['wi_time']; ?></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <?php if ($wish_count == 0) { ?>
        <div class="text-center color-grey margin-top-20"><i class="fas fa-exclamation-circle"></i> 보관 내역이 없습니다.</div>
        <?php } ?>
    </div>
    <?php /* 최근 위시리스트 끝 */ ?>
    <div class="row" style="margin-top:30px">
    <div class="col-md-6 md-margin-bottom-30">
        <?php /* ------------- 상품문의 시작 ------------- */?>
        <div class="main-headline">
            <h5 style="float:left"><strong>상품문의</strong></h5>
            <!-- <div class="headline-btn" style="float:right">
                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=itemqalist" class="btn-e btn-e-xs btn-e-brd btn-e-default">전체보기 <i class="fas fa-plus"></i></a>
            </div> -->
            <div class="clearfix"></div>
        </div>
        <div class="main-latest-wrap">
            <div class="main-latest" id='main-iq-list'>
                <?php for ($i=0; $i<count((array)$item_qa); $i++) { ?>
                <a href="/shop/item.php?it_id=<?php echo $item_qa[$i]['it_id'] ?>" class="main-latest-link <?php if (!$item_qa[$i]['is_answer']) { ?>main-latest-no-answer<?php } ?>">
                    <div class="main-latest-member-img">
                        <?php if (!$item_qa[$i]['mb_photo']) { ?>
                        <i class="fas fa-user-circle"></i>
                        <?php } else { ?>
                        <?php echo $item_qa[$i]['mb_photo']; ?>
                        <?php } ?>
                    </div>
                    <div class="main-latest-cont">
                        <p class="ellipsis"><?php echo conv_subject($item_qa[$i]['iq_subject'], 40); ?></p>
                        <p class="ellipsis"><span><?php echo $item_qa[$i]['name']; ?></span><span><i class="far fa-clock"></i> <?php echo $eb->date_format('Y-m-d', $item_qa[$i]['iq_time']); ?></span></p>
                    </div>
                    <?php if (!$item_qa[$i]['is_answer']) { ?>
                    <span class="latest-status-indicator"></span>
                    <?php } ?>
                </a>
                <?php 
                    $limitnum = $item_qa[$i]['iq_id'];
                }
                ?>
                <?php if (count((array)$item_qa) == 0) { ?>
                <p class="main-latest-none"><i class="fas fa-exclamation-circle"></i> 출력할 문의글이 없습니다.</p>
                <?php } ?>
                <input type='hidden' name='next_iq_limit' id="next_iq_limit" value='<?=$limitnum?>'>
            </div>            
        </div>

        <div class='' style='width: 100%; text-align:center; margin-top: 10px;'>
            <a href="javascript:void(0);" id='btn_iq_more' class="btn-e btn-e-md btn-e-brd btn-e-default">더보기</a>
        </div>
        <?php /* 상품문의 끝 */?>

        <script>
        $(function(){
            $('#btn_iq_more').click(function(){
                var iq_id = $('#next_iq_limit').val();
                var grid = 3;

                $.ajax({
                    url : "../shop/ajax_mypage_iqadd.php",
                    type : "POST",
                    data : "iq_id="+iq_id,
                    dataType: 'json',
                    success : function(data){

                        if(data){
                            $('#main-iq-list').append(data.html);
                            $('#next_iq_limit').val(data.next_iq_limit);
                        }
                        else{
                            alert("더 이상 상품문의가 없습니다.");
                            return false;
                        }                        

                    }, error:function(request,status,error){
                        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                       }
                });
            });
        })
        </script>
    </div>
    <div class="col-md-6">
        <?php /* ------------- 사용후기 시작 ------------- */?>
        <div class="main-headline">
            <h5 style="float:left"><strong>사용후기</strong></h5>
            <!-- <div class="headline-btn" style="float:right">
                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=itemuselist" class="btn-e btn-e-xs btn-e-brd btn-e-default">전체보기 <i class="fas fa-plus"></i></a>
            </div> -->
            <div class="clearfix"></div>
        </div>

        <div class="main-latest-wrap">
            <div class="main-latest" id='main-use-list'>
                <?php for ($i=0; $i<count((array)$item_use); $i++) { ?>
                <a href="/shop/item.php?it_id=<?php echo $item_use[$i]['it_id'] ?>" class="main-latest-link <?php if (!$item_use[$i]['is_answer']) { ?>main-latest-no-answer<?php } ?>">
                    <div class="main-latest-member-img">
                        <?php if (!$item_use[$i]['mb_photo']) { ?>
                        <i class="fas fa-user-circle"></i>
                        <?php } else { ?>
                        <?php echo $item_use[$i]['mb_photo']; ?>
                        <?php } ?>
                    </div>
                    <div class="main-latest-cont">
                        <p class="ellipsis"><?php echo conv_subject($item_use[$i]['is_subject'], 40); ?></p>
                        <p class="ellipsis"><span><?php echo $item_use[$i]['name']; ?></span><span><i class="far fa-clock"></i> <?php echo $eb->date_format('Y-m-d', $item_use[$i]['is_time']); ?></span></p>
                    </div>
                    <?php if (!$item_use[$i]['is_answer']) { ?>
                    <span class="latest-status-indicator"></span>
                    <?php } ?>
                </a>

                <?php 
                    $limitnum = $item_use[$i]['is_id'];
                } ?>
                <?php if (count((array)$item_use) == 0) { ?>
                <p class="main-latest-none"><i class="fas fa-exclamation-circle"></i> 출력할 후기글이 없습니다.</p>
                <?php } ?>

                <input type='hidden' name='next_use_limit' id="next_use_limit" value='<?=$limitnum?>'>
            </div>
        </div>

        <div class='' style='width: 100%; text-align:center; margin-top: 10px;'>
            <a href="javascript:void(0);" id='btn_use_more' class="btn-e btn-e-md btn-e-brd btn-e-default">더보기</a>
        </div>
        <?php /* 사용후기 끝 */?>

        <script>
        $(function(){
            $('#btn_use_more').click(function(){
                var is_id = $('#next_use_limit').val();
                
                $.ajax({
                    url : "../shop/ajax_mypage_useadd.php",
                    type : "POST",
                    data : "is_id="+is_id,
                    dataType: 'json',
                    success : function(data){
                        if(data){
                            $('#main-use-list').append(data.html);
                            $('#next_use_limit').val(data.next_is_limit);
                        }
                        else{
                            alert("더 이상 사용후기가 없습니다.");
                            return false;
                        }                        

                    }, error:function(request,status,error){
                        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                       }
                });
            });
        })
        </script>
    </div>    

    <div class="col-md-6">
        <?php /* ------------- 1:1 ------------- */?>
        <div class="main-headline">
            <h5 style="float:left"><strong>1:1 문의</strong></h5>
            <div class="headline-btn" style="float:right;margin-top:10px">
                <a href="/bbs/qalist.php" class="btn-e btn-e-xs btn-e-brd btn-e-default">전체보기 <i class="fas fa-plus"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="main-latest-wrap">
            <div class="main-latest">
                <?php for ($i=0; $i<count((array)$item_qalist); $i++) { ?>
                <a href="/bbs/qaview.php?qa_id=<?php echo $item_qalist[$i]['qa_id'] ?>" class="main-latest-link <?php if (!$item_qalist[$i]['is_answer']) { ?>main-latest-no-answer<?php } ?>">
                    <div class="main-latest-member-img">
                        <?php if (!$item_qalist[$i]['mb_photo']) { ?>
                        <i class="fas fa-user-circle"></i>
                        <?php } else { ?>
                        <?php echo $item_qalist[$i]['mb_photo']; ?>
                        <?php } ?>
                    </div>
                    <div class="main-latest-cont">
                        <p class="ellipsis"><?php echo conv_subject($item_qalist[$i]['qa_subject'], 40); ?></p>
                        <p class="ellipsis"><span><?php echo $item_qalist[$i]['name']; ?></span><span><i class="far fa-clock"></i> <?php echo $eb->date_format('Y-m-d', $item_qalist[$i]['is_time']); ?></span></p>
                    </div>
                    <?php if (!$item_qalist[$i]['is_answer']) { ?>
                    <span class="latest-status-indicator"></span>
                    <?php } ?>
                </a>
                <?php } ?>
                <?php if (count((array)$item_qalist) == 0) { ?>
                <p class="main-latest-none"><i class="fas fa-exclamation-circle"></i> 출력할 1:1문의글이 없습니다.</p>
                <?php } ?>
            </div>
        </div>
        <?php /* 1:1 끝 */?>
    </div>
</div>
    
</div>
<?php /* ---------- 마이페이지 끝 ---------- */ ?>

<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/fakeLoader/fakeLoader.min.js"></script>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/masonry/masonry.pkgd.min.js"></script>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script>
$('#fakeloader').fakeLoader({
    timeToHide:3000,
    zIndex:"11",
    spinner:"spinner6",
    bgColor:"#fff",
});

$(window).load(function(){
    $('#fakeloader').fadeOut(300);
});

$(document).ready(function(){
    // var $container = $('.mypage-wishlist-container');
    // $container.imagesLoaded(function() {
    //     $container.masonry({
    //         columnWidth: '.mypage-wishlist-box',
    //         itemSelector: '.mypage-wishlist-box'
    //     });
    // });
});

$(function() {
    $(".win_coupon").click(function() {
        var new_win = window.open($(this).attr("href"), "win_coupon", "left=100,top=100,width=700, height=600, scrollbars=1");
        new_win.focus();
        return false;
    });
});

function member_leave() {
    return confirm('정말 회원에서 탈퇴 하시겠습니까?')
}
</script>