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
    <h1>Please log in</h1>
    <form method="post" action="do_login.php">
        <p>Username: <input name="username" type="text"/></p>
        <p>Password: <input name="password" type="password"/></p>
        <input type="hidden" name="callback" value="<?php echo $_GET['callback'];?>"/>
        <p><input type="submit"/></p>
    </form>
    </body>
    </html>
    <?php
} else {
    if (array_key_exists('callback', $_SESSION)) {
        header('Location: '.$_SESSION['callback']);
    }
}