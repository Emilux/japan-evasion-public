<?php

$smarty->assign('page', 'contact');

if(isset($_POST['send_message'])){
    $name = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mailFrom = $_POST['emailcntc'];
    $message = $_POST['msgcntc'];

    
    $mailTo = 'mujeeb.mir8@gmail.com';
    $headers = 'From:'.$mailFrom;
    $txt = 'You have received an email from : '.$name .' \n'.'__'. $message;
  
    $error;


    /* CHECKING THE CONTACT FORM */
    if(empty($name) || empty($prenom) || empty($mailFrom) || empty($message)){
        $error = 'Erreur un champ est vide!';
        $smarty->assign(array('error'=>$error));
        
    }else{ 
        if(!filter_var($mailFrom, FILTER_VALIDATE_EMAIL)){
            $error = 'Entrez une adresse e-mail valide!';
            $smarty->assign(array('error'=>$error));
    } else{
        if (isset($_POST['cgu']) && $_POST['cgu'] === 'on'){

           //SEND MAIL
        mail($mailTo, $message, $txt, $headers); 
        header('Location: ./?mailSend');

    }
    else{
        $error = 'Acceptez les Terms pour envoyer un message.';
        $smarty->assign(array('error'=>$error));
      }
    }
  }
}
