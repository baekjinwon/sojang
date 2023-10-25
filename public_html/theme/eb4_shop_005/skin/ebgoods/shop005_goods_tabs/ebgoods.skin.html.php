<?php
/**
 * skin file : /theme/THEME_NAME/skin/ebslider/basic/ebgoods.skin.html.php
 */
if (!defined('_EYOOM_')) exit;
?>

<?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
<div class="position-relative <?php if ($eg_master['eg_state'] == '2') { ?>eb-hidden-space<?php } ?>">
    <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="top:-22px;text-align:right">
        <div class="btn-group">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebgoods_form&amp;thema=<?php echo $theme; ?>&amp;eg_code=<?php echo $eg_master['eg_code']; ?>&amp;w=u&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> EB상품 마스터 설정</a>
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebgoods_form&amp;thema=<?php echo $theme; ?>&amp;eg_code=<?php echo $eg_master['eg_code']; ?>&amp;w=u" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                <i class="far fa-window-maximize"></i>
            </a>
            <button type="button" class="btn-e btn-e-xs btn-e-red popovers" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" data-content="
                <span class='font-size-11'>
            <strong class='color-indigo'>좌측 [EB상품 설정하기 버튼] 클릭 후 아래 설명 참고</strong><br>
            <div class='margin-hr-5'></div>
            <span class='color-indigo'>[설정정보]</span><br>
            1. 상품 마스터 제목 : Light COLLECTION<br>
            2. 대표연결주소 입력시 상품 마스터 제목에 링크 등록<br>
            3. 상품유형(히트, 추천,...)이 아닌 상품분류(카테고리)를 출력하는 스킨<br>
            4. 아이템 등록시 탭별로 출력<br>
            <span class='color-indigo'>[EB 컨텐츠 - 아이템 관리]</span><br>
            1. 아이템 등록을 통해 분류별 상품 등록 가능<br>
            2. 대표 연결주소 입력시 탭 하단에 'More show' 버튼 링크 출력<br>
            3. 카테고리 (ca_id) : 출력할 상품 분류 선택
            <div class='margin-hr-5'></div>
            </span>
            "><i class="fas fa-question-circle"></i></button>
        </div>
    </div>
</div>
<?php }?>

<?php if (isset($eg_master) && $eg_master['eg_state'] == '1') { // 보이기 상태에서만 출력 ?>
<style>
.ebgoods-gallery-wrap {position:relative}
.ebgoods-gallery-wrap .shop-main-title {position:relative;margin-bottom:40px}
.ebgoods-gallery-wrap .shop-main-title:before {content:"";display:block;position:absolute;top:10px;width:100%;height:1px;background:#333}
.ebgoods-gallery-wrap .shop-main-title h2 {display:inline-block;position:relative;float:left;padding-right:20px;margin:0;font-size:20px;line-height:20px;font-weight:700;text-transform:uppercase;background:#FCFAF8}
/* 탭메뉴 */
.ebgoods-gallery-wrap .ebgoods-gallery-tabs {display:flex;justify-content:flex-end;position:relative;float:right;padding-left:0;list-style:none;background:#FCFAF8}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li {position:relative;margin-left:15px}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li:after {content:"";display:block;position:absolute;bottom:-10px;left:0;width:0%;height:1px;background:#333;-webkit-transition:all 0.5s ease;-moz-transition:all 0.5s ease;-ms-transition:all 0.5s ease;-o-transition:all 0.5s ease;transition:all 0.5s ease}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li:hover:after, .ebgoods-gallery-wrap .ebgoods-gallery-tabs li.active:after {width:100%}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li a {display:block;padding:0;font-size:14px;line-height:20px;border:0 none;color:#808080}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li.active a {color:#1b1b1b}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li .cursor-pointer:hover {cursor:pointer}
/* 콘텐츠 */
.ebgoods-gallery-wrap .tab-content {position:relative;padding:0}
.ebgoods-gallery.row {margin-left:-10px;margin-right:-10px}
.ebgoods-gallery .col-sm-6 {padding-left:10px;padding-right:10px}
.ebgoods-gallery .goods-box {position:relative;background:#fff;margin-bottom:30px;border:1px solid #eee;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out}
/* 이미지 */
.ebgoods-gallery .goods-img {position:relative;overflow:hidden;background:#f8f8f8}
.ebgoods-gallery .goods-img a {display:block}
.ebgoods-gallery .goods-img-in {position:relative;overflow:hidden;width:100%}
.ebgoods-gallery .goods-img-in img {display:block;width:100% \9;max-width:100% !important;height:auto !important;}
/* 상품 유형 */
.ebgoods-gallery .rgba-banner-area {position:absolute;top:10px;left:10px}
.ebgoods-gallery .shop-rgba-red {background:#FF4848;opacity:0.9}
.ebgoods-gallery .shop-rgba-yellow {background:#FDAB29;opacity:0.9}
.ebgoods-gallery .shop-rgba-green {background:#73B852;opacity:0.9}
.ebgoods-gallery .shop-rgba-purple {background:#907EEC;opacity:0.9}
.ebgoods-gallery .shop-rgba-orange {background:#FF6F42;opacity:0.9}
.ebgoods-gallery .shop-rgba-dark {background:#4B4B4D;opacity:0.9}
.ebgoods-gallery .shop-rgba-default {background:#A6A6A6;opacity:0.9}
.ebgoods-gallery .rgba-banner {height:14px;width:60px;line-height:14px;color:#fff;font-size:10px;text-align:center;font-weight:normal;position:relative;text-transform:uppercase;margin-bottom:1px}
/* 소셜링크 */
.ebgoods-gallery .goods-img .goods-sns {position:absolute;top:10px;right:-40px;z-index:1;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out}
.ebgoods-gallery .goods-box:hover .goods-img .goods-sns {right:10px}
.ebgoods-gallery .goods-img .goods-sns ul {margin:0;padding:0;list-style:none}
.ebgoods-gallery .goods-img .goods-sns ul li {margin-bottom:5px}
.ebgoods-gallery .goods-img .goods-sns ul li:last-child {margin-bottom:0}
.ebgoods-gallery .goods-img .goods-sns ul li a {display:inline-block;width:26px;height:26px;line-height:26px;text-align:center;background:#c5c5c5;color:#fff;font-size:12px}
.ebgoods-gallery .goods-img .goods-sns ul .s-facebook a {background:#405892}
.ebgoods-gallery .goods-img .goods-sns ul .s-twitter a {background:#4CA0EB}
.ebgoods-gallery .goods-img .goods-sns ul .s-google a {background:#D8503F}
.ebgoods-gallery .goods-img .goods-sns ul li a:hover {background:#333}
/* 상품정보 */
.ebgoods-gallery .goods-description {position:relative;overflow:hidden}
.ebgoods-gallery .goods-description:before {content:"";position:absolute;top:0;left:0;height:0;width:100%;background:#F1EEEA;border-radius: 0 0 50% 50% !important;;-webkit-transition:all .4s ease;-moz-transition:all .4s ease;-o-transition:all .4s ease;-ms-transition:all .4s ease;transition:all .4s ease}
.ebgoods-gallery .goods-box:hover .goods-description:before {height:190%}
.ebgoods-gallery .goods-description .goods-description-in {position:relative;bottom:0;overflow:hidden;z-index:1;padding:0 10px 10px}
.ebgoods-gallery .goods-description .goods-name {position:relative;overflow:hidden;margin:10px 0 0;margin-bottom:5px;height:40px}
.ebgoods-gallery .goods-description .goods-name a {display:block;line-height:20px;font-size:15px;color:#000}
.ebgoods-gallery .goods-description .goods-name a:hover {color:#FF4848;text-decoration:underline}
.ebgoods-gallery .goods-description .title-price {font-size:16px;font-weight:bold;color:#E52700}
.ebgoods-gallery .goods-description .line-through {font-size:12px;color:#959595;text-decoration:line-through;margin-left:7px;font-weight:normal}
.ebgoods-gallery .goods-description .goods-info {position:relative;overflow:hidden;height:34px;color:#959595;font-size:11px;margin:8px 0 0}
.ebgoods-gallery .goods-description .goods-sns ul li:hover .facebook-icon {background:#5D82D1}
.ebgoods-gallery .goods-description .goods-sns ul li:hover .twitter-icon {background:#40BFF5}
.ebgoods-gallery .goods-description .goods-sns ul li:hover .google-icon {background:#EB5E4C}
.ebgoods-gallery .goods-description .goods-sns ul li:hover .wish-icon {background:#FF9500}
.ebgoods-gallery .goods-ratings {margin:0;padding:0;margin-right:3px}
.ebgoods-gallery .goods-ratings li {padding:0;margin-right:-3px}
.ebgoods-gallery .goods-ratings li .rating {color:#959595;line-height:normal;font-size:11px}
.ebgoods-gallery .goods-ratings li .rating-selected {color:#FF4848;font-size:11px}

.goods-description-in{padding: 0 10px !important;height: 80px;display: flex;align-items: center;justify-content: space-between;}
.goods-name{margin: 0 !important;font-size: 16px;}
.btn-more>a{word-break: keep-all;color: #fff !important;}
.btn-more{background-color: #5b0fd1;}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:767px) {
    .ebgoods-gallery-wrap .shop-main-title:before {display:none}
    .ebgoods-gallery-wrap .shop-main-title h2 {display:block;float:none;padding-bottom:10px;margin-bottom:10px;border-bottom:1px solid #333}
    .ebgoods-gallery-wrap .ebgoods-gallery-tabs {justify-content:flex-start;float:none}
    .ebgoods-gallery-wrap .ebgoods-gallery-tabs li {margin:0 7px 0 0}
    .ebgoods-gallery-wrap .ebgoods-gallery-tabs li a {font-size:11px}

    .ebgoods-gallery-wrap .row {margin:0 -5px}
    .ebgoods-gallery-wrap .row > .col-xs-6 {padding-left:5px;padding-right:5px}
    .ebgoods-gallery .goods-box {margin-bottom:10px}
    .ebgoods-gallery .goods-box .goods-img .goods-sns {right:10px}

    .ebgoods-gallery .goods-description {   }    

    .ebgoods-gallery .goods-description .goods-description-in { height: 100px; align-items: flex-start; padding-top: 15px;  }
.ebgoods-gallery .goods-description .goods-name { margin-top: 15px !important;  }
    .ebgoods-gallery .goods-description .goods-name a {font-size:13px}
    .ebgoods-gallery .goods-description .goods-info {display:none}
    .ebgoods-gallery .goods-description .title-price {font-size:11px}

    .ebgoods-gallery-wrap .ebgoods-gallery-tabs li:after {content:none;display:none;}

    .goods-box .btn-go-category { bottom:10px; right:0px; }
}
</style>
<?php } ?>

<div class="ebgoods-gallery-wrap">
    <div class="shop-main-title clear-after">
        <h2>
            <?php if ($eg_master['eg_link']) { ?>
            <a href="<?php echo $eg_master['eg_link']; ?>" target="<?php echo $eg_master['eg_target']; ?>"><?php echo $eg_master['eg_subject']; ?></a>
            <?php } else { ?>
            <?php echo $eg_master['eg_subject']; ?>
            <?php } ?>
        </h2>
        <ul class="ebgoods-gallery-tabs">
            <?php if (is_array($eg_item)) { foreach ($eg_item as $k => $eb_goods) { ?>
            <li class="<?php if ($k==0) { ?>active<?php } else if ($eg_count == ($k+1)) { ?>last<?php }?>"><a href="#basic-tlb-<?php echo $eg_master['eg_code']; ?>-<?php echo ($k+1); ?>" data-toggle="tab" <?php if ($eb_goods['gi_link']) { ?>data-href="<?php echo $eb_goods['gi_link']; ?>" target="<?php echo $eb_goods['gi_target']; ?>"<?php } ?> <?php if ($eb_goods['gi_link']) { ?>class="cursor-pointer"<?php } ?>><?php echo $eb_goods['gi_title']; ?></a></li>
            <?php }} ?>
        </ul>
    </div>
    <div class="tab-content">
        <?php if (is_array($eg_item)) { foreach ($eg_item as $k => $eb_goods) { ?>
        <div class="tab-pane <?php echo ($k==0) ? 'active': ''; ?> in" id="basic-tlb-<?php echo $eg_master['eg_code']; ?>-<?php echo ($k+1); ?>">
            <div class="ebgoods-gallery row">
                <?php if (count((array)$eb_goods['list']) > 0) { foreach ($eb_goods['list'] as $i => $data) { ?>
                <div class="col-xs-6 col-md-4">
                    <div class="goods-box">
                        <div class="goods-img">
                            <a href="<?php echo $data['href']; ?>">
                                <div class="goods-img-in">
                                <?php if ($eb_goods['gi_view_img'] == 'y') { ?>
                                    <?php if($data['it_image']) { ?>
                                        <?php echo $data['it_image']; ?>
                                    <?php } else { ?>
                                        <span class="no-image">No Image</span>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($eb_goods['gi_view_it_icon']) { ?>
                                    <?php echo $data['it_icon']; ?>
                                <?php } ?>
                                </div>
                            </a>
                            <?php if ($eb_goods['gi_view_sns'] == 'y') { ?>
                            <div class="goods-sns">
                                <ul>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="goods-description">
                            <div class="goods-description-in">
                                <h4 class="goods-name" style="height:auto">                                  
                                        <?php echo $data['it_name']?>
                                </h4>
                                <div class="goods-price">
                                <div class="text-center">
                                    <div class="btn-more btn-go-category" style="width:100%;margin-top:5px"><a href="<?php echo $data['href']; ?>">바로가기</a></div>
                                </div>
                                </div>
                        

                                <?php if ($eb_goods['gi_view_it_basic'] == 'y') { ?>
                                    <!--
                                <p class="goods-info"><?php echo $data['it_basic']?></p>
                                -->
                                <?php } ?>
                            </div>

                            <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
                            <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="bottom:0">
                                <div class="btn-group">
                                    <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=itemform&w=u&it_id=<?php echo $data['it_id']; ?>&wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-dark btn-e-split"><i class="far fa-edit"></i> 개별상품 설정</a>
                                    <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=itemform&w=u&it_id=<?php echo $data['it_id']; ?>" target="_blank" class="btn-e btn-e-xs btn-e-dark btn-e-split-dark dropdown-toggle" title="새창 열기">
                                        <i class="far fa-window-maximize"></i>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php }} ?>

                <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
                <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="bottom:-10px">
                    <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebgoods_itemform&amp;thema=<?php echo $theme; ?>&amp;eg_code=<?php echo $eg_master['eg_code']; ?>&amp;gi_no=<?php echo $eb_goods['gi_no']; ?>&amp;w=u&amp;iw=u&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-dark"><i class="far fa-edit"></i> EB상품 아이템 설정</a>
                </div>
                <?php } ?>

                <?php if (count((array)$eb_goods['list']) == 0) { ?>
                <p class="text-center font-size-13 color-grey margin-top-10"><i class="fas fa-exclamation-circle"></i> 등록된 상품이 없습니다.</p>
                <?php } ?>
            </div>
            <?php if($eb_goods['gi_link']) { ?>
            <div class="text-center"><div class="btn-more"><a href="<?php echo $eb_goods['gi_link']; ?>">More Show</a></div></div>
            <?php } ?>
        </div>
        <?php }} ?>
    </div>
</div>
<?php } ?>