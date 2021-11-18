
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
</head>
<body>
    <form action="/action_page.php">
       <label for="monfichier">Envoyer votre bande son:</label>
       <input type="file" id="monfichier" name="monfichier"><br><br>
       <input type="submit">
       
    </form>
<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    
    try {
        $connexion = new PDO("mysql:host=$servername;dbname=concoursChant", $username, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "connexion ok";
    
    } catch (PDOException $e) {
    
        echo "Erreur : " . $e->getMessage();
    };
    
?>
   
</body>
</html>


