<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "sign_insert.php";

?>
    <div class="container">
        <form name="sign_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="계약번호" value="<?=$product['계약번호']?>"/>
            <h3>계약 정보 <?=$mode?></h3>
            <p>
                <label for="매물번호">매물번호</label>
                <input type="text" placeholder="매물번호 입력" id="매물번호" name="매물번호" value="<?=$product['매물번호']?>"/>
            </p>
            <p>
                <label for="임차인번호">임차인번호</label>
                <input type="text" placeholder="임차인번호 입력" id="임차인번호" name="임차인번호" value="<?=$product['임차인번호']?>"/>
            </p>
            <p>
                <label for="계약시작일">계약시작일</label>
                <input type="text" placeholder="계약시작일 입력" id="계약시작일" name="계약시작일" value="<?=$product['계약시작일']?>"/>
            </p>
            <p>
                <label for="계약종료일">계약종료일</label>
                <input type="text" placeholder="계약종료일 입력" id="계약종료일" name="계약종료일" value="<?=$product['계약종료일']?>"/>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("매물번호").value == "") {
                        alert ("매물번호를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("임차인번호").value == "") {
                        alert ("임차인번호를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("계약시작일").value == "") {
                        alert ("계약시작일을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("게약종료일").value == "") {
                        alert ("계약종료일을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>