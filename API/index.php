<?php 
include_once("functions.php");
include_once("find_token.php");
include_once("error_handler.php");

if(!isset($_GET['type'])){
    echo ajax_echo(
        "Ошибка!",
        "Вы не указали GET параметр type!",
        "ERROR",
        null
    );
    exit;
}

//Добавление клиента в базу
if(preg_match_all("/^add_client$/ui", $_GET['type'])){
    if(!isset($_GET['name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр name!",
            "ERROR",
            null
        );
        exit;
    }
    if(!isset($_GET['phone'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр phone!",
            "ERROR",
            null
        );
        exit;
    }

    $query = "INSERT INTO `clients`(`name`, `phone`) VALUES ('".$_GET['name']."', '".$_GET['phone']."')";
    
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            null
        );
        exit($query);
    }
    
    echo ajax_echo(
        "Успех!",
        "Клиент добавлен в базу данных",
        false,
        "SUCCESS"
    );
    exit;
}

//Добавление сотрудника в базу
else if(preg_match_all("/^add_employee$/ui", $_GET['type'])){
    if(!isset($_GET['name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр name!",
            "ERROR",
            null
        );
        exit;
    }
    if(!isset($_GET['phone'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр phone!",
            "ERROR",
            null
        );
        exit;
    }
    $address = 'null';
    if(isset($_GET['address'])){
        $address = "'".$_GET['address']."'";
    }
    $work_experiense = 'null';
    if(isset($_GET['work_experiense'])){
        $work_experiense = $_GET['work_experiense'];
    }

    $query = "INSERT INTO `employees`(`name`, `phone`, `address`, `work_experiense`) VALUES ('".$_GET['name']."', '".$_GET['phone']."', ".$address.", ".$work_experiense.")";
    
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            null
        );
        exit($query);
    }
    
    echo ajax_echo(
        "Успех!",
        "Сотрудник добавлен в базу данных",
        false,
        "SUCCESS"
    );
    exit;
}

//Добавление квартиры в базу
else if(preg_match_all("/^add_apartments$/ui", $_GET['type'])){
    if(!isset($_GET['price'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр price!",
            "ERROR",
            null
        );
        exit;
    }
    $number_of_rooms = 'null';
    if(isset($_GET['number_of_rooms'])){
        $number_of_rooms = $_GET['number_of_rooms'];
    }
    $address = 'null';
    if(isset($_GET['address'])){
        $address = "'".$_GET['address']."'";
    }
    $floor = 'null';
    if(isset($_GET['floor'])){
        $floor = $_GET['floor'];
    }
    $area = 'null';
    if(isset($_GET['area'])){
        $area = $_GET['area'];
    }
    $desc = 'null';
    if(isset($_GET['desc'])){
        $desc = "'".$_GET['desc']."'";
    }
    $deal_type = 'null';
    if(isset($_GET['deal_type'])){
        $deal_type = "'".$_GET['deal_type']."'";
    }
    $object_type = 'null';
    if(isset($_GET['object_type'])){
        $object_type = "'".$_GET['object_type']."'";
    }

    $query = "INSERT INTO `apartments`(`price`, `number_of_rooms`, `address`, `floor`, `area`, `description`, `deal_type`, `object_type`) VALUES (".$_GET['price'].", ".$number_of_rooms.", ".$address.", ".$floor.", ".$area.", ".$desc.", ".$deal_type.", ".$object_type.")";
    
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            null
        );
        exit($query);
    }
    
    echo ajax_echo(
        "Успех!",
        "квартира добавлена в базу данных",
        false,
        "SUCCESS"
    );
    exit;
}

//Добавление дома в базу
else if(preg_match_all("/^add_house$/ui", $_GET['type'])){
    if(!isset($_GET['price'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр price!",
            "ERROR",
            null
        );
        exit;
    }
    $number_of_rooms = 'null';
    if(isset($_GET['number_of_rooms'])){
        $number_of_rooms = $_GET['number_of_rooms'];
    }
    $address = 'null';
    if(isset($_GET['address'])){
        $address = "'".$_GET['address']."'";
    }
    $number_of_floors = 'null';
    if(isset($_GET['number_of_floors'])){
        $number_of_floors = $_GET['number_of_floors'];
    }
    $house_area = 'null';
    if(isset($_GET['house_area'])){
        $house_area = $_GET['house_area'];
    }
    $area = 'null';
    if(isset($_GET['area'])){
        $area = $_GET['area'];
    }
    $desc = 'null';
    if(isset($_GET['desc'])){
        $desc = "'".$_GET['desc']."'";
    }
    $deal_type = 'null';
    if(isset($_GET['deal_type'])){
        $deal_type = "'".$_GET['deal_type']."'";
    }
    $object_type = 'null';
    if(isset($_GET['object_type'])){
        $object_type = "'".$_GET['object_type']."'";
    }

    $query = "INSERT INTO `houses`(`price`, `number_of_rooms`, `address`, `number_of_floors`, `house_area`, `area`, `description`, `deal_type`, `object_type`) VALUES (".$_GET['price'].", ".$number_of_rooms.", ".$address.", ".$number_of_floors.", ".$house_area.", ".$area.", ".$desc.", ".$deal_type.", ".$object_type.")";
    
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            null
        );
        exit($query);
    }
    
    echo ajax_echo(
        "Успех!",
        "дом добавлен в базу данных",
        false,
        "SUCCESS"
    );
    exit;
}

//Добавление офиса в базу
else if(preg_match_all("/^add_office$/ui", $_GET['type'])){
    if(!isset($_GET['price'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр price!",
            "ERROR",
            null
        );
        exit;
    }
    $address = 'null';
    if(isset($_GET['address'])){
        $address = "'".$_GET['address']."'";
    }
    $floor = 'null';
    if(isset($_GET['floor'])){
        $floor = $_GET['floor'];
    }
    $area = 'null';
    if(isset($_GET['area'])){
        $area = $_GET['area'];
    }
    $desc = 'null';
    if(isset($_GET['desc'])){
        $desc = "'".$_GET['desc']."'";
    }
    $deal_type = 'null';
    if(isset($_GET['deal_type'])){
        $deal_type = "'".$_GET['deal_type']."'";
    }

    $query = "INSERT INTO `offices`(`price`, `address`, `floor`, `area`, `description`, `deal_type`) VALUES (".$_GET['price'].", ".$address.", ".$floor.", ".$area.", ".$desc.", ".$deal_type.")";
    
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            null
        );
        exit($query);
    }
    
    echo ajax_echo(
        "Успех!",
        "коммерческая недвижимость добавлена в базу данных",
        false,
        "SUCCESS"
    );
    exit;
}

//Добавление deal ap
else if(preg_match_all("/^create_apartment_deal$/ui", $_GET['type'])){
    if(!isset($_GET['apartment_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр apartment_id!",
            "ERROR",
            null
        );
        exit;
    }
    if(!isset($_GET['client_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр client_id!",
            "ERROR",
            null
        );
        exit;
    }
    if(!isset($_GET['employee_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр employee_id!",
            "ERROR",
            null
        );
        exit;
    }
    if(!isset($_GET['datetime'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр datetime!",
            "ERROR",
            null
        );
        exit;
    }

    $query = "INSERT INTO `apartment_deal`(`apartment_id`, `client_id`, `employee_id`, `datetime`) VALUES (".$_GET['apartment_id'].", ".$_GET['client_id'].", ".$_GET['employee_id'].", '".$_GET['datetime']."')";
    
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            null
        );
        exit($query);
    }
    
    echo ajax_echo(
        "Успех!",
        "сделка добавлена в базу данных",
        false,
        "SUCCESS"
    );
    exit;
}

//Добавление deal house
else if(preg_match_all("/^create_house_deal$/ui", $_GET['type'])){
    if(!isset($_GET['house_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр house_id!",
            "ERROR",
            null
        );
        exit;
    }
    if(!isset($_GET['client_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр client_id!",
            "ERROR",
            null
        );
        exit;
    }
    if(!isset($_GET['employee_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр employee_id!",
            "ERROR",
            null
        );
        exit;
    }
    if(!isset($_GET['datetime'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр datetime!",
            "ERROR",
            null
        );
        exit;
    }

    $query = "INSERT INTO `house_deal`(`house_deal`, `client_id`, `employee_id`, `datetime`) VALUES (".$_GET['house_id'].", ".$_GET['client_id'].", ".$_GET['employee_id'].", '".$_GET['datetime']."')";
    
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            null
        );
        exit($query);
    }
    
    echo ajax_echo(
        "Успех!",
        "сделка добавлена в базу данных",
        false,
        "SUCCESS"
    );
    exit;
}

//Добавление deal office
else if(preg_match_all("/^create_office_deal$/ui", $_GET['type'])){
    if(!isset($_GET['office_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр office_id!",
            "ERROR",
            null
        );
        exit;
    }
    if(!isset($_GET['client_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр client_id!",
            "ERROR",
            null
        );
        exit;
    }
    if(!isset($_GET['employee_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр employee_id!",
            "ERROR",
            null
        );
        exit;
    }
    if(!isset($_GET['datetime'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр datetime!",
            "ERROR",
            null
        );
        exit;
    }

    $query = "INSERT INTO `office_deal`(`office_deal`, `client_id`, `employee_id`, `datetime`) VALUES (".$_GET['office_id'].", ".$_GET['client_id'].", ".$_GET['employee_id'].", '".$_GET['datetime']."')";
    
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            null
        );
        exit($query);
    }
    
    echo ajax_echo(
        "Успех!",
        "сделка в базу данных",
        false,
        "SUCCESS"
    );
    exit;
}



//Вывод клиентов
else if(preg_match_all("/^list_client$/ui", $_GET['type'])){
    $phone = "";
    if(isset($_GET["phone"])){
        $phone = " AND `phone` = '".$_GET["phone"]."'";
    }
    $id = "";
    if(isset($_GET["client_id"])){
        $phone = " AND `id` = ".$_GET["client_id"];
    }

    $query = "SELECT `id`,`name`,`phone` FROM `clients` WHERE `deleted`=false".$phone.$id;
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
    echo ajax_echo(
        "Успех!", 
        "Список клиентов выведен",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}

//Вывод сотрудников
else if(preg_match_all("/^list_employee$/ui", $_GET['type'])){
    $phone = "";
    if(isset($_GET["phone"])){
        $phone = " AND `phone` = '".$_GET["phone"]."'";
    }
    $id = "";
    if(isset($_GET["employee_id"])){
        $phone = " AND `id` = ".$_GET["employee_id"];
    }

    $query = "SELECT `id`,`name`,`phone`,`address`,`work_experiense` FROM `employees` WHERE `deleted`=false".$phone.$id;
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
    echo ajax_echo(
        "Успех!", 
        "Список сотрудников выведен",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}

//Вывод квартир1111
else if(preg_match_all("/^list_apartments$/ui", $_GET['type'])){
    $id = "";
    if(isset($_GET["apartments_id"])){
        $phone = " AND `id` = ".$_GET["apartments_id"];
    }

    $query = "SELECT `id`,`price`,`number_of_rooms`,`address`,`floor`,`area`,`description`,`deal_type`,`object_type` FROM `apartments` WHERE `deleted`=false".$id;
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
    echo ajax_echo(
        "Успех!", 
        "Список квартир выведен",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}

//Вывод домов
else if(preg_match_all("/^list_houses$/ui", $_GET['type'])){
    $id = "";
    if(isset($_GET["house_id"])){
        $phone = " AND `id` = ".$_GET["house_id"];
    }

    $query = "SELECT `id`,`price`,`number_of_rooms`,`address`,`number_of_floors`,`house_area`,`area`,`description`,`deal_type`,`object_type` FROM `houses` WHERE `deleted`=false".$id;
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
    echo ajax_echo(
        "Успех!", 
        "Список домов выведен",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}

//Вывод коммерческая недвижимость
else if(preg_match_all("/^list_offices$/ui", $_GET['type'])){
    $id = "";
    if(isset($_GET["office_id"])){
        $phone = " AND `id` = ".$_GET["office_id"];
    }

    $query = "SELECT `id`,`price`,`address`,`floor`,`area`,`description`,`deal_type` FROM `offices` WHERE `deleted`=false".$id;
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
    echo ajax_echo(
        "Успех!", 
        "Список коммерческой недвижимости выведен",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}

//Вывод кв сделок
else if(preg_match_all("/^list_apartment_deals$/ui", $_GET['type'])){
    $id = "";
    if(isset($_GET["deal_id"])){
        $phone = " AND `id` = ".$_GET["deal_id"];
    }

    $query = "SELECT `id`,`apartment_id`,`client_id`,`employee_id`,`datetime`,`completed` FROM `apartment_deal` WHERE `deleted`=false".$id;
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
    echo ajax_echo(
        "Успех!", 
        "Список сделок по квартирам выведен",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}

//Вывод дом сделок
else if(preg_match_all("/^list_house_deals$/ui", $_GET['type'])){
    $id = "";
    if(isset($_GET["deal_id"])){
        $phone = " AND `id` = ".$_GET["deal_id"];
    }

    $query = "SELECT `id`,`house_deal`,`client_id`,`employee_id`,`datetime`,`completed` FROM `house_deal` WHERE `deleted`=false".$id;
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
    echo ajax_echo(
        "Успех!", 
        "Список сделок по квартирам выведен",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}

//Вывод of сделок
else if(preg_match_all("/^list_office_deals$/ui", $_GET['type'])){
    $id = "";
    if(isset($_GET["deal_id"])){
        $phone = " AND `id` = ".$_GET["deal_id"];
    }

    $query = "SELECT `id`,`office_deal`,`client_id`,`employee_id`,`datetime`,`completed` FROM `office_deal` WHERE `deleted`=false".$id;
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
    echo ajax_echo(
        "Успех!", 
        "Список сделок по квартирам выведен",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}

//Вывод all сделок
else if(preg_match_all("/^list_deals$/ui", $_GET['type'])){
    $id = "";
    if(isset($_GET["deal_id"])){
        $phone = " AND `id` = ".$_GET["deal_id"];
    }

    $query = "SELECT `id`,`apartment_deal_id`,`house_deal_id`,`office_deal_id`,`money` FROM `deals` WHERE `deleted`=false".$id;
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
    echo ajax_echo(
        "Успех!", 
        "Список сделок выведен",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}

//Вывод profit
else if(preg_match_all("/^profit$/ui", $_GET['type'])){
    $query = "SELECT SUM(`money`) AS `profit` FROM `deals` WHERE `deleted`=false ";
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
    $rez = mysqli_fetch_assoc($res_query);
    echo ajax_echo(
        "Успех!", 
        "Ваша прибыль",
        false,
        "SUCCESS",
        $rez['profit']
    );
    exit();
}



//Удалить клиента
else if(preg_match_all("/^delete_client$/ui", $_GET['type'])){
    if(!isset($_GET['client_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр client_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `clients` SET `deleted`=true WHERE `id`=".$_GET['client_id'];
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

    echo ajax_echo(
        "Успех!", 
        "Клиент удален",
        false,
        "SUCCESS"
    );
    exit();
}

//Удалить сотрудника
else if(preg_match_all("/^delete_employee$/ui", $_GET['type'])){
    if(!isset($_GET['employee_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр employee_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `employees` SET `deleted`=true WHERE `id`=".$_GET['employee_id'];
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

    echo ajax_echo(
        "Успех!", 
        "сотрудник удален",
        false,
        "SUCCESS"
    );
    exit();
}

//Удалить квартиры
else if(preg_match_all("/^delete_apartments$/ui", $_GET['type'])){
    if(!isset($_GET['apartments_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр apartments_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `apartments` SET `deleted`=true WHERE `id`=".$_GET['apartments_id'];
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

    echo ajax_echo(
        "Успех!", 
        "квартира удалена",
        false,
        "SUCCESS"
    );
    exit();
}

//Удалить дом
else if(preg_match_all("/^delete_house$/ui", $_GET['type'])){
    if(!isset($_GET['house_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр house_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `houses` SET `deleted`=true WHERE `id`=".$_GET['house_id'];
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

    echo ajax_echo(
        "Успех!", 
        "дом удален",
        false,
        "SUCCESS"
    );
    exit();
}

//Удалить офиса
else if(preg_match_all("/^delete_offices$/ui", $_GET['type'])){
    if(!isset($_GET['office_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр office_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `offices` SET `deleted`=true WHERE `id`=".$_GET['office_id'];
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

    echo ajax_echo(
        "Успех!", 
        "коммерческая недвижимость удалена",
        false,
        "SUCCESS"
    );
    exit();
}

//Удалить кв сделки
else if(preg_match_all("/^delete_apartment_deal$/ui", $_GET['type'])){
    if(!isset($_GET['deal_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр deal_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `apartment_deal` SET `deleted`=true WHERE `id`=".$_GET['deal_id'];
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

    echo ajax_echo(
        "Успех!", 
        "сделка удалена",
        false,
        "SUCCESS"
    );
    exit();
}

//Удалить дом сделки
else if(preg_match_all("/^delete_house_deal$/ui", $_GET['type'])){
    if(!isset($_GET['deal_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр deal_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `house_deal` SET `deleted`=true WHERE `id`=".$_GET['deal_id'];
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

    echo ajax_echo(
        "Успех!", 
        "сделка удалена",
        false,
        "SUCCESS"
    );
    exit();
}

//Удалить office сделки
else if(preg_match_all("/^delete_office_deal$/ui", $_GET['type'])){
    if(!isset($_GET['deal_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр deal_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `office_deal` SET `deleted`=true WHERE `id`=".$_GET['deal_id'];
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

    echo ajax_echo(
        "Успех!", 
        "сделка удалена",
        false,
        "SUCCESS"
    );
    exit();
}

//Удалить completed сделки
else if(preg_match_all("/^delete_completed_deal$/ui", $_GET['type'])){
    if(!isset($_GET['deal_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр deal_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `deals` SET `deleted`=true WHERE `id`=".$_GET['deal_id'];
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

    echo ajax_echo(
        "Успех!", 
        "сделка удалена",
        false,
        "SUCCESS"
    );
    exit();
}



//Изменение клиента
else if(preg_match_all("/^update_client$/ui", $_GET['type'])){
    if(!isset($_GET['client_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр client_id!",
            "ERROR",
            null
        );
        exit;
    }

    $name = '';
    if(isset($_GET['name'])){
        $name = "`name` = '".$_GET['name']."'";
    }
    $phone = '';
    if(isset($_GET['phone'])){
        $phone = "`phone`='".$_GET['phone']."'";
    }

    if($name != '' && $phone != ''){
        $query = "UPDATE `clients` SET ".$name.", ".$phone." WHERE `id`=".$_GET['client_id'];
    }
    else if($name != ''){
        $query = "UPDATE `clients` SET ".$name." WHERE `id`=".$_GET['client_id'];
    }
    else if($phone != ''){
        $query = "UPDATE `clients` SET ".$phone." WHERE `id`=".$_GET['client_id'];
    }
    else{
        echo ajax_echo(
            "Ошибка!",
            "Вы не внесли изменений!",
            "ERROR",
            null
        );
        exit;
    }
    
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            "ERROR",
            null
        );
        exit;
    }
    
    echo ajax_echo(
        "Успех!",
        "клиент изменен",
        false,
        "SUCCESS"
    );
    exit;
}

//Изменение employee
else if(preg_match_all("/^update_employee$/ui", $_GET['type'])){
    if(!isset($_GET['employee_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр employee_id!",
            "ERROR",
            null
        );
        exit;
    }

    $name = '';
    if(isset($_GET['name'])){
        $name = "`name` = '".$_GET['name']."'";
    }
    $phone = '';
    if(isset($_GET['phone'])){
        $phone = "`phone`='".$_GET['phone']."'";
    }
    $address = '';
    if(isset($_GET['address'])){
        $address = "`address` = '".$_GET['address']."'";
    }
    $work_experiense = '';
    if(isset($_GET['work_experiense'])){
        $work_experiense = "`work_experiense`=".$_GET['work_experiense'];
    }

    if($name != '' && ($phone != '' || $address != '' || $work_experiense != '')){
        $name = $name.',';
    }
    else if($phone != '' && ($address != '' || $work_experiense != '')){
        $phone = $phone.',';
    }
    else if($address != '' && $work_experiense != ''){
        $address = $address.',';
    }
    else if ($name == '' && $phone == '' && $address == '' && $work_experiense == ''){
        echo ajax_echo(
            "Ошибка!",
            "Вы не внесли изменений!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `employees` SET ".$name.$phone.$address.$work_experiense." WHERE `id`=".$_GET['employee_id'];
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            "ERROR",
            null
        );
        exit;
    }
    
    echo ajax_echo(
        "Успех!",
        "сотрудник изменен",
        false,
        "SUCCESS"
    );
    exit;
}

//Изменение apartments
else if(preg_match_all("/^update_apartments$/ui", $_GET['type'])){
    if(!isset($_GET['apartments_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр apartments_id!",
            "ERROR",
            null
        );
        exit;
    }

    $update_items = array();
    if(isset($_GET['price'])){
        array_push($update_items, "`price`=".$_GET['price']);
    }
    if(isset($_GET['number_of_rooms'])){
        array_push($update_items, "`number_of_rooms`=".$_GET['number_of_rooms']);
    }
    if(isset($_GET['address'])){
        array_push($update_items, "`address`='".$_GET['address']."'");
    }
    if(isset($_GET['floor'])){
        array_push($update_items, "`floor`=".$_GET['floor']);
    }
    if(isset($_GET['area'])){
        array_push($update_items, "`area`=".$_GET['area']);
    }
    if(isset($_GET['desc'])){
        array_push($update_items, "`desc`='".$_GET['desc']."'");
    }
    if(isset($_GET['deal_type'])){
        array_push($update_items, "`deal_type`='".$_GET['deal_type']."'");
    }
    if(isset($_GET['object_type'])){
        array_push($update_items, "`object_type`='".$_GET['object_type']."'");
    }

    if (count($update_items) == 0){
        echo ajax_echo(
            "Ошибка!",
            "Вы не внесли изменений!",
            "ERROR",
            null
        );
        exit;
    }
    else{
        $items = "";
        $count_items = count($update_items);
        for ($i=0; $i < $count_items - 1; $i++){
            $items = $items.array_pop($update_items).",";
        }
        $items = $items.array_pop($update_items);
    }
    $query = "UPDATE `apartments` SET ".$items." WHERE `id`=".$_GET['apartments_id'];
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            "ERROR",
            null
        );
        exit;
    }
    
    echo ajax_echo(
        "Успех!",
        "квартира изменена",
        false,
        "SUCCESS"
    );
    exit;
}

//Изменение houses
else if(preg_match_all("/^update_house$/ui", $_GET['type'])){
    if(!isset($_GET['house_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр house_id!",
            "ERROR",
            null
        );
        exit;
    }

    $update_items = array();
    if(isset($_GET['price'])){
        array_push($update_items, "`price`=".$_GET['price']);
    }
    if(isset($_GET['number_of_rooms'])){
        array_push($update_items, "`number_of_rooms`=".$_GET['number_of_rooms']);
    }
    if(isset($_GET['address'])){
        array_push($update_items, "`address`='".$_GET['address']."'");
    }
    if(isset($_GET['number_of_floors'])){
        array_push($update_items, "`number_of_floors`=".$_GET['number_of_floors']);
    }
    if(isset($_GET['house_area'])){
        array_push($update_items, "`house_area`=".$_GET['house_area']);
    }
    if(isset($_GET['area'])){
        array_push($update_items, "`area`=".$_GET['area']);
    }
    if(isset($_GET['desc'])){
        array_push($update_items, "`desc`='".$_GET['desc']."'");
    }
    if(isset($_GET['deal_type'])){
        array_push($update_items, "`deal_type`='".$_GET['deal_type']."'");
    }
    if(isset($_GET['object_type'])){
        array_push($update_items, "`object_type`='".$_GET['object_type']."'");
    }

    if (count($update_items) == 0){
        echo ajax_echo(
            "Ошибка!",
            "Вы не внесли изменений!",
            "ERROR",
            null
        );
        exit;
    }
    else{
        $items = "";
        $count_items = count($update_items);
        for ($i=0; $i < $count_items - 1; $i++){
            $items = $items.array_pop($update_items).",";
        }
        $items = $items.array_pop($update_items);
    }
    $query = "UPDATE `houses` SET ".$items." WHERE `id`=".$_GET['house_id'];
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            "ERROR",
            null
        );
        exit;
    }
    
    echo ajax_echo(
        "Успех!",
        "дом изменен",
        false,
        "SUCCESS"
    );
    exit;
}

//Изменение offices
else if(preg_match_all("/^update_office$/ui", $_GET['type'])){
    if(!isset($_GET['office_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр office_id!",
            "ERROR",
            null
        );
        exit;
    }

    $update_items = array();
    if(isset($_GET['price'])){
        array_push($update_items, "`price`=".$_GET['price']);
    }
    if(isset($_GET['address'])){
        array_push($update_items, "`address`='".$_GET['address']."'");
    }
    if(isset($_GET['floor'])){
        array_push($update_items, "`floor`=".$_GET['floor']);
    }
    if(isset($_GET['area'])){
        array_push($update_items, "`area`=".$_GET['area']);
    }
    if(isset($_GET['desc'])){
        array_push($update_items, "`desc`='".$_GET['desc']."'");
    }
    if(isset($_GET['deal_type'])){
        array_push($update_items, "`deal_type`='".$_GET['deal_type']."'");
    }

    if (count($update_items) == 0){
        echo ajax_echo(
            "Ошибка!",
            "Вы не внесли изменений!",
            "ERROR",
            null
        );
        exit;
    }
    else{
        $items = "";
        $count_items = count($update_items);
        for ($i=0; $i < $count_items - 1; $i++){
            $items = $items.array_pop($update_items).",";
        }
        $items = $items.array_pop($update_items);
    }
    $query = "UPDATE `offices` SET ".$items." WHERE `id`=".$_GET['office_id'];
    $res_query = mysqli_query($connection, $query);
    
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            "ERROR",
            null
        );
        exit;
    }
    
    echo ajax_echo(
        "Успех!",
        "коммерческая недвижимость изменена",
        false,
        "SUCCESS"
    );
    exit;
}



//закрыть кв сделки
else if(preg_match_all("/^complete_apartment_deal$/ui", $_GET['type'])){
    if(!isset($_GET['deal_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр deal_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `apartment_deal` SET `completed`=true WHERE `id`=".$_GET['deal_id'];
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

    echo ajax_echo(
        "Успех!", 
        "сделка совершена",
        false,
        "SUCCESS"
    );
    exit();
}

//закрыть house сделки
else if(preg_match_all("/^complete_house_deal$/ui", $_GET['type'])){
    if(!isset($_GET['deal_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр deal_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `house_deal` SET `completed`=true WHERE `id`=".$_GET['deal_id'];
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

    echo ajax_echo(
        "Успех!", 
        "сделка совершена",
        false,
        "SUCCESS"
    );
    exit();
}

//закрыть office сделки
else if(preg_match_all("/^complete_office_deal$/ui", $_GET['type'])){
    if(!isset($_GET['deal_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр deal_id!",
            "ERROR",
            null
        );
        exit;
    }
    $query = "UPDATE `office_deal` SET `completed`=true WHERE `id`=".$_GET['deal_id'];
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

    echo ajax_echo(
        "Успех!", 
        "сделка совершена",
        false,
        "SUCCESS"
    );
    exit();
}
else if(preg_match_all("/^phonechange$/ui", $_GET['type'])){
    if(!isset($_GET['phone'])){
        echo ajax_echo (
            "Ошибка!",
            "Вы не указали GET параметр phone!",
            "ERROR",
            null
        );
        exit;
    }
    $arr = FormatNomera($_GET['phone']);
    echo($arr);
}

else if(preg_match_all("/^mailencryption$/ui", $_GET['type'])){
    if(!isset($_GET['mail'])){
        echo ajax_echo (
            "Ошибка!",
            "Вы не указали GET параметр mail!",
            "ERROR",
            null
        );
        exit;
    }
    $arr = po4ta($_GET['mail']);
    echo($arr);
}
else if(preg_match_all("/^ViborMaxMin$/ui", $_GET['type'])){
    $arr = file(__DIR__."/../data.txt");
    echo '<pre>';
        print_r(ViborMaxMin($arr));
        echo '</pre>';
}

else if(preg_match_all("/^ViborMinMax$/ui", $_GET['type'])){
    $arr = file(__DIR__."/../data.txt");
    echo '<pre>';
        print_r(ViborMinMax($arr));
        echo '</pre>';
}
