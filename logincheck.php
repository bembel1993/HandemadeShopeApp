<?php
include('user.class.php');

$passworduser = strip_tags($_POST['password']);
$email = trim(strip_tags($_POST['email']));

$user = new User();
$adduser = $user->validationFieldLogin($email, $passworduser);
?>