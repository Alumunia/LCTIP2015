<?php 
session_start();
include '../koneksi.php';

//using isset to avoid warnings.
$email = isset($_POST['user']) ? $_POST['user'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

//check if values are not null
if ($email !== null && $password !== null){

    //escape email
    $email = mysql_real_escape_string($email);

    //retrieve password by email and limit 1 result
    $query = "SELECT * FROM admin WHERE username = '($email)' AND password = '$pass'";

    //run query
    $result = mysql_query( $query ) or die ("didn't query");

    //validate if query run correctly
    if (!$result) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }

    //fetch row
    $row = mysql_fetch_row($result);

    //validate result
    if ($row['password'] == $password){
        $_SESSION['ocer']=$email;
        header("Location: admin.php"); 
    } else {
        header("Location: index.php?l=1");
    }
}
?>