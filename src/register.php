<?php
session_start();

$accounts_db = unserialize(file_get_contents('accounts.db'));
$userdata_db == unserialize(file_get_contents('userdata.db'));


// TODO: add admin value to db
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    if (isset($accounts_db[$username])) {
            die('Username already exists!');
    }
    else {
        $accounts_db[$username] = md5($password);
        $userdata_db[$username] = ['avatar' => 'default.jpg'];
        file_put_contents('accounts.db', serialize($accounts_db));
        file_put_contents('userdata.db', serialize($userdata_db));
        die("Registration completed successfully!");
    }
}
?>

<form method="POST">
    Username: <input name="username" type="text"><br>
    Password: <input name="password" type="text"><br><br>
    <input type="submit" value="submit">
</form>