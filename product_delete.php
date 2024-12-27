<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$product_id = $_GET['매물번호'];

$ret = mysqli_query($conn, "delete from 매물 where 매물번호 = $product_id");
if(!$ret)
{
	msg('Query Error : '.mysqli_error($conn));
}
else
{
	s_msg ('성공적으로 삭제 되었습니다');
	echo "<meta http-equiv='refresh' content='0;url=product_list.php'>";
}	