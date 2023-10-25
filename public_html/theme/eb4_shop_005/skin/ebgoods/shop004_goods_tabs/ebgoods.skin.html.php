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
            1. 상품 마스터 제목 : THE REST IS HERE <br>
            2. 상품유형(히트, 추천,...)이 아닌 상품분류(카테고리)를 출력하는 스킨<br>
            3. 아이템 등록시 탭별로 출력<br>
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
.ebgoods-gallery-wrap .shop-main-title h2 {margin:0 0 30px;font-size:28px;text-align:center;font-family:'Noto Serif KR', sans-serif}
/* 탭메뉴 */
.ebgoods-gallery-wrap .ebgoods-gallery-tabs {display:flex;justify-content:center;padding:0 0 10px;margin-bottom:40px;list-style:none;border-bottom:1px solid #ccc}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li {position:relative;margin:0 10px}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li:after {content:"";display:block;position:absolute;bottom:-11px;left:0;width:0;height:1px;opacity:0;background:#1b1b1b;-webkit-transition:all 0.5s ease;-moz-transition:all 0.5s ease;-ms-transition:all 0.5s ease;-o-transition:all 0.5s ease;transition:all 0.5s ease}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li:hover:after, .ebgoods-gallery-wrap .ebgoods-gallery-tabs li.active:after {opacity:1;width:100%}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li a {display:block;padding:0;font-size:14px;line-height:40px;border:0 none;color:#808080}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li.active a {color:#1b1b1b}
.ebgoods-gallery-wrap .ebgoods-gallery-tabs li .cursor-pointer:hover {cursor:pointer}
/* 콘텐츠 */
.ebgoods-gallery-wrap .tab-content {position:relative;padding:0}
.ebgoods-gallery .goods-box {position:relative;overflow:hidden;padding-left:30px;margin-bottom:30px}
/* 이미지 */
.ebgoods-gallery .goods-img {position:relative;overflow:hidden;background:#f8f8f8}
.ebgoods-gallery .goods-img a {display:block}
.ebgoods-gallery .goods-img-in {position:relative;width:100%}
.ebgoods-gallery .goods-img-in img {display:block;width:100% \9;max-width:100% !important;height:auto !important;-webkit-transform:scale(1);transform:scale(1);-webkit-transition: transform 2s linear;-moz-transition: transform 2s linear;-o-transition: transform 2s linear;-ms-transition: transform 2s linear;transition: transform 2s linear}
.ebgoods-gallery .goods-box:hover .goods-img-in img {-webkit-transform:scale(1.05);transform:scale(1.05)}
/* 상품 유형 */
.ebgoods-gallery .rgba-banner-area {position:absolute;top:10px;left:5px}
.ebgoods-gallery .shop-rgba-red {background:#fff;border:2px solid #FF4848;color:#FF4848}
.ebgoods-gallery .shop-rgba-yellow {background:#fff;border:2px solid #FDAB29;color:#FDAB29}
.ebgoods-gallery .shop-rgba-green {background:#fff;border:2px solid #73B852;color:#73B852}
.ebgoods-gallery .shop-rgba-purple {background:#fff;border:2px solid #907EEC;color:#907EEC}
.ebgoods-gallery .shop-rgba-orange {background:#fff;border:2px solid #FF6F42;color:#FF6F42}
.ebgoods-gallery .shop-rgba-dark {background:#fff;border:2px solid #4B4B4D;color:#4B4B4D}
.ebgoods-gallery .shop-rgba-default {background:#fff;border:2px solid #A6A6A6;color:#A6A6A6}
.ebgoods-gallery .rgba-banner {width:54px;padding:2px 0;font-size:10px;text-align:center;font-weight:normal;position:relative;text-transform:uppercase;margin-bottom:1px}
/* 소셜링크 */
.ebgoods-gallery .goods-img .goods-sns {position:absolute;top:10px;right:-40px;z-index:1;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out}
.ebgoods-gallery .goods-box:hover .goods-img .goods-sns {right:10px}
.ebgoods-gallery .goods-img .goods-sns ul {margin:0;padding:0;list-style:none}
.ebgoods-gallery .goods-img .goods-sns ul li {margin-bottom:5px}
.ebgoods-gallery .goods-img .goods-sns ul li:last-child {margin-bottom:0}
.ebgoods-gallery .goods-img .goods-sns ul li a {display:inline-block;width:26px;height:26px;line-height:26px;text-align:center;border:1px solid #333;color:#333;font-size:12px;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out}
.ebgoods-gallery .goods-img .goods-sns ul .s-facebook a:hover {color:#fff;background:#405892;border-color:#405892}
.ebgoods-gallery .goods-img .goods-sns ul .s-twitter a:hover {color:#fff;background:#4CA0EB;border-color:#4CA0EB}
.ebgoods-gallery .goods-img .goods-sns ul .s-google a:hover {color:#fff;background:#D8503F;border-color:#D8503F}
/* 상품정보 */
.ebgoods-gallery .goods-description {position:absolute;bottom:-35px;left:0;overflow:hidden;width:100%;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out}
.ebgoods-gallery .goods-box:hover .goods-description {bottom:20px}
.ebgoods-gallery .goods-description .goods-description-in {position:relative}
.ebgoods-gallery .goods-description .goods-name {width:45%;margin:0}
.ebgoods-gallery .goods-description .goods-name a {display:block;line-height:30px;font-weight:700;font-size:20px;color:#1b1b1b;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out}
.ebgoods-gallery .goods-description .goods-price {position:absolute;right:10px;bottom:50px;text-align:right;font-size:18px;color:#000}
.ebgoods-gallery .goods-description .goods-price span {display:block}
.ebgoods-gallery .goods-description .line-through {font-size:12px;color:#707070;text-decoration:line-through;margin-left:7px;font-weight:normal}
.ebgoods-gallery .goods-description .btn-more {margin-left:30px;border-width:1px 1px 0;border-style:solid;border-color:#013243;background:#fff;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out}
.ebgoods-gallery .goods-description .btn-more:hover {border-color:#4D8CAD}
.ebgoods-gallery .goods-description .btn-more a {padding:0 15px;line-height:30px;font-size:11px}
.ebgoods-gallery .goods-description .goods-info {position:relative;overflow:hidden;margin: 0;padding:10px;background:rgba(255,255,255,.3);border-top:1px solid #999}

.ebgoods-gallery .goods-description .goods-sns ul li:hover .facebook-icon {background:#5D82D1}
.ebgoods-gallery .goods-description .goods-sns ul li:hover .twitter-icon {background:#40BFF5}
.ebgoods-gallery .goods-description .goods-sns ul li:hover .google-icon {background:#EB5E4C}
.ebgoods-gallery .goods-description .goods-sns ul li:hover .wish-icon {background:#FF9500}
.ebgoods-gallery .goods-ratings {margin:0;padding:0;margin-right:3px}
.ebgoods-gallery .goods-ratings li {padding:0;margin-right:-3px}
.ebgoods-gallery .goods-ratings li .rating {color:#959595;line-height:normal;font-size:11px}
.ebgoods-gallery .goods-ratings li .rating-selected {color:#FF4848;font-size:11px}
/* 더보기 버튼 */
.ebgoods-gallery-wrap .btn-go-item {margin-top:20px}
.ebgoods-gallery-wrap .btn-go-item a {font-size:15px}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:767px) {
    .ebgoods-gallery-wrap .shop-main-title h2 {margin-bottom:20px;font-size:20px}
    .ebgoods-gallery-wrap .ebgoods-gallery-tabs {margin-bottom:30px}
    .ebgoods-gallery-wrap .ebgoods-gallery-tabs li a {font-size:12px;line-height:30px}
    .ebgoods-gallery .goods-description .goods-name a {line-height:25px;font-size:15px}
    .ebgoods-gallery .goods-box .goods-img .goods-sns {right:10px}
    .ebgoods-gallery .goods-box .goods-description {bottom:20px}
}
@media (max-width:580px) {
    .ebgoods-gallery .col-xs-6 {width:100%}
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
                <?php if (count($eb_goods['list']) > 0) { foreach ($eb_goods['list'] as $i => $data) { ?>
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
                                </div>
                            </a>
                            <?php if ($eb_goods['gi_view_sns'] == 'y') { ?>
                            <div class="goods-sns">
                                <ul>
                                    <li class="s-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $data['sns_url']; ?>&amp;p=<?php echo $data['sns_title']; ?>" target="_blank" class="facebook-icon" title="페이스북"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="s-twitter"><a href="https://twitter.com/share?url=<?php echo $data['sns_url']; ?>&amp;text=<?php echo $data['sns_title']; ?>" target="_blank" class="twitter-icon" title="트위터"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>

                        <?php if ($eb_goods['gi_view_it_icon']) { ?>
                            <?php echo $data['it_icon']; ?>
                        <?php } ?>

                        <div class="goods-description">
                            <div class="goods-description-in">
                                <h4 class="goods-name">
                                    <a href="<?php echo $data['href']; ?>">
                                        <?php echo $data['it_name']?>
                                    </a>
                                </h4>

                                <div class="goods-price">
                                    <?php if ($eb_goods['gi_view_it_cust_price'] == 'y' && $data['it_cust_price']) { ?>
                                    <span class="title-price line-through">₩ <?php echo number_format($data['it_cust_price']); ?></span>
                                    <?php } ?>
                                    <?php if ($eb_goods['gi_view_it_price'] == 'y') { ?>
                                    <span class="title-price">₩ <?php echo number_format($data['it_price']); ?></span>
                                    <?php } ?>
                                </div>
                                <div class="text-center margin-top-20">
                                    <div class="btn-more"><a href="<?php echo $data['href']; ?>">View Item</a></div>
                                </div>
                            </div>

                            <?php if(0) { //디자인상 미출력?>
                            <?php if ($eb_goods['gi_view_it_basic'] == 'y') { ?>
                            <p class="goods-info"><?php echo $data['it_basic']?></p>
                            <?php } ?>
                            <?php } ?>

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
                <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm">
                    <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebgoods_itemform&amp;thema=<?php echo $theme; ?>&amp;eg_code=<?php echo $eg_master['eg_code']; ?>&amp;gi_no=<?php echo $eb_goods['gi_no']; ?>&amp;w=u&amp;iw=u&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-dark"><i class="far fa-edit"></i> EB상품 아이템 설정</a>
                </div>
                <?php } ?>

                <?php if (count($eb_goods['list']) == 0) { ?>
                <p class="text-center font-size-13 color-grey margin-top-10"><i class="fas fa-exclamation-circle"></i> 등록된 상품이 없습니다.</p>
                <?php } ?>
            </div>
            <div class="text-center"><div class="btn-more btn-go-item"><a href="<?php echo $eb_goods['gi_link']; ?>">More View</a></div></div>
        </div>
        <?php }} ?>
    </div>
</div>
<?php } ?>