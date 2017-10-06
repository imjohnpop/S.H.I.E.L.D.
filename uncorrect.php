<?php
    require_once 'db_connect.php';
    require_once 'required.php';
    $db = db_connect();
    
    $stmt = $db->prepare('SELECT * FROM `users`');
    $stmt->execute();
    $users = $stmt->fetchAll(); 


    function uncorrect() {
        global $users;
        global $require;
        if (($_POST)&&(empty($require))) {
            $count = count($users);
            $i = 0;
            foreach ($users as $user) {
                if (($_POST['username']!=$user['username'])&&($_POST['passwd']==$user['passwd'])) {
                    $i ++;
                }
                elseif (($_POST['username']==$user['username'])&&($_POST['passwd']!=$user['passwd'])) {
                    $i ++;
                }
                elseif (($_POST['username']!=$user['username'])&&($_POST['passwd']!=$user['passwd'])) {
                    $i ++;
                }
            }
            if ($count==$i) {
                $uncorrect = '<div class="w-25 mt-2 mx-auto border border-dark rounded alert alert-danger" role="alert">
                Please, fill the right data.
                </div>';
            }
            if (strlen($uncorrect)!=0) {
                echo $uncorrect;
            }
            return $uncorrect;
        }
    }