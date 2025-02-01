<? include_once("./inc/common.php"); ?>
<?
  $idx = $_GET["idx"];

  if(!is_numeric($idx)){
    echo "<script>alert(\"올바르지 않은 값이 입력 되었습니다.\");history.back(-1);</script>";
    exit;
  }

  $query = "select * from {$tableName1} where gubun='{$gubun}' and idx={$idx} order by idx desc";
  $result = $db_conn->query($query);
  $num = $result->num_rows;

  if($num != 0) {
    $row = $result->fetch_assoc();
?>

      <form action="action.php" method="POST">
        <div class="form-group">
          <label>제목</label>
          <input type="text" name="title" class="form-control" value="<?=$row["title"]?>" placeholder="제목을 입력하세요">
        </div>

        <div class="form-group">
          <label>작성자</label>
          <input type="text" name="writer" class="form-control" value="<?=$row["writer"]?>" placeholder="작성자를 입력하세요">
        </div>
        <div class="form-group">
          <label>내용</label>
          <textarea name="content" class="form-control" rows="3"><?=$row["content"]?></textarea>
        </div>
        <div class="form-group">
            <label>파일 업로드</label>
            <p><input type="text" value="<?=$row["file"]?>" class="form-control input-sm" disabled></p>
            <input type="hidden" name="file" id="file" value="<?=$row["file"]?>" class="form-control">
            <p style="text-align: left"><button type="button" class="btn btn-default btn-sm" onclick="window.open('upload.php','','scrollbars=no,width=300,height=200')">파일 첨부하기</button></p>
        </div>
        <input type="hidden" name="idx" value="<?=$row["idx"]?>">
        <input type="hidden" name="mode" value="modify">
        <p style="text-align: center">
            <button type="submit" class="btn btn-info">작성</button>
            <button type="button" onclick="history.back(-1)" class="btn btn-danger">뒤로가기</button>
        </p>
      </form>
<?
  }
?>

      <br><br>