<?php

  session_start();
  if(isset($_SESSION['useridx'])){
    $useridx = $_SESSION['useridx'];
  } else {
    $useridx = "";
  }
  
  $post_id = $_POST['postId'];
  $type = $_POST['type'];

  // echo $useridx.'<br>';
  // echo $post_id.'<br>';
  // echo $type.'<br>';

  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
  //기존에 있던 좋아요, 싫어요 수를 읽어서 초기화
  $sql = "SELECT COUNT(*) AS cntpost FROM zay_like_unlike WHERE ZAY_like_unlike_postid='{$post_id}' AND ZAY_like_unlike_userid='{$useridx}'";

  $result = mysqli_query($dbConn, $sql);
  $fetch_data = mysqli_fetch_array($result);
  $count = $fetch_data['cntpost'];

  // echo $count;
  if($count == 0){//테이블에 나의 아이디로 해당 상품에 좋아요, 싫어요 누른적이 없어 데이터가 없다면 데이터 삽입
    $insert_query = "INSERT INTO zay_like_unlike(
      ZAY_like_unlike_userid,
      ZAY_like_unlike_postid,
      ZAY_like_unlike_type
    ) VALUES(
      '{$useridx}',
      '{$post_id}',
      '{$type}'
    )";
    mysqli_query($dbConn, $insert_query);
  } else {//누른적이 있어 데이터가 있다면 데이터 없데이트
    $update_query = "UPDATE zay_like_unlike SET ZAY_like_unlike_type=$type WHERE ZAY_like_unlike_userid=$useridx AND ZAY_like_unlike_postid=$post_id";
    mysqli_query($dbConn, $update_query);
  }

  $sql1 = "SELECT COUNT(*) totalLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=1 AND ZAY_like_unlike_postid=$post_id";//좋아요 총 갯수
  $result1 = mysqli_query($dbConn, $sql1);
  $fetch_likes = mysqli_fetch_array($result1);
  $total_likes = $fetch_likes['totalLikes'];

  $total_sql = "UPDATE zay_pro SET ZAY_pro_like=$total_likes WHERE ZAY_pro_idx=$post_id";

  mysqli_query($dbConn, $total_sql);

  // echo $total_likes


  $sql2 = "SELECT COUNT(*) totalunlikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=0 AND ZAY_like_unlike_postid=$post_id";//싫어요 총 갯수
  $result2 = mysqli_query($dbConn, $sql2);
  $fetch_unlikes = mysqli_fetch_array($result2);
  $total_unlikes = $fetch_unlikes['totalunlikes'];

  // echo $total_unlikes

  $total_arr = array("likes" => $total_likes, "unlikes" => $total_unlikes);

  echo json_encode($total_arr);


?>