<?php
// UTF-8 인코딩으로 HTML 문서 타입을 설정
header("Content-Type: text/html; charset=UTF-8");

$gubun = $_COOKIE["gubun"];

// $_FILES 배열에서 'userfile' 필드의 'name' 값이 비어있는지 확인
if(empty($_FILES["userfile"]["name"])) {
    // 파일이 선택되지 않았을 경우 경고창을 표시하고 이전 페이지로 돌아감
    echo "<script>alert('파일을 업로드 하세요!');history.back();</script>";
    exit();
}

// 업로드될 파일의 경로 설정
$path = "../upload/";
// 업로드된 파일의 이름을 가져옴
$filename = $gubun."_".$_FILES["userfile"]["name"];

$file_info = pathinfo($path.$filename);
$ext = strtolower($file_info["extension"]); //phP와 같은 대문자 혼합 사용한 확장자 우회 방법을 막는다.

if(empty($ext)) { //   test.php. 와 같이 마지막 확장자 뒤에 NULL 값을 사용한 확장자 우회 방법을 막는다.
    echo "<script>alert('허용되지 않은 확장자입니다!');history.back();</script>";
    exit();
}

$ext_arr = array("php", "html");
for($i=0; $i<count($ext_arr); $i++) { //php[공백], php::$DATA 가 들어가도 php만 들어가는 순간 검증을 하여 막는다.
    if(strpos($ext, $ext_arr[$i]) !== false) {
        echo "<script>alert('허용되지 않은 확장자입니다!');history.back();</script>";
        exit();
    }
}

// move_uploaded_file 함수를 사용하여 임시 저장된 파일을 지정된 위치로 이동
// 이동 실패시 에러 메시지 출력
if(!move_uploaded_file($_FILES["userfile"]["tmp_name"], $path.$filename)) {
    echo "<script>alert('파일 업로드에 실패하였습니다.');history.back();</script>";
    exit();
}
?>

<!-- 업로드된 파일의 경로를 화면에 표시 -->
<li>업로드 성공, 업로드 경로 : <?=$path.$filename?></li>
