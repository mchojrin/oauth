<?php

session_start();

if ($_POST['username'] == 'Mauro' && $_POST['password'] == '1234') {
    $_SESSION['uid'] = 1;
    header('Location: '.$_POST['callback']);
} else {
    ?>
    <h1>Invalid login</h1>
<?php
}