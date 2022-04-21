<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: /login.php');
}

$AVATAR_PATH = 'images/avatars';
$db = unserialize(file_get_contents('userdata.db'));

$username = $_SESSION['username'];
$avatar_file = $db[$username]['avatar'];

echo 'Your avatar:<br>';
echo '<img src="data:image/gif;base64,' . base64_encode(file_get_contents($AVATAR_PATH . '/' . $avatar_file)) . '" width="300" height="300">';
?>