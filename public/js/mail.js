function write(){
	$('#mail').modal('show');
}

function cancel(){
	$('#subject').val('');
	$('#content').val('');
	$('#mail').modal('hide');
}