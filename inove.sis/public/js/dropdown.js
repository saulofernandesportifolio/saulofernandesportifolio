$("#SelectBartenders").change(event => {
    $.get(`/evento/SelectBartenders/SelectBartendersresultado/${event.target.value}`, function(res, sta){
        $("#SelectBartendersresultado").empty();
        res.forEach(element => {
            $("#SelectBartendersresultado").append(`<option value=${element.id}>${element.carro}</option>`);

        });
    });
});

$("#SelectBartenders").change(event => {
    $.get(`/evento/SelectBartenders/SelectBartendersresultado1/${event.target.value}`, function(res, sta){
        $("#SelectBartendersresultado1").empty();
        res.forEach(element => {
            $("#SelectBartendersresultado1").append(`<option value=${element.id}>${element.cidade}</option>`);
        });
    });
});


$("#SelectBartenders").change(event => {
    $.get(`/evento/SelectBartenders/SelectBartendersresultado2/${event.target.value}`, function(res, sta){
        $("#SelectBartendersresultado2").empty();
        res.forEach(element => {
            $("#SelectBartendersresultado2").append(`<option value=${element.id}>${element.bairro}</option>`);
        });
    });
})