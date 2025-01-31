<? include_once("./inc/common.php"); ?>
<?
  $query = "select * from {$tableName1} where gubun='{$gubun}' order by idx desc";
  $result = $db_conn->query($query);
  $num = $result->num_rows;
?>
      <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th width="10%" style="text-align : center">NO</th>
            <th width="50%" style="text-align : center">제목</th>
            <th width="20%" style="text-align : center">작성자</th>
            <th width="20%" style="text-align : center">날짜</th>
          </tr>
        </thead>
        <tbody>
          <?
          if($num != 0) {
            for ( $i=0; $i<$num; $i++ ) {
              $row = $result->fetch_assoc();
          ?>
            <tr>
              <td style="text-align : center"><?=$row["idx"]?></td>
              <td><a href="index.php?page=view&idx=<?=$row["idx"]?>"><?=$row["title"]?></a></td>
              <td style="text-align : center"><?=$row["writer"]?></td>
              <td style="text-align : center"><?=$row["date"]?></td>
            </tr>
          <?
            }
          } else {
          ?>
            <tr>
              <td colspan="4" style="text-align : center">등록한 게시글이 존재하지 않습니다.</td>
            </tr>
        <? } ?>
        </tbody>
      </table>
      </div>
      <p style="text-align : right"><button type="button" class="btn btn-default" onclick="location.href='index.php?page=write'">글쓰기</button></p>

