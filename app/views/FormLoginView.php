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

    <title>Tela de Login</title>

    <!-- Bootstrap CSS -->    
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../public/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../public/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../public/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../public/css/style.css" rel="stylesheet">
    <link href="../public/css/style-responsive.css" rel="stylesheet" />
   <script src="../public/js/validar-form.js"></script>
</head>

  <body class="login-img3-body">
  
    <div class="container">
 <p> <i><?php echo Mensagem::getErro(); ?></i></p>
      <form class="login-form" action="/app_sie_unificado_2016/Utilizadore_/Login/" method="POST">        
        <div class="login-wrap">
           
            <p class="login-img"><i class="icon_lock_alt"></i> <strong><i> SIE</i> </strong></p>
            
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="email" class="form-control"  name="email" placeholder="Digita o seu email"  autofocus required>   
              
             
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" value=""name="senha"placeholder="digita a sua senha" required="">
            </div>
            <p>
            <label class="esconde checkbox">
                
                <?php echo $securty->retornaToken();
                
                // <?php echo ( isset($_SESSION['email']) ?  $_SESSION['email']: '' ); ?>
                
              
                
            </label>
           
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
             <span class="pull-right"> <a href="<?php echo META_URL;?>Rotas_/FormRecuperaSenha/"> Esqueceu a Password ? </a></span>
         <!--  <button class="btn btn-info btn-lg btn-block" FormRecuperaSenha type="submit">Signup</button>-->
        </div>
      </form>

    </div>

 
  </body>
</html>
