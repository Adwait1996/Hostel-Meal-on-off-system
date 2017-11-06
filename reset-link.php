<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Secure Password Reset</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!--JQUERY-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    
    <style>
		#success_message{ display: none;}
		</style>
</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Forgot Password : Reset</h2>
               
                <h5>( Reset your forgotten Password )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Enter your Registered Email </strong> 
                            </div>
                            <div class="panel-body">
                                <form role="form" id="reset_pass" action="send-reset-link.php" method="POST">
                                       <br />
                                     
                                            <div class="form-group">
                                                <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope fa-fw"  ></i></span>
                                            <input type="email" class="form-control"  placeholder="Your Registered E-mail " name="email" id="uemail" />
                                        </div>
                                                </div>
							          <div role="alert" id="success_message"><span class="fa fa-spin fa-circle-o-notch fa-fw"></span> processing...</div>
                                     <button type="submit" class="btn btn-success ">Send Me Verification Link&nbsp;<span class="fa fa-paper-plane"></span></button>
									 
                                    <hr />
                                    Not register ? <a href="registeration.php" >click here </a> 
                                    </form>
                            </div>
                        </div>
                    </div>
                
                
        </div>
    </div>
	<script type="text/javascript">
	
	$(document).ready(function() {
    $('#reset_pass').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },
			password: {
            validators: {
				stringLength: {
                        min: 4,
                    },
                        notEmpty: {
                        message: 'Enter Your Password'
                    }
			}
			}
		}		
		})
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#reset_pass').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post( $("#reset_pass").attr("action"),
	        $("#reset_pass :input").serializeArray(),
			function(data) {
                c= data;
                if(c.indexOf("successfull") >-1)
                window.location.replace("homepage.php");
                else
			    $("div#success_message").html(c);
			});
 
	$("#reset_pass").submit( function() {
	   return false;	
	});
        });
});
	</script>
   
</body>
</html>
