/*******************************
*********Author MIDHUN**********
***********router.js*************
*******************************/
app.CRMApp.Router = Backbone.Router.extend({
	routes:{
		"":"defaultPage",
		"dashboard": "dashboard",
		"user/add": "userAdd",
		"user/manage": "userManage",
		"announcement/add": "announcementAdd",
		"announcement/manage": "announcementManage",
		"search": "complaintSearch",
		"job/new/:clientId": "jobNew",
		"/job/list/:statusType": "jobList",
		"job/:jobId": "jobDetails",
		"client/new": "clientNew",
		"plan/new/:clientId":"planNew",
		"import/client": "importClient",
		"reports/callsBWDates":"reportsCallsBWDates",
		"/404": "404",
		"*unknown": "404"
		
	},
	defaultPage:function(){
		setPageHeading('Home', 'Home');
		Backbone.history.navigate('#dashboard', {trigger:true});
		
	},
	dashboard:function(){
		setPageHeading('Dashboard','View');
		var cRMAppModelM =  app.CRMApp.cRMAppModel;
		//app.CRMApp.dashboardView = new app.CRMApp.DashboardView();
		app.CRMApp.dashboardView = getBackboneInstanceView(app.CRMApp.dashboardView, app.CRMApp.DashboardView, {model:cRMAppModelM});
	},
	userAdd:function(){
		if(!isAdmin()){
			Backbone.history.navigate('#/404', {trigger:true});
			return false;
		}
		setPageHeading('User','Add')
		app.CRMApp.addUserView =(app.CRMApp.addUserView == undefined) ? new app.CRMApp.AddUserView() : app.CRMApp.addUserView;
		app.CRMApp.addUserView.render();
		
	},
	userManage:function(){
		if(!isAdmin()){
			Backbone.history.navigate('#/404', {trigger:true});
			return false;
		}
		setPageHeading('User','Manage')
		app.CRMApp.manageUserView = new app.CRMApp.ManageUserView();
	},
	complaintSearch:function(){
		setPageHeading('Job', 'Search');
		app.CRMApp.complaintSearchCollection = new app.CRMApp.ComplaintSearchCollection;
		app.CRMApp.complaintSearchBoxModel = new app.CRMApp.ComplaintSearchBoxModel(); 
		/*testing*/
		if(app.CRMApp.complaintSearchBoxView != undefined){
			app.CRMApp.complaintSearchBoxView.remove();
			var $contantWrapper = $('<section/>',{'id':'jq_content', 'class':'content'})
			$('.right-side').append($contantWrapper)
		}
		app.CRMApp.complaintSearchBoxView = new app.CRMApp.ComplaintSearchBoxView({model : app.CRMApp.complaintSearchBoxModel, collection: app.CRMApp.complaintSearchCollection});
		app.CRMApp.complaintSearchResult = new app.CRMApp.ComplaintSearchResult();
		app.CRMApp.complaintSearchResultList = new app.CRMApp.ComplaintSearchResultList({collection: app.CRMApp.complaintSearchCollection});	
		$('#example1').dataTable();
	},
	jobNew:function(clientId){
		setPageHeading('JOB','New');
		var jobModelM = getBackboneInstance(app.CRMApp.jobModel, app.CRMApp.JobModel);
		jobModelM.set('clientId', clientId);
		jobModelM.set('userId', app.CRMApp.cRMAppModel.get('userId'));
		if(jobModelM.get('dispositionId') == 0){
			jobModelM.set('dispositionId', 1)
		}
		app.CRMApp.addJobView = getBackboneInstanceView(app.CRMApp.addJobView, app.CRMApp.AddJobView, {model:jobModelM});
	},
	jobList:function(statusType){
		setPageHeading('JOB',statusType);
		var jobByStatusViewV = getBackboneInstanceView(app.CRMApp.jobByStatusView, app.CRMApp.JobByStatusView )
		jobByStatusViewV.render();
		var that = this;
		app.CRMApp.jobCollection = new app.CRMApp.JobCollection();
		switch(statusType){
			case 'open':
				app.CRMApp.jobCollection.url = global.basePath+'job/getOpenJobs'
				break;
			case 'reopen':
				app.CRMApp.jobCollection.url = global.basePath+'job/getReopenJobs'
				break;
			case 'pending':
				app.CRMApp.jobCollection.url = global.basePath+'job/getPendingJobs'
				break;
			case 'completed':
				app.CRMApp.jobCollection.url = global.basePath+'job/getCompletedJobs'
				break;
			default:
				alert('invalid status type')
		}
		//app.CRMApp.jobCollection.url = global.basePath+'job/getOpenJobs'
		app.CRMApp.jobCollection.fetch({
			success:function(){
				jobByStatusFetchedSuccessHandler();
			},
			error:function(){
				jobByStatusFetchedErrorHandler();
			}
		});
	},
	clientNew:function(){
		setPageHeading('Client','New');
		app.CRMApp.addClientView = new app.CRMApp.AddClientView();
	},
	planNew:function(clientId){
		setPageHeading('PLAN','New');
		app.CRMApp.planModel = getBackboneInstance(app.CRMApp.planModel, app.CRMApp.PlanModel);
		app.CRMApp.planModel.set('clientId', clientId);
		app.CRMApp.planModel.set('userId', app.CRMApp.cRMAppModel.get('userId'));
		
		app.CRMApp.addPlanView = getBackboneInstanceView(app.CRMApp.addPlanView,app.CRMApp.AddPlanView,{model:app.CRMApp.planModel})
	},
	jobDetails:function(jobId){
		setPageHeading('JOB','Details');
		app.CRMApp.jobDetailsModel = getBackboneInstance(app.CRMApp.jobDetailsModel, app.CRMApp.JobDetailsModel);
		var jobDetailsModelM = app.CRMApp.jobDetailsModel;
		jobDetailsModelM.set({'jobId':jobId});
		
		
		app.CRMApp.jobDetailsView = getBackboneInstanceView(app.CRMApp.jobDetailsView,app.CRMApp.JobDetailsView,{model:jobDetailsModelM})
		jobDetailsModelM.syncUp();
	},
	404:function(unknown){
		setPageHeading('404','Page not found');
		app.CRMApp.pageNotFoundView = new app.CRMApp.PageNotFoundView();
	},
	announcementAdd:function(){
		if(!isAdmin()){
			Backbone.history.navigate('#/404', {trigger:true});
			return false;
		}
		setPageHeading('Announcement','Add');
		app.CRMApp.addAnnouncementView = getBackboneInstanceView(app.CRMApp.addAnnouncementView, app.CRMApp.AddAnnouncementView);
		app.CRMApp.addAnnouncementView.render();
	},
	announcementManage:function(){
		if(!isAdmin()){
			Backbone.history.navigate('#/404', {trigger:true});
			return false;
		}
		setPageHeading('Announcement','Manage');
		app.CRMApp.manageAnnouncementView = new app.CRMApp.ManageAnnouncementView();
		app.CRMApp.manageAnnouncementView.render();
		var that = this;
		app.CRMApp.announcementCollection = new app.CRMApp.AnnouncementCollection()
		app.CRMApp.announcementCollection.url = global.basePath+'announcement/getAll'
		app.CRMApp.announcementCollection.fetch({
			success:function(){
				manageAnnouncementFetchedSuccessHandler();
			},
			error:function(){
				manageAnnouncementFetchedErrorHandler();
			}
		});
		
	},
	reportsCallsBWDates:function(){
		if(!isAdmin()){
			Backbone.history.navigate('#/404', {trigger:true});
			return false;
		}
		setPageHeading('Reports', 'Calls B/W Dates');
		app.CRMApp.dateRangeComplaintSearchCollection = new app.CRMApp.DateRangeComplaintSearchCollection;
		app.CRMApp.dateRangeComplaintSearchBoxModel = new app.CRMApp.DateRangeComplaintSearchBoxModel(); 
		/*testing
		if(app.CRMApp.complaintSearchBoxView != undefined){
			app.CRMApp.complaintSearchBoxView.remove();
			var $contantWrapper = $('<section/>',{'id':'jq_content', 'class':'content'})
			$('.right-side').append($contantWrapper)
		}*/
		app.CRMApp.dateRangeComplaintSearchBoxView = new app.CRMApp.DateRangeComplaintSearchBoxView({model : app.CRMApp.dateRangeComplaintSearchBoxModel, collection: app.CRMApp.dateRangeComplaintSearchCollection});
		app.CRMApp.dateRangeComplaintSearchResult = new app.CRMApp.DateRangeComplaintSearchResult();
		app.CRMApp.dateRangeComplaintSearchResultList = new app.CRMApp.DateRangeComplaintSearchResultList({collection: app.CRMApp.dateRangeComplaintSearchCollection});	
		$('#example1').dataTable();
	},
	importClient:function(){
		if(!isAdmin()){
			Backbone.history.navigate('#/404', {trigger:true});
			return false;
		}
		setPageHeading('Import','Client');
		app.CRMApp.importClientView = getBackboneInstanceView( app.CRMApp.importClientView , app.CRMApp.ImportClientView);
		app.CRMApp.importClientView.render();
	}
});