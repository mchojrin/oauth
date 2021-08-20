<?php

require_once 'bootstrap.php';

$scopes = [];
foreach (preg_split('/,/', $_GET['scope']) as $scope_id) {
    $sopes[] = $scopeRepository->getScopeEntityByIdentifier($scope_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Approve</title>
</head>
<body>
    <p>"The Client" is asking for permission to:</p>
    <?php
    foreach ($scopes as $scope) {
        ?>
        <p><?php echo $scope; ?></p>
    <?php
    }
    ?>
    <p>Do you approve?</p>
    <form method="post" action="do_approve.php">
        <input type="submit" value="Yes">
    </form>
</body>
</html>