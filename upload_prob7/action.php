<?php
header("Content-Type: text/html; charset=UTF-8");
include ( './common.php' );

// 데이터베이스 연결
$db_conn = mysql_conn();
// 요청에서 모드 가져오기 (쓰기, 수정, 또는 삭제)
$mode = $_REQUEST["mode"];
// 'gubun' 매개변수를 기반으로 업로드 경로 변환 및 가져오기
$upload_path = upload_path_convert($_GET["gubun"]);

if($mode == "write") {
    // 새 게시물 작성 처리
    $title = $_POST["title"];
    $writer = $_POST["writer"];
    $password = $_POST["password"];
    $content = $_POST["content"];
    $uploadFile = "";

    // 필수 필드가 비어있는지 확인
    if(empty($title) || empty($writer) || empty($password) || empty($content)) {
        echo "<script>alert('빈칸이 존재합니다.');history.back(-1);</script>";
        exit();
    }

    // 파일이 선택된 경우 파일 업로드 처리
    if(!empty($_FILES["userfile"]["name"])) {
        $uploadFile = $_FILES["userfile"]["name"];
        $uploadPath = "{$upload_path}/{$uploadFile}";

        // 업로드된 파일을 지정된 경로로 이동
        if(!(@move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadPath))) {
            echo("<script>alert('파일 업로드를 실패 하셨습니다.');history.back(-1);</script>");
            exit;
        }
    }

    // 내용의 줄바꿈을 <br> 태그로 변환
    $content = str_replace("\r\n", "<br>", $content);
    // INSERT 쿼리 구성 및 실행
    $query = "insert into {$tb_name}(title, writer, password, content, file, regdate, gubun) values('{$title}', '{$writer}', '{$password}', '{$content}', '{$uploadFile}', now(), '{$gubun}')";
    $db_conn->query($query);
} else if($mode == "modify") {
    // 기존 게시물 수정 처리
    $idx = $_POST["idx"];
    $title = $_POST["title"];
    $writer = $_POST["writer"];
    $password = $_POST["password"];
    $content = $_POST["content"];
    $uploadFile = $_POST["oldfile"];

    // 필수 필드가 비어있는지 확인
    if(empty($idx) || empty($title) || empty($writer) || empty($password) || empty($content)) {
        echo "<script>alert('빈칸이 존재합니다.');history.back(-1);</script>";
        exit();
    }

    // 비밀번호 확인
    $query = "select * from {$tb_name} where idx={$idx} and password='{$password}'";
    $result = $db_conn->query($query);
    $num = $result->num_rows;

    if($num == 0) {
        echo "<script>alert('패스워드가 일치하지 않습니다.');history.back(-1);</script>";
        exit();
    }

    // 새 파일이 선택된 경우 파일 업로드 처리
    if(!empty($_FILES["userfile"]["name"])) {
        $uploadFile = $_FILES["userfile"]["name"];
        $uploadPath = "{$upload_path}/{$uploadFile}";

        if(!(@move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadPath))) {
            echo("<script>alert('파일 업로드를 실패 하셨습니다.');history.back(-1);</script>");
            exit;
        }
    }

    // 내용의 줄바꿈을 <br> 태그로 변환
    $content = str_replace("\r\n", "<br>", $content);

    // UPDATE 쿼리 구성 및 실행
    $query = "update {$tb_name} set title='{$title}', writer='{$writer}', content='{$content}', file='{$uploadFile}', regdate=now(), gubun='{$gubun}' where idx={$idx}";
    $db_conn->query($query);
} else if($mode == "delete") {
    // 게시물 삭제 처리
    $idx = $_POST["idx"];
    $password = $_POST["password"];

    // 비밀번호 확인
    $query = "select * from {$tb_name} where idx={$idx} and password='{$password}'";
    $result = $db_conn->query($query);
    $num = $result->num_rows;

    if($num == 0) {
        echo "<script>alert('패스워드가 일치하지 않습니다.');history.back(-1);</script>";
        exit();
    }

    // DELETE 쿼리 구성 및 실행
    $query = "delete from {$tb_name} where idx={$idx}";
    $db_conn->query($query);
}

// 작업 완료 후 인덱스 페이지로 리다이렉트
echo "<script>location.href='index.php';</script>";
// 데이터베이스 연결 종료
$db_conn->close();
?>


