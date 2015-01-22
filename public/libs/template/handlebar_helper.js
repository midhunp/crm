/*******************************
*********Author MIDHUN**********
***********handlebar_helper.js*************
*******************************/
Handlebars.registerHelper('ifCond', function(v1, v2, options) {
   v1 = isUndefined(v1) ? "undefined" : v1;
   v2 = isUndefined(v2) ? "undefined" : v2;
  if(v1 === v2) {
    return options.fn(this);
  }
  return options.inverse(this);
});

Handlebars.registerHelper('equal', function(lvalue, rvalue, options) {
	lvalue = isUndefined(lvalue) ? "undefined" : lvalue;
	rvalue = isUndefined(rvalue) ? "undefined" : rvalue;
    if( lvalue.toString() == rvalue.toString() ) {
        return options.fn(this);
    }
	return options.inverse(this);
 
});
Handlebars.registerHelper('notEqual', function(lvalue, rvalue, options) {
    lvalue = isUndefined(lvalue) ? "undefined" : lvalue;
	rvalue = isUndefined(rvalue) ? "undefined" : rvalue;
	if( lvalue.toString() != rvalue.toString() ) {
        return options.fn(this);
    }
	return options.inverse(this);
  
});


Handlebars.registerHelper('list', function(type, select, options) {
    select = (select == undefined) ? 0 : parseInt(select)
	var collectionC = {};
	var htmlS = "";
	var isSelectedS = "";
	switch(type){
		case 'getRole':
			collectionC = app.CRMApp.rolesCollection;
			break;	
		case 'getIssueType':
			collectionC = app.CRMApp.issueTypeCollection;
			break;	
		case 'getTollFree':
			collectionC = app.CRMApp.tollFreeCollection;
			break;
		case 'getDisposition':
			collectionC = app.CRMApp.dispositionCollection;
			break;
		case 'getComputerBrand':
			collectionC = app.CRMApp.computerBrandCollection;
			break;
		case 'getAntivirusBrand':
			collectionC = app.CRMApp.antivirusBrandCollection;
			break;	
		case 'getOperatingSystem':
			collectionC = app.CRMApp.operatingSystemCollection;
			break;
		case 'getTechnician':
			collectionC = app.CRMApp.technicianCollection;
			break;
		case 'getActiveUser':
			collectionC = app.CRMApp.activeUserCollection;
			break;
		case 'getJobStatus':
			collectionC = app.CRMApp.jobStatusCollection;
			break;
		case 'getPlans':
			collectionC = app.CRMApp.plansCollection;
			break;
	}
	collectionC.each(function(modelM){
		isSelectedS = (modelM.get('id') == select) ? "selected" : "";
		htmlS += '<option value="'+modelM.get('id')+'" '+ isSelectedS +'>'+modelM.get('name')+'</option>'
	});
	return new Handlebars.SafeString(htmlS);
});

Handlebars.registerHelper('activeList', function( select, options) {
    select = (select == undefined) ? 0 : parseInt(select)
	var activeListA = [{id:1, name:'Active'},{id:2, name:'Deactive'}]
	var htmlS = "";
	var isSelectedS = "";
	$.each(activeListA, function(i){
		isSelectedS = (activeListA[i].id == select) ? "selected" : "";
		htmlS += '<option value="'+activeListA[i].id+'" '+isSelectedS+'>'+activeListA[i].name+'</option>'
	});
	return new Handlebars.SafeString(htmlS);
});

Handlebars.registerHelper('getValue', function(type, idN, options) {
    /*var collectionC = {};
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
	}
	var idS = idN.toString();
	var modelM = collectionC.where({id:idS})[0];
	return modelM.get('name');*/
	return getValue(type, idN);
});

Handlebars.registerHelper('getTimeStamp', function(timeStamp, formatS, options) {
	//dd/mm/yy hr:min:sec
	var timeStampA = timeStamp.split(" ");     
	var dateS = timeStampA[0]
	var timeS = timeStampA[1];
	var dateA = dateS.split('-');
	var timeA = timeS.split(':')
	var result="";
	if(timeStamp == undefined){
		timeStamp = '0000-00-00 00:00:00'; 
	}
	var timeStampO= new Date(timeStamp),
		hr = timeA[0],
		min = timeA[1],
		sec = timeA[2],
		yy = dateA[0],
		mm = dateA[1],
		dd = dateA[2];
	result = formatS.replace('hr', hr).replace('min', min).replace('sec', sec).replace('dd', dd).replace('mm', mm).replace('yy', yy);
	return result;
});
