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
      <div class="table-responsive">
      <table class="table table-bordered table-hover">
          <tr>
            <th width="20%" style="text-align : center">제목</th>
            <td width="80%"><?=$row["title"]?></td>
          </tr>
          <tr>
            <th width="20%" style="text-align : center">작성자</th>
            <td width="80%"><?=$row["writer"]?></td>
          </tr>
          <tr>
            <th width="20%" style="text-align : center">내용</th>
            <td width="80%"><?=$row["contents"]?></td>
          </tr>
          <tr>
            <th width="20%" style="text-align : center">첨부파일</th>
            <td width="80%"><a href="download.php?file=<?=$row["file"]?>"><?=$row["file"]?></a></td>
          </tr>
<?
  }
?>
      </table>
      </div>
        <p style="text-align: center">
            <button type="submit" onclick="location.href='index.php?page=modify&idx=<?=$idx?>'" class="btn btn-info">수정</button>
            <button type="button" onclick="location.href='action.php?mode=delete&idx=<?=$idx?>'" class="btn btn-danger">삭제</button>
            <button type="button" onclick="history.back(-1)" class="btn btn-primary">목차</button>
        </p>
