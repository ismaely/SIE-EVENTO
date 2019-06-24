<!DOCTYPE html>

<html lang="pt">
   
    <head>
        <meta charset="UTF-8">
        <title><?php echo 'Estudante sie';?></title>
    </head>
    <body>
        <?php
        
         
           include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
           
            //$securty->criarToken(); 
           
           include "barra_lateral_estudante.php";
            
        ?>
        <br>
        <p>                       
         <section id="container" class="">

           <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user-md"></i> Perfil do Estudante</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"> </i><a href="<?php echo META_URL;?>Estudante_/perfilEstudante/">Home</a></li>
						
					</ol>
				</div>
			</div>

                                   <?php
                          try {   
                                        $resulta =  $studante->buscarDados();
                                       //  print_r($resulta);
                                         $data=$resulta->dataNasc;
                                         $data_temp = explode('-', $data);
                                         $nascimento = $data_temp[2] . '/' . $data_temp[1] . '/' . $data_temp[0];
                                              ?> 
              <div class="row">
                <!-- profile-widget -->
                  <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                                <h4 style="width: 157px;"><?php echo $resulta->sobrenome;?></h4>               
                              <div class="follow-ava">
                                   <img alt="" src="../../public/fotos/padrao.jpg" height="35" width="35">
                              </div>
                              <h6>Estudante</h6>
                            </div>	
							
                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                 
                                  <li>
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Perfil
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Alterar Dados
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  
                                  <!-- profile -->
                                  <div id="profile" class="tab-pane">
                                    <section class="panel">
                                      <div class="bio-graph-heading">
                                           
                                          <!-- a que podemos desvrever algumas coisa-->
                                      </div>
                                              
                                        
                                        
                                      <div class="panel-body bio-graph-info">
                                          <h1>Biografia</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>Nome: </span><?php echo $resulta->nome;?> </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Sobrenome: </span><?php echo $resulta->sobrenome;?></p>
                                              </div>                                              
                                              <div class="bio-row">
                                                  <p><span style="width:160px;">Data de Nascimento</span><?php echo $nascimento;?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>G&eacute;nero </span><?php echo ($resulta->genero=="M")?"Masculino":"Feminino";?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Ocupa&ccedil;&atilde;o  </span><?php echo 'Estudante';?></p>
                                              </div>
                                               <div class="bio-row">
                                                  <p><span>Curso </span><?php echo $resulta->curso;?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span style="width:160px;">Numero de Estudante</span><?php echo $resulta->numero;?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Email </span><?php echo $resulta->email;?></p>
                                              </div>
                                             
                                              
                                          </div>
                                      </div>
                                    </section>
                                      <section>
                                          <div class="row">                                              
                                          </div>
                                      </section>
                                  </div>
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              
                                      
                                             
                                                                                             
                                                 <form role="form" class=" cmxform form-horizontal" id="form" method="POST" action="<?php echo META_URL;?>Utilizadore_/validarDados/" enctype="multipart/form-data" >

                                            <div class="form-group">

                                                <p>&nbsp;</p> <!-- contact-form-contact-form-->




                                                <div class="form-group col-lg-10">

                                                    <label for="foto" class="control-label col-lg-2">Foto</label>

                                                   
                                                    <div class="col-lg-10">
                                                        <input class="form-control " id="foto" name="foto" type="file" accept="image/*" />

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="nome" class="control-label col-lg-13">Nome <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="nome" name="nome" type="text" class="caracteres form-control" placeholder="Primeiro nome" maxlength="40"
                                                               value="<?php echo $resulta->nome; ?>">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="sobrenome" class="control-label col-lg-13">Sobrenome <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="sobrenome" name="sobrenome" type="text" class="caracteres form-control" placeholder="Sobrenome"
                                                               value="<?php echo $resulta->sobrenome; ?>" maxlength="40" >

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="telefone" class="control-label col-lg-13">Telefone <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="telefone" maxlength="14" name="telefone" type="text" class="telefone form-control"
                                                               placeholder="N&uacute;mero de Telefone" value="<?php echo $resulta->telefone; ?>"    >

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="genero" class="control-label col-lg-13">G&eacute;nero <span class="required">*</span> </label>


                                                    <div class="col-lg-10">
                                                        <select id="genero" name="genero" class="genero form-control">

                                                            <option value="F" <?php if ($resulta->genero == "F") echo "selected"; ?> >Feminino</option>
                                                            <option value="M" <?php if ($resulta->genero == "M") echo "selected"; ?> >Masculino</option>

                                                        </select>
                                                    </div>


                                                </div>


                                                <div class="form-group">
                                                    <label for="data_nascimento" class="control-label col-lg-13">Data de Nascimento <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="data_nascimento" name="data_nascimento" type="text" class="dateITA form-control" placeholder="Dia/M&ecirc;s/Ano"
                                                               value="<?php  echo $nascimento; ?>" >
                                                               <span class="help-block"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email" class="control-label col-lg-13">Email <span class="required">*</span> </label>

                                                    <div class="col-lg-10">
                                                        <input id="email" name="email" type="text" class="email form-control" placeholder="Email"
                                                               value="<?php echo $resulta->email; ?>" maxlength="40" >
                                                        <span id="errado"> </span> <br>

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="curso" class="control-label col-lg-13">Curso <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <select id="curso" name="curso" class="form-control">

                                                            <option value="Biologia" <?php if ($resulta->curso == "Biologia") echo "selected"; ?> >Biologia</option>
                                                            <option value="Ciências da Computação" <?php if ($resulta->curso == "Ciências da Computação") echo "selected"; ?> >Ciências da Computação</option>
                                                            <option value="Comunicação Social" <?php if ($resulta->curso == "Comunicação Social") echo "selected"; ?> >Comunicação Social</option>
                                                            <option value="Direito" <?php if ($resulta->curso == "Direito") echo "selected"; ?> >Direito</option>
                                                            <option value="Economia" <?php if ($resulta->curso == "Economia") echo "selected"; ?> >Economia</option>
                                                            <option value="Engenharia Geográfica" <?php if ($resulta->curso == "Engenharia Geográfica") echo "selected"; ?>>Engenharia Geográfica</option>
                                                            <option value="Engenharia Informática" <?php if ($resulta->curso == "Engenharia Informática") echo "selected"; ?> >Engenharia Informática</option>
                                                            <option value="Engenharia Química" <?php if ($resulta->curso == "Engenharia Química") echo "selected"; ?> >Engenharia Química</option>
                                                            <option value="Física" <?php if ($resulta->curso == "Física") echo "selected"; ?> >Física</option>
                                                            <option value="Matemática" <?php if ($resulta->curso == "Matemática") echo "selected"; ?> >Matemática</option>
                                                            <option value="Medicina"<?php if ($resulta->curso == "Medicina") echo "selected"; ?> >Medicina</option>
                                                            <option value="Psicologia" <?php if ($resulta->curso == "Psicologia") echo "selected"; ?> >Psicologia</option>
                                                            <option value="Química" <?php if ($resulta->curso == "Química") echo "selected"; ?>>Química</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="numeroEstudante" class="control-label col-lg-13">N&uacute;mero do Estudante: </label>
                                                    <div class=" col-lg-10">
                                                        <input id="numeroEst" maxlength="6" name="numeroEstudante" type="text" min="1" class="numeroEst form-control" placeholder="N&uacute;mero de Estudante" 
                                                               value="<?php echo $resulta->numero; ?>" >
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                                
                                               <div class="form-group">
                                                <label for="email" class="control-label col-lg-13"> </span> </label>
                                              <input type="hidden" name="id" value="<?php echo $resulta->idUser;?>"/>
                                                <div class="col-lg-10">
                                                </div>
                                            </div>
                                                       
                                                <div class="form-group">
                                                         <?php 
                                                
                                                       echo $securty->retornaToken();
                                                       ?>
                                                    <label for="codigo" class="control-label col-lg-13"></label>
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button  type="submit" value="altestudante" class="btn btn-primary" name="opcao"><span class="glyphicon"></span> Alterar </button>
                                                        <button class="btn btn-default" type="button">Cancelar</button>
                                                    </div>
                                                </div>                 
                                        </form>
                                              
                                        
                                          </div>
                                      </section>
                                  </div>
                              </div>
                          </div>
                      </section>
                 </div>
              </div>

                  <?php   }catch (Exception $ex) { 
                      
                      
                      
                  }?>
              <!-- page end-->
          </section>
          </section>

        </section>
       
    </body>
</html>


 