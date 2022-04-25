<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: /login.php');
}

if (isset($_POST['avatar'])) {
    $db = unserialize(file_get_contents('db/userdata.db'));
    $username = $_SESSION['username'];
    $db[$username]['avatar'] = $_POST['avatar'];

    file_put_contents('db/userdata.db', serialize($db));
    header('Location: /index.php');
}

$AVATAR_PATH = 'images/avatars';
$files = scandir($AVATAR_PATH);

// foreach ($files as $file_name) {
//     if ($file_name != '.' && $file_name != '..') {
//         echo '
//         <form method="POST">
//             <button name="avatar" value="' . $file_name . '">
//                 <img src="' . $AVATAR_PATH . '/' . $file_name. '" width="300" height="300" class="avatar">
//             </button> 
//         </form>';
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keep Notes App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
    <section class="vh-100">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 text-black">
            <div class="px-5 ms-xl-4">
              <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
              <span class="h1 fw-bold mb-0">Keep Notes App</span>
            </div>
            <div class="card-group" style="padding-top: 40px;"> 
            <?php
                foreach ($files as $file_name) {
                    if ($file_name != '.' && $file_name != '..') {
                        echo '
                            <div class="card">
                                <form method="POST">
                                    <button name="avatar" value="' . $file_name . '">
                                        <img src="' . $AVATAR_PATH . '/' . $file_name. '" width="300" height="300" class="card-img-top">
                                        </button>
                                    </form

                                    <h5 class="card-title">Click the image to set your avatar!!</h5>
                                </div>';
                    }
                }
            ?> 
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>