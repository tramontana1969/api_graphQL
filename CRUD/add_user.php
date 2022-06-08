<?php
require_once '../Controllers/User.php';

$user = new User();

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['gender']) && !empty($_POST['status'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];

    $user->add($name, $email, $gender, $status);
}

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
exit();