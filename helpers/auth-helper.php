<?php

function redirect($url, $permanent = false){
    if(headers_sent() === false){
       header("location:$url", true, ($permanent === true ? 301 : 302 )); // permanent la page exsite pas donc c'est une autre et temporaire c'est une autre page qui est temporaire 
    }
}