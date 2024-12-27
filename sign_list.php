<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from 임차인 natural join 계약 natural join 계약체결 natural join 매물 natural join 임대인";
    $result = mysqli_query($conn, $query);
    if (!$result) {
         die('Query Error : ' . mysqli_error());
    }
    ?>

    <table class="table table-striped table-bordered">
        <tr>
            <th>No.</th>
            <th>임차인이름</th>
            <th>임대인이름</th>
            <th>매물번호</th>
        </tr>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['임차인이름']}</td>";
            echo "<td>{$row['임대인이름']}</td>";
            echo "<td><a href='sign_view.php?계약번호={$row['계약번호']}'>{$row['매물번호']}</a></td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
    </table>
</div>
<? include("footer.php") ?>