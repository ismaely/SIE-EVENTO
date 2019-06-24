<!DOCTYPE html>

<html lang="pt">
   
    <head>
        <meta charset="UTF-8">
        <title> <?php echo 'Docente sie';?></title>
    </head>
    <body>
        <?php
        
         
           include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
            $securty->criarToken(); 
           include "barra_lateral_docente.php";
            
        ?>
        <br>
        <p>                       
         <section id="container" class="">

           <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user-md"></i> Docente</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"> </i><a href="#">Home-Docente</a></li>
						
					</ol>
				</div>
			</div>

                                   <?php
                                      try {   
                                        $resulta = $docente->buscarDados();
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
                                   <img alt="" src="<?php echo ($resulta->foto!=''?'../../arquivos/'. $resulta->foto.'':'../../arquivos/padrao.jpg');?>" height="62" width="62">
                              </div>
                              <h6>Docente</h6>
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
                                                  <p><span>Nome: </span> <strong><?php echo $resulta->nome;?> </strong></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Sobrenome: </span> <strong><?php echo $resulta->sobrenome;?> </strong></p>
                                              </div>                                              
                                              <div class="bio-row">
                                                  <p><span >Data de Nascimento</span> <strong><?php echo $nascimento;?> </strong></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>G&eacute;nero: </span> <strong><?php echo ($resulta->genero=="M")?"Masculino":"Feminino";?> </strong></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Ocupa&ccedil;&atilde;o:  </span> <strong><?php echo 'Docente Academico';?> </strong></p>
                                              </div>
                                               <div class="bio-row">
                                                   <p><span >Grau Acad&eacute;mico: </span> <strong><?php echo $resulta->grauAcademico;?> </strong></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Especialidade:  </span> <strong><?php echo $resulta->especialidade;?> </strong></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Email: </span> <strong><?php echo $resulta->email;?> </strong></p>
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

                                                    <div class="col-lg-10">

                                                        <img src="<?php echo ($resulta->foto!=''?'../../arquivos/'. $resulta->foto.'':'../../arquivos/padrao.jpg');?>" height="160" width="150" id="foto-cliente">

                                                    </div>
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
                                                        <input id="sobrenome" name="sobrenome" type="text" class="caracteres form-control" placeholder="Sobrenome" maxlength="40"
                                                               value="<?php echo $resulta->sobrenome; ?>">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="telefone" class="control-label col-lg-13">Telefone <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="telefone" name="telefone" type="tel" class="telefone form-control" placeholder="N&uacute;mero de Telefone"
                                                               value="<?php echo $resulta->telefone; ?>">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="genero" class="control-label col-lg-13">G&eacute;nero <span class="required">*</span> </label>


                                                    <div class="col-lg-10">
                                                        <select id="genero" name="genero" class="genero form-control">

                                                            <option value="F" <?php if ($resulta->genero == "F") echo "selected"; ?>>Feminino</option>
                                                            <option value="M" <?php if ($resulta->genero == "M") echo "selected"; ?>>Masculino</option>

                                                        </select>
                                                    </div>


                                                </div>


                                                <div class="form-group">
                                                    <label for="data_nascimento" class="control-label col-lg-13">Data de Nascimento <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="data_nascimento" name="data_nascimento"  value="<?php echo $nascimento;?>"type="text" class="dataNascimento form-control" placeholder="Dia/M&ecirc;s/Ano">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email" class="control-label col-lg-13">Email <span class="required">*</span> </label>

                                                    <div class="col-lg-10">
                                                        <input id="email" name="email" type="text" value="<?php echo $resulta->email;?>"class="email form-control" placeholder="Email" maxlength="40">
                                                        <span id="errado"> </span> <br>

                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="grau" class="control-label col-lg-13">Grau Acad&eacute;mico <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <select id="grau" name="grau" class="form-control">

                                                            <option value="Doutoramento"<?php if ($resulta->grauAcademico == "Doutoramento") echo "selected"; ?> >Doutoramento</option>
                                                            <option value="Licenciatura" <?php if ($resulta->grauAcademico == "Licenciatura") echo "selected"; ?>>Licenciatura</option>
                                                            <option value="Mestrado" <?php if ($resulta->grauAcademico == "Mestrado") echo "selected"; ?>>Mestrado</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nome" class="control-label col-lg-13">Especialidade <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="nome" name="especialidade" type="text" value="<?php echo $resulta->especialidade;?>"class="caracteres form-control" placeholder="Informa a sua especialidade" maxlength="40">

                                                    </div>
                                                </div>  
                                                
                                                    <div class="form-group">
                                                <label for="email" class="control-label col-lg-13"> </span> </label>
                                              <input type="hidden" name="id" value="<?php echo $resulta->idUser;?>"/>
                                                <div class="col-lg-10">

                                                </div>
                                            </div>

                                                <div class="form-group">
                                                     <?php echo $securty->retornaToken();?>
                                                    <label for="codigo" class="control-label col-lg-13"></label>
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button  type="submit" value="altdocente" class="btn btn-primary" name="opcao"><span class="glyphicon"></span> Alterar</button>
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


 