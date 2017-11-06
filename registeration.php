<?php
?>
<!DOCTYPE html>
<html lang="en">
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
    <div class="col-md-4 align-self-center" style="margin-left: 2%; margin-right: 2%;">
        <br>
   <div id="message" class="alert alert-dismissable text-center bg-info text-white"> 
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
       <i class="fa fa-spinner fa-pulse fa-1.5x fa-fw"></i> Contacting Server ,sending mail.. please wait
        </div>
    <div class="card">
    <div class="card-header text-white" style="background-color: #57AAC0;">
        <div class="text-center" style="margin-top:;">
        <img src="images/mylogo1.png" height="100px" width="100px">
        </div>
        <b>Not Registered yet? Singup Now!!</b>
        </div>
        <div class="card-block" style="padding: 2%;">
        <form  action="register1.php" method="post"  id="reg_form">
<br/>								<div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user  fa-fw"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Name" name="name" id="name"/>
                                        </div>
									</div>
									<div class="form-group">
										<div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone  fa-fw"  ></i>+91</span>
                                            <input type="text" class="form-control" placeholder=" Your Mobile number 10 digits" maxlength="10" name="phone" id="phone"/>
                                        </div>
									</div>
									<div class="form-group">
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope  fa-fw"  ></i></span>
                                            <input type="email" class="form-control" placeholder="Your Email" name="email" id="email" />
                                        </div>
									</div>
									<div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock  fa-fw"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Enter Password" name="pass" id="password"/>
                                        </div>
									</div>
									<div class="form-group">
										<div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock  fa-fw"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Retype Password" name="cpass" id="cpassword"/>
                                        </div>
                                     </div>
                                    <hr>
                                    <div class="form-group">
                                        <labe><b> YOUR CURRENT MEAL STATUS</b> </labe>
                                            <div class="radio">
                                                <label><input type="radio" value="ON" name="status" checked> <b>ON</b></label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" value="OFF" name="status"> <b>OFF</b></label>
                                            </div>
                                     </div>
                                       <button type="submit" class="btn btn-success "> Register Me</button>
                                    
                                    </form>
        </div>
        <div class="card-footer">
        Already Registered ?  <a href="index" >Login here</a>
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
    $("#reg_form").submit(function(event){
        
    event.preventDefault(); 
        if($('#name').val().length<=4)
            {
                $('html, body').animate({ scrollTop: 0 }, 'fast');
            $('#message').fadeIn("slow");
                 $('#message').removeClass("bg-info");
              $('#message').addClass("bg-danger"); 
            $('#message').html(" Please supply with a valid  name");
                $('#name').addClass("is-invalid");
                $('#message').fadeOut(2000);
            }
                else if($('#phone').val().length!=10)
                    {
                          $('html, body').animate({ scrollTop: 0 }, 'fast');
                       $('#message').fadeIn("slow");
                         $('#message').removeClass("bg-info");
                         $('#message').addClass("bg-danger"); 
                        $('#message').html(" Please supply with a valid  Phone number");   
                            $('#phone').addClass("is-invalid");
                        $('#message').fadeOut(3000); 
                    }
                else if($('#email').val()=="")
                   {
                       $('html, body').animate({ scrollTop: 0 }, 'fast');
                    $('#message').fadeIn("slow");
                        $('#message').removeClass("bg-info");
                    $('#message').addClass("bg-danger"); 
                    $('#message').addClass("bg-danger"); 
                    $('#message').html(" Please supply with a valid  email");   
                        $('#email').addClass("is-invalid");
                    $('#message').fadeOut(2000);
                   }
        else if($('#password').val().length<=5)
            {
                $('html, body').animate({ scrollTop: 0 }, 'fast');
                $('#message').fadeIn("slow");
                 $('#message').removeClass("bg-info");
                $('#message').addClass("bg-danger"); 
                    $('#message').html(" Please supply with a valid password atleast 6 chars");   
                        $('#password').addClass("is-invalid");
                    $('#message').fadeOut(2000);
            }
        else if($('#password').val()!=$('#cpassword').val())
               {
                   $('html, body').animate({ scrollTop: 0 }, 'fast');
                $('#message').fadeIn("slow");
                    $('#message').removeClass("bg-info");
                    $('#message').addClass("bg-danger"); 
                    $('#message').html(" Both the passwords did'nt match.!");   
                    $('#cpassword').addClass("is-invalid");
            $('#message').fadeOut(2000);
            } 
        else{//prevent default action
          $('html, body').animate({ scrollTop: 0 }, 'fast');
        $('#message').fadeIn("slow");
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
        alert(c);
         
            
          if(c=="75")
            {
        $('html, body').animate({ scrollTop: 0 }, 'fast');
        $('#message').fadeIn("slow");
        $('#message').removeClass("bg-info");
        $('#message').addClass("bg-success");
        $('#message').html("<i class='fa fa-check-circle-o fa-2x' aria-hidden='true'></i>A Verification link has been sent to.."+$('#email').val()+"..Click on the link to Verify your email");
            }
            else
               {
        $('html, body').animate({ scrollTop: 0 }, 'fast');
        $('#message').fadeIn("slow");
        $('#message').removeClass("bg-info");
        $('#message').addClass("bg-danger");    
        $('#message').html("<i class='fa fa-times fa-fw fa-2x' aria-hidden='true'></i>&nbsp;&nbsp;"+c);
            }
       
    });
        }
});
          function clearInput() {
	$("#reg_form :input").each( function() {
	   $(this).val('');
	});
          }
</script>
</body>

</html>