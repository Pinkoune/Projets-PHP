<?php
    function connexion(){
        $bdd = new PDO('mysql:host=localhost;dbname=repertoire','root', '');
        return $bdd;
    }

    function selectNom(){
        $bdd = connexion();
        $nom = $_POST['Nom'];
        $select = $bdd->query('SELECT COUNT(Nom) AS contact FROM contacts WHERE Nom = "'.$nom.'";');
        $nb = $select->fetch();
        return $nb;
    }

    function insertContact($contact){
        $bdd = connexion();
        $requete = "INSERT INTO contacts (Numero, Nom, Prenom, Email, Commentaire) VALUES('".$contact['Numero']."','".$contact['Nom']."','".$contact['Prenom']."','".$contact['Email']."','".$contact['Commentaire']."')";
        $resultat = $bdd->query($requete);
        return $resultat;
    }

    function getContacts() { 
        //récupération connexion bdd 
        $bdd = connexion(); 
        //exécution de la requete 
         $req = $bdd->query("SELECT * FROM contacts"); 
        //création d'un tableau 
         $result = array(); 
        //remplissage du tableau résultat retourné 
         while ($comment = $req->fetch()) { 
         $result[] = $comment; 
         } 
         return $result; 
         } 
        

    function getNbContact(){
        $bdd = connexion();
        $req = $bdd->query("SELECT COUNT(*) as nb FROM contacts;");
        $nbContact = $req->fetch();
        return $nbContact['nb'];
    }
?>