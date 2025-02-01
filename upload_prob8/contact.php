
      <form action="eduAction.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">교육 과정</label>
          <select name="type" class="form-control">
            <option>- 선택 -</option>
            <option>웹 취약점 진단 과정</option>
            <option>웹 모의해킹 과정</option>
            <option>소스코드 진단 과정</option>
            <option>모바일 진단 과정</option>
          </select> 
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">이름</label>
          <input type="text" name="name" class="form-control" placeholder="이름을 입력하세요">
        </div>
              <div class="form-group">
          <label for="exampleInputEmail1">이메일 주소</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="이메일을 입력하세요">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">하고 싶은말</label>
          <textarea name="contents" class="form-control" rows="3"></textarea>
        </div>
        <p class="help-block">※ 한번 신청한 신청서는 수정이 되지 않습니다.</p>
        <button type="submit" class="btn btn-default">제출</button>
      </form>
      <br><br>
