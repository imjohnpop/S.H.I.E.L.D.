<?php
    require_once 'db_connect.php';
    $db = db_connect();

    $stmt = $db->prepare('SELECT * FROM `userMessages`');
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

    <section id="usersmessages" class="w-50 mx-auto container">
        <div class="row">
            <?php foreach ($shieldusers as $shielduser) : ?>
                <div class="col-12 bg-dark border border-light py-4 px-5 m-3 rounded text-light">
                    <div class="d-flex">
                        <p class="w-50 d-flex pt-2">
                            <span class="pr-2">
                                <b><?= htmlspecialchars(stripslashes($shielduser['user']));?></b>
                            </span>
                            <span>
                                <b>(level: <?= htmlspecialchars(stripslashes($shielduser['level']));?> )</b>
                            </span>
                        </p>
                        <div class="w-50 d-flex justify-content-end align-items-center">
                            <button class="btn btn-dark border border-light" data-toggle="collapse" data-target="#<?= htmlspecialchars(stripslashes($shielduser['id']));?>" aria-expanded="false" aria-controls="<?= htmlspecialchars(stripslashes($shielduser['id']));?>">See message!</button>
                        </div>
                    </div>
                    <div class="collapse" id="<?= htmlspecialchars(stripslashes($shielduser['id']));?>">
                        <p class="mt-2 pt-2 border border-light border-bottom-0 border-left-0 border-right-0">
                            <?= htmlspecialchars(stripslashes($shielduser['text']));?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="footer" class="bg-dark container-fluid d-flex justify-content-center align-items-center">
        <p class="text-white">#created<b>By</b>Jan</p>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>