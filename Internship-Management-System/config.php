<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'project');


$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

function OpenCon(){
    $db_host = 'localhost';
    $db_user_name = 'root';
    $db_password = '';
    $db = 'project';

    $conn = new mysqli($db_host,$db_user_name,$db_password,$db) or die("Connection failed: %s\n" . $conn->error);
    return $conn;
}

function CloseCon(){
    $conn = $this->link;
    $conn->close();
}

?>
