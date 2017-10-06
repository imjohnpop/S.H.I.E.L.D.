<?php

function required() {
    global $require;
    if($_POST) {
        if (strlen($_POST ["username"])==0) {
            $require = '<div class="w-25 mt-2 mx-auto border border-dark rounded alert alert-danger" role="alert">
            Please, fill in your username and password.
            </div><br>';
        } elseif  (strlen($_POST ["passwd"])==0) {
            $require = $require . '<div class="w-25 mt-2 mx-auto border border-dark rounded alert alert-danger" role="alert">
            Please, fill in your password.
            </div>';
        }
        if (strlen($require)!=0) {
            echo $require;
        }
        return $require;
    }
}