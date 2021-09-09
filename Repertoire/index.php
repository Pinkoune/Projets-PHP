<?php
    require ('fonction.php');
    $nbContact = getNbContact();
    $t_contacts = getContacts();
    $ui = insertContact($_POST);
    require ('v_head.php');
?>