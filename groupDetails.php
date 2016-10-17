<?php
/**
 * Created by PhpStorm.
 * User: rozz
 * Date: 17/10/2016
 * Time: 21:31
 */
include "database.php";

function getGroupName($groupCode, $conn){
    $sql = 'SELECT `groupName` FROM `Group` WHERE `groupPin` = "ds12"';
    $result = $conn->query($sql);
//    if ($result-> num_rows >0){
//        return $result[0];
//    }
    echo $result;
    return $result;
}

echo getGroupName("ds12", $conn);
