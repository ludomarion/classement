<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Classement</title>

    <link rel="stylesheet" type="text/css" href="classement.css"/>
  </head>
  <body>
      <br><br>
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
            echo "<h2>Voici le classement des meilleurs joueurs :</h2><br>

                    <table align='center'>

                        <tr>

							<th> Pseudo </th>

                            <th> Score </th>

                        <tr>";



                        while($data = $result->fetch_array(MYSQLI_BOTH)) {

                    echo '<tr>

							 <td>'.$data['pseudo'].'</td>',


							'<td>'.$data['score'].'<br>',

                         '</tr>';

                }

                echo '</table>';
                ?>
</body>
</html>
