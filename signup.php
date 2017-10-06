<?php
    require_once 'db_connect.php';
    require_once 'required.php';

    if($_POST) {
        $db = db_connect();
        $stmt = $db->prepare(
            'INSERT INTO `users` (`username`, `passwd`) VALUES (?, ?)'
        );
        $hash = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
        $stmt->execute([$_POST['username'], $hash]);
        header('Location: index.php?username=' . $_POST['username']);
        die();
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

    <section id="signupwindow" class="w-25 mx-auto bg-dark container rounded d-flex flex-column align-items-center">
        <div class="w-75 mt-2 text-light">
            <h1>Register</h1>
            <form action="signup.php" method="post">
                <div class="form-group d-flex justify-content-between"><label class="mt-2" for="username">Username:</label><input class="w-50 form-control" type="text" name="username" autofocus></div>
                <div class="form-group d-flex justify-content-between"><label class="mt-2" for="username">Password:</label><input class="w-50 form-control" type="password" name="passwd"></div>
                <input class="btn btn-dark border border-light form-control mb-4" type="submit" value="Sign Up">
            </form>
        </div>
    </section>
    <?php required(); ?>

    <section id="footer" class="bg-dark container-fluid d-flex justify-content-center align-items-center">
        <p class="text-white">#created<b>By</b>Jan</p>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>