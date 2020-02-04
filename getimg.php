<?php
include('connection.php');
session_start();

echo getimgname($_POST['to_user_id'], $connect);

?>