/*******************************
*********Author MIDHUN**********
***********collection.js*************
*******************************/
app.CRMApp.CRMCollection = Backbone.Collection.extend({
	initialize: function(){
		debugTrace('CRMCollection.initialize')
	}
	
});

app.CRMApp.RolesCollection = Backbone.Collection.extend({
	model:app.CRMApp.RolesModel,
	url: global.basePath+'user/getRoles',
	initialize: function(){
		debugTrace('RolesCollection.initialize')
	}
});

app.CRMApp.StatusCollection = Backbone.Collection.extend({
	model:app.CRMApp.StatusModel,
	url: global.basePath+'user/getStatus',
	initialize: function(){
		debugTrace('StatusCollection.initialize')
	}
});

app.CRMApp.IssueTypeCollection = Backbone.Collection.extend({
	model:app.CRMApp.IssueTypeModel,
	url: global.basePath+'job/getIssueType',
	initialize: function(){
		debugTrace('IssueTypeCollection.initialize')
	}
});

app.CRMApp.AntivirusBrandCollection = Backbone.Collection.extend({
	model:app.CRMApp.AntivirusBrandModel,
	url: global.basePath+'job/getAntivirusBrand',
	initialize: function(){
		debugTrace('AntivirusBrandCollection.initialize')
	}
});

app.CRMApp.ComputerBrandCollection = Backbone.Collection.extend({
	model:app.CRMApp.ComputerBrandModel,
	url: global.basePath+'job/getComputerBrand',
	initialize: function(){
		debugTrace('ComputerBrandCollection.initialize')
	}
});

app.CRMApp.OperatingSystemCollection = Backbone.Collection.extend({
	model:app.CRMApp.OperatingSystemModel,
	url: global.basePath+'job/getOperatingSystem',
	initialize: function(){
		debugTrace('OperatingSystemCollection.initialize')
	}
});

app.CRMApp.DispositionCollection = Backbone.Collection.extend({
	model:app.CRMApp.DispositionModel,
	url: global.basePath+'job/getDisposition',
	initialize: function(){
		debugTrace('DispositionCollection.initialize')
	}
});

app.CRMApp.TollFreeCollection = Backbone.Collection.extend({
	model:app.CRMApp.TollFreeModel,
	url: global.basePath+'job/getTollFree',
	initialize: function(){
		debugTrace('TollFreeCollection.initialize')
	}
});

app.CRMApp.UserCollection = Backbone.Collection.extend({
	model:app.CRMApp.UserModel,
	url: global.basePath+'user/getAllUsers',
	initialize: function(){
		debugTrace('UserCollection.initialize');
		this.on( "change", this.notify, this);
		//this.on( "change:age", this.changeAge, this);
	},
	notify : function(){
		debugTrace('changed');
		
	}
	
});

app.CRMApp.TechnicianCollection = Backbone.Collection.extend({
	model:app.CRMApp.TechnicianModel,
	url: global.basePath+'user/getTechnician',
	initialize: function(){
		debugTrace('TechnicianCollection.initialize')
	}
});

app.CRMApp.ActiveUserCollection = Backbone.Collection.extend({
	model:app.CRMApp.ActiveUserModel,
	url: global.basePath+'user/getActiveUser',
	initialize: function(){
		debugTrace('ActiveUserCollection.initialize')
	}
});

app.CRMApp.PlansCollection = Backbone.Collection.extend({
	model:app.CRMApp.PlansModel,
	url: global.basePath+'job/getPlans',
	initialize: function(){
		debugTrace('PlansCollection.initialize')
	}
});
app.CRMApp.PlanCollection = Backbone.Collection.extend({
	model:app.CRMApp.PlanModel,
	initialize: function(){
		debugTrace('PlanCollection.initialize')
	}
});
app.CRMApp.JobStatusCollection = Backbone.Collection.extend({
	model:app.CRMApp.JobStatusModel,
	url: global.basePath+'job/getJobStatus',
	initialize: function(){
		debugTrace('JobStatusCollection.initialize')
	}
});

app.CRMApp.ClientCollection = Backbone.Collection.extend({
	model:app.CRMApp.ClientModel,
	url: global.basePath+'client/getClients',
	initialize: function(){
		debugTrace('ClientCollection.initialize');
		this.on( "change", this.notify, this);
		//this.on( "change:age", this.changeAge, this);
	},
	notify : function(){
		//alert('changed 2');
		
	}
		
});
app.CRMApp.JobCollection = Backbone.Collection.extend({
	model:app.CRMApp.JobModel,
	url: global.basePath+'job/add',
	initialize: function(){
		debugTrace('JobCollection.initialize');
		this.on( "change", this.notify, this);
		//this.on( "change:age", this.changeAge, this);
	},
	notify : function(){
		//alert('changed 1');
		
	}
		
});

app.CRMApp.ComplaintSearchCollection = Backbone.Collection.extend({
	model:app.CRMApp.ComplaintSearchBoxModel,
	url: global.basePath+'job/search',
	initialize: function(){
		debugTrace('ComplaintSearchCollection.initialize');
		this.on( "change", this.notify, this);
		//this.on( "change:age", this.changeAge, this);
	},
	notify : function(){
		alert('changed 3');
		
	}
	
});

app.CRMApp.JobDetailsCommentListCollection = Backbone.Collection.extend({
	model:app.CRMApp.JobDetailsCommentListModel,
	url: global.basePath+'comment/getAll',
	initialize: function(){
		debugTrace('JobDetailsCommentListCollection.initialize');
		this.on( "change", this.notify, this);
		//this.on( "change:age", this.changeAge, this);
	},
	notify : function(){
		alert('changed 4');
		
	}
	
});

app.CRMApp.AnnouncementCollection = Backbone.Collection.extend({
	model:app.CRMApp.AnnouncementModel,
	initialize: function(){
		debugTrace('AnnouncementCollection.initialize');
		//this.on( "change", this.notify, this);
		//this.on( "change:age", this.changeAge, this);
	}
});

app.CRMApp.DateRangeComplaintSearchCollection = Backbone.Collection.extend({
	model:app.CRMApp.DateRangeComplaintSearchBoxModel,
	url: global.basePath+'job/search',
	initialize: function(){
		debugTrace('ComplaintSearchCollection.initialize');
		this.on( "change", this.notify, this);
		//this.on( "change:age", this.changeAge, this);
	},
	notify : function(){
		alert('changed 5');
		
	}
	
});