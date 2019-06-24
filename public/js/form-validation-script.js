var Script = function () {


    $().ready(function () {


        // validate signup form on keyup and submit
        $("#form").validate({
            rules: {
                nome: {
                    required: true
                },
                sobrenome: "required",
                telefone: "required",
                genero: "required",
                data_nascimento: {required: true,
                    date: true
                },
                email: {required: true,
                        email: true
                },
                senha: {
                    required: true,
                    minlength: 8
                },
                confirmasenha: {
                    required: true,
                    equalTo: "#senha"
                },
                curso: "required",
                grau: "required",
                novasenha: {
                    required: true,
                    minlength: 8
                },
                confirmarsenha: {
                    required: true,
                    equalTo: "#novasenha"
                },
                
                senhaantiga: "required",
                nomeEvento: "required",
                datalimiteInscric: {
                    required: true,
                    date: true
                },
                horalimite: "required",
                hora_inicioRealiz: "required",
                hora_fimRealiz: "required",
                descricao: {required: true

                },
                sala: "required",
                numero: "required",
                capacidade: "required",
                opcao: "required",
                dataRealizacao: {
                    required: true,
                    date: true
                },
                data1: {
                    required: true,
                    date: true
                },
                data2: {
                    required: true,
                    date: true
                },
                horaInicio1: "required"
                ,
                horaFim1:
                        "required"

                ,
                horaInicio2: "required"

                ,
                horaFim2: "required",
                busca: "required"


            },
            messages: {
                nome: {
                    maxlength: $.validator.format("Por favor, n&atilde;o introduza mais do que {0} caracteres."),
                    required: "Por favor, digite o nome."
                },
                sobrenome: {
                    maxlength: $.validator.format("Por favor, n&atilde;o introduza mais do que {0} caracteres."),
                    required: "Por favor, digite o sobrenome."
                },
                senha: {
                    required: "Por favor, digite a senha.",
                    minlength: $.validator.format("Por favor, introduza pelo menos {0} caracteres.")
                },
                confirmasenha: {
                    required: "Por favor, confirma a senha.",
                    equalTo: "As senhas s&atilde;o diferentes."
                },
                email: {required: "Por favor, digite o email.",
                        email: "Por, favor digite um email v&aacute;lido."
                },
                telefone: {required: "Por favor, digite o telefone."
                },
                genero: {
                    required: "Por favor, seleciona o g&eacute;nero."
                },
                data_nascimento: {required: "Por favor, digite a data de nascimento",
                    date: "Data n&atilde;o permitida."
                },
                curso: {
                    required: "Por favor, seleciona o curso."
                },
                grau: "Por favor, seleciona o grau acad&eacute;mico",
                novasenha: {
                    required: "Por favor, digite a nova senha.",
                    minlength: $.validator.format("Por favor, introduza pelo menos {0} caracteres.")
                },
                confirmarsenha: {
                    required: "Por favor, confirma a senha.",
                    equalTo: "As senhas s&atilde;o diferentes."
                },
                
                senhaantiga: "Por favor, digite a senha antiga.",
                nomeEvento: "Por favor, digite o nome do evento.",
                datalimiteInscric: {
                    required: "Por favor, digite a data limite de inscri&ccedil;&atilde;o.",
                    date: "Data n&atilde;o permitida."
                },
                horalimite: {
                    required: "Por favor, digite a hora limite de inscri&ccedil;&atilde;o."
                },
                hora_inicioRealiz: {
                    required: "Por favor, digite a hora de in&iacute;cio do evento."
                },
                hora_fimRealiz: {required: "Por favor, digite a hora de fim do evento."
                },
                descricao: {
                    required: "Por favor, digite uma descri&ccedil;&atilde;o ao evento."
                },
                sala: {required: "Por favor selecione a sala."

                },
                numero: {
                    required: "Por favor, digite o n&uacute;mero da sala."
                },
                capacidade: {
                    required: "Por favor, digite a capacidade da sala."
                },
                opcao: "Por favor, escolha a op&ccedil;&atilde;o.",
                dataRealizacao: {
                    required: "Por favor, digite a data de realiza&ccedil;&atilde;o do evento.",
                    date: "Data n&atilde;o permitida."
                },
                data1: {
                    required: "Por favor, digite a data.",
                    date: "Data n&atilde;o permitida."
                },
                data2: {
                    required: "Por favor, digite a data.",
                    date: "Data n&atilde;o permitida."
                },
                horaInicio1:{required:"Por favor, digite a hora"}
                ,
                horaFim1:
                        {required:"Por favor, digite a hora"}

                ,
                horaInicio2:{ required:"Por favor, digite a hora"}

                ,
                horaFim2:{required:"Por favor, digite a hora"},
                busca: "Campo Obrigatório"

            }

        });

    });

}();