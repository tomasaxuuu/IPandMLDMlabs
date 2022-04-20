<?php
session_start();
unset($_SESSION['user']);
header('Location: ../template/auth.php');
?>