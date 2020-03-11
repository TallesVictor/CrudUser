$("#cpf").keyup(function() {
    if (validarCPF($("#cpf").val())) {
        $("#avisoCPF").text("CPF Válido");
        $("#avisoCPF").removeClass("text-danger");
        $("#avisoCPF").addClass("text-success");
        $("#salvar").prop("disabled", false);
    } else {
        $("#avisoCPF").text("CPF Inválido");
        $("#avisoCPF").removeClass("text-success");
        $("#avisoCPF").addClass("text-danger");
        $("#salvar").prop("disabled", true);
    }
});

function validarCPF(strCPF) {

    strCPF = strCPF.replace(/[^\d]+/g, '');

    if (strCPF == '') return false;

    if (strCPF.length != 11)
        return false;
    var Soma;
    var Resto;
    Soma = 0;
    if (strCPF == "00000000000") return false;

    for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10))) return false;

    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11))) return false;
    return true;
}