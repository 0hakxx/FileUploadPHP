<? include_once("./inc/common.php"); ?>
<?
  header("Content-Type: text/html; charset=UTF-8");

  $mode = $_REQUEST["mode"];
  $title = $_POST["title"];
  $contents = $_POST["contents"];
  $writer = $_POST["writer"];
  $file = $_POST["file"];
  $idx = $_REQUEST["idx"];
  $password = $_POST["password"];

  $title = $db_conn->real_escape_string($title);
  $contents = $db_conn->real_escape_string($contents);
  $writer = $db_conn->real_escape_string($writer);
  $file = $db_conn->real_escape_string($file);
  $password = $db_conn->real_escape_string($password);

  if($mode == "write") {
    $query = "insert into {$tableName1} (title, writer, contents, date, file, gubun, password) values ('{$title}', '{$writer}', '{$contents}', now(), '{$file}', '{$gubun}', '{$password}')";
    $db_conn->query($query);
  } else if($mode == "modify") {
    if(!is_numeric($idx)){
        echo "<script>alert(\"올바르지 않은 값이 입력 되었습니다.\");history.back(-1);</script>";
        exit;
    }
    $query = "update {$tableName1} set title='{$title}', writer='{$writer}', contents='{$contents}', date=now(), file='{$file}' where idx={$idx}";
    $db_conn->query($query);
  } else if($mode == "delete") {
    if(!is_numeric($idx)){
        echo "<script>alert(\"올바르지 않은 값이 입력 되었습니다.\");history.back(-1);</script>";
        exit;
    }
    $query = "delete from {$tableName1} where idx={$idx}";
    $db_conn->query($query);
  } else {
    echo "<script>alert(\"올바르지 않은 값이 입력 되었습니다.\");history.back(-1);</script>";
    exit;
  }

  echo "<script>location.href='index.php?page=list';</script>";
?>