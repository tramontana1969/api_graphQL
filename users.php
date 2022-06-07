<?php
require 'connection.php';

class User
{

    public function store()
    {
        $user = Connection::connect("https://gorest.co.in/public/v2/users", 'get');
        return json_decode($user, true);
    }

    public function add($name, $email, $gender, $status)
    {
        Connection::$array = ['name' => $name, 'email' => $email, 'gender' => $gender, 'status' => $status];
        return Connection::connect("https://gorest.co.in/public/v2/users", 'post');
    }
}