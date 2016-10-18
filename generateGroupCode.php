<?php
/**
 * Created by PhpStorm.
 * User: rozz
 * Date: 17/10/2016
 * Time: 17:00
 */

include 'database.php';

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function getGroupName($conn){

    $id = generateRandomString(4);

    $sql = "select `groupCode` from `Group` where `groupCode` ='".$id ."'";
    $result = $conn->query($sql);

    if ($result -> num_rows == 0){
        return $id;
    } else {
        return getGroupName($conn);
    }

}
