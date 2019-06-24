<!DOCTYPE html>
<!--
   APENAS SERA EXIBIDOS EVENTOS PRIVELIGIADOS CUJA AS PESSOAS RECEBERAM PRIVILEGIOS
-->
<html>
    <head>
        <meta charset="UTF-8">
       <title> <?php
               $login=$_SESSION['login'];
              

            if ($login->nivel == NIVEL_ESTUDANTE):

                echo "Perfil do Estudante";
            endif;
            if ($login->nivel == NIVEL_DOCENTE):
                echo "Perfil do Docente";
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
           
           if ($login->nivel== NIVEL_ESTUDANTE) 
           include "barra_lateral_estudante.php";
           


           if ($login->nivel == NIVEL_DOCENTE) 
         include "barra_lateral_docente.php";
           
      ?>
        
        
        <br/>
        <section id="container" class="">

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">

                    </div>        <?PHP 
                                     
                                      $guarda= $previlegio->eventosPrivilegiado();
                                     
                                    if(count($guarda)>0):
                                  
                            
                                   foreach ($guarda as $item => $value){
                                        
                              $buscarDados = $previlegio->buscarDados( $guarda[$item]->idEvento); 
                                   
                                if($buscarDados->idUser==$login->idUser ):
                                        ?> 
                               
                        <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                
                                
                                 <?php if($guarda[$item]->estado==5){   ?>
                                
                                <div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Ops !</strong> o evento Priviligiado foi cancelado... temporariamente....
                              </div> 
                                
                                <?php 
                                }
                                else{
                                    
                                    ?>
                                
                                       <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h4>  <strong> Eventos Priviligiado</strong></h4>
                                        </div></div>
                                 
                                <?php 
                                }
                                
                                   ?>
                                
                                
                                <div class="panel-body">
                                    <div class="form">

                                        
                                <table class="table table-striped table-advance table-hover">
                                    
                                     <div class="pull-left"></div>
                                     
                                 <tbody class="btn-group">
                                  <tr>
                                      
                                             <?php   
                                            if($guarda[$item]->estado!=5){
                                                       
                                                      
                                                 if($buscarDados->grau==1 ||$buscarDados->grau >1):
                                                   ?>
                                      <td>  
                                            
                                           <a class="btn btn-success" href="<?php echo META_URL; ?>Inscricao_/validarDados/<?php echo $securty->criptografarUrl('idEvento'. $_SESSION['codigo']) . '=' . $guarda[$item]->idEvento; ?>">
                                          <i class="icon_plus_alt2"></i> Fazer Inscrição</a>
                                       </td>
                                             <?php 
                                               endif;
                                              if( $buscarDados->grau > 1):
                                              ?>
                                      <td> <a class="btn btn-success" href="<?php echo META_URL;?>Rotas_/FormSelecionarConvidado/<?php echo $securty-> criptografarUrl('convidado'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                         <i class="icon_check_alt2"></i>Selecionar Convidado</a>
                                         </td>
                                         
                                      <td> <a class="btn btn-warning" href="<?php echo META_URL;?>Rotas_/formAlterarDadosEvento/<?php echo $securty-> criptografarUrl('altera'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                         <i class="icon_check_alt2"></i>Alterar Dados</a></td>
                                          
                                         
                                          <td> <a class="btn btn-warning" href="<?php echo META_URL;?>Rotas_/formAlterarEstado/<?php echo $securty-> criptografarUrl('estados'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                         <i class="icon_check_alt2"></i>Alterar Estado</a></td> 
                                         
                                        
                                
                               <td><a class="btn btn-danger" href="<?php echo META_URL;?>Rotas_/eventoCancelado/<?php echo $securty-> criptografarUrl('cancelar'. $_SESSION['codigo']).'='.$guarda[$item]->idEvento;?>">
                                       <i class="icon_close_alt2"></i>  Cancelar Evento</a> 
                               
                               </td>
                                       <?php 
                                      endif;
                                         ?>
                               
                                                         <td>      
                                                         <?php
                                                                        
                                                               $validarBotao = $inscricao->validarBotaoDisponiblidade($guarda[$item]->idEvento);
                                                            
                                                                    $Disp = $disponiblidade->SelecionarDisponiblidade($guarda[$item]->idEvento);

                                                                   if ($validarBotao && $retorno && $Disp!=TRUE):
                                                                      ?>
                                                                    <a class="btn btn-success" href="<?php echo META_URL; ?>Rotas_/FormIndicarDesponiblidade/<?php echo $securty->criptografarUrl('disponivel'.SegurancaDao::get_codigo()) . '=' . $guarda[$item]->idEvento; ?>">
                                                                        <i class="icon_check_alt2"></i>  Indicar Desponibilidade</a>
                                                                    </td>
                                                                  <?php 
                                                                  
                                                                  endif; 
                                                                     
                                                                  }   ?> 
                               
                               
                                         
                              </tr>
                                     
                                 </tbody>
                                 
                                   </table>       <!-- informacao do evento  -->
                                        <div id="info-evento-navegacao">                                  
                                            <div id="info-evento" class="info-evento">
                                                <div id="div-img" class="div-img">
                                                    
                                                       <?php
                                                         $giff_vgl= $evento->buscarInformacao($guarda[$item]->idEvento) ;
                                                                                  
                                                          ?>
                                                      <div id="foto-evento">
                                                                <img alt="" src="../../arquivos/<?php echo(isset($giff_vgl->foto)?$giff_vgl->foto:'padrao.jpg');?>" height="35" width="35" title="autor">
                                                                <p>                          
                                                                    <span> <?php echo ($giff_vgl->genero=='M')?'Autor:' :'Autora:'; ?><strong>  <?php echo $giff_vgl->nome; ?></strong> </li></span>
                                                                </p>
                                                            </div>
                                                    
                                </div>  <div> <h4>Evento : <strong><?php echo $guarda[$item]->nomeEvento; ?> </strong> Criado no dia  <strong> <?php echo $guarda[$item]->dataCriacao;?> </strong> </h4>
                                                   
                                                  <?php $buscarEstados = $evento->buscarEstados($guarda[$item]->estado); ?>
                                                    <div>
                                                         <ul>
                                                            <li>Descrição:                   <strong>  <?php echo $guarda[$item]->descricao;  ?> </strong> </li>
                                                             <li>Categoria:                 <strong>  <?php echo $guarda[$item]->categoria; ?> </strong> </li>
                                                             <li>Evento de Ambito:            <strong> <?php echo $guarda[$item]->ambito;  ?> </strong></li> 
                                                            <li>Estado do Evento:             <strong> <?php echo $buscarEstados->estado; ?> </strong></li>
                                                            <li>Data de Realização:           <strong> <?php echo ( isset($guarda[$item]->dataRealiza)?$guarda[$item]->dataRealiza:'Data indefinida' );   ?> </strong></li>
                                                            <li>Hora de Inicio de Realização:  <strong><?php echo  (isset($guarda[$item]->horaInicioRealiza )?$guarda[$item]->horaInicioRealiza:'Hora indefinida' ); ?> </strong></li>
                                                            <li>Hora de Fim de Realização      <strong> <?php echo (isset($guarda[$item]->horaFimRealiza)? $guarda[$item]->horaFimRealiza:'hora indefinida '); ?> </strong></li>
                                                            <li>Data limite de Inscrição:      <strong> <?php echo (isset($guarda[$item]->dtLimiteInscr)? $guarda[$item]->dtLimiteInscr:'data indefinida '); ?> </strong></li>
                                                             <li>Hora limite da Inscrição:      <strong> <?php echo (isset($guarda[$item]->hrLimiteInscr)? $guarda[$item]->hrLimiteInscr:'hora indefinida '); ?> </strong></li>
                                                             <li>Sala:                            <strong><?php echo $guarda[$item]->numero;  ?></strong> com uma Capacidade de: <strong><?php echo $guarda[$item]->capacidade;  ?></strong></li>  
                                                               <?php
                                                             if (!isset($guarda[$item]->dataRealiza)):

                                                                $dh = $DataHora->buscarDataHoraRealiza($guarda[$item]->idEvento);
                                                                  while ($hd = $dh->fetch(PDO::FETCH_OBJ)):

                                                                 echo '<li>As Datas e as Horas Alterativas: <strong>  </strong></li>';
                                                                 echo '<li> Data: <strong> ' . $hd->dataEstipulada . ' </strong></li>';
                                                                 echo '<li> Hora de inicio: <strong> ' . $hd->horaInicio . ' </strong></li>';
                                                                  echo '<li> Hora de Fim : <strong> ' . $hd->horaFim . ' </strong></li>';
                                                                  echo '<p>';
                                                                  endwhile;
                                                                   endif;
                                                                         ?>                              

                                                             
                                                             
                                                             
                                                        </ul>
                                                    </div></div>
                                               
                                            </div>
                                           
                                      
                 <div class="panel panel-primary">
	          <div class="panel-heading">
                      <div class="pull-left"> <strong>Comentarios </strong></div>
                 </div>

                <div class="panel-body">
                  <!-- Widget content -->
                  <div class="padd sscroll">
                    
                      <ul class="chats">

                              <?php
                              //$id = $guarda[$item]->idEvento;
                              $buscaCom= $comentario->buscarComentario($guarda[$item]->idEvento);
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
                        <?php  
                        if($guarda[$item]->estado!=5){
                                         ?>
                        <button type="submit" value="<?php echo $guarda[$item]->idEvento;?>" name="idEvento" class="btn btn-info">Enviar</button>
                        <?php   } ?>
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
                    
                              endif;
                              } 
                              
                              else:
                                  
                echo '<p><h2><strong> voce não tem nehum evento privilegiado </h2></strong></p>';         
                                  
                              endif;
                              ?>
                    
                    
                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
        </section>
    <!-- container section end -->

    </body>
</html>
