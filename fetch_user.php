<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'chating';
$connect = mysqli_connect($host,$user,$password,$database);
session_start();
$query = "
SELECT * FROM users 
WHERE id != '".$_SESSION['user_id']."' 
";

$statement = mysqli_query($connect,$query);


$output = '
<table class="table text-light table-striped">
	
';
$status = 'online';
if(mysqli_num_rows($statement) > 0){
    while($row = mysqli_fetch_assoc($statement)) {
       $output .= '
	<tr>
		<td><h5>'.$row['username'].'</h5></td>
		<td>'.$status.'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
	</tr>
	'; 
    }
}

$output .= '</table>';

echo $output;

?>