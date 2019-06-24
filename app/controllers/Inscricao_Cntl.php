<?php


class Inscricao_ {


     /**
      * controller que vai receber os dados para convidar um usario para um dado evento
      */
     public function convidado(){

      $securty = new SegurancaDao();
      $convida= new InscricaoDao;
      $securty->verficarToken($_POST['sie_sofil']);

         $nome = $securty->validarCaracter($_POST['nome']);
         $email = $securty->validarCaracter($_POST['email']);
         $id =(isset($_POST['id'])? $_POST['id']: NULL);

         if(!$securty->ValidarEmail($email)):
             echo "	<script type=\"text/javascript\">
			alert ('o email nao é valido');history.back();
			</script>
			";
           endif;

           if($nome==NULL || $nome=='' || strlen($nome)<4):
                echo "	<script type=\"text/javascript\">
			alert ('o Nome nao é valido');history.back();
			</script>
			";

           endif;

          /**  chamada da função que vai convidar e que esta ser chamada dentro de uma condição    */
          if($convida->selecionarConvidado($nome, $email, $id)):
              Mensagem::getSucesso('convite enviado com sucesso');
               Rederizar::redirecionar();

          endif;


     }


     /**
     * metodo que vai receber os dados pra realizar a inscrição
     */
    public function validarDados(){

        //date_default_timezone_set();

            $isncri = new Inscricao;
            $daoin = new InscricaoDao;
            $system= new System; // chanciamento da classe system que responsavel pela url .. é onde recebemos os dados e onde esta defindo o arrqui do projecto
            $securty = new SegurancaDao(); // estanciamento da classe
             $codig=$_SESSION['codigo'];
          $chave2 = $securty->criptografarUrl('idEvento'.$_SESSION['codigo']); // chamada do metodo que criptografa a url , onde estamo a criprografar
         
          $cancela=$securty->criptografarUrl('cancelar'.$codig);

             $isncri->setId_Evento($system->get_dados());
             $isncri->getIdInscricao($system->get_dados());

             $isncri->setDataInscricao(date('Y-m-d'));

             $isncri->setHora(date('H:i:s'));




             //onde vai ser verfidado se pode ser feito a inscrição
            if($system->get_chave() == $chave2 ):
                   unset( $_SESSION['codigo']);

                if( $daoin->fazerIncricao($isncri)):
                    $securty->geraCodigo();
                    Mensagem::setSucesso('Inscrição realizada com sucesso');
                    Rederizar::redirecionar();
                    // echo "inscrição com sucessso".$chave;

                endif;
               endif;

               // pra cancelar inscrição
             if ($system->get_chave() == $cancela && $system->get_dados()!=0):
                 unset( $_SESSION['codigo']);

                 if($daoin->cancelarIncricao($isncri)):

                     $securty->geraCodigo(); //
                     Mensagem::setSucesso('Cancelado a Inscrição com sucesso');
                     Rederizar::redirecionar();

                    endif;

                   else:
                        $securty->geraCodigo();
                    Mensagem::setSucesso('Acesso Negado.. ñao foi possive realizar '.$system->get_chave().'<br>'.$chave2);
                    Rederizar::redirecionar();

               endif;

             }





}
