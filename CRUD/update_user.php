<?php

require_once "../Controllers/User.php";

$user = new User();

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$status = $_POST['status'];

if (!empty($id) && !empty($name) && !empty($email) && !empty($gender) && !empty($status)) {
    $user->update($id, $name, $email, $gender, $status);
}

header("Location: ../index.php");
exit();