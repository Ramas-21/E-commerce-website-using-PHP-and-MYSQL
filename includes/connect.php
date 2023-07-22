<?php

$connect = mysqli_connect('localhost','root','','myStore');

if($connect){
    echo "connection successful";
}
else {
    die(mysqli_error($connect));
}
?>