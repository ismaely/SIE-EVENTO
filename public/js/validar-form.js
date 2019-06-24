/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$().ready(function () {


    // validate the comment form when it is submitted
    $("#telefone").mask("999 999 999");
    $("#data_nascimento").mask("99/99/9999");

    
    /* Atribui ao evento change do input FILE para upload da foto*/
    var inputFile = document.getElementById("foto");
    var foto_cliente = document.getElementById("foto-cliente");
    if (inputFile != null && inputFile.addEventListener) {
        inputFile.addEventListener("change", function () {
            loadFoto(this, foto_cliente)
        });
    } else if (inputFile != null && inputFile.attachEvent) {
        inputFile.attachEvent("onchange", function () {
            loadFoto(this, foto_cliente)
        });
    }


    /* Função para exibir a imagem selecionada no input file na tag <img>  */
    function loadFoto(file, img) {
        if (file.files && file.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                img.src = e.target.result;
            }
            reader.readAsDataURL(file.files[0]);
        }
    }
    
    
    // função para validação do E-mail
    
    $.validator.addMethod("email", function (value, element) {

        var regex = RegExp(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i);

        return this.optional(element) || regex.test(value);
    }, "Formato do E-mail inv&aacute;lido");
    
    
    /* validação do número de telefone */
    
    $.validator.addMethod("telefone", function (value, element) {

        var regex = RegExp(/^[9][^5-8]{1}[0-9]{1}\s\d{3}\s\d{3}$/);

        return this.optional(element) || regex.test(value);
    }, "N&uacute;mero de Telefone n&atilde;o permitido");


    /* validação do campo que recebe o email ou o número de telefone */
    
   $.validator.addMethod("emailTel", function (value, element) {

        var regexTel = RegExp(/^[9][^0|^5-8]{1}[0-9]{1}\d{3}\s\d{3}$/);
        var regexEmail = RegExp(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i);

        return this.optional(element) || regexTel.test(value) || regexEmail.test(value);
    }, "Valor n&atilde;o permitido");
    

    $(".numeroEst").bind("keydown", function (evento) {

        var keycode = evento.which;
        var isStandard = (keycode > 47 && keycode < 58);
        var isOther = (",8,46,37,38,39,40,".indexOf("," + keycode + ",") > -1);

        if (isStandard || isOther) {

            return true;
        }

        else {

            return false;
        }
    });


    $(".capacidade").bind("keydown", function (evento) {

        var keycode = evento.which;
        var isStandard = (keycode > 47 && keycode < 58);
        var isOther = (",8,46,37,38,39,40,".indexOf("," + keycode + ",") > -1);

        if (isStandard || isOther) {

            return true;
        }

        else {

            return false;
        }
    });

    $(".caracteres").bind("keydown", function (evento) {

        var keycode = evento.which;
        var isStandard = (keycode > 47 && keycode < 58);
        var isOther = (",8,46,37,38,39,40,".indexOf("," + keycode + ",") > -1);

        if (!isStandard || isOther) {

            return true;
        }

        else {

            return false;
        }
    });
    
     $(".senha").bind("", function (evento) {

        var keycode = evento.which;
        var isStandard = (keycode==34 || keycode==39 || keycode ==45 || keycode==35);
       // var isOther = (",8,46,37,38,40,".indexOf("," + keycode + ",") > -1);

        if (!isStandard ) {

            return true;
        }

        else {

            return false;
        }
    });


    jQuery.validator.addMethod("senha", function (value, element) {
        return this.optional(element) || value.length >= 8 && /\d/.test(value) && /[a-z]/i.test(value);
    }, "Por favor, introduz pelo menos 8 caracteres d&iacute;gitos e caracteres.");


    $.validator.addMethod("caracteres", function (value, element) {


        var apellido = value;
        if (apellido === null || apellido.length === 0 || /^\s+$/.test(apellido)) 
                              
            return false;
 
        else                             

            return true;

        
    }, "Por favor, preencha este campo.");

    $.validator.addMethod("dateITA", function (value, element) {
        var check = false,
                re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
                adata, gg, mm, aaaa, xdata;
        var d = new Date();
        var anoActual = d.getFullYear();
        var idade;

        if (re.test(value)) {
            adata = value.split("/");
            gg = parseInt(adata[ 0 ], 10);
            mm = parseInt(adata[ 1 ], 10);
            aaaa = parseInt(adata[ 2 ], 10);
            xdata = new Date(Date.UTC(aaaa, mm - 1, gg, 12, 0, 0, 0));

            idade = anoActual - aaaa; // Obtem a idade do estudante
            if ((xdata.getUTCFullYear() === aaaa) && (xdata.getUTCMonth() === mm - 1) && (xdata.getUTCDate() === gg) && ((idade >= 17) && (idade <= 70))) {
                check = true;
            } else {
                check = false;
            }
        } else {
            check = false;
        }
        return this.optional(element) || check;
    }, "Data não permitida");


    $.validator.addMethod("dataNascimento", function (value, element) {
        var check = false,
                re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
                adata, gg, mm, aaaa, xdata;
        var d = new Date();
        var anoActual = d.getFullYear();
        var idade;

        if (re.test(value)) {
            adata = value.split("/");
            gg = parseInt(adata[ 0 ], 10);
            mm = parseInt(adata[ 1 ], 10);
            aaaa = parseInt(adata[ 2 ], 10);
            xdata = new Date(Date.UTC(aaaa, mm - 1, gg, 12, 0, 0, 0));

            idade = anoActual - aaaa; // Obtem a idade do estudante
            if ((xdata.getUTCFullYear() === aaaa) && (xdata.getUTCMonth() === mm - 1) && (xdata.getUTCDate() === gg) && ((idade >= 25) && (idade <= 70))) {
                check = true;
            } else {
                check = false;
            }
        } else {$.validator.addMethod("dataNascimento", function (value, element) {
        var check = false,
                re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
                adata, gg, mm, aaaa, xdata;
        var d = new Date();
        var anoActual = d.getFullYear();
        var idade;

        if (re.test(value)) {
            adata = value.split("/");
            gg = parseInt(adata[ 0 ], 10);
            mm = parseInt(adata[ 1 ], 10);
            aaaa = parseInt(adata[ 2 ], 10);
            xdata = new Date(Date.UTC(aaaa, mm - 1, gg, 12, 0, 0, 0));

            idade = anoActual - aaaa; // Obtem a idade do estudante
            if ((xdata.getUTCFullYear() === aaaa) && (xdata.getUTCMonth() === mm - 1) && (xdata.getUTCDate() === gg) && ((idade >= 25) && (idade <= 70))) {
                check = true;
            } else {
                check = false;
            }
        } else {
            check = false;
        }
        return this.optional(element) || check;
    }, "Data não permitida");
            check = false;
        }
        return this.optional(element) || check;
    }, "Data não permitida");



});


    $(function () {
    $('#email').blur('click', function (e) {
        e.preventDefault();
        var email = $('#email').val();
        var senha = $('#senha').val();
        var resultado;

        $.ajax({
            type: "POST",
            url: "verificar",
            data: ('email=' + email + '&senha=' + senha),
            success: function (resposta) {

                $('#certo').hide();
                $('#errado').hide();
                if (resposta == 1) {
                    $('#errado').show().html('O email ja existe.. digita um outro *');

                    return false;
                }
                else {
                    $('#certo').show().html('O email é valido..');

                    return false;
                }
            }
        });


    });

});




 function isMail(){
    $('#email').blur('click', function (e) {
        e.preventDefault();
        var email = $('#email').val();
        var senha = $('#senha').val();

        $.ajax({
            type: "POST",
            url: "verificar",
            data: ('email=' + email + '&senha=' + senha),
            success: function (resposta) {

                $('#certo').hide();
                $('#errado').hide();
                if (resposta == 1) {
                    return false;
                }
                else {
                    return false;
                }
            }
        });


    });
 }
