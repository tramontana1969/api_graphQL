<?php

require_once '../Controllers/User.php';

$user = new User();

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $user->delete($id);
}

header("Location: ../index.php");
exit();