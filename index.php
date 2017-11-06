<?php
session_start();
if(isset($_SESSION['email']))
    header('location:homepage.php');
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
    #message
        {
            display: none;
        }
    </style>
</head>
<body style="background-color: #E1DCDB;">
    <div class="row justify-content-center">
    <div class="col-md-4 align-self-center" style="margin-left: 5%; margin-right: 5%;">
        <br>
   <div id="message" class="alert alert-dismissable text-center bg-danger text-white"> 
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>    
        </div>
    <div class="card">
    <div class="card-header text-white" style="background-color: #57AAC0;">
        <div class="text-center" style="margin-top:;">
        <img src="images/mylogo1.png" height="100px" width="100px">
        </div>
        <b>Login to get Access</b>
        </div>
        <div class="card-block" style="padding: 2%;">
        <form role="form" name="f1" action="checklogin.php" method="POST" id="login_form">
                                       <br />
									<div class="form-group ">
                                     <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope fa-fw"  ></i></span>
                                            <input type="email" class="form-control" placeholder="Your Registered E-mail " name="email" id="email" />
                                     </div>
									</div>
									<div class="form-group ">
                                     <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock fa-fw"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your Password" name="password" id="password"/>
                                     </div>
									</div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="remember" /> Remember me
                                            </label>
                                            <span class="pull-right">
                                                   <a href="reset-link" >Forget password ? </a> 
                                            </span>
                                        </div>
                                    <button type="submit" class="btn btn-success"> Login here</button>
                                    <hr />
                                    Not register ? <a href="registeration" >click here </a> 
                                    </form>
        </div>
    <br>
                 <div class="card-footer" style="padding: 0;">
    <ul class="list-group">
    <li class="list-group-item" > <a href="viewall"> View All Border's Calender</a></li>  
        <li class="list-group-item" > <a href="viewallguest"> View All Guests Calender</a></li>  
        <li class="list-group-item"> <a href="managerview"> View Todays Calender</a></li>  
        <li class="list-group-item "> <a href="Restricted/admin_user_control"> <b>Restricted Admin Page</b> </a></li> 
    </ul>
    </div>
    </div>
</div>
    </div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
<script>
    $("#login_form").submit(function(event){
        
    event.preventDefault(); 
        if($('#email').val()=="" || $('#password').val()=="" )
            {
                 $('html, body').animate({ scrollTop: 0 }, 'fast');
            $('#message').fadeIn("slow");
            $('#message').html(" Please supply with user name and password");
                $('#email').addClass("is-invalid");
                $('#password').addClass("is-invalid");
            $('#message').fadeOut(3000);
            }
        else{//prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
    
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data
    }).done(function(response){
       //
        c=response.trim();
        if(c.trim()=="successfull")
                window.location.replace("homepage.php");
                else
                    {
         $('html, body').animate({ scrollTop: 0 }, 'fast');
        $('#message').fadeIn("slow");
        $('#message').html("checking....");
        $("#message").html(response);
                        $('#message').fadeOut(3000);
                    }
        clearInput();
    });
        }
});
          function clearInput() {
	$("#login_form :input").each( function() {
	   $(this).val('');
	});
          }
</script>
</body>