<?php
  include('./php/dbconn.php');
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>대한항공 -로그인</title>
  <!-- 파비콘 -->
  <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
</head>
<body>
  <main>
    <section>
      <h2>Login</h2>
      <form name="login" method="post" action="./php/login_check.php" onsubmit="return formCheck();">
        <p>
          <label for="mb_id">아이디</label>
          <input id="mb_id" name="mb_id" type="text">
          
        </p>
        <p>
          <label for="mb_password">패스워드</label>
          <input id="mb_password" name="mb_password" type="password">
        </p>
        <p>
          <input id="id_save" type="checkbox">
          <label for="id_save">아이디 저장</label>
        </p>
        <p>
          <input id="login_btn" type="submit" value="로그인">
          
        </p>
        <p>
          <a href="./index.php" title="메인화면으로">메인화면으로</a>
          <a href="id_search.php" title="아이디찾기">아이디찾기</a>
          <a href="pw_search.php" title="비번찾기">비번찾기</a>
          <a href="join.php" title="회원가입">회원가입</a> 
        </p>

        <h3>SNS로그인</h3>
        <a href="#none" title="카카오 로그인">카카오 로그인</a>
        <a href="#none" title="네이버 로그인">네이버 로그인</a>
        <a href="#none" title="구글 로그인">구글 로그인</a>
      </form>
    </section>
  </main>

  <script>
    function formCheck(){
      let id = document.getElementById('mb_id');
      let pw = document.getElementById('mb_password');

      if(id.value.length<1){
        alert('아이디를 입력하지 않았습니다.');
        id.focus();
        return false;
      }
      if(pw.value.length<1){
        alert('비밀번호를 입력하지 않았습니다.');
        pw.focus();
        return false;
      }
    }
  </script>
</body>
</html>