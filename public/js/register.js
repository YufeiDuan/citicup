$(function () {
	$(".pwdd").change(function(){
	  var pwd_c = $("#pwd_c").val();
	  var pwd = $("#pwd").val();
	  if(pwd!=pwd_c){
	  	$("#pwd_c_info").html("两次密码不一致");
	  }else{
	  	$("#pwd_c_info").html("");
	  }
	});
	$("#pwd").change(function(){
		var pwd = $("#pwd").val();
		if (pwd.length > 16 || pwd.length < 6){
			$("#pwd_info").html("请输入6-16位数字、字母或常用符号");
		}
		else{
			$("#pwd_info").html("");
		}
	});
});
function check(){
	var pwd_c = $("#pwd_c").val();
	  var pwd = $("#pwd").val();
	  if(pwd!=pwd_c){
	  	$("#pwd_c_info").html("两次密码不一致");
	  	return false;
	  }else{
	  	return true;
	  }
}