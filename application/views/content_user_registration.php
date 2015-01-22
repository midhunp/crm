<!-- content -->
<section id="content">
  <div class="main">
    <div class="wrapper">
      <article class="col-3 col-indent maxheight" >
        <div class="box bg1 maxheight" >
          <h3>New User</h3>
          <section id="registration_form">
          	<?php echo validation_errors();?>
            <?php 
				$baseurl = base_url();
				echo form_open($baseurl.'users/register');
				$name = array(
					'name' 	=> 'name',
					'value' => set_value('username'),
					'class' => 'input'
				
				);
				$username = array(
					'name' 	=> 'username',
					'value' => set_value('username'),
					'class' => 'input'
				
				);
				$password = array(
					'name' 	=> 'password',
					'value' => set_value('password'),
					'class' => 'input'
				
				);
				$confirmPassword = array(
					'name' 	=> 'confirm_password',
					'value' => set_value('confirmPassword'),
					'class' => 'input'
				
				);
				$email = array(
					'name' 	=> 'email',
					'value' => set_value('email'),
					'class' => 'input'
				
				);
				$submit = array(
					'name' 	=> 'register',
					'class' => 'link'
				
				);
			
			?>
            <div class="row">
                <label>User Name</label>
                 <?php echo form_input($name);?>
            </div>
            <div class="row">
                <label>User Name</label>
           		<?php echo form_input($username);?>
            </div>
            <div class="row">
                <label>User Name</label>
            	<?php echo form_password($password);?>
            </div>
            <div class="row">
                <label>User Name</label>
            	<?php echo form_password($confirmPassword);?>
            </div>
            <div class="row">
                <label>User Name</label>
           		<?php echo form_input($email);?>
            </div>
            <div class="row">
                <label></label>
           		<?php echo form_submit($submit,'Register'); ?>
            </div>
            
            
            <!--<form action="" method="post">
                <div class="row">
                    <label>User Name</label>
                    <input class="input" type="text" name="username"/>
                </div>
                <div class="row">
                    <label>Password</label>
                    <input class="input" type="password" name="password"/>
                </div>
                <div class="row">
                    <label>Confirm Password</label>
                    <input class="input" type="password" name="confirmPassword"/>
                </div>
                <div class="row">
                    <label>E-mail</label>
                    <input class="input" type="text" name="email"/>
                </div>
                <div class="row">
                    <label></label>
                    <input class="input" type="button" />
                </div>
             </form>-->
          </section>
        </div>
      </article>
    </div>
  </div>
</section>
