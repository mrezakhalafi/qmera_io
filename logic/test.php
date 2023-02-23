<?php

function getDBConn()
{
    // $host = "192.168.0.35:3306";
    // $user = "nus";
    // $password = "Rn1u2sE";
    $host = "localhost:3306";
    $user = "root";
    $password = "";
    $database = "new_nus_copy";
    $dbconn = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal : " . mysqli_connect_errno();
    } else {
        $dbconn->autocommit(TRUE);
        return $dbconn;
    }
}

// test insert to db without prepare
// $dbconn = getDBConn();

// $cmp_id = 1;
// $full_name = 'abi';

// $query = $dbconn->prepare("INSERT INTO USER_ACCOUNT (CMP_ID, FULL_NAME) VALUES ('$cmp_id', '$full_name')");
// $query->execute();
// $id = $query->insert_id;
// $query->close();


// echo($id);


// insert many api key to db
$dbconn = getDBConn();

$i = 0;
$how_much = 1000;
while ($i < $how_much) {
    $bytes = random_bytes(32);
    $hexbytes = strtoupper(bin2hex($bytes));

    //PAYMENT INSERT QUERY
    $query = $dbconn->prepare("INSERT INTO APIKEY (APIKEY) VALUES ('$hexbytes')");
    $query->execute();
    $query->close();

    $i++;
    if ($i == $how_much) {
        echo $how_much . " api key inserted!";
    }
}