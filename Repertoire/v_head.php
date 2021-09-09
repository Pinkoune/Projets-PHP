<html>
    <head>
        <meta charset="UTF-8">
        <title>Repertoire</title>
    </head>
    <body>
        <h1><center>Mes contacts</center></h1>
        <h2>Nombre de contacts : 
        <?php
            $nbContact;
            echo $nbContact;
        ?></h2>
        <?php 
            //Affichage des contacts 
            $t_contacts;
            foreach ($t_contacts AS $contact) { 
                echo '<p>'.$contact['Numero'].' - '.$contact['Nom']; 
            }
        ?>
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