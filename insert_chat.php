<?php

//insert_chat.php

include('connection.php');

session_start();

	$to_user_id = $_POST['to_user_id'];
	$from_user_id = $_SESSION['user_id'];
	$chat_message = $_POST['chat_message'];
	$status ='1';

$query = "
INSERT INTO message 
(to_user_id, from_user_id, chat_message, status) 
VALUES ($to_user_id, $from_user_id, '$chat_message', '$status')
";

$result = mysqli_query($connect,$query);

if($result)
{
    //echo $chat_message;
	echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
}

?>