<?php

// $a = $_POST['cart_img'];
// $b = $_POST['cart_name'];
// $c = $_POST['cart_desc'];
// $d = $_POST['cart_pri'];

// echo $a, $b, $c, $d;
session_start();
// session_destroy();
if($_SERVER["REQUEST_METHOD"]=="POST"){//포스트 방식으로 데이터가 넘어올 경우

  if(isset($_POST['add_to_cart'])){//add_to_cart 네임 변수의 버튼을 눌러 넘어올 경우
    if(isset($_SESSION['cart'])){
      $addedItem = array_column($_SESSION['cart'], 'cart_name');

      if(in_array($_POST['cart_name'], $addedItem)){
        //in_array(a, b): b 배열에서 a 요소가 있으면 true
        echo "
        <script>
          alert('이미 추가된 상품 입니다.');
          history.go(-1);
        </script>
      ";
      } else {
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count]=array('cart_img'=>$_POST['cart_img'], 'cart_name'=>$_POST['cart_name'], 'cart_desc'=>$_POST['cart_desc'], 'cart_pri'=>$_POST['cart_pri'], 'cart_idx'=>$_POST['cart_idx'], 'cart_quan'=> 1 );

        echo "
          <script>
            alert('카트에 상품이 추가되었습니다.');
            history.go(-1);
          </script>
        ";
      }

      
      // var_dump($addedItem);

    } else {
      $_SESSION['cart'][$count]=array('cart_img'=>$_POST['cart_img'], 'cart_name'=>$_POST['cart_name'], 'cart_desc'=>$_POST['cart_desc'], 'cart_pri'=>$_POST['cart_pri'], 'cart_idx'=>$_POST['cart_idx'], 'cart_quan'=> 1 );
      // var_dump($_SESSION['cart']);

      echo "
        <script>
          alert('카트에 상품이 추가되었습니다.');
          history.go(-1);
        </script>
      ";
    }
  } //end check post add_to_cart name

  // start check remove_cart post name

  if(isset($_POST['remove_cart'])){
    
    foreach($_SESSION['cart'] as $key => $value){
      if($value['cart_name'] == $_POST['cart_remove']){ //추가된 카트 정보 중 상품 이름이 cart_remove value 값으로 넘어온 것과 같은 경우
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        echo "
        <script>
          alert('상품이 제거 되었습니다.');
          history.go(-1);
        </script>
      ";
      }
    }
  }


}


?>