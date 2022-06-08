<?php

require_once __DIR__.'/../Connection/Connection.php';

class User
{

    public function store()
    {
        $user = Connection::connect("https://gorest.co.in/public/v2/users", 'get');

        return json_decode($user, true);
    }

    public function add($name, $email, $gender, $status)
    {
        Connection::$user_data = ['name' => $name, 'email' => $email, 'gender' => $gender, 'status' => $status];

        return Connection::connect("https://gorest.co.in/public/v2/users", 'post');
    }

    public function update($id, $name, $email, $gender, $status)
    {
        Connection::$user_data = ['name' => $name, 'email' => $email, 'gender' => $gender, 'status' => $status];

        return Connection::connect("https://gorest.co.in/public/v2/users/{$id}", 'put');
    }

    public function delete($id)
    {
        Connection::$user_data = ['id' => $id];

        return Connection::connect("https://gorest.co.in/public/v2/users/{$id}", 'delete');
    }
}