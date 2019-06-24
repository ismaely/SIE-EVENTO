<!DOCTYPE html>
<?php   $httponly = true; setcookie("logado", serialize($_SESSION['login']), time()-3600, NULL,NULL, $httponly); ?>
<html>
    <head>

        <meta charset="UTF-8">
<!--         <meta http-equiv="Refresh" content="16;url=/app_sie_unificado_2016/Rotas_/perfilDocente/">-->
        <title> <?php

                $login=$_SESSION['login'];



            if ($login->nivel == NIVEL_ESTUDANTE):

                echo "Eventos Publicos";
            endif;
            if ($login->nivel == NIVEL_DOCENTE):
                echo "Eventos Publicos";
            endif;
            ?>
        </title>
    </head>
    <body>
        <?php
           include "cabecalho.php";
            $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
           $securty->criarToken();


        include "barra_lateral_estudante.php";


        if ($login->nivel == NIVEL_ESTUDANTE)
            include "barra_lateral_estudante.php";


        if ($login->nivel== NIVEL_DOCENTE)
            include "barra_lateral_docente.php";
        ?>
        <br>
        <p>

        <section id="container" class="">



            <!--main content start-->
            <section id="main-content">



                <section class="wrapper">
<!--            <div id="resultado"></div>
                <br/><br />
                <div id="conteudo"></div>-->

                    <div class="row">

                               <div class="alert alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                 <h3> &nbsp;&nbsp;&nbsp;&nbsp;  <strong> <?php echo ''.Mensagem::getSucesso();?> </strong></h3>
                              </div>

                    </div>


                    <?PHP
                    $guarda = $evento->listarSoEvento();

                    $hoje = date('Y-m-d');
                    if (count($guarda) != 0):
                        foreach ($guarda as $item => $value) {
                            ?>
                            <div class="row">

                                <div class="col-lg-12">
                                    <section class="panel">

                                        <div class="panel-body progress-panel">
                                          
                                     <?php 
                               $buscarEstados = $evento->buscarEstados($guarda[$item]->estado);
                                   
                               if($guarda[$item]->estado==5){
                               ?>          
                                  <div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Ops !</strong> o evento publico foi cancelado por enquanto.....
                              </div>           
                               <?php
                               }
                               else{
                                 
                               ?>    
                                            
                            <div class="row">
                              <div class="col-lg-8 task-progress pull-left">
                                  <h1>Evento Publico</h1>
                              </div>
                              <div class="col-lg-4">
                                <span class="profile-ava pull-right">
                                        <img alt="" class="simple" src="">
                                        <strong>
                                            <?php
                               
                                            $bmb= $inscricao-> contarInscricao($guarda[$item]->idEvento);

                                            echo (isset($bmb->Quantidade)?'Pessoas Incritas: '.$bmb->Quantidade : 'Pessoas Incritos: 0');
                                           }
                                            ?>
                                        </strong>
                                </span>
                              </div>
                            </div>
                                            
                                            
                                            
                          </div>


<!--                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <strong>Eventos De Destaque</strong>
                                            </div></div>-->


                                        <div class="panel-body">
                                            <div class="form">
                                                <table class="table table-striped table-advance table-hover">
                                                    <div class="pull-left"> </div>
                                                    <tbody class="btn-group">
                                                        <tr>

                                                       <?php 
                                                       if($guarda[$item]->estado!=5){
                                                       
                                                       ?>

                                                            <td>
                                                            <a class="btn btn-primary" href="<?php echo META_URL;?>Rotas_/FormContagemDaDisponiblidade/<?php echo $securty-> criptografarUrl('dataHora'.$_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                                            <i class="icon_tags"></i> Contagem das Disponiblidade</a>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ids = $guarda[$item]->idEvento;

                                                                $even = $evento->buscarDados($ids);

                                                                $data = $even->dtLimiteInscr;

                                                                $exacto = strcasecmp($data, $hoje);

                                                                $retorno = $inscricao->validarBotaoInscr($ids);


                                                                if (!$retorno && $exacto > 0):
                                                                    
                                                                    //  AQUE É ONDE ESTA A SER RESTRIGIDO O BOTAO INSCIÇÃO CASO SEJA VERDADADE
                                                                    ?>
                                                                <a class="btn btn-primary" href="<?php echo META_URL; ?>Inscricao_/validarDados/<?php echo $securty->criptografarUrl('idEvento'.$_SESSION['codigo']) . '=' . $guarda[$item]->idEvento; ?>">
                                                                <i class="icon_plus_alt2"></i> Fazer Inscrição</a>
                                                                  <?php endif; ?>
                                                                    </td>

                                                                    <td>
                                                                        <?php

                                                                    $validarBotao = $inscricao->validarBotaoDisponiblidade($ids);

                                                                    $Disp = $disponiblidade->SelecionarDisponiblidade($ids);

                                                                   if ($validarBotao && $retorno && $Disp!=TRUE):
                                                                      ?>
                                                                    <a class="btn btn-success" href="<?php echo META_URL; ?>Rotas_/FormIndicarDesponiblidade/<?php echo $securty->criptografarUrl('disponivel'. $_SESSION['codigo']) . '=' . $guarda[$item]->idEvento; ?>">
                                                                        <i class="icon_check_alt2"></i>  Indicar Desponibilidade</a>
                                                                    </td>
                                                                  <?php endif;
                                                                      ?>

                                                                        <?php

                                                                        if ($Disp):
                                                                      ?>
                                                                    <a class="btn btn-success" href="<?php echo META_URL; ?>Rotas_/FormAlterarDesponiblidade/<?php echo $securty->criptografarUrl('disponivelAlterar'. $_SESSION['codigo']) . '=' . $guarda[$item]->idEvento; ?>">
                                                                        <i class="icon_check_alt2"></i>  Alterar Disponibilidade</a></td>
                                                                  <?php endif; ?>


                                                            <td>
                                                            <?php
                                                            if ($retorno):
                                                                ?>

                                                                    <a class="btn btn-danger" href="<?php echo META_URL; ?>Inscricao_/validarDados/<?php echo $securty->criptografarUrl('cancelar'. $_SESSION['codigo']) . '=' . $guarda[$item]->idEvento; ?>">
                                                                        <i class="icon_close_alt2"></i>  Cancelar Inscrição</a>

                                                                      <?php endif;
                                                                      
                                                          }
                                                                      ?>
                                                            </td>

                                                        </tr>

                                                    </tbody>

                                                </table>       <!-- informacao do evento  -->
                                                <div id="info-evento-navegacao">
                                                    <div id="info-evento" class="info-evento">
                                                        <div id="div-img" class="div-img">

                                                          <?php
                                                    $giff_vgl = $evento->buscarInformacao($guarda[$item]->idEvento);
                                                             ?>
                                                            <div id="foto-evento">
                                                                        <img alt="" src="<?php echo ($giff_vgl->foto!=''?'../../arquivos/'. $giff_vgl->foto.'':'../../arquivos/padrao.jpg');?>" height="40" width="40" title="autor">
                                                                        <p>
                                                                            <span>    <?php echo ($giff_vgl->genero == 'M') ? 'Autor:' : 'Autora:'; ?><strong>  <?php echo $giff_vgl->nome; ?></strong> </li></span>
                                                                        </p>
                                                                    </div>

                                                                </div><div> <h4>Evento : <strong><?php echo $guarda[$item]->nomeEvento; ?> </strong> Criado no dia  <strong> <?php echo $guarda[$item]->dataCriacao; ?> </strong> </h4>

                                                                                     
                                                                    <div>
                                                                        <ul>
                                                                            <li>Descrição:                     <strong>  <?php echo $guarda[$item]->descricao; ?> </strong> </li>
                                                                            <li>Categoria:                     <strong>  <?php echo $guarda[$item]->categoria; ?> </strong> </li>
<!--                                                                            <li>Evento de Ambito:          <strong> <?php echo $guarda[$item]->ambito; ?> </strong></li> -->
                                                                            <li>Estado do Evento:              <strong> <?php echo $buscarEstados->estado; ?> </strong></li>
                                                                            <li>Data de Realização:            <strong> <?php echo ( isset($guarda[$item]->dataRealiza) ? $guarda[$item]->dataRealiza : '' ); ?> </strong></li>
                                                                            <li>Hora de Inicio de Realização:  <strong><?php echo (isset($guarda[$item]->horaInicioRealiza) ? $guarda[$item]->horaInicioRealiza : '' ); ?> </strong></li>
                                                                            <li>Hora de Fim de Realização      <strong> <?php echo (isset($guarda[$item]->horaFimRealiza) ? $guarda[$item]->horaFimRealiza : ''); ?> </strong></li>
                                                                            <li>Data limite de Inscrição:      <strong> <?php echo $guarda[$item]->dtLimiteInscr;?> </strong></li>
                                                                            <li>Hora limite da Inscrição:      <strong> <?php echo $guarda[$item]->hrLimiteInscr; ?> </strong></li>
                                                                            <li>Sala:                          <strong><?php echo $guarda[$item]->numero; ?></strong> com uma Capacidade de: <strong><?php echo $guarda[$item]->capacidade .' Pessoa'; ?></strong></li>
                                                                            <p>
                                                                              
                                                                          <?php

                                                                     if(!isset($guarda[$item]->dataRealiza)):

                                                                         $dh = $DataHora->buscarDataHoraRealiza($guarda[$item]->idEvento);
                                                                           while( $hd = $dh->fetch(PDO::FETCH_OBJ)):

                                                                       echo '<li>As Datas e as Horas Alterativas: <strong>  </strong></li>';
                                                                        echo '<li> Data: <strong> '.$hd->dataEstipulada.' </strong></li>';
                                                                         echo '<li> Hora de inicio: <strong> '.$hd->horaInicio.' </strong></li>';
                                                                          echo '<li> Hora de Fim : <strong> '.$hd->horaFim.' </strong></li>';
                                                                          echo '<p>';
                                                                      endwhile;
                                                                     endif;
                                                                     ?>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>



                                                    <div class="panel panel-info">
                                                        <div class="panel-heading" >
                                                            <div class="pull-left">Comentarios</div>
                                                        </div>

                                                        <div class="panel-body">
                                                            <!-- Widget content -->
                                                            <div class="padd sscroll">

                                                                <ul class="chats">

                                                                    <!--  -->
                                                                <?php
                                                                 $id = $guarda[$item]->idEvento;
                                                                 $buscaCom = $comentario->buscarComentario($id);

                                                               //  var_dump($buscaCom);
                                                               //  die();
                                                               foreach ($buscaCom as $com => $value) {
                                                                   ?>
                                                                                               <li class="by-me">
                                                                            <!-- ZONA QUE ESTA A SER EXIBIDO O COMENTARIO -->
                                                                            <div class="avatar pull-left">
                                                                                <img alt="" src="<?php echo ($buscaCom[$com]->foto!=''?'../../arquivos/'. $buscaCom[$com]->foto.'':'../../arquivos/padrao.jpg');?>" height="35" width="35">
                                                                            </div>

                                                                            <div class="chat-content">
                                                                                <!-- In meta area, first include "name" and then "time" -->
                                                                                <div class="chat-meta"><strong> Nome: <?php echo $buscaCom[$com]->nome; ?> ---<?php echo ( isset($buscaCom[$com]->data) ? $buscaCom[$com]->data : '' ); ?>
                                                                                        As:  &nbsp;   <?php echo ( isset($buscaCom[$com]->hora) ? $buscaCom[$com]->hora : '' ); ?> </strong></div>
                                                                            <?php echo ( isset($buscaCom[$com]->mensagem) ? $buscaCom[$com]->mensagem : '' );
                                                                            ?>
                                                                                <div class="clearfix"></div>
                                                                            </div>

                                                                        </li>
                                                                     <?php } ?>
                                                                </ul>

                                                            </div>
                                                            <!-- Widget footer -->
                                                            <div class="widget-foot">

                                                                <form class="form-inline"   method="POST" action="<?php echo META_URL; ?>Evento_/validarComentario/"enctype="multipart/form-data">
                                                                    <div class="form-group">

                                                                        <textarea  name="comentario" class="caracteres form-control" > </textarea>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-lg-offset-2 col-lg-10">
                                                                       <?php echo $securty->retornaToken();
                                                                       
                                                                         if($guarda[$item]->estado!=5){
                                                                             ?>
                                                                            <button type="submit" value="<?php echo $guarda[$item]->idEvento; ?>" name="idEvento" class="btn btn-info">Enviar</button>
                                                                       
                                                                         <?php }  ?>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>






                                <?php
                                }



                            else:
                                ?>




                                <?php

                                echo '<h3> Nao tens nehum evento publicado</h3>';



                            endif;
                            ?>




                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
        </section>

        <!-- container section end -->
        <!-- page end-->
    </body>
</html>


