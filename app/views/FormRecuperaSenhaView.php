<!DOCTYPE html>

<html lang="en">
   <?php 
  $securty = new SegurancaDao;
  $securty->criarToken(); 
  
  ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <link rel="shortcut icon" href="img/favicon.png">

    <title>Recupera password </title>

    <!-- Bootstrap CSS -->    
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../../public/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../../public/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../../public/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../../public/css/style.css" rel="stylesheet">
    <link href="../../public/css/style-responsive.css" rel="stylesheet" />

</head>

  <body class="login-img3-body">
  
    <div class="container">
 <p> <i><?php echo Mensagem::getErro(); ?></i></p>
      <form class="login-form" action="#" method="POST">        
        <div class="login-wrap">
           
            <p class="login-img"><i class=""></i>Recupera a senha </p>
            
            <div class="input-group">
              <span class="input-group-addon"><i class=""></i></span>
              <input type="email" class="form-control" name="email" placeholder="Digita o seu email" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class=""></i></span>
                <input type="text" class="form-control" name="telefone"placeholder="telefone" required>
            </div>
              <div class="input-group">
                <span class="input-group-addon"><i class=""></i></span>
                                      <input id="data_nascimento" name="data_nascimento" type="text" class="dateITA form-control" aria-describedby="inputSuccess2Status" placeholder="Data de Nascimento Dia/Mês/Ano">
                                           <span class="help-block"></span>
                                    </div>
                               </div>
            <p>
            <label class="esconde checkbox">
                
                <?php echo $securty->retornaToken();?>
                
            </label>
           
            <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
             
         <!--  <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>-->
        </div>
      </form>

    </div>

 
  </body>
</html>
