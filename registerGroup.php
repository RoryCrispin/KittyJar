<?php
include "database.php";
//echo ($_POST['groupname']);

$data = json_decode($_POST["people"]);

$sql = "INSERT INTO `Group`(`groupName`, `groupPin`)
VALUES ('" .$_POST['groupname']  . "', 'abxy');";
echo $sql;







if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$groupId = mysqli_insert_id($conn);

foreach ($data as $member){
    $sql = "INSERT INTO `User`(	`groupID`, `name`) VALUES ('". $groupId."', '" . $member ."');";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



$conn->close();




?>


