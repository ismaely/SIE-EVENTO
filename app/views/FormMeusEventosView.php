<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
       <title> <?php echo 'Eventos Do Docente';?></title>
    </head>
    <body>
        <?php



           include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
           include "barra_lateral_docente.php";
             $securty->criarToken();

        ?>
        <br/>
        <section id="container" class="">

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">

                    </div>


                                     <?PHP
                                      $guarda= $evento-> listarEventoDocente();

                                   //  var_dump($guarda);
                                       echo '<p>';


                                   foreach ($guarda as $item => $value){
                                    //while($item= $guarda->fetch(PDO::FETCH_OBJ)){


                                        ?>

                        <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                
                                <?php $buscarEstados = $evento->buscarEstados($guarda[$item]->estado);
                                
                                if($guarda[$item]->estado==5){   ?>
                                <div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Ops !</strong> o evento foi cancelado... temporariamente....
                              </div> 
                                
                                <?php  } 
                                      
                                else{
                                      ?>
                                
                                   <div class="alert alert-info fade in">
                                        <div class="panel-heading">
                                            <h4>    <strong>  Meus Eventos Criados </strong></h4>
                                        </div></div>
                                      <?php  }
                                      ?>
                                
                                <div class="panel-body">
                                    <div class="form">


                                <table class="table table-striped table-advance table-hover">

                                     <div class="pull-left"></div>

                                 <tbody class="btn-group">
                                  <tr>
                                      <td>
                                        <div class="btn-group">
                                          <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button"> <i class="icon_tags"></i> Listar/ Definir<span class="caret"></span> </button>
                                          <ul class="dropdown-menu">
                                         <li>
                                             <a class="btn btn-default"  href="<?php echo META_URL;?>Rotas_/formDataHora/<?php echo $securty-> criptografarUrl('dataHora'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                             <i class="icon_tags"></i> Definir data e Hora</a>
                                              
                                              </li>
                                              
                                               <li><a class="btn btn-default" href="<?php echo META_URL;?>Rotas_/listarIncricoes/<?php echo $securty-> criptografarUrl('lis_inscri'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                                      <i class="icon_tags"></i> Listar Inscri&ccedil;&otilde;es</a> 
                                              </li>
                                              
                                              <li><a class="btn btn-default" href="<?php echo META_URL;?>Rotas_/FormContagemDaDisponiblidade/<?php echo $securty-> criptografarUrl('contagem'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                              <i class="icon_tags"></i> Contagem das Disponiblidade</a> 
                                              </li>
                                              
                                          </ul>
                                      </div>    
                                          
                                      </td>
                                      
                                       <td>
                                      <div class="btn-group">
                                          <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button"> <i class="icon_id"></i> Alterar Dados<span class="caret"></span> </button>
                                          <ul class="dropdown-menu">
                                              <li>
                                             <a class="btn btn-default"  href="<?php echo META_URL;?>Rotas_/formAlterarDadosEvento/<?php echo $securty-> criptografarUrl('altera'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                         <i class="icon_id"></i>  Alterar Dados do Evento</a>
                                              </li>
                                              <li> 
                                                  <a class="btn btn-default" href="<?php echo META_URL;?>Rotas_/formAlterarEstado/<?php echo $securty-> criptografarUrl('estados'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                                <i class="icon_id"></i>  Alterar Estado do Evento</a>
                                              </li>
                                              
                                          </ul>
                                      </div>  
                                       </td>
                                       
                                        <td>
                                          <div class="btn-group">
                                          <button data-toggle="dropdown" class="btn btn-success dropdown-toggle" type="button">  <i class="icon_check_alt2"></i> Convidar / Privilegio<span class="caret"></span> </button>
                                          <ul class="dropdown-menu">
                                              <li>
                                         <a class="btn btn-default" href="<?php echo META_URL;?>Rotas_/FormSelecionarConvidado/<?php echo $securty-> criptografarUrl('convidado'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                         <i class="icon_check_alt2"></i>  Selecionar Convidado</a>
                                              </li>
                                              <li> 
                                                  <a class="btn btn-decaying-with-elegance-1" href="<?php echo META_URL;?>Rotas_/concedePirievilegio/<?php echo $securty-> criptografarUrl('privilegio'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?> ">
                                                      <i class="icon_check_alt2"></i>  Conceder Privilegio</a>
                                              </li>
                                            </ul>
                                      </div>  
                                           
                                       </td>
                                      
                                  <td><a class="btn btn-danger" href="<?php echo META_URL;?>Evento_/eventoCancelado/<?php echo $securty-> criptografarUrl('cancelar'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                       <i class="icon_close_alt2"></i>  Eliminar Evento</a> </td>

                              </tr>

                                 </tbody>

                                   </table>       <!-- informacao do evento  -->
                                        <div id="info-evento-navegacao">
                                            <div id="info-evento" class="info-evento">
                                                <div id="div-img" class="div-img">
                                                  <div id="foto-evento">
                                                          <img alt="" src="<?php echo ($guarda[$item]->foto!=''?'../../arquivos/'. $guarda[$item]->foto.'':'../../arquivos/padrao.jpg');?>" height="35" width="35" title="autor">
                                                          <p>
                                                          <span><?php echo ($guarda[$item]->genero=='M')?'Autor:' :'Autora:'; ?> <strong>  <?php echo $guarda[$item]->nome;  ?> </strong> </li></span>
                                                          </p>
                                                      </div>

                                </div>  <div> <h4>Evento : <strong><?php echo $guarda[$item]->nomeEvento; ?> </strong> Criado no dia  <strong> <?php echo $guarda[$item]->dataCriacao;?> </strong> </h4>
                                                   
                                              
                                                              <div>
                                                         <ul>
                                                            <li>Descrição:                   <strong>  <?php echo $guarda[$item]->descricao;  ?> </strong> </li>
                                                             <li>Categoria:               <strong>  <?php echo $guarda[$item]->categoria; ?> </strong> </li>
                                                             <li>Evento de Ambito:            <strong> <?php echo $guarda[$item]->ambito;  ?> </strong></li>
                                                            <li>Estado do Evento:             <strong> <?php echo $buscarEstados->estado; ?> </strong></li>
                                                            <li>Data de Realização:           <strong> <?php echo ( isset($guarda[$item]->dataRealiza)?$guarda[$item]->dataRealiza:'' );   ?> </strong></li>
                                                            <li>Hora de Inicio de Realização:  <strong><?php echo  (isset($guarda[$item]->horaInicioRealiza )?$guarda[$item]->horaInicioRealiza:'' ); ?> </strong></li>
                                                            <li>Hora de Fim de Realização      <strong> <?php echo (isset($guarda[$item]->horaFimRealiza)? $guarda[$item]->horaFimRealiza:''); ?> </strong></li>
                                                            <li>Data limite de Inscrição:      <strong> <?php echo (isset($guarda[$item]->dtLimiteInscr)? $guarda[$item]->dtLimiteInscr:''); ?> </strong></li>
                                                             <li>Hora limite da Inscrição:      <strong> <?php echo (isset($guarda[$item]->hrLimiteInscr)? $guarda[$item]->hrLimiteInscr:''); ?> </strong></li>
                                                             <li>Sala:                            <strong><?php echo $guarda[$item]->numero;  ?></strong> com uma Capacidade de: <strong><?php echo $guarda[$item]->capacidade;  ?></strong></li>

                                                        </ul>
                                                    </div></div>

                                            </div>


                 <div class="panel panel-info">
	          <div class="panel-heading">
                  <div class="pull-left">Comentarios</div>
                 </div>

                <div class="panel-body">
                  <!-- Widget content -->
                  <div class="padd sscroll">

                      <ul class="chats">

                              <?php
                              $id = $guarda[$item]->idEvento;
                              $buscaCom = $comentario->buscarComentario($id);
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

                     <form class="form-inline"   method="POST" action="<?php echo META_URL;?>Evento_/validarComentario/"enctype="multipart/form-data">

		        <div class="form-group">
	             <textarea id="" name="comentario" class="caracteres form-control" > </textarea>
	            </div>
                          <?php  echo $securty->retornaToken();?>
                        <button type="submit" value="<?php echo $guarda[$item]->idEvento;?>" name="idEvento" class="btn btn-info">Enviar</button>
                      </form>


                  </div>
                </div>
              </div>
              </div>        </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <?php  } ?>


                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
        </section>
    <!-- container section end -->

    </body>
</html>
