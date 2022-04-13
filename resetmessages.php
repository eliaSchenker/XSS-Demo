<?php
    session_start();
    $_SESSION["messages"] = array();
    header("Location: index.html");
?>
