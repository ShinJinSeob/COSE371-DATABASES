<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$house = $_POST['매물번호'];
$rent = $_POST['임차인번호'];
$start = $_POST['계약시작일'];
$end = $_POST['계약종료일'];

$result = mysqli_query($conn, "insert into 계약 (계약시작일, 계약종료일, 임차인번호) values('$start', '$end', '$rent')");
$result2 = mysqli_query($conn, "insert into 계약체결 (매물번호) values('$house')");
if(!$result&&!$result2)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<script>location.replace('sign_list.php');</script>";
}

?>

