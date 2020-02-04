
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Register</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form role="form">
            <div class="form-group">
                Username
                <input type="text" id="username" class="form-control" placeholder="Usename" required />
            </div>
            <div class="form-group">
                Password
                <input type="password" id="password" class="form-control" placeholder="Password" required />
            </div>
            <div class="form-group">
                Name
                <input type="text" id="name" class="form-control" placeholder="Full Name" required />
            </div>
            <div class="form-group">
                Email
                <input type="email" id="email" class="form-control" placeholder="Email" required />
            </div>
            <div class="form-group">
                Phone No.
                <input type="number" id="phone" class="form-control" placeholder="Phone No." required />
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="rbtn" onclick="submitform()">Register</button>
      </div>
    </div>
  </div>
</div>
<script>
function submitform(){
    var uname = $('#username').val();
    var password = document.getElementById('password').value;
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    console.log(password);
    $.ajax({
            url:'reg.php',
            method:'POST',
            data:'register=1&uname='+uname+'&password='+password+'&name='+name+'&email='+email+'&phone='+phone,
            success:function(data){
                alert(data);
            }
    });
}
</script>