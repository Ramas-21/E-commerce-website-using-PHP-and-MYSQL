<?php

$connect = mysqli_connect('localhost','root','','myStore');

if(!$connect){
    die(mysqli_error($connect));
}
?>