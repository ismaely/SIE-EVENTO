<!DOCTYPE html>

<html lang="pt">

    <head>

        <meta charset="UTF-8" />

        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

        <title><?php echo 'Alterar Evento'; ?></title>

    </head>

    <body class="home page no_js responsive stretched">
        <?php
        include "cabecalho.php";
        $retornaSs = $securty->retornaSsession();
        $securty->verficaSesssion($retornaSs);
        $securty->criarToken();
        include "barra_lateral_docente.php";
        ?>
        <!-- container section start -->
        <section id="container" class="">



            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">

                    </div>
<?php
// chamada da função que vai trazer os dados do evento que devem ser trocado
$dados = $evento->buscarDados($system->get_dados());

//  var_dump($dados);
//  die();
?>
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Alterar Dados do Evento
                                </header>
                                <div class="panel-body">
                                    <div class="form">



                                        <form role="form" class=" cmxform form-horizontal" id="form" method="POST" action="<?php echo META_URL; ?>Evento_/validarDados/" enctype="multipart/form-data" >

                                            <div class="form-group">

                                                <p>&nbsp;</p> <!-- contact-form-contact-form-->



                                                <div class="form-group">
                                                    <label for="nomeEvento" class="control-label col-lg-13">Nome do Evento <span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input id="nomeEvento" name="nomeEvento" type="text" class="caracteres form-control"maxlength="40"
                                                               value ="<?php echo $dados->nomeEvento; ?>">





                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="datalimiteInscric" class="control-label col-lg-13">Data Limite da Inscri&ccedil;&atilde;o <span class="required">*</span> </label>
                                                    <div class="col-lg-10">

<?php
$data = $dados->dtLimiteInscr;
$data_temp = explode('-', $data);
$dataLimite = $data_temp[2] . '/' . $data_temp[1] . '/' . $data_temp[0];
?>

                                                        <input id="datalimiteInscric" name="datalimiteInscric" type="text" class="dataEvento form-control" placeholder="Dia/M&ecirc;s/Ano"
                                                               value ="<?php echo $dataLimite; ?>" >


                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="horalimite" class="control-label col-lg-13">Hora Limite da Inscri&ccedil;&atilde;o <span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input id="horalimite" name="horalimite" type="text" class="hora form-control" placeholder="Hora:Minuto"
                                                               value ="<?php echo $dados->hrLimiteInscr; ?>" >


                                                    </div>
                                                </div>

<?php
$data = $dados->dataRealiza;
if (!empty($data)):
    $data_temp = explode('-', $data);
    $dataRealiza = $data_temp[2] . '/' . $data_temp[1] . '/' . $data_temp[0];
endif;
?>

                                                <!--<div class="form-group">-->
                                                <label for="estipularData" class="control-label col-lg-13">Desejas Estipular datas ao Evento? <span class="required">*</span> </label>
                                                <div class="col-lg-14">

                                                    <label for="opc-nao">N&atilde;o</label>
                                                   <!-- <input type="hidden" name="id" id="esconde" value="">-->
                                                    <input type="radio" value="nao" id="opc-nao" name="opcao" <?php if (!empty($dataRealiza)) echo 'checked'; ?>>
                                                    <label for="opc-sim">Sim</label>
                                                    <input type="radio" value="sim" id="opc-sim" name="opcao"  <?php if (empty($dataRealiza)) echo 'checked'; ?> >


                                                </div>
                                                <!--</div>-->

                                                <div id="nao" class="form-group">

                                                    <label for="dataRealizacao" class="control-label col-lg-13">Data de Realiza&ccedil;&atilde;o<span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="dataRealiz" id="dataRealizacao"class="dataRealizacao validarData form-control" placeholder="Dia/M&ecir&ecirc;s/Ano"
                                                               value ="<?php echo $dataRealiza; ?>">

                                                    </div>
                                                    <br>


                                                    <label for="horaInicio" class="control-label col-lg-13">Hora de In&iacute;cio<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaInicio" name="hora_inicioRealiz" class="hora validar form-control" placeholder="Hora:Minuto"

                                                               value ="<?php echo ( isset($dados->horaInicioRealiza) ? $dados->horaInicioRealiza : '' ); ?>" >

                                                    </div>

                                                    <br>
                                                    <label for="horaFim" class="control-label col-lg-13">Hora de Fim<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaFim" name="hora_fimRealiz" class="hora validar horaFim form-control" placeholder="Hora:Minuto"
                                                               value ="<?php echo ( isset($dados->horaFimRealiza) ? $dados->horaFimRealiza : '' ); ?> " >

                                                    </div>
                                                </div>
                                                <!--<br>-->
                                                <div id="sim" class="form-group" style="display:none;"> <?php
                                                $buscarDataHora = $DataHora->dataHoraIndefinida($dados->idEvento);

                                                if (!empty($buscarDataHora[1]->dataEstipulada)):


                                                    $date = $buscarDataHora[1]->dataEstipulada;
                                                    $data = explode('-', $date);
                                                    $dataRealiza1 = $data[2] . '/' . $data[1] . '/' . $data[0];

                                                    $dat = $buscarDataHora[2]->dataEstipulada;
                                                    $dah = explode('-', $dat);
                                                    $dataRealiza2 = $dah[2] . '/' . $dah[1] . '/' . $dah[0];
                                                endif;
?>

                                                    <label for="data1" class="control-label col-lg-13">1ª Data<span class="required">*</span> </label>

                                                    <div class="col-lg-10">


                                                        <input type="text" name="data1" id="data1" class="dataRealizacao form-control" placeholder="Dia/M&ecirc;s/Ano"
                                                               value ="<?php echo ( isset($dataRealiza1) ? $dataRealiza1 : '' ); ?> " >

                                                    </div>
                                                    <br>


                                                    <label for="horaInicio1" class="control-label col-lg-13">Hora de In&iacute;cio 1<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaInicio1" name="horaInicio1" class="hora validar form-control" placeholder="Hora:Minuto"
                                                               value =" <?php echo (isset($buscarDataHora[1]->horaInicio) ? $buscarDataHora[1]->horaInicio : '' ); ?>    " >

                                                    </div>

                                                    <br>
                                                    <label for="horaFim1" class="control-label col-lg-13">Hora de Fim 1<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaFim1" name="horaFim1" class="hora validar horaFim1 form-control" placeholder="Hora: Minuto"
                                                               value ="   <?php echo (isset($buscarDataHora[1]->horaFim) ? $buscarDataHora[1]->horaFim : '' ); ?>  ">

                                                    </div>
                                                    <input type="hidden" name="id1"  value="<?php echo (isset($buscarDataHora[1]->id) ? $buscarDataHora[1]->id : '' ); ?>"> 
                                                    <br>

                                                    <label for="data2" class="control-label col-lg-13">2ª Data<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" name="data2" id="data2" class="data2 form-control" placeholder="Dia/M&ecirc;s/Ano"
                                                               value =" <?php echo (isset($dataRealiza2) ? $dataRealiza2 : '' ); ?> " >

                                                    </div>
                                                    <br>


                                                    <label for="horaInicio2" class="control-label col-lg-13">Hora de In&iacute;cio 2<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaInicio2" name="horaInicio2" class="hora validar form-control" placeholder="Hora:Minuto"
                                                               value =" <?php echo (isset($buscarDataHora[2]->horaInicio) ? $buscarDataHora[2]->horaInicio : '' ); ?> "  >

                                                    </div>

                                                    <br>                                 
                                                    <label for="horaFim2" class="control-label col-lg-13">Hora de Fim 2<span class="required">*</span> </label>
                                                    <div class="col-lg-10">

                                                        <input type="text" id="horaFim2" name="horaFim2" class="hora validar horaFim2 form-control"placeholder="Hora:Minuto"
                                                               value =" <?php echo (isset($buscarDataHora[2]->horaFim) ? $buscarDataHora[2]->horaFim : '' ); ?> ">

                                                    </div>
                                                    <input type="hidden" name="id2"  value="<?php echo (isset($buscarDataHora[2]->id) ? $buscarDataHora[2]->id : '' ); ?>">        
                                                </div>


                                                <div class="form-group">

                                                    <label for="categoria" class="control-label col-lg-13">Categoria<span class="required">*</span> </label>

                                                    <div class="col-lg-10">


                                                        <select id="categoria" name="categoria" class="form-control">
                                                            <option value="Confer&ecirc;ncia">Confer&ecirc;ncia</option>
                                                            <option value="Congresso">Congresso</option>
                                                            <option value="Encontro Alargado">Encontro Alargado</option>
                                                            <option value="Exposi&ccedil;&atilde;o">Exposi&ccedil;&atilde;o</option>
                                                            <option value="Feira">Feira</option>
                                                            <option value="Forum">Fórum</option>
                                                            <option value="Jornada Cientifica">Jornada Cientifica</option>

                                                            <option value="Mesa-redonda">Mesa-redonda</option>
                                                            <option value="Palestra">Palestra</option>
                                                            <option value="Simposio">Simpósio</option>

                                                        </select>

                                                    </div>


                                                </div>


                                                <div class="form-group">

                                                    <label for="sala" class="control-label col-lg-13">Sala<span class="required">*</span> </label>

                                                    <div class="col-lg-10">


                                                        <select id="sala" name="sala" class="form-control">


<?php
$dado = $sala->listarSala();
while ($row = $dado->fetch(PDO::FETCH_OBJ)) {
    ?>

                                                                <option value="<?php if ($row->idSala == $dados->idSala): echo $row->idSala; ?> "<?php echo "selected"; ?> > <?php echo "Sala:" . $row->numero . "\t\t Capacidade: " . $row->capacidade;
    endif;
    ?> </option>
                                                                <option value="<?php echo $row->idSala; ?>"><?php echo "Sala:" . $row->numero . "\t\t Capacidade: " . $row->capacidade;
                                                        } ?></option>



                                                        </select>
                                                    </div>


                                                </div>
                                                <div class="form-group">
                                                    <label for="estado" class="control-label col-lg-13">Estado <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <select id="estado" name="estado" class="form-control">
                                                            <option value="1" <?php if ($dados->estado == 1) echo "selected"; ?>>Criado Mais ainda n&atilde;o aberto a Inscri&ccedil;&otilde;es</option>     
                                                            <option value="2" <?php if ($dados->estado == 2) echo "selected"; ?>>Aguardando Inscri&ccedil;&otilde;es</option>
                                                            <option value="3" <?php if ($dados->estado == 3) echo "selected"; ?>>Conclu&iacute;do com datas e hora definida</option>
                                                            <option value="4" <?php if ($dados->estado == 4) echo "selected"; ?>>Inscri&ccedil;&otilde;es Fechadas Mais Com Data e Hora pra Definir</option>

                                                        </select>
                                                    </div>
                                                </div>


                                                <label for="ambito" class="control-label col-lg-13">Âmbito <span class="required">*</span> </label>
                                                <div class="col-lg-15">

                                                    <label for="publico">P&uacute;blico</label>
                                                    <input type="radio" value="publico" id="publico" name="ambito" <?php if ($dados->ambito == 'publico'): echo 'checked';
                                                            endif; ?> >
                                                    <label for="privado">Privado</label>
                                                    <input type="radio" value="privado" id="privado" name="ambito" <?php if ($dados->ambito == 'privado'): echo 'checked';
                                                            endif; ?> >


                                                </div>

                                                <div class="form-group">
                                                    <label for="descricao" class="control-label col-lg-13">Descri&ccedil;&atilde;o <span class="required">*</span> </label>

                                                    <div class="col-lg-10">
                                                        <textarea id="descricao"  name="descricao" class="caracteres form-control" spellcheck="true" lang="pt"> <?php echo $dados->descricao; ?></textarea>

                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-10">

                                                    <label for="anexo" class="control-label col-lg-2">Anexo</label>

                                                    <div class="col-lg-10">
                                                        <input class="form-control " id="foto" name="foto" type="file" accept="image/*" />

                                                    </div>
                                                </div>  <?php echo $securty->retornaToken(); ?>

                                                <input type="hidden" name="id"  value="<?php echo $dados->idEvento; ?>">
                                                <div class="form-group">
                                                    <label for="codigo" class="control-label col-lg-2"></label>
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button  type="submit" value="alterar" class="btn btn-primary" name="escolha"><span class="glyphicon"></span> Alterar</button>
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

                <style>
                    .block {
                        display: block;
                    }
                    form.cmxform label.error {
                        display: none;
                        color: red;
                    }

                    #errado {

                        color: red;
                    }

                    #sim {
                        margin-top: 50px;
                        display: none;
                    }
                </style>

                <script>

                    window.onload = function () {

                        document.getElementById("opc-nao").onclick = estipularData;
                        document.getElementById("opc-sim").onclick = estipularData;
                    }


                    function estipularData() {

                        var opc = document.getElementById("esconde");
                        if (opc) {
                            document.getElementById("opc-nao").checked;
                            document.getElementById("nao").style.display = "block";
                            document.getElementById("sim").style.display = "none";
                        } else {
                            document.getElementById("opc-sim").checked;
                            document.getElementById("nao").style.display = "none";
                            document.getElementById("sim").style.display = "block";
                        }
                    }
                </script>

            </section>
            <!--main content end-->
        </section>
        <!-- container section end -->

        <!-- javascripts -->

    </body>
</html>
