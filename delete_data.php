<?php
include("db.php");

$id=  $_POST["id"];

if ($id != ""){
    $query = "DELETE FROM `users` WHERE id='$id'";
    mysqli_query($conn, $query);
}
?>