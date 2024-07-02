 $(document).ready(function() {
    //consulta redistribuicao
    $('#servico').change(function() {
        $('#complemento_servico').val('');
        var servico = $('#servico').val();
        var fonte = $('#fonte').val();

        if(servico == "" || servico == undefined)
        {
            return;
        }

        $.getJSON('app/Controller/TramitacaoController.php?opcao=busca_complemento_solicitacao&servico=' + servico + '&fonte=' + fonte, function(dados) 
        {
           if (dados.length > 0) 
           {
                var option = '<option>Selecione o complemento do servi\u00e7o</option>';
                $.each(dados, function(i, obj) 
                {
                    option += '<option value="' + obj + '">' + obj + '</option>';
                })
            }
            else 
            {
                Reset();
            }
            $('#complemento_servico').html(option).show();
        }).error(function() 
        { 
            var option = '<option>N\u00e3o encontrado</option>';
            $('#complemento_servico').html(option).show();
        })
    })
});


function gerarProtocoloSolicitacao(tipo)
{
    var novaSolicitacao = $('input[name="nova_solicitacao"]:checked').val();

     $('#solicitacao_manual_nova').hide();
     $('#solicitacao_manual_existente').hide();

    if(novaSolicitacao == "Sim")
    {
         $.getJSON('app/Controller/TramitacaoManualController.php?opcao=buscaProtocoloSolicitacao&tipo=' + tipo, function(dados) 
         {        
               $('#n_solicitacao_manual').val(dados);
               $('#solicitacao_manual_nova').show();
               $('#solicitacao_manual_existente').hide();
         })
     }
     else
     {
        $('#solicitacao_manual_nova').hide();
        $('#solicitacao_manual_existente').show();
    }
}


function validaQtdeAcessos(qtd_acessos)
{
    if (isNaN(qtd_acessos.value))
    {  
           alert("Digite apenas n\u00fameros!");  
           qtd_acessos.value = '';
           qtd_acessos.focus();  
           return false;  
    } 
    else 
    {
        if(qtd_acessos.value.length > 3)
        {
            var x;
            var r=confirm("Confirma quantidade de acessos com 4 digitos?");
            if (r==true)
            {
               return true;
            }
            else
            {
                qtd_acessos.value = '';
                qtd_acessos.focus();  
                return false;
            }
        }
    }
}

