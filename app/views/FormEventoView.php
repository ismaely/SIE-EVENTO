<!DOCTYPE html>

<html lang="pt">

    <head>

        <meta charset="UTF-8" />

        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

        <title><?php echo 'Registar Evento';?></title>


    </head>

    <body class="home page no_js responsive stretched">

       <?php

         include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
               $securty->criarToken();  
         ?>

        <script>

            window.onload = function(){

                document.getElementById("opc-nao").onclick = estipularData;
                document.getElementById("opc-sim").onclick = estipularData;
            }


            function estipularData() {

                var opc = document.getElementById("opc-nao").checked;
                if (opc) {
                    document.getElementById("nao").style.display = "block";
                    document.getElementById("sim").style.display = "none";
                } else {
                    document.getElementById("nao").style.display = "none";
                    document.getElementById("sim").style.display = "block";
                }
            }
        </script>

         <?php
         include "barra_lateral_docente.php";

        ?>
        <!-- container section start -->
        <section id="container" class="">
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Formul&aacute;rio de Registo de Evento
                                </header>
                                <div class="panel-body">
                                    <div class="form">



                                        <form role="form" class=" cmxform form-horizontal" id="form" method="POST" action="<?php echo META_URL;?>Evento_/validarDados/" enctype="multipart/form-data" >

                                            <div class="form-group">

                                                <p>&nbsp;</p> <!-- contact-form-contact-form-->



                                                <div class="form-group">
                                                    <label for="nomeEvento" class="control-label col-lg-13">Nome do Evento <span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input id="nomeEvento" name="nomeEvento" type="text" class="caracteres form-control"maxlength="40">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="datalimiteInscric" class="control-label col-lg-13">Data Limite da Inscri&ccedil;&atilde;o <span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input id="datalimiteInscric" name="datalimiteInscric" type="text" class="dataEvento form-control" placeholder="Dia/Mês/Ano">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="horalimite" class="control-label col-lg-13">Hora Limite da Inscri&ccedil;&atilde;o <span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input id="horalimite" name="horalimite" type="text" class="hora form-control" placeholder="Hora:Minuto">

                                                    </div>
                                                </div>



                                                <!--<div class="form-group">-->
                                                <label for="estipularData" class="control-label col-lg-13">Desejas Estipular datas ao Evento? <span class="required">*</span> </label>
                                                <div class="col-lg-14">
                                                    
                                                    <input type="radio" value="nao" id="opc-nao" name="opcao" checked="checked">
                                                    <label for="opc-nao">N&atilde;o</label> &nbsp;&nbsp;
                                                    <input type="radio" value="sim" id="opc-sim" name="opcao">
                                                    <label for="opc-sim">Sim</label>
                                                    


                                                </div>
                                                <!--</div>-->

                                                <div id="nao" class="form-group">
                                                    <label for="dataRealizacao" class="control-label col-lg-13">Data de Realiza&ccedil;&atilde;o<span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="dataRealiz" id="dataRealizacao" class="dataRealizacao validarData form-control" placeholder="Dia/Mês/Ano" >

                                                    </div>
                                                    <br>


                                                    <label for="horaInicio" class="control-label col-lg-13">Hora de In&iacute;cio de Realiza&ccedil;&atilde;o<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaInicio" name="hora_inicioRealiz" class="hora validar form-control" placeholder="Hora:Minuto" >

                                                    </div>

                                                    <br>
                                                    <label for="horaFim" class="control-label col-lg-13">Hora de Fim de Realiza&ccedil;&atilde;o<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaFim" name="hora_fimRealiz" class="hora validar horaFim form-control" placeholder="Hora:Minuto">

                                                    </div>
                                                </div>
                                                <!--<br>-->
                                                <div id="sim" class="form-group" style="display:none;">

                                                    <label for="data1" class="control-label col-lg-13">1ª Data<span class="required">*</span> </label>

                                                    <div class="col-lg-10">


                                                        <input type="text" name="data1" id="data1" class="dataRealizacao validarData form-control" placeholder="Dia/Mês/Ano">

                                                    </div>
                                                    <br>


                                                    <label for="horaInicio1" class="control-label col-lg-13">Hora de In&iacute;cio 1<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaInicio1" name="horaInicio1" class="hora validar form-control" placeholder="Hora:Minuto">

                                                    </div>

                                                    <br>
                                                    <label for="horaFim1" class="control-label col-lg-13">Hora de Fim 1<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaFim1" name="horaFim1" class="hora validar horaFim1 form-control" placeholder="Hora: Minuto">

                                                    </div>
                                                    <br>

                                                    <label for="data2" class="control-label col-lg-13">2ª Data<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" name="data2" id="data2" class="data2  dataRealizacao form-control" placeholder="Dia/Mês/Ano">

                                                    </div>
                                                    <br>


                                                    <label for="horaInicio2" class="control-label col-lg-13">Hora de In&iacute;cio 2<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaInicio2" name="horaInicio2" class="hora validar form-control" placeholder="Hora:Minuto">

                                                    </div>

                                                    <br>
                                                    <label for="horaFim2" class="control-label col-lg-13">Hora de Fim 2<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaFim2" name="horaFim2" class="hora horaFim2 validar form-control"placeholder="Hora:Minuto" >

                                                    </div>
                                                </div>

                                                
                                                
                                                <div class="form-group">

                                                    <label for="categoria" class="control-label col-lg-13">Categoria<span class="required">*</span> </label>

                                                    <div class="col-lg-10">


                                                        <select id="categoria" name="categoria" class="form-control">
                                                            <option value="">Seleccione a categoria</option>
                                                            <option value="Congresso">Congresso</option>
                                                            <option value="Feira">Feira</option>
                                                            <option value="Encontro Alargado">Encontro Alargado</option>
                                                            <option value="Mesa-redonda">Mesa-redonda</option>
                                                            <option value="Simposio">Simposio</option>
                                                            <option value="Forum">Forum</option>
                                                              <option value="Conferencia">Conferencia</option>
                                                                <option value="Jornada Cientifica">Jornada Cientifica</option>
                                                                  <option value="Palestra">Palestra</option>
                                                                  <option value="Exposi&Ccedil;&atilde;0">Exposi&Ccedil;&atilde;0</option>

                                                          </select>

                                                    </div>


                                                </div>

                                                

                                                <div class="form-group">

                                                    <label for="genero" class="control-label col-lg-13">Sala<span class="required">*</span> </label>

                                                    <div class="col-lg-10">


                                                        <select id="sala" name="sala" class="form-control">
<!--                                                            <option value="">Seleccione a sala</option>-->

                                                            <?php
                                                               $dados = $sala->listarSala();
                                                              while($row=$dados->fetch(PDO::FETCH_OBJ)){
                                                                    ?>

                                                           <option value="<?php echo $row->idSala; ?>"><?php echo "Sala:".$row->numero.  "\t\t Capacidade: " .$row->capacidade; } ?> </option>


                                                          </select>

                                                    </div>


                                                </div>



                                                <div class="form-group">
                                                    <label for="estado" class="control-label col-lg-13">Estado <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <select id="estado" name="estado" class="form-control">
                                                            <option value="">Seleccione o estado</option>
                                                            <option value="1">Criado Mais ainda n&atilde;o aberto a Inscri&ccedil;&otilde;es</option>
                                                            <option value="2">Aguardando Inscri&ccedil;&otilde;es</option>
                                                            <option value="3">Conclu&iacute;do com datas e hora definida</option>
                                                            <option value="4">Inscri&ccedil;&otilde;es Fechadas Mais Com Data e Hora pra Definir</option>

                                                        </select>
                                                    </div>
                                                </div>


                                                <label for="ambito" class="control-label col-lg-13">Âmbito <span class="required">*</span> </label>
                                                <div class="col-lg-15">
                                                       <input type="radio" value="publico" id="publico" name="ambito" checked="checked">
                                                    <label for="publico">P&uacute;blico</label> &nbsp;&nbsp;
                                                   <input type="radio" value="privado" id="privado" name="ambito">
                                                    <label for="privado">Privado</label>
                                                    


                                                </div>

                                                <div class="form-group">
                                                    <label for="descricao" class="control-label col-lg-13">Descri&ccedil;&atilde;o <span class="required">*</span> </label>

                                                    <div class="col-lg-10">
                                                        <textarea id="descricao" name="descricao" class="caracteres form-control" spellcheck="true" placeholder="Insere uma descrição..."> </textarea>


                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-10">

                                                    <label for="anexo" class="control-label col-lg-2">Anexo</label>

                                                    <div class="col-lg-10">
                                                        <input class="form-control " id="foto" name="foto" type="file" accept="image/*" />

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                       <?php  echo $securty->retornaToken();?>
                                                    <label for="codigo" class="control-label col-lg-2"></label>
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button  type="submit" value="inserir" class="btn btn-primary" name="escolha"><span class="glyphicon"></span> Registar</button>
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


        </section>


    </body>
</html>
