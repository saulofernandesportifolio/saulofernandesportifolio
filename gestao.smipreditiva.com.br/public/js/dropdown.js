$("#desgasterolamento").change(event => {
	$.get(`/ocorrencia/desgasterolamentos/recomendacaos/${event.target.value}`, function(res, sta){
		$("#recomendacao").empty();
		res.forEach(element => {
			$("#recomendacao").append(`<option  value=${element.id}>${element.recomendacao}</option>`);
		});
	});
});

$("#SelectCliente").change(event => {
    $.get(`/ocorrencia/SelectCliente/SelectClienteresultado/${event.target.value}`, function(res, sta){
        $("#SelectClienteresultado").empty();
        res.forEach(element => {
            $("#SelectClienteresultado").append(`<option value=${element.id}>${element.tag}</option>`);
        });
    });
});