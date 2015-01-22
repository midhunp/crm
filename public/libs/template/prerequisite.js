/***********************************
**********Authour MIDHUN************
***********************************/

//GLOBAL VARIABLES
var global = {};
global['totalPreload'] = 12;
global['totalPreloaded'] = 0;
global['totalPreloadTimeOut'] = 100;
global['totalPreloadTimeOutCount'] = 0;

global['basePath'] = "http://localhost/CRM/";
global['message'] = {
						validation:{
								firstName		:"First name cannot be blank."
								, lastName		:"Last name cannot be blank."
								, email			:"Enter a valid email."
								, phone			:"Enter a valid phone number."
								, password		:"Password name cannot be blank."
								, role			:"Select a role."
								, active		:"Select a active."
								, tollFreeNumber:"Select a tollfree number."
								, computerBrand	:"Select a computer brand."
								, computerCountAtHome	:"Enter no of computer at home."
								, computerCountSubscribed	:"Enter no of computer subscribed."
								, operatingSystem	:"Select operating system."
								, antivirusBrand	:"Select a antivirus brand."
								, antivirusExpDate	:"Fill antivirus expiry date."
								, issueType		:"Select an issue type."
								, dispostion	:"Select user dispostion."
								, plansId       :"Choose a plan."
								, clientId		:"Enter valid client ID."
								, userId		:"Enter valid user ID."
								, planStartDate	:"Choose a plan start date."
								, selectFile	:"Select a File."
							}
					};

global['CSVData']=[];
global['CSVDataTotalCount']=0;
global['CSVDataLoopCount']=0;
global['CSVDataAddedCount']=0;
global['CSVDataFailedCount']=0;