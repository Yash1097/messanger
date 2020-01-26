<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'chating';
$connect = mysqli_connect($host,$user,$password,$database);


function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
	$query = "
	SELECT * FROM message 
	WHERE (from_user_id = '$from_user_id' 
	AND to_user_id = '$to_user_id') 
	OR (from_user_id = '$to_user_id' 
	AND to_user_id = '$from_user_id') 
	ORDER BY timestamp DESC
	";
	$result = mysqli_query($connect, $query);
	//$row = mysqli_fetch_assoc($result);
	$output = '<div style="overflow:scroll;"><ul class="list-unstyled">';
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$user_name = '';
		$dynamic_background = '';
		$chat_message = '';
		if($row["from_user_id"] == $from_user_id)
		{
			if($row["status"] == '2')
			{
				$chat_message = '<em align="right">This message has been removed</em>';
				$user_name = '<b class="text-success" align="right">You</b>';
			}
			else
			{
				$chat_message = '<div align="right"><b>'.$row['chat_message'].'</b></div>';
				$user_name = '<div align="right"><button type="button" class="btn btn-danger btn-xs remove_chat" id="'.$row['chat_message_id'].'">x</button>&nbsp;<b class="text-success" align="right">You</b></div>';
			}
			
            $chattime = '<div align="right">
					       - <small><em>'.$row['timestamp'].'</em></small>
				        </div>';
			$dynamic_background = 'background-color:#ffe6e6;';
		}
		else
		{
			if($row["status"] == '2')
			{
				$chat_message = '<em>This message has been removed</em>';
			}
			else
			{
				$chat_message = '<div align="left"><b class="bg-warning p-2" style ="border:1px solid black;border-radius:20px;">'.$row['chat_message'].'</b></div>';
			}
			$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
			$dynamic_background = 'background-color:#ffffe6;';
            $chattime = '<div align="left">
					- <small><em>'.$row['timestamp'].'</em></small>
				</div>';
		}
		$output .= '
		<li style="border-bottom:1px dotted #ccc;padding-top:8px; padding-left:8px; padding-right:8px;'.$dynamic_background.'">
			<p>'.$user_name.' '.$chat_message.'
            '.$chattime.'
			</p>
		</li>
		';
	}
	$output .= '</ul></div>';
	$query = "
	UPDATE message 
	SET status = '0' 
	WHERE from_user_id = '".$to_user_id."' 
	AND to_user_id = '".$from_user_id."' 
	AND status = '1'
	";
	$result = mysqli_query($connect, $query);
    if($result)
	   return $output;
    else
        return "fail to get msg";
}

function get_user_name($user_id, $connect)
{
	$query = "SELECT username FROM users WHERE id = '$user_id'";
	$result = mysqli_query($connect, $query);
	while ($row = mysqli_fetch_assoc($result)) 
	{
		return $row['username'];
	}
}

?>