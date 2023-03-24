<?php

include_once("../db_connect.php");
define("UPLOAD_DIR", "../upload/");

if(!isset($_POST['FIO'])){
    exit("Поле ФИО отсутствует!");
}
if(!isset($_POST['category'])){
    exit("Поле category отсутствует!");
}
if(!isset($_FILES['file'])){
    exit("Поле file отсутствует!");
}

$FIO = $_POST['FIO'];
$category = $_POST['category'];
$file = $_FILES['file'];

if($FIO && $category && $file){
    if($file['size'] > 10485760) exit("Файл слишком большой");

    $hash = hash('md5', $FIO.$file['name']);
    if(move_uploaded_file($file['tmp_name'], UPLOAD_DIR.basename($hash))){
        $FIO = (object)array(
            "first" => explode(" ", $FIO)[1],
            "second" => explode(" ", $FIO)[0],
            "middle" => explode(" ", $FIO)[2]
        );

        $query = "INSERT INTO `form`(`firstname`, `secondname`, `middlename`, `category`, `filepath`, `file_on_server`) VALUES ('".$FIO->first."','".$FIO->second."','".$FIO->middle."','".$category."','".$file['name']."','".$hash."')";
        $res_query = mysqli_query($connection,$query);

        if(!$res_query){
            exit('<p>ERROR</p>');
        }
        exit('<p>Портфолио успешно загружено</p>');
    }
}
