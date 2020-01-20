<div class="bg-dark text-light p-3">
       <div><h4>LogIn</h4></div>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" placeholder="Username" name="username" class="form-control" />
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" name="password" class="form-control" />
                <div class="row justify-content-between">
                    <div class="col-6"><input type="checkbox" name="logmein"> Keep Me Login</div>
                    <a href="index.php" class="text-muted col-6">Forgot Password</a>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-5">
                        <input type="submit" class="btn btn-primary" value="LogIn" name="login" />
                    </div>
                    <div class="col-7 text-right">
                       <label>New User?</label>
                        <a href="#" data-toggle="modal" data-target="#myModal" >Register Here</a>
                    </div>
                </div>
            </div>
        </form>
</div>