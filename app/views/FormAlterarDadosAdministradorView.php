 <?php
 

      $titulo="Alterar dados do Administrador";
     include "cabecalho.php";
   
    include "barra_lateral_admin.php";?>


<body class="home page no_js responsive stretched">

    <!-- container section start -->
    <section id="container" class="">
       
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">

                </div>

                                  <?php
                                  
                                      try {   
                                        $dados = $utilizador->buscarAdmin();
                                       //  print_r($resulta);
                                         
                                         
                                         
                                          ?> 
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Formulário Alterar Dados Pessoais
                            </header>
                            <div class="panel-body">
                                <div class="form">
                         
            

                                    <form role="form" class=" cmxform form-horizontal" id="form" method="POST" action="<?php echo META_URL;?>Utilizadore_/validarDados/" enctype="multipart/form-data" >

                                        <div class="form-group">

                                            <p>&nbsp;</p> <!-- contact-form-contact-form-->

                                       


                                            <div class="form-group col-lg-10">

                                                <div class="col-lg-10">

                                                    <img src="../../public/fotos/padrao.jpg" height="160" width="150" id="foto-cliente">

                                                </div>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="foto" name="foto" type="file" accept="image/*" />
                                           
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="nome" class="control-label col-lg-13">Nome <span class="required">*</span> </label>
                                                <div class="col-lg-10">
                                                    <input id="nome" name="nome" type="text" class="form-control" placeholder="Primeiro nome" maxlength="40"
                                                            value="<?php  echo $dados->nome;?>">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="sobrenome" class="control-label col-lg-13">Sobrenome <span class="required">*</span> </label>
                                                <div class="col-lg-10">
                                                    <input id="sobrenome" name="sobrenome" type="text" class="form-control" placeholder="Sobrenome" maxlength="40"
                                                           value="<?php  echo $dados->sobrenome;?>">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="telefone" class="control-label col-lg-13">Telefone <span class="required">*</span> </label>
                                                <div class="col-lg-10">
                                                    <input id="telefone" maxlength="14" name="telefone" type="text" class="telefone form-control"
                                                           placeholder="N&Uacute;mero de Telefone"value="<?php  echo $dados->telefone;?>">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="genero" class="control-label col-lg-13">G&eacute;nero <span class="required">*</span> </label>


                                                <div class="col-lg-10">
                                                    <select id="genero" name="genero" class="genero form-control">
                                                        
                                                        <option value="F" <?php if($dados->genero == "F") echo "selected";?>>Feminino</option>
                                                        <option value="M" <?php if($dados->genero == "M") echo "selected";?>>Masculino</option>

                                                    </select>
                                                </div>


                                            </div>
                                                   <?php $data=$dados->dataNasc;
                                         $data_temp = explode('-', $data);
                                         $nascimento = $data_temp[2] . '/' . $data_temp[1] . '/' . $data_temp[0];
                                         ?>

                                            <div class="form-group">                         
                                                <label for="data_nascimento" class="control-label col-lg-13">Data de Nascimento <span class="required">*</span> </label>
                                                <div class="col-lg-10">
                                                    <input id="data_nascimento" name="data_nascimento" value="<?php echo $nascimento;?>"type="text" class="dataNascimento form-control" placeholder="Dia/M&ecirc;s/Ano">
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <label for="email" class="control-label col-lg-13">Email <span class="required">*</span> </label>

                                                    <div class="col-lg-10">
                                                        <input id="email" name="email" type="text" value="<?php echo $dados->email;?>"class="email form-control" placeholder="Email" maxlength="40">
                                                        <span id="errado"> </span> <br>

                                                    </div>
                                                </div>
                                            
                                           
                                              <div class="form-group">
                                                <label for="email" class="control-label col-lg-2"> </span> </label>
                                              <input type="hidden" name="id" value="<?php echo $dados->idUser;?>"/>
                                                <div class="col-lg-10">
                                                     
                                                  

                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="form-group">
                                                <?php echo $securty->retornaToken();?>
                                                <label for="codigo" class="control-label col-lg-13"></label>
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button  type="submit" value="altadmin" class="btn btn-primary" name="opcao"><span class="glyphicon"></span> Actualizar</button>
                                                    <button class="btn btn-default" type="button">Cancelar</button>
                                                </div>
                                            </div>                 
                                    </form>
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
        <!--main content end-->
    </section>
    <!-- container section end -->

    <!-- javascripts -->

</body>
</html>                                

