<?php
$isMailSentB = $this->session->userdata('isMailSent');
if($isMailSentB){ 
?>
<div class="success-message">
	<span>We will get back to you soon!</span>
</div>
<?php 
	$this->session->unset_userdata('isMailSent');
} 
?>


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
                    <h1 id="main-title">Submit your Assingment!</h1>
                    
                    <form method="post" action="<?php echo base_url(); ?>email/submitAssignment" id="form-contact" class="clearfix" enctype="multipart/form-data">
                        <div>
                            <label for="text-subject">Subject <span>*</span></label>
                            <input type="text" name="subject" class="input" id="text-subject" /><br />
                            <label for="text-description">Description <span>*</span></label>
                            <textarea cols="10" rows="20" class="input textarea" id="text-description" name="description"></textarea><br />
                            <label for="text-attachment">Attachment <span>*</span></label>
                            <input type="file" name="attachment" class="input" id="text-attachment" /><br />
                            
                            <input type="submit" name="submitcontact" class="button" value="Submit" />
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
				subject: "required",
				description: "required",
				attachment: "required"
			},
			messages: {
				subject: "Enter a subject.",
				description: "Don't leave description blank.",
				attachment: "Please attach your assignment doc file.",
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
