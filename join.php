<?php
  include('./php/dbconn.php');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>대한항공 - 회원가입</title>
  <!-- 파비콘 -->
  <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <!-- swiper서식 -->
  <link rel="stylesheet" href="./css/swiper.css" type="text/css">
  <style>
    .id_check{
      color:#f00;
    }
  </style>
</head>
<body>
  <main>
    <section>
      <h2>회원가입</h2>
      <form name="join" method="post" action="./php/join_update.php" onsubmit="return formCheck();">
        <!-- mb_no, mb_id, mb_password, mb_name, mb_datetime -->
        <p>
          <label for="mb_id">아이디 : </label>
          <input id="mb_id" name="mb_id" type="text" max-length="16" placeholder="아이디">
          <!-- <input id="id_check" type="button" value="중복확인"> -->
          <div class="id_check">아이디가 실시간으로 검사됩니다.</div>
        </p>
        <p>
          <label for="mb_password">비밀번호 : </label>
          <input id="mb_password" name="mb_password" type="password" max-length="16" placeholder="비밀번호">
        </p>
        <p>
          <label for="mb_name">이름 : </label>
          <input id="mb_name" name="mb_name" type="text" max-length="16" placeholder="이름">
        </p>
        <p>
          <input id="sub_btn" type="submit" value="가입하기">
          <input id="reset_btn" type="reset" value="취소하기">
        </p>
      </form>
    </section>
  </main>

  <!-- swiper 스크립트 -->
  <script src="./script/swiper.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script>
    function formCheck(){
      let id = document.getElementById('mb_id');
      let pw = document.getElementById('mb_password');
      let name = document.getElementById('mb_name');
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
      if(name.value.length<1){
        alert('이름을 입력하지 않았습니다.');
        name.focus();
        return false;
      }
    }
    $(document).ready(function(){
      //방법1. 버튼 눌렀을 때 함수가 실행됨
      // $('#btn').on('click', function(){

      // });

      //방법2. id입력폼에 키보드를 누르자마자 바로 함수가 실행됨(keyup)
      $('#mb_id').on('keyup', function(){
        let self = $(this);
        let mb_id;
        // alert('a');

        //id일치하면
        if(self.attr('id')==='mb_id'){
          mb_id = self.val(); // 입력한 값을 변수에 담기
        }
        $.post(
          "./php/id_check.php",
          {mb_id:mb_id},
          function(data){
            self.parent().parent().find('div').html(data);
            self.parent().parent().find('div').addClass('id_check');
          }
        )
      })
    })    
  </script>
</body>
</html>