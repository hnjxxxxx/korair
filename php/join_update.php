<?php
  include('./dbconn.php');

  $mb_id = trim($_POST['mb_id']);
  $mb_password = trim($_POST['mb_password']);

  $mb_name = trim($_POST['mb_name']);
  date_default_timezone_set('Asia/Seoul');
  $mb_datetime = date('Y-m-d H:i:s', time());
  
  echo $mb_id .'<br>';
  echo $mb_password .'<br>';
  echo $mb_name .'<br>';
  echo $mb_datetime .'<br>';

  //1. 8.0이하 암호화 방법
  // $sql = "select PASSWORD('$mb_password') AS pass";
  // $result = mysqli_query($conn,$sql);
  // $row = mysqli_fetch_assoc($result);
  // $mb_password = $row['pass'];
  // echo "암호화 비밀번호 : " . $mb_password .'<br>';
  
  //2. 더강력한 암호화 방법 - password_hash (새로고침할 때마다 바뀜)
  $mb_password = PASSWORD_HASH($mb_password, PASSWORD_DEFAULT);
  echo $mb_password;
  //데이터베이스에 입력
  // $sql = "insert into korair_member set mb_id='$mb_id', mb_password='$mb_password', mb_name='$mb_name', mb_datetime='$mb_datetime'";
  $sql = "insert into korair_member(mb_id, mb_password, mb_name, mb_datetime) value('$mb_id', '$mb_password', '$mb_name', '$mb_datetime')";


  $result = mysqli_query($conn,$sql);

  if($result){
    echo "<script>alert('회원가입이 완료되었습니다.');</script>";
    echo "<script>location.replace('../login.php');</script>";
  }else{
    echo "회원가입 실패 : ". mysqli_error($conn);
    mysqli_close($conn);
  }
?>