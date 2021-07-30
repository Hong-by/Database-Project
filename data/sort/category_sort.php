<?php

$sort_key = $_GET['key'];


include $_SERVER["DOCUMENT_ROOT"].'/connect/db_conn.php';

if($sort_key == "all" || $sort_key == "new"){
  $sql1 = "SELECT * FROM zay_pro ORDER BY ZAY_pro_idx DESC";
} else if($sort_key == "price"){
  $sql1 = "SELECT * FROM zay_pro ORDER BY ZAY_pro_pri ASC";
} else if($sort_key == "like"){
  $sql1 = "SELECT * FROM zay_pro ORDER BY ZAY_pro_like DESC";
} else {
  $sql1 = "SELECT * FROM zay_pro WHERE ZAY_pro_cate='{$sort_key}' ORDER BY ZAY_pro_idx DESC";
}


$pro_result = mysqli_query($dbConn, $sql1);



while($pro_row = mysqli_fetch_array($pro_result)){
  $pro_row_idx = $pro_row['ZAY_pro_idx'];
  $pro_row_img = $pro_row['ZAY_pro_img_01'];
  $pro_row_tit = $pro_row['ZAY_pro_name'];
  $pro_row_desc = $pro_row['ZAY_pro_desc'];
  $pro_row_pri = $pro_row['ZAY_pro_pri'];

  //좋아요 싫어요 기능 구현
  $like_unlike_type = -1;

// $status_query = "SELECT COUNT(*) AS cntStatus FROM zay_like_unlike WHERE 	ZAY_like_unlike_userid='{$useridx}' AND ZAY_like_unlike_postid='{$pro_row_idx}'";
$status_query = "SELECT * FROM zay_like_unlike WHERE ZAY_like_unlike_userid='{$useridx}' AND ZAY_like_unlike_postid='{$pro_row_idx}'";

$status_result = mysqli_query($dbConn, $status_query);
$status_num = mysqli_num_rows($status_result);
$status_row = mysqli_fetch_array($status_result);
// $count_status = $status_row['cntStatus'];
//echo $status_row;

//---------------
if($status_num > 0){
  $like_unlike_type=$status_row['ZAY_like_unlike_type'];
}

  $like_query = "SELECT COUNT(*) cntLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=1 AND ZAY_like_unlike_postid='{$pro_row_idx}'";
  $like_result = mysqli_query($dbConn, $like_query);
  $like_row = mysqli_fetch_array($like_result);
  $total_like = $like_row['cntLikes'];

  // echo $total_like;

  $unlike_query = "SELECT COUNT(*) cntUnlikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=0 AND ZAY_like_unlike_postid='{$pro_row_idx}'";
  $unlike_result = mysqli_query($dbConn, $unlike_query);
  $unlike_row = mysqli_fetch_array($unlike_result);
  $total_unlike = $unlike_row['cntUnlikes'];

?>
<!-- Featured Loop Item -->
<div class="featured_item">
  <div class="item_frame">
    <a href="/zay/pages/details/pro_detail_form.php?pro_idx=<?=$pro_row_idx?>">
      <div class="featured_img">
        <img src="/zay/data/product_imgs/<?=$pro_row_img?>" alt="">
      </div>
    </a>
    <div class="like_unlike">
      <div class="like_icons">

        <?php if(!$userid){ ?>
        <span onclick="plzLogin()">좋아요 | <b><?=$total_like?></b></span>
        <span onclick="plzLogin()">별로에요 | <b><?=$total_unlike?></b></span>
        <?php } else { ?>

        <span id="like_<?=$pro_row_idx?>" class="like"
          style="<?php if($like_unlike_type == 1){ echo "background: #59ab6e; color: #fff;"; } ?>">좋아요 |
          <b id="likes_<?=$pro_row_idx?>"><?=$total_like?></b></span>
        <span id="unlike_<?=$pro_row_idx?>" class="unlike"
          style="<?php if($like_unlike_type == 0){ echo "background: lightcoral; color: #fff;"; } ?>">별로에요
          | <b id="unlikes_<?=$pro_row_idx?>"><?=$total_unlike?></b></span>
        <?php } ?>


      </div>
      <p><i class="fa fa-krw"></i> <?=$pro_row_pri?></p>
    </div>
    <div class="featured_txt">
      <h3><?=$pro_row_tit?></h3>
      <p class="desc"><?=$pro_row_desc?></p>
    </div>
    <?php
                $sql2 = "SELECT * FROM zay_review WHERE ZAY_pro_rev_con_idx=$pro_row_idx";
                $rev_result = mysqli_query($dbConn, $sql2);
                $rev_total = mysqli_num_rows($rev_result);
              ?>
    <div class="reviews">
      <em>Comments(<?=$rev_total?>)</em>
    </div>
  </div>
</div>
<!-- End of Featured Loop Item -->
<?php
  };
?>