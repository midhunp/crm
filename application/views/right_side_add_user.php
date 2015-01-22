			<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Search
                        <small>it all starts here</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Examples</a></li>
                        <li class="active">Search</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

					<div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
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
                                            <input type="text" id="jq_fieldFirstName" class="form-control"  name="firstname" placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="jq_fieldLastName">Last Name</label>
                                            <input type="text" id="jq_fieldLastName" class="form-control"  name="lastname" placeholder="Last Name">
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
                                        	<label for="role">Role</label>
                                            <select  class="form-control" id="jq_fieldRole" name="role">
                                                <option value="0">select</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Staff</option>
                                            </select>
                                    	</div>
                                        <div class="form-group">
                                        	<label for="role">Role</label>
                                            <select class="form-control" id="jq_fieldActive" name="active">
                                                <option value="1">Active</option>
                                                <option value="2">Deactive</option>
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
						
                </section><!-- /.content -->
            </aside><!-- /.right-side -->