$("#motivo").change(event => {
	$.get(`/contestacao/motivos/submotivos/${event.target.value}`, function(res, sta){
		$("#submotivo").empty();
		res.forEach(element => {
			$("#submotivo").append(`<option value=${element.id}>${element.submotivo}</option>`);
		});
	});
});