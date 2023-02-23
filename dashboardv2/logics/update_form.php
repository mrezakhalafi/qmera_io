<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/logics/db_conn.php');

$dbconn = dbConnPalioLite();

$json = file_get_contents('php://input');
var_dump($json);
$data = json_decode(stripslashes($json),true);
// $data = json_decode(json_encode($datax),true);
var_dump($data);
$title = $data["title"];
$items = $data["items"];
$deleted = $data["deleted"];
$form_id = $data["form_id"];
$query = $dbconn->prepare("UPDATE `FORM` SET `TITLE`='".$title."' WHERE `FORM_ID`='".$form_id."'");
$query->execute();
$item_query = "INSERT INTO `FORM_ITEM` (`FORM_ID`,`LABEL`,`KEY`,`VALUE`,`SQ_NO`,`TYPE`) VALUES ";
$index = 1;
foreach($items as $item){
    $item_id = $item["id"];
    $label = $item["label"];
    $key = $item["key"];
    $value = $item["value"];
    $sq_no = (string) $index;
    $type = $item["type"];
    if($item_id != "0"){
        $item_query = "UPDATE `FORM_ITEM` SET `LABEL`='".$label."', `KEY`='".$key."', `VALUE`='".$value."', `SQ_NO`=".$sq_no.", `TYPE`='".$type."' WHERE `ID`=".$item_id;
    }
    else{
        $item_query = "INSERT INTO `FORM_ITEM` (`FORM_ID`,`LABEL`,`KEY`,`VALUE`,`SQ_NO`,`TYPE`) VALUES ";
        $sql_query = $sql_query."('".$form_id."','".$label."','".$key."','".$value."',".$sq_no.",'".$type."')";
        $item_query = $item_query.$sql_query;
    }
    $query = $dbconn->prepare($item_query);
    $query->execute();
    $index++;
}
foreach($deleted as $d){
    $item_id = $d["value"];
    $item_query = "DELETE FROM `FORM_ITEM` WHERE `ID`=".$item_id;
    $query = $dbconn->prepare($item_query);
    $query->execute();
}
// $query = $dbconn->prepare("SELECT * FROM `form_item` WHERE `FORM_ID`='$form_id' ORDER BY SQ_NO");
// $query->execute();
echo 'ok';

?>