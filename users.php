<?php
require 'connection.php';

class User {
    public function store () {
        return Connection::connect("https://gorest.co.in/public/v2/users");
    }
}