$(document).ready(function () {
        var $campoCpf = $("#cpf1");
         $campoCpf.mask('000.000.000-00', {reverse: true});

    });


function validaCampos() {
 var cpf = document.getElementById("cpf1").value;
 var senha = document.getElementById("senha1").value;
var cpf -> $campoCpf.unmask();
 if (cpf == "" || senha == "") {
   alert ("Preencha os campos em branco!");
   return false;
 }

}
