	<div id="content-container">
        <div id="content" class="clearfix">
            <div id="main-content">
                <div id="breadcrumbs" class="clearfix">
                    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="index.html" itemprop="url" class="icon-home">
                            <span itemprop="title">Home</span>
                        </a> <span class="arrow">&gt;</span>
                    </div>  
                    <span class="last-breadcrumbs">
                        login
                    </span>
                </div>
                <article class="static-page">
                    <h1 id="main-title">Login</h1>
                    
                    <form method="post" action="<?php echo base_url(); ?>login_action" id="form-contact" class="clearfix">
                        <div>
                            <label for="text-email">Email <span>*</span></label>
                            <input type="text" name="email" class="input" id="text-email" /><br />
                            <label for="text-password">Password <span>*</span></label>
                            <input type="password" name="password" class="input" id="text-password" /><br />
                            
                            <input type="submit" name="submitcontact" class="button" value="Login" />
                        </div>
                    </form>
                </article>
            </div>
    	</div>
    </div>
    <script type="text/javascript">
    function validateForm(){
		
		 $("#form-contact").validate({
			
			rules: {
				email: {
					required: true,
					email: true
				},
				password: "required",
				
			},
			messages: {
				email: "Please enter a valid email address",
				message: "Please enter your password"
			},
			submitHandler: function(form) {
				form.submit();
			}
		});
	}
	$(document).ready(function(e) {
        validateForm();
    });
    </script>
