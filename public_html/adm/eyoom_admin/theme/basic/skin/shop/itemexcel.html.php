<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/shop/itemexcel.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;
?>

<div class="admin-shop-itemexcel">
    <form name="fitemexcel" method="post" action="<?php echo $action_url1; ?>" enctype="MULTIPART/FORM-DATA" autocomplete="off" class="eyoom-form">
    <div class="headline">
        <h2>법률서식 대량등록</h2>
        <div class="clearfix"></div>
    </div>
    <div class="margin-bottom-30"></div>
    <div class="adm-table-form-wrap margin-bottom-30">
        <fieldset>
            <div class="cont-text-bg">
                <p class="bg-danger font-size-12">
                    <i class="fas fa-info-circle"></i> 등록할 법률서식이 많을 경우 대량등록을 대행해 드리고 습니다.<br>
                    <i class="fas fa-info-circle"></i> 엑셀파일을 <strong>다운로드하여</strong> 양식에 맞춰 작성한 후 등록해 주시면 됩니다.<br>
                    <i class="fas fa-info-circle"></i> 엑셀파일을 등록한후 등록하시고자 법률서식을 1개의 파일로 압축하여 고객센터>정보관리>대량등록요청 게시판에 올려주세요.<br>
                    <i class="fas fa-info-circle"></i> 대량등록 검수기간은 <strong>자료수량에 따라</strong> 차이가 있을 수 있습니다.

                </p>
            </div>
        </fieldset>

        <fieldset>
            <div class="text-center margin-top-10 margin-bottom-10">
                <a href="<?php echo G5_URL; ?>/<?php echo G5_LIB_DIR; ?>/Excel/itemexcel_eyoom.xls" class="btn btn-e-md btn-e-dark"><i class="fas fa-file-alt"></i> 서식일괄등록용 엑셀파일 다운로드</a>
            </div>
        </fieldset>

        <div class="table-list-eb">
            <?php if (!G5_IS_MOBILE) { ?>
            <div class="table-responsive">
            <?php } ?>
            <table class="table">
                <tbody>
                    <tr>
                        <th class="table-form-th">
                            <label for="excelfile" class="label">파일선택</label>
                        </th>
                        <td>
                            <label class="input input-file">
                                <div class="button"><input type="file" name="excelfile" id="excelfile" onchange="this.parentNode.nextSibling.value = this.value">엑셀파일 찾기</div><input type="text" readonly="">
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php if (!G5_IS_MOBILE) { ?>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php echo $frm_submit; ?>

    </form>
</div>