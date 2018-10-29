<?php
session_start();
include('db.php');
if(isset( $_POST['query'])){
    $query = $_POST['query'];
    $query1= mysql_query("SELECT email from appusers where email ='$query'");
    if(mysql_num_rows($query1)>0){
        $output = 'The email is alredy registered';
        echo $output;
    }


}
?>