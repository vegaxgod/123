<?php
include_once("../db_connect.php");
include_once("../functions.php");

$date ="";
$filter="";
$orderby="";
if(isset($_POST["date"]) && $_POST["date"] != "") $date = " AND `date` >= '".$_POST["date"]."'";
if(isset($_POST["filter"])) $filter=$_POST["filter"];
if(isset($_POST["orderby"])) $orderby=$_POST["orderby"];

$query = "SELECT `id`,`task`,`completed`,`date` FROM `tasks` WHERE `deleted`=false AND userid=(SELECT `id` FROM `users_todo` WHERE `login`='".$_COOKIE["login"]."') ".$filter.$date." ".$orderby;
    $res_query = mysqli_query($connection,$query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", 
            "Ошибка в запросе!",
            true,
            "ERROR",
            null
        );
        exit($query);
    }

    $arr_res = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++){
        $row = mysqli_fetch_assoc($res_query);
        $checked = "";
        if($row["completed"] == "1") $checked = "checked";
        echo "<li><input type='checkbox' ".$checked." disabled>".$row["task"]." <a href='remove_task.php?index=".$row["id"]."'>Remove</a><a href='edit_task.php?index=".$row["id"]."'>Edit</a>".$row["date"]."</li>";
    }
    exit;
?>