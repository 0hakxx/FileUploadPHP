<?php
// UTF-8 인코딩으로 HTML 문서 타입을 설정
header("Content-Type: text/html; charset=UTF-8");

// $_FILES 배열에서 'userfile' 필드의 'name' 값이 비어있는지 확인
if(empty($_FILES["userfile"]["name"])) {
    // 파일이 선택되지 않았을 경우 경고창을 표시하고 이전 페이지로 돌아감
    echo "<script>alert('파일을 업로드 하세요!');</script>history.back(-1);</script>";
    exit();
}

// 업로드될 파일의 경로 설정
$path = "./upload/";
// 업로드된 파일의 이름을 가져옴
$filename = $_FILES["userfile"]["name"];

// move_uploaded_file 함수를 사용하여 임시 저장된 파일을 지정된 위치로 이동
// 이동 실패시 에러 메시지 출력
if(!move_uploaded_file($_FILES["userfile"]["tmp_name"], $path.$filename)) {
    echo "<script>alert('파일 업로드에 실패하였습니다.');</script>history.back(-1);</script>";
    exit();
}
?>

<!-- 업로드된 파일의 경로를 화면에 표시 -->
<li>업로드 성공, 업로드 경로 : <?=$path.$filename?></li>
