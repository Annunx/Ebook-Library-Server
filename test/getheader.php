<?php
    $header =  $_SERVER['HTTP_USER_AGENT'];
    $ret = strstr($header, "Kindle");
    if ($ret) {
        echo "Kindle";
    } else {
        echo "Not Kindle";
    }