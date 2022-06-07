<?php
require 'users.php';
$users = new User();
$all = $users->store();
printf($all);
?>
<DOCTYPE html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Users</title>
    <body>
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>gender</th>
            <th>status</th>
        </tr>

            <?php foreach ($users->store() as $user) {
                echo "<tr>";
                echo "<td>".$user['id']."</td>";
                echo "<td>".$user['name']."</td>";
                echo "<td>".$user['email']."</td>";
                echo "<td>".$user['gender']."</td>";
                echo "<td>".$user['status']."</td>";
                echo "</tr>";
            } ?>

    </table>
    <form method="post" action="add_user.php">
        <label>name
            <input type="text" name="name">
        </label>
        <label>email
            <input type="email" name="email">
        </label>
        <label>gender
            <input type="text" name="gender">
        </label>
        <label>status
            <input type="text" name="status">
        </label>
        <input type="submit" value="add">
    </form>
    </body>