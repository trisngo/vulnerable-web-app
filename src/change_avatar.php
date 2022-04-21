<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: /login.php');
}

$AVATAR_PATH = 'images/avatars';
$db = unserialize(file_get_contents('userdata.db'));

$files = scandir($AVATAR_PATH);

foreach ($files as $file_name) {
    if ($file_name != '.' && $file_name != '..') {
        echo '
        <form method="POST">
            <button name="avatar" value="' . $file_name . '">
                <img src="' . $AVATAR_PATH . '/' . $file_name. '" width="300" height="300">
            </button> 
        </form>';
    }
}

if (isset($_POST['avatar'])) {
    $username = $_SESSION['username'];
    $db[$username]['avatar'] = $_POST['avatar'];

    file_put_contents('userdata.db', serialize($db));
    header('Location: /index.php');
}