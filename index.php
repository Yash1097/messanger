<?php
$now = time();
session_set_cookie_params(60*60*24*2,"/");
session_start();
if(isset($_SESSION['uname']) && ($_SESSION['expiry'] > $now) ){
    echo "<script>location.href='welcome.php'</script>";
}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">

    <style>
        .footer {
            position: absolute;
            bottom:0;
            height: 20%;
            width: 100%;
        }
        .loginside{
            position: absolute;
            right: 0;
            width: 30%;
            height: 100%;
        }
    </style>
    <title>My Messanger</title>
  </head>
  <body class="bg-dark">
   <div>
       <div><?php include('register.php') ?></div>
   </div>
    <div class="loginside">
        <div><?php include('logincontent.php')  ?></div>
    </div>
    <div class="footer">
            <div class="row bg-dark text-light">
               <div class="col-4">

               </div>
               <div class="col-4"></div>
                <div class="col-4 bg-dark text-light p-3">
                    <form action="" method="post">
                       <div><h4>Contact Us</h4></div>
                        <div class="form-group">
                            <input type="email" placeholder="Email" id="femail" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="Text" placeholder="Subject" id="subject" class="form-control" />
                        </div>
                        <div class="form-group">
                            <textarea type="Text" style="height:20%;" placeholder="Message" id="msg" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
            </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>