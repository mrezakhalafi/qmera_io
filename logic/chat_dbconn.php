<?php

function paliolite()
{
    // $host = "localhost:3306";
    // $user = "root";
    // $password = "";
    // $database = "palio_lite";
    // $host = "202.158.33.26:3306";
    $host = "192.168.0.34:3306";
    $user = "nup";
    $password = "5m1t0l_aptR";
    $database = "new_nus_qiosk";
    $dbconn = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal : " . mysqli_connect_errno();
    } else {
        $dbconn->autocommit(TRUE);
        return $dbconn;
    }
}

function newnus()
{
    // $host = "localhost:3306";
    // $user = "root";
    // $password = "";
    // $database = "palio_browser";
    // $host = "202.158.33.26:3306";
    $host = "192.168.0.34:3306";
    $user = "nup";
    $password = "5m1t0l_aptR";
    $database = "new_nus_qiosk";
    $dbconn = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal : " . mysqli_connect_errno();
    } else {
        $dbconn->autocommit(TRUE);
        return $dbconn;
    }
}

?>
