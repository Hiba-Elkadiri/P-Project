<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<?php
if( isset($_POST['submit']) ) {
    $emailValue = $_POST['email'];
    $passwordValue = $_POST['password'];
    if( empty($emailValue) || 
empty($passwordValue ) ) {
        echo'<h1> empty values </h1>';
    }else{
        echo 'Welcome, your informarion: <br>';
        echo "Email : $emailValue <br>";
        echo "Password : $passwordValue <br>";
    }
}else{
    echo("Please Log In!");
}

?>