<?php

    $connect = mysqli_connect('localhost', 'root', '', 'db_users');
    if(!$connect) {
        die('error');
    }