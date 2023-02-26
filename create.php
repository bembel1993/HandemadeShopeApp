<?php

include('user.class.php');

$nameSurname = strip_tags($_POST['name']);
$passworduser = strip_tags($_POST['password']);
$email = trim(strip_tags($_POST['email']));
$number = trim(strip_tags($_POST['number']));

//$user = new User($name, $surname, $birthday, $sex, $country);
//if (isset($_POST['userSubmit'])) {
$user = new User();
$adduser = $user->validationField($nameSurname, $passworduser, $email, $number);
/*} elseif (($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $user = new User();

    $deleteUser = $user->delete($id);
}*/

