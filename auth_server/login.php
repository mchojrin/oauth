<?php

session_start();

if (!array_key_exists('uid', $_SESSION)) {
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login to authorization server</title>
    </head>
    <body>
    <form method="post" action="do_login.php">
        <input name="username" type="text"/>
        <input name="password" type="password"/>
        <input type="hidden" name="callback" value="<?php echo $_GET['callback'];?>"/>
        <input type="submit"/>
    </form>
    </body>
    </html>
    <?php
} else {
    if (array_key_exists('callback', $_SESSION)) {
        header('Location: '.$_SESSION['callback']);
    }
}