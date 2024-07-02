
$(document).ready(function() {

    //abaixo usamos o seletor da jQuery para acessar o botão, e em seguida atribuir à ele um evento de click
    $("#entrar").click(function() {

        //Aqui chamamos a função validaLogin(), e passamos a ela o que foi digitado no campo cpf e no campo senha
        validaLogin($("#cpf"), $("#senha"));
        return;

    });

    $("#bt_enviar").click(function() {
        //somente será permitido cpfs válidos
        if ($('#cpf').val() != "") {
            validaCpf($('#cpf').val());
        }
    });

    $("#servicoIntragov").blur(function() {
        var servicoSelecionado = $('#servicoIntragov').val();
        if (servicoSelecionado == "CANCELAMENTO") {
            $("#motivo_cancelamento").removeAttr("disabled");
            $("#descricao_motivo_devolucao").removeAttr("disabled");

            $("#motivo_cancelamento").attr("required", true);
            $("#descricao_motivo_devolucao").attr("required", true);
        } else {
            $("#motivo_cancelamento").attr('disabled', 'disabled');
            $("#descricao_motivo_devolucao").attr('disabled', 'disabled');
        }
    });
    //mascaras
    $("#cpf").mask("999.999.999-99");
    $("#cnpj").mask("99.999.999/9999-99");
    $(".campoData").mask("99/99/9999");
    $(".campoDataHora").mask("99/99/9999 99:99:99");

    //valida se navegador é ie
    if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
        var ieversion = new Number(RegExp.$1)
        if (ieversion >= 8) {
            // Para IE8
            $("#fieldset_style").css({ "width": "650px" });

            //fix placeholder for IE7 and IE8
            $(function() {
                if (!$.support.placeholder) {
                    $("[placeholder]").focus(function() {
                        if ($(this).val() == $(this).attr("placeholder")) $(this).val("");
                    }).blur(function() {
                        if ($(this).val() == "") $(this).val($(this).attr("placeholder"));
                    }).blur();

                    $("[placeholder]").parents("form").submit(function() {
                        $(this).find('[placeholder]').each(function() {
                            if ($(this).val() == $(this).attr("placeholder")) {
                                $(this).val("");
                            }
                        });
                    });
                }
            });

            // fix required fields for IE < 11
            if ($("<input />").prop("required") === undefined) {
                $(document).on("submit", function(e) {
                    $(this)
                        .find("input, select, textarea")
                        .filter("[required]")
                        .filter(function() {
                            return this.value == ''; })
                        .each(function() {
                            e.preventDefault();
                            $(this).css({ "border-color": "red" });
                        });
                });

            }
        } else if (ieversion >= 7)
        // Para IE7
            $("#fieldset_style").css({ "width": "650px" });
        else if (ieversion >= 6)
        // Para IE6
            $("#fieldset_style").css({ "width": "650px" });
    }

    $("#status_solicitacao_postramitacao").click(function() {
        if ($("#status_solicitacao_postramitacao").val() == 15) {
            $("#motivo_devolucao").val('');
            $("#motivo_devolucao").attr('disabled', 'disabled');
        } else {
            $("#motivo_devolucao").attr("required", true);
            $("#motivo_devolucao").removeAttr("disabled");
        }
    });
});

/** Função responsável por validar os dados do formulário no lado Cliente, e enviar para a cama Controller (que está no Servidor) os dados informados pelo usuário para serem autenticados */
function validaLogin(cpf, senha) {

    //Se o usuário informou login e senha, então é hora do Ajax entrar em ação
    //Adicionamos um texto na DIV #resultado para alertar o usuário que o sistema está autenticando os dados
    $("#resultado").html("Autenticando...");

    /**Função ajax nativa da jQuery, onde passamos como parâmetro o endereço do arquivo que queremos chamar, os dados que irá receber, e criamos de forma encadeada a função que irá armazenar o que foi retornado pelo servidor, para poder se trabalhar com o mesmo */

    $.post("valida.usuario.php", { usuario: cpf.val(), senha: senha.val() },

        function(retorno) {

            //Insere na DIV #resultado o que foi retornado pelas classes de manipulação do Usuário (Se os dados estão corretos ou não)
            $("#resultado").html(retorno);

        } //function(retorno)
    ); //$.post()
} //validaLogin()
