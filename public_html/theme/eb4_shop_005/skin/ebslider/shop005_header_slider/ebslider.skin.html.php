<?php
if (!defined('_EYOOM_')) exit;
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/slick/slick.min.css?ver=2" type="text/css" media="screen">',0);
?>

<?php /* eb슬라이더 편집 버튼 */ ?>
<?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
<div class="btn-edit-mode-wrap <?php if ($es_master['es_state'] == '2') { ?>hidden-message<?php } ?>">
	<div class="btn-edit-mode text-center hidden-xs hidden-sm">
		<div class="btn-group">
			<a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebslider_form&thema=<?php echo $theme; ?>&es_code=<?php echo $es_code; ?>&w=u&wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> EB슬라이더 마스터 설정</a>
			<a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebslider_form&thema=<?php echo $theme; ?>&es_code=<?php echo $es_code; ?>&w=u" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
				<i class="far fa-window-maximize"></i>
			</a>
			<button type="button" class="btn-e btn-e-xs btn-e-red popovers" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" data-content="
			<span class='font-size-11'>
			<strong class='color-indigo'>좌측 [EB슬라이더 설정하기] 버튼 클릭 후 아래 설명 참고</strong><br>
			<div class='margin-hr-5'></div>
			<span class='color-indigo'>[설정정보]</span><br>
			1. 슬라이더 마스터 제목 : 헤더 슬라이더<br>
			2. 스킨선택 : shop005_header_slider<br>
			3. 아이템 링크수 : 1개<br>
			4. 아이템 이미지수 : 1개<br>
			<span class='color-indigo'>[EB 슬라이더 - 아이템 관리]</span><br>
			1. EB 슬라이더 아이템 추가 클릭<br>
			2. 연결주소 [링크] 입력 (자세히보기 버튼 출력)<br>
			3. 이미지 #1업로드<br>
			<div class='margin-hr-5'></div>
			이미지 비율 700x192 픽셀 이미지 사용.<br>
			이미지 배너만 등록.
			</span>
		"><i class="fas fa-question-circle"></i>
			</button>
		</div>
	</div>
</div>
<?php } ?>

<?php if (isset($es_master) && $es_master['es_state'] == '1') { // 보이기 상태에서만 출력 ?>
<style>
/* --- 메인 슬라이더 --- */
.header-slider {position:relative}
.header-slider-inner {position:relative;overflow:hidden;display:none;padding:0 40px}
.header-slider .header-slider-list {margin-bottom:0}
.header-slider .header-slider-item {position:relative;outline:none;overflow:hidden}
/* 이미지 */
.header-slider .header-slider-image {position:relative}
.header-slider .header-slider-image a {display:block}
.header-slider .header-slider-image img {max-height:50px;width:auto}
/* 컨트롤 좌우 */
.header-slider .slick-next, .header-slider .slick-prev {width:30px;height:60px;-webkit-transition: all .3s ease;-moz-transition: all .3s ease;-o-transition: all .3s ease;-ms-transition: all .3s ease;transition: all .3s ease}
.header-slider .slick-next {right:-40px;z-index:1}
.header-slider .slick-prev {left:-40px;z-index:1}
.header-slider .slick-next:before, .header-slider .slick-prev:before {content:"";display:block;position:absolute;top:50%;width:10px;height:10px;margin-top:-5px;-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-o-transform:rotate(45deg);-ms-transform:rotate(45deg);transform:rotate(45deg)}
.header-slider .slick-next:before {right:10px;border-right:1px solid #999;border-top:1px solid #999}
.header-slider .slick-prev:before {left:10px;border-left:1px solid #999;border-bottom:1px solid #999}
.header-slider .slick-next:hover:before, .header-slider .slick-prev:hover:before {border-color:#707070}
</style>
<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:767px){
}
</style>
<?php } ?>

<div class="header-slider">
	<?php /* eb슬라이더 */ ?>
	<div class="header-slider-inner">
		<div class="header-slider-list">
		<?php if (is_array($slider)) { ?>
			<?php foreach ($slider as $k => $item) { ?>
			<div class="header-slider-item item-<?php echo $k + 1 ?>">
				<div class="header-slider-image">
    				<a href="<?php echo $item['href_1']; ?>" target="<?php echo $item['target_1']; ?>"><img src="<?php echo $item['src_1']?>" alt="image"></a>
				</div>
			
				<?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
				<div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="bottom:0">
					<a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&pid=ebslider_itemform&thema=<?php echo $theme; ?>&es_code=<?php echo $es_code; ?>&ei_no=<?php echo $item['ei_no']; ?>&w=u&iw=u&wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-dark"><i class="far fa-edit"></i> EB슬라이더 아이템 수정</a>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
		<?php } ?>

		<?php if ($es_default) { ?>
			<div class="header-slider-item">
				<div class="header-slider-image">
    				<a href=""><img src="<?php echo $ebslider_skin_url; ?>/image/01.jpg" alt="image"></a>
				</div>
			</div>
			<div class="header-slider-item">
				<div class="header-slider-image">
    				<a href=""><img src="<?php echo $ebslider_skin_url; ?>/image/01.jpg" alt="image"></a>
				</div>
			</div>
			<div class="header-slider-item">
				<div class="header-slider-image">
    				<a href=""><img src="<?php echo $ebslider_skin_url; ?>/image/01.jpg" alt="image"></a>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/slick/slick.min.js"></script>
	<script>
	$(window).load(function(){

		//slick 슬라이더 설정
		$('.header-slider-inner').show();
		$('.header-slider-list').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 10000,//10초
			arrows: true,
			dots: true,
			pauseOnHover: false,
		});
	});
	</script>
</div>
<?php } ?>