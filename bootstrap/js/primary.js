var res = {
	loader: $('<div />', { class: 'loader'}),
	container: $('#container')
}

$('form').on('submit', function(){
	$.ajax({
		url: window.location.href,
		beforeSend: function(){
			res.container.append(res.loader);
		},
		success: function(data){
			res.container.html(data);
			res.container.find(res.loader).remove();
		}
	});
});