<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("매물번호", $_GET)) {
    $매물번호 = $_GET["매물번호"];
    $query = "select * from 매물 natural join 임대인 where 매물번호 = $매물번호";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
    if (!$product) {
        msg("매물이 존재하지 않습니다.");
    }
}
?>
    <div class="container fullwidth">

        <h3>매물 정보 상세 보기</h3>

        <p>
            <label for="매물번호">매물 번호</label>
            <input readonly type="text" id="매물번호" name="매물번호" value="<?= $product['매물번호'] ?>"/>
        </p>

        <p>
            <label for="임대인번호">임대인번호</label>
            <input readonly type="text" id="임대인번호" name="임대인번호" value="<?= $product['임대인번호'] ?>"/>
        </p>

        <p>
            <label for="임대인이름">임대인이름</label>
            <input readonly type="text" id="임대인이름" name="임대인이름" value="<?= $product['임대인이름'] ?>"/>
        </p>

        <p>
            <label for="우편번호">우편번호</label>
            <input readonly type="text" id="우편번호" name="우편번호" value="<?= $product['우편번호'] ?>"/>
        </p>

        <p>
            <label for="상세주소">상세주소</label>
            <input readonly type="text" id="상세주소" name="상세주소" value="<?= $product['상세주소'] ?>"/>
        </p>

        <p>
            <label for="면적">면적</label>
            <input readonly type="number" id="면적" name="면적" value="<?= $product['면적'] ?>"/>
        </p>
        
        <p>
            <label for="유형">유형</label>
            <input readonly type="text" id="유형" name="유형" value="<?= $product['유형'] ?>"/>
        </p>

        <p>
            <label for="보증금">보증금</label>
            <input readonly type="number" id="보증금" name="보증금" value="<?= $product['보증금'] ?>"/>
        </p>
        
        <p>
            <label for="월세">월세</label>
            <input readonly type="number" id="월세" name="월세" value="<?= $product['월세'] ?>"/>
        </p>
    </div>
<? include "footer.php" ?>