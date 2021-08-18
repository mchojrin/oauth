<?php

session_start();
$_SESSION['approved'] = true;

header('Location: authorize.php');
