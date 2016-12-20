$(document).ready(function(){
    $("#opinions").load("showopinions.php");
    listener();
});

function listener(){
    $("#send").click(function(event){
        event.preventDefault();
        validate();   
    });
}

function validate(){
    var valid = 0;
    var fname = escape($("#fname").val());
    var lname = escape($("#lname").val());
    var email = escape($("#email").val());
    var message = escape($("#message").val());
    $('.error p').remove();    
$.ajax({
        type:"POST",
        dataType:'json',
        url:"validate.php",
        data:{fname:fname,lname:lname,email:email, message:message}
    }).done(function(data){  
    if(data.fname){
            $('.error-fname').append("<p>" + data.fname + "</p>");
            $('.error-fname').css('display', 'block');
            valid+=1;
        }
    if(data.lname){
            $('.error-lname').append("<p>" + data.lname + "</p>");
            $('.error-lname').css('display', 'block');
            valid+=1;
        };
    
    if(data.email){
            $('.error-email').append("<p>" + data.email + "</p>");
            $('.error-email').css('display', 'block');
            valid+=1;
        };
    
    if(data.message){
        $('.error-message').append("<p>" + data.message + "</p>");
            $('.error-message').css('display', 'block');
            valid+=1;
        };
    
     if(valid===0){
        addOpinionToDB();
    }
});}


function addOpinionToDB(){
    request = "";
    request = new XMLHttpRequest();
    var fname = escape($("#fname").val());
    var lname = escape($("#lname").val());
    var email = escape($("#email").val());
    var gender = escape($("#gender").val());
    var message = escape($("#message").val());
    var url = "addopinion.php";
    var content = "fname=" + fname + "&lname=" + lname + "&email=" +email + "&message=" + message;  
    request.onreadystatechange = contentAdd;
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.send(content);
}         
function contentAdd(){
    if(request.readyState == 4 && request.status == 200){
        document.getElementById("opinions").innerHTML = request.responseText;  
        $("#opinions").load("showopinions.php");
	}
}