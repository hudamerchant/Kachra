<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" >
        <h1 class="col offset-md-4" >SIGN UP</h1>
            <form method="POST">
                <div class="form-group">
                    <label class="float-left">Name</label>
                    <input type="text"  name="name" class="form-control">
                    <?php echo form_error('name'); ?>
                   
                </div>
                <div class="form-group">
                    <label class="float-left">Age</label>
                    <input type="number"  name="age" class="form-control">
                    <?php echo form_error('age'); ?>
                   
                </div>

                <div class="form-group">
                    <label class="float-left">Email</label>
                    <input type="email" name="email" class="form-control">
                    <?php echo form_error('email'); ?>
                    
                </div>
                <div class="form-group">
                    <label class="float-left">Password</label>
                    <input type="password" name="password" class="form-control">
                    <?php echo form_error('password'); ?>
                 
                </div>
                <div class="form-group">
                    <label class="float-left">Confirm Password</label>
                    <input type="password" name="re_password" class="form-control">
                    <?php echo form_error('re_password'); ?>
                    <?php echo isset($error) ? $error : '' ?>
                 
                </div>
                <div class="form-group">
                     
                    <input type="submit" name="submit" value="Add User" class="btn btn-success float-right">
                </div>
                <div class="form-group">
                    <p>Already Registered?<a href="<?php echo site_url('/Login') ?>">Login Here.</a></p>
                </div>
            </form>
        </div>
    </div>

</div>