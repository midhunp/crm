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
                        Contact Link2Zenith
                    </span>
                </div>
                <article class="static-page">
                    <h1 id="main-title">Contact Link2Zenith</h1>
                    <div >
                        <p><strong>Janakpuri</strong> Delhi, India<br />
                        Phone: +91 9013809371 , +91 9717180818<br />
                        Email: info@link2zenith.com</p>
                        <div class="separator"></div>
                        
                    </div>
                    
                    <h2>Contact Form</h2>
                    <form method="post" action="<?php echo base_url(); ?>email/contact" id="form-contact" class="clearfix">
                        <div>
                            <label for="text-name">Name <span>*</span></label>
                            <input type="text" name="name" class="input" id="text-name" /><br />
                            <label for="text-email">Email</label>
                            <input type="text" name="email" class="input" id="text-email" /><br />
                            <label for="text-phone">Phone</label>
                            <input type="text" name="phone" class="input" id="text-phone" /><br />
                            <label for="text-subject">Subject</label>
                            <input type="text" name="subject" class="input" id="text-subject" /><br />
                            <label for="text-comment">Message <span>*</span></label>
                            <textarea cols="10" rows="20" class="input textarea" id="text-comment" name="message"></textarea><br />
                            <input type="submit" name="submitcontact" class="button" value="Sent Message" />
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
				name: "required",
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true,
					minlength: 5
				},
				subject: "required",
				message: "required"
			},
			messages: {
				name: "Please enter your name",
				email: "Please enter a valid email address",
				phone: {
					required: "Please provide a phone number",
					minlength: "Phone number must be at least 5 characters long"
				},
				subject: "Please enter a subject for Message",
				message: "Please enter message"
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
