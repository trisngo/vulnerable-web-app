<?php
session_start();

$accounts_db = unserialize(file_get_contents('db/accounts.db'));
$userdata_db = unserialize(file_get_contents('db/userdata.db'));

$AVATAR_PATH = 'images/avatars';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (isset($accounts_db[$username])) {
		header('Refresh: 2;URL=/register.php');
        echo "<h5>Username already exists!</h5><br>";
    }
    else {
        $accounts_db[$username] = md5($password);
        $userdata_db[$username] = ['avatar' => $AVATAR_PATH . '/default.jpg'];
        file_put_contents('db/accounts.db', serialize($accounts_db));
        file_put_contents('db/userdata.db', serialize($userdata_db));
		header('Refresh: 2;URL=/login.php');
        echo "<h5>Registration completed successfully! Redirecting to log in page...</h5><br>";
    }
}
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
          <div class="col-sm-6 text-black">
            <div class="px-5 ms-xl-4">
              <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
              <span class="h1 fw-bold mb-0">Keep Notes App</span>
            </div>
            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
              <form style="width: 23rem;" action="register.php" method="post">
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up</h3>
                <div class="form-outline mb-4">
                  <input type="text" id="username" name="username" class="form-control form-control-lg" />
                  <label class="form-label" for="username">Username</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" id="password" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="password">Password</label>
                </div>
                <div class="pt-1 mb-4">
                  <button class="btn btn-info btn-lg btn-block btn-hover color-3" type="submit" value="submit">Sign up</button>
                </div>
                <p>Have an account?<a href="login.php" class="link-info">Log in</a>
                </p>
              </form>
            </div>
          </div>
          <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="images/background/welcome2.jpeg" alt="Register image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
          </div>
        </div>
      </div>
    </section>
  </body>
</html>