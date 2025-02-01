<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CREATIVE IDEA SPACE #</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/form-validation.css" rel="stylesheet">

  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <h2><span data-feather="users"></span>&nbsp;Creative Idea Space Sign up</h2>
        <p class="lead">풀리지 않는 것이 있으신가요? 저희가 그것을 풀어드리겠습니다. 동반자가 되어 드리겠습니다.</p>
      </div>

      <div class="row">
        <div class="col-md">
            <div class="mb-3">
              <form>
                <label>Profile Image</label>
                <div class="text-center">
                    <img id="profile_img" data-src="holder.js/100x100" class="rounded-0" alt="100x100" data-holder-rendered="true" style="width: 100px; height: 100px;">
                </div>
                <br>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="img" name="img">
                        <label class="custom-file-label" for="fileInput">Choose Image file</label>
                    </div>
                  </div>
               </form>
            </div>
			<div class="text-muted" role="alert">
			  ※ 프로필 이미지는 가로x세로 100이하로 업로드가 가능합니다.
			</div>
            <hr class="mb-4">
          <form class="needs-validation" action="signupAction.php" method="POST" novalidate>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                (필수) 이메일을 입력하세요.
              </div>
            </div>
            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
              <div class="invalid-feedback">
                (필수) 패스워드를 입력하세요.
              </div>
            </div>
            <div class="mb-3">
              <label>Company</label>
              <input type="text" name="company" class="form-control" placeholder="Company" required>
              <div class="invalid-feedback">
                (필수) 회사를 입력하세요.
              </div>
            </div>
            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                    (필수) 이름을 입력하세요.
                </div>
              </div>
            </div>
			<input type="hidden" id="imgurl" name="imgurl">
            <button class="btn btn-danger btn-sm btn-block" type="submit">JOIN</button>
            <button class="btn btn-outline-dark btn-sm btn-block" type="button" onclick="location.href='index.html'">← BACK</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 Creative Idea Space</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="./js/jquery.min.js"></script>

    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/holder.min.js"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
        $("#img").on('change', function(){  // 값이 변경되면  
 
          if(window.FileReader){  // modern browser
            var filename = $(this)[0].files[0].name;
          } else {  // old IE
            var filename = $(this).val().split('/').pop().split('\\').pop();  // 파일명만 추출
          }
		  
			// 확장자 검증
			var ext = filename.split('.').pop().toLowerCase();
			if($.inArray(ext, ['gif','png','jpg']) == -1) {
				alert('GIF / PNG / JPG 파일만 업로드 할수 있습니다.');
				return;
			}
		  
          // 추출한 파일명 삽입
          $("label[for='fileInput'").text(filename);

		 var form = $('form')[0];
		 var formData = new FormData(form);
			 $.ajax({
				url: 'upload.php?type=img',
				processData: false,
				contentType: false,
				data: formData,
				dataType: "json",
				type: 'POST',
				success: function(data){
					$.each(data, function(){
						if(this.flag == "Y") {
							$("#profile_img").attr("src", this.url);
							$("#imgurl").val(this.url);
						} else {
							alert("업로드 실패 : " + this.msg);
						}
					});
				}
			});
        });
      });
    </script>  
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
