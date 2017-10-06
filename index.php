<?php
    require_once 'db_connect.php';
    $db = db_connect();

    $stmt = $db->prepare('SELECT * FROM shieldusers');
    $stmt->execute();
    $shieldusers = $stmt->fetchAll();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S.H.I.E.L.D.</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body class="bg-light">
    <section id="nav" class="bg-dark">
        <nav class="navbar navbar-expand-lg navbar-dark mx-auto w-50">
            <a class="navbar-brand" href="index.html"><img src="SHIELD.png" class="img-fluid" alt="shield logo"></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="index.html"><span><b>S.H.I.E.L.D.</b></span><br><span>Strategic Homeland Intervention, Enforcement and Logistics Division</span></a>
            </li>
        </nav>
    </section>

    <section id="users" class="w-50 mx-auto container">
        <div class="row mt-3">
            <?php foreach ($shieldusers as $shielduser) : ?>
                <div class="col-12 bg-white border border-dark py-4 px-5 m-3">
                    <p class="w-50 d-flex justify-content-between">
                        <span>
                            <b><?= htmlspecialchars(stripslashes($shielduser['user']));?></b>
                        </span>
                        <span>
                            <b>(level: <?= htmlspecialchars(stripslashes($shielduser['level']));?> )</b>
                        </span>
                    </p>
                    <p>
                        <?= htmlspecialchars(stripslashes($shielduser['text']));?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>