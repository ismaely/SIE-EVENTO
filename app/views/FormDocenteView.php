
<!DOCTYPE html>

<html lang="pt">
  
    <head>
        <title> <?php echo "Registar Docente"; ?></title>
        <meta charset="UTF-8" />
<!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

        
    </head>

    <body class="home page no_js responsive stretched">

        <?php
         
           include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
            
           // $securty->criarToken();
           include "barra_lateral_admin.php";
            
        ?>
        
        <!-- container section start -->
        <section id="container" class="">
            <!--header start-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Formul&aacute;rio de Registo de Docente
                                </header>
                                <div class="panel-body">
                                    <div class="form">



                                        <form role="form" class=" cmxform form-horizontal" id="form" method="POST" action="/app_sie_projectoUnificado_2016/Rotas_/validarDadosUt/" enctype="multipart/form-data" >

                                            <div class="form-group">

                                                <p>&nbsp;</p> <!-- contact-form-contact-form-->




                                                <div class="form-group col-lg-10">

                                                    <div class="col-lg-10">

                                                        <img src="../../arquivos/padrao.jpg" height="160" width="150" id="foto-cliente">

                                                    </div>
                                                    <div class="col-lg-10">
                                                        <input class="form-control " id="foto" name="foto" type="file" accept="image/*" />

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="nome" class="control-label col-lg-13">Nome <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="nome" name="nome" type="text" class="caracteres form-control" placeholder="Primeiro nome" maxlength="40">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="sobrenome" class="control-label col-lg-13">Sobrenome <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="sobrenome" name="sobrenome" type="text" class="caracteres form-control" placeholder="Sobrenome" maxlength="40">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="telefone" class="control-label col-lg-13">Telefone <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="telefone" name="telefone" type="tel" class="phone form-control"tabindex="10">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="genero" class="control-label col-lg-13">G&eacute;nero <span class="required">*</span> </label>


                                                    <div class="col-lg-10">
                                                        <select id="genero" name="genero" class="genero form-control">
                                                            <option value="">Seleccione o g&eacute;nero</option>
                                                            <option value="F">Feminino</option>
                                                            <option value="M">Masculino</option>

                                                        </select>
                                                    </div>


                                                </div>


                                                <div class="form-group">
                                                    <label for="data_nascimento" class="control-label col-lg-13">Data de Nascimento <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="data_nascimento" name="data_nascimento" type="text" class="dataNascimento form-control" placeholder="Dia/Mês/Ano">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email" class="control-label col-lg-13">Email <span class="required">*</span> </label>

                                                    <div class="col-lg-10">
                                                        <input id="email" name="email" type="email" class="email form-control" placeholder="Email" maxlength="40">
                                                        <span id="errado"> </span> <br>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="control-label col-lg-13">Senha <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="senha" name="senha" type="password" class="senha form-control" minlength="8" maxlength="16">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirm_password" class="control-label col-lg-13">Confirmar a Senha <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="confirm_password" name="confirmasenha" type="password" class="form-control" >
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="grau" class="control-label col-lg-13">Grau Acad&eacute;mico <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <select id="grau" name="grau" class="form-control">
                                                            <option value="">Seleccione o grau acad&eacute;mico</option>
                                                            <option value="Doutoramento">Doutoramento</option>
                                                            <option value="Licenciatura">Licenciatura</option>
                                                            <option value="Mestrado">Mestrado</option>

                                                        </select>
                                                    </div>
                                                </div>

                                            <div class="form-group">
                                                    <label for="nome" class="control-label col-lg-13">Especialidade <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="nome" name="especialidade" type="text" class="caracteres form-control" placeholder="informa a sua especialidade" maxlength="40">

                                                    </div>
                                                </div>     
                                                
                                                <div class="form-group">
                                                    <?php  echo $securty-> retornaToken(); ?>
                                                    
                                                    <label for="codigo" class="control-label col-lg-13"></label>
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button  type="submit" value="206373" class="btn btn-primary" name="opcao"><span class="glyphicon"></span> Registar</button>
                                                        <button class="btn btn-default" type="button">Cancelar</button>
                                                    </div>
                                                </div>                 
                                        </form>
                                    </div>
                                             
        

                </div>
                            </section>
                            
                        </div>
                    </div>
                    <!-- page end-->
                </section>
                
               
            </section>
            <!--main content end-->
        </section>
        
    </body>
</html>                                

