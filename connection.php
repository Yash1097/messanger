<?php
$host = 'localhost:8889';
$user = 'root';
$password = 'root';
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
	ORDER BY timestamp ASC
	";
	$result = mysqli_query($connect, $query);
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
				$chat_message = '<em align="right" class="alert-secondary">This message has been removed</em>';
				$user_name = '';
			}
			else
			{
				$chat_message = '<div class="talk-bubble"><div class="talktext" style="text-align: right !important;"><p align="right" class="alert-success chatmsg"><b>'.$str.'</b></p></div></div>';
				$user_name = '<div align="right"><button type="button" style="color: red;" class="btn btn-xs remove_chat" id="'.$row['chat_message_id'].'">x</button>&nbsp;</div>';
			}
			
            $chattime = '<div class="text-light" align="right">
					       - <small><em>'.$row['timestamp'].'</em></small>
				        </div>';
		}
		else
		{
            $pos = 'left';
			if($row["status"] == '2')
			{
				$chat_message = '<em class="alert-secondary">This message has been removed</em>';
			}
			else
			{
				$chat_message = '<div class="talk-bubble"><div class="talktext" style="text-align: left !important;" ><p class="alert-primary chatmsg"><b>'.$str.'</b></p></div></div>';
			}
            $chattime = '<div class="text-light" align="left">
					- <small><em>'.$row['timestamp'].'</em></small>
				</div>';
		}
		$output .= '
		<div align = "'.$pos.'">
			<p> '.$user_name.$chat_message.'
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

function count_unseen_message($from_user_id, $to_user_id, $connect)
{
	$query = "
	SELECT * FROM message 
	WHERE from_user_id = '$from_user_id' 
	AND to_user_id = '$to_user_id' 
	AND status = '1'
	";
	$result = mysqli_query($connect, $query);
	$count = mysqli_num_rows($result);
	$output = '';
	if($count > 0)
	{
		$output = '<span class="ml-3 bg-primary text-light text-center" style="border-radius:50%;padding:0 5px 0 5px;" id="chatcount_'.$from_user_id.'">'.$count.'</span>';
	}
	return $output;
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
function deleteaccount($user_id,$connect){
    $flag1 = 0;
    $flag2 = 0;
    $query = "DELETE FROM users WHERE id='$user_id'";
	$result = mysqli_query($connect, $query);
    if($result)
        $flag1 = 1;
    $query = "DELETE FROM message WHERE to_user_id ='$user_id' OR from_user_id ='$user_id'";
    $result = mysqli_query($connect, $query);
    if($result)
        $flag2 = 1;
    if($flag1 == 1 && $flag2 == 1)
        echo "1";
    else
        echo "Something went wrong  :( ";
}
function getimgname($userid,$connect){
    $query = "SELECT image FROM users WHERE id = '$userid'";
    $result = mysqli_query($connect, $query);
    if($result){
    $row = mysqli_fetch_assoc($result);
    return $row['image'];
    }
    else
        return "no img";
}

?>