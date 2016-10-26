<?php
/**
 * Created by PhpStorm.
 * User: rozz
 * Date: 17/10/2016
 * Time: 21:31
 */
include "database.php";

function getGroupName($groupCode, $conn){
    $sql = 'SELECT `groupName` FROM `GroupTable` WHERE `groupCode` = "'.$groupCode.'"';
    $result = $conn->query($sql);
    if ($result-> num_rows >0){
        return $result -> fetch_assoc()['groupName'];
    } else return 'unknown group';
   // echo $result;
    //return $result;
}

//echo getGroupName("abxy", $conn);
