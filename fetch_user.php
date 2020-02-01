<?php
include('connection.php');
session_start();
$query = "
SELECT * FROM users 
WHERE id != '".$_SESSION['user_id']."' 
";

$statement = mysqli_query($connect,$query);


$output = '
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	
';
$status = 'online';
if(mysqli_num_rows($statement) > 0){
    while($row = mysqli_fetch_assoc($statement)) {
       $output .=  '
        <a class="nav-link" id="'.$row['username'].'" data-toggle="pill" href="#'.$row['id'].'" role="tab" aria-controls="'.$row['id'].'" data-touserid="'.$row['id'].'" data-tousername="'.$row['username'].'"><b>'.$row['username'].'</b>'.count_unseen_message($row['id'], $_SESSION['user_id'], $connect).'</a>';
        
    }
}
$output .= '</div>';

echo $output;

?>