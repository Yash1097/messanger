<?php 
    if(isset($_POST['login'])){
        include('connection.php');
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $query = "SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".md5($_POST['password'])."'";
        if($result = mysqli_query($connect,$query)){
                if(mysqli_num_rows($result) > 0){
                    
                    if(isset($_POST['logmein'])){
                    $expiry = time() +60*60*24*2;
                    }else{
                        $expiry = time()+60*60*3;
                    }
                    $row = mysqli_fetch_assoc($result);
                    if(!isset($_SESSION['uname'])){
                        $_SESSION['start']=time();
                        $_SESSION['expiry']= $expiry;
                        $_SESSION['user_id']=$row['id'];
                        $_SESSION['uname'] = $_POST['username'];
                        $_SESSION['pass'] = $_POST['password'];
                        echo "<script>location.href='welcome.php'</script>";
                    }else{
                        echo "<script>location.href='welcome.php'</script>";
                    }
                }else{
                    echo "<script>alert('login again');</script>";
                    echo "<script>location.href='index.php'</script>";
                }
        }else{
            echo "Wrong User!!";
        }
    }

if(isset($_POST['login'])){
           
}



?>
<div class="bg-dark text-light p-3">
       <div><h4>LogIn</h4></div>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" placeholder="Username" name="username" class="form-control" />
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" name="password" class="form-control" />
                <div class="row justify-content-between">
                    <div class="col-6"><input type="checkbox" name="logmein"> Keep Me Login</div>
                    <a href="index.php" class="text-muted col-6">Forgot Password</a>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-5">
                        <input type="submit" class="btn btn-primary" value="LogIn" name="login" />
                    </div>
                    <div class="col-7 text-right">
                       <label>New User?</label>
                        <a href="#" data-toggle="modal" data-target="#myModal" >Register Here</a>
                    </div>
                </div>
            </div>
        </form>
</div>