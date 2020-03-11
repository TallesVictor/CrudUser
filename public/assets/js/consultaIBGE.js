function listaCidade(idEstado, idCidade) {
    //Verificar se esta recebendo idEstado, caso não quer dizer que é um cadastro
    if (idEstado == undefined) {
        idEstado = parseInt($("#estado").val());
    }
    $.getJSON("https://servicodados.ibge.gov.br/api/v1/localidades/estados/" + idEstado + "/municipios", function(dados) {

        //For para retornar os dados encontrado no JSON, na resposta da consulta.
        for (let index = 0; index < dados.length; index++) {

            //Adicionar as opções com o nome dos municípios
            $('#cidades').append("<option value='" + dados[index].id + "'>" + dados[index].nome + "</option>");
        }
        if (idCidade != "") $("#cidades").val(idCidade);

    });
}