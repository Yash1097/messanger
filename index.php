<?php
$now = time();
session_set_cookie_params(60*60*24*2,"/");
session_start();
if(isset($_SESSION['uname']) && ($_SESSION['expiry'] > $now) ){
    echo "<script>location.href='welcome.php'</script>";
}
if(isset($_POST['login'])){
    if(isset($_POST['logmein'])){
            $expiry = time() +60*60*24*2;
        }
    else{
        $expiry = time()+60*60*3;
    }
    session_start();
    if(!isset($_SESSION['uname'])){
        $_SESSION['start']=time();
        $_SESSION['expiry']= $expiry;
        $_SESSION['uname'] = $_POST['username'];
        $_SESSION['pass'] = $_POST['password'];
        echo "<script>location.href='welcome.php'</script>";
    }
    else{
        echo "<script>location.href='welcome.php'</script>";
    }        
}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>My Messanger</title>
  </head>
  <body>
    <div class="container">
        <div><?php include('logincontent.php')  ?></div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>