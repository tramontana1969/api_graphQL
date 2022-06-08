<?php
require_once '../Controllers/User.php';

$user = new User();

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$status = $_POST['status'];

if (!empty($name) && !empty($email) && !empty($gender) && !empty($status)) {
    $user->add($name, $email, $gender, $status);
}

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
exit();