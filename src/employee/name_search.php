<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$link = mysqli_connect('localhost', 'root', 'mysql','lms');
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
if(isset( $_POST['query'])){
    // $query = $_POST['query'];
    $output='';
    $result= mysqli_query($link,"SELECT * from clients where fullname LIKE '%".$_POST["query"]."%' ");
    $output = '<ul class="list-unstyled">';
    if(mysqli_num_rows($result) > 0)
    {
         while($row = mysqli_fetch_assoc($result))
         {
              $output .= '<li>'.$row["fullname"].'</li>';
         }
    }
    else
    {
         $output .= '<li>name Not Found</li>';
    }
    $output .= '</ul>';
    echo $output;
}

?>