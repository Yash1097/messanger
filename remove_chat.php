<?php

//remove_chat.php

include('connection.php');

if(isset($_POST["chat_message_id"]))
{
	$query = "
	UPDATE message 
	SET status = '2' 
	WHERE chat_message_id = '".$_POST["chat_message_id"]."'
	";

	$result = mysqli_query($connect,$query);
}

?>