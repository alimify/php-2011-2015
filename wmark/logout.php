<?php
if (isset($_COOKIE['pin'])) {
    unset($_COOKIE['pin']);
    setcookie('pin', '', time() - 3600, '/'); // empty value and old timestamp
}
header('Location:/');
?>