<?php
/**
 * skin file : /theme/THEME_NAME/skin/shop/basic/orderinquiry.sub.skin.html.php
 */
if (!defined('_EYOOM_')) exit;
?>

<style>
.od-num:hover {color:#FF4848}
.state-label {display:inline-block;color:#fff;padding:3px 5px;line-height:1;font-size:11px;min-width:62px;text-align:center}
.state-01 {background:#FF4848}
.state-02 {background:#73B852}
.state-03 {background:#907EEC}
.state-04 {background:#FDAB29}
.state-05 {background:#6284F3}
.state-06 {background:#fff;border:1px solid #d5d5d5;color:#656565}
</style>

<?php /* ---------- 주문 내역 목록 시작 ---------- */ ?>
<?php if (!$limit) { ?>
<P>총 <?php echo $cnt; ?> 건</P>
<?php } ?>

<blockquote class="hero">
	<p><i class="fas fa-info-circle"></i> 법률서식명을 클릭하시면 상세 주문내역으로 이동합니다. </p><!--박찬영 수정 -->
</blockquote>

<?php if (G5_IS_MOBILE) { ?>
<p class="text-right font-size-11 margin-bottom-5 color-grey">Note! 좌우 스크롤 (<i class="fas fa-arrows-alt-h"></i>)</p>
<?php } ?>

<div class="table-list-eb">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr><!--박찬영 수정 -->
                    <th scope="col">법률서식명</th>
                    <th scope="col" class="td-border">주문일시</th>
                    <th scope="col">구매완료일시</th>
                    <th scope="col" class="td-border">주문금액</th>
                    <th scope="col">입금액</th>
                    <!--<th scope="col" class="td-border">미입금액</th> 박찬영 수정 -->
                    <th scope="col">상태</th>
                </tr><!---->
            </thead>
            <tbody>
                <?php for ($i=0; $i<$count; $i++) { ?>
                <tr>
                    <td class="text-center">
                        <input type="hidden" name="ct_id[<?php echo $i; ?>]" value="<?php echo $list[$i]['ct_id']; ?>">
                        <a href="<?php echo $list[$i]['href']; ?>" class="od-num"><u><?php echo $list[$i]['od_id']; ?></u></a>
                    </td>
                    <?php 
                    $ct_item_sql = "select ct_history , it_id from g5_shop_cart where od_id = '{$list[$i]['od_id']}' limit 1";
                    $ct_item_result = sql_fetch($ct_item_sql);

                    $firstDate = explode('|',$ct_item_result['ct_history'])[2];
                    $secondDate = date('Y-m-d H:i:s');
                    
                    $dateDifference = abs(strtotime($secondDate) - strtotime($firstDate));
                    
                    $years  = floor($dateDifference / (365 * 60 * 60 * 24));
                    $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                    $days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
                    ?>
                    <td class="td-border text-center"><?php echo substr($list[$i]['od_time'],2,14); ?> (<?php echo get_yoil($list[$i]['od_time']); ?>)</td>
                    <td class="text-center"><?php
                        if($list[$i]['od_status'] == "취소"){
                            echo "취소";
                        }else{
                            echo $firstDate; 
                        }
                        
                    ?>
                    
                    </td>
                    <td class="td-border text-right"><?php echo display_price($list[$i]['od_price']); ?></td>
                    <td class="text-right"><?php echo display_price($list[$i]['od_receipt_price']); ?></td>
                    <!--<td class="td-border text-right"><?php echo display_price($list[$i]['od_misu']); ?></td> 박찬영 수정 -->
                    <td class="text-center">
                        <?php

                        if($ct_item_result['it_id'] != "1659019167" && $ct_item_result['it_id'] != "1672642574" && $ct_item_result['it_id'] != "1672642610" && $ct_item_result['it_id'] != "1672642648"){

                            if($list[$i]['od_status'] == "배송완료" || $list[$i]['od_status'] == "완료") {

                                if(4 > $days){
                                    echo "<a style='color:white' class='btn-e btn-e-lg btn-e-dark' href='".$list[$i]['href']."'>다운받기</a>";
                                }else {
                                    echo "기간초과";
                                }
                            }else{
                                echo "<span class='state-label state-0".$list[$i]['od_status_number']."'>".$list[$i]['od_status']."</span>";
                            }

                            if($list[$i]['od_status'] == "취소"){
                                echo "(주문취소)";
                            }
                        }else{
                            echo "<span class='state-label state-0".$list[$i]['od_status_number']."'>";

                            if($list[$i]['od_status'] == "배송완료" || $list[$i]['od_status'] == "완료"){
                                echo "구매완료"; 
                            }else{
                                echo $list[$i]['od_status']; 
                            }
                            echo "</span>";

                            if($list[$i]['od_status'] == "취소"){
                                echo "(주문취소)";
                            }
                            
                        }
                        ?>                        
                    </td>
                </tr>
                <?php } ?>

                <?php if ($count == 0) { ?>
                <tr><td colspan="7" class="text-center"><span class="color-grey"><i class="fas fa-exclamation-circle"></i> 주문 내역이 없습니다.</span></td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php /* ---------- 주문 내역 목록 끝 ---------- */ ?>