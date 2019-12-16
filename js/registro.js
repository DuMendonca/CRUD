$(document).ready(function () {
        var $campoCpf = $("#cpf1");
         $campoCpf.mask('000.000.000-00', {reverse: true});
    });

	$(document).ready(function () {
        var $campoTel = $("#telefone1");
         $campoTel.mask('(47)00000-0000', {reverse: true});
    });


function validarCampos(){
var nome = document.getElementById("nomeC").value;
var cpf = document.getElementById("cpf1").value;
var data = document.getElementById("dataN").value;
var tel = document.getElementById("telefone1").value;

if (nome=="" || (cpf=="" && cpf.length!=11) || data=="" || (tel =="" && tel.length!=14)){
  alert("Preencha os campos corretamente!");
  return false;
}else{
	return true;
}
}

function validarDados(){
var nome1 = document.getElementById("consultaNomeCliente").value;

if (nome1==""){
  alert("Consulte um nome valido!");
  return false;
}else{
	return true;
}
}
