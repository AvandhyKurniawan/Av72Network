<?php
function decodePassword($param){
    $decodedPassword = $param;
    for($i=0; $i<7; $i++){
        $decodedPassword = base64_decode($decodedPassword);
    }
    return $decodedPassword;
}

function encodePassword($param){
    $encodedPassword = $param;
    for($i=0; $i<7; $i++){
        $encodedPassword = base64_encode($encodedPassword);
    }
    return $encodedPassword;
}

function encodeValueMysql($param){
    $originStr = $param;
    $command = "TO_BASE64($param)";
    for($i=0; $i<6; $i++){
        $command = "TO_BASE64($command)";
    }
    $command .= " AS $originStr";
    return $command;
}
?>