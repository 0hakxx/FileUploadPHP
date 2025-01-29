<?php
header("Content-Type: text/html; charset=UTF-8");
?>
<!-- 파일 업로드를 위한 HTML 폼 -->
<!-- 일반적인 폼 전송 방식인 application/x-www-form-urlencoded는 텍스트 데이터만 전송-->
<!-- multipart/form-data는 파일 업로드 시 반드시 사용해야 하는 인코딩 타입 -->
<!-- 이유 1: 일반 form-data는 텍스트만 전송 가능하지만, multipart는 파일 데이터를 바이너리로 전송할 수 있습니다 -->
<!-- 이유 2: 파일을 여러 부분(parts)으로 나누어 전송하므로 대용량 파일도 처리 가능합니다 -->
<!-- 이유 3: 파일과 텍스트 데이터를 함께 전송할 수 있습니다 -->
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <!-- 파일 선택용 input -->
    <input type="file" name="userfile">
    <!-- 제출 버튼 -->
    <input type="submit" value="UPLOAD">
</form>


<form action="upload_test.php" method="POST" enctype="multipart/form-data">
    <!-- 파일 선택용 input -->
    <input type="file" name="userfile">
    <!-- 제출 버튼 -->
    <input type="submit" value="TEST용">
</form>
