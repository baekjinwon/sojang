<?php
/**
 * theme file : /theme/THEME_NAME/shop/shop.head.html.php
 */
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR:300,400,700,900" rel="stylesheet">',0);

if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때
    add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/shop-style.css?ver='.G5_CSS_VER.'">',0);
} else if ($eyoom['is_responsive'] == '0' && !G5_IS_MOBILE) { // 비반응형이면서 PC버전일때
    add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/shop-style-nr.css?ver='.G5_CSS_VER.'">',0);
}
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/custom.css?ver='.G5_CSS_VER.'">',0);

/**
 * 로고 타입 : 'image' || 'text'
 */
$logo = 'image';

/**
 * 상품 이미지 미리보기 종류 : 'zoom' || 'slider'
 */
$item_view = 'zoom';
?>
<style>
	@media (max-width: 993px){
			.topbar-left{display: none !important;}
			.topbar-right{width: 100% !important;}
		} 
</style>
<?php if (!$wmode) { ?>
<div class="wrapper">
    <?php
    // 팝업창
    if(defined('_INDEX_') && $newwin_contents) { // index에서만 실행
        echo $newwin_contents;
    }
    ?>

    <?php /* 편집버튼 */ ?>
	<?php if ($is_admin) { // 관리자일 경우 ?>
	<div class="btn-edit-admin eyoom-form visible-lg">
        <input type="hidden" name="edit_mode" id="edit_mode" value="<?php echo $eyoom_default['edit_mode']; ?>">
		<label class="toggle red-toggle">
			<input type="checkbox" id="btn_edit_mode" <?php echo $eyoom_default['edit_mode'] == 'on' ? 'checked':''; ?>><i></i><span class="color-grey font-size-12">편집모드</span>
		</label>
	</div>
	<?php } ?>

	<?php if ($eyoom['layout'] == 'wide') { ?>
    <div class="wrapper-inner">
    <?php } else if ($eyoom['layout'] == 'boxed') { ?>
    <div class="wrapper-inner box-layout">
    <?php } ?>
        <?php /* Header Topbar */ ?>
        <div class="header-topbar">
            <div class="container clear-after top-menu1">
                <div class="topbar-left hidden-xs">
                    <?php echo eb_latest('1563521950'); ?>
                </div>

                <ul class="topbar-right list-unstyled">
                    <div class="member-menu">
                    <?php if ($is_admin == 'super' || $is_auth) { // 관리자일 경우 ?>
                        <li><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
                    <?php } ?>

                    <?php
                                $start_date_dl = new DateTime($member['dl_start_date']);
                                $end_date_dl = new DateTime($member['dl_end_date']);
                                $current_date_dl = new DateTime(date('Y-m-d'));
                            if ($is_admin != 'super' || $is_auth) {
                                if(($start_date_dl > $current_date_dl || $end_date_dl < $current_date_dl) && $is_member == true){ ?>
                                        <!--//1659019167 -->
                                    

                     <?php    }
                            }
                                
                            ?>
                    <li><a href="https://www.sojjang.com/bbs/content.php?co_id=premium_buy" style="color: red !important;">기간제 유료회원결제</a></li>
                    <?php if($member['auth'] == "2") { ?>
                    
                    <li><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>" style="color: red;">서식등록 관리</a></li><!--박찬영수정-->
                    <?php } ?>
                    <?php if ($is_member) { // 회원일 경우 ?>
                    <li><a href="<?php echo G5_BBS_URL; ?>/logout.php">로그아웃</a></li>
                    <li><a href="<?php echo G5_SHOP_URL; ?>/mypage.php">마이페이지</a></li>
                    <?php } else { ?>
                    <li><a href="<?php echo G5_BBS_URL; ?>/login.php">로그인</a></li>
                    <li><a href="<?php echo G5_BBS_URL; ?>/register.php">개인회원가입</a></li><!-- 박찬영 수정 0424 -->
                    <li><a href="<?php echo G5_BBS_URL; ?>/register_admin.php">기업회원가입</a></li>
                    <?php } ?>
                    <li><a href="<?php echo G5_BBS_URL; ?>/faq.php">고객센터</a></li><!-- 박찬영 수정 0424 -->
                </ul>
            </div>
        </div>
        <?php /* End Header Topbar */ ?>

        <div <?php if ($eyoom['sticky'] == 'y') echo 'id="header-fixed"'; ?> class="basic-layout">
            <?php /* Header Title */ ?>
            <div class="header-title">
                <div class="container clear-after">
                    <?php /* 로고 */ ?>
                    <div class="header-title-left">
                        <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
                        <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="top:-2px;left:15px;text-align:left">
                            <div class="btn-group">
                                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=biz_info&amp;amode=shoplogo&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> 로고 설정</a>
                                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=biz_info&amp;amode=shoplogo&amp;thema=<?php echo $theme; ?>" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                                    <i class="far fa-window-maximize"></i>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                        <h1>
                            <a href="<?php echo G5_URL; ?>">
                            <?php if ($logo == 'text') { ?>
                                <span class="title-logo-text"><?php echo $config['cf_title']; ?></span>
                            <?php } else if ($logo == 'image') { ?>
                                <?php if (!G5_IS_MOBILE) { ?>
                                <?php if (file_exists($top_logo) && !is_dir($top_logo)) { ?>
                                <img src="<?php echo $logo_src['top']; ?>" class="title-logo-image" alt="<?php echo $config['cf_title']; ?>">
                                <?php } else { ?>
                                <img src="<?php echo EYOOM_THEME_URL; ?>/image/site_logo.png" class="title-logo-image" alt="<?php echo $config['cf_title']; ?>">
                                <?php } ?>
                                <?php } else { ?>
                                <?php if (file_exists($top_mobile_logo) && !is_dir($top_mobile_logo)) { ?>
                                <img src="<?php echo $logo_src['mobile_top']; ?>" class="title-logo-image" alt="<?php echo $config['cf_title']; ?>">
                                <?php } else { ?>
                                <img src="<?php echo EYOOM_THEME_URL; ?>/image/site_logo.png" class="title-logo-image" alt="<?php echo $config['cf_title']; ?>">
                                <?php } ?>
                                <?php } ?>
                            <?php } ?>
                            </a>
                        </h1>
                    </div>

                    <?php /* 검색창 - pc */ ?>
                    <div class="header-title-center hidden-sm hidden-xs">
                        <div class="header-title-search">
                            <form name="frmsearch1" action="<?php echo G5_SHOP_URL; ?>/search.php" onsubmit="return search_submit(this);" class="eyoom-form">
                                <input type="hidden" name="sfl" value="wr_subject||wr_content">
                                <input type="hidden" name="sop" value="and">
                                <label for="head_sch_str" class="sound_only">검색어 입력 필수</strong></label>
                                <div class="input input-button">
                                    <input type="text" name="q" value="<?php echo stripslashes(get_text(get_search_string($q))); ?>" id="head_sch_str" class="sch_stx" placeholder="상품 검색어 입력" required>
                                    <div class="button"><input type="submit"><i class="fa fa-search"></i></div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php /* 배너 & 모바일 메뉴 버튼 */ ?>
                    <div class="header-title-right">
                        <div class="header-title-banner">
                            <div class="hidden-xs hidden-sm"><?php echo eb_slider('1563756526'); ?></div>
                            <div class="title-banner-icon mobile-nav-trigger">
                                <a href="#" class="sidebar-left-trigger" data-action="toggle" data-side="left">
                                    <div class="banner-icon-cart-btn">
                                        <i class="fas fa-bars"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php /* End Header Title */ ?>

            <?php /* Header Nav */ ?>
            <div class="header-nav header-sticky">
                <div class="navbar" role="navigation">
                    <div class="container">
                        <?php /* 메뉴 */ ?>
                        <nav class="header-nav sidebar left">
                            <div class="sidebar-left-content">
                                <?php /* 모바일 검색 // 991픽셀 이하에서만 출력 */ ?>
                                <div class="sidebar-search visible-xs visible-sm">
                                    <form name="frmsearch1" action="<?php echo G5_SHOP_URL; ?>/search.php" onsubmit="return search_submit(this);" class="eyoom-form">
                                        <input type="hidden" name="sfl" value="wr_subject||wr_content">
                                        <input type="hidden" name="sop" value="and">
                                        <label for="side_sch_str" class="sound_only">검색어 입력 필수</strong></label>
                                        <div class="input input-button">
                                            <input type="text" name="q" value="<?php echo stripslashes(get_text(get_search_string($q))); ?>" id="side_sch_str" placeholder="상품 검색어 입력" required>
                                            <div class="button"><input type="submit"><i class="fa fa-search"></i></div>
                                        </div>
                                    </form>
                                </div>

                                <?php /* 메뉴 편집 버튼 */ ?>
                                <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
                                <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="top:-2px">
                                    <div class="btn-group">
                                        <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=menu_list&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> 메뉴 설정</a>
                                        <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=menu_list" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                                            <i class="far fa-window-maximize"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                                <h5 class="mobile-nav-title">메인 메뉴</h5>
                                <?php /* Header Nav - 메인메뉴 */ ?>
                                <ul class="nav navbar-nav">
                                <?php if ($eyoom['use_eyoom_shopmenu'] == 'n') { // 영카트 분류가 쇼핑몰 메뉴 출력 ?>
                                    <?php if (isset($menu) && is_array($menu)) { ?>
                                    <?php foreach ($menu as $key => $menu_1) { ?>
                                    <li class="<?php if (isset($menu_1['active']) && $menu_1['active']) echo 'active'; ?> dropdown division">
                                        <a href="<?php echo $menu_1['href']; ?>" class="dropdown-toggle" <?php echo G5_IS_MOBILE ? 'data-toggle="dropdown"': 'data-hover="dropdown"'; ?>>
                                            <?php echo $menu_1['ca_name']; ?>
                                        </a>
                                        <?php $index2 = 0; $size2 = count((array)$menu_1['submenu']); ?>
                                        <?php if (isset($menu_1['submenu']) && is_array($menu_1['submenu'])) { ?>
                                        <?php foreach ($menu_1['submenu'] as $subkey => $menu_2) { ?>
                                        <?php if ($index2 == 0) { ?>
                                        <ul class="dropdown-menu">
                                        <?php } ?>
                                            <li class="<?php if (isset($menu_2['active']) && $menu_2['active']) echo 'active';?>">
                                                <a href="<?php echo $menu_2['href']; ?>"><?php echo $menu_2['ca_name']; ?></a>
                                            </li>
                                        <?php if ($index2 == $size2 - 1) { ?>
                                        </ul>
                                        <?php } ?>
                                        <?php $index2++; } ?>
                                        <?php } ?>
                                    </li>
                                    <?php } ?>
                                    <?php } ?>
                                <?php } else if ($eyoom['use_eyoom_shopmenu'] == 'y') { // 이윰 쇼핑몰 메뉴 출력 ?>
                                    <?php if (isset($menu) && is_array($menu)) { ?>
                                    <?php foreach ($menu as $key => $menu_1) { ?>
                                    <li class="<?php if (isset($menu_1['active']) && $menu_1['active']) echo 'active'; ?> <?php if (isset($menu_1['submenu']) && $menu_1['submenu']) echo 'dropdown'; ?> division">
                                        <a href="<?php echo $menu_1['me_link']; ?>" target="_<?php echo $menu_1['me_target']; ?>" class="dropdown-toggle disabled" <?php echo G5_IS_MOBILE && isset($menu_1['submenu']) && $menu_1['submenu'] ? 'data-toggle="dropdown"' : 'data-hover="dropdown"';?>>
                                            <?php if ($menu_1['me_icon']) { ?><i class="<?php echo $menu_1['me_icon']; ?>"></i><?php } ?>
                                            <?php echo $menu_1['me_name']?>
                                        </a>
                                        <?php if (isset($menu_1['submenu']) && is_array($menu_1['submenu'])) { ?>
                                        <a href="#" class="cate-dropdown-open dorpdown-toggle hidden-lg hidden-md" data-toggle="dropdown"></a>
                                        <?php } ?>
                                        <?php $index2 = 0; $size2 = count((array)$menu_1['submenu']); ?>
                                        <?php if (isset($menu_1['submenu']) && is_array($menu_1['submenu'])) { ?>
                                        <?php foreach ($menu_1['submenu'] as $subkey => $menu_2) { ?>
                                        <?php if ($index2 == 0) { ?>
                                        <ul class="dropdown-menu">
                                        <?php } ?>
                                            <li class="dropdown-submenu <?php if (isset($menu_2['active']) && $menu_2['active']) echo 'active';?>">
                                                <a href="<?php echo $menu_2['me_link']; ?>" target="_<?php echo $menu_2['me_target']; ?>">
                                                    <?php if (isset($menu_2['me_icon']) && $menu_2['me_icon']) { ?>
                                                    <i class="<?php echo $menu_2['me_icon']; ?>"></i>
                                                    <?php } ?>
                                                    <?php echo $menu_2['me_name']; ?>
                                                </a>
                                                <?php $index3 = 0; $size3 = count((array)$menu_2['subsub']); ?>
                                                <?php if (isset($menu_2['subsub']) && is_array($menu_2['subsub'])) { ?>
                                                <?php foreach ($menu_2['subsub'] as $ssubkey => $menu_3) { ?>
                                                <?php if ($index3 == 0) { ?>
                                                <ul class="dropdown-menu">
                                                <?php } ?>
                                                    <li class="dropdown-submenu <?php if (isset($menu_3['active']) && $menu_3['active']) echo 'active';?>">
                                                        <a href="<?php echo $menu_3['me_link']; ?>" target="_<?php echo $menu_3['me_target']; ?>">
                                                            <?php if (isset($menu_3['me_icon']) && $menu_3['me_icon']) { ?>
                                                            <i class="<?php echo $menu_3['me_icon']; ?>"></i>
                                                            <?php } ?>
                                                            <span class="hidden-md hidden-lg">-</span> <?php echo $menu_3['me_name']; ?>
                                                            <?php if (isset($menu_3['sub']) && $menu_3['sub'] == 'on') { ?>
                                                            <i class="fas fa-angle-right sub-caret hidden-sm hidden-xs"></i><i class="fas fa-angle-down sub-caret hidden-md hidden-lg"></i>
                                                            <?php } ?>
                                                        </a>
                                                    </li>
                                                <?php if ($index3 == $size3 - 1) { ?>
                                                </ul>
                                                <?php } ?>
                                                <?php $index3++; } ?>
                                                <?php } ?>
                                            </li>
                                        <?php if ($index2 == $size2 - 1) { ?>
                                        </ul>
                                        <?php } ?>
                                        <?php $index2++; } ?>
                                        <?php } ?>
                                    </li>
                                    <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <?php /* End Navbar */ ?>
            </div>
            <?php /* End Header Nav */ ?>

            <div class="header-sticky-space"></div>
        </div>

        <?php if (!defined('_INDEX_')) { ?>
        <div class="page-title-wrap">
            <div class="container">
            <?php if (!defined('_EYOOM_MYPAGE_')) { ?>
                <!-- <h2 class="pull-left">
                    <i class="fas fa-map-marker-alt"></i> <?php echo $subinfo['title']; ?>
                </h2> -->
                <?php if (!$it_id) { ?>
                <ul class="breadcrumb pull-right hidden-xs">
                    <?php echo $subinfo['path']; ?>
                </ul>
                <?php } ?>
                <div class="clearfix"></div>
            <?php } else { ?>
                <h2><i class="fas fa-map-marker-alt"></i> 마이페이지</h2>
            <?php } ?>
            </div>
        </div>
        <?php } ?>

        <?php /* Basic Body */ ?>
        <div class="basic-body <?php if (!defined('_INDEX_')) { ?>sub-basic-body<?php } ?>">
            <?php if (!defined('_INDEX_')) { ?>
            <div class="container">
            <?php } ?>
                <div class="row">
                <?php if ($side_layout['use'] == 'yes') { ?>
                    <?php
                    if ($side_layout['pos'] == 'left') {
                        /* 사이드영역 시작 */
                        include_once(EYOOM_THEME_SHOP_PATH . '/shop.side.html.php');
                        /* 사이드영역 끝 */
                    }
                    ?>
                    <section class="basic-body-main <?php if ($side_layout['pos'] == 'left') { echo 'right'; } else { echo 'left'; }?>-main col-md-9">
                <?php } else { ?>
                    <section class="basic-body-main col-md-12">
                <?php } ?>
<?php } ?>