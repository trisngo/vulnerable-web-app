<?php
session_start();

$db = unserialize(file_get_contents('db/accounts.db'));

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (isset($db[$username]) && md5($password) == $db[$username]) { // type juggling
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['username'] = $username;
        header('Location: /index.php');
    }
    else {
        die('The Username or Password is incorrect!');
    }
}
?>

<form method="POST">
    Username: <input name="username" type="text"><br>
    Password: <input name="password" type="text"><br><br>
    <input type="submit" value="submit">
</form>