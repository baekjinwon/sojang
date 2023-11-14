<?php
/**
 * theme file : /theme/THEME_NAME/shop/index.html.php
 */
if (!defined('_EYOOM_')) exit;
?>
<style>
/*---------- 페이지 로더 ----------*/
.page-loader {position:fixed;top:0;left:0;z-index:9999;width:100%;height:100%;background:#fff}
.page-loader .logo-loader {position:absolute;top:50%;left:50%;transform:translate(-50%, -50%)}
.page-loader .logo-loader img {max-height:70px;width:auto;-webkit-transition:all .7s linear;-moz-transition:all .7s linear;-o-transition:all .7s linear;transition:all .7s linear}
.page-loader .logo-loader.active img {opacity:0}

/*---------- 카테고리 타이틀, 버튼 ----------*/
.shop-category-title {position:relative;margin-bottom:40px}
.shop-category-title:before {content:"";display:block;position:absolute;top:10px;width:100%;height:1px;background:#333}
.shop-category-title:after {content:"";display:block;clear:both}
.shop-category-title h2 {display:inline-block;position:relative;float:left;padding-right:20px;margin:0;font-size:20px;line-height:20px;font-weight:700;text-transform:uppercase;background:#fff}
.shop-category-title p {display:inline-block;position:relative;float:right;padding-left:20px;margin:0;line-height:20px;font-size:14px;color:#707070;background:#fff}
.btn-go-category {margin-top:20px}
/*---------- 섹션 ----------*/
.section {margin-bottom:70px;padding:0 40px}
/* 섹션1,3,4,7,9 */
.section {}
.section-03 .section-inner, .section-07 .section-inner {padding:80px 0;background-color:#FCFAF8}
/* 섹션9 */
.section-09 {margin-bottom:0}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:991px){
    .shop-category-title h2 {display:block;float:none;padding-bottom:10px;margin-bottom:10px;border-bottom:1px solid #333}
    .shop-category-title p {display:block;float:none;;padding:0}
    .section {margin-bottom:30px;padding:0}
    .section-03 { position:relative; }
    .section-03 .section-inner, .section-07 .section-inner {padding:40px 0}

    .section-03 .btn-go-all { position:absolute; top: 15px; right: 15px; }
}
</style>
<?php } ?>
<script src="https://t1.kakaocdn.net/kakao_js_sdk/2.0.0/kakao.min.js"
  integrity="sha384-PFHeU/4gvSH8kpvhrigAPfZGBDPs372JceJq3jAXce11bVA6rMvGWzvP4fMQuBGL" crossorigin="anonymous"></script>
<script>
  Kakao.init('c089c8172def97eb00c07217cae17495'); // 사용하려는 앱의 JavaScript 키 입력
</script>

<img id="kakaoTarget" src="/img/channel_add_small.png" style="z-index:1;position:fixed;right:14px;bottom:94px"
    alt="카카오톡 채널 추가하기 버튼" onclick="addChannel()" />

<script>
  function addChannel() {
    Kakao.Channel.addChannel({
      channelPublicId: '_ZeUTxl',
    });
  }
</script>
<?php /* 페이지 로더 */ ?>
<div class="page-loader">
    <div class="logo-loader">
        <?php if (file_exists($top_logo) && !is_dir($top_logo)) { ?>
        <img src="<?php echo $logo_src['top']; ?>" class="title-logo-image" alt="<?php echo $config['cf_title']; ?>">
        <?php } else { ?>
        <img src="<?php echo EYOOM_THEME_URL; ?>/image/site_logo.png" class="title-logo-image" alt="<?php echo $config['cf_title']; ?>">
        <?php } ?>
    </div>
</div>

<?php /* ---------- EB Slider - 메인 슬라이더 ---------- */ ?>
<section class="section section-01">
    <?php echo eb_slider('1562898008'); ?>
</section>


<style>
.ebcontents-slider-banner-caption{background-color: rgba(0,0,0,0.0) !important}
@media screen and (max-width: 992px){
	.menu-1{padding: 0 !important;height: 230px !important;margin-bottom: 5px;margin-top: 0 !important;}
	.menu-1-txt{display: flex;align-items: center;}
	.flex-c>p{margin: 0 !important;}
	.flex-c>div{height: 31.59px;margin-left: 4vw;overflow: hidden;}
	.menu-right{padding: 0 10px !important;}
	.menu-right l,
	.flex-c p{font-size: 32px !important}
		.menu-right l:last-of-type{margin-right: 4vw !important}
	.user-e{margin: 0 !important}
	.user-e>div{height: 300px !important;}
	.m-btn{width: 100% !important;background-color: transparent !important;}
	.m-btn::before{display: none;}
		.m-btn>a{justify-content: right !important;padding-right: 4vw;opacity: 0;}
	.m-user-e{background-position: center !important;background-size: 160% !important;}
		.m-user-e .user-e-txt{text-align: center !important;left: 50% !important;transform: translate(-50%, -50%) !important;}
		.all-menu{margin: 0 !important;padding: 0 15px !important;}
	.main-sec{padding: 0 !important;padding: 30px 0 !important;}
	.main-sec1{margin-bottom: 0px}
	.flex-c2{margin-right: 4vw}
}

@media screen and (max-width: 640px){
    .menu-1{height: 130px !important;}
    .menu-1-txt{transform: translateY(0%) !important;}
    .flex-c>div{height: 27.59px !important; }
    .menu-1>div{background-color: #fd5e5a;display: flex;align-items: center;justify-content: right;width: 100%;}
    .menu-3{background-position: 5% 50% !important}
    .menu-right .row:nth-of-type(1)>div .menu-3{background-color: #c557d6;}
    .menu-right .row:nth-of-type(2)>div .menu-3{background-color: #3ba3e5;}
    .menu-right .row:nth-of-type(3)>div .menu-3{background-color: #20b376;}
    .flex-c p{font-size: 24px !important}
    .menu-3 l{font-size: 24px !important}
    .goods-name{font-size: 14px !important;}
    .user-e>div{height: 200px !important}
    .user-e-txt{width: 70% !important}
    .user-e-txt p{font-size: 24px !important}
    .user-e-txt l{font-size: 16px !important}
    .m-user-e{background-position: center !important;background-size: 300% !important;}
}
@media screen and (max-width: 480px){
	.flex-c{display: flex;flex-direction: column;align-items: flex-start; padding-left:2vw;margin-right: 0vw;}
		.flex-c2{margin-right: 2vw}
    .menu-1{height: 80px !important;}
    .menu-1-txt{transform: translateY(0%) !important;}
    .flex-c>div{height: 27.59px !important}
    .menu-1>div{background-color: #fd5e5a;width: 100%;}
    .menu-1-txt{display: flex;justify-content: center;align-items: center;;margin-right: 0 !important;}
    .flex-c p{font-size: 18px !important;}
    .flex-c>div{margin-left: 0 !important;margin-top: 5px !important;}
    .menu-3 l:last-of-type{margin: 0 !important}
    .menu-3 l{font-size: 18px !important;margin-right: 0 !important;}
    .menu-3{align-items: center;padding: 0 !important;padding-right: 20px !important;}
    .menu-3>br{display: none}
    .menu-3>div{margin-top: 5px !important}
    .goods-description-in{flex-direction: column;justify-content: center !important;}
    .goods-price{height: 27.59px;margin-top: 5px;}
    .goods-name{text-align: center}
    .text-center{height: 27.59px}
    .btn-more{margin-top: 0px !important}
    .user-e-txt>p{font-size: 20px !important}
    .user-e-txt>l{font-size: 14px !important}
    .menu-1-btn{margin-top: 5px !important}
    .menu-right>div>div{height: 80px !important}
    .user-e>div{height: 100px !important}
    .user-e-txt>p{font-size: 16px !important;margin-bottom: 5px !important;}
    .user-e-txt>l{font-size: 12px !important}
}

/*@media screen and (max-width: 440px){
.m-user-e{background-size: cover !important}

}*/
@media screen and (max-width: 350px){
.goods-name{font-size: 12px !important;}
.user-e-txt>p{font-size: 18px !important}
.user-e-txt>l{font-size: 12px !important}

}
@media screen and (max-width: 340px){
.goods-name{font-size: 10px !important;}

}
@media screen and (max-width: 280px){
.ebgoods-gallery>div{width: 100% !important}

}

.doc_menu1 { transform: translateY(-50%);  }
.doc_txt1 { font-weight: bold; font-size: 40px; margin-bottom: 0; color: #fff; }
.doc_menu1_txt { top: 72px; position: absolute; right: 60px; }
.menu-1-btn { position: absolute; top: 236px; right: 63px;  }
.doc_txt2 { text-align: right; font-size:40px; margin-bottom: 40px; color: #fff; }
.btn_doc1 {  float: right; margin-top:0px; background-color: #5b0fd1; }
.doc_box {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: right;
    background-position: left;
    background-repeat: no-repeat;
    background-size: cover;
    color: #fff;
    padding-right: 40px;
}
.doc_menu2 { background-image: url(/img/box_2.png); }
.doc_menu3{ background-image: url(/img/box_3.png); }
.doc_menu4 { background-image: url(/img/box_4.png); }

.cate_susik_1 {
    height:100%;
    background-image: url(/img/box_1.png);
    background-position: left;
    background-repeat: no-repeat;
    background-size: cover;    
}

@media screen and (max-width: 992px){
    .doc_menu1 { width: 100%; justify-content: space-between; }
    .doc_menu2 { position:relative;  }
    .flex-c { position:absolute; left:0px;  }
    .goods-box .btn-go-category { position:absolute; right:15px;  }
    .doc_txt2 { text-align: left;  }
    .doc_flex { width: 49%;  }
    .menu-1 { position:relative;  }
    .cate_susik_1 {
        background-image: url(/img/box_1_m.jpg);
        background-position: -11px;        
    }
    .menu-3-txt { position:absolute; left:28vw;   }
    .doc_menu1_txt { top:initial; right:initial; left: 28vw;  }
    .menu-1-btn { top:0px; right:15px;  }
}

@media (max-width: 767px){
    .ebgoods-gallery-wrap .ebgoods-gallery-tabs {
        flex-wrap: wrap;
    }
}
.ebgoods-gallery.row { display:flex; flex-wrap:wrap;  }
</style>
<!-- 법률서식 -->
<?php if($is_mobile){ ?>
    <div class="row" style="margin-top:-10px">
<?php }else{ ?>
    <div class="row all-menu" style="margin-left:27px;margin-right:42px;margin-top:-10px">
<?php } ?>
    <div class="col-md-4 menu-1" style="height:411px;margin-top:15px"><!-- 클래스 추가 0504 -->
        <!-- 수정사항 - 스타일 추가 -->
        <div class='cate_susik_1'>
        	<div class="icon-img">
        		  <img src="img/" alt="">
        	</div>
            <div class="menu-1-txt doc_menu1"><!-- 클래스 추가 0504 -->
            	<div class="flex-c flex-c2 doc_menu1_txt">
                    <p class='doc_txt1'>민사집행보전처분</p>
                    <p class='doc_txt2'>법률서식</p>
            	</div>
                
                <div class="btn_doc1 btn-more btn-go-category menu-1-btn" ><a href="/shop/list.php?ca_id=30" style="color: #fff;">바로가기</a></div>
            </div>
        </div>
        <!-- 여기까지 -->
    </div>
    <!-- 수정사항 - 스타일 추가 클래스 추가 0504 -->
    <div class="col-md-8 menu-right" style="padding:10px">
		<div class="row" style="padding:5px">		
		    <div style="height:130px">
		        <div class="menu-3 doc_box doc_menu2">
		            <div class="flex-c doc_flex menu-3-txt">
                        <l style="font-size:40px;font-weight:bold">민사소송</l>
                        <l style="font-size:40px;margin-right: 40px;">법률서식</l> 
                    </div>
		            <br>		            
		            <div style="background-color: #5b0fd1;margin-top:0px;" class="btn-more btn-go-category"><a href="/shop/list.php?ca_id=20" style="color: #fff;">바로가기</a></div>
		        </div>
		    </div>
		</div>

		<div class="row" style="padding:5px">
		    <div style="height:130px">
		        <div class="menu-3 doc_box doc_menu3">
                    <div class="flex-c doc_flex menu-3-txt">
                        <l style="font-size:40px;font-weight:bold">가사소송</l> 
                        <l style="font-size:40px;margin-right: 40px;">법률서식</l>
                    </div>
		            <br>
		            <div style="background-color: #5b0fd1;margin-top:0px;" class="btn-more btn-go-category"><a href="/shop/list.php?ca_id=10" style="color: #fff;">바로가기</a></div>
                </div>
		    </div>
		</div>

		<div class="row" style="padding:5px">
		    <div style="height:130px">
		        <div class="menu-3 doc_box doc_menu4">
                    <div class="flex-c doc_flex menu-3-txt">
                        <l style="font-size:40px;font-weight:bold">형사소송</l> 
                        <l style="font-size:40px;margin-right: 40px;">법률서식</l>
                    </div>
		            <br>
		            <div style="background-color: #5b0fd1;margin-top:0px;" class="btn-more btn-go-category"><a href="/shop/list.php?ca_id=80" style="color: #fff;">바로가기</a></div>
		        </div>
		    </div>
		</div>
    </div>
    <!-- 여기까지 -->
</div>

<?php /* ---------- EB Goods 스킨 -  THE REST IS HERE ---------- */ ?>
<section class="section section-03" style="margin-bottom:0px">
    <div class="section-inner main-sec main-sec1">
        <div class="container">
            <?php echo eb_goods('1563166858'); ?>
                        <!-- 수정사항 - 스타일 추가 1009 수정 -->
            <div class="text-center">
                <div class="btn-more" style="background-color: #fff;border-radius: 100px !important;border: 1px solid #5b0fd1 !important;"><a href="../shop/list.php?ca_id=10" style="color: #5b0fd1 !important;background-color: transparent !important;font-weight: bold !important;border: 0 !important;" class='main-sec1-href'>전체보기</a>
                </div>
            </div>
            <!-- 여기까지 -->

            <script>
                $(function(){
                    $('.main-sec1 .ebgoods-gallery-tabs a').click(function(){
                        var num = $(this).attr("href").split("-");
                        
                        switch(num[3]){
                            case("2"): var addr = "../shop/list.php?ca_id=10"; break;
                            case("3"): var addr = "../shop/list.php?ca_id=20"; break;
                            case("4"): var addr = "../shop/list.php?ca_id=30"; break;
                            case("5"): var addr = "../shop/list.php?ca_id=40"; break;
                            case("6"): var addr = "../shop/list.php?ca_id=50"; break;
                            case("7"): var addr = "../shop/list.php?ca_id=60"; break;
                            case("8"): var addr = "../shop/list.php?ca_id=70"; break;
                            case("9"): var addr = "../shop/list.php?ca_id=80"; break;
                            case("10"): var addr = "../shop/list.php?ca_id=90"; break;
                            case("11"): var addr = "../shop/list.php?ca_id=a0"; break;
                            case("12"): var addr = "../shop/list.php?ca_id=b0"; break;
                            case("13"): var addr = "../shop/list.php?ca_id=c0"; break;
                            default: var addr = "../shop/list.php?ca_id=10";
                        }                        

                        $('.main-sec1-href').attr("href", addr);
                    });
                })
            </script>
        </div>
    </div>
</section>

<section class="section section-03">
    <div class="section-inner main-sec main-sec2">
        <div class="container">
            <?php echo eb_goods('1662967131'); ?>
                        <!-- 수정사항 - 스타일 추가 1009 수정 -->
            <div class="text-center">
                <div class="btn-more" style="background-color: #fff;border-radius: 100px !important;border: 1px solid #5b0fd1 !important;"><a href="https://www.sojjang.com/shop/list.php?ca_id=10" style="color: #5b0fd1 !important;background-color: transparent !important;font-weight: bold !important;border: 0 !important;" class='main-sec2-href'>전체보기</a></div>
            </div>
            <!-- 여기까지 -->

            <script>
                $(function(){
                    $('.main-sec2 .ebgoods-gallery-tabs a').click(function(){
                        var num = $(this).attr("href").split("-");
                        
                        switch(num[3]){
                            case("2"): var addr = "../shop/list.php?ca_id=10"; break;
                            case("3"): var addr = "../shop/list.php?ca_id=20"; break;
                            case("4"): var addr = "../shop/list.php?ca_id=30"; break;
                            case("5"): var addr = "../shop/list.php?ca_id=40"; break;
                            case("6"): var addr = "../shop/list.php?ca_id=50"; break;
                            case("7"): var addr = "../shop/list.php?ca_id=60"; break;
                            case("8"): var addr = "../shop/list.php?ca_id=70"; break;
                            case("9"): var addr = "../shop/list.php?ca_id=80"; break;
                            case("10"): var addr = "../shop/list.php?ca_id=90"; break;
                            case("11"): var addr = "../shop/list.php?ca_id=a0"; break;
                            case("12"): var addr = "../shop/list.php?ca_id=b0"; break;
                            case("13"): var addr = "../shop/list.php?ca_id=c0"; break;
                            default: var addr = "../shop/list.php?ca_id=10";
                        }                        

                        $('.main-sec2-href').attr("href", addr);
                    });
                })
            </script>
        </div>
    </div>
</section>
<style>
	@media screen and (max-width: 768px){
		.user-ban{margin: 15px !important}
  }
</style>
<?php if($is_mobile){ ?>
    <div class="row" style="margin-top:-10px;margin-bottom:50px">
<?php }else{ ?>
    <div class="row user-e" style="margin-left:27px;margin-right:42px;margin-top:-10px;margin-bottom:50px"><!-- 스타일추가 0504-->
<?php } ?>
<!-- 수정사항 - 스타일 추가 -->
        <div class="col-md-6 user-ban" style="height:444px;margin-top:15px">
            <!-- 클래스 추가 --><div class="m-user-e" style="height:100%;position: relative;background-image: url(/img/back_img_right.png);background-position: left;background-repeat: no-repeat;background-size: cover;">
                <!--클래스 추가--><div class="user-e-txt" style="
                        position: absolute;left: 40px;top: 50%;transform: translateY(-50%);color: #fff;
                    ">
                                    <p style="
                        font-weight: bold;
                        font-size: 40px;
                        color: #fff;
                    ">유료회원혜택</p>
                                    <l style="
                        text-align: left;
                        font-size:20px;
                    ">소장닷컴의 유료회원이면 <br>
                    받을 수 있는 혜택<br>
                    이모든 혜택을 다 가져가세요!</l><br>
                                    
                </div><br>
                <!-- 클래스 추가 --><div style="margin-top:0px;position: absolute;right: 0;top: 0;width: 20%;height: 100%;background-color: #5b0fd1;" class="btn-more btn-go-category m-btn"><a href="/bbs/content.php?co_id=003" style="color: #fff;height: 100%;border: 0;display: flex;align-items: center;justify-content: center;font-size: 20px;">바로가기</a></div>
            </div>
        </div>
        <div class="col-md-6 user-ban" style="height:444px;margin-top:15px">
            <!-- 클래스 추가 --><div class="m-user-e" style="height:100%;position: relative;background-image: url(/img/back_img_left.png);background-position: left;background-repeat: no-repeat;background-size: cover;">
                <!--클래스 추가--><div class="user-e-txt" style="
                        position: absolute;left: 40px;top: 50%;transform: translateY(-50%);color: #fff;
                    ">
                                    <p style="
                        font-weight: bold;
                        font-size: 40px;
                        color: #fff;
                    ">기업회원헤택</p>
                                    <l style="
                        text-align: left;
                        font-size:20px;
                    ">소장닷컴의 기업회원으로 가입하면 <br>
                    받을 수 있는 혜택<br>
                    지금 혜택을 확인 해보세요!</l><br>
                                    
                </div><br>
                <!-- 클래스 추가 --><div style="margin-top:0px;position: absolute;right: 0;top: 0;width: 20%;height: 100%;background-color: #5b0fd1;" class="btn-more btn-go-category m-btn"><a href="/bbs/content.php?co_id=002" style="color: #fff;height: 100%;border: 0;display: flex;align-items: center;justify-content: center;font-size: 20px;">바로가기</a></div>
            </div>
        </div>
<!-- 여기까지 -->
    </div>
    <!-- 1:1 -->

    <?php 
        $sql11 = "select a.* , DATE_FORMAT(qa_datetime , '%Y-%m-%d') AS iq_date from g5_qa_content a order by qa_datetime desc limit 5";
        $result_sql11 = sql_query($sql11);
        function checkresult($a , $b){
            if($a == $b){
                echo "완료";
            }else{
                echo "답변대기";
            }
        }
    ?>
    <style>
    	.index_left .title{width: 100% !important;display: flex !important;align-items: center;}
    	    	.index_left .title>h2{width: 100px}
    	.index_left .title::after{display: block;content: '';height: 1px;background-color: #000;width: calc(100% - 100px)}
        .qna-view { position:absolute; top: -78px;right: 32px; }
    	@media screen and (max-width: 993px){
    		.qna{display: block !important}
			.index_right{width: 100% !important;display: none !important;}
			.index_left{width: 100% !important;padding: 0 !important;margin-bottom: 30px;}
			.index_left li{margin: 0 !important}
			.img_box{width: 50% !important;height: auto !important;}

            .qna-view { top: -13vw; right: 0vw; }
		}

        @media screen and (max-width: 640px){
            .index_left li .qna_title{font-size: 12px !important}
            .index_left .date{font-size: 10px !important;margin: 0;}
            .qna_i{font-size: 10px !important;margin: 0 !important;}
        }

        @media screen and (max-width: 350px){
            .index_left li{margin: 0 !important}
		}
    </style>
    <link rel="stylesheet" href="/css/sojang_index.css">
    <section class="section section-03" style="margin: 30px 0 !important">

    	<div class="section-inner" style="background-color: #fff;padding: 0 !important;">
    		<div class="container">
                
                <div class="qna" style="width: 100%;height: auto">

                    <div class="index_left" style="position:relative;width: calc(100% - 398px);padding-right: 30px">
                        <div class="qna-view">
                            <div class="text-center">
                                <div class="btn-more btn-go-all" style="background-color: #fff;border-radius: 100px !important;border: 1px solid #5b0fd1 !important;"><a href="https://www.sojjang.com/bbs/qalist.php" style="color: #5b0fd1 !important;background-color: transparent !important;font-weight: bold !important;border: 0 !important;">전체보기</a></div>
                            </div>
                        </div>

                        <div class="title"><h2 style="margin:0px;font-size: 20px;font-weight: bold;">1:1 문의</h2></div>

                        <ul>
                            <?php while($row = sql_fetch_array($result_sql11)) { ?>
                                <li style="justify-content: space-between">
                                    <div class="lqt" style="display: flex;align-items: center;">
                                        <p class="qna_title"><span>Q.</span> <a href="/bbs/qaview.php?qa_id=<?php echo $row['qa_id']; ?>"><?php echo $row['qa_subject']; ?></a></p>
                                        <div class="new" style="margin-bottom:5px">N</div>
                                    </div>

                                    <div class="rqt" style="display: flex;align-items: center;">
                                        <p class="date"><?php echo $row['iq_date']; ?></p>
                                        <div class="qna_i" style="margin-bottom:7px"><?php checkresult($row['qa_status'] , 1)?></div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="index_right">
                        <div class="img_box">
                            <img src="img/sojang_index_left.png" alt="">
                            <a href="https://www.sojjang.com/bbs/content.php?co_id=001">
                                <div class="view_more">이용방법</div>
                            </a>
                        </div>

                        <div class="img_box">
                            <img src="img/sojang_index_right.png" alt="">
                            <a href="/bbs/faq.php?fm_id=1">
                                <div class="view_more">자주하는 질문</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-03">
        <div class="section-inner">
            <div class="container">
            <?php echo eb_latest('1564637783'); ?>
                        <!-- 수정사항 - 스타일 추가 1009 수정 -->
            <div class="text-center">
                <div class="btn-more " style="background-color: #fff;border-radius: 100px !important;border: 1px solid #5b0fd1 !important;"><a href="https://www.sojjang.com/bbs/board.php?bo_table=gallery" style="color: #5b0fd1 !important;background-color: transparent !important;font-weight: bold !important;border: 0 !important;">전체보기</a></div>
            </div>
            <!-- 여기까지 -->
            </div>
        </div>
    </section>
<?php /* ---------- 추천상품 ---------- */ ?>
<!--
<section class="section section-04">
    <div class="container">
        <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
        <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="margin-top:-20px;">
            <div class="btn-group">
                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;amode=ittype&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> 유형별 상품진열 설정</a>
                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;thema=<?php echo $theme; ?>#anc_scf_index" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                    <i class="far fa-window-maximize"></i>
                </a>
            </div>
        </div>
        <?php } ?>

        <?php if($default['de_type1_list_use']) { ?>
            <div class="shop-category-title">
                <h2>Recommend Products</a></h2>
                <p>엄선된 제품만을 고객님께 추천합니다.</p>
            </div>
            <?php
            $list = new item_list($skin_dir.'/'.$default['de_type2_list_skin']);
            $list->set_type(2);
            $list->set_view('it_id', false);
            $list->set_view('it_name', true);
            $list->set_view('it_basic', true);
            $list->set_view('it_cust_price', true);
            $list->set_view('it_price', true);
            $list->set_view('it_icon', true);
            $list->set_view('sns', true);
            echo $list->run();
            ?>
            <div class="text-center">
                <div class="btn-more btn-go-category"><a href="<?php echo shop_type_url(2); ?>">More View</a></div>
            </div>
        <?php } ?>
    </div>
</section>
        -->
<?php /* ---------- EB Contents 스킨 - banner slider ---------- */ ?>
<!--
<section class="section section-05">
    <?php echo eb_contents('1563495767'); ?>
</section>
        -->
<?php /* ---------- 최신상품 시작 - NEW ARRIVALS ---------- */ ?>
<!--
<section class="section section-06">
    <div class="container">
        <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
        <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="margin-top:-20px;">
            <div class="btn-group">
                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;amode=ittype&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> 유형별 상품진열 설정</a>
                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;thema=<?php echo $theme; ?>#anc_scf_index" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                    <i class="far fa-window-maximize"></i>
                </a>
            </div>
        </div>
        <?php } ?>

        <?php if($default['de_type4_list_use']) { ?>
        <div class="shop-category-title">
            <h2>NEW ARRIVALS</h2>
            <p>새 시즌 새로운 제품을 지금 만나보세요.</p>
        </div>
        <?php
        $list = new item_list($skin_dir.'/'.$default['de_type3_list_skin']);
        $list->set_type(3);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_basic', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        echo $list->run();
    ?>
        <div class="text-center">
            <div class="btn-more btn-go-category"><a href="<?php echo shop_type_url(3); ?>">More View</a></div>
        </div>
        <?php } ?>
    </div>
</section>
        -->
<?php /* ---------- 이벤트 - 쇼핑몰현황/기타 > 이벤트관리에서 상품 등록합니다. ---------- */ ?>
<!--
<section class="section section-07 shop-section-event">
    <div class="section-inner">
        <div class="container">
            <?php include_once(EYOOM_THEME_SHOP_SKIN_PATH.'/boxevent.skin.html.php'); // 이벤트 ?>
        </div>
    </div>
</section>
        -->
<?php /* ---------- 이벤트박스 끝 ---------- */ ?>

<?php /* ---------- 할인상품 - BARGAIN SALE ---------- */ ?>
<!-- 수정사항 - 삭제
<section class="section section-08">
    <div class="container">
        <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
        <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="margin-top:-20px;">
            <div class="btn-group">
                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;amode=ittype&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> 유형별 상품진열 설정</a>
                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=configform&amp;thema=<?php echo $theme; ?>#anc_scf_index" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                    <i class="far fa-window-maximize"></i>
                </a>
            </div>
        </div>
        <?php } ?>

        <?php if($default['de_type5_list_use']) { ?>
        <div class="shop-category-title">
            <h2>BARGAIN SALE</h2>
            <p>특별한 할인 상품을 통해 피부에게 선물을 주세요.</p>
        </div>
        <?php
        $list = new item_list($skin_dir.'/'.$default['de_type5_list_skin']);
        $list->set_type(5);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_basic', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        echo $list->run();
        ?>
        <div class="text-center">
            <div class="btn-more btn-go-category"><a href="<?php echo shop_type_url(5); ?>">More View</a></div>
        </div>
        <?php } ?>
    </div>
</section>
여기까지 -->
<?php /* ---------- EB Contents 스킨 - banner slider ---------- */ ?>
<section class="section section-09">
    <?php echo eb_contents('1563514200'); ?>
</section>

<script>
/* 페이지 로더 */
$(window).load(function(){
    $(".logo-loader").addClass("active");
    setTimeout(function(){
        $(".page-loader").fadeOut(500);
    }, 900);
});
</script>
