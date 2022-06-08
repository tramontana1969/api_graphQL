<?php
require 'User.php';

$user = new User();

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $user->delete($id);
}

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
exit();