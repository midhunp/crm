/*******************************
*********Author MIDHUN**********
***********model.js*************
*******************************/


app.CRMApp.CRMAppModel = Backbone.Model.extend({
	defaults:{
		isLoggedIn:"",
		pageMainHeading:"undefined",
		pageMainSubHeading:"undefined"
	},
	initialize:	function(){
		debugTrace('CRMAppModel > initailize()');
		this.on('change:isLoggedIn', this.notify, this);
	},
	urlRoot:global.basePath+'user/getDetails',
	notify: function(data){
		debugTrace('CRMAppModel > notify()');
		var dataO = this.toJSON();
		if(dataO.isLoggedIn && (dataO.active==1)){
			app.CRMApp.cRMView = new app.CRMApp.CRMView({model:this});
			
			
		}else{
			window.location.href = global.basePath+'login';	
		}
		//app.CRMApp.sidebarView= new app.CRMApp.SidebarView({model:app.CRMApp.userModel});
	}
	
});

app.CRMApp.CurrentUserModel = Backbone.Model.extend({
	initialize:	function(){
		debugTrace('CurrentUserModel > initailize()');
		this.on('change:firstName', this.notify, this);
        this.on('change', this.notifyAll, this);
	},
	urlRoot:global.basePath+'user/getDetails',
	notify: function(){
		alert("notify");
	},
	notifyAll: function(data){
		var dataO = this.toJSON();
		if(dataO.isLoggedIn){
				
			
		}else{
			window.location.href = global.basePath+'login';	
		}
		//app.CRMApp.sidebarView= new app.CRMApp.SidebarView({model:app.CRMApp.userModel});
	}
	
});
app.CRMApp.UserModel = Backbone.Model.extend({
	defaults:{
		userId:0,
		firstName:"",
		lastName:"",
		email:"",
		phone:"",
		password:"",
		role_id:0,
		active:0
	},
	initialize:	function(){
		debugTrace('UserModel > initailize()');
		this.on('invalid', function(model,error){
			showAlertBox(true,'warning','VALIDATION',error);
		});
	},
	validate:function(attrs){
		if(!validate('character',attrs.firstName)){
			return global.message.validation.firstName;		
		}
		if(!validate('character',attrs.lastName)){
			return global.message.validation.lastName;		
		}
		if(!validate('email',attrs.email)){
			return global.message.validation.email;	
		}
		if(!validate('phone',attrs.phone)){
			return global.message.validation.phone;		
		}
		if(!validate('blank',attrs.password)){
			return global.message.validation.password;	
		}
		
		if(!validate('realNumber',attrs.role_id)){
			return global.message.validation.role;	
		}
		if(!validate('number',attrs.active)){
			return global.message.validation.active;		
		}
	}
	
});
app.CRMApp.ClientModel = Backbone.Model.extend({
	defaults:{
		clientId:0,
		firstName:"",
		lastName:"",
		email:"",
		phone:"",
		tollFreeId:0,
		computerBrandId:0,
		computerCountAtHome:0,
		computerCountSubscribed:0,
		operatingSystemId:0,
		antivirusBrandId:0,
		antivirusExpDate:"0000-00-00 00:00:00",
		
		
	},
	initialize:	function(){
		debugTrace('ClientModel > initailize()');
		this.on('invalid', function(model,error){
			showAlertBox(true,'warning','VALIDATION',error);
		});
	},
	validate:function(attrs){
		if(!validate('character',attrs.firstName)){
			return global.message.validation.firstName;
		}
		if(!validate('character',attrs.lastName)){
			return global.message.validation.lastName;	
		}
		if(!validate('email',attrs.email)){
			return global.message.validation.email;	
		}
		if(!validate('phone',attrs.phone)){
			return global.message.validation.phone;		
		}
		if(!validate('realNumber',attrs.tollFreeId)){
			return global.message.validation.tollFreeNumber;	
		}
		if(!validate('realNumber',attrs.computerBrandId)){
			return global.message.validation.computerBrand;	
		}
		if(!validate('realNumber',attrs.computerCountAtHome)){
			return global.message.validation.computerCountAtHome;	
		}
		if(!validate('number',attrs.computerCountSubscribed)){
			return global.message.validation.computerCountSubscribed;		
		}
		if(!validate('realNumber',attrs.operatingSystemId)){
			return global.message.validation.operatingSystem;		
		}
		if(!validate('realNumber',attrs.antivirusBrandId)){
			return global.message.validation.antivirusBrand;		
		}
		if(!validate('blank',attrs.antivirusExpDate)){
			return global.message.validation.antivirusExpDate;		
		}
	},
	syncUp:function(){
		var clientEmailS = this.get('email');
		this.url = global.basePath+'client/getDetails';
		this.fetch({
						type: 'POST', 
						data:{'field':'email',"value":clientEmailS},
						success:function(model, response){
							debugTrace("ClientModel > syncUp : success")
						},
						error:function(model, response){
							debugTrace("ClientModel > syncUp : error")
						}
						
		})	
		
		
	}
	
});

app.CRMApp.JobModel = Backbone.Model.extend({
	defaults:{
		jobId:0,
		clientId:0,
		userId:0,
		technicianId:0,
		issueTypeId:0,
		otherIssue:"",
		dispositionId:0,
		comment:"",
		jobStatusId:0,
		createdDate:""
	},
	initialize:	function(){
		debugTrace('JobModel > initailize()');
		//this.on('change:firstName', this.notify, this);
        //this.on('change', this.notifyAll, this);
		this.on('invalid', function(model,error){
			showAlertBox(true,'warning','VALIDATION',error);
		});
	},
	validate:function(attrs){
		if(!validate('realNumber',attrs.issueTypeId)){
			return global.message.validation.issueType;	
		}
		if(!validate('realNumber',attrs.dispositionId)){
			return global.message.validation.disposition;	
		}
	},
	syncUp:function(){
		var clientEmailS = this.get('email');
		this.url = global.basePath+'client/getDetails';
		this.fetch({
						type: 'POST', 
						data:{'field':'email',"value":clientEmailS},
						success:function(model, response){
							debugTrace("JobModel > syncUp : success")
						},
						error:function(model, response){
							debugTrace("JobModel > syncUp : error")
						}
						
		});	
	}
	
});

app.CRMApp.PlanModel = Backbone.Model.extend({
	defaults:{
		planId:0
		, plansId:0
		, clientId:0
		, userId:0
		, planStartDate:"0000-00-00 00:00:00"
		, planEndDate:"0000-00-00 00:00:00"
	},
	initialize:	function(){
		debugTrace('PlanModel > initailize()');
		this.on('invalid', function(model,error){
			showAlertBox(true,'warning','VALIDATION',error);
		});
	},
	validate:function(attrs){
		if(!validate('realNumber',attrs.plansId)){
			return global.message.validation.plansId;	
		}
		if(!validate('realNumber',attrs.clientId)){
			return global.message.validation.clientId;	
		}
		if(!validate('realNumber',attrs.userId)){
			return global.message.validation.userId;	
		}
		if(!validate('date',attrs.planStartDate)){
			return global.message.validation.planStartDate;	
		}
	},
	syncUp:function(){
		var clientEmailS = this.get('email');
		this.url = global.basePath+'client/getDetails';
		this.fetch({
						type: 'POST', 
						data:{'field':'email',"value":clientEmailS},
						success:function(model, response){
							debugTrace("JobModel > syncUp : success")
						},
						error:function(model, response){
							debugTrace("JobModel > syncUp : error")
						}
						
		});	
	}
	
});

app.CRMApp.ComplaintSearchBoxModel = Backbone.Model.extend({
	defaults:{	
		selected:"",
		searchValue:""
	},
	initialize:	function(){
		debugTrace('ComplaintSearchBoxModel > initailize()');
		//this.on('change:firstName', this.notify, this);
        //this.on('change', this.notifyAll, this);
	},
	validate:function(attrs){
		/*if(attrs.firstName == ""){
			return "First name cannot be blank.";	
		}
		if(attrs.lastName == ""){
			return "Last name cannot be blank.";	
		}
		if(attrs.email == ""){
			return "E-mail cannot be blank.";	
		}
		if(atrs.password == ""){
			return "E-mail cannot be blank.";	
		}
		if(attrs.phone == ""){// is taking as string
			return "Phone number must be valid.";	
		}
		if(attrs.role_id == ""){ // is taking as string
			return "Role must be selected.";	
		}
		if(attrs.active == ""){// is taking as string
			return "Active must be selected.";	
		}*/
	}
	
});
app.CRMApp.ComplaintSearchResultModel = Backbone.Model.extend({
	defaults:{	jobId:0,
				createdDate:"0000-00-00 00:00:00",
				issueTypeId: 0,
				jobStatusId: 0,
				firstName: "",
				lastName:"",
				phone:"",
				clientId:0
	},
	initialize:	function(){
		debugTrace('ComplaintSearchResultModel > initailize()');
		//this.on('change:firstName', this.notify, this);
        //this.on('change', this.notifyAll, this);
	},
	validate:function(attrs){
		/*if(attrs.firstName == ""){
			return "First name cannot be blank.";	
		}
		if(attrs.lastName == ""){
			return "Last name cannot be blank.";	
		}
		if(attrs.email == ""){
			return "E-mail cannot be blank.";	
		}
		if(atrs.password == ""){
			return "E-mail cannot be blank.";	
		}
		if(attrs.phone == ""){// is taking as string
			return "Phone number must be valid.";	
		}
		if(attrs.role_id == ""){ // is taking as string
			return "Role must be selected.";	
		}
		if(attrs.active == ""){// is taking as string
			return "Active must be selected.";	
		}*/
	}
	
});

app.CRMApp.JobDetailsModel = Backbone.Model.extend({
	defaults:{
		jobId:0,
		userId:0,
		technicianId:0,
		issueTypeId:0,
		otherIssue:"",
		dispositionId:0,
		jobComment:"",
		jobStatusId:0,
		jobCreatedDate:"",
		clientId:0,
		clientFirstName:"undefined",
		clientLastName:"undefined",
		clientEmail:"undefined",
		clientPhone:"0000000000",
		tollFreeId:0,
		planId:0,
		plansId:0,
		planStartDate:"0000-00-00 00:00:00",
		planEndDate:"0000-00-00 00:00:00",
		planRemaingDays:0,
		showChangeStatusFlag:false,
		showReopenBtnFlag:false,
		assignToTechnicianFlag:false
	},
	initialize:	function(){
	this.on('change', this.modelLogic, this);
		debugTrace('JobDetailsModel > initailize()');
	},
	validate:function(attrs){
		
	},
	syncUp:function(){
		var jobIdN = this.get('jobId');
		this.url = global.basePath+'job/getDetails';
		this.fetch({
						type: 'POST', 
						data:{'jobId':jobIdN},
						success:function(model, response){
							debugTrace("JobDetailsModel > syncUp : success")
							model.set(response);
						},
						error:function(model, response){
							debugTrace("JobDetailsModel > syncUp : error")
						}
				});
	},
	modelLogic:function(){
		var technicianIdN = parseInt(this.get('technicianId'));
		var userIdN = parseInt(app.CRMApp.cRMAppModel.get('userId'));
		var jobStatusIdN = parseInt(this.get('jobStatusId'));
		var planRemaingDaysN = parseInt(this.get('planRemaingDays'));
		var showChangeStatusFlagB =  ((technicianIdN == userIdN) && (planRemaingDaysN > 0) && (jobStatusIdN != 4)) ? true : false; 
		var showReopenBtnFlagB =  ((planRemaingDaysN > 0) && ((jobStatusIdN == 4) || (jobStatusIdN == 3)) );
		var assignToTechnicianFlagB =( (userIdN == technicianIdN) && ( !( (jobStatusIdN == 4) || (jobStatusIdN == 3) ) ) );
		this.set('showChangeStatusFlag',showChangeStatusFlagB);
		this.set('showReopenBtnFlag',showReopenBtnFlagB);
		this.set('assignToTechnicianFlag',assignToTechnicianFlagB);
		
	}
	
});

app.CRMApp.JobDetailsCommentModel = Backbone.Model.extend({
	defaults:{
		jobId:0,
		userId:0,
		jobComment:""
	},
	initialize:	function(){
		debugTrace('JobDetailsCommentModel > initailize()');
	},
	validate:function(attrs){
	
	}
	
});

app.CRMApp.JobDetailsCommentListModel = Backbone.Model.extend({
	defaults:{
		jobCommentId:0,
		jobId:0,
		userId:0,
		jobComment:"",
		postedOn:""
	},
	initialize:	function(){
		debugTrace('JobDetailsCommentListModel > initailize()');
	}
	
});

app.CRMApp.HeaderModel = Backbone.Model.extend({
	initialize:	function(){
        debugTrace('HeaderModel > initailize()');		
	}
});


app.CRMApp.RolesModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('RolesModel.initailize()');
		
	}
});

app.CRMApp.StatusModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('StatusModel.initailize()');
		
	}
});

app.CRMApp.IssueTypeModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('IssueTypeModel.initailize()');
		
	}
});

app.CRMApp.AntivirusBrandModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('AntivirusBrandModel.initailize()');
		
	}
});

app.CRMApp.ComputerBrandModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('ComputerBrandModel.initailize()');
		
	}
});

app.CRMApp.OperatingSystemModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('OperatingSystemModel.initailize()');
		
	}
});

app.CRMApp.DispositionModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('DispositionModel.initailize()');
		
	}
});

app.CRMApp.TollFreeModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('TollFreeModel.initailize()');
		
	}
});

app.CRMApp.TechnicianModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('TechnicianModel.initailize()');
		
	}
});
app.CRMApp.ActiveUserModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('ActiveUserModel.initailize()');
		
	}
});


app.CRMApp.JobStatusModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('jobStatusModel.initailize()');
		
	}
});

app.CRMApp.LogoutModel = Backbone.Model.extend({
	url:global.basePath+'user/logout',
	initialize:	function(){
        debugTrace('LogoutModel > initailize()');
	}
});

app.CRMApp.AnnouncementModel = Backbone.Model.extend({
	defaults:{
		announcementId:0,
		title:"",
		message:"",
		userId:0,
		createdDate:'0000-00-00 00:00:00'
	},
	initialize:	function(){
        debugTrace('AnnouncementModel > initailize()');
		this.on('invalid', function(model,error){
			showAlertBox(true,'warning','VALIDATION',error);
		});
	},
	validate:function(attrs){
		if(attrs.title == ""){
			return "Title cannot be blank.";	
		}
		if(attrs.message == ""){
			return "Message cannot be blank.";	
		}
	}
	
});

app.CRMApp.DateRangeComplaintSearchBoxModel = Backbone.Model.extend({
	defaults:{
	},
	initialize:	function(){
		debugTrace('ComplaintSearchBoxModel > initailize()');
		//this.on('change:firstName', this.notify, this);
        //this.on('change', this.notifyAll, this);
	},
	validate:function(attrs){
		/*if(attrs.firstName == ""){
			return "First name cannot be blank.";	
		}
		if(attrs.lastName == ""){
			return "Last name cannot be blank.";	
		}
		if(attrs.email == ""){
			return "E-mail cannot be blank.";	
		}
		if(atrs.password == ""){
			return "E-mail cannot be blank.";	
		}
		if(attrs.phone == ""){// is taking as string
			return "Phone number must be valid.";	
		}
		if(attrs.role_id == ""){ // is taking as string
			return "Role must be selected.";	
		}
		if(attrs.active == ""){// is taking as string
			return "Active must be selected.";	
		}*/
	}
	
});

app.CRMApp.AlertBoxModel = Backbone.Model.extend({
	defaults:{
		type:"",
		title:"",
		message:""
	},
	initialize:	function(){
        debugTrace('AlertBoxModel > initailize()');
		
	}
	
});

app.CRMApp.CallOutModel = Backbone.Model.extend({
	defaults:{
		type:"",
		title:"",
		message:""
	},
	initialize:	function(){
        debugTrace('CallOutModel > initailize()');
		
	}
	
});
app.CRMApp.PlansModel = Backbone.Model.extend({
	defaults:{
		id:0,
		name:"Not defined"
	},
	initialize:	function(){
        debugTrace('PlansModel.initailize()');
		
	}
});

app.CRMApp.DashboardModel = Backbone.Model.extend({
	defaults:{
		totalClients:0,
		subscribedClients:0,
		openJobs:0,
		reopenJobs:0,
		compleatedJobs:0,
		closedJobs:0,
		pendingJobs:0
		
	},
	initialize:	function(){
		debugTrace('DashboardModel > initailize()');
	},
	validate:function(attrs){
		/*if(!validate('character',attrs.firstName)){
			return global.message.validation.firstName;		
		}*/
		
	}
	
});
