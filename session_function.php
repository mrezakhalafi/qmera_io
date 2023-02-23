<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');

$secure = true; // if you only want to receive the cookie over HTTPS
$httponly = true; // prevent JavaScript access to session cookie
$samesite = 'lax';
$maxlifetime = time() + 900;

if (PHP_VERSION_ID < 70300) {
  session_set_cookie_params($maxlifetime, '/; samesite=' . $samesite, $_SERVER['HTTP_HOST'], $secure, $httponly);
} else {
  session_set_cookie_params([
    'lifetime' => $maxlifetime,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => $secure,
    'httponly' => $httponly,
    'samesite' => $samesite
  ]);
}
session_start();

$dbconn = getDBConn();

// geoloc
$query = $dbconn->prepare("SELECT VALUE FROM SITE_SETTINGS WHERE PROPERTY = 'GEOLOC'");
$query->execute();
$geoloc = $query->get_result()->fetch_assoc();
$geolocSts = $geoloc['VALUE'];
$query->close();

// language
$query = $dbconn->prepare("SELECT VALUE FROM SITE_SETTINGS WHERE PROPERTY = 'LANGUAGE'");
$query->execute();
$lang_setting = $query->get_result()->fetch_assoc();
$language = $lang_setting['VALUE'];
$query->close();

$_SESSION['language'] = $language;
$_SESSION['geolocSts'] = $geolocSts;

function setSession($name, $val)
{
    $_SESSION[$name] = $val;
}

function getSession($name)
{
    if (isset($_SESSION[$name])) {

        $val = $_SESSION[$name];
        return $val;
    }

    return "";
}

function deleteSession($name)
{
    #   session_unset($_SESSION[$name]);
    session_unset();
    session_destroy();
}


function doLogout()
{
    deleteSession('session_token');
    deleteSession('email');
    deleteSession('password');
    deleteSession('id_user');
    deleteSession('id_company');
    deleteSession('company_name');
    deleteSession('flag');
    // redirect(base_url() . 'login.php');
    redirect(base_url());
}

function set_flash_session($name, $value)
{
    $_SESSION[$name] = $value;
}

function session_exist($name)
{
    return isset($_SESSION[$name]);
}

function get_flash_session($name)
{
    if (isset($_SESSION[$name])) {
        $value = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $value;
    }
    return "";
}

if (isset($_POST['submitLogout'])) {
    session_destroy();
    header("Location: index.php");
}

$file_version = time();

?>
