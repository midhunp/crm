/*******************************
*********Author MIDHUN**********
********shell_login.js**********
*******************************/

var initLogin = function(){
	$("#jq_loginForm").submit(login);
	}

function login(event){
	var formData = $("#jq_loginForm").serialize();
	$.ajax({
		url: "http://localhost/CRM/user/login",
  		type: "POST",
		data: formData,
		dataType:"json",
  		success: function(data){
			if(data.loggedIn){
				window.location.href = "http://localhost/CRM/";	
			}else{
				resetForm('jq_loginForm');
				$('#jq_loginForm .alert').fadeIn(1000).delay(3000).fadeOut(1000);	
			}
		}
	});
	return false;
}
$(document).ready(initLogin);


/******************************
***********utility*************
******************************/
function resetForm(id){
	$('#'+id).find('.form-control').val('');
	
}


