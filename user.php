
<div class="container p-3 userinfo bg-dark text-light text-center">
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
    <div>
        
        <div class="text-light" id="users"></div>
        
    </div>
</div>
<div class="bg-secondary" id="chatarea">
  <div class="container" id="chat"></div>
   <div class="container" id="msgsend">
       <div class="container">
    <div>
        <div id="chats"></div>
    </div>
    <div>
        <div class="input-group mb-3">
         <div class="input-group-prepend">
    <span class="input-group-text"><i class="fa fa-smile-o"></i></span>
  </div>
          <input type="text" class="form-control" placeholder="Search">
          <div class="input-group-append">
            <span class="input-group-text btn"><i class="fa fa-paper-plane"></i></span>
          </div>
        </div>
    </div>
</div>
   </div>
</div>
<script>
$(document).ready(function(){
    $.ajax({
			url:"fetch_user.php",
			method:"POST",
			success:function(data){
				$('#users').html(data);
			}
		});
});
    
</script>