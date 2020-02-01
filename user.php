    <div class="row">
    <div class="col-3">
        <nav class="navbar sticky-top navbar-light bg-light">
    <a class="navbar-brand text-center" href="#">
        <img class="rounded-circle" id="profilepic" src="use.png" onclick="changeimg()" width="30%">
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
    </ul>
  </div>
</nav>
   <hr style="border:0.5px solid black">
   <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="overflow: auto; height: auto;">
      <a class="nav-link" id="yash" data-toggle="pill" href="#yoyo" role="tab" aria-controls="yoyo" aria-selected="false">Home</a>
    </div>
    </div>
  <!--<div class="col-3 alert-light bg-light text-dark text-center p-4" id="leftsidebar" style="border-right: 1px solid black;">
       <div style="position:absolute;right:10px;">
           <form action="" method="post">
               <button class="btn btn-warning" name="logout">Logout</button>
           </form>
       </div>
        <img class="rounded-circle" id="profilepic" src="use.png" onclick="changeimg()" width="30%">
        <h4 class="p-2" ><?php echo $_SESSION['uname'] ?></h4><hr style="border:0.5px solid black">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
          </div>
        </div>
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="overflow: auto; height: auto;">
      <a class="nav-link" id="yash" data-toggle="pill" href="#yoyo" role="tab" aria-controls="yoyo" aria-selected="false">Home</a>
    </div>
  </div>-->
  <div class="col-9 bg-light" id="chatbg">
   <div class="bg-secondary" id="chatwith"></div>
    <div class="tab-content" id="v-pills-tabContent" style="overflow-y: auto; height:500px;">
        <img style="padding-top:20%; padding-left:30%;" src="start-bg.jpg">
    </div>
    <div id="inputarea"></div>
  </div>
</div>
<script src="action.js" type="text/javascript"></script>