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
                        registration
                    </span>
                </div>
                <article class="static-page">
                    <h1 id="main-title">Registration your self!</h1>
                    
                    <form method="post" action="<?php echo base_url(); ?>registration_action" id="form-contact" class="clearfix">
                        <div>
                            <label for="text-email">Email <span>*</span></label>
                            <input type="text" name="email" class="input" id="text-email" /><br />
                            <label for="text-password">Password <span>*</span></label>
                            <input id="password" type="password" name="password" class="input" id="text-password" /><br />
                            <label for="text-confirmPassword">Confirm Password <span>*</span></label>
                            <input type="password" name="confirmPassword" class="input" id="text-confirmPassword" /><br />
                            
                            <label for="text-firstName">First Name <span>*</span></label>
                            <input type="text" name="firstName" class="input" id="text-firstName" /><br />
                            <label for="text-lastName">Last Name <span>*</span></label>
                            <input type="text" name="lastName" class="input" id="text-lastName" /><br />
                            <label for="text-phone">Phone <span>*</span></label>
                            <input type="text" name="phone" class="input" id="text-phone" /><br />
                            <label for="text-school">School <span>*</span></label>
                            <input type="text" name="school" class="input" id="text-school" /><br />
                            <label for="text-grade">Grade <span>*</span></label>
                            <input type="text" name="grade" class="input" id="text-grade" /><br />
                            
                            
                            <input type="submit" name="submitcontact" class="button" value="Register" />
                        </div>
                    </form>
                </article>
            </div>
            <div id="sidebar">
                <aside class="widget-container">
                    <div class="widget-wrapper clearfix">
				        <h3 class="widget-title">Quick Navigation</h3>
                        <ul>
                        	<li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url(); ?>about_us">About</a></li>
                            <li><a href="<?php echo base_url(); ?>testimonial">Testimonial</a></li>
                            <li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
                            <li><a href="<?php echo base_url(); ?>samples">Samples</a></li>
                        </ul>
                    </div>
                </aside>
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
				confirmPassword: {
					required:true,
				  equalTo: "#password"
				},
				phone: {
					required: true,
					minlength: 5
				},
				firstName: "required",
				lastName: "required",
				phone: {
					required: true,
					minlength: 8,
					maxlength: 15
				},
				school: "required",
				grade:"required"
			},
			messages: {
				
				email: "Please enter a valid email address.",
				password: "Please enter password.",
				confirmPassword:{
					required: "Please enter alternate password.",
					 equalTo:"Password mismatched."
					 },
				phone: {
					required: "Please provide a phone number",
					minlength: "Phone number must be at least 8 of numbers."
				},
				school: "Enter your school name.",
				grade: "You are in which grade."
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
