<?php
if(isset($_GET["logout"])){
    setcookie("login", null, time()-3600);
}
if(!isset($_COOKIE["login"])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div>
        <h3>User: <?echo $_COOKIE["login"]?></h3>
        <a href="index.php?logout">logout</a>
    </div>
    <h1>To-Do List</h1>
    <form action="add_task.php" method="post">
        <input type="text" name="task" placeholder="Enter a task">
        <button type="submit" name="add">Add Task</button>
    </form>
    <form action="index.php" method="post">
        <select name="orderby" style="margin-right: 10px;">
            <option value="" style="display: none;">Сортировка</option>
            <option value="ORDER BY `date` DESC">Сначала новые</option>
            <option value="ORDER BY `date` ASC">Сначала старые</option>
            <option value="ORDER BY `completed` ASC">Сначала невыполненные</option>
            <option value="ORDER BY `completed` DESC">Сначала выполненные</option>
        </select>
        <select name="filter" style="margin-right: 10px;">
            <option value="" style="display: none;">Фильтр</option>
            <option value="AND `completed`=false">Только невыполненные</option>
            <option value="AND `completed`=true">Только выполненные</option>
        </select>
        <label for="date">Не позднее: </label>
        <input type="date" name="date" style="margin-right: 10px;">
        <button type="submit" name="accept">Показать</button>
        <button type="reset" name="reset">Сбросить</button>
    </form>
    <ul>
        <?php include 'list_tasks.php'; ?>
    </ul>
</body>
</html>