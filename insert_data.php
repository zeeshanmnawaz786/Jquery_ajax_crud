<?php
include("db.php");

    $name= $_POST['name'];
    $email= $_POST['email'];

    if($name != '' && $email != ''){
        $query = "INSERT INTO `users`(`name`, `email`) VALUES ('$name','$email')";
        mysqli_query($conn, $query);
        echo "data Successfully Submit";
    }
    else{
        echo "data not Submit";
    }
?>