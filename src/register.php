<?php
session_start();

$db = unserialize(file_get_contents('db.txt'));

// TODO: add admin value to db
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    if (isset($db[$username])) {
            die('Username already exists!');
    }
    else {
        $db[$username] = $password;
        file_put_contents('db.txt', serialize($db));
        die("Registration completed successfully!");
    }
}
?>

<form method="POST">
    Username: <input name="username" type="text"><br>
    Password: <input name="password" type="text"><br><br>
    <input type="submit" value="submit">
</form>