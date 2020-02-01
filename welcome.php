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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
        <style>
        .userinfo{
            position: absolute;
            left: 0;
            border-right: 1px solid white;
            width: 30%;
            height:100%;
        }
        #profilepic:hover{
            opacity: 0.5;
        }
            .chat_display{
                height: 90%;
                overflow-y: scroll;
            }
            
            /* width */
            ::-webkit-scrollbar {
              width: 10px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
              border-radius: 10px;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
              background: lightgrey; 
              border-radius: 10px;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
              background: grey; 
            }
            button:hover{
                cursor: pointer;
            }
            .chatmsg{
                padding: 10px;
                border: 1px solid ;
                border-radius: 20px;
            }
            .talk-bubble {
            display: inline-block;
            /*position: relative !important;*/
            max-width: 45% !important;
            height: auto !important;
        }
        .talktext{
            line-height: 1em !important;
        }
        .talktext p{
          -webkit-margin-before: 0em !important;
          -webkit-margin-after: 0em !important;
        } 
            .navbar-icon:after{
              content: '\2807';
            }    

            
    </style>
    <title>My Messanger</title>
  </head>
  <body class="bg-light">
   
   <div>
       <?php include('user.php'); ?>
   </div>    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>