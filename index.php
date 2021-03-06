<?php
    require_once 'db_connect.php';
    require_once 'required.php';
    require_once 'uncorrect.php';

    // SHORTER MUCH EFFICIENT VERSION
    if ($_POST) {
        $db = db_connect();
        $stmt = $db->prepare('SELECT * FROM `users` WHERE `username` = ?');
        $stmt->execute([$_POST['username']]);
        $user = $stmt->fetch();
        if (password_verify($_POST['passwd'], $user['passwd'])) {
            header('Location: list.php');
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S.H.I.E.L.D.</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <style>
        body {
            height: 100vh;
        }
        
        #footer {
            height: 7vh;
        }
    </style>
</head>
<body class="bg-light d-flex flex-column justify-content-between">
    <?php include 'navbar.php'; ?>

    <section id="loginwindow" class="w-25 mx-auto bg-dark container rounded d-flex flex-column align-items-center">
        <div class="w-75 mt-2 text-light">
            <h1>Sign In</h1>
            <form action="index.php" method="post">
                <div class="form-group d-flex justify-content-between"><label class="mt-2" for="username">Username:</label><input class="w-50 form-control" type="text" name="username"
                 value="<?php if ($_POST) {if(strlen($_POST['username'])!=0){echo $_POST['username'];}}
                 elseif ($_GET) {if (strlen($_GET['username'])!=0){echo $_GET['username'];}}
                 ?>" autofocus></div>
                <div class="form-group d-flex justify-content-between"><label class="mt-2" for="username">Password:</label><input class="w-50 form-control" type="password" name="passwd"></div>
                <input class="btn btn-dark border border-light form-control mb-2" type="submit" value="Sign In">
                <a class="btn btn-dark border border-light w-100 mb-4" href="signup.php">Sign Up</a>
            </form>
            <?php if ($_GET) {echo '<p class="text-center">Thanks for sign up!</p>';} ?>
        </div>
    </section>
    <?php required(); ?>
    <?php uncorrect(); ?>

    <section id="footer" class="bg-dark container-fluid d-flex justify-content-center align-items-center">
        <p class="text-white">#created<b>By</b>Jan</p>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>