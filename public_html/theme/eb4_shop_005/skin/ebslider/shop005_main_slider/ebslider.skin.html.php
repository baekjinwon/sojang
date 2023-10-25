<?php
if (!defined('_EYOOM_')) exit;
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/slick/slick.min.css?ver=2" type="text/css" media="screen">',0);
?>

<?php /* eb슬라이더 편집 버튼 */ ?>
<?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
<div class="btn-edit-mode-wrap <?php if ($es_master['es_state'] == '2') { ?>hidden-message<?php } ?>">
	<div class="btn-edit-mode text-center hidden-xs hidden-sm" style="top:80px">
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
			1. 슬라이더 마스터 제목 : 메인 슬라이더<br>
			2. 스킨선택 : shop005_main_slider<br>
			3. 아이템 링크수 : 1개<br>
			4. 아이템 이미지수 : 1개<br>
			<span class='color-indigo'>[EB 슬라이더 - 아이템 관리]</span><br>
			1. EB 슬라이더 아이템 추가 클릭<br>
			2. 대표 타이틀 입력<br>
			3. 서브 타이틀 입력<br>
			4. 설명문구 입력<br>
			5. 연결주소 [링크] 입력 (자세히보기 버튼 출력)<br>
			6. 이미지 #1업로드<br>
			<div class='margin-hr-5'></div>
			이미지 비율 2560x1200 픽셀 이미지 사용.<br>
			대표 타이틀, 서브 타이틀, 설명문구 순으로 문구가 출력.<br>
			설명문구에 span태그 사용시 노란색 출력.
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
.main-slider {position:relative;min-width:1170px}
.main-slider-inner {position:relative;overflow:hidden;display:none}
.main-slider .main-slider-list {margin-bottom:0}
.main-slider .main-slider-item {position:relative;outline:none;overflow:hidden}
/* 이미지 */
.main-slider .main-slider-image {position:relative}
/* 내용 */
.main-slider .main-slider-caption {position:absolute;top:50%;left:0%;transform:translateY(-50%);width:70%;padding-left:100px}
.main-slider .main-slider-caption h4 {display:inline-block;position:relative;margin:0 0 10px;color:#fff}
.main-slider .main-slider-caption h4:before {content:"";display:block;position:absolute;top:-17px;left:-1%;z-index:-1;width:102%;height:100%;background:rgba(209, 134, 33, 0.5)}
.main-slider .main-slider-caption h4 span {display:block;margin-bottom:10px;line-height:20px;font-size:20px;font-weight:300;color:#F3B53F}
.main-slider .main-slider-caption h4 strong {display:block;line-height:80px;font-size:80px;letter-spacing:1px;text-transform:uppercase}
.main-slider .main-slider-caption p {margin-bottom:25px;line-height:30px;font-size:20px;font-weight:300;color:#fff;}
.main-slider .main-slider-caption p span {color:#F3B53F}
/* 더보기 버튼 */
.main-slider .main-slider-caption .btn-more a {color:#fff;border-color:#fff}
.main-slider .main-slider-caption .btn-more a:hover {border-color:#F3B53F}
/* 애니메이션 - 내용, 버튼 */
.main-slider .main-slider-caption h4 span, .main-slider .main-slider-caption h4 strong, .main-slider .main-slider-caption p, .main-slider .main-slider-caption .btn-more {opacity:0;}
.main-slider .main-slider-caption h4 span {-webkit-transform:translateX(-50px);transform:translateX(-50px)}
.main-slider .main-slider-caption h4 strong {-webkit-transform:translateX(-300px);transform:translateX(-300px)}
.main-slider .main-slider-caption p {-webkit-transform:translateX(-150px);transform:translateX(-150px)}
.main-slider .main-slider-caption .btn-more {-webkit-transform:translateX(-100px);transform:translateX(-100px)}
.main-slider .slick-current .main-slider-item.item-animation .main-slider-caption h4 span, .main-slider .slick-current .main-slider-item.item-animation .main-slider-caption h4 strong, .main-slider .slick-current .main-slider-item.item-animation .main-slider-caption p, .main-slider .slick-current .main-slider-item.item-animation .main-slider-caption .btn-more {opacity:1;-webkit-transform:translateX(0);transform:translateX(0);-webkit-transition-delay:.5s;transition-delay:.5s;-webkit-transition-property:opacity, transform;transition-property:opacity, transform;-webkit-transition-timing-function:ease;transition-timing-function:ease;}
.main-slider .slick-current .main-slider-item.item-animation .main-slider-caption h4 span {-webkit-transition-duration:2s;transition-duration:2s}
.main-slider .slick-current .main-slider-item.item-animation .main-slider-caption h4 strong {-webkit-transition-duration:1.5s;transition-duration:1.5s}
.main-slider .slick-current .main-slider-item.item-animation .main-slider-caption p {-webkit-transition-duration:2.5s;transition-duration:2.5s}
.main-slider .slick-current .main-slider-item.item-animation .main-slider-caption .btn-more {-webkit-transition-duration:3s;transition-duration:3s}

/* 컨트롤 점 - 숫자 */
.main-slider .slick-dots {bottom:50px;padding-left:100px;text-align:left;}
.main-slider .slick-dots li {display:inline-block;margin:0 1px 0 0;width:40px;height:40px;line-height:40px;text-align:center;font-size:15px;border-bottom:1px solid #8c96a4;color:#8c96a4;-webkit-transition:all .3s ease;-moz-transition:all .3s ease;-o-transition:all .3s ease;-ms-transition:all .3s ease;transition:all .3s ease}
.main-slider .slick-dots li:hover {background:rgba(200,200,200,.2)}
.main-slider .slick-dots li.slick-active {color:#FDFCFB;border-color:#FDFCFB}
/* 컨트롤 좌우 */
.main-slider .slick-next, .main-slider .slick-prev {width:30px;height:60px;-webkit-transition: all .3s ease;-moz-transition: all .3s ease;-o-transition: all .3s ease;-ms-transition: all .3s ease;transition: all .3s ease}
.main-slider .slick-next {right:15px;z-index:1}
.main-slider .slick-prev {left:15px;z-index:1}
.main-slider .slick-next:before, .main-slider .slick-prev:before {content:"";display:block;position:absolute;top:50%;width:40px;height:40px;margin-top:-20px;-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-o-transform:rotate(45deg);-ms-transform:rotate(45deg);transform:rotate(45deg)}
.main-slider .slick-next:before {right:10px;border-right:1px solid #999;border-top:1px solid #999}
.main-slider .slick-prev:before {left:10px;border-left:1px solid #999;border-bottom:1px solid #999}
.main-slider .slick-next:after, .main-slider .slick-prev:after {content:"";display:block;position:absolute;top:50%;width:0;height:1px;background:#999;-webkit-transition:all 0.4s ease-in-out;-moz-transition:all 0.4s ease-in-out;-o-transition:all 0.4s ease-in-out;transition:all 0.4s ease-in-out}
.main-slider .slick-next:after {right:3px}
.main-slider .slick-prev:after {left:3px}
.main-slider .slick-next:hover:after, .main-slider .slick-prev:hover:after {width:40px}
</style>
<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:1199px){
    .main-slider {min-width:inherit}
    .main-slider .main-slider-caption h4 strong {line-height:70px;font-size:70px}
    .main-slider .main-slider-caption p {line-height:30px;font-size:18px}
}
@media (max-width:991px){
    .main-slider .main-slider-caption h4 span {line-height:15px;font-size:15px}
    .main-slider .main-slider-caption h4 strong {line-height:60px;font-size:60px}
    .main-slider .main-slider-caption p {margin-bottom:15px;line-height:25px;font-size:15px}
	.main-slider .slick-next {right:10px}
    .main-slider .slick-prev {left:10px}
}
@media (max-width:767px){
	.main-slider .main-slider-caption {top:20px;transform:translateY(0);width:100%;max-width:inherit;padding:0 15px}
    .main-slider .main-slider-caption h4 span {line-height:13px;font-size:13px}
    .main-slider .main-slider-caption h4 strong {line-height:35px;font-size:35px}
    .main-slider .main-slider-caption h4:before {top:-10px}
    .main-slider .main-slider-caption p {overflow:hidden;height:0;margin-bottom:10px}
	.main-slider .slick-dots {bottom:20px;padding-left:15px}
	.main-slider .slick-dots li {width:30px;height:30px;line-height:30px;font-size:13px}
	.main-slider .slick-next, .main-slider .slick-prev {display:none !important}
}
@media (max-width:530px){
    .main-slider .main-slider-caption h4 strong {line-height:25px;font-size:25px}
}
</style>
<?php } ?>

<div class="main-slider">
	<?php /* eb슬라이더 */ ?>
	<div class="main-slider-inner">
		<div class="main-slider-list">
		<?php if (is_array($slider)) { ?>
			<?php foreach ($slider as $k => $item) { ?>
			<div class="main-slider-item item-<?php echo $k + 1 ?>">
				<div class="main-slider-image">
					<?php
					$fileinfo = pathinfo($item['src_1']);
					$eext = $fileinfo['extension'];
					$epath = $fileinfo['dirname'];
					$efilename = $fileinfo['filename'];
					if(is_mobile()) $efilename .= "_mob";

					$slideimg = $epath."/".$efilename.".".$eext;
					
					?>
    				<img src="<?php echo $slideimg?>" alt="image" class="img-responsive">
				</div>
				<div class="main-slider-caption">
    				<div class="caption-title"></div>
					<h4>
    					<?php if ($item['ei_title']) { ?>
    					<span><?php echo $item['ei_title']?></span>
    					<?php } ?>
    					<?php if ($item['ei_subtitle']) { ?>
    					<strong><?php echo $item['ei_subtitle']?></strong>
    					<?php } ?>
    				</h4>
					<?php if ($item['ei_text']) { ?>
					<p><?php echo $item['ei_text'] ?></p>
					<?php } ?>
					<?php if ($item['href_1']) { ?>
					<div class="btn-more"><a href="<?php echo $item['href_1']; ?>" target="<?php echo $item['target_1']; ?>">More View</a></div>
					<?php } ?>
				</div>
				
				<?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
				<div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="bottom:30px">
					<a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&pid=ebslider_itemform&thema=<?php echo $theme; ?>&es_code=<?php echo $es_code; ?>&ei_no=<?php echo $item['ei_no']; ?>&w=u&iw=u&wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-dark"><i class="far fa-edit"></i> EB슬라이더 아이템 수정</a>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
		<?php } ?>

		<?php if ($es_default) { ?>
			<div class="main-slider-item">
				<div class="main-slider-image">
    				<img src="<?php echo $ebslider_skin_url; ?>/image/01.jpg" alt="image" class="img-responsive">
				</div>
				<div class="main-slider-caption">
    				<div class="caption-title"></div>
					<h4>
    					<span>Make Your Life Bright</span>
    					<strong>Modern Lamp</strong>
    				</h4>
					<p>눈이 아프지 않은 램프는 공간을 빛나게 합니다.<br><span>Lamp Store</span>의 북유럽 감성 모던 램프를 만나보세요.</p>
					<div class="btn-more"><a href="#">More View</a></div>
				</div>
			</div>
			<div class="main-slider-item">
				<div class="main-slider-image">
    				<img src="<?php echo $ebslider_skin_url; ?>/image/02.jpg" alt="image" class="img-responsive">
				</div>
				<div class="main-slider-caption">
    				<div class="caption-title"></div>
					<h4>
    					<span>Make Your Comfort</span>
    					<strong>Room Lights</strong>
    				</h4>
					<p>눈이 아프지 않은 램프는 공간을 빛나게 합니다.<br><span>Lamp Store</span>의 북유럽 감성 모던 램프를 만나보세요.</p>
					<div class="btn-more"><a href="#">More View</a></div>
				</div>
			</div>
			<div class="main-slider-item">
				<div class="main-slider-image">
    				<img src="<?php echo $ebslider_skin_url; ?>/image/03.jpg" alt="image" class="img-responsive">
				</div>
				<div class="main-slider-caption">
    				<div class="caption-title"></div>
					<h4>
    					<span>Make Life Brilliant</span>
    					<strong>Kitchen Lamp</strong>
    				</h4>
					<p>눈이 아프지 않은 램프는 공간을 빛나게 합니다.<br><span>Lamp Store</span>의 북유럽 감성 모던 램프를 만나보세요.</p>
					<div class="btn-more"><a href="#">More View</a></div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/slick/slick.min.js"></script>
	<script>
	$(window).load(function(){
		//시작시 애니메이션 효과 주기
		setTimeout(function() {
			$('.main-slider-item').addClass("item-animation");
		}, 900);

		//slick 슬라이더 설정
		try{
		$('.main-slider-inner').show();
		$('.main-slider-list').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 10000,//10초
			arrows: true,
			dots: true,
			pauseOnHover: false,
		});
	}catch(error){
		
	}
		// 컨트롤 점에 숫자 입력
		var sliderItem = $('.main-slider .main-slider-item').length;
		for(var i=0;i<sliderItem;i++) {
			var itemNum = "0"+(i+1);
			$(".main-slider-inner .slick-dots li").eq(i).text(itemNum);
		}
	});
	</script>
</div>
<?php } ?>