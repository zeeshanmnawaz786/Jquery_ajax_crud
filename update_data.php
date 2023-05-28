<?php
include("db.php");

$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];

if($id != "" || $name != "" || $email != "" ){
    $query = "UPDATE `users` SET `name`='$name',`email`='$email' WHERE id='$id'";
    mysqli_query($conn, $query);
}

?>