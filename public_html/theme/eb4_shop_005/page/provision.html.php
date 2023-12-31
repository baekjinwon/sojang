<?php
/**
 * page file : /theme/THEME_NAME/page/provision.html.php
 */
if (!defined('_EYOOM_')) exit;
?>

<style>
body{position: relative;}
.menu-tab .active{border-color: #333 !important;color: #333 !important;}
.menu-tab>a{transition: 0.3s;}
.menu-tab>a:hover{border-color: #333 !important;color: #333 !important;}
@media (max-width: 480px) {
  		.menu-tab{flex-direction: column;}
		.menu-tab>a{width: 100% !important;margin: 0 !important;margin-bottom: 10px !important;}
		.menu-tab>a:last-of-type{margin-bottom: 0;}
}
</style>
<div class="menu-tab" style="max-width: 1200px;width: 100%;display: flex;margin-bottom: 50px;padding-bottom: 10px;align-items: center;position: sticky;top: 0;background-color: #fff;">
    <a href="javascript:tabchange(1)" id="tabbtn1" style="width: 31.333%;border-radius: 5px !important;align-items: center;justify-content: center;display: flex;height: 40px;border: 1px solid #999;color: #999;margin-right: 3%;" class="tabbtn active">회원가입 이용약관</a>
    <a href="javascript:tabchange(2)" id="tabbtn2" style="width: 31.333%;border-radius: 5px !important;align-items: center;justify-content: center;display: flex;height: 40px;border: 1px solid #999;color: #999;margin-right: 3%;" class="tabbtn">서비스 이용약관</a>
    <a href="javascript:tabchange(3)" id="tabbtn3" style="width: 31.333%;border-radius: 5px !important;align-items: center;justify-content: center;display: flex;height: 40px;border: 1px solid #999;color: #999;" class="tabbtn">자료등록 서약서</a>
</div>
<style>
.tab-2 { display:none; }
.tab-3 { display:none; }
</style>
<script>
	function tabchange(key){
		$(".tabbtn").removeClass("active");
        $("#tabbtn"+key).addClass("active");
		$(".tabl").hide();
		$(".tab-"+key).show();
	}
</script>
<div class="provision-page">
<div class="tab-1 tabl">
	<p style="font-size: 24px;font-weight: bold;margin-bottom: 30px;">회원가입 이용약관
	</p>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제1조 (목 적)
	</p>
	이 약관은 주식회사 메디멘토스에서 운영하는 https://www.sojjang.com(이하 "소장닷컴"이라 한
	다)에서 제공하는 인터넷 관련 서비스(이하 "서비스"라 한다)를 이용함에 있어 소장닷컴과 이
	용자의 권리/의무 및 책임사항을 규정함을 목적으로 합니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제2조 (용어정의)
	</p>
	① "소장닷컴" : 문서/서식 및 관련 컨텐츠를 서비스를 목록으로 하는 서식/양식 전문 포탈
	사이트입니다.
	<br><br>
	② "이용자"란 "소장닷컴"에 접속하여 이 약관에 따라 "소장닷컴"이 제공하는 서비스를 받는 무
	료회원 및 유료회원을 말합니다.
	<br><br>
	③ "회원"이라 함은 "소장닷컴"에 개인정보를 제공하여 회원등록을 한 자로서, "소장닷컴"의 정
	보를 지속적으로 제공받으며,"소장닷컴"이 제공하는 서비스를 계속적으로 이용할 수 있는 자를
	말합니다.
	<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제3조 (약관 등의 명시와 설명 및 개정)
	</p>
	① "소장닷컴"은 이 약관의 내용과 상호 및 대표자 성명, 영업소 소재지 주소(소비자의 불만을
	처리할 수 있는 곳의 주소를 포함), 전화번호, 모사전송번호, 전자우편주소, 사업자등록번호,
	통신판매업신고번호, 개인정보관리책임자 등을 이용자가 쉽게 알 수 있도록 소장닷컴의 초기
	서비스화면(전면)에 게시합니다. 다만, 약관의 내용은 이용자가 연결화면을 통하여 볼 수 있도
	록 할 수 있습니다.<br><br>
	② "소장닷컴"은 이용자가 약관에 동의하기에 앞서 약관에 정하여져 있는 내용 중 청약철회,배
	송책임, 환불조건 등과 같은 중요한 내용을 이용자가 이해할 수 있도록 별도의 연결 화면 또
	는 팝업화면 등을 제공하여 이용자의 확인을 구하여야 합니다.<br><br>
	③ "소장닷컴"은 전자상거래 등에서 소비자보호에 관한 법률, 약관의 규제에 관한 법률, 전자
	거래기본법, 전자서명법, 정보통신망 이용촉진 등에 관한 법률, 방문판매 등에 관한 법률, 소
	비자보호법 등 관련법을 위배하지 않는 범위에서 이 약관을 개정할 수 있습니다.<br><br>
	④ "소장닷컴"이 약관을 개정할 경우에는 적용일자 및 개정사유를 명시하여 현행약관과 함께
	소장닷컴의 초기화면에 그 적용일자 7일 이전부터 적용일자 전일까지 공지합니다. 다만, 이용
	자에게 불리하게 약관내용을 변경하는 경우에는 최소한 30일 이상의 사전 유예기간을 두고
	공지합니다. 이 경우 "소장닷컴"은 개정 전 내용과 개정 후 내용을 명확하게 비교하여 이용자
	가 알기 쉽도록 표시합니다.<br><br>
	⑤ "소장닷컴"이 약관을 개정할 경우에는 그 개정약관은 그 적용일자 이후에 체결되는 계약에
	만 적용되고 그 이전에 이미 체결된 계약에 대해서는 개정 전의 약관조항이 그대로 적용됩니
	다. 다만 이미 계약을 체결한 이용자가 개정약관 조항의 적용을 받기를 원하는 뜻을 제3항에
	의한 개정약관의 공지기간 내에 "소장닷컴"에 송신하여 "소장닷컴"의 동의를 받은 경우 에는
	개정약관 조항이 적용됩니다.<br><br>
	⑥ 이 약관에서 정하지 아니한 사항과 이 약관의 해석에 관하여는 전자상거래등에서의소비자
	보호에관한법률, 약관의규제등에관한법률, 공정거래위원회가 정하는 전자상거래 등에서의소비
	자보호지침 및 관계법령 또는 상관례에 따릅니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제4조 (서비스의 제공 및 변경)
	</p>
	① "소장닷컴"은 다음과 같은 업무를 수행합니다.<br><br>
	1. 컨텐츠 또는 용역에 대한 정보 제공<br>
	2. 컨텐츠 또는 용역에 대한 판매 마켓 제공<br>
	3. 기타 "소장닷컴"이 정하는 업무<br><br>
	② "소장닷컴"은 재화 또는 용역의 품절 또는 기술적 사양의 변경 등의 경우에는 장차 체결되
	는 계약에 의해 제공할 재화 또는 용역의 내용을 변경할 수 있습니다. 이 경우에는 변경된 재
	화 또는 용역의 내용 및 제공일자를 명시하여 현재의 재화 또는 용역의 내용을 게시한 곳에
	즉시 공지합니다.<br><br>
	③ "소장닷컴"이 제공하기로 이용자와 계약을 체결한 서비스의 내용을 재화 등의 품절 또는
	기술적 사양의 변경 등의 사유로 변경할 경우에는 그 사유를 이용자에게 통지 가능한 주소로
	즉시 통지합니다.<br><br>
	④ 전항의 경우 "소장닷컴"은 이로 인하여 이용자가 입은 손해를 배상합니다. 다만, "소장닷컴"
	이 고의 또는 과실이 없음을 입증하는 경우에는 그러하지 아니합니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제5조 (서비스의 중단)
	</p>
	① "소장닷컴"은 컴퓨터 등 정보통신설비의 보수점검,교체 및 고장, 통신의 두절 등의 사유가
	발생한 경우에는 서비스의 제공을 일시적으로 중단할 수 있습니다.<br><br>
	② "소장닷컴"은 제1항의 사유로 서비스의 제공이 일시적으로 중단됨으로 인하여 이용자 또는
	제3자가 입은 손해에 대하여 배상합니다. 단, "소장닷컴"이 고의 또는 과실이 없음을 입증하는
	경우에는 그러하지 아니합니다.<br><br>
	③ 사업종목의 전환, 사업의 포기, 업체간의 통합 등의 이유로 서비스를 제공할 수 없게 되는
	경우에는 "소장닷컴"은 제8조에 정한 방법으로 이용자에게 통지하고 당초 "소장닷컴"에서 제시
	한 조건에 따라 소비자에게 보상합니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제6조 (회원가입)
	</p>
	① 이용자는 "소장닷컴"이 정한 가입 양식에 따라 회원정보를 기입한 후 이 약관에 동의한다
	는 의사표시를 함으로서 회원가입을 신청합니다.<br><br>
	② "소장닷컴"은 제1항과 같이 회원으로 가입할 것을 신청한 이용자 중 다음 각호에 해당하지
	않는 한 회원으로 등록합니다.<br><br>
	- 타인 명의의 신청<br>
	- 등록 내용에 허위, 기재누락, 오기가 있는 경우<br>
	- 기타 회원으로 등록하는 것이 "소장닷컴"의 기술상 현저히 지장이 있다고 판단되는 경우<br>
	- 이용 신청 고객의 귀책사유로 이용승낙이 곤란한 경우<br><br>
	③ 회원가입계약의 성립시기는 "소장닷컴"의 승낙이 회원에게 도달한 시점으로 합니다.<br><br>
	④ 회원은 등록사항에 변경이 있는 경우, 즉시 전자우편 기타 방법으로 "소장닷컴"에 대하여
	그 변경사항을 알려야 합니다.<br><br>
	
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제7조 (회원 탈퇴 및 자격 상실 등)
	</p>
	① 회원은 "소장닷컴"에 언제든지 탈퇴를 요청할 수 있으며 "소장닷컴"은 즉시 회원탈퇴를 처
	리합니다.<br><br>
	② 회원이 다음 각호의 사유에 해당하는 경우, "소장닷컴"은 회원자격을 제한 및 정지시킬 수
	있습니다.<br><br>
	- 가입 신청 시에 허위 내용을 등록한 경우<br>
	- "소장닷컴"을 이용하여 구입한 재화 등의 대금, 기타 "소장닷컴"이용에 관련하여 회원이 부
	담하는 채무를 기일에 지급하지 않는 경우<br>
	- 다른 사람의 "소장닷컴" 이용을 방해하거나 그 정보를 도용하는 등 전자상거래 질서를 위협
	하는 경우<br>
	- "소장닷컴"을 이용하여 법령 또는 이 약관이 금지하거나 공서양속에 반하는 행위를 하는 경
	우<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제8조 (회원에 대한 통지)
	</p>
	
	① "소장닷컴"이 회원에 대한 통지를 하는 경우, 회원이 "소장닷컴"과 미리 약정하여 지정한
	전자우편 주소로 할 수 있습니다.<br><br>
	② "소장닷컴"은 불특정다수 회원에 대한 통지의 경우 1주일이상 "소장닷컴" 게시판에 게시함
	으로서 개별 통지에 갈음할 수 있습니다. 다만, 회원 본인의 거래와 관련하여 중대한 영향을
	미치는 사항에 대하여는 개별통지를 합니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제9조 (서비스 신청)
	</p>
	
	"소장닷컴"이용자는 "소장닷컴" 상에서 다음 또는 이와 유사한 방법에 의하여 서비스를 신청하
	며, "소장닷컴"은 이용자가 서비스 신청을 함에 있어서 다음의 각 내용을 알기 쉽게 제공하여
	야 합니다.<br><br>
	- 문서/서식의 검색 및 선택<br>
	- 성명, 주소, 전화번호, 전자우편주소(또는 이동전화번호) 등의 입력<br>
	- 약관내용, 환불권이 제한되는 서비스 등에 대한 확인<br>
	- 재화 등의 구매신청 및 이에 관한 확인 또는 "소장닷컴"의 확인에 대한 동의<br>
	- 결제방법의 선택<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제10조 (서비스 이용의 성립)
	</p>
	
	① "소장닷컴"은 제9조와 같은 서비스 신청에 대하여 다음 각호에 해당하면 승낙하지 않을 수
	있습니다.<br><br>
	1. 신청 내용에 허위, 기재누락, 오기가 있는 경우<br>
	2. 기타 서비스 신청에 승낙하는 것이 "소장닷컴" 기술상 현저히 지장이 있다고 판단하는 경우<br>
	② "소장닷컴"의 수신확인통지형태로 이용자에게 도달한 시점에 서비스 신청이 성립한 것으로
	봅니다.<br><br>
	③ "소장닷컴"의 승낙의 의사표시에는 이용자의 서비스 신청에 대한 확인 및 서비스 신청의
	정정/취소 등에 관한 정보 등을 포함하여야 합니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제11조 (지급방법)
	</p>
	
	"소장닷컴"에서 구매한 컨텐츠 또는 용역에 대한 대금지급방법은 다음 각호의 방법중 가용한
	방법으로 할 수 있습니다. 단, "소장닷컴"은 이용자의 지급방법에 대하여 컨텐츠 등의 대금에
	어떠한 명목의 수수료도 추가하여 징수할 수 없습니다.<br><br>
	- 폰뱅킹, 인터넷뱅킹, 메일 뱅킹 등의 각종 계좌이체<br>
	- 신용카드 등의 각종 카드 결제<br>
	- 온라인무통장입금<br>
	- 기타 전자적 지급 방법에 의한 대금 지급 등<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제12조 (수신확인통지/구매신청 변경 및 취소)
	</p>
	
	
	① "소장닷컴"은 이용자의 구매신청이 있는 경우 이용자에게 수신확인통지를 합니다.<br><br>
	② 수신확인통지를 받은 이용자는 의사표시의 불일치 등이 있는 경우에는 수신확인통지를 받
	은 후 즉시 구매신청 변경 및 취소를 요청할 수 있고 "소장닷컴"은 배송 전에 이용자의 요청
	이 있는 경우에는지체 없이 그 요청에 따라 처리하여야 합니다. 다만 이미 대금을 지불한 경
	우에는 제15조의 청약철회 등에 관한 규정에 따릅니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제13조 (서비스 공급)
	</p>
	
	① "소장닷컴"은 이용자와 서비스 공급시기에 관하여 별도의 약정이 없는 결제 승인이 있는
	날부터 서비스 등을 이용할 수 있도록 필요한 조치를 취합니다.<br><br>
	② "소장닷컴"은 이용자가 구매한 컨텐츠에 대해 이용방법, 관련 프로그램, 이용 안내 등을 명
	시합니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제14조 (요금 환불)
	</p>
	
	① 이용고객이 유료콘텐츠를 구매하거나 또는 정액제 유료회원으로 가입을 한 후 다음 각 호
	의 문제가 발생하여 요금환불을 요청한 경우에 회사는 이용고객이 결제한 요금을 환불합니다.<br><br>
	- 회사의 서비스에 문제가 발생하여 이용고객이 문서서식 서비스를 받지 못한 경우<br>
	- 유사 문서서식 사이트에 존재하는 자료를 이용고객이 요청하였으나 회사에서 이를 제공하지
	못하는 경우<br>
	- 이용고객의 환불요청이 상거래의 관례에 비추어 회사에서 정당하다고 판단되는 경우<br><br>
	② 전 1항의 환불조건에도 불구하고 아래 각 호의 해당이 되는 경우 회사는 환불을 거부할
	수 있습니다.<br><br>
	- 유료이용기간이 모두 완료된 경우<br>
	- 이용고객의 요금결제 후 기간이 10일이 경과된 경우<br>
	- 이용고객의 컴퓨터 및 사무환경 문제로 서비스를 이용하지 못한 경우<br>
	- 이용고객이 요금결제 후 특별한 사유 없이 환불을 요청하는 경우<br><br>
	③ 이용고객의 환불요청은 온라인 또는 유선으로 신청할 수 있으며 회사는 결제취소 또는 무
	통장입금으로 환불을 하도록 한다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제15조 (서비스 철회)
	</p>
	
	
	① "소장닷컴"과 컨텐츠 사용에 관한 계약을 체결한 이용자는 서비스 신청 승인을 받은 날부
	터 7일 이내에는 서비스 철회 신청을 할수 있습니다.<br><br>
	단 "14조" 범위에 벗어나지 않는 경우에 한하며 이용일수에 해당하는 금액을 공제하고 환급하
	기로 합니다.<br><br>
	② 이용자가 제공받은 컨텐츠 및 서비스가 이용자가 원하지 않는 정보일 경우에도 위1항과 같
	이 7일 이내에 서비스 철회 신청을 할 수 있습니다.<br><br>
	③ 어떤 이유로든 이용자의 정당한 사유에 의해 서비스 철회 요구시 사용자가 이용한 신용카
	드 또는 전자화폐 결제수단으로 컨텐츠 등의 대금을 지급한 때에는 지체 없이 당해 결제수단
	을 제공한 사업자로 하여금 대금의 청구를 정시 또는 취소하도록 요청할 수 있습니다.<br><br>
	
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제16조 (서비스 철회 환급 기준)
	</p>
	
	① 법정 대리인의 동의 없이 미성년자와 계약에 대한 서비스 철회 요청시<br>
	"소장닷컴"은 계약 철회에 응하며 기 납부한 요금은 전액 환급조치하고 미납요금 및 위약금
	청구행위를 하지 않습니다.<br><br>
	② 허위, 과장광고에 의한 이용계약<br>
	"소장닷컴"은 이용자가 제시한 사유가 서비스 사용규정에 의거 합당하다고 판단될 경우 지체
	없이 서비스 철회 요구에 응하며 이용료 전액을 환급하기로 합니다.<br><br>
	⓷ 서비스가 중지되거나 장애가 발생한 경우 "소장닷컴"은 계약해지 및 잔여기간에 대한 이용
	료를 환급해 드리기로 합니다.<br>
	단 서비스 중지, 장애시간은 소비자가 회사에 통지한 후부터 계산하되, 서비스가 불가항력(천
	재지변 등)이나 업체의 사전고지 또는 과실로 인하여 중지되거나 장애가 발생한 경우에는, 서
	비스 중지, 장애시간 계산에서 제외됨을 원칙으로 합니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제17조 (개인정보보호)
	</p>
	
	① "소장닷컴"은 이용자의 정보수집 시 구매계약 이행에 필요한 최소한의 정보를 수집합니다.
	다음 사항을 필수사항으로 하며 그 외 사항은 선택사항으로 합니다.<br><br>
	- 성명<br>
	- 전화번호<br>
	- 희망ID(회원의 경우)<br>
	- 비밀번호(회원의 경우)<br>
	- 전자우편주소<br><br>
	② "소장닷컴"이 이용자의 개인식별이 가능한 개인정보를 수집하는 때에는 반드시 당해 이용
	자의 동의를 받습니다.<br><br>
	③ 제공된 개인정보는 당해 이용자의 동의 없이 목적 외의 이용이나 제3자에게 제공할 수 없
	으며, 이에 대한 모든 책임은 소장닷컴이 집니다. 다만, 다음의 경우에는 예외로 합니다.<br>
	- 배송업무상 배송업체에게 배송에 필요한 최소한의 이용자의 정보(성명, 주소, 전화번호)를
	알려주는 경우<br>
	- 통계작성, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 개인을 식별할 수 없는
	형태로 제공하는 경우<br>
	- 컨텐츠 등의 거래에 따른 대금정산을 위하여 필요한 경우<br>
	- 도용방지를 위하여 본인확인에 필요한 경우<br>
	- 법률의 규정 또는 법률에 의하여 필요한 불가피한 사유가 있는 경우<br>
	④ "소장닷컴"이 제2항과 제3항에 의해 이용자의 동의를 받아야 하는 경우에는 개인정보관리
	책임자의 신원(소속, 성명 및 전화번호, 기타 연락처), 정보의 수집목적 및 이용목적, 제3자에
	대한 정보제공 관련사항(제공받은 자, 제공목적 및 제공할 정보의 내용) 등 정보통신망이용촉
	진등에관한법률 제22조제2항이 규정한 사항을 미리 명시하거나 고지 해야 하며 이용자는 언
	제든지 이 동의를 철회할 수 있습니다.<br><br>
	⑤ 이용자는 언제든지 "소장닷컴"이 가지고 있는 자신의 개인정보에 대해 열람 및 오류정정을
	요구할 수 있으며 "소장닷컴"은 이에 대해 지체 없이 필요한 조치를 취할 의무를 집니다. 이용
	자가 오류의 정정을 요구한 경우에는 "소장닷컴"은 그 오류를 정정할 때까지 당해 개인정보를
	이용하지 않습니다.<br><br>
	⑥ "소장닷컴"은 개인정보 보호를 위하여 관리자를 한정하여 그 수를 최소화하며 신용카드, 은
	행계좌 등을 포함한 이용자의 개인정보의 분실, 도난, 유출, 변조 등으로 인한 이용자의 손해
	에 대하여 모든 책임을 집니다.<br><br>
	⑦ "소장닷컴" 또는 그로부터 개인정보를 제공받은 제3자는 개인정보의 수집목적 또는 제공받
	은 목적을 달성한 때에는 당해 개인정보를 지체 없이 파기합니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제18조 ("소장닷컴"의 의무)
	</p>
	① "소장닷컴"은 법령과 이 약관이 금지하거나 공서양속에 반하는 행위를 하지 않으며 이 약
	관이 정하는 바에 따라 지속적이고, 안정적으로 재화,용역을 제공하는데 최선을 다하여야 합
	니다.<br><br>
	② "소장닷컴"은 이용자가 안전하게 인터넷 서비스를 이용할 수 있도록 이용자의 개인정보(신
	용정보 포함)보호를 위한 보안 시스템을 갖추어야 합니다.<br><br>
	③ "소장닷컴"이 상품이나 용역에 대하여 「표시,광고의공정화에관한법률」 제3조 소정의 부당한
	표시,광고행위를 함으로써 이용자가 손해를 입은 때에는 이를 배상할 책임을 집니다.<br><br>
	④ "소장닷컴"은 이용자가 원하지 않는 영리목적의 광고성 전자우편을 발송하지 않습니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제19조 (회원의 ID 및 비밀번호에 대한 의무)
	</p>
	
	① 제17조의 경우를 제외한 ID와 비밀번호에 관한 관리책임은 회원에게 있습니다.<br><br>
	② 회원은 자신의 ID 및 비밀번호를 제3자에게 이용하게 해서는 안 됩니다.<br><br>
	③ 회원이 자신의 ID 및 비밀번호를 도난 당하거나 제3자가 사용하고 있음을 인지한 경우에
	는 바로 "소장닷컴"에 통보하고 "소장닷컴"의 안내가 있는 경우에는 그에 따라야 합니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제20조 (이용자의 의무)
	</p>
	
	이용자는 다음 행위를 하여서는 안되며, "소장닷컴"은 서비스 이용 제한 조치를 취할 수 있습
	니다.<br><br>
	① 신청 또는 변경 시 허위 내용의 등록<br>
	② 타인의 정보 도용<br>
	③ "소장닷컴"에 게시된 정보의 변경<br>
	④ "소장닷컴"이 정한 정보 이외의 정보(컴퓨터 프로그램 등) 등의 송신 또는 게시<br>
	⑤ "소장닷컴" 기타 제3자의 저작권 등 지적재산권에 대한 침해<br>
	⑥ "소장닷컴" 기타 제3자의 명예를 손상시키거나 업무를 방해하는 행위<br>
	⑦ 외설 또는 폭력적인 메시지, 화상, 음성, 기타 공서양속에 반하는 정보를 소장닷컴에 공개<br>
	또는 게시하는 행위<br>
	⑧ "소장닷컴" 사이트 운영을 방해하는 트래픽 증가 행위<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제21조 (저작권의 귀속 및 이용제한)
	</p>
	
	
	① "소장닷컴"이 작성한 저작물에 대한 저작권 기타 지적재산권은 "소장닷컴"에 귀속합니다.
	소장닷컴의 사전 허가 없이 소장닷컴의 서비스 저작물을 직, 간접적으로 변조, 복사, 배포, 출
	판, 전시, 판매 하거나 상품제작, 인터넷, 모바일 및 데이터베이스를 비롯한 각종 정보서비스
	등에 사용하는 것을 금합니다.<br><br>
	② 소장닷컴의 서비스에 대하여 회원이 직접 게시물을 작성할 때는 다음과 같은 내용을 준수
	하여서 제3자의 지적재산권을 침해하는 일이 없도록 하여야 합니다.<br><br>
	1. 게시물의 내용에 인용문이 포함되어 있을 경우, 그 인용문이 회원이나 사용자의 의견에 일
	부 참고된 것이 아니라 내용의 중심이라면 출처를 밝히더라도 저작권 침해에 해당됩니다. 따
	라서 원 저작권자의 명시적 동의 없이 창작물을 게시해서는 안 됩니다.<br>
	2. 원 저작권자의 명시적 동의 없이 원 저작권자가 만든 콘텐츠의 전부 혹은 일부를 게시, 전
	재, 복사, 재배포, 변조, 판매, 게시하는 것은 출처를 밝히더라도 저작권 침해에 해당합니다.
	따라서 원 저작권자의 명시적 동의 없이 이런 게시물을 게시하거나 판매해서는 안됩니다.<br>
	3. 회원 또는 제휴회사에서 등록한 게시자료에 대하여 제3자로부터 저작권 및 기타 권리의 침
	해 또는 명예훼손, 음란성 등의 이유로 이의가 제기된 경우, 회사는 당해 게시물을 임시 삭제
	할 수 있으며, 이의를 제기한 자와 게시물 등록자 간에 소송, 합의 등을 통해 당해 게시물에
	관한 법적 문제가 종결된 후 이를 근거로 회사에 신청이 있는 경우에만 상기 임시 삭제된 게
	시물은 다시 등록될 수 있습니다. 소장닷컴은 어떠한 경우도 제3자와 회원간, 또는 제3 자
	와 제휴회사간의 법적인 문제에 대한 책임을 지지 않습니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제22조 (서비스 면책사항)
	</p>
	
	① 천재지변, 전쟁 및 기타 이에 준하는 불가항력으로 인하여 소장닷컴 서비스를 제공할 수
	없는 경우에는 서비스 제공에 대한 책임이 면제됩니다.<br><br>
	② 소장닷컴은 회원의 귀책사유로 인한 서비스 이용의 장애 또는 손해에 대하여 책임을 지지
	않습니다.<br><br>
	③ 소장닷컴은 서비스용 설비의 보수, 교체, 정기점검, 공사 등 부득이한 사유로 발생한 손해
	에 대한 책임이 면제됩니다.<br><br>
	④ 회원은 소장닷컴 서비스와 관련하여 자신이 회사에 등록한 필수등록 항목(이동전화번호,
	주민등록번호 등) 및 비밀번호의 보안에 대하여 책임을 지며, 소장닷컴은 회원의 고의나 과실
	로 인하여 아이디, 비밀번호, 카드 번호 등의 금융정보 및 기타 회원정보가 유출되어 발생하
	는 손해에 대하여는 책임을 지지 않습니다.<br><br>
	⑤ 소장닷컴은 회원의 컴퓨터 오류에 의해 손해가 발생한 경우, 회원이 신상정보 및 전자우편
	주소를 부실하게 기재하여 손해가 발생한 경우에는 책임을 지지 않습니다.<br><br>
	⑥ 소장닷컴은 회원 상호간 및 회원과 제3자간에 서비스를 매개로 발생한 분쟁에 대해 개입할
	의무가 없으며, 이로 인한 손해를 배상할 책임이 없습니다.<br><br>
	⑦ 소장닷컴 사이트에 연결되거나 제휴한 업체(타 온라인사이트)에 포함되어 있는 내용의 유
	효성, 적합성, 법적 합리성, 저작권 준수 여부 등에 책임을 지지 않으며, 이로 인한 어떠한 손
	해에 대하여도 책임을 지지 않습니다.<br><br>
	⑧ 소장닷컴 서비스(제휴관계 포함)를 통하여 제공되는 각종 온라인 콘텐츠는 개인 참고자료
	용도로 제공되는 것이므로 자료활용에 따라 발생할 수 있는 손실 또는 손해는 이용회원의 책
	임이며 소장닷컴 이에 대해 어떠한 책임도 지지 않습니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제23조 (분쟁해결)
	</p>
	
	① "소장닷컴"은 이용자가 제기하는 정당한 의견이나 불만을 반영하고 그 피해를 보상처리하
	기 위하여 피해보상 처리 기구를 설치,운영합니다.<br><br>
	② "소장닷컴"은 이용자로부터 제출되는 불만사항 및 의견은 우선적으로 그 사항을 처리합니
	다. 다만, 신속한 처리가 곤란한 경우에는 이용자에게 그 사유와 처리일정을 즉시 통보해 드
	립니다.<br><br>
	③ "소장닷컴"과 이용자간에 발생한 전자상거래 분쟁과 관련하여 이용자의 피해구제신청이 있
	는 경우에는 공정거래위원회 또는 시·도지사가 의뢰하는 분쟁조정기관의 조정에 따를 수 있습
	니다.<br><br>
	④ "소장닷컴"의 컨텐츠를 상업적으로 재이용하거나 제3자에게 납품하여 이익을 취하는 경우
	법정 대리인을 통한 저작권리를 이용자에게 청구할 수 있고, 소를 통하여 제기될 경우 저작권
	법에 따라 피해액을 청구합니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제24조 (재판권 및 준거법)
	</p>
	
	① "소장닷컴"과 이용자간에 발생한 전자상거래 분쟁에 관한 소송은 제소 당시의 이용자의 주
	소에 의하고, 주소가 없는 경우에는 거소를 관할하는 지방법원의 전속관할로 합니다.<br><br>
	다만, 제소 당시 이용자의 주소 또는 거소가 분명하지 않거나 외국 거주자의 경우에는 민사소
	송법상의 관할법원에 제기합니다.<br><br>
	② "소장닷컴"과 이용자간에 제기된 전자상거래 소송에는 한국법을 적용합니다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제25조 (기타조항)
	</p>
	
	약관을 위반하거나 서비스 이용 시, 불편사항이 있을 경우, 고객지원센터로 문의 바랍니다.<br><br>
	☏ 문의전화: [대표] 02-336-2200 (평일 09:00~18:00, 점심시간 12:00~13:00)<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">부칙: 시행일
	</p>
	
	★ 시행일: 이 약관은 2023년 04월 12일부터 시행합니다.(ver 1.0)<br><br><br><br>
</div>
<div class="tab-2 tabl">
	<p style="font-size: 24px;font-weight: bold;margin-bottom: 30px;">서비스 이용약관
	</p>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제1조 【목적】
	</p>
	
	본 계약은 "회원"이 보유하고 있는 콘텐츠를 공유 또는 판매의 목적으로 "운영자"의 소장닷컴
	서비스에 등록하고 운영함으로써 유용하고 적법한 콘텐츠의 유통발전에 상호 기여함을 목표로
	한다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제2조 【용어의 정의】
	</p>
	
	1. "소장닷컴"은 회원이 등록한 문서자료 콘텐츠의 공유와 판매서비스를 목적으로 하는 지식공
	유 및 거래 전문사이트이다.<br><br>
	2. "회원"이라 함은 "소장닷컴"에 개인정보를 제공하여 회원등록을 한 자로서, "소장닷컴"의 정
	보를 지속적으로 제공받으며, "소장닷컴"이 제공하는 서비스를 적으로 이용할 수 있는 자를 말
	한다.<br><br>
	3. "운영자'라 함은 "소장닷컴"서비스를 운영하는 회사를 말한다.<br><br>
	4. "기업회원"이라 함은 소장닷컴에 개인정보를 제공하여 회원으로 등록한 자로, “소장닷컴"에
	서 저작권을 보유한 콘텐츠를 1건 이상 등록하기 위해 서비스를 이용하는 회원을 말한다.<br><br>
	5. "개인회원"라 함은 "소장닷컴"에 등록된 콘텐츠를 1건 이상 일정한 금액을 주고 구매를 하
	기 위하여 서비스를 이용하는 회원을 말한다.<br><br>
	6. "충전금액"은 "소장닷컴"에서 거래의 수단이 되는 화폐이며 "소장닷컴" 콘텐츠를 구매하기
	위해서는 일정 금액을 주고 충전해야 한다.<br><br>
	7. "충전포인트"는 소장닷컴"에 등록된 콘텐츠를 이용할 수 있는 수단이며 소장닷컴 충전결제,
	공유자료 등록, 사용후기 등을 통해 포인트를 쌓을 수 있다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제3조 【계약 기간】
	</p>
	
	1. 본 계약의 계약기간은 체결일로부터 1년으로 하며, 계약기간 중이라도 계약내용의 변경사
	유가 있을 경우 "갑"과 "을"의 상호합의에 의하여 변경할 수 있다.<br><br>
	2. 본 계약의 계약기간에 있어서 어느 일방의 계약 종료통지가 없는 한 계약은 동일조건으로
	1년씩 자동 연장되는 것으로 한다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제4조 【콘텐츠의 범위】
	</p>
	
	회원이 등록하는 소장닷컴 콘텐츠의 범위는 다음과 같다.<br><br>
	- 법률문서 : 내용증명, 진정서, 탄원서, 합의서, 고소장, 소장 등<br><br>
	
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제5조 【서비스 제한】
	</p>
	회원은 아래 각 호에 해당되는 콘텐츠 자료는 등록할 수 없다.<br><br>
	- 회원이 저작권을 보유하고 있지 않으며 제3자의 저작권 등 기타 권리를 침해하는 자료<br>
	- 공공 안녕질서 및 미풍양속에 위배되는 내용을 포함하는 자료<br>
	- 다른 회원 또는 제3자에게 불이익을 주거나 명예를 손상시키는 자료<br>
	- 기술 및 영업비밀을 포함하고 있어 회사 기밀이 유출될 수 있는 자료<br>
	- 타인의 개인정보를 유출하는 자료<br>
	- 불법복제 또는 해킹을 조장하는 자료<br><br>
	
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제6조【자료 등록절차】
	</p>
	
	등록자 정보입력은 기본 회원정보를 기초로 한다.<br><br>
	
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제7조【자료 검수방법】
	</p>
	1. 운영자는 회원이 등록한 문서를 최대 1주일이내까지 검수한다.<br><br>
	2. 운영자는 회원이 등록한 자료가 아래 각 호에 해당하는 경우에는 자료승인에서 제외할 수
	있다.<br><br>
	① 제5조 각호에 해당되는 자료로 판단되는 경우<br>
	② 소장닷컴 사이트에 이미 동일(유사)한 자료를 서비스 하고 있는 경우<br>
	③ 소장닷컴에 등록된 자료와 중복인 경우<br>
	④ 기타 소장닷컴의 서비스 운영기준에 미흡된다고 판단되는 경우<br><br>
	
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제8조【서비스 이용방법】
	</p>
	① 소정의 ”충전금액“을 활용하여 해당 문서를 구매할 수 있으면 판매수익금은 문서당 1%로
	한다.<br><br>
	② 다운받은 문서 유효기한은 3일로 한다.<br><br>
	③ "핀매수익금"은 매달 말일 정산하여 지급한다.<br><br>
	⓸ "판매수익금에 대한 "입금일"은 정산한날로부터 최대 7일 이내 회원님의 은행계좌에 입금하
	기로 한다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제9조【저작권의 귀속 및 책임】
	</p>
	
	1. 회원이 등록한 자료에 대한 저작권 및 기타 지적재산권은 해당 회원에 귀속하며 운영자는
	기간 및 용도의 제한없이 서비스 이용권 및 2차 저작권을 가진다.<br><br>
	2. 운영자는 회원이 등록한 문서를 계속적으로 서비스할 수 있으나 회원의 요청이 있을시에는
	해당 자료를 삭제할 수 있다. 단 다음 각호에 해당하는 사항에 대해서는 별도의 절차에 의해
	처다.<br><br>
	① 인기 다운로드 자료들은 별도의 정산 절차를 거친 이후 삭제처리를 한다.<br>
	② 회원이 판매를 원하지 않을 경우 마이페이지를 통해 삭제요청 또는 일괄 삭제를 운영자에
	게 요청을 할 수 있다.<br><br>
	3. 회원이 등록한 자료가 제3자의 저작권 및 개인정보, 기술 및 영업비밀 등 타인의 권리 또
	는 이익을 침해하는 경우 또는 서비스 이용으로 인하여 이용자에게 피해를 입은 경우, 해당회
	원은 배상책임을 비롯하여 그로 인해 발생한 분쟁에 대한 민· 형사상의 법적 책임을 진다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제10조【분쟁해결】
	</p>
	1. 본 계약과 관련하여 양 당사자간 또는 제3자간의 분쟁이 발생한 경우 원칙적으로 상호간의
	협의에 의해 해결한다.<br><br>
	2. 제1항에도 불구하고 분쟁이 해결되지 않을 경우 "운영자"의 주소지 관할 지방법원을 그 관
	할로 하여 재판함으로써 해결한다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제11조【협의사항】
	</p>
	1. 회원은 서비스의 이용 권한, 기타 이용계약상 지위를 타인에게 양도, 증여할 수 없으며 기
	타 서비스 이용에 관하여 이견이 발생하는 경우에는 상호 원만하게 협의하여 처리한다.<br><br>
	2. 본 계약서에서 명시되지 않은 부분에 대하여는 관련 법규 및 상관습에 따르기로 한다.<br><br>
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">제12조【기타조항】
	</p>
	
	계약서 내용에 대한 궁금한 사항 또는 서비스 이용 시 불편사항이 있을 경우 소장닷컴 고객지
	원센터에서 상담 받을 수 있다.<br><br>
	• 문의전화 : 02-336-2200 (평일 09:00~18:00, 점심시간 12:00~13:00)<br><br>
	
	<p style="font-size: 15px;font-weight: bold;margin-bottom: 15px;">부칙 : 시행일
	</p>
	
	이 약관은 2021년 04월 12일부터 시행한다. (ver 1.0)<br><br><br><br>
</div>
<div class="tab-3 tabl">
	<p style="font-size: 24px;font-weight: bold;margin-bottom: 30px;">자료등록서약서
	</p>
	"소장닷컴" 온라인서비스 사업자(이하 "운영자")에 대하여 콘텐츠 공유 또는 판매등록을 신청한
	홍길동(아이디)(이하 "회원")은 다음과 같은 사항을 확인하고 이에 대하여 본 서약서에 동의합
	니다.<br><br>
	1."회원"이 등록 신청한 콘텐츠에 대하여 "회원"은 저작권법 및 기타 관련법령 그리고 "운영자"
	의 약관, 콘텐츠 공유 및 판매에 관한 약관를 숙지하고 확인하였습니다.<br><br>
	2."회원"이 등록 신청한 콘텐츠의 저작권리 일체는 "회원"에게 있음을 확인합니다.<br><br>
	3."회원"이 등록 신청한 콘텐츠는 저작권법 및 기타 관련 법령에 저촉되지 않음을 확인합니다.<br><br>
	4."회원"이 등록 신청한 콘텐츠의 재등록 불가 및 재등록 가능한 보류 처리에 대한 이의 신청
	시 "운영자"의 결정과 조치에 대해 일체 이의를 제기하지 않음을 확인합니다.<br><br>
	5."회원"이 등록 신청한 콘텐츠는 명예훼손, 민.형사상 책임은 "회원"에게 있음을 확인합니다.<br><br>
	6.회원가입 시 또는 콘텐츠 등록 신청 시 "운영자"에 제공한 "회원"의 개인정보는 모두 거짓이
	없음을 확인합니다.<br><br><br><br>
</div>




</div>