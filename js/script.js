$(document).ready(function(){
    $("#opinions").load("showopinions.php");
    console.log('ok');
    listener();
	$.ajaxSetup({
      cache:false
    });
});

function listener(){
    $("#send").click(function(event){
        event.preventDefault();
        validate();   
    });
}

function validate(){
    var valid = 0;
    var fname =$("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();
    var message = $("#message").val();
    $('.error p').remove();    
$.ajax({
        type:"POST",
	    cache: false,
        dataType:'json',
        url:"validate.php",
        data:{fname:fname,lname:lname,email:email, message:message}
    }).done(function(data){  
    if(data.error.fnameError){
            $('.error-fname').append("<p>" + data.error.fnameError + "</p>");
            $('.error-fname').css('display', 'block');
            valid+=1;
        }
    if(data.error.lnameError){
            $('.error-lname').append("<p>" + data.error.lnameError + "</p>");
            $('.error-lname').css('display', 'block');
            valid+=1;
        };
    
    if(data.error.emailError){
            $('.error-email').append("<p>" + data.error.emailError + "</p>");
            $('.error-email').css('display', 'block');
            valid+=1;
        };
    
    if(data.error.messageError){
        console.log(data.messageError);
        $('.error-message').append("<p>" + data.error.messageError + "</p>");
            $('.error-message').css('display', 'block');
            valid+=1;
        };
    
    var fname = data.dataPerson.fname;
    var lname = data.dataPerson.lname;
    var email = data.dataPerson.email;
    var message = data.dataPerson.message;
    
     if(valid===0){
        addOpinionToDB(fname,lname,email,message);
     }
    });
}

function addOpinionToDB(fname,lname,email,message){
    request = "";
    request = new XMLHttpRequest();
    request.msCaching = 'enabled';
    var url = "addopinion.php";
    var content = "fname=" + fname + "&lname=" + lname + "&email=" +email + "&message=" + message;  
    request.onreadystatechange = contentAdd;
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.send(content);
}         
function contentAdd(){
    if(request.readyState == 4 && request.status == 200){
        $("#opinions").load("showopinions.php");
	}
}