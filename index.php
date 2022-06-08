<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'Controllers/User.php';
$users = new User();
$all = $users->store();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html>
<DOCTYPE html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
    <title>Users</title>
    <body>
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>gender</th>
            <th>status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($users->store() as $user) :
            echo "<tr>";
            echo "<td>" . $user['id'] . "</td>";
            echo "<td>" . $user['name'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['gender'] . "</td>";
            echo "<td>" . $user['status'] . "</td>"; ?>
            <td>
                <?php echo "<div class='modal fade' id='updateModalToggle_{$user['id']}' aria-hidden='true'
                     aria-labelledby='exampleModalToggleLabel'
                     tabindex='-1'>" ?>
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="CRUD/update_user.php">
                                <div class="mb-3">
                                    <?php echo "<input type='hidden' name='id' value={$user['id']} />" ?>
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <?php echo "<input type='text' name='name' value='{$user['name']}' 
                                                class='form-control' id='exampleInputEmail1'
                                               aria-describedby='emailHelp'>"; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Email</label>
                                    <?php echo "<input type='email' name='email' class='form-control' value={$user['email']}
                                               id='exampleInputPassword1'>"; ?>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label" for="exampleCheck1">Gender</label>
                                    <select class="form-select" aria-label="Default select example" name="gender">
                                        <?php
                                        if ($user['gender'] === 'male'):
                                            echo "<option value='female'>female</option>";
                                        else:
                                            echo "<option value='male'>male</option>";
                                        endif;
                                        echo "<option selected value={$user['gender']}>{$user['gender']}</option>";
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label" for="exampleCheck1">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <?php
                                        if ($user['status'] == 'active'):
                                            echo "<option value='inactive'>Inactive</option>";
                                        else:
                                            echo "<option value='active'>active</option>";
                                        endif;
                                        echo "<option selected value={$user['status']}>{$user['status']}</option>";
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <?php echo "<a class='btn btn-primary' data-bs-toggle='modal' 
                                href='#updateModalToggle_{$user['id']}' role='button'>Edit User</a>" ?>
            </td>
            <td>
                <?php echo "<div class='modal fade' id='deleteModalToggle_{$user['id']}' aria-hidden='true'
                     aria-labelledby='exampleModalToggleLabel'
                     tabindex='-1'>" ?>
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Delete User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete that user?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <form method="post" action="CRUD/delete_user.php">
                                <?php echo "<input type='hidden' name='id' value='{$user['id']}'/>"; ?>
                                <input class="btn btn-danger" type="submit" value="Delete"/>
                            </form>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
                <?php echo "<a class='btn btn-danger' data-bs-toggle='modal' 
                                href='#deleteModalToggle_{$user['id']}' role='button'>Delete</a>" ?>
            </td>
            <?php echo "</tr>";
        endforeach;
        ?>
    </table>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Fill Fields</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="CRUD/add_user.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label" for="exampleCheck1">Gender</label>
                            <select class="form-select" aria-label="Default select example" name="gender">
                                <option selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label" for="exampleCheck1">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option selected>Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Add User</a>
    </body>
</html>