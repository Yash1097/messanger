<?php
include('connection.php');
    if(isset($_POST['register'])){
        if(!$connect){
            echo "Database not Connected :( !!";
        }
        else{
            $uname = $_POST['uname'];
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
                    echo "User Registerd !!";
                }else{
                    echo "Something went Wrong !!";
                }
            }
        }
    }
?>