<?php
session_start();
$now = time();
    if(!isset($_SESSION['uname']) || ($_SESSION['expiry'] < time()) ){
    echo "<script>location.href='index.php'</script>";
    }
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        echo "<script>location.href='index.php'</script>";
}
?>
 <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
        <style>
        .userinfo{
            position: absolute;
            left: 0;
            border-right: 1px solid white;
            width: 30%;
            height: 100%;
        }
        #profilepic:hover{
            opacity: 0.5;
        }
            #chatarea{
                height: 100%;
            }
            #chatarea{
                float: right;
                width: 70%;
            }
            #chat{
                height: 90%;
            }
            #msgsend{
                height: 15%;
            }
    </style>
    <title>My Messanger</title>
  </head>
  <body>
   
   <div>
       <?php include('user.php'); ?>
   </div>    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>