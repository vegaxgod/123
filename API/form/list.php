<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список заявок</title>
</head>
<body>

    <?php
        include_once("../db_connect.php");
        $query = "SELECT * FROM `form`";
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
    
        $arr_res = array();
        $rows = mysqli_num_rows($res_query);
    
        for ($i=0; $i < $rows; $i++){
            $row = mysqli_fetch_assoc($res_query);
            array_push($arr_res, $row);
        }
    ?>

    <table border="1">
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Файл</th>
        </tr>
        <? foreach($arr_res as $key => $value):   ?>
        <tr>
            <td><?=$value['firstname']?></td>
            <td><?=$value['secondname']?></td>
            <td><?=$value['middlename']?></td>
            <td><a target="_blank" href="download.php?file_name=<?=$value['file_on_server']?>&name=<?=$value['filepath']?>"><?=$value['filepath']?></a></td>
        </tr>
        <?endforeach;?>
    </table>
</body>
</html>