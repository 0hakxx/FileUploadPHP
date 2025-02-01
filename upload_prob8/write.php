
      <form action="action.php" method="POST">
        <div class="form-group">
          <label>제목</label>
          <input type="text" name="title" class="form-control" placeholder="제목을 입력하세요">
        </div>

        <div class="form-group">
          <label>작성자</label>
          <input type="text" name="writer" class="form-control" id="exampleInputEmail1" placeholder="작성자를 입력하세요">
        </div>
        <div class="form-group">
          <label>패스워드</label>
          <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="패스워드를 입력하세요">
        </div>
        <div class="form-group">
          <label>내용</label>
          <textarea name="content" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>파일 업로드</label>
            <input type="hidden" name="file" id="file" class="form-control">
            <p style="text-align: left"><button type="button" class="btn btn-default btn-sm" onclick="window.open('upload.php','','scrollbars=no,width=300,height=200')">파일 첨부하기</button></p>
        </div>
        <input type="hidden" name="mode" value="write">
        <p style="text-align: center">
            <button type="submit" class="btn btn-info">작성</button>
            <button type="button" onclick="history.back(-1)" class="btn btn-danger">뒤로가기</button>
        </p>
      </form>
      <br><br>