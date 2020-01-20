
<!-- Modal -->

<?php
include('connection.php');
    if(isset($_POST['register'])){
        if(!$connect){
            echo "Database not Connected :( !!";
        }
        else{
            $uname = $_POST['usernanme'];
            $pass = $_POST['password'];
            $email = $_POST['email'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $query = 'SELECT email,username FROM users WHERE email = '. $email . 'AND username ='.$uname;
            $result = mysqli_query($connect,$query);
            if(mysqli_num_rows($result)>0){
                echo "useralready exist";
            }
            else{
                $query = 'INSERT INTO users (username,password,email,name) VALUES ('.$uname.','.$pass.','.$email.','.$name.','.$phone.')';
                if(mysqli_query($connect,$query)){
                    echo "<script>alert('User Registerd !!')</script>";
                }else{
                    echo "<script>alert('Something went Wrong !!')</script>";
                }
            }
        }
    }
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Register</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="register.php" method="post">
            <div class="form-group">
                Username
                <input type="text" name="username" class="form-control" placeholder="Usename"/>
            </div>
            <div class="form-group">
                Password
                <input type="password" name="password" class="form-control" placeholder="Password"/>
            </div>
            <div class="form-group">
                Name
                <input type="text" name="name" class="form-control" placeholder="Full Name"/>
            </div>
            <div class="form-group">
                Email
                <input type="email" name="email" class="form-control" placeholder="Email"/>
            </div>
            <div class="form-group">
                Phone No.
                <input type="number" name="phone" class="form-control" placeholder="Phone No."/>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="button" class="btn btn-success" value="Register" name="register"/>
      </div>
    </div>
  </div>
</div>