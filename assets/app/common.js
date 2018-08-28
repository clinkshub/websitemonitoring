var btn_textt='';
function start_loading_btn(btnid){
	btn_textt=$('#'+btnid).text();
	$('#'+btnid).text('Loading...');
	$('#'+btnid).attr('disabled','');
}
function end_loading_btn(btnid){
	$('#'+btnid).removeAttr('disabled');
	$('#'+btnid).text(btn_textt);
}
function action_post(postdata, posturl,ctype){
	$.ajax({
		type: ctype,
		dataType: 'JSON',
		data: postdata,
		url: posturl,
		success: function(data){
			handle_callback(data)
		},
		error: function(){
			return '';
		}
	});
}
