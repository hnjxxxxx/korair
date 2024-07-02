<?php
  include('./dbconn.php');

  $mb_id = trim($_POST['mb_id']);
  $mb_password = trim($_POST['mb_password']);

  echo $mb_id, $mb_password. '<br>';

  //데이터베이스에서 데이터 검색
  $sql = "select * from korair_member where mb_id='$mb_id'";
  $result = mysqli_query($conn,$sql);
  $mb = mysqli_fetch_array($result);

  // echo '아이디:'. $mb['mb_id']. "<br>";
  echo '비밀번호:'. $mb['mb_password']. "<br>";

  //데이터베이스 패스워드와 입력한 패스워드가 일치하는지 확인
  //방법1.
  // $sql = "select PASSWORD('$mb_password') AS pass";
  // $result = mysqli_query($conn,$sql);
  // $row = mysqli_fetch_array($result);
  // $password = $row['pass'];

  // echo '사용자가 입력한 암호 :'. $mb_password. '<br>';
  // echo '데이터베이스 암호 :'. $password;

  //만약에 사용자입력암호와 데이터베이스암호가 일치하지 않는다면
  // if(!$mb['mb_id']||!($mb_password===$mb['mb_password'])){
  //   echo "<script>alert('가입된 회원아이디가 아니거나 비밀번호가 틀립니다.\\n비밀번호는 대소문자를 구분합니다.');</script>";
  //   echo "<script>location.replace('../login.php');</script>";
  // }

  // $_SESSION['ss_mb_id'] = $mb_id;

  // mysqli_close($conn);
  // if(isset($_SESSION['ss_mb_id'])){
  //   echo "<script>alert('로그인 되었습니다.');</script>";
  //   echo "<script>location.replace('../index.html');</script>";
  // }

  //방법2. 해쉬암호화한 경우
  if(!$mb['mb_id']){
    echo "<script>alert('아이디가 존재하지 않습니다.');</script>";
    echo "<script>location.replace('../login.php');</script>";
    exit;
  }
  if(password_verify($mb_password, $mb['mb_password'])){
    $_SESSION['ss_mb_id'] = $mb_id;
    echo "<script>alert('로그인 완료되었습니다.');</script>";
    echo "<script>location.replace('../index.php');</script>";
  }else{ // 패스워드가 다를 경우
    echo "<script>alert('패스워드가 다릅니다. 다시 확인하세요.');</script>";
    echo "<script>location.replace('../login.php');</script>";
    exit;
  }

?>