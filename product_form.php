<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "product_insert.php";

if (array_key_exists("매물번호", $_GET)) {
    $product_id = $_GET["매물번호"];
    $query =  "select * from 매물 where 매물번호 = $product_id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_array($result);
    if(!$product) {
        msg("물품이 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "product_modify.php";
}

$임대인들 = array();

$query = "select * from 임대인";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result)) {
    $임대인들[$row['임대인번호']] = $row['임대인이름'];
}
?>
    <div class="container">
        <form name="product_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="매물번호" value="<?=$product['매물번호']?>"/>
            <h3>매물 정보 <?=$mode?></h3>
            <p>
                <label for="임대인번호">임대인번호</label>
                <input type="text" placeholder="임대인번호 입력" id="임대인번호" name="임대인번호" value="<?=$product['임대인번호']?>"/>
            </p>
            <p>
                <label for="우편번호">우편번호</label>
                <input type="text" placeholder="우편번호 입력" id="우편번호" name="우편번호" value="<?=$product['우편번호']?>"/>
            </p>
            <p>
                <label for="상세주소">상세주소</label>
                <input type="text" placeholder="상세주소 입력" id="상세주소" name="상세주소" value="<?=$product['상세주소']?>"/>
            </p>
            <p>
                <label for="면적">면적</label>
                <input type="number" placeholder="정수로 입력" id="면적" name="면적" value="<?=$product['면적']?>" />
            </p>
            <p>
                <label for="유형">유형</label>
                <input type="text" placeholder="유형 입력" id="유형" name="유형" value="<?=$product['유형']?>"/>
            </p>
            <p>
                <label for="보증금">보증금</label>
                <input type="number" placeholder="정수로 입력" id="보증금" name="보증금" value="<?=$product['보증금']?>" />
            </p>
            <p>
                <label for="월세">월세</label>
                <input type="number" placeholder="정수로 입력(전세의 경우 0으로 입력)" id="월세" name="월세" value="<?=$product['월세']?>" />
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("임대인번호").value == "") {
                        alert ("임대인번호를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("우편번호").value == "") {
                        alert ("우편번호를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("상세주소").value == "") {
                        alert ("상세주소를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("면적").value == "") {
                        alert ("면적을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("유형").value == "") {
                        alert ("유형을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("보증금").value == "") {
                        alert ("보증금을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("월세").value == "") {
                        alert ("월세을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>