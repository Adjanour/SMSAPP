<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
<!-- Add Bootstrap CSS link -->
<link href="css/bootstrap.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="about.php">
          <img src="./include/favicon_io/favicon-16x16.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
          Salem Server
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logon.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view.php">View</a>
            </li>
          </ul>
        </div>
      </nav>
      
    <div class="container">
        <div class="img">
            <img src="img/undraw_personalization_re_grty.svg" alt="logo">
        </div>
        <div class="login-container">
            <form action="login.php" method="post">
                <img class="avatar" src="img/boss.png" alt="avatar">
                <h2>Welcome</h2>
                <div class="input-div one focus">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Username</h5>
                        <input class="input" type="text" name="username" required>
                    </div>
                </div>
                <div class="input-div two focus">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" type="password" name="password" required>
                    </div>
                </div>
                <a href="#">Forgot Password?</a>
                <input type="submit" class="btn" name="login" value="Login">
            </form>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>