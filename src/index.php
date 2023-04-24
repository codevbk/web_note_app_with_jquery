<?php
include "config.php";
$urlHost = "/".PROJECT_NAME;

if($_SERVER['HTTP_HOST'] == COMPOSER_WEBSERVER){
    $urlHost = "";
}

include DOCUMENT_PUBLIC."/home.php";
?>
