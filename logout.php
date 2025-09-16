<?php
if (isset($_COOKIE['LOGGED_USER'])) {
    setcookie('LOGGED_USER', '', time() - 3600, "");
    unset($_COOKIE['LOGGED_USER']);
}

header("Location: index.php");
exit;
?>
