<?php
include_once("../db_connect.php");
include_once("../functions.php");

if(isset($_POST["task"]) && isset($_POST["completed"])){
    $task = "";
    $complete = $_POST["completed"];
    if($_POST["task"] != ""){
        $task="`task`='".$_POST["task"]."'";
        $complete = ', '.$complete;
    }

    $query = "UPDATE `tasks` SET ".$task.$complete." WHERE `id`=".$_GET["index"];
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
    header("Location: index.php");
    exit;
}

$query = "SELECT `task` FROM `tasks` WHERE `deleted`=false AND id=".$_GET["index"];
$res_query = mysqli_query($connection,$query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", 
            "Ошибка в запросе!",
            true,
            "ERROR",
            null
        );
        exit();
    }

$row = mysqli_fetch_assoc($res_query);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Edit</title>
</head>
<body>
    <h1>Изменение задачи</h1>
    <form action="edit_task.php?index=<?echo $_GET["index"]?>" method="post">
        <input type="text" name="task" placeholder="Новая формулировка...">
        <select name="completed" style="margin-right: 10px;">
            <option value="" style="display: none;">Статус</option>
            <option value="`completed`=false">Не выполнена</option>
            <option value="`completed`=true">Выполнена</option>
        </select>
        <br>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>