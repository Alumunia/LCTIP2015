<?php
$con =mysqli_connect("localhost","root","","kuis");
/**********MYSQL Settings****************/
$host="localhost";
$databasename="kuis";
$user="root";
$pass="";
/**********MYSQL Settings****************/
$db_username = 'root'; // Your MYSQL Username.
$db_password = ''; // Your MYSQL Password.
$db_name = 'kuis'; // Your Database name.
$db_host = 'localhost';
/***********THIS IS A SECOND DBNAME*******/

$conn=mysql_connect($host,$user,$pass);
$conDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('Error: Could not connect to database.');


if($conn)
{
$db_selected = mysql_select_db($databasename, $conn);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
}
else
{
    die('Not connected : ' . mysql_error());
}
?>
