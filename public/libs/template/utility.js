//CONTROLS
var utility = {};
utility['debugFlag'] = false;
utility['debugPrefix'] = '+-->';
//DEBUG
function debugTrace(message){
	
	if(utility.debugFlag){
		var prefix = "DEBUG TRACE :: ";
		console.log(prefix + message);	
	}
}
function isUndefined(valueS){
	var flagB = false;
	if(valueS == null || valueS == undefined){
		flagB = true;
	}
	return flagB;

}
function formDataToJson(id){
	var arrayA = $("#"+id).serializeArray();
	var dataO = {};
	$.each(arrayA, function(i){
		var nameS = arrayA[i].name;
		var valueS = arrayA[i].value;
		dataO[nameS] = valueS; 
	});
	return dataO;
	
}
function convertToTimeStamp(dateS, timeS){
	var dateA = dateS.split('/'),
		timeStamp = "";
	if(timeS == undefined){
		timeS = "00:00:00";
	}
	dateS = dateA[2]+'-'+dateA[1]+'-'+dateA[0];
	timeStamp = dateS+' '+timeS;
	return timeStamp;
}
function validate(type, value){
	var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var number_filter = /^[0-9]*\d$/;
    var character_filter = /^[A-Za-z\s]+$/;
		
	var result = ( (value.toString()).trim() == "") ? false : true; 
	if(result){
		switch(type){
			case 'email':
				result = email_filter.test(value)           
				break;
			case 'number':
				result = number_filter.test(value)           
				break;
			case 'realNumber':
				result = (parseInt(value)<=0)? false : number_filter.test(value) ;
				break;				
			case 'phone':
				if(value.length < 8){
					result = false;
				}else{
					result = number_filter.test(value)           
				}
				break;
            case 'character':
				result = character_filter.test(value)           
				break;
            case 'date':
				result = ( (value == "") ||  (value == "0000-00-00 00:00:00") ) ? false : true;         
				break;
		
		}
	}
	return result;
}


function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
    
    var CSV = '';    
    //Set Report title in first row or line
    
    CSV += ReportTitle + '\r\n\n';

    //This condition will generate the Label/Header
    if (ShowLabel) {
        var row = "";
        
        //This loop will extract the label from 1st index of on array
        for (var index in arrData[0]) {
            
            //Now convert each value to string and comma-seprated
            row += index + ',';
        }

        row = row.slice(0, -1);
        
        //append Label row with line break
        CSV += row + '\r\n';
    }
    
    //1st loop is to extract each row
    for (var i = 0; i < arrData.length; i++) {
        var row = "";
        
        //2nd loop will extract each column and convert it in string comma-seprated
        for (var index in arrData[i]) {
            row += '"' + arrData[i][index] + '",';
        }

        row.slice(0, row.length - 1);
        
        //add a line break after each row
        CSV += row + '\r\n';
    }

    if (CSV == '') {        
        alert("Invalid data");
        return;
    }   
    
    //Generate a file name
    var fileName = "MyReport_";
    //this will remove the blank-spaces from the title and replace it with an underscore
    fileName += ReportTitle.replace(/ /g,"_");   
    
    //Initialize file format you want csv or xls
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
    
    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension    
    
    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");    
    link.href = uri;
    
    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";
    
    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function showElement(selectorS, flagB){
	flagB = (flagB == undefined) ? true : flagB;
	$(selectorS).toggleClass('hidden', !flagB);
	}