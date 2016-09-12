<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Mailer.php';

    if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['msg'])){

        $contact = array(
            'name' => $_POST['name'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'msg' => $_POST['msg']
        );

        $mailer = new Mailer();
        $mailer->setFrom($contact['email'], $contact['name'] . ' ' . $contact['lastname']);
        $mailer->setAddress('portal.comunicaciones.noreply@gmail.com', 'Portal de Comuncaciones');
        $mailer->setSubject('Contacto desde la página');

        ob_start();
        include_once $_SERVER["DOCUMENT_ROOT"].'/views/contact.mail.template.php';
        $mailer->setBody(ob_get_contents());
        ob_end_clean();

        if ($mailer->sendEmail()){
            header('Location: /contact?success=true');
            die();
        } else {
            echo 'Hubo un error al enviar el mail';
        };
    }



 ?>
