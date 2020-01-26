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
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	
';
$status = 'online';
if(mysqli_num_rows($statement) > 0){
    while($row = mysqli_fetch_assoc($statement)) {
       $output .=  '
        <a class="nav-link" id="'.$row['username'].'" data-toggle="pill" href="#'.$row['id'].'" role="tab" aria-controls="'.$row['id'].'" data-touserid="'.$row['id'].'" data-tousername="'.$row['username'].'"><b>'.$row['username'].'</b></a>
        ';
        
    }
}
$output .= '</div>';

echo $output;

?>


 <!--$e = '
        <a class="nav-link active start_chat" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" data-touserid="'.$row['id'].'" data-tousername="'.$row['username'].'">$row['username']</a>
        ';

<tr>
		<td><h5>'.$row['username'].'</h5></td>
		<td>'.$status.'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
	</tr>


<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link active start_chat" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" data-touserid="'.$row['id'].'" data-tousername="'.$row['username'].'">$row['username']</a>
</div>





<div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
</div>
-->