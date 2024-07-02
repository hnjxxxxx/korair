<?php
  include('./dbconn.php');

  $mb_id = trim($_POST['mb_id']);

  if($mb_id != NULL){ //아이디값을 전달받았다면
    $sql = "SELECT * FROM korair_member WHERE mb_id ='$mb_id'";
    $result = mysqli_query($conn,$sql);
    $mb = mysqli_fetch_assoc($result);

    if(isset($mb['mb_id'])){ //동일한 아이디가 존재한다면
      echo "존재하는 아이디입니다.";
    }else{
      echo "존재하지 않는 아이디입니다.";
    }
  }
?>