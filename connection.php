<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'chating';
$connect = mysqli_connect($host,$user,$password,$database);

function fetch_user_chat_history($from_user_id, $to_user_id, $connect , $width)
{
    $width = (int)$width;
    $wid = $width/2;
	$query = "
	SELECT * FROM message 
	WHERE (from_user_id = '$from_user_id' 
	AND to_user_id = '$to_user_id') 
	OR (from_user_id = '$to_user_id' 
	AND to_user_id = '$from_user_id') 
	ORDER BY timestamp ASC
	";
	$result = mysqli_query($connect, $query);
	//$row = mysqli_fetch_assoc($result);
	$output = '<div id="chatscroll" style="overflow:scroll;"><ul class="list-unstyled ">';
	while ($row = mysqli_fetch_assoc($result)) 
	{
        $pos='';
		$user_name = '';
        $str = $row['chat_message'];
		$chat_message = '';
		if($row["from_user_id"] == $from_user_id)
		{
            $pos = 'right';
			if($row["status"] == '2')
			{
				$chat_message = '<em align="right">This message has been removed</em>';
				$user_name = '<b class="text-success" align="right">You</b>';
			}
			else
			{
				$chat_message = '<div class="talk-bubble"><div class="talktext" style="text-align: right !important;"><p align="right" class="alert-success chatmsg">'.$str.'</p></div></div>';
				$user_name = '<div align="right"><button type="button" style="color: red;" class="btn btn-xs remove_chat" id="'.$row['chat_message_id'].'">x</button>&nbsp;</div>';
			}
			
            $chattime = '<div class="text-muted" align="right">
					       - <small><em>'.$row['timestamp'].'</em></small>
				        </div>';
		}
		else
		{
            $pos = 'left';
			if($row["status"] == '2')
			{
				$chat_message = '<em>This message has been removed</em>';
			}
			else
			{
				$chat_message = '<div class="talk-bubble"><div class="talktext" style="text-align: left !important;" ><p class="alert-primary chatmsg">'.$str.'</p></div></div>';
			}
            $chattime = '<div class="text-muted" align="left">
					- <small><em>'.$row['timestamp'].'</em></small>
				</div>';
		}
		$output .= '
		<div align = "'.$pos.'">
			<p> '.$chat_message.'
            '.$chattime.'
			</p>
		</div>
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