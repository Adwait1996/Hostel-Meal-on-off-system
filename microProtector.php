<?php
/**
 * ****************************************************************************
 * Micro Protector
 * 
 * Version: 1.0
 * Release date: 2007-09-10
 * 
 * USAGE:
 *   Define your requested password below and inset the following code
 *   at the beginning of your page:
 *   <?php require_once("microProtector.php"); ?>
 * 
 *   See the attached example.php.
 * 
 ******************************************************************************/


$Password = 'adwait1996'; // Set your password here



/******************************************************************************/
   if (isset($_POST['submit_pwd'])){
      $pass = isset($_POST['passwd']) ? $_POST['passwd'] : '';
      
      if ($pass != $Password) {
         showForm("Wrong password");
         exit();     
      }
   } else {
      showForm("");
      exit();
   }
   
function showForm($error="LOGIN"){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Restricted Acess!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <style>
    body
        {
            background-color: dimgrey;
            
            -webkit-user-select: none; /*for safari and android*/
            -moz-user-select: none;   /*for mozilla*/
            -ms-user-select: none; /* for microsoft internet explorer*/
            user-select: none;   /*for chrome*/
        }
    
    </style>
</head>
<body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
    <div class="card" style="margin-top: 20%">
        <div class="card-body center">
            <h3 class="card-title"> Enter password to Access</h3>
      <div class="text-danger"><?php echo $error; ?></div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="pwd" class="form-horizontal">
          <label>Password:</label>
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon"><span class="fa fa-lock fa-fw"></span></div>
          <input class="form-control" name="passwd" placeholder="Enter the Password " type="password"/>
              </div>
          </div>
          <div class="form-group">
              <div class="input-group">
                  <input class="btn btn-success" type="submit" name="submit_pwd" value="Unlock This Page"/>
              </div>
          </div>
      </form>
        </div>
   </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>       

<?php   
}
?>