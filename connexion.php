
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./syle/form.css">
</head>
<body>

<?php
    include ('./template/header.php');
?>
<div class="imageLogin">
    <img src="./media/microphone.jpg" alt="micro" class="bglogin"> 
</div>

<div class="conteneurFormulaire">
    <h2>Connexion</h2>
    
    <form action="tableauBord.php" method="post" class="formulaire">
     
    <input type="password" name="password1" placeholder="Mot de passe" required="required">

    <input type="password" name="password2" placeholder="Confirmer mot de passe" required="required">

    <input type="text" name="email" placeholder="E-mail" required pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$">

    <button class="button" type="submit">Valider</button>

    </form>
</div>
<?php
    include ('./template/footer.php');
?>

<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';

try {
    $connexion = new PDO("mysql:host=$servername;dbname=concoursChant", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    echo "Erreur : " . $e->getMessage();
}

function securisation($donnees){
    $donnees = trim($donnees);            // eviter les espaces
    $donnees = stripslashes($donnees);    //permet de ne pas traiter les balises
    $donnees = strip_tags($donnees);      //permet de ne pas traiter les anti-slashes
    return $donnees;
}

$prenom =securisation($_POST["prenom"]);
$nom = securisation($_POST["nom"]);
$dateNaissance = securisation( $_POST["dateNaissance"]);
$mdp = securisation($_POST["password1"]);
$email = securisation($_POST["email"]);
$mdpverif = securisation( $_POST["password2"]);

if ($mdp === $mdpverif) {
    $mdphash = password_hash('$mdp', PASSWORD_DEFAULT);

    include 'texte.php'; 

    $envoi= "INSERT INTO `users` (`nom`, `prenom`, `dateNaissance`, `email`, `password`) VALUES ('$nom', '$prenom', '$dateNaissance', '$email', '$mdphash')";


    $requete = $connexion->prepare($envoi);
    $requete->execute();


} else {
    header("location:".$_SERVER['HTTP_REFERER']);
}

?>

</body>
</html>

