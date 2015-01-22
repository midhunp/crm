/*******************************
*********Author MIDHUN**********
***********shell.js*************
*******************************/

var app = app || {}; // creating namespace
app.CRMApp = app.CRMApp || {};


/******Application Specific**********/
var initializeCRMApp = function(){
	debugTrace('initializeCRMApp');
	preloadAppData();
}
var preloadAppData = function(){
	debugTrace('preloadAppData');
	app.CRMApp.rolesCollection = new app.CRMApp.RolesCollection;
	app.CRMApp.rolesCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	app.CRMApp.statusCollection = new app.CRMApp.StatusCollection;
	app.CRMApp.statusCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	app.CRMApp.issueTypeCollection = new app.CRMApp.IssueTypeCollection;
	app.CRMApp.issueTypeCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	app.CRMApp.antivirusBrandCollection = new app.CRMApp.AntivirusBrandCollection;
	app.CRMApp.antivirusBrandCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	app.CRMApp.computerBrandCollection = new app.CRMApp.ComputerBrandCollection;
	app.CRMApp.computerBrandCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	app.CRMApp.operatingSystemCollection = new app.CRMApp.OperatingSystemCollection;
	app.CRMApp.operatingSystemCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	app.CRMApp.dispositionCollection = new app.CRMApp.DispositionCollection;
	app.CRMApp.dispositionCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	app.CRMApp.tollFreeCollection = new app.CRMApp.TollFreeCollection;
	app.CRMApp.tollFreeCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	app.CRMApp.technicianCollection = new app.CRMApp.TechnicianCollection;
	app.CRMApp.technicianCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	app.CRMApp.activeUserCollection = new app.CRMApp.ActiveUserCollection;
	app.CRMApp.activeUserCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	app.CRMApp.userCollection = new app.CRMApp.UserCollection;
	app.CRMApp.userCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	app.CRMApp.jobStatusCollection = new app.CRMApp.JobStatusCollection;
	app.CRMApp.jobStatusCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
	
	app.CRMApp.plansCollection = new app.CRMApp.PlansCollection;
	app.CRMApp.plansCollection.fetch({
									success:function(){
										global.totalPreloaded++;	
									}
								});
						
	preloadedAppData();
}	
var preloadedAppData = function(){
	debugTrace('preloadedAppData');
	global.totalPreloadTimeOutCount++;
	if(global.totalPreloadTimeOutCount < global.totalPreloadTimeOut){
		if(global.totalPreloaded >= global.totalPreload){
			initializeBackbone();	
		}else{
			setTimeout(preloadedAppData, 1000);	
		}
	}
}	
var initializeBackbone = function(){
	app.CRMApp.cRMAppModel = new app.CRMApp.CRMAppModel();
	app.CRMApp.cRMAppModel.fetch();
	//resetUrl();
} 
var baseViewLoadedHandler = function(){
	app.CRMApp.router = new app.CRMApp.Router;
	Backbone.history.start();
	addTemplateEvents();
}
var addTemplateEvents =function(){
	$("body").on('click','.navbar-btn', function(e) {
        e.preventDefault();
        if ($(window).width() <= 992) {
            $('.row-offcanvas').toggleClass('active');
            $('.left-side').removeClass("collapse-left");
            $(".right-side").removeClass("strech");
            $('.row-offcanvas').toggleClass("relative");
        } else {
            $('.left-side').toggleClass("collapse-left");
            $(".right-side").toggleClass("strech");
        }
    });

}
var resetUrl = function(){
	Backbone.history.navigate('', {trigger:true});
}
var resetFormData = function(idS){
		
	$('#'+idS)[0].reset();
}
var showAlertBox = function(flagB,typeS,titleS,messageS){
	if(flagB){
		var alertBoxM = new app.CRMApp.AlertBoxModel();
		alertBoxM.set({type:typeS, title:titleS, message:messageS})
		app.CRMApp.alertBoxView = new app.CRMApp.AlertBoxView({model:alertBoxM});	
	}else{
		$('#jq_alertBoxHolder').empty();
	}
}

var showCallOut = function(flagB,typeS,titleS,messageS){
	if(flagB){
		$('#jq_content').empty().append('<div id="jq_callOutHolder"></div>');
		var callOutM = new app.CRMApp.CallOutModel();
		callOutM.set({type:typeS, title:titleS, message:messageS})
		app.CRMApp.callOutView = new app.CRMApp.CallOutView({model:callOutM});	
	}else{
		alert('hide');
	}
}
var showSearchResult = function(flagB){
	flagB = flagB == undefined ? true : false;
	$('#jq_searchResult').toggleClass('hidden',!flagB);
}

var setPageHeading=function(mainHeadingS, subHeadingS){
	$('.jq_pageMainHeading').text(mainHeadingS);
	$('.jq_pageSubHeading').text(subHeadingS);
	app.CRMApp.cRMAppModel.set({'pageMainHeading':mainHeadingS, 'pageSubHeading':subHeadingS});

}

var manageAnnouncementFetchedSuccessHandler = function(){
	var announcementCollectionC = app.CRMApp.announcementCollection;
	var hasResultB = (announcementCollectionC.models.length != 0)
	if(hasResultB){
		app.CRMApp.manageAnnouncementListView = new app.CRMApp.ManageAnnouncementListView({collection : announcementCollectionC});
		app.CRMApp.manageAnnouncementListView.render();
	}else{
		var noResultFoundH = '<tr><td colspan="7">No Result Found.</td></tr>';
		$('#jq_complaintSearchResultTable tbody' ).html(noResultFoundH);	
	}
}

var manageAnnouncementFetchedErrorHandler = function(){
	alert('featched failed');
}

var jobByStatusFetchedSuccessHandler = function(){
	var jobCollectionC = app.CRMApp.jobCollection;
	var hasResultB = (jobCollectionC.models[0].get('clientId') != 0)
	if(hasResultB){
		app.CRMApp.jobByStatusListView = getBackboneInstanceView(app.CRMApp.jobByStatusListView, app.CRMApp.JobByStatusListView,{collection : jobCollectionC});
		app.CRMApp.jobByStatusListView.render();
	}else{
		var noResultFoundH = '<tr><td colspan="7">No Result Found.</td></tr>';
		$('#jq_jobByStatusTable tbody' ).html(noResultFoundH);
		
		
	}
}

var jobByStatusFetchedErrorHandler = function(){
	alert('featched failed');
}


function getBackboneInstance(instanceO, instanceOfO, parameterJ){
	debugTrace('getBackboneInstance')
	parameterJ = (parameterJ == undefined) ? {} :  parameterJ;
	if(instanceO == undefined){
		instanceO = new instanceOfO(parameterJ);
	}else{
		 if(parameterJ.model != undefined){
			//instanceO.model.set(parameterJ.model.toJSON());
			instanceO.model.set(parameterJ.model.toJSON());
		 }
		 else{
			instanceO.set(parameterJ);
		 }
		 
	}
	return instanceO;
}

function getBackboneInstanceView(instanceO, instanceOfO, parameterJ){
	parameterJ = (parameterJ == undefined) ? {} :  parameterJ;
	if(instanceO != undefined){
		instanceO.undelegateEvents();
		instanceO.off();
		if(instanceO.model != undefined){
			instanceO.model.off();
		}
	}
	instanceO = new instanceOfO(parameterJ);
	return instanceO;
}

function getValue(type, idN){
    var collectionC = {};
	switch(type){
		case 'role':
			collectionC = app.CRMApp.rolesCollection;
			break;	
		case 'status':
			collectionC = app.CRMApp.statusCollection;
			break;	
		case 'issueType':
			collectionC = app.CRMApp.issueTypeCollection;
			break;	
		case 'technician':
			collectionC = app.CRMApp.technicianCollection;
			break;
		case 'tollFree':
			collectionC = app.CRMApp.tollFreeCollection;
			break;
		case 'disposition':
			collectionC = app.CRMApp.dispositionCollection;
			break;
		case 'jobStatus':
			collectionC = app.CRMApp.jobStatusCollection;
			break;
		case 'plans':
			collectionC = app.CRMApp.plansCollection;
			break;
	}
	var idS = idN.toString();
	var modelM = collectionC.where({id:idS})[0];
	
	return  typeof(modelM) == 'undefined' ? "undefined" : modelM.get('name');
}

function isAdmin(){
	var roleIdN = parseInt(app.CRMApp.cRMAppModel.get('role_id'));
	var flagB = false;
	if(roleIdN == 1){
		flagB = true;
	}
	return flagB;
}
				
//Ready
$(document).ready(function(){
	initializeCRMApp ();
});

