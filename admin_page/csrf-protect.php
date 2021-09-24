<?php
session_start();
error_reporting(0);

/* Get Token CSRF */
function csrf_token()
{
    if (empty($_SESSION['key'])) {
        $_SESSION['key'] = bin2hex(random_bytes(32));
    }

    echo $_SESSION['key'];
}

/* 
// Function To Check CSRF Token Where Token Is Same The Respone Is True 
// If User Submit Some Data The Token Has Refresh To New
*/
function check_csrf($form)
{
    if ($form && $_SESSION['key'] === $_SESSION['key']) {
        unset($_SESSION['key']);
        return true;
    } else {
        header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
    }
}
