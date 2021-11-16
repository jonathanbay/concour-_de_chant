<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';

try {
    $connexion = new PDO("mysql:host=$servername;dbname=concoursChant", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

} catch (PDOException $e) {

echo "Erreur : " . $e->getMessage();}


$prenom =htmlspecialchars( $_POST["prenom"]);
$nom =htmlspecialchars($_POST["nom"]) ;
$dateNaissance = $_POST["dateNaissance"];
$mdp = $_POST["password1"];
$email = $_POST["email"];
$mdpverif = $_POST["password2"];

if ($mdp === $mdpverif) {
    $mdphash = password_hash('$mdp', PASSWORD_DEFAULT);
    echo "Bonjour $prenom $nom, né le $dateNaissance, ton mot de passe est $mdphash, ton e-mail c'est $email!";

    $envoi= "INSERT INTO `users` (`nom`, `prenom`, `dateNaissance`, `email`, `password`) VALUES ('$nom', '$prenom', '$dateNaissance', '$email', '$mdphash')";

    $requete = $connexion->prepare($envoi);
    $requete->execute();

    echo "Utilisateur ajouté.";
} else {
    header("location:".$_SERVER['HTTP_REFERER']);
}

?>