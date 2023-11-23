<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/shopetc/sale1today.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/jsgrid/jsgrid.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/jsgrid/jsgrid-theme.min.css" type="text/css" media="screen">',0);
?>

<style>
#admin-shop-sale1today .total-row {font-weight:bold;background:#FFF3E0}
</style>

<div class="admin-shop-sale1today">
    <div class="adm-headline">
        <h3><?php echo $date; ?> 일 매출현황 <button class="btn-e btn-e-dark" onclick="download()">다운로드</button></h3>
    </div>
    <script>
        
        function download(){
            /*
            $.ajax({
            type: "POST",
            data: {
                    date:''
                },
            url: g5_url+"/shop/sale1todaydownload.php",
            cache: false,
            async: false,
            success: function(data) {
                var_dump(data);
            }
        });
           
*/            
           location.href = "/shop/sale1todaydownload.php?fr_date=<?php echo isset($_REQUEST['date']) ? preg_replace('/[^0-9 :_\-]/i', '', $_REQUEST['date']) : ''; ?>";
        }
        </script>
    <?php if(G5_IS_MOBILE) { ?>
    <p class="font-size-11 color-grey text-right margin-bottom-5"><i class="fas fa-info-circle"></i> Note! 좌우스크롤 가능 (<i class="fas fa-arrows-alt-h"></i>)</p>
    <?php } ?>

    <div id="admin-shop-sale1today"></div>
</div>

<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/plugins/jsgrid/jsgrid.min.js"></script>
<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/js/jsgrid.js"></script>
<script>
!function () {
    var db = {
        deleteItem: function (deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1)
        },
        insertItem: function (insertingClient) {
            this.clients.push(insertingClient)
        },
        loadData  : function (filter) {
            return $.grep(this.clients, function (client) {
                return !(filter.주문번호)
            })
        },
        updateItem: function (updatingClient) {}
    };
    window.db    = db,
    db.clients   = [
        <?php
        for ($i=0; $i<count((array)$list); $i++) {            
        ?>
        {
            주문번호: "<a href='<?php echo G5_ADMIN_URL; ?>/?dir=shop&amp;pid=orderform&amp;od_id=<?php echo $list[$i]['od_id']; ?>'><?php echo $list[$i]['od_id']; ?></a>",
            구분: "<?php echo $list[$i]['chk_nomal']; ?>",
            주문자: "<a href='<?php echo $list[$i]['href']; ?>'><?php echo $list[$i]['od_name']; ?></a>",
            주문합계: "<?php echo number_format($list[$i]['orderprice']); ?>",
            쿠폰: "<?php echo number_format($list[$i]['couponprice']); ?>",
            무통장: "<?php echo number_format($list[$i]['receipt_bank']); ?>",
            가상계좌: "<?php echo number_format($list[$i]['receipt_vbank']); ?>",
            계좌이체: "<?php echo number_format($list[$i]['receipt_iche']); ?>",
            카드입금: "<?php echo number_format($list[$i]['receipt_card']); ?>",
            간편결제: "<?php echo number_format($list[$i]['save']['receipteasy']); ?>",
            휴대폰: "<?php echo number_format($list[$i]['receipt_hp']); ?>",
            포인트입금: "<?php echo number_format($list[$i]['od_receipt_point']); ?>",
            주문취소: "<?php echo number_format($list[$i]['od_cancel_price']); ?>",
            미수금: "<?php echo number_format($list[$i]['od_misu']); ?>",
        },
        <?php } ?>
    ];
}();

$(document).ready(function(){
    $("#admin-shop-sale1today").jsGrid({
        filtering      : false,
        editing        : false,
        sorting        : false,
        paging         : true,
        autoload       : true,
        controller     : db,
        deleteConfirm  : "정말로 삭제하시겠습니까?\n한번 삭제된 데이터는 복구할수 없습니다.",
        pageButtonCount: 5,
        pageSize       : <?php echo $config['cf_page_rows']; ?>,
        width          : "100%",
        height         : "auto",
        onRefreshed: function(args) {
            var items = args.grid.option("data");
            var total = {
                "주문번호": "합계",
                "구분": "",
                "주문자": "",
                "주문합계": "<strong class='color-indigo'><?php echo number_format($tot['orderprice']); ?></strong>",
                "쿠폰": "<?php echo number_format($tot['coupon']); ?>",
                "무통장": "<?php echo number_format($tot['receipt_bank']); ?>",
                "가상계좌": "<?php echo number_format($tot['receipt_vbank']); ?>",
                "계좌이체": "<?php echo number_format($tot['receipt_iche']); ?>",
                "카드입금": "<?php echo number_format($tot['receipt_card']); ?>",
                "간편결제": "<?php echo number_format($tot['receipteasy']); ?>",
                "휴대폰": "<?php echo number_format($tot['receipt_hp']); ?>",
                "포인트입금": "<?php echo number_format($tot['receipt_point']); ?>",
                "주문취소": "<strong class='color-pink'><?php echo number_format($tot['ordercancel']); ?></strong>",
                "미수금": "<strong class='color-pink'><?php echo number_format($tot['misu']); ?></strong>",
            };
            var $totalRow = $("<tr>").addClass("total-row");
            args.grid._renderCells($totalRow, total);
            args.grid._content.append($totalRow);
        },
        fields         : [
            { name: "주문번호", type: "text", align: "center",  },
            { name: "구분", type: "text", align: "center",  },
            { name: "주문자", type: "text", align: "center", },
            { name: "주문합계", type: "number",  },
            { name: "쿠폰", type: "number",  },
            { name: "무통장", type: "number",  },
            { name: "가상계좌", type: "number", },
            { name: "계좌이체", type: "number",  },
            { name: "카드입금", type: "number",  },
            { name: "간편결제", type: "number",  },
            { name: "휴대폰", type: "number",  },
            { name: "포인트입금", type: "number",  },
            { name: "주문취소", type: "number",  },
            { name: "미수금", type: "number",  },
        ]
    });
});
</script>