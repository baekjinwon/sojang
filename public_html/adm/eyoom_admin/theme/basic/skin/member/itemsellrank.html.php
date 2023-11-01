<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/shopetc/itemsellrank.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/jsgrid/jsgrid.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/jsgrid/jsgrid-theme.min.css" type="text/css" media="screen">',0);
?>

<style>
.admin-shop-itemsellrank #admin-shop-itemsellrank img {display:block;width:100% \9;max-width:100%;height:auto}
</style>

<div class="admin-shop-itemsellrank">
    <div class="adm-headline adm-headline-btn">
        <h3>서식 판매 순위</h3>
        <?php if (!$wmode) { ?>
        <div class="headline-btn">            
        </div>
        <?php } ?>
    </div>

    <form id="flist" name="flist" class="eyoom-form" method="get">
    <input type="hidden" name="dir" value="<?php echo $dir; ?>" id="dir">
    <input type="hidden" name="pid" value="<?php echo $pid; ?>" id="pid">
    <input type="hidden" name="sst" id="sst" value="<?php echo $sst; ?>">
    <input type="hidden" name="sod" id="sod" value="<?php echo $sod; ?>">

    <div class="adm-table-form-wrap adm-search-box">
        <div class="table-list-eb">
            <?php if (!G5_IS_MOBILE) { ?>
            <div class="table-responsive">
            <?php } ?>
            <table class="table">
                <tbody>
                    <?php if (!G5_IS_MOBILE) { ?>
                    <tr>
                        <th class="table-form-th">
                            <label class="label">기간검색</label>
                        </th>
                        <td colspan="3">
                            <div class="inline-group">
                                <span>
                                    <label class="input">
                                        <input type="text" id="fr_date" name="fr_date" value="<?php echo $fr_date; ?>" maxlength="10">
                                    </label>
                                </span>
                                <span> - </span>
                                <span>
                                    <label class="input">
                                        <input type="text" id="to_date" name="to_date" value="<?php echo $to_date; ?>" maxlength="10">
                                    </label>
                                </span>
                                <span class="search-btns">
                                    <button type="button" onclick="javascript:set_date('오늘');" class="btn-e btn-e-sm btn-e-default">오늘</button>
                                    <button type="button" onclick="javascript:set_date('어제');" class="btn-e btn-e-sm btn-e-default">어제</button>
                                    <button type="button" onclick="javascript:set_date('이번주');" class="btn-e btn-e-sm btn-e-default">이번주</button>
                                    <button type="button" onclick="javascript:set_date('이번달');" class="btn-e btn-e-sm btn-e-default">이번달</button>
                                    <button type="button" onclick="javascript:set_date('지난주');" class="btn-e btn-e-sm btn-e-default">지난주</button>
                                    <button type="button" onclick="javascript:set_date('지난달');" class="btn-e btn-e-sm btn-e-default">지난달</button>
                                    <button type="button" onclick="javascript:set_date('전체');" class="btn-e btn-e-sm btn-e-default">전체</button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php if (!G5_IS_MOBILE) { ?>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php echo $frm_submit;?>

    <div class="margin-bottom-30"></div>

    <?php if(!$wmode) { ?>
    <div class="cont-text-bg margin-bottom-20">
        <p class="bg-info font-size-12"><i class="fas fa-info-circle"></i> 판매량을 합산하여 서식판매순위를 집계합니다.</p>
    </div>
    <?php } ?>

    <div class="row">
        <div class="col col-9">
            <div class="margin-bottom-5">
                <span class="font-size-12 color-grey">
                    <a href="<?php echo G5_ADMIN_URL; ?>/?dir=<?php echo $dir; ?>&amp;pid=<?php echo $pid; ?>">[전체목록]</a><span class="margin-left-10 margin-right-10 color-light-grey">|</span>등록상품 <?php echo number_format($total_count); ?>건
                </span>
            </div>
        </div>
        <div class="col col-3">
            <section>
                <label for="sort_list" class="select" style="width:200px;float:right;">
                    <select name="sort_list" id="sort_list" onchange="sorting_list(this.form, this.value);">
                        <option value="">:: 정렬방식선택 ::</option>
                        <option value="ct_status_1|asc" <?php echo $sort1=='ct_status_1' && $sort2=='asc' ? 'selected':''; ?>>쇼핑 정방향 (↓)</option>
                        <option value="ct_status_1|desc" <?php echo $sort1=='ct_status_1' && $sort2=='desc' ? 'selected':''; ?>>쇼핑 역방향 (↑) </option>
                        <option value="ct_status_2|asc" <?php echo $sort1=='ct_status_2' && $sort2=='asc' ? 'selected':''; ?>>주문 정방향 (↓)</option>
                        <option value="ct_status_2|desc" <?php echo $sort1=='ct_status_2' && $sort2=='desc' ? 'selected':''; ?>>주문 역방향 (↑) </option>
                        <option value="ct_status_3|asc" <?php echo $sort1=='ct_status_3' && $sort2=='asc' ? 'selected':''; ?>>입금 정방향 (↓)</option>
                        <option value="ct_status_3|desc" <?php echo $sort1=='ct_status_3' && $sort2=='desc' ? 'selected':''; ?>>입금 역방향 (↑) </option>
                        <option value="ct_status_4|asc" <?php echo $sort1=='ct_status_4' && $sort2=='asc' ? 'selected':''; ?>>준비 정방향 (↓)</option>
                        <option value="ct_status_4|desc" <?php echo $sort1=='ct_status_4' && $sort2=='desc' ? 'selected':''; ?>>준비 역방향 (↑) </option>
                        <option value="ct_status_5|asc" <?php echo $sort1=='ct_status_5' && $sort2=='asc' ? 'selected':''; ?>>배송 정방향 (↓)</option>
                        <option value="ct_status_5|desc" <?php echo $sort1=='ct_status_5' && $sort2=='desc' ? 'selected':''; ?>>배송 역방향 (↑) </option>
                        <option value="ct_status_6|asc" <?php echo $sort1=='ct_status_6' && $sort2=='asc' ? 'selected':''; ?>>완료 정방향 (↓)</option>
                        <option value="ct_status_6|desc" <?php echo $sort1=='ct_status_6' && $sort2=='desc' ? 'selected':''; ?>>완료 역방향 (↑) </option>
                        <option value="ct_status_7|asc" <?php echo $sort1=='ct_status_7' && $sort2=='asc' ? 'selected':''; ?>>취소 정방향 (↓)</option>
                        <option value="ct_status_7|desc" <?php echo $sort1=='ct_status_7' && $sort2=='desc' ? 'selected':''; ?>>취소 역방향 (↑) </option>
                        <option value="ct_status_8|asc" <?php echo $sort1=='ct_status_8' && $sort2=='asc' ? 'selected':''; ?>>반품 정방향 (↓)</option>
                        <option value="ct_status_8|desc" <?php echo $sort1=='ct_status_8' && $sort2=='desc' ? 'selected':''; ?>>반품 역방향 (↑) </option>
                        <option value="ct_status_9|asc" <?php echo $sort1=='ct_status_9' && $sort2=='asc' ? 'selected':''; ?>>품절 정방향 (↓)</option>
                        <option value="ct_status_9|desc" <?php echo $sort1=='ct_status_9' && $sort2=='desc' ? 'selected':''; ?>>품절 역방향 (↑) </option>
                        <option value="ct_status_sum|asc" <?php echo $sort1=='ct_status_sum' && $sort2=='asc' ? 'selected':''; ?>>합계 정방향 (↓)</option>
                        <option value="ct_status_sum|desc" <?php echo $sort1=='ct_status_sum' && $sort2=='desc' ? 'selected':''; ?>>합계 역방향 (↑) </option>
                    </select><i></i>
                </label>
            </section>
        </div>
    </div>

    <?php if(G5_IS_MOBILE) { ?>
    <p class="font-size-11 color-grey text-right margin-bottom-5"><i class="fas fa-info-circle"></i> Note! 좌우스크롤 가능 (<i class="fas fa-arrows-alt-h"></i>)</p>
    <?php } ?>

    <div id="admin-shop-itemsellrank"></div>

    </form>
</div>

<?php /* 페이지 */ ?>
<?php echo eb_paging($eyoom['paging_skin']);?>

<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/plugins/jsgrid/jsgrid.min.js"></script>
<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/js/jsgrid.js"></script>
<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/plugins/eyoom-form/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
function fsearchform_submit(num) {
    var f = document.flist;
    var number = parseInt(num)+1;
    
    for (var i=number; i<=4; i++) {
        $("#cate_"+number).val('');
    }
    f.submit();
}

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
                return !(filter.체크 && !(client.체크.indexOf(filter.체크) > -1) )
            })
        },
        updateItem: function (updatingClient) {}
    };
    window.db    = db,
    db.clients   = [
        <?php for ($i=0; $i<count((array)$list); $i++) { ?>
        {
            순위: "<?php echo $list[$i]['num']; ?>",
            이미지: "<div style='width:80px;margin:0 auto;'><a href='<?php echo $list[$i]['href']; ?>' target='_blank'><?php echo $list[$i]['image']; ?></a></div>",
            법률서식명: "<a href='<?php echo $list[$i]['href']; ?>' target='_blank'><?php echo cut_str($list[$i]['it_name'], 30); ?></a>",
            주문일시: "<?php echo $list[$i]['od_time']; ?>",
            구매완료일시: "<?php echo $list[$i]['od_receipt_time']; ?>",
            주문금액: "<?php echo $list[$i]['od_cart_price']; ?>",
            입금액: "<?php echo $list[$i]['od_receipt_price']; ?>",
            상태: "<?php echo $list[$i]['od_status']; ?>",
            
        },
        <?php } ?>
    ]
}();

$(document).ready(function() {
    $("#admin-shop-itemsellrank").jsGrid({
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
        fields         : [
            { name: "순위", type: "text", align: "center", width: 50 },
            { name: "이미지", type: "image", align: "center", width: 100 },
            { name: "법률서식명", type: "text", width: 250 },
            { name: "주문일시", type: "text", width: 60 },
            { name: "구매완료일시", type: "text", width: 60 },
            { name: "주문금액", type: "text", width: 60 },
            { name: "입금액", type: "text", width: 60 },
            { name: "상태", type: "ㅅㄷㅌㅅ", width: 60 },
        ]
    })
    $("#sort").click(function() {
        var field = $("#sortingField").val();
        $("#admin-shop-itemsellrank").jsGrid("sort", field);
    });
});

$(document).ready(function() {
    $('#fr_date').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        prevText: '<i class="fas fa-angle-left"></i>',
        nextText: '<i class="fas fa-angle-right"></i>',
        showMonthAfterYear: true,
        monthNames: ['년 1월','년 2월','년 3월','년 4월','년 5월','년 6월','년 7월','년 8월','년 9월','년 10월','년 11월','년 12월'],
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        dayNamesMin: ['일','월','화','수','목','금','토'],
        onSelect: function(selectedDate){
            $('#to_date').datepicker('option', 'minDate', selectedDate);
        }
    });
    $('#to_date').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        prevText: '<i class="fas fa-angle-left"></i>',
        nextText: '<i class="fas fa-angle-right"></i>',
        showMonthAfterYear: true,
        monthNames: ['년 1월','년 2월','년 3월','년 4월','년 5월','년 6월','년 7월','년 8월','년 9월','년 10월','년 11월','년 12월'],
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        dayNamesMin: ['일','월','화','수','목','금','토'],
        onSelect: function(selectedDate){
            $('#fr_date').datepicker('option', 'maxDate', selectedDate);
        }
    });
});

function sorting_list(f, str) {
    var sort = str.split('|');

    $("#sort1").val(sort[0]);
    $("#sort2").val(sort[1]);

    if (sort[0] && sort[1]) {
        f.action = "<?php echo G5_ADMIN_URL; ?>/?dir=<?php echo $dir; ?>&pid=<?php echo $pid; ?>";
        f.submit();
    }
}

function set_date(today) {
    <?php
    $date_term = date('w', G5_SERVER_TIME);
    $week_term = $date_term + 7;
    $last_term = strtotime(date('Y-m-01', G5_SERVER_TIME));
    ?>
    if (today == "오늘") {
        document.getElementById("fr_date").value = "<?php echo G5_TIME_YMD; ?>";
        document.getElementById("to_date").value = "<?php echo G5_TIME_YMD; ?>";
    } else if (today == "어제") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME - 86400); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME - 86400); ?>";
    } else if (today == "이번주") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', strtotime('-'.($date_term + 6).' days', G5_SERVER_TIME)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME); ?>";
    } else if (today == "이번달") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-01', G5_SERVER_TIME); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME); ?>";
    } else if (today == "지난주") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', strtotime('-'.$week_term.' days', G5_SERVER_TIME)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', strtotime('-'.($week_term - 6).' days', G5_SERVER_TIME)); ?>";
    } else if (today == "지난달") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-01', strtotime('-1 Month', $last_term)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-t', strtotime('-1 Month', $last_term)); ?>";
    } else if (today == "전체") {
        document.getElementById("fr_date").value = "";
        document.getElementById("to_date").value = "";
    }
}
</script>