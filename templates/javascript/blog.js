/**
 * 检测用户名输入是否正确
 * @return boolean
 */
function checkUserName(){
	var name = $("#name").val();
	var re = /^[a-zA-z]\w{3,15}$/;
    if(!re.test(name)){
        $("#name_error").show();
        return false;
    }
    return true;
}

function checkPassword(){
	var password = $("#password").val();
    if(password == ''){
    	$("#password_error").show();
        return false;
    }
    return true;
}

function checkSubmitLogin(){
	var user_name = checkUserName();
	var password = checkPassword();
	if(user_name && password){
		return true;
	}
    return false; 
}

function checkAPassWord(){
    var password = $("#password").val();
    var apassword = $("#apassword").val();

    if(password != apassword){
        $("#apassword_error").show();
        return false;
    }
    return true;
}

function checkNickName(){
    var nick_name = $("#nick_name").val();
    if(nick_name == ''){
        $("#nick_name_error").show();
        return false;
    }
    return true;
}

function checkTips(){
    var tips = $("#tips").val();
    if(tips == ''){
        $("#tips_error").show();
        return false;
    }
    return true;
}

function checkRegistered(){
    var user_name = checkUserName();
    var password = checkPassword();
    var apassword = checkAPassWord();
    var nick_name = checkNickName();
    var tips = checkTips();

    if(user_name && password && apassword && nick_name && tips){
        return true;
    }
    return false;
}
function checkTitle(){
    var title = $("#title").val();
    if(title == ''){
        $("#title_error").show();
        return false;
    }
    return true;
}

function checkPostBlog(){
    var title = checkTitle();
    if(title){
        return true;
    }
    return false;
}


