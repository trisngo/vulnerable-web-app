<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: /login.php');
}
$AVATAR_PATH = 'images/avatars';
$db = unserialize(file_get_contents('db/userdata.db'));

$username = $_SESSION['username'];
$avatar_file = $db[$username]['avatar'];

// echo 'Your avatar:<br>';
// echo '<img src="data:image/gif;base64,' . base64_encode(file_get_contents($AVATAR_PATH . '/' . $avatar_file)) . '" width="300" height="300">';
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
            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-8 pt-xl-0">
              <form style="width: 70rem;" action="note.php" method="post" id="noteform">
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Your Note</h3>
                <div class="form-outline mb-4">
                  <label class="form-label" for="note">Enter your note</label>
                  <textarea class="form-control form-control-lg" form="noteform" cols="150" id="note" name="note" rows="10"></textarea>
                </div>
                <div class="pt-1 mb-4">
                  <button class="btn btn-info btn-hover color-1" type="submit" value="submit">Save</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-sm-4 px-0 d-none d-sm-block">
            <div class="row justify-content-center">
              <?php echo '<h3 class="col-md-6 offset-md-3"> User: ' . $username . '</h2>'; ?> 
            </div>
            <div class="row justify-content-center">
              <form action="change_avatar.php" method="post"> 
                <?php echo '<img src="data:image/gif;base64,' . base64_encode(file_get_contents($AVATAR_PATH . '/' . $avatar_file)) . '"alt="Avatar image" class="w-50 avatar col-md-6 offset-md-3">'; ?> 
              </form>
            </div>
            <div class="row justify-content-center">
              <div class="col-4">
              <form action="change_avatar.php" method="post">
                <button class="btn btn-info breezy" type="submit" value="submit" style="margin:0 auto; display:block;">Select avatar</button>
              </form>
              </div>
              <div class="col-4">
              <form action="change_avatar.php" method="post">
                <button class="btn btn-info breezy" type="submit" value="submit" style="margin:0 auto; display:block;">Upload avatar</button>
              </form>
              </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 15px;">
              <form action="logout.php" method="post">
                <button class="btn btn-info hot col-md-6 offset-md-3" type="logout" value="logout">Log out</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>