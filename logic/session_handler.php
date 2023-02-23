<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../database/db_conn.php';

//Connection to db
$dbconn = getDBConnTest();

// CHECK LOGIN STATE
if (isset($_SESSION['id_user'])) {
    $userID = $_SESSION['id_user'];
    $sessionToken = $_SESSION['session_token'];

    //GET SESSION ID
    $query = $dbconn->prepare("SELECT * FROM SESSION WHERE SESSION_TOKEN = ?");
    $query->bind_param("s", $sessionToken);
    $query->execute();
    $last_session = $query->get_result()->fetch_assoc();
    $last_session_id = $last_session['ID'];
    $query->close();

    $query = $dbconn->prepare("INSERT INTO ACTIVITY_HISTORY (WHO, PREV_PAGE, CURR_PAGE, SESSION_TOKEN) VALUES (?, ?, ?, ?)");
    $query->bind_param('iiii', $userID, $previousPage, $currentPage, $last_session_id);
    $query->execute();
    $query->close();

    // sessionExpire();

} else {
    $userID = null;

    if (isset($_SESSION['session_token'])) {

        $sessionToken = $_SESSION['session_token'];

        //GET SESSION ID
        $query = $dbconn->prepare("SELECT * FROM SESSION WHERE SESSION_TOKEN = ?");
        $query->bind_param("s", $sessionToken);
        $query->execute();
        $session = $query->get_result()->fetch_assoc();
        $session_id = $session['ID'];
        $query->close();

        $query = $dbconn->prepare("INSERT INTO ACTIVITY_HISTORY (WHO, PREV_PAGE, CURR_PAGE, SESSION_TOKEN) VALUES (?, ?, ?, ?)");
        $query->bind_param('iiii', $userID, $previousPage, $currentPage, $session_id);
        $query->execute();
        $query->close();
    } else {
        $new_token = sha1(time());
        $_SESSION['session_token'] = $new_token;

        $query = $dbconn->prepare("INSERT INTO SESSION (USER_ID, SESSION_TOKEN) VALUES (?,?)");
        $query->bind_param("is", $userID, $new_token);
        $query->execute();
        $last_session_id = $query->insert_id;
        $query->close();

        $query = $dbconn->prepare("INSERT INTO ACTIVITY_HISTORY (WHO, PREV_PAGE, CURR_PAGE, SESSION_TOKEN) VALUES (?, ?, ?, ?)");
        $query->bind_param('iiii', $userID, $previousPage, $currentPage, $last_session_id);
        $query->execute();
        $query->close();

        // try to open another page directly without session
        if ($currentPage != 1 && $currentPage != 9 && $currentPage != 10) {
            redirect(base_url());
        }
    }
}