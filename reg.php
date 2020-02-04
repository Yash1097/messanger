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
            $query = 'SELECT * FROM `users` WHERE email = "'. $email . '" AND username ="'.$uname.'"';
            if($result = mysqli_query($connect,$query)){
                if(mysqli_num_rows($result) > 0){
                    echo "User already exist ";
                    /*$row = mysqli_fetch_array($result);
                    echo $row['phone'] ;*/
                }
                else{
                    $query = "INSERT INTO users (username,password,email,name,phone,image ) VALUES ('$uname',MD5('$password'),'$email','$name',$phone,'use.png')";
                    if(mysqli_query($connect,$query)){
                        echo "User Registerd !!";
                    }else{
                        echo "Something went Wrong !!";
                    }
                }
            }
            else{
                echo "wrong";
            }
        }
    }
?>