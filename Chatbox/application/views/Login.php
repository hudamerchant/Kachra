<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" >
        <h1 class="col offset-md-4" >LOGIN</h1>
            <form method="POST">
                <div class="form-group">
                    <label class="float-left">Email</label>
                    <input type="email" name="email" class="form-control">
                    <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                    <label class="float-left">Password</label>
                    <input type="password" name="password" class="form-control">
                    <?php echo form_error('password'); ?>
                    <?php echo isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '' ?>
                </div>
                <div class="form-group">
                     
                    <input type="submit" name="submit" value="Add User" class="btn btn-success float-right">
                </div>
                <div class="form-group">
                    <span>Don't have an account?<a href="<?php echo site_url('/Signup') ?>">Sign Up</a></span>
                </div>
            </form>
        </div>
    </div>

</div>