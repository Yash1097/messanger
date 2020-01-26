    <div class="row">
  <div class="col-3 bg-dark text-light text-center p-4" style="border-right: 2px solid white;">
    <div>
       <div style="position:absolute;right:10px;">
           <form action="" method="post">
               <button class="btn btn-warning" name="logout">Logout</button>
           </form>
       </div>
        <img class="rounded-circle" id="profilepic" src="use.png" onclick="changeimg()" width="30%">
        <h4 class="p-2" ><?php echo $_SESSION['uname'] ?></h4><hr style="border:0.5px solid white">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
          </div>
        </div>
    </div>
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="overflow: auto; height: 300px;">
      <a class="nav-link" id="yash" data-toggle="pill" href="#yoyo" role="tab" aria-controls="yoyo" aria-selected="false">Home</a>
    </div>
  </div>
  <div class="col-9 bg-dark">
    <div class="tab-content" id="v-pills-tabContent" style="overflow-y: auto; height:550px;">
        <img src="use.png">
    </div>
    <div id="inputarea"></div>
  </div>
</div>
<script src="action.js" type="text/javascript"></script>