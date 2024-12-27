<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from 매물 natural join 임대인";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword"];
        $query .= " where 우편번호 like '%$search_keyword%' or 상세주소 like '%$search_keyword%' or 유형 like '%$search_keyword%'";
    }
    $result = mysqli_query($conn, $query);
    if (!$result) {
         die('Query Error : ' . mysqli_error());
    }
    ?>

    <table class="table table-striped table-bordered">
        <tr>
            <th>No.</th>
            <th>임대인이름</th>
            <th>우편번호</th>
            <th>보증금</th>
            <th>월세</th>
            <th>삭제</th>
        </tr>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['임대인이름']}</td>";
            echo "<td><a href='product_view.php?매물번호={$row['매물번호']}'>{$row['우편번호']}</a></td>";
            echo "<td>{$row['보증금']}</td>";
            echo "<td>{$row['월세']}</td>";
            echo "<td width='17%'>
            	<a href='product_form.php?매물번호={$row['매물번호']}'><button class='button primary small'>수정</button></a>
                 <button onclick='javascript:deleteConfirm({$row['매물번호']})' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
    </table>
    <script>
        function deleteConfirm(매물번호) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "product_delete.php?매물번호=" + 매물번호;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>
