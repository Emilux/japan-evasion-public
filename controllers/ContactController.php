<?php

$smarty->assign('page', 'contact');

if(isset($_POST['send_message'])){
    $name = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mailFrom = $_POST['emailcntc'];
    $message = $_POST['msgcntc'];

    $mailTo = 'mujeeb.mir8@gmail.com';
    $headers = 'From:'.$mailFrom;
    $txt = 'You have received an email from'.$name.'.\n\n'.$message;

    //verify if cgu checkbox is checked
    if (isset($_POST['cgu']) && $_POST['cgu'] === 'on'){
        echo 'coché';

        //send email
        mail($mailTo, $message, $txt, $headers);

        header('Location: ./?mailSend');
    } else {

        //error
        echo 'pas coché';
    }


}
