
<html lang="pt">
    <head>
        
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

        <title>Registar Docente.</title>


        

    </head>

    <body class="home page no_js responsive stretched">

        <?php
          $titulo="Admin";
           include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
            // $securty->criarToken();
           include "barra_lateral_admin.php";
            
        ?>
        
        <!-- container section start -->
        <section id="container" class="">
           
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Formul&aacute;rio de Registo de Admin
                                </header>
                                <div class="panel-body">
                                    <div class="form">

                                        <form role="form" class=" cmxform form-horizontal" id="form" method="POST" action="<?php echo META_URL;?>Utilizadore_/validarDados/"enctype="multipart/form-data" >

                                            <div class="form-group">

                                                <p>&nbsp;</p> 
                                               <div class="form-group col-lg-10">

                                                    <div class="col-lg-10">

                                                       

                                                    </div>
                                                    <div class="col-lg-6">
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
                                                        <input id="telefone" name="telefone" type="tel" class="telefone form-control"tabindex="10">

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
                                                     <?php  echo $securty-> retornaToken(); ?>
                                                    <label for="codigo" class="control-label col-lg-13"></label>
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button  type="submit" value="08120203" class="btn btn-primary" name="opcao"><span class="glyphicon"></span> Registar</button>
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
                <script src="/../public/js/bootstrap-editable.min.js"></script>
                <script src="/../public/js/ace-editable.min.js"></script>
		<script src="/../public/js/jquery.gritter.min.js"></script>
		<script src="/../public/js/ace-elements.min.js"></script>
		<script src="/../public/js/ace.min.js"></script> -->           
               
        
            </section>
            <!--main content end-->
        </section>
        
 <script type="text/javascript">
			jQuery(function($) {
			
				//editables on first profile page
				$.fn.editable.defaults.mode = 'inline';
				$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
				
				
				// *** editable avatar *** //
				try {//ie8 throws some harmless exceptions, so let's catch'em
			
					//first let's add a fake appendChild method for Image element for browsers that have a problem with this
					//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
					try {
						document.createElement('IMG').appendChild(document.createElement('B'));
					} catch(e) {
						Image.prototype.appendChild = function(el){}
					}
			
					var last_gritter
					$('#foto').editable({
						type: 'image',
						name: 'foto',
						value: null,
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Altera Imagem',
							droppable: true,
							maxSize: 110000,//~100Kb
			
							//and a few extra ones here
							name: 'foto',//put the field name here as well, will be used inside the custom plugin
							on_error : function(error_type) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(error_type == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'Este ficheiro não é uma imagem!',
										text: 'Por favor procure ficheiro no formato jpg|gif|png!',
										class_name: 'gritter-error gritter-center'
									});
								} else if(error_type == 2) {//file size rror
									last_gritter = $.gritter.add({
										title: 'Ficheiro Grande demais!',
										text: 'O tamanho da imagem nao pode exceder 100Kb!',
										class_name: 'gritter-error gritter-center'
									});
								}
								else {//other error
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
							// ***UPDATE AVATAR HERE*** //
							//for a working upload example you can replace the contents of this function with 
							//examples/profile-avatar-update.js
			               
							var deferred = new $.Deferred
			
							var value = $('#foto').next().find('input[type=hidden]:eq(0)').val();
							
							if(!value || value.length == 0) {
								deferred.resolve();
								return deferred.promise();
							}
			
			
							//dummy upload
							setTimeout(function(){
								if("FileReader" in window) {
									//for browsers that have a thumbnail of selected image
									var thumb = $('#foto').next().find('img').data('thumb');
									if(thumb) $('#foto').get(0).src = thumb;
									//alert($('#avatar').get(0).src);
								}
								
								deferred.resolve({'status':'OK'});
			
								if(last_gritter) $.gritter.remove(last_gritter);
								last_gritter = $.gritter.add({
									title: 'Foto Alterada!',
									text: 'Uploading to server can be easily implemented. A working example is included with the template.',
									class_name: 'gritter-info gritter-center'
								});
								
							 } , parseInt(Math.random() * 800 + 800))
			
							return deferred.promise();
							
							// ***END OF UPDATE AVATAR HERE*** //
						},
						
						success: function(response, newValue) {
						}
					})
				}catch(e) {}
				
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					try {
						$('.editable').editable('destroy');
					} catch(e) {}
					$('[class*=select2]').remove();
				});
			});
		</script>
    </body>
</html>                                

