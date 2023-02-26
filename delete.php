<?php
session_start();

include('user.class.php');

$id = $_GET['id'];

$user = new User();

$deleteUser = $user->delete($id);
