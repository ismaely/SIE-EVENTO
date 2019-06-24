/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$().ready(function () {


    $("#horalimite").mask("99:99");
    $("#horaInicio").mask("99:99");
    $("#horaFim").mask("99:99");
    $("#datalimiteInscric").mask("99/99/9999");
    $("#dataRealizacao").mask("99/99/9999");
    $("#horaInicio1").mask("99:99");
    $("#horaFim1").mask("99:99");
    $("#horaInicio2").mask("99:99");
    $("#horaFim2").mask("99:99");
    $("#data1").mask("99/99/9999");
    $("#data2").mask("99/99/9999");
   
    /* Função que avalia se a hora é válida*/
    $.validator.addMethod("hora", function (value, element) {
        return this.optional(element) || /^([01]\d|2[0-3]|[0-9])(:[0-5]\d){1,2}$/.test(value);
    }, "Hora n&atilde;o permitida");

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
    $.validator.addMethod("caracteres1", function (value, element) {


        var apellido = value;
        if (apellido === null || apellido.length === 0 || /^\s+$/.test(apellido)) {


            return false;
        }
        else {

            return true;
        }
    }, "Por favor, preencha este campo.");

    $.validator.addMethod("dataEvento", function (value, element) {

        var check = false,
                re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
                adata, gg, mm, aaaa, xdata;
        var d = new Date();
        var dia_Actual = d.getDate();
        var mes_Actual = d.getMonth();
        var ano_Actual = d.getFullYear();
        if (re.test(value)) {

            adata = value.split("/");
            gg = parseInt(adata[ 0 ], 10);
            mm = parseInt(adata[ 1 ], 10);
            aaaa = parseInt(adata[ 2 ], 10);
            xdata = new Date(Date.UTC(aaaa, mm - 1, gg, 12, 0, 0, 0));
            if ((xdata.getUTCFullYear() === aaaa) && (xdata.getUTCMonth() === mm - 1) && (xdata.getUTCDate() === gg)) {
                if ((gg > dia_Actual) && (mm - 1 >= mes_Actual) && (aaaa >= ano_Actual) || (gg <= dia_Actual) && (mm - 1 > mes_Actual) && (aaaa >= ano_Actual)
                        || (gg <= dia_Actual) && (mm - 1 <= mes_Actual) && (aaaa > ano_Actual)) {
                    check = true;
                }
                else
                    check = false;
            }
        }
        else
            check = false;
        return this.optional(element) || check;
    }, "Data n&atilde;o permitida");


    $.validator.addMethod("validarData", function (value, element) {

        var check = false,
                re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
                adata, gg, mm, aaaa, xdata;

        if (re.test(value)) {

            adata = value.split("/");
            gg = parseInt(adata[ 0 ], 10);
            mm = parseInt(adata[ 1 ], 10);
            aaaa = parseInt(adata[ 2 ], 10);
            xdata = new Date(Date.UTC(aaaa, mm - 1, gg, 12, 0, 0, 0));
            if ((xdata.getUTCFullYear() === aaaa) && (xdata.getUTCMonth() === mm - 1) && (xdata.getUTCDate() === gg)) {

                check = true;
            }
            else {
                check = false;
            }
        }
        else
            check = false;
        return this.optional(element) || check;
    }, "Data não permitida");




    $.validator.addMethod("dataRealizacao", function (value, element) {

        var check = false,
                re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
                dataRealizacao, diaRealizacao, mesRealizacao, anoRealizacao;
        if (re.test(value)) {
            dataRealizacao = value.split("/");
            diaRealizacao = parseInt(dataRealizacao[ 0 ], 10);
            mesRealizacao = parseInt(dataRealizacao[ 1 ], 10);
            anoRealizacao = parseInt(dataRealizacao[ 2 ], 10);


            var opcao = $("#opc").val();
            var d = $("#datalimiteInscric").val().split("/");
            var diaInscric = parseInt(d[0], 10);
            var mesInscric = parseInt(d[1], 10);
            var anoInscric = parseInt(d[2], 10);
            if ((diaRealizacao > diaInscric) && (mesRealizacao >= mesInscric) && (anoRealizacao >= anoInscric) || (diaRealizacao <= diaInscric) && (mesRealizacao > mesInscric) && (anoRealizacao >= anoInscric)
                    || (diaRealizacao <= diaInscric) && (mesRealizacao <= mesInscric) && (anoRealizacao > anoInscric)) {
                check = true;
            }
            else
                check = false;
        } else
            check = false;

        return this.optional(element) || check;
    }, "O valor deste campo deve ser maior do que a data limite de inscri&ccedil;&atilde;o...");




    $.validator.addMethod("validar", function (value, element) {
        var check = false,
                re = /^\d{2}\:\d{2}$/,
                hora, h;
        if (re.test(value)) {
            h = value.split(":");
            hora = parseInt(h[ 0 ], 10);
            if ((hora < 7) || (hora > 22)) {

                check = false;
            }
            else
                check = true;
        }
        else
            check = false;
        return this.optional(element) || check;
    }, "A Hora deve estar entre 7 e 22");

    $.validator.addMethod("data2", function (value, element) {

        var check = false,
                re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
                data2, dia2, mes2, ano2, xdata;

        if (re.test(value)) {
            data2 = value.split("/");
            dia2 = parseInt(data2[ 0 ], 10);
            mes2 = parseInt(data2[ 1 ], 10);
            ano2 = parseInt(data2[ 2 ], 10);
            xdata = new Date(Date.UTC(ano2, mes2 - 1, dia2, 12, 0, 0, 0));
            if ((xdata.getUTCFullYear() === ano2) && (xdata.getUTCMonth() === mes2 - 1) && (xdata.getUTCDate() === dia2)) {

                var opcao = $("#opc").val();
                var d = $("#data1").val().split("/");
                var dia1 = parseInt(d[0], 10);
                var mes1 = parseInt(d[1], 10);
                var ano1 = parseInt(d[2], 10);


                if ((dia2 >= dia1) && (mes2 >= mes1) && (ano2 >= ano1) || (dia2 <= dia1) && (mes2 <= mes1) && (ano2 <= ano1))
                    check = true;

                else
                    check = false;
            } else
                ckeck = false;
        } else
            check = false;

        return this.optional(element) || check;
    }, "Data não permitida");
    
    
    $.validator.addMethod("hora-inicio2", function (value, element) {

        var check = false, dia1,mes1,ano1,dia2,mes1,ano2,hora1,minuto1,hora2,minuto2;
        
        var data1 = $("#data1").val().split("/");
        var data2 = $("#data2").val().split("/");
        var hInicio1 = ("#horaInico1").val().split(":");
        var hInicio2 = ("#horaInicio2").val().split(":");
   
        dia1 = parseInt(data1[0],10);
        mes1 = parseInt(data1[1],10);
        ano1 = parseInt(data1[2],10);
        
        dia2 = parseInt(data2[0],10);
        mes2 = parseInt(data2[1],10);
        ano2 = parseInt(data2[2],10);
        
        hora1 = parseInt(hInicio1[0]);
        minuto1 = parseInt(hInicio1[1]);
        
        hora2 = parseInt(hInicio2[0]);
        minuto2 = parseInt(hInicio2[1]);

        if ((dia1 === dia2) && (mes1 === mes2) && (ano1 === ano2)) {
            
            if ((hora2 < hora1) && (minuto2 <= minuto1) || (hora2 > hora1) && (minuto2 >= minuto1)) {

                 check = true;
             }
             
             else
                 check = false;
        } else
            check = true;

        return this.optional(element) || check;
    }, "Hora não permitida");

    $.validator.addMethod("horaFim", function (value, element) {

        var check = false,
 
                horaFim, horaInicio, hInicio, minutoInicio, minutoFim,hora;
        hInicio = $("#horaInicio").val().split(":");
        horaInicio = parseInt(hInicio[0],10);
        minutoInicio = parseInt(hInicio[1],10);
       
        hora = value.split(":");
        horaFim = parseInt(hora[ 0 ],10);
        minutoFim = parseInt(hora[1],10);
           
        return this.optional(element) || (horaFim === horaInicio && minutoFim > minutoInicio) || (horaFim > horaInicio && minutoFim <= minutoInicio)
                    || (horaFim > horaInicio && minutoFim >= minutoInicio);
    }, "A hora de fim deve ser maior do que a hora de início.");

    $.validator.addMethod("horaFim1", function (value, element) {

        var check = false,
                re = /^\d{2}\:\d{2}$/,
                horaFim, horaInicio, hInicio, minutoInicio, minutoFim,hora;
        hInicio = $("#horaInicio1").val().split(":");
        horaInicio = parseInt(hInicio[0],10);
        minutoInicio = parseInt(hInicio[1],10);
      
            hora = value.split(":");
            horaFim = parseInt(hora[ 0 ],10);
            minutoFim = parseInt(hora[1],10);
            
        return this.optional(element) || (horaFim === horaInicio && minutoFim > minutoInicio) || (horaFim > horaInicio && minutoFim <= minutoInicio)
                    || (horaFim > horaInicio && minutoFim >= minutoInicio);
    }, "A hora de fim 1 deve ser maior do que a hora de in&iacute;cio 1.");
    
    $.validator.addMethod("horaFim2", function (value, element) {

        var horaFim, horaInicio, hInicio, minutoInicio, minutoFim,hora;
        
        hInicio = $("#horaInicio2").val().split(":");
        horaInicio = parseInt(hInicio[0],10);
        minutoInicio = parseInt(hInicio[1],10);
       
          
        hora = value.split(":");
        horaFim = parseInt(hora[ 0 ],10);
        minutoFim = parseInt(hora[1],10);
            
   
        return this.optional(element) || (horaFim === horaInicio && minutoFim > minutoInicio) || (horaFim > horaInicio && minutoFim <= minutoInicio)
                    || (horaFim > horaInicio && minutoFim >= minutoInicio);
            
    }, "A hora de fim 2 deve ser maior do que a hora de in&iacute;cio 2.");
   
}); 
