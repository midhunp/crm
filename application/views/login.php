<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>CRM Demo| Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>public/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>public/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url(); ?>public/libs/html5shiv/html5shiv.js"></script>
          <script src="<?php echo base_url(); ?>public/libs/respond/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Log In</div>
            <form id="jq_loginForm">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <input type="submit" class="btn bg-olive btn-block" value="Login"/>  
                    
                    <div class="alert alert-danger" style="display:none;">
                        <i class="fa fa-ban"></i>
                        <b>Failed!</b> Invalid username or password.
                    </div>
                    <!--<p><a href="#">I forgot my password</a></p>
                    
                    <a href="register.html" class="text-center">Register a new membership</a>-->
                </div>
            </form>
        </div>

        <script src="<?php echo base_url(); ?>public/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		
        <!-- Custom --> 
		<script src="<?php echo base_url(); ?>public/libs/template/prerequisite.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/libs/template/utility.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/libs/template/shell_login.js" type="text/javascript"></script>
    </body>
</html>