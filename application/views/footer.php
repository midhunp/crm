		<!-- add new calendar event modal -->


        <script src="<?php echo base_url(); ?>public/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/libs/jquery/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
       <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/plugins/morris/morris.min.js" type="text/javascript"></script>-->
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>public/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url(); ?>public/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url(); ?>public/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url(); ?>public/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url(); ?>public/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
       <!-- <script src="<?php echo base_url(); ?>public/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script> **Commenting as it is clashing with handlebarjs-->
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>public/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
		<!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>public/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>public/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--<script src="<?php echo base_url(); ?>public/js/AdminLTE/dashboard.js" type="text/javascript"></script>-->
			
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>public/js/AdminLTE/demo.js" type="text/javascript"></script>
		
        
        
        
        <!--template view-->
        <script type="text/x-handlebars-template" id="base-template">
			<!-- header logo: style can be found in header.less -->
        	<header id="jq_header" class="header">
        	</header>
        	<div class="wrapper row-offcanvas row-offcanvas-left">
        		<!-- Left side column. contains the logo and sidebar -->
            	<aside class="left-side sidebar-offcanvas"></aside>                
            	

				<!-- Right side column. Contains the navbar and content of the page -->
				<aside class="right-side">                
					<!-- Content Header (Page header) -->
					<section class="content-header">
						<h1>
							<span class="jq_pageMainHeading">Blank page</span>
							<small class="jq_pageSubHeading">Control panel</small>
						</h1>
						<ol class="breadcrumb">
							<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
							<li class="active jq_pageMainHeading">Blank page</li>
						</ol>
					</section>
	
					<!-- Main content -->
					<section id="jq_content" class="content">
	
	
					</section><!-- /.content -->
				</aside><!-- /.right-side -->
			</div><!-- ./wrapper -->
			<div class="row" id="jq_alertBoxHolder" > </div>
			<!--
			<div id="jq_ConfirmBoxHolder">
				<div class="box box-solid box-warning">
					<div class="box-header">
						<h3 class="box-title">Warning Solid Box</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-warning btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body" style="display: block;">
						<p>
							Do you want to change status?
						</p>
						<p>
							<button class="btn btn-success">OK</button> <button class="btn btn-danger">CANCEL</button>
						</p>
					</div>
				</div>
			</div>
			-->
        </script>
		<script type="text/x-handlebars-template" id="header-template">
        	<a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                CRM DEMO
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-mail-reply"></i>
                                <span class="label label-danger jq_placeholderOpenJobs">0</span>
                            </a>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-mail-reply-all"></i>
                                <span class="label label-warning jq_placeholderReopenJobs">0</span>
                            </a>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-retweet"></i>
                                <span class="label label-warning jq_placeholderPendingJobs">0</span>
                            </a>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-check-circle-o"></i>
                                <span class="label label-success jq_placeholderClosedJobs">0</span>
                            </a>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{firstName}} {{lastName}} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url(); ?>public/img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        {{firstName}} {{lastName}} - Employee
                                        <small>Member since MM. YYYY</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!--
								<li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
								-->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <!--<div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>-->
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat" id="jq_logOutBtn">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </script>
        <script type="text/x-handlebars-template" id="manageUser-template">
			<div class="row">
				<div class="col-md-12">    
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Manage User</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="jq_manageUserTable" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th style="width:100px">USER ID</th>
										<th>NAME</th>
										<th>EMAIL</th>
										<th>Phone</th>
										<th>ROLE</th>
										<th>STATUS</th>
										<th>ACTION</th>
										
									</tr>
								</thead>
								<tbody>									
								</tbody>
								<tfoot>
								</tfoot>
							</table>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
			</div>        
        </script>
        <script type="text/x-handlebars-template" id="manageUserList-template">
			<tr>
				<td>{{userId}}</td>
				<td>{{firstName}} {{lastName}}</td>
				<td>{{email}}</td>
				<td>{{phone}}</td>
				<td>{{getValue 'role' role_id}}</td>
				<td>Active</td>
				
				<td data-id="{{userId}}" style="width:85px">
					<a class="btn btn-sm jq_edit"><i class="fa fa-edit"></i></a>
					<a class="btn btn-sm jq_activeBtn"><i class="fa fa-chain {{#equal active 2}}fa-chain-broken{{/equal}}"></i></a>
				</td>
			</tr>
        </script>
        
        <!--add user-->
		<script type="text/x-handlebars-template" id="addUser-template">
        	<div class="row">
				<!-- left column -->
				<div class="col-md-6" >
					<!-- alert box holder -->
					<div class="row" id="jq_alertBoxHolder">
					</div>
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Add User</h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="jq_addUserForm">
							<div class="box-body">
								<div class="form-group">
									<label for="jq_fieldFirstName">First Name</label>
									<input type="text" id="jq_fieldFirstName" class="form-control"  name="firstName" placeholder="First Name">
								</div>
								<div class="form-group">
									<label for="jq_fieldLastName">Last Name</label>
									<input type="text" id="jq_fieldLastName" class="form-control"  name="lastName" placeholder="Last Name">
								</div>
								<div class="form-group">
									<label for="jq_fieldEmail">E-Mail</label>
									<input type="email" id="jq_fieldEmail" class="form-control" name="email" placeholder="E-Mail">
								</div>
								<div class="form-group">
									<label for="jq_fieldPhone">Phone</label>
									<input type="text" id="jq_fieldPhone" class="form-control" name="phone" placeholder="Phone">
								</div>
								<div class="form-group">
									<label for="jq_fieldPassword">Password</label>
									<input type="password" id="jq_fieldPassword" class="form-control" name="password" placeholder="Password">
								</div>
								<div class="form-group">
									<label for="jq_fieldRole">Role</label>
									<select  class="form-control" id="jq_fieldRole" name="role_id">
										<option value="0">select</option>
											{{#list "getRole" 0}}
											{{/list}}
									</select>
								</div>
								<div class="form-group">
									<label for="jq_fieldActive">Active</label>
									<select class="form-control" id="jq_fieldActive" name="active">
											{{#activeList 0}}
											{{/activeList}}
									</select>
								</div>
							</div><!-- /.box-body -->

							<div class="box-footer">
								<input type="submit" id="jq_addUserBtn" class="btn btn-primary" value="Add User"/>
								
							</div>
						</form>
					</div><!-- /.box -->
					
				</div><!--/.col (left) -->

			</div>
        
        </script>
		<!--edit user-->
		<script type="text/x-handlebars-template" id="editUser-template">
        	<div class="row">
				<!-- left column -->
				<div class="col-md-6" >
					<!-- alert box holder -->
					<div class="row" id="jq_alertBoxHolder">
					</div>
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Edit User</h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="jq_updateUserForm">
							<div class="box-body">
								<div class="form-group">
									<label for="jq_fieldFirstName">USER ID</label>
									<input type="text" id="jq_fieldUserId" class="form-control"  name="userId" placeholder="First Name" value="{{userId}}">
								</div>
								<div class="form-group">
									<label for="jq_fieldFirstName">First Name</label>
									<input type="text" id="jq_fieldFirstName" class="form-control"  name="firstName" placeholder="First Name" value="{{firstName}}">
								</div>
								<div class="form-group">
									<label for="jq_fieldLastName">Last Name</label>
									<input type="text" id="jq_fieldLastName" class="form-control"  name="lastName" placeholder="Last Name" value="{{lastName}}">
								</div>
								<div class="form-group">
									<label for="jq_fieldEmail">E-Mail</label>
									<input type="email" id="jq_fieldEmail" class="form-control" name="email" placeholder="E-Mail" value="{{email}}">
								</div>
								<div class="form-group">
									<label for="jq_fieldPhone">Phone</label>
									<input type="text" id="jq_fieldPhone" class="form-control" name="phone" placeholder="Phone" value="{{phone}}">
								</div>
								<div class="form-group">
									<label for="jq_fieldPassword">Password</label>
									<input type="password" id="jq_fieldPassword" class="form-control" name="password" placeholder="Password" value="{{password}}">
								</div>
								<div class="form-group">
									<label for="jq_fieldRole">Role</label>
									<select  class="form-control" id="jq_fieldRole" name="role_id">
										<option value="0">select</option>
										{{#list "getRole" role_id}}
										{{/list}}
									</select>
								</div>
								<div class="form-group">
									<label for="jq_fieldActive">Role</label>
									<select class="form-control" id="jq_fieldActive" name="active">
										{{#activeList active}}
											{{/activeList}}
									</select>
								</div>
							</div><!-- /.box-body -->

							<div class="box-footer">
								<input type="submit" id="jq_updateUserBtn" class="btn btn-primary" value="Update User"/>
								
							</div>
						</form>
					</div><!-- /.box -->
					
				</div><!--/.col (left) -->

			</div>
        
        </script>
		<!--sidebar-->
		<script type="text/x-handlebars-template" id="sidebar-template">
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url(); ?>public/img/avatar3.png" class="img-circle" alt="User Image" />
					</div>
					<div class="pull-left info">
						<p>Hello, {{firstName}}</p>
	
						<a href="#"><i class="fa fa-circle text-success"></i> {{getValue 'status' status_id}}</a>
					</div>
				</div>
				<!-- search form -->
				<div class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search..."/>
						<span class="input-group-btn">
							<button  name='seach' id='jq_searchBtn' class="btn btn-flat"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</div>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="active">
						<a href="#dashboard">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
						</a>
					</li>
					{{#equal role_id 1}}
						<li class="treeview" id="jq_userLinks">
							<a href="#">
								<i class="fa fa-users"></i>
								<span>Users</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="#user/add" class="jq_link" ><i class="fa fa-angle-double-right"></i> Add</a></li>
								<li><a href="#user/manage" class="jq_link" ><i class="fa fa-angle-double-right"></i> Manage</a></li>
							</ul>
						</li>
						<li class="treeview" id="jq_userLinks">
							<a href="#">
								<i class="fa fa-bullhorn"></i>
								<span>Announcement</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="#announcement/add" class="jq_link" ><i class="fa fa-angle-double-right"></i> Add</a></li>
								<li><a href="#announcement/manage" class="jq_link" ><i class="fa fa-angle-double-right"></i> remove</a></li>
							</ul>
						</li>
						<li class="treeview" id="jq_userLinks">
							<a href="#">
								<i class="fa fa-file-text"></i>
								<span>Reports</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="#reports/callsBWDates" class="jq_link" ><i class="fa fa-angle-double-right"></i> Calls b/w Dates</a></li>
							</ul>
						</li>
						<li class="treeview" id="jq_userLinks">
							<a href="#">
								<i class="fa fa-clipboard"></i>
								<span>Import</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="#import/client" class="jq_link" ><i class="fa fa-angle-double-right"></i> Client</a></li>
							</ul>
						</li>
					{{/equal}}
					<li class="treeview">
						<a href="#">
							<i class="fa fa-file"></i>
							<span>Job</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="#search" class="jq_link" id="link_2_1"><i class="fa fa-angle-double-right"></i> Search</a></li>
							<li><a href="#client/new" class="jq_link" id="link_2_2"><i class="fa fa-angle-double-right"></i> Add</a></li>
						</ul>
					</li>
				</ul>
			</section>
        </script>
        
        <!--alert box-->
		<script type="text/x-handlebars-template" id="alertBox-template">
			<div class="col-lg-12">		
				<div class="alert alert-<%=type%> alert-dismissable">
					<i class="fa fa-check"></i>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<b><%=title%></b> <%=message%>
				</div>
			</div>
        </script>
        
        <!--call Out-->
		<script type="text/x-handlebars-template" id="callOut-template">
			<div class="col-md-6">
				<div class="box box-info">
					<div class="box-header">
						<i class="fa fa-bullhorn"></i>
						<h3 class="box-title">Message</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="callout callout-<%=type%>">
							<h4><%=title%></h4>
							<p><%=message%></p>
						</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div><!-- /.col -->
        </script>
        
        <!--Complaint search box-->
		<script type="text/x-handlebars-template" id="complaintSearchBox-template">
			<div class="box box-primary">
				<div class="box-header">
					<h4 class="box-title">Search</h4>
				</div>	
				
				<div class=" box-body row" id="jq_searchBox">
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="radio" name="searchSelection" value="jobId">
							</span>
							<input type="text" class="form-control" placeholder="Complaint Number">
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="radio"  name="searchSelection" value="email">
							</span>
							<input type="text" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="radio"  name="searchSelection" value="phone">
							</span>
							<input type="text" class="form-control" placeholder="Phone">
						</div>
					</div>
					<div class="col-md-3">
						<button id="jq_complaintSearchBtn" class="btn btn-primary btn-flat">Search</button>							
						<a href="#client/new" class="btn btn-success btn-flat">New</a>
					</div>
				</div>
        	</div>
			
			<div class="row" id="jq_alertBoxHolder">
			</div>
			
			
        </script>
        
        <!--Complaint search result-->
		<script type="text/x-handlebars-template" id="complaintSearchResult-template">
			<div class="box hidden" id="jq_searchResult">
				<div class="box-header">
					<h3 class="box-title">Search result</h3>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive">
					<table id="jq_complaintSearchResultTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Job Number</th>
								<th>Date</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Issue</th>
								<th>Status</th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>
							<!--content-->
						</tbody>
						<tfoot>
							<tr>
								<th>Job Number</th>
								<th>Date</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Issue</th>
								<th>Status</th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
        </script>
        <!--Complaint search result list-->
		<script type="text/x-handlebars-template" id="complaintSearchResultList-template">
			<tr>	
				<td>{{jobId}}</td>
				<td>{{getTimeStamp createdDate 'dd-mm-yy'}}</td>
				<td>{{firstName}} {{lastName}}</td>
				<td>{{phone}}</td>
				<td>{{getValue 'issueType' issueTypeId}}</td>
				<td>{{getValue 'jobStatus' jobStatusId}}</td>
				<td data-id="{{jobId}}">
					<a href="#job/{{jobId}}" class="btn btn-sm jq_view"><i class="fa fa-eye"></i></a>
					<a href="#job/new/{{{clientId}}}"class="btn btn-sm jq_new"><i class="fa fa-plus"></i></a>
				</td>
			</tr>
        </script>
        <!--Add Client-->
		<script type="text/x-handlebars-template" id="addClient-template">
        	<div class="row">
				<!-- left column -->
				<div class="col-md-6" >
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Add Client</h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="jq_addClientForm">
							<div class="box-body">
								<div class="form-group">
									<label for="jq_fieldFirstName">First Name</label>
									<input type="text" id="jq_fieldFirstName" class="form-control"  name="firstName" placeholder="First Name">
								</div>
								<div class="form-group">
									<label for="jq_fieldLastName">Last Name</label>
									<input type="text" id="jq_fieldLastName" class="form-control"  name="lastName" placeholder="Last Name">
								</div>
								<div class="form-group">
									<label for="jq_fieldEmail">E-Mail</label>
									<input type="email" id="jq_fieldEmail" class="form-control" name="email" placeholder="E-Mail">
								</div>
								<div class="form-group">
									<label for="jq_fieldPhone">Phone</label>
									<input type="text" id="jq_fieldPhone" class="form-control" name="phone" placeholder="Phone">
								</div>
								<div class="form-group">
									<label for="jq_fieldTollFreeID">Toll Free Number </label>
									<select  class="form-control" id="jq_fieldTollFreeID" name="tollFreeId">
										<option value="0">select</option>
										{{#list "getTollFree" 0}}
										{{/list}}
									</select>
								</div>
								<div class="form-group">
									<label for="jq_fieldComputerBrandID">Computer Brand</label>
									<select  class="form-control" id="jq_fieldComputerBrandID" name="computerBrandId">
										<option value="0">select</option>
										{{#list "getComputerBrand" computerBrandId}}
										{{/list}}
									</select>
								</div>
								<div class="form-group">
									<label for="jq_fieldComputerCountAtHome">No of Computers at Home</label>
									<input type="number" id="jq_fieldComputerCountAtHome" class="form-control" name="computerCountAtHome" placeholder="Computers at Home">
								</div>
								<div class="form-group">
									<label for="jq_fieldComputerCountSubscribed">No of Computers Subscribed</label>
									<input type="number" id="jq_fieldComputerCountSubscribed" class="form-control" name="computerCountSubscribed" placeholder="Computers Subscribed">
								</div>
								<div class="form-group">
									<label for="jq_fieldOperatingSystemID">Operating System</label>
									<select  class="form-control" id="jq_fieldOperatingSystemID" name="operatingSystemId">
										<option value="0">select</option>
										{{#list "getOperatingSystem" operatingSystemId}}
										{{/list}}
									</select>
								</div>
								<div class="form-group">
									<label for="jq_fieldAntivirusBrandID">Antivirus Brand</label>
									<select  class="form-control" id="jq_fieldAntivirusBrandID" name="antivirusBrandId">
										<option value="0">select</option>
										{{#list "getAntivirusBrand" antivirusBrandId}}
										{{/list}}
									</select>
								</div>
								<div class="form-group ">
									<label for="jq_fieldAntivirusExpDate">Antivirus Expiration Date</label>
									<input type="text" id="jq_fieldAntivirusExpDate" class="form-control jq_datePicker" name="antivirusExpDate" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" data="{{antivirusExpDate}}">
								</div>
								<div class="form-group">
									<label for="jq_fieldIssueTypeID">Issue Type</label>
									<select  class="form-control" id="jq_fieldIssueTypeID" name="issueTypeId">
										<option value="0">select</option>
										{{#list "getIssueType" 0}}
										{{/list}}
									</select>
								</div>
								<div class="form-group hidden">
									<label for="jq_fieldOtherIssue">Other Issue</label>
									<input type="text" id="jq_fieldOtherIssue" class="form-control" name="otherIssue" placeholder="Other Issue">
								</div>
								<div class="form-group">
									<label for="jq_fieldDispositionID">Disposition</label>
									<select  class="form-control" id="jq_fieldDispositionID" name="dispositionId">
										<option value="0">select</option>
										{{#list "getDisposition" 0}}
										{{/list}}
									</select>
								</div>
							</div><!-- /.box-body -->

							<div class="box-footer">
								<input type="submit" id="jq_addClientBtn" class="btn btn-primary" value="Add Client"/>
								
							</div>
						</form>
					</div><!-- /.box -->
					
				</div><!--/.col (left) -->

			</div>
        
        </script>
        <!--Add Job-->
		<script type="text/x-handlebars-template" id="addJob-template">
        	<div class="row">
				<!-- left column -->
				<div class="col-md-6" >
					<!-- alert box holder -->
					<div class="row" id="jq_alertBoxHolder">
					</div>
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Add Job</h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="jq_addJobForm">
							<div class="box-body">
								<div class="form-group">
									<label for="jq_fieldClientID">Client ID</label>
									<input type="text" id="jq_fieldClientID" class="form-control"  name="clientId" placeholder="Client ID" value="{{clientId}}" disabled>
								</div>
								<div class="form-group">
									<label for="jq_fieldTechnicianID">Technician ID</label>
									<select  class="form-control" id="jq_fieldTechnicianID" name="technicianId">
										<option value="0">select</option>
										{{#list "getTechnician" technicianId}}
										{{/list}}
									</select>
									
								</div>
								<div class="form-group">
									<label for="jq_fieldIssueTypeID">Issue Type ID</label>
									<select  class="form-control" id="jq_fieldIssueTypeId" name="issueTypeId">
										<option value="0">select</option>
										{{#list "getIssueType" issueTypeId}}
										{{/list}}
									</select>
								</div>
								<div class="form-group hidden">
									<label for="jq_fieldOtherIssue">Other Issue</label>
									<input type="text" id="jq_fieldOtherIssue" class="form-control" name="otherIssue" placeholder="Other Issue" value="{{otherIssue}}">
								</div>
								<div class="form-group">
									<label for="jq_fieldComment">Comment</label>
									<textarea class="form-control" id="jq_fieldComment" rows="3" name="comment" placeholder="Enter ..."></textarea>
								</div>
								
							</div><!-- /.box-body -->
							<div class="box-footer">
								<input type="submit" id="jq_addJobBtn" class="btn btn-primary" value="Add Job"/>
							</div>
						</form>
					</div><!-- /.box -->
					
				</div><!--/.col (left) -->

			</div>
        
        </script>
		<script type="text/x-handlebars-template" id="jobDetailsView-template">
        	<!-- title row -->
			<div class="row">
				<div class="col-xs-12">
					<h2 class="page-header">
						<i class="fa fa-globe"></i> JOB-{{jobId}}
						<small class="pull-right">{{getTimeStamp jobCreatedDate 'dd-mm-yy'}}</small>
					</h2>
				</div><!-- /.col -->
			</div>
			<!-- info row -->
			<div class="row invoice-info">
				<div class="col-sm-4">
					<table class="table unbordered">
						<tbody>
							<tr>
								<td>
									<strong>Client ID</strong>
								</td>
								<td>{{clientId}}</td>
							</tr>
							<tr>
								<td>
									<strong>Client Name</strong>
								</td>
								<td>{{clientFirstName}} {{clientLastName}}</td>
							</tr>
							<tr>
								<td>
									<strong>Email</strong>
								</td>
								<td>{{clientEmail}}</td>
							</tr>
							<tr>
								<td>
									<strong>Phone</strong>
								</td>
								<td>{{clientPhone}}</td>
							</tr>
							<tr>
								<td>
									<strong>Dialed Toll Free</strong>
								</td>
								<td>{{getValue 'tollFree' tollFreeId}}</td>
							</tr>
						</tbody>
					</table>
				</div><!-- /.col -->
				<div class="col-sm-4">
					<table class="table unbordered">
						<tbody>
							<tr>
								<td>
									<strong>Job Status</strong>
								</td>
								<td>{{getValue 'jobStatus' jobStatusId}}</td>
							</tr>
							{{#notEqual jobComment ""}}
								<tr>
									<td>
										<strong>Comment</strong>
									</td>
									<td>{{jobComment}}</td>
								</tr>
							{{/notEqual}}
							<tr>
								<td>
									<strong>Disposition</strong>
								</td>
								<td>{{getValue 'disposition' dispositionId}}</td>
							</tr>
							<tr>
								<td>
									<strong>Issue Type</strong>
								</td>
								<td>{{getValue 'issueType' issueTypeId}}</td>
							</tr>
							{{#equal otherIssue "2"}}
							<tr>
								<td>
									<strong>Other Issue</strong>
								</td>
								<td>{{otherIssue}}</td>
							</tr>
							{{/equal}}
							<tr>
								<td>
									<strong>User ID</strong>
								</td>
								<td>{{getValue 'technician' userId}}</td>
							</tr>
							<tr>
								<td>
									<strong>Technician ID</strong>
								</td>
								<td>{{getValue 'technician' technicianId}}</td>
							</tr>
						</tbody>
					</table>
				</div><!-- /.col -->
				<div class="col-sm-4">
					<table class="table unbordered">
						<tbody>
							
							{{#notEqual planId "undefined"}}
								<tr>
									<td>
										<strong>Plan ID</strong>
									</td>
									<td>{{planId}}</td>
								</tr>
								<tr>
									<td>
										<strong>Plan Name</strong>
									</td>
									<td>{{getValue 'plans' plansId}}</td>
								</tr>
								<tr>
									<td>
										<strong>Plan Start Date</strong>
									</td>
									<td>{{getTimeStamp planStartDate 'dd-mm-yy'}}</td>
								</tr>
								<tr>
									<td>
										<strong>Plan End Date</strong>
									</td>
									<td>{{getTimeStamp planEndDate 'dd-mm-yy'}}</td>
								</tr>
								<tr>
									<td>
										<strong>Remaining Days</strong>
									</td>
									<td>{{planRemaingDays}}</td>
								</tr>
							{{else}}
								<tr>
									<td>
										<strong>Plan</strong>
									</td>
									<td>Not Subscribed</td>
								</tr>
							
							{{/notEqual}}
							
							
						</tbody>
					</table>
				</div><!-- /.col -->
			</div><!-- /.row -->

			<!-- this row will not appear when printing -->
			<div class="row no-print">
				<div class="col-sm-8">
				{{#equal assignToTechnicianFlag true}}
					<div class="row">
						<div class="col-sm-4">
							<b class="pull-right">Assign to</b>
						</div>
						<div class="col-sm-8">
							<form id="jq_changeTechnician" class="col-sm-6">
								<div class="box-body">
									<div class="form-group">
										<select  class="form-control" id="jq_fieldAssignToTechnicianID" name="assignToTechnicianId">
											{{#list "getTechnician" technicianId}}
											{{/list}}
										</select>
										
									</div>
								</div>
							</form>
						</div>
					</div>	
				{{/equal}}
				</div>
				{{#equal showChangeStatusFlag true}}
					<div class="col-sm-4">
						<form id="jq_changeJobStatus" class=" pull-right">
							<div class="box-body">
								<div class="form-group">
									
									<select  class="form-control" id="jq_fieldChangeJobStatus" name="jobStatusId">
										{{#list "getJobStatus" jobStatusId}}
										{{/list}}	
									</select>
								</div>
							</div>
						</form>	
					</div>
					{{else}}
						{{#equal showReopenBtnFlag true}}
							<div class="col-sm-4">
								<button id="jq_reopenJobBtn" class="btn btn-default pull-right"   ><i class="fa fa-repeat"></i> Reopen</button>
							</div>
						{{/equal}}
				{{/equal}}
			</div>
		</script>
		
		<script type="text/x-handlebars-template" id="jobDetailsCommentView-template">
			<!-- Chat box -->
			<div class="box box-success no-print jq_commentBox">
				<div class="box-header">
					<i class="fa fa-comments-o"></i>
					<h3 class="box-title">Comment</h3>
					<div class="box-tools pull-right" data-toggle="tooltip" title="Status">
						
					</div>
				</div>
				<div class="box-body chat" id="jq_jobDetailsCommentBox">
					<!-- Chat Items-->
				</div><!-- /.chat -->
				<div class="box-footer">
					<div class="input-group">
						<textarea id="jq_commentTextBox" class="form-control" placeholder="Type comment..." rows="6" style="resize: none;"></textarea>
						<div class="input-group-btn">
							<button class="btn btn-success fullHeight" id="jq_addCommentBtn"><i class="fa fa-plus"></i></button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="jq_alertBoxHolder"></div>
					</div>
				</div>
			</div><!-- /.box (chat box) -->
		</script>
        <script type="text/x-handlebars-template" id="jobDetailsCommentListView-template">
			<div class="item">
				<img src="<?php echo base_url(); ?>public/img/avatar.png" alt="user image" class="online">
				<p class="message">
					<a href="#" class="name">
						<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{getTimeStamp postedOn 'dd-mm-yy hr:min:sec'}}</small>
						{{getValue 'technician' userId}}
					</a>
					{{{jobComment}}}
				</p>
			</div>
		</script>
		<script type="text/x-handlebars-template" id="dashboardView-template">
			{{#equal role_id 1}}
				<!--for admin-->
				<div class="row">			
					<div class="col-lg-8 col-xs-12">
						<div class="row">
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-aqua">
									<div class="inner">
										<h3 class="jq_placeholderTotalClients">
											0
										</h3>
										<p>
											Total Clients
										</p>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>
									<a href="#" class="small-box-footer">
										More info <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div><!-- ./col -->
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-blue">
									<div class="inner">
										<h3 class="jq_placeholderSubscribedClients">
											0
										</h3>
										<p>
											Unsubscribed Clients
										</p>
									</div>
									<div class="icon">
										<i class="ion ion-ios7-pricetag-outline"></i>
									</div>
									<a href="#" class="small-box-footer">
										More info <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div><!-- ./col -->
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-red">
									<div class="inner">
										<h3 class="jq_placeholderOpenJobs">
											0
										</h3>
										<p>
											Open Jobs
										</p>
									</div>
									<div class="icon">
										<i class="fa fa-mail-reply"></i>
									</div>
									<a href="#/job/list/open" class="small-box-footer">
										More info <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div><!-- ./col -->
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-purple">
									<div class="inner">
										<h3 class="jq_placeholderReopenJobs">
											0
										</h3>
										<p>
											Reopen Jobs
										</p>
									</div>
									<div class="icon">
										<i class="fa fa-mail-reply-all"></i>
									</div>
									<a href="#/job/list/reopen" class="small-box-footer">
										More info <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div><!-- ./col -->
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-yellow">
									<div class="inner">
										<h3 class="jq_placeholderPendingJobs">
											0
										</h3>
										<p>
											Pending Jobs
										</p>
									</div>
									<div class="icon">
										<i class="fa fa-retweet"></i>
									</div>
									<a href="#/job/list/pending" class="small-box-footer">
										More info <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div><!-- ./col -->
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-teal">
									<div class="inner">
										<h3 class="jq_placeholderCompleatedJobs">
											0
										</h3>
										<p>
											Completed Jobs
										</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="#/job/list/completed" class="small-box-footer">
										More info <i class="fa fa-check-circle-o"></i>
									</a>
								</div>
							</div><!-- ./col -->
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-green">
									<div class="inner">
										<h3 class="jq_placeholderClosedJobs">
											0
										</h3>
										<p>
											Closed Jobs
										</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="#" class="small-box-footer">
										More info <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div><!-- ./col -->
							
						</div>
					</div>
					
					<div class="col-lg-4 col-xs-12" id="jq_announcementHolder">
					<!-- Info box -->
						<div class="box box-solid bg-aqua">
							<div class="box-header">
								<h3 class="box-title">Important Notice</h3>
							</div>
							<div class="box-body jq_announcementBody">
								<b>No</b>
								<p>Announcements</p>
							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div>
				</div>
					
			{{/equal}}
			{{#equal role_id 2}}
				<!--for employee-->
				<div class="row">			
					<div class="col-lg-8 col-xs-12">
						<div class="row">
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-red">
									<div class="inner">
										<h3 class="jq_placeholderOpenJobs">
											0
										</h3>
										<p>
											Open Jobs
										</p>
									</div>
									<div class="icon">
										<i class="fa fa-mail-reply"></i>
									</div>
									<a href="#/job/list/open" class="small-box-footer">
										More info <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div><!-- ./col -->
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-purple">
									<div class="inner">
										<h3 class="jq_placeholderReopenJobs">
											0
										</h3>
										<p>
											Reopen Jobs
										</p>
									</div>
									<div class="icon">
										<i class="fa fa-mail-reply-all"></i>
									</div>
									<a href="#/job/list/reopen" class="small-box-footer">
										More info <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div><!-- ./col -->
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-yellow">
									<div class="inner">
										<h3 class="jq_placeholderPendingJobs">
											0
										</h3>
										<p>
											Pending Jobs
										</p>
									</div>
									<div class="icon">
										<i class="fa fa-retweet"></i>
									</div>
									<a href="#/job/list/pending" class="small-box-footer">
										More info <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div><!-- ./col -->
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-teal">
									<div class="inner">
										<h3 class="jq_placeholderCompleatedJobs">
											0
										</h3>
										<p>
											Compleated Jobs
										</p>
									</div>
									<div class="icon">
										<i class="fa fa-check-circle-o"></i>
									</div>
									<a href="#/job/list/completed" class="small-box-footer">
										More info <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div><!-- ./col -->
							<div class="col-lg-6 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-green">
									<div class="inner">
										<h3 class="jq_placeholderClosedJobs">
											0
										</h3>
										<p>
											Closed Jobs
										</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="#" class="small-box-footer">
										More info <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div><!-- ./col -->
							
						</div>
					</div>
					
					<div class="col-lg-4 col-xs-12" id="jq_announcementHolder">
					<!-- Info box -->
						<div class="box box-solid bg-aqua">
							<div class="box-header">
								<h3 class="box-title">Important Notice</h3>
							</div>
							<div class="box-body jq_announcementBody">
								<b>No</b>
								<p>Announcements</p>
							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div>
				</div>
			{{/equal}}
		</script>
		
		<script type="text/x-handlebars-template" id="pageNotFoundView-template">
			<div class="error-page">
				<h2 class="headline text-info"> 404</h2>
				<div class="error-content">
					<h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
					<p>
						We could not find the page you were looking for.</br>
						<a href="">return to dashboard</a>
					</p>
					
				</div><!-- /.error-content -->
			</div>
		</script>
		
		<!--add announcement-->
		<script type="text/x-handlebars-template" id="addAnnouncementView-template">
			<!-- alert box holder -->
			<div class="row" id="jq_alertBoxHolder">
			</div>
        	<div class="row">
				<!-- left column -->
				<div class="col-md-6" >
					<!-- alert box holder -->
					<div class="row" id="jq_alertBoxHolder">
					</div>
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Add Announcement</h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="jq_addAnnouncement">
							<div class="box-body">
								<div class="form-group">
									<label for="jq_fieldTitle">Title</label>
									<input type="text" id="jq_fieldTitle" class="form-control"  name="title" placeholder="Title">
								</div>
								<div class="form-group">
									<label for="jq_fieldMessage">Message</label>
									<textarea class="form-control" id="jq_fieldMessage" rows="3" name="message" placeholder="Enter ..."></textarea>
								</div>
								<div class="form-group">
									<label for="jq_fieldUserID">User</label>
									<select  class="form-control" id="jq_fieldUserID" name="userId">
										<option value="0">All</option>
										{{#list "getActiveUser" 0}}
										{{/list}}
									</select>
								</div>
							</div><!-- /.box-body -->

							<div class="box-footer">
								<input type="submit" id="jq_addAnnouncementBtn" class="btn btn-primary" value="Add Announcement"/>
							</div>
						</form>
					</div><!-- /.box -->
					
				</div><!--/.col (left) -->

			</div>
        
        </script>
		
		<script type="text/x-handlebars-template" id="announcementListView-template">
			<b>{{title}}</b>
			<p>{{message}}</p>
		</script>
		
        <!--Manage announcement View-->
		<script type="text/x-handlebars-template" id="manageAnnouncementView-template">
			<div class="box" id="jq_manageAnnouncementTable">
				<div class="box-header">
					<h3 class="box-title">Announcement List</h3>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive">
					<table id="jq_complaintSearchResultTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Message</th>
								<th>User</th>
								<th class="date">Created on</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<!--content-->
						</tbody>
						<tfoot>
							<tr>
								<th>Title</th>
								<th>Message</th>
								<th>User</th>
								<th>Created on</th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
        </script>
        <!-- Manage announcement list-->
		<script type="text/x-handlebars-template" id="manageAnnouncementListView-template">
			<tr>	
				<td>{{title}}</td>
				<td>{{message}}</td>
				<td>{{userId}}</td>
				<td>{{getTimeStamp createdDate 'dd-mm-yy'}}</td>
				<td data-id="{{announcmentId}}">
					<a class="btn btn-sm jq_deleteAnnouncement"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
        </script>
		
		
		<!--data Range Complaint Search search box-->
		<script type="text/x-handlebars-template" id="dateRangeComplaintSearchBox-template">
			<div class="box box-primary">
				<div class="box-header">
					<h4 class="box-title">Advance Search</h4>
				</div>	
				<div class=" box-body row" id="jq_advanceSearchBox">
					<div class="col-md-9">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="jobDateRangePicker">
						</div><!-- /.input group -->
					</div>
					<div class="col-md-3">
						<button id="jq_advanceComplaintSearchBtn" class="btn btn-primary btn-flat">Search</button>
						<button id="jq_downloadCSVBtn" class="btn btn-warning btn-flat hidden">Download Report</button>
					</div>
				</div>
        	</div>
			
			<div class="row" id="jq_alertBoxHolder">
			</div>
			
			
        </script>
        
        <!--Complaint search result-->
		<script type="text/x-handlebars-template" id="dateRangeComplaintSearchResult-template">
			<div class="box hidden" id="jq_searchResult">
				<div class="box-header">
					<h3 class="box-title">Search result</h3>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive">
					<table id="jq_complaintSearchResultTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Job Number</th>
								<th>Date</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Issue</th>
								<th>Status</th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>
							<!--content-->
						</tbody>
						<tfoot>
							<tr>
								<th>Job Number</th>
								<th>Date</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Issue</th>
								<th>Status</th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
        </script>
        <!--Complaint search result list-->
		<script type="text/x-handlebars-template" id="dateRangeComplaintSearchResultList-template">
			<tr>	
				<td>{{jobId}}</td>
				<td>{{getTimeStamp createdDate 'dd-mm-yy'}}</td>
				<td>{{firstName}} {{lastName}}</td>
				<td>{{phone}}</td>
				<td>{{getValue 'issueType' issueTypeId}}</td>
				<td>{{getValue 'jobStatus' jobStatusId}}</td>
				<td data-id="{{jobId}}">
					<a href="#job/{{jobId}}" class="btn btn-sm jq_view"><i class="fa fa-eye"></i></a>
					<a href="#job/new/{{{clientId}}}"class="btn btn-sm jq_new"><i class="fa fa-plus"></i></a>
				</td>
			</tr>
        </script>
        
        <!--Complaint search result list-->
		<script type="text/x-handlebars-template" id="importClient-template">
			<div class="box box-primary">
				<div class="box-header">
					<h4 class="box-title">Advance Search</h4>
				</div>	
				<div class=" box-body row" id="jq_advanceSearchBox">
					<div class="col-md-9">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-table"></i>
							</div>
							<input type="file" class="form-control pull-right" id="jq_importClientFilePicker" accept=".csv">
						</div><!-- /.input group -->
					</div>
					<div class="col-md-3">
						<button id="jq_importClientFilePickerBtn" class="btn btn-primary btn-flat">Import</button>
					</div>
				</div>
        	</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-lg-6">
						<!-- small box -->
						<div class="small-box bg-blue">
							<div class="inner">
								<h3 class="jq_totalCount">
									0
								</h3>
								<p>
									Total Records
								</p>
							</div>
							<div class="icon">
								<i class="ion ion-bag"></i>
							</div>
							<a href="#" class="small-box-footer">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div><!-- ./col -->
					<div class="col-lg-6">
						<!-- small box -->
						<div class="small-box bg-green">
							<div class="inner">
								<h3 class="jq_compleatedCount">
									0
								</h3>
								<p>
									Success
								</p>
							</div>
							<div class="icon">
								<i class="ion ion-stats-bars"></i>
							</div>
							<a href="#" class="small-box-footer">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div><!-- ./col -->	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-solid">
						<div class="box-header">
							<h3 class="box-title">Import Progress Bars</h3>
						</div><!-- /.box-header -->
						<div class="box-body">
							PROGRESS
							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-success jq_compleatedProgressPercent" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
									<span class="sr-only jq_compleatedProgress">0% Complete</span>
								</div>
							</div>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
				
			</div>
			<div class="row" id="jq_alertBoxHolder">
			
			</div>
       	</script>
		
		<!-- add plan-->
		<script type="text/x-handlebars-template" id="addPlan-template">
        	<div class="row">
				<!-- left column -->
				<div class="col-md-6" >
					<!-- alert box holder -->
					<div class="row" id="jq_alertBoxHolder">
					</div>
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Add Plan</h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="jq_addPlanForm">
							<div class="box-body">
								<div class="form-group">
									<label for="jq_fieldClientID">Client ID</label>
									<input type="text" id="jq_fieldClientID" class="form-control"  name="clientId" placeholder="Client ID" value="{{clientId}}" disabled>
								</div>
								<div class="form-group">
									<label for="jq_fieldPlanID">Plan</label>
									<select  class="form-control" id="jq_fieldPlanID" name="plansId">
										<option value="0">select</option>
										{{#list "getPlans" }}
										{{/list}}
									</select>
								</div>
								<div class="form-group ">
									<label for="jq_fieldPlanStartDate">Plan Activation Date</label>
									<input type="text" id="jq_fieldPlanStartDate" class="form-control jq_datePicker" name="planStartDate" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" data="">
								</div>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<input type="submit" id="jq_addPlanBtn" class="btn btn-primary" value="Add Plan"/>
							</div>
						</form>
					</div><!-- /.box -->
					
				</div><!--/.col (left) -->

			</div>
        
        </script>
		<!--job by status View-->
		<script type="text/x-handlebars-template" id="jobByStatusView-template">
			<div class="box" id="jq_manageAnnouncementTable">
				<div class="box-header">
					<h3 class="box-title">Jobs</h3>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive">
					<table id="jq_jobByStatusTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Job Number</th>
								<th class="date">Date</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Issue</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<!--content-->
						</tbody>
						<tfoot>
							<tr>
								<th>Job Number</th>
								<th class="date">Date</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Issue</th>
								<th>Status</th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
        </script>
        <!-- job by status view list-->
		<script type="text/x-handlebars-template" id="jobByStatusListView-template">
			<tr>	
				<td>{{jobId}}</td>
				<td>{{getTimeStamp createdDate 'dd-mm-yy'}}</td>
				<td>{{firstName}} {{lastName}}</td>
				<td>{{phone}}</td>
				<td>{{getValue 'issueType' issueTypeId}}</td>
				<td>{{getValue 'jobStatus' jobStatusId}}</td>
				<td data-id="{{jobId}}">
					<a href="#job/{{jobId}}" class="btn btn-sm jq_view"><i class="fa fa-eye"></i></a>
					<a href="#job/new/{{{clientId}}}"class="btn btn-sm jq_new"><i class="fa fa-plus"></i></a>
				</td>
			</tr>
        </script>
		
		
		<!--papaparse-->
		<script src="<?php echo base_url(); ?>public/libs/papaparse/papaparse.js" type="text/javascript"></script>
		
        <!-- handlebars -->
        <script src="<?php echo base_url(); ?>public/libs/handlebars/handlebars-v2.0.0.js" type="text/javascript"></script>
        <!-- Backbone JS-->
        <script src="<?php echo base_url(); ?>public/libs/underscore/underscore.js" type="text/javascript"></script>
    	<script src="<?php echo base_url(); ?>public/libs/backbone/backbone.js" type="text/javascript"></script>
    
        <!-- Custom -->
        
        <script src="<?php echo base_url(); ?>public/libs/template/prerequisite.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>public/libs/template/utility.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/libs/template/shell.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>public/libs/template/model.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>public/libs/template/collection.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>public/libs/template/view.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>public/libs/template/router.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>public/libs/template/handlebar_helper.js" type="text/javascript"></script>
		
    </body>
</html>