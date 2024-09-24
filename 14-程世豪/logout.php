<?php

session_start();


unset($_SESSION['id']);

setcookie('id', '', time() - 1, '/');


header('Location: ./login.php');
