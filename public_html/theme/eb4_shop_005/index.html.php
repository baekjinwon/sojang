<?php
/**
 * theme file : /theme/THEME_NAME/index.html.php
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
    .section-03 .section-inner, .section-07 .section-inner {padding:40px 0}
}
</style>
<?php } ?>

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

<section class="section section-02">
    <div class="container">
        <?php echo eb_latest('1564637783'); ?>
    </div>
</section>

<section class="section section-03">
    <div class="container">
        <div class="row">
            <div class="col-md-6 md-margin-bottom-30">
                <?php echo eb_latest('1564637667'); ?>
            </div>
            <div class="col-md-6">
                <?php echo eb_latest('1564637728'); ?>
            </div>
        </div>
    </div>
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