<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("계약번호", $_GET)) {
    $signnumber = $_GET["계약번호"];
    $query = "select * from 임차인 natural join 계약 natural join 계약체결 natural join 매물 natural join 임대인 where 계약번호 = $signnumber";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
    if (!$product) {
        msg("계약이 존재하지 않습니다.");
    }
}
?>
    <div class="container fullwidth">

        <h3>계약 정보 상세 보기</h3>

        <p>
            <label for="계약번호">계약번호</label>
            <input readonly type="text" id="계약번호" name="계약번호" value="<?= $product['계약번호'] ?>"/>
        </p>

        <p>
            <label for="매물번호">매물번호</label>
            <input readonly type="text" id="매물번호" name="매물번호" value="<?= $product['매물번호'] ?>"/>
        </p>
        
        <p>
            <label for="임차인이름">임차인이름</label>
            <input readonly type="text" id="임차인이름" name="임차인이름" value="<?= $product['임차인이름'] ?>"/>
        </p>

        <p>
            <label for="계약시작일">계약시작일</label>
            <input readonly type="text" id="계약시작일" name="계약시작일" value="<?= $product['계약시작일'] ?>"/>
        </p>
        
        <p>
            <label for="계약종료일">계약종료일</label>
            <input readonly type="text" id="계약종료일" name="계약종료일" value="<?= $product['계약종료일'] ?>"/>
        </p>

    </div>
<? include "footer.php" ?>