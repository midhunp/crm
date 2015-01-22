/*******************************
*********Author MIDHUN**********
***********view.js*************
*******************************/

app.CRMApp.CRMView = Backbone.View.extend({
	tagName: 'html',
	el:	'html',
	initialize:function(){
		debugTrace('CRMView.initialize');
		this.initializeApp();
	},
	initializeApp: function(){
		this.addBaseView();
		this.addSidebarView();
		this.addHeaderView();
		//this.addBillingTabView();
	},
	addBaseView:function(){
		debugTrace('CRMView.addHeaderView');
		app.CRMApp.baseView = new app.CRMApp.BaseView();

	},
	addSidebarView: function(){
		debugTrace('CRMView.addSidebarView');
		app.CRMApp.sidebarView = new app.CRMApp.SidebarView({model:this.model});
	},
	addHeaderView: function(){
		debugTrace('CRMView.addHeaderView');
		app.CRMApp.headerView = new app.CRMApp.HeaderView({model:this.model});
	}
	
	
});
app.CRMApp.BaseView = Backbone.View.extend({
	tagName:'body',
	el:'body',
	initialize:function(){
		debugTrace('BaseView.initialize');
		//_.bindAll(this, 'render', 'alertMe');
		//this.model.on('change',this.render())
		this.render();
	},
	template: Handlebars.compile($('#base-template').html()),
	
	render:	function(){
		debugTrace('BaseView.render');
		this.$el.html(this.template());
		
		baseViewLoadedHandler();
	},
	events: {
		
	}
});
app.CRMApp.HeaderView = Backbone.View.extend({
	tagName:'header',
	el:'#jq_header',
	initialize:function(){
		debugTrace('HeaderView.initialize');
		_.bindAll(this, 'render', 'updatePageHeader');
		this.model.on('change',this.updatePageHeader)
		this.render();
	},
	template: Handlebars.compile($('#header-template').html()),
	
	render:	function(){
		debugTrace('HeaderView.render');
		this.$el.html(this.template( this.model.toJSON() ));
    	return this;
	},
	events: {
		'click #jq_logOutBtn' : 'logoutBtnClickedHandler' 
	},
	updatePageHeader:function(){
		$('.jq_pageMainHeading').text(this.model.get('pageMainHeading'));
		$('.jq_pageSubHeading').text(this.model.get('pageSubHeading'));
	},
	logoutBtnClickedHandler: function(event){
		event.preventDefault()
		app.CRMApp.logoutModel = new app.CRMApp.LogoutModel();
		app.CRMApp.logoutModel.fetch({
				success:this.logoutSuccessHandler,
				error:this.logoutFailHandler 
			})
	},
	logoutSuccessHandler: function(){
		window.location.href = global.basePath;
	},
	logoutFailHandler: function(){
		alert('Logout Failed');
	},
	
	
}); 

app.CRMApp.SidebarView = Backbone.View.extend({
	tagName:'aside',
	el:'.left-side',
	initialize:function(){
		debugTrace('SidebarView.initialize');
		//_.bindAll(this, 'render', 'alertMe');
		this.render();
	},
	template: Handlebars.compile($('#sidebar-template').html()),
	
	render:	function(){
		debugTrace('SidebarView.render');
		this.$el.html(this.template( this.model.toJSON() ));
    	/* fire to initialize functionality*/
    	$(".sidebar .treeview").tree();
		return this;
	}
}); 

app.CRMApp.AddUserView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#addUser-template').html()),
	initialize: function(){
		debugTrace('AddUserView.initialize');
	},
	render: function(){
		debugTrace('AddUserView.render');
		this.$el.html(this.template());
		return this;
	},
	events: {
		'submit #jq_addUserForm':'formSubmithandler'
	},
	urlRoot:global.basePath+'user/add',
	formSubmithandler: function(event){
		event.preventDefault();
		var formData = formDataToJson("jq_addUserForm"); 
		var user  = new app.CRMApp.UserModel();
		user.url = global.basePath+'user/add';
		user.set(formData);
	
		user.save(null,{
			error:function(){
				showAlertBox(true,'danger','OOPS','user not saved.');
			},
			success:function(){
				showAlertBox(true,'success','SUCCESS','user saved.');
				resetFormData("jq_addUserForm");
			},
			complete:function(){
				//is called every time when executed.
			},
			wait: true
		});
		
	}
});

app.CRMApp.EditUserView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#editUser-template').html()),
	initialize: function(){
		debugTrace('EditUserView.initialize');
		this.render();
	},
	render: function(){
		debugTrace('EditUserView.render');
		this.$el.html(this.template(this.model.toJSON()));
		return this;
	},
	events: {
		'click #jq_updateUserBtn':'formSubmithandler'
	},
	urlRoot:global.basePath+'user/update',
	formSubmithandler: function(event){
		
		var alertBoxMessage="";
		var alertBoxTitle="";
		var alertBoxType="";
		var formData = formDataToJson("jq_updateUserForm"); 
		var user  = new app.CRMApp.UserModel();
		user.url = global.basePath+'user/update';
		user.set(formData);
		if(user.isNew()){
			user.save(null,{
				error:function(){
					showAlertBox(true,'danger','OOPS','user not saved.');
				},
				success:function(){
					//showAlertBox(true,'success','SUCCESS','user saved.');
					showCallOut(true,'info','User Updated','User updated successfully.');
					resetFormData("jq_updateUserForm");
				},
				complete:function(){
					//is called every time when executed.
				},
				wait: true
			});
		}else{
			alert("userWIth id already exists!!");	
		}
		return false
	}
	
});


app.CRMApp.ManageUserView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template:Handlebars.compile($('#manageUser-template').html()),
	initialize: function(){
		debugTrace('ManageUserView.initialize');
		app.CRMApp.userCollection = new app.CRMApp.UserCollection();
		app.CRMApp.userCollection.fetch({
			success:function(){
				app.CRMApp.manageUserView.fetchSuccessHandler();
			}
		});
		this.render();
	},
	render: function(){
		debugTrace('ManageUserView.render');
		this.$el.html(this.template());
		return this;
	},
	fetchSuccessHandler: function(){
		app.CRMApp.manageUserListView  = new app.CRMApp.ManageUserListView();
		/*this.collection.each(function(userModel){
			console.log(userModel.get('firstName'));
			new app.CRMApp.ManageUserListView({model:userModel});
		});*/
	}
});
app.CRMApp.ManageUserListView = Backbone.View.extend({
	tagName: 'table',
	el: '#jq_manageUserTable tbody',
	template: Handlebars.compile($('#manageUserList-template').html()),
	initialize: function(){
		debugTrace('ManageUserListView.initialize');
		_.bindAll(this, 'render', 'editUserClickedHandler');
		//$(this.el).on('.jq_edit', 'click', this.editUserClickedHandler);
		this.render();
	
	},
	render: function(){
		debugTrace('ManageUserView.render');
		var that = this;
		app.CRMApp.userCollection.each(function(userModel){
			console.log(userModel.get('firstName'));
			that.$el.append(that.template(userModel.toJSON()));
		});
		$('#jq_manageUserTable').dataTable();
		//this.$el.append(this.template(this.model.toJSON()));
		return this;
	},events:{
		'click .jq_edit': 'editUserClickedHandler',
		'click .jq_activeBtn': 'activeBtnClickedHandler'
		
	},
	editUserClickedHandler: function(){
		setPageHeading('User', 'Edit');
		var $target = $(event.target);
		var userIdN = $target.closest('td').data('id');
		
		var targetUserModelA = app.CRMApp.userCollection.where({userId:userIdN.toString()})
		var targetUserModelM = targetUserModelA[0];
		debugTrace(userIdN);
		if(targetUserModelA.length >0){
			app.CRMApp.editUserView = new app.CRMApp.EditUserView({model:targetUserModelM});
		}else{
			debugTrace("ERROR :: no such user found!!");	
		}
		
	},
	activeBtnClickedHandler: function(){
		var $target = $(event.target);
		var userIdN = $target.closest('td').data('id');
		var userIdS = userIdN.toString();
		var modelA = app.CRMApp.userCollection.where({userId:userIdS}) 
		var modelM = modelA[0];
		modelM.url = global.basePath+'user/updateActive';
		var currentActiveId = modelM.get('active');
		var newActiveId = (currentActiveId == 1) ? 2 : 1;
		modelM.set('active',newActiveId);
		/*modelM.save(null,{
				success: this.activeStateChangedSuccessHandler($target, newActiveId),
				error: this.activeStateChangedErrorHandler,
				wait: true
			});*/
		modelM.fetch({
						type: 'POST',
						data:{'active':newActiveId, 'userId':userIdS},
						success:this.activeStateChangedSuccessHandler($target, newActiveId),
						error:this.activeStateChangedErrorHandler
					});
	
	},
	activeStateChangedSuccessHandler: function($target, newActiveId){
		var flagB = (newActiveId == 1) ? false : true;
		var targetPatchB = $target.hasClass('btn');
		if(targetPatchB){
			$target.children().toggleClass('fa-chain-broken', flagB);
		}else{
			$target.toggleClass('fa-chain-broken', flagB);
		}
	},
	activeStateChangedErrorHandler: function(){
		alert("error");
	},
	
});
app.CRMApp.ComplaintSearchBoxView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#complaintSearchBox-template').html()),
	initialize:function(){
		_.bindAll(this
				, 'render'
				, 'isEnterKeyHandler'
				);
		debugTrace('ComplaintSearchBoxView.initialize');		
		this.render();
	},events:{
		'click #jq_complaintSearchBtn': 'searchBtnClickedHandler',
		'click #jq_searchBox .form-control': 'textFieldClickedHandler',
		'keyup #jq_searchBox .form-control': 'isEnterKeyHandler'
		
		
	},
	render:	function(){
		debugTrace('ComplaintSearchBoxView.render');
		this.$el.html(this.template());
		
		//Date range picker
        $('#jobDateRangePicker').daterangepicker({
                    format: 'DD/MM/YYYY'
					});
    	
    	return this;
	},
	isEnterKeyHandler : function(event){
		 if(event.keyCode == 13){
			this.searchBtnClickedHandler();
		}
	},
	textFieldClickedHandler: function(event){
		debugTrace('ComplaintSearchBoxView.textFieldClickedHandler');
		var $target = $(event.target);
		$target.siblings('.input-group-addon').children().prop('checked', true);
	},
	searchBtnClickedHandler: function(){
		showAlertBox(false);
		var $radioButtons = $('#jq_searchBox input:radio:checked');
		var fieldS = $radioButtons.val();
		var valueS = $radioButtons.parent().siblings(0).val(); 
		app.CRMApp.complaintSearchCollection.url= global.basePath+'job/search';
		if($radioButtons.length > 0){
			app.CRMApp.complaintSearchCollection.fetch({
													type: 'POST', 
													data:{'field':fieldS,"value":valueS},
													success:this.searchFetchSuccessHandler,
													error:this.searchFetchErrorHandler
												});
		}else{
			showAlertBox(true,'warning','VALIDATION',"choose a field don't fool.");
		}
	},
	searchFetchSuccessHandler: function(){
		
		$('#jq_complaintSearchResultTable tbody').empty();
		var ifHasResult = app.CRMApp.complaintSearchCollection.models[0].get('clientId') == undefined ? false : true;
			if(ifHasResult){
				app.CRMApp.complaintSearchCollection.each(function(searchResultModel){
					console.log(searchResultModel.get('firstName'));
					app.CRMApp.complaintSearchResultList = new app.CRMApp.ComplaintSearchResultList({model:searchResultModel});
					app.CRMApp.complaintSearchResultList.render();
				});
				showSearchResult();
			}else{
				showAlertBox(true,'warning','No Result','No result found.');
				showSearchResult(false);
			}
	},
	searchFetchErrorHandler: function(){
		showAlertBox(true,'warning','OOPS','Something went wrong.');
	}

}); 
app.CRMApp.ComplaintSearchResult = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: _.template($('#complaintSearchResult-template').html()),
	initialize:function(){
		debugTrace('ComplaintSearchResult.initialize');
		this.render();
	},
	render:	function(){
		debugTrace('ComplaintSearchResult.render');
		this.$el.append(this.template());
    	return this;
	}
}); 
app.CRMApp.ComplaintSearchResultList = Backbone.View.extend({
	tagName: 'table',
	el: '#jq_complaintSearchResultTable tbody',
	template: Handlebars.compile($('#complaintSearchResultList-template').html()),
	initialize:function(){
		debugTrace('ComplaintSearchResultList.initialize');
		//this.$el.empty();
		//this.render()
	},
	render:	function(){
		debugTrace('ComplaintSearchResultList.render');
		this.$el.append(this.template(this.model.toJSON()));
    	return this;
	},
	addClientBtnClickedHandler:function(){
		alert('hi');
	}
}); 

app.CRMApp.AddClientView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#addClient-template').html()),
	initialize:function(){
		debugTrace('AddClientView.initialize');
		this.render();
		_.bindAll(this	, 'render'
						, 'formSubmithandler' 
						, 'formSubmitSuccessHandler'
						, 'addJobForNotIntrestedClient');
		
	},
	render:	function(){
		debugTrace('AddClientView.render');
		this.$el.html(this.template());
		$('.jq_datePicker').datepicker();
		
		return this;
	},
	events: {
		'submit #jq_addClientForm':'formSubmithandler',
		'change #jq_fieldDispositionID':'dispositionChangedHandler',
		'change #jq_fieldIssueTypeID':'issueTypeChangedHandler'
	},
	urlRoot:global.basePath+'client/add',
	dispositionChangedHandler: function(event){
		var $target = $(event.target);
		var targetValueN = parseInt($target.val());
		var $addButton = $('#jq_addClientBtn');
		if(targetValueN == 1){
			$addButton.val("Next");
		}else{
			$addButton.val("Add Client");
		}
	},
	issueTypeChangedHandler: function(event){
		var $target = $(event.target);
		if($target.val() == 4){
			$('#jq_fieldOtherIssue').parent().toggleClass('hidden',false);
		}else{
			$('#jq_fieldOtherIssue').parent().toggleClass('hidden',true);
		}
		
	},
	formSubmithandler: function(event){
		var that = this;
		event.preventDefault();
		var formData = formDataToJson("jq_addClientForm"); 
		
		app.CRMApp.jobModel = new app.CRMApp.JobModel();
		app.CRMApp.jobModel.clear().set(app.CRMApp.jobModel.defaults);
		app.CRMApp.jobModel.set('issueTypeId', formData.issueTypeId);
		if(formData.issueTypeId == 4){//code for other issue
			app.CRMApp.jobModel.set('otherIssue', formData.otherIssue);
		}
		app.CRMApp.jobModel.set('dispositionId', formData.dispositionId);
		delete formData.issueTypeId;
		delete formData.otherIssue;
		delete formData.dispositionId;
		
		var jobModelO = app.CRMApp.jobModel.toJSON();
		
		if(parseInt(jobModelO.issueTypeId) > 0 || parseInt(jobModelO.dispositionId) > 0){
			app.CRMApp.clientModel  = new app.CRMApp.ClientModel();
			app.CRMApp.clientModel.url = global.basePath+'client/add';
			app.CRMApp.clientModel.set(formData);
			app.CRMApp.clientModel.set('antivirusExpDate', convertToTimeStamp(app.CRMApp.clientModel.get('antivirusExpDate')));
			if(app.CRMApp.clientModel.isValid()){
				app.CRMApp.clientModel.save(null,{
					error: this.formSubmitErrorHandler,
					success: this.formSubmitSuccessHandler,
					wait: true
				});
			}
		}else{
			var msg="";
			if(jobModelO.issueTypeId == 0){
				msg = global.message.validation.issueType;
			}else if(jobModelO.dispositionId == 0){
				msg =global.message.validation.disposition;
			}
			showAlertBox(true,'warning','VALIDATION',msg);
		}
	},	
	formSubmitErrorHandler:function(){
		showAlertBox(true,'danger','OOPS','Client not saved.');
	},
	formSubmitSuccessHandler:function(){
		debugTrace('AddClientView.formSubmitSuccessHandler');
		//showAlertBox(true,'success','SUCCESS','Client saved.');
	//	resetFormData("jq_addClientForm");
		var flagNextStepB = (app.CRMApp.jobModel.get('dispositionId') == 1);
		if(flagNextStepB){
			app.CRMApp.clientModel.on('change', this.showAddJobView);		
		}else{
			app.CRMApp.clientModel.on('change', this.addJobForNotIntrestedClient);
		}
		app.CRMApp.clientModel.syncUp();
	},
	addJobForNotIntrestedClient:function(){
		debugTrace('AddClientView.addJobForNotIntrestedClient');
		app.CRMApp.jobModel.set('clientId', app.CRMApp.clientModel.get('clientId'));
		app.CRMApp.jobModel.set('userId', app.CRMApp.cRMAppModel.get('userId'));
		app.CRMApp.jobModel.url = global.basePath+'job/add';
		if(app.CRMApp.jobModel.isValid()){
			app.CRMApp.jobModel.save(null,{
				error:		this.addJobForNotIntrestedClientErrorHandler,
				success:	this.addJobForNotIntrestedClientSuccessHandler,
				complete:	function(){
					//is called every time when executed.
				},
				wait: true
			});
		}else{
			showAlertBox(true,'warning','VALIDATION','fill valid data.');
		}
	},
	addJobForNotIntrestedClientSuccessHandler:function(){
		debugTrace('AddClientView.addJobForNotIntrestedClientSuccessHandler');
		var message="Client added successfully. His ID is <b>"+app.CRMApp.clientModel.get('clientId')+"</b>.";
		showCallOut(true,'info','Awesome',message);
		var clientId = app.CRMApp.clientModel.get('clientId');
		Backbone.history.navigate('#job/'+clientId, {trigger:false});
	},
	addJobForNotIntrestedClientErrorHandler:function(){
		showAlertBox(true,'error','OOPS!','failed to add job for not interested client.');
	},
	showAddJobView:function(){
		//alert(app.CRMApp.clientModel.get('clientId'));
		/*
		app.CRMApp.jobModel = new app.CRMApp.JobModel();
		app.CRMApp.jobModel.set('clientId', app.CRMApp.clientModel.get('clientId'));
		app.CRMApp.jobModel.set('userId', app.CRMApp.cRMAppModel.get('userId'));
		app.CRMApp.jobModel.set('technicianId', 0);
		app.CRMApp.addJobView = new app.CRMApp.AddJobView({model:app.CRMApp.jobModel});	
		*/
		var clientId = app.CRMApp.clientModel.get('clientId');
		Backbone.history.navigate('#job/new/'+clientId, {trigger:true});
	}
	
}); 
app.CRMApp.AddJobView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#addJob-template').html()),
	initialize:function(){
		debugTrace('AddJobView.initialize');
		this.render();
	},
	render:	function(){
		debugTrace('AddJobView.render');
		this.$el.empty();
		this.$el.html(this.template( this.model.toJSON() ));
    	return this;
	},
	events: {
		'submit #jq_addJobForm':'formSubmithandler',
		'change #jq_fieldIssueTypeId':'issueTypeChangedHandler'
	},
	urlRoot:global.basePath+'clent/add',
	issueTypeChangedHandler: function(event){
		var $target = $(event.target);
		if($target.val() == 4){
			$('#jq_fieldOtherIssue').parent().toggleClass('hidden',false);
		}else{
			$('#jq_fieldOtherIssue').parent().toggleClass('hidden',true);
		}
		
	},
	formSubmithandler: function(event){
		debugTrace('AddJobView.formSubmithandler');
		event.preventDefault();
		var formData = formDataToJson("jq_addJobForm"); 
		app.CRMApp.jobModel  = getBackboneInstance(app.CRMApp.jobModel, app.CRMApp.JobModel);
		app.CRMApp.jobModel.url = global.basePath+'job/add';
		app.CRMApp.jobModel.set('userId', app.CRMApp.cRMAppModel.get('userId'))
		app.CRMApp.jobModel.set(formData);
		if(app.CRMApp.jobModel.set('issueType') != 4){//code for other issue
			app.CRMApp.jobModel.set('otherIssue', "");
		}
		if(app.CRMApp.jobModel.isValid()){
			app.CRMApp.jobModel.save(null,{
				error:		this.formSubmitErrorhandler,
				success:	this.formSubmitSuccesshandler,
				complete:	function(){
					//is called every time when executed.
				},
				wait: true
			});
		}else{
			showAlertBox(true,'warning','VALIDATION','fill valid data.');
		}
		
	},
	formSubmitErrorhandler:function(){
		showAlertBox(true,'danger','OOPS','Job not created.');
	},
	formSubmitSuccesshandler:function(model,response){
		resetFormData("jq_addJobForm");
		app.CRMApp.jobModel.set('jobId', response.jobId);
		var clientId = model.get('clientId');
		var callOutMessage = 'Job ID is <b>'+response.jobId+'<b/>';
		callOutMessage += '<br/>';
		callOutMessage += '<a href="#plan/new/'+clientId+'">Add Plan</a>';
		showCallOut(true,'info','Job Created',callOutMessage);
		app.CRMApp.jobModel.set(app.CRMApp.jobModel.defaults);
	}
	
}); 

app.CRMApp.AddPlanView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#addPlan-template').html()),
	initialize:function(){
		debugTrace('AddPlanView.initialize');
		this.render();
	},
	render:	function(){
		debugTrace('AddPlanView.render');
		this.$el.empty();
		this.$el.html(this.template( this.model.toJSON() ));
		$('.jq_datePicker').datepicker();
		return this;
	},
	events: {
		'submit #jq_addPlanForm':'formSubmithandler'
	},
	urlRoot:global.basePath+'plan/add',
	formSubmithandler: function(event){
		debugTrace('AddPlanView.formSubmithandler');
		event.preventDefault();
		var formData = formDataToJson("jq_addPlanForm"); 
		app.CRMApp.planModel  = getBackboneInstance(app.CRMApp.planModel, app.CRMApp.PlanModel);
		app.CRMApp.planModel.url = global.basePath+'plan/add';
		app.CRMApp.planModel.set('userId', app.CRMApp.cRMAppModel.get('userId'))
		formData.planStartDate = convertToTimeStamp(formData.planStartDate);
		app.CRMApp.planModel.set(formData);
		if(app.CRMApp.planModel.isValid()){
			app.CRMApp.planModel.save(null,{
				error:		this.formSubmitErrorhandler,
				success:	this.formSubmitSuccesshandler,
				complete:	function(){
					//is called every time when executed.
				},
				wait: true
			});
		}else{
			//showAlertBox(true,'warning','VALIDATION','fill valid data.');
		}
		
	},
	formSubmitErrorhandler:function(){
		showAlertBox(true,'danger','OOPS','Plan not added.');
	},
	formSubmitSuccesshandler:function(model,response){
		if(response.success){
			resetFormData("jq_addPlanForm");
			app.CRMApp.planModel.set('planId', response.planId);
			
			var callOutMessage = 'Plan added successfully';
			showCallOut(true,'info','Job added',callOutMessage);
		}else{
			showAlertBox(true,'danger','ERROR','OOPS something went wrong.');
		}
		/*var callOutMessage = 'Job ID is <b>'+response.jobId+'<b/>';
		showCallOut(true,'info','Job Created',callOutMessage);
		app.CRMApp.jobModel.set(app.CRMApp.jobModel.defaults);*/
	}
	
}); 


app.CRMApp.JobDetailsView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#jobDetailsView-template').html()),
	initialize:function(){
		
		debugTrace('JobDetailsView.initialize');
		_.bindAll(this
			,'render'
			,'showComments'
			,'jobStatusChangedHandler'
			,'reopenJobBtnClickedHandler'
			,'rerenderJobDetailsViewHandler'
			,'jobDetailsViewChangeErrorHandler'
			,'addJobStatusChangeComment'
			,'technicianChangedHandler'
		);
		this.model.on('change',this.render);
	},
	events: {
		'change #jq_fieldChangeJobStatus':'jobStatusChangedHandler',
		'click #jq_reopenJobBtn':'reopenJobBtnClickedHandler',
		'change #jq_fieldAssignToTechnicianID':'technicianChangedHandler',
	},
	render:	function(){
		debugTrace('JobDetailsView.render');
		this.$el.empty()
		this.$el.html(this.template( this.model.toJSON() ));
		this.showComments();
    	//return this;
	},
	showComments:function(){
		debugTrace('JobDetailsView.showComments');
		app.CRMApp.jobDetailsCommentModel = getBackboneInstance(app.CRMApp.jobDetailsCommentModel, app.CRMApp.JobDetailsCommentModel);
		app.CRMApp.jobDetailsCommentView = getBackboneInstanceView(app.CRMApp.jobDetailsCommentView, app.CRMApp.JobDetailsCommentView,{model:app.CRMApp.jobDetailsCommentModel});
		//app.CRMApp.jobDetailsCommentListModel = new app.CRMApp.JobDetailsCommentListModel();
		//app.CRMApp.jobDetailsCommentListCollection =getBackboneInstance(app.CRMApp.jobDetailsCommentListCollection, app.CRMApp.JobDetailsCommentListCollection);	
		app.CRMApp.jobDetailsCommentListCollection = new app.CRMApp.JobDetailsCommentListCollection();
		app.CRMApp.jobDetailsCommentListView = getBackboneInstanceView(app.CRMApp.jobDetailsCommentListView ,app.CRMApp.JobDetailsCommentListView,{model:this.model, collection:app.CRMApp.jobDetailsCommentListCollection});
		app.CRMApp.jobDetailsCommentListView.syncUp();
		/*var jobId = this.model.get('jobId');
		app.CRMApp.jobDetailsCommentListCollection.fetch({
													type: 'POST', 
													data:{"jobId":jobId},
													success:this.searchFetchSuccessHandler,
													error:this.searchFetchErrorHandler
												});*/
	},
	technicianChangedHandler: function(event){
		var that = this;
		var $target = $(event.target); 
		var technicianIdS = $target.val();
		var dataO = {'technicianId':technicianIdS};
		this.model.url = global.basePath+'job/updateTechnician';
		this.model.save(dataO,{
								success:function(){
									that.addTechnicianChangeComment();
								},
								error:function(){
									that.technicianChangeErrorHandler();
								},
								wait: true
						});
		
	},
	jobStatusChangedHandler: function(event){
		var that = this;
		var $target = $(event.target); 
		var jobStatusIdS = $target.val();
		var dataO = {'jobStatusId':jobStatusIdS};
		this.model.url = global.basePath+'job/updateStatus';
		this.model.save(dataO,{
								success:function(){
									that.addJobStatusChangeComment();
								},
								error:function(){
									that.jobDetailsViewChangeErrorHandler();
								},
								wait: true
						});
		
	},
	reopenJobBtnClickedHandler: function(event){
		var that = this; 
		var jobStatusIdS = 2;
		var dataO = {'jobStatusId':jobStatusIdS};
		this.model.url = global.basePath+'job/updateStatus';
		this.model.save(dataO,{
								success:function(){
									that.addJobStatusChangeComment();
								},
								error:function(){
									that.jobDetailsViewChangeErrorHandler();
								},
								wait: true
						});
	},
	addJobStatusChangeComment: function(){
		var appModelM = app.CRMApp.cRMAppModel;
		var commentS = '';
		var previousJobStatus= this.model._previousAttributes.jobStatusId;
		var currentJobStatus= this.model.get('jobStatusId');
		commentS +=appModelM.get('firstName')+' '+appModelM.get('lastName');
		commentS +=' has changed job status from ';
		commentS +='<b>'+ getValue('jobStatus', previousJobStatus) +'</b> to <b>'+ getValue('jobStatus', currentJobStatus) +'</b>.';
		
		addJobDetailsComment(commentS, this.rerenderJobDetailsViewHandler);
		
	},
	addTechnicianChangeComment: function(){
		var appModelM = app.CRMApp.cRMAppModel;
		var commentS = '';
		var previousTechnicianId= this.model._previousAttributes.technicianId;
		var currentTechnicianId= this.model.get('technicianId');
		commentS +='Assigned this job to';
		commentS +=' <b>'+ getValue('technician',currentTechnicianId) +'</b>.';
		
		addJobDetailsComment(commentS, this.rerenderJobDetailsViewHandler);
		
	},
	rerenderJobDetailsViewHandler:function(){
		this.model.modelLogic()
		this.render();
		debugTrace('jobStatusChangeSuccessHandler');
	},
	jobDetailsViewChangeErrorHandler:function(){
		alert('failed to change JobDetailsView data.');	
	}
	
	
}); 

app.CRMApp. JobDetailsCommentView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#jobDetailsCommentView-template').html()),
	initialize:function(){
		debugTrace('JobDetailsCommentView.initialize');
		_.bindAll(this,'addCommentBtnClickedHandler');
		this.render();
		
	},
	events: {
	'click #jq_addCommentBtn': 'addCommentBtnClickedHandler'
	},
	render:	function(){
		debugTrace('JobDetailsCommentView.render');
		//this.$el.empty()
		this.$el.append(this.template( this.model.toJSON() ));
    	return this;
	},
	addCommentBtnClickedHandler:function(){
		var $commentTextBox = $('#jq_commentTextBox');
		addJobDetailsComment($commentTextBox.val());
		$commentTextBox.val('');
	}
}); 


function addJobDetailsComment(commentS, callback){
	var result = false;
	if(commentS.trim() != ""){
			app.CRMApp.jobDetailsCommentModel = new app.CRMApp.JobDetailsCommentModel();
			app.CRMApp.jobDetailsCommentModel.set('userId', app.CRMApp.cRMAppModel.get('userId'));
			app.CRMApp.jobDetailsCommentModel.set('jobId', app.CRMApp.jobDetailsModel.get('jobId'));
			app.CRMApp.jobDetailsCommentModel.set('jobComment', commentS);
			app.CRMApp.jobDetailsCommentModel.url = global.basePath+'comment/add';
			app.CRMApp.jobDetailsCommentModel.save(null,{
															error:function(){
															},
															success:function(){
																app.CRMApp.jobDetailsCommentListView.syncUp();
																if(callback != undefined){
																	callback();
																}
															},
															wait: true
													});
							
	}else{
		showAlertBox(true,'warning','Validation','Dude, type something.');
		
	}

}







app.CRMApp. JobDetailsCommentListView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_jobDetailsCommentBox',
	template: Handlebars.compile($('#jobDetailsCommentListView-template').html()),
	initialize:function(){
		debugTrace('JobDetailsCommentListView.initialize');
		this.collection.bind("add", this.renderComments, this);
	},
	events: {
	},
	render:	function(){
		debugTrace('JobDetailsCommentListView.render');
		//this.$el.empty()
		this.$el.append(this.template( this.model.toJSON() ));
    	return this;
	},
	renderComments:function(){
		var that = this;
		var htmlS ="";
		this.collection.each(function(commentModel){
			htmlS += that.template( commentModel.toJSON() );
		});
		this.$el.empty();
		this.$el.append(htmlS);
	},
	syncUp:function(){
		var jobId = this.model.get('jobId');
		app.CRMApp.jobDetailsCommentListCollection.fetch({
													type: 'POST', 
													data:{"jobId":jobId},
													success:this.searchFetchSuccessHandler,
													error:this.searchFetchErrorHandler
												});
		
	}
	
}); 

app.CRMApp.DashboardView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#dashboardView-template').html()),
	initialize:function(){
		_.bindAll(this,'render','loadViewsAfterRender');
		debugTrace('DashboardView.initialize');
		this.render();
	},
	events: {
	},
	render:	function(){
		debugTrace('DashboardView.render');
		this.$el.empty()
		this.$el.html(this.template(this.model.toJSON()));
    	//return this;
		this.loadViewsAfterRender();
		this.updateDashboard();
	},
	loadViewsAfterRender:function(){
		var that = this;
		app.CRMApp.announcementCollection = new app.CRMApp.AnnouncementCollection();
		app.CRMApp.announcementCollection.url = global.basePath+'announcement/get';
		app.CRMApp.announcementCollection.fetch({
			success:function(){
				that.announcementFetchedSuccessHandler();
			},
			error:function(){
				that.announcementFetchedErrorHandler();
			}
		});
		//this.$el.find('#jq_announcementHolder').empty()
		
	},
	announcementFetchedSuccessHandler : function(){
		app.CRMApp.announcementListView = new app.CRMApp.AnnouncementListView({collection:app.CRMApp.announcementCollection});
		app.CRMApp.announcementListView.renderAll();
	},
	announcementFetchedErrorHandler : function(){
		alert('Error pull')
	},
	updateDashboard : function(){
		var that = this;
		app.CRMApp.dashboardModel = new app.CRMApp.DashboardModel();
		app.CRMApp.dashboardModel.url = global.basePath+'job/getDashboardData';
		app.CRMApp.dashboardModel.fetch({
			success:function(){
				that.updateDashboardFetchedSuccessHandler();
			},
			error:function(){
				that.updateDashboardFetchedErrorHandler();
			}
		});
	},
	updateDashboardFetchedSuccessHandler:function(){
		var dashboardModelO = app.CRMApp.dashboardModel;
		$('.jq_placeholderTotalClients').text(dashboardModelO.get('totalClients'));
		$('.jq_placeholderSubscribedClients').text(dashboardModelO.get('subscribedClients'));
		$('.jq_placeholderOpenJobs').text(dashboardModelO.get('openJobs'));
		$('.jq_placeholderReopenJobs').text(dashboardModelO.get('reopenJobs'));
		$('.jq_placeholderCompleatedJobs').text(dashboardModelO.get('compleatedJobs'));
		$('.jq_placeholderClosedJobs').text(dashboardModelO.get('closedJobs'));
		$('.jq_placeholderPendingJobs').text(dashboardModelO.get('pendingJobs'));
		
	},
	updateDashboardFetchedErrorHandler:function(){
		
		
	},
}); 

app.CRMApp.PageNotFoundView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#pageNotFoundView-template').html()),
	initialize:function(){
		_.bindAll(this,'render');
		debugTrace('PageNotFoundView.initialize');
		this.render();
	},
	events: {
	},
	render:	function(){
		debugTrace('PageNotFoundView.render');
		this.$el.html(this.template());
    	//return this;
	}
}); 

app.CRMApp.AddAnnouncementView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#addAnnouncementView-template').html()),
	initialize:function(){
		_.bindAll(this,'render','addAnnouncementBntClickedhandler');
		debugTrace('AddAnnouncementView.initialize');
	},
	events: {
		'click #jq_addAnnouncementBtn':'addAnnouncementBntClickedhandler'
	},
	render:	function(){
		debugTrace('AddAnnouncementView.render');
		this.$el.html(this.template());
    	//return this;
	},
	addAnnouncementBntClickedhandler:function(event){
		event.preventDefault();
		var formData = formDataToJson("jq_addAnnouncement");
		app.CRMApp.announcementModel = new app.CRMApp.AnnouncementModel(formData);
		app.CRMApp.announcementModel.url = global.basePath+'announcement/add';
		
			app.CRMApp.announcementModel.save(null,{
				success: this.announcementSavedSuccessHandler,
				error: this.announcementSavedErrorHandler,
				wait: true
			});
		
			//showAlertBox(true,'warning','VALIDATION','fill all the fields.');
		
	},
	announcementSavedSuccessHandler:function(){
		debugTrace('AddAnnouncementView.announcementSavedSuccessHandler');
		var message="Announcement added successfully.";
		showCallOut(true,'info','Awesome',message);
	},
	announcementSavedErrorHandler:function(){
		showAlertBox(true,'danger','OOPS','user not saved.');
	}
	
}); 

app.CRMApp.ManageAnnouncementView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#manageAnnouncementView-template').html()),
	initialize:function(){
		_.bindAll(this,'render');
		debugTrace('ManageAnnouncementView.initialize');
	},
	events: {
	},
	render:	function(){
		debugTrace('ManageAnnouncementView.render');
		this.$el.html(this.template());
    	//return this;
	}
});
app.CRMApp.ManageAnnouncementListView = Backbone.View.extend({
	tagName: 'tbody',
	el: '#jq_manageAnnouncementTable tbody',
	template: Handlebars.compile($('#manageAnnouncementListView-template').html()),
	initialize:function(){
		_.bindAll(this,'render','deleteButtonClickedHandler');
		debugTrace('ManageAnnouncementListView.initialize');
	},
	events: {
	 'click .jq_deleteAnnouncement':'deleteButtonClickedHandler'
	},
	render:	function(){
		debugTrace('ManageAnnouncementListView.render');
		var that = this;
		this.$el.empty();
		this.collection.each(function(modelM){
			that.$el.append(that.template(modelM.toJSON()));
		});//return this;
	},
	deleteButtonClickedHandler:function(event){
		var that = this;
		var $target = $(event.target);
		$target = $target.hasClass('btn') ? $target : $target.parent();
		var announcementId = $target.parent().attr('data-id');
		app.CRMApp.announcementModel= new app.CRMApp.AnnouncementModel({'announcementId': announcementId})
		app.CRMApp.announcementModel.url = global.basePath+'announcement/delete';
		app.CRMApp.announcementModel.fetch({
						type: 'POST', 
						data:{'announcementId':announcementId},
						success:function(model, response){
							debugTrace("ManageAnnouncementListView > deleteButtonClickedHandler : success")
							$target.closest('tr').remove()
							that.deleteSuccessHandler();
						},
						error:function(model, response){
							debugTrace("ManageAnnouncementListView > deleteButtonClickedHandler : error")
							alert('failed to Delete');
						}			
		})
	},
	deleteSuccessHandler:function(){
		showAlertBox(true,'success','SUCCESS','Announcement successfully deleted.');
	}
});  	
app.CRMApp.AnnouncementListView = Backbone.View.extend({
	tagName: 'div',
	el: '.jq_announcementBody',
	template: Handlebars.compile($('#announcementListView-template').html()),
	initialize:function(){
		debugTrace('announcementListView.initialize');
		_.bindAll(this,'render','renderAll');
	},
	events: {
	},
	render:	function(){
		debugTrace('announcementListView.render');
		this.$el.append(this.template(this.model));
    	//return this;
	},
	renderAll: function(){
		debugTrace('announcementListView.renderAll');
		var that = this;
		this.$el.empty();
		if(this.collection.length<=0){
			this.$el.html('<p>No announcement to display</p>')
		}
		this.collection.each(function(modelM){
			that.$el.append(that.template(modelM.toJSON()));
		});
	}
	
}); 	


app.CRMApp.AlertBoxView = Backbone.View.extend({
	tagName:'div',
	el:'#jq_alertBoxHolder',
	initialize:function(){
		debugTrace('AlertView.initialize');
		//_.bindAll(this, 'render', 'alertMe');
		//this.model.on('change',this.render())
		this.render();
	},
	template: _.template($('#alertBox-template').html()),
	
	render:	function(){
		debugTrace('AlertBoxView.render');
		this.$el.html(this.template( this.model.toJSON() ));
    	this.$el.children().delay(10000).fadeOut(1000);
		return this;
	},
	events: {
		
	}
});


app.CRMApp.CallOutView = Backbone.View.extend({
	tagName:'div',
	el:'#jq_callOutHolder',
	initialize:function(){
		debugTrace('CallOutView.initialize');
		//_.bindAll(this, 'render', 'alertMe');
		//this.model.on('change',this.render())
		this.render();
	},
	template: _.template($('#callOut-template').html()),
	
	render:	function(){
		debugTrace('CallOutView.render');
		this.$el.html(this.template( this.model.toJSON() ));
		return this;
	},
	events: {
		
	}
});

app.CRMApp.DateRangeComplaintSearchBoxView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#dateRangeComplaintSearchBox-template').html()),
	initialize:function(){
		debugTrace('DateRangeComplaintSearchBoxView.initialize');
		_.bindAll(this
				, 'render'
				,'advanceSearchBtnClickedHandler'
				);		
		this.render();
	},events:{
		'click #jq_advanceComplaintSearchBtn':'advanceSearchBtnClickedHandler',
		'click #jq_downloadCSVBtn':'downloadCSVBtnClickedHandler'
	},
	render:	function(){
		debugTrace('DateRangeComplaintSearchBoxView.render');
		this.$el.html(this.template());
		
		//Date range picker
        $('#jobDateRangePicker').daterangepicker({
                    format: 'DD/MM/YYYY'
					});
    	
    	return this;
	},
	advanceSearchBtnClickedHandler: function(){
		showAlertBox(false);
		
		var jobDateRangeS = $('#jobDateRangePicker').val();
		
		if(jobDateRangeS != ""){
			var jobDateRangeA = jobDateRangeS.split('-');
			var minDateS = jobDateRangeA[0].trim();
			var maxDateS = jobDateRangeA[1].trim();		
			minDateS = convertToTimeStamp(minDateS);		
			maxDateS = convertToTimeStamp(maxDateS);
			maxDateS = maxDateS.replace('00:00:00', '23:59:59');
			app.CRMApp.dateRangeComplaintSearchCollection.url= global.basePath+'report/advanceSearch';
			app.CRMApp.dateRangeComplaintSearchCollection.fetch({
													type: 'POST',
													data:{'minDate':minDateS,"maxDate":maxDateS},
													success:this.searchFetchSuccessHandler,
													error:this.searchFetchErrorHandler
												});
		}else{
			showAlertBox(true,'warning','VALIDATION',"choose a field don't fool.");
		}
	},
	searchFetchSuccessHandler: function(){
		
		$('#jq_complaintSearchResultTable tbody').empty();
		var ifHasResult = app.CRMApp.dateRangeComplaintSearchCollection.models[0].get('clientId') == undefined ? false : true;
			if(ifHasResult){
				showElement('#jq_downloadCSVBtn')
				app.CRMApp.dateRangeComplaintSearchCollection.each(function(searchResultModel){
					console.log(searchResultModel.get('firstName'));
					app.CRMApp.dateRangeComplaintSearchResultList = new app.CRMApp.DateRangeComplaintSearchResultList({model:searchResultModel});
					app.CRMApp.dateRangeComplaintSearchResultList.render();
				});
				showSearchResult();
			}else{
				showElement('#jq_downloadCSVBtn', false)
				showAlertBox(true,'warning','No Result','No result found.');
				showSearchResult(false);
			}
	},
	searchFetchErrorHandler: function(){
		showAlertBox(true,'warning','OOPS','Something went wrong.');
	},
	downloadCSVBtnClickedHandler: function(){
		showElement('#jq_downloadCSVBtn', false);
		var csvDataO = app.CRMApp.dateRangeComplaintSearchCollection.toJSON();
		var jobDateRangeS = $('#jobDateRangePicker').val()
		var reportTitleS = "CallListReport("+jobDateRangeS+")";
		JSONToCSVConvertor(csvDataO, reportTitleS , true);
	}

}); 
app.CRMApp.DateRangeComplaintSearchResult = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: _.template($('#dateRangeComplaintSearchResult-template').html()),
	initialize:function(){
		debugTrace('DateRangeComplaintSearchResult.initialize');
		this.render();
	},
	render:	function(){
		debugTrace('DateRangeComplaintSearchResult.render');
		this.$el.append(this.template());
    	return this;
	}
}); 
app.CRMApp.DateRangeComplaintSearchResultList = Backbone.View.extend({
	tagName: 'table',
	el: '#jq_complaintSearchResultTable tbody',
	template: Handlebars.compile($('#dateRangeComplaintSearchResultList-template').html()),
	initialize:function(){
		debugTrace('DateRangeComplaintSearchResultList.initialize');
		//this.$el.empty();
		//this.render()
	},
	render:	function(){
		debugTrace('DateRangeComplaintSearchResultList.render');
		this.$el.append(this.template(this.model.toJSON()));
    	return this;
	},
	addClientBtnClickedHandler:function(){
		alert('hi');
	}
}); 


app.CRMApp.ImportClientView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#importClient-template').html()),
	initialize:function(){
		_.bindAll(this
					, 'render'
					, 'resetGlobalVars'
					, 'importClientFilePickerChangeHandler'
					, 'importClientBtnClickedHandler'
					, 'addClient'
					, 'addClientHandler'
					, 'addJob'	
					, 'addPlan'
					, 'allClientsAdded'
					
					
					);
		debugTrace('ImportClientView.initialize');
	},
	events: {
		'change #jq_importClientFilePicker':'importClientFilePickerChangeHandler'
		, 'click #jq_importClientFilePickerBtn':'importClientBtnClickedHandler'
	},
	render:	function(){
		debugTrace('ImportClientView.render');
		this.$el.html(this.template());
    	//return this;
	},
	resetGlobalVars:function(){
		global.CSVData = [];
		global.CSVDataLoopCount =0;
		global.CSVDataTotalCount = 0;
		//progress bar
		$(".jq_totalCount").text(global.CSVDataTotalCount);
		$(".jq_compleatedProgressPercent").css('width',"0%");
	},
	importClientFilePickerChangeHandler:function(){
		this.resetGlobalVars();
	},
	importClientBtnClickedHandler:function(){
	
		this.resetGlobalVars();
		
		var that = this;
		var targetCSVFile = $('#jq_importClientFilePicker')[0].files[0]
		
		if(targetCSVFile != undefined){
			Papa.parse(targetCSVFile, {
			  header: true,
			  dynamicTyping: true,
			  complete: function(results) {
				global.CSVData = results.data;
				global.CSVData.pop();//remove last row
				if(!hasBlank(global.CSVData)){
					//console.log(JSON.stringify(global.CSVData));
					app.CRMApp.clientCollection = new app.CRMApp.ClientCollection(global.CSVData);
					app.CRMApp.jobCollection = new app.CRMApp.JobCollection(global.CSVData);
					app.CRMApp.planCollection = new app.CRMApp.PlanCollection(global.CSVData);
					
					global.CSVDataTotalCount = app.CRMApp.clientCollection.length;
					
					that.addClientHandler();
					
				}else{
					showAlertBox(true,'warning','VALIDATION','Check .CSV file for Blank values.');
				}
				
			  }
			});
			
		}else{
			showAlertBox(true,'warning','VALIDATION',global.message.validation.selectFile);
		}
	},
	addClientHandler:function(){
		console.log('handler');
		//progress bar
		//$(".jq_totalProgress").(global.CSVDataLoopCount)
		var compleatedProgressPercentN = (global.CSVDataLoopCount/global.CSVDataTotalCount)*100;
		$(".jq_totalCount").text(global.CSVDataTotalCount);
		$(".jq_compleatedProgressPercent").css('width',compleatedProgressPercentN+"%");
		$(".jq_compleatedCount").text(global.CSVDataLoopCount);
	
		$('.jq_compleatedProgressPercent').parent().addClass('active');
		
		if(global.CSVDataLoopCount < global.CSVDataTotalCount){
		 	this.addClient();
		}else{
			this.allClientsAdded();
			
		}
		
	},
	addClient:function(){
		console.log('one');
		var loopCounter = global.CSVDataLoopCount
		//app.CRMApp.clientCollection.models[loopCounter].save<--------------------------continue from here
		var clientM = app.CRMApp.clientCollection.models[loopCounter];
		clientM.set('antivirusExpDate', convertToTimeStamp(clientM.get('antivirusExpDate')));
		clientM.url = global.basePath+'import/addClient';
		clientM.save(null,{
			success: this.addJob,
			error: this.addJob,
			wait: true
		});
		
	},
	addJob:function(model, response){
		console.log('two');
		var loopCounter = global.CSVDataLoopCount
		var _clientId = response.clientId;
		var _userId = app.CRMApp.cRMAppModel.get('userId');
		var _technicianId = app.CRMApp.cRMAppModel.get('userId');
		var jobM = app.CRMApp.jobCollection.models[loopCounter];
		jobM.set({clientId:_clientId});
		jobM.set({userId:_userId});
		jobM.set({technicianId:_technicianId});
		jobM.url = global.basePath+'import/addJob';
		
		
		//global.CSVDataLoopCount++;
		
		jobM.save(null,{
			success: this.addPlan,
			error: this.addClientHandler,
			wait: true
		});
	},
	addPlan:function(model, response){
		console.log('three');
		
		
		var loopCounter = global.CSVDataLoopCount
		var _plansId = model.get('plansId');
		var _clientId = model.get('clientId');
		var _jobId = model.get('jobId');
		var _planStartDate = convertToTimeStamp(model.get('planStartDate'));
		var _userId = app.CRMApp.cRMAppModel.get('userId');
		var planM = app.CRMApp.planCollection.models[loopCounter];
		planM.set({plansId:_plansId});
		planM.set({clientId:_clientId});
		planM.set({jobId:_jobId});
		planM.set({userId:_userId});
		planM.set({planStartDate:_planStartDate});
		planM.url = global.basePath+'import/addPlan';
		
		
		global.CSVDataLoopCount++;
		
		planM.save(null,{
			success: this.addClientHandler,
			error: this.addClientHandler,
			wait: true
		});
	},
	allClientsAdded:function(){
		console.log('allClientsAdded');
		$('.jq_compleatedProgressPercent').parent().removeClass('active');
	}
	
	
});

app.CRMApp.JobByStatusView = Backbone.View.extend({
	tagName: 'section',
	el: '#jq_content',
	template: Handlebars.compile($('#jobByStatusView-template').html()),
	initialize:function(){
		_.bindAll(this,'render');
		debugTrace('JobByStatusView.initialize');
	},
	events: {
	},
	render:	function(){
		debugTrace('JobByStatusView.render');
		this.$el.html(this.template());
    	//return this;
	}
});
app.CRMApp.JobByStatusListView = Backbone.View.extend({
	tagName: 'tbody',
	el: '#jq_jobByStatusTable tbody',
	template: Handlebars.compile($('#jobByStatusListView-template').html()),
	initialize:function(){
		_.bindAll(this,'render');
		debugTrace('JobByStatusListView.initialize');
	},
	events: {
	 'click .jq_deleteAnnouncement':'deleteButtonClickedHandler'
	},
	render:	function(){
		debugTrace('JobByStatusListView.render');
		var that = this;
		this.$el.empty();
		this.collection.each(function(modelM){
			that.$el.append(that.template(modelM.toJSON()));
		});//return this;
	}
});  	


 /******************************************
 **************move to another file UTILITY CALLS****************
 ******************************************/
  function isBlank(objO){
	var flagB = false;
	if(objO.length < 2){
		flagB = true
	}
	return flagB;
  }
  function hasBlank(objO){
	var flagB = (objO.length == 0) ? true : false;
	var chkTitleOnceflagB = false;
	
	if(!flagB){
		$.each(objO,function(index, colO){
			var hasValueB = false;
			$.each(colO,function(key, value){
				//console.log(key+" "+value);
				if(key == "" && !chkTitleOnceflagB){
					console.log("header not proper");
					return true;
				}
				if(value == ""){
					console.log("has blank value");
					hasValueB = true;
				}
			})
			chkTitleOnceflagB = true;
			if(!hasValueB){
				return true;
			}
			
			
		});
	}
	return flagB;
  }