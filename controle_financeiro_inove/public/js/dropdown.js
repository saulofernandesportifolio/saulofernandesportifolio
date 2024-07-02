$("#SelectClientes").change(event => {
    $.get(`admin/depositar/SelectCliente/SelectClienteresultado/${event.target.value}`, function(res, sta){
        $("#SelectClientesresultado").empty();
        res.forEach(element => {
            $("#SelectClientesresultado").append(`<option value=${element.id}>${element.nome}</option>`);

        });
    });
});

