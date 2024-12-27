<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$housenumber = $_POST['우편번호'];
$housedetail = $_POST['상세주소'];
$rent = $_POST['임대인번호'];
$area = $_POST['면적'];
$type = $_POST['유형'];
$deposit = $_POST['보증금'];
$monthly = $_POST['월세'];


$result = mysqli_query($conn, "insert into 매물 (우편번호, 상세주소, 면적, 유형, 보증금, 월세, 임대인번호) values('$housenumber', '$housedetail', '$area', '$type', '$deposit', '$monthly', '$rent')");
if(!$result)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<script>location.replace('product_list.php');</script>";
}

?>

