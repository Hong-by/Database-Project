<?php

  $mem_id = $_POST['mem_id'];
  $mem_pass = $_POST['mem_pass'];
  $mem_pf = $_FILES['mem_pf']['name'];
  $mem_name = $_POST['mem_name'];
  $mem_email = $_POST['mem_email'];
  $mem_regi = $_POST['mem_regi'];

  echo $mem_id, $mem_pass, $mem_pf, $mem_name, $mem_email, $mem_regi;

?>