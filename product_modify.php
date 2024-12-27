<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$product_id = $_POST['매물번호'];
$housenumber = $_POST['우편번호'];
$housedetail = $_POST['상세주소'];
$rent = $_POST['임대인번호'];
$area = $_POST['면적'];
$type = $_POST['유형'];
$deposit = $_POST['보증금'];
$monthly = $_POST['월세'];

$result = mysqli_query($conn, "update 매물 set 우편번호 = '$housenumber', 상세주소 = '$housedetail', 임대인번호 = $rent, 면적 = $area, 유형 = '$type', 보증금 = $deposit, 월세 = $monthly where 매물번호 = $product_id");

if(!$result)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 수정 되었습니다');
    echo "<script>location.replace('product_list.php');</script>";
}

?>

