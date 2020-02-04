    <?php
include('connection.php');
    
    if(isset($_POST['but_upload'])){
        $oldname = getimgname($_SESSION['user_id'],$connect);
  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
    $userid = $_SESSION['user_id'];
     // Insert record
     $query = "UPDATE users SET image ='$name' WHERE id = '$userid'";
     $result = mysqli_query($connect,$query);
    if($result){
        echo "<script>alert('Profile pic Chaanged');</script>";
        $_SESSION['pic']= $name;
    }
      else
          echo "<script>alert('Not able to change');</script>";
     // Upload file
    if($oldname != 'use.png'){
        $myFile = "upload/$oldname";
        unlink($myFile) or die("Couldn't delete file");
    }
    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
    
  }
 
}
?>
    <div class="row">
    <div class="col-3">
        <nav class="navbar sticky-top navbar-light bg-light">
    <a class="navbar-brand text-center" href="#">
        <img class="rounded-circle" id="profilepic" src="upload/<?php echo getimgname($_SESSION['user_id'],$connect); ?>" onclick="changeimg()" width="30%">
        <h4 class="p-2"><?php echo strtoupper($_SESSION['uname']) ?></h4>
    </a>
  <button class="navbar-toggler text-center" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse text-center" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <form action="" method="post">
               <button class="btn btn-warning" name="logout">Logout</button>
           </form>
      </li>
      <li>
          <div>
          <form method="post" action="" enctype='multipart/form-data'>
             <label for="uploadpic" class="btn btn-success">Click to Chamge profile Pic</label><input type='submit' value='Change Pic' name='but_upload'>
              <input type='file' id="uploadpic" style="visibility:hidden;" name='file' />

          </form>
          <!--<form action="" method="post" enctype='multipart/form-data'>
              <label for="files" class="btn btn-success">Change Profile Pic</label>
              <input id="files" name='file' style="visibility:hidden;" type="file">
              <input type='submit' value='Save name' name='but_upload'>
          </form>-->
        </div>
      </li>
    </ul>
  </div>
</nav>
   <hr style="border:0.5px solid black">
   <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="overflow: auto; height: auto;">
      <a class="nav-link" id="yash" data-toggle="pill" href="#yoyo" role="tab" aria-controls="yoyo" aria-selected="false">Home</a>
    </div>
    </div>
  <div class="col-9 bg-light" id="chatbg">
   <div class="bg-secondary" id="chatwith"></div>
    <div class="tab-content" id="v-pills-tabContent" style="overflow-y: auto;">
        <img style="padding-top:20%; padding-left:30%;" src="start-bg.jpg">
    </div>
    <div id="inputarea"></div>
  </div>
</div>
<script src="action.js" type="text/javascript"></script>