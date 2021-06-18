<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Classement</title>

    <link rel="stylesheet" type="text/css" href="classement.css"/>
  </head>
  <body>
      <br><br>
      <p class = "titre"> Voici le classement des meilleurs joueurs :</p>
      <br><br><br>
        <?php
            function connectMaBase(){
                $serveur = 'localhost';
                $utilisateur = 'root';
                $motdepasse = '';
                $nom_base = 'S2';
            
                $mysqli = new mysqli($serveur, $utilisateur, $motdepasse, $nom_base);
                // Check connection
                if ($mysqli->connect_error) {
                    die("Connection failed: ".$mysqli->connect_error);
                }
                return $mysqli;
            } 
            $mysqli = connectMaBase();
            $select = "SELECT * FROM utilisateur ORDER BY score DESC";
            // Envoi de la requête
            $result = $mysqli->query($select) or die('Erreur SQL ! <br>'.$req.'<br>'.$mysqli->error);
  
            // Parcourir le tableau des enregistrements et affichage de chaque message
            while($ligne = $result->fetch_array(MYSQLI_BOTH)) {
                echo $ligne['pseudo'].": ";
                echo $ligne['score']."<br>";
                
          }
        ?>
</body>
</html>