<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    
  
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

    <style type="text/css">
.title h1 {
  font-size: 3.5em;
  color: #fff;
}

.bar {
  height: .25em;
  width: 100%;
  background: #fff;
  margin: 1.5em auto 0;
}

label{
  color: #fff;
  font-size: 1.5em;
}

input[type=text], input[type=password] {
  font-size: 1.75em;
  padding: .55em;
  width: 100%;
  margin-bottom: 1em;
  border: none;
  
  &::placeholder {
   color: #aaaaaa;
   position:relative;
   padding:0;
   transition: all 0.5s ease;
  }
      
  &:hover::placeholder, &:focus::placeholder {
    padding-top: 3em;
  }
}


.form {
  h2 {
    text-align: left;
    font-weight: 100;
    color: #fff;
    margin-bottom: .5em;
  }
  h4 {
    font-weight: 100;
    color: #fff;
    margin-top: 2em;
  }
}

h1, h2 h3, h4, h5, h6, input {
  font-weight: 100;
}
</style>

  </head>
  <body style="background: rgba(245, 132, 33, .87);
  min-height: 100vh;
  width: auto;">
  <div class="container" style="padding-top: 10%; padding-bottom: 10%;">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center title">
        <?php echo form_open('Login/cekLogin'); ?>
          <b><h1>Want to connect?</h1></b>
          <div class="bar"></div>
          <br>
      </div>
      <div class="row">
        <div class="col-md-4 col-md-offset-4 form">
          <font color="white"><?php echo validation_errors()?></font>
            <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-large btn-block btn-warning">Submit</button>
         <?php echo form_close(); ?>
         <br>
       </div>
     </div>
     <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center title">
         <div class="bar"></div>
         <br>
         <div class="col-md-5">
         <font color="white"><h4 class="text-left">Belum Punya Akun?</h4>
          </div>
          <div class="col-md-5 pull-right">
          <a href="<?php echo site_url();?>/login/registrasi" style="text-decoration: none"><button class="btn btn-secondary">Registrasi</button></a>
      </div></font></div></div>
    </div>
      
    </div>        
</div>
   <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--    <script src="<?php //echo base_url();?>Hello World"></script> -->
    

  </body>
</html>