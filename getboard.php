<?php
  header('Content-Type: application/json; charset=utf-8');
  session_start();
  if(!isset($_SESSION["messages"])) {
    $_SESSION["messages"] = array();
  }
  echo json_encode($_SESSION);
 ?>
