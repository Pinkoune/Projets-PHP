<html>
    <head>
        <meta charset="UTF-8">
        <title>Repertoire</title>
    </head>
    <body>
        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=repertoire','root', '');
            $rep = "";
            if($bdd){
                if(!empty($_POST['Numero']) && !empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['Email']) && !empty($_POST['Commentaire'])){
                    $numero = $_POST['Numero'];
                    $nom = $_POST['Nom'];
                    $prenom = $_POST['Prenom'];
                    $email = $_POST['Email'];
                    $commentaire = $_POST['Commentaire'];
                    $select = $bdd->query('SELECT COUNT(Nom) AS contact FROM contacts WHERE Nom = "'.$nom.'";');
                    $nb = $select->fetch();
                    if($nb ['contact'] == 1){
                        $rep = "Identifiant déjà utilisé.";
                    }
                    else{
                        $requete = "INSERT INTO contacts (Numero, Nom, Prenom, Email, Commentaire) VALUES ('$numero','$nom','$prenom','$email','$commentaire');";
                        $resultat = $bdd->query($requete);
                        if($resultat){
                            echo "Contact ajouté";
                        }
                        else{
                            echo "Dommage";
                        }
                    }
                }
            }
            else{
                echo "Non connecté";
            }
            $sql = 'SELECT * FROM contacts';
            $requete = $bdd->query($sql);
        ?>
        <h1><center>Mes contacts</center></h1>
        <h2>Nombre de contacts : 
        <?php 
            $nbNom = $bdd->query ('SELECT COUNT(nom) as nbNom FROM contacts'); 
            $nbligne = $nbNom->fetch();
            echo $nbligne['nbNom'];
        ?></h2>
        <table border="1">
        <tr>
            <th>Numéro</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Commentaire</th>
        </tr>
        <tr>
            <?php while($row = $requete->fetch()) { ?>
            <td><?php echo $row['Numero']; ?></td>
            <td><?php echo $row['Nom']; ?></td>
            <td><?php echo $row['Prenom']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Commentaire']; ?></td>
        </tr>
        <?php
            }
        ?>
        </table>
        <br><br><br>
        <form method="post">
            <label>Nom : </label><input type="text" name="Nom"><br><br>
            <label>Prenom : </label><input type="text" name="Prenom"><br><br>
            <label>Email : </label><input type="text" name="Email"><br><br>
            <label>Numéro : </label><input type="text" name="Numero"><br><br>
            <label>Commentaire : </label><input type="text" name="Commentaire"><br><br>
            <input type="submit" value="Valider">
        </form>
    </body>
</html>