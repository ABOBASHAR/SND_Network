<?php 
//To turn report off
mysqli_report(MYSQLI_REPORT_OFF);
//To define database credentials
define("DB_SERVER","localhost");
define("DB_NAME","NETWORK_WEBSITE1");
define("DB_USERNAME","Abo_Bashar");
define("DB_PASSWORD","123");
//To link the database connection
$link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
//Ensure connection
if (!$link){
    echo "Connection failed ... \nPlease try again ".mysqli_connect_error();
}
?>