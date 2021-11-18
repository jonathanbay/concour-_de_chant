<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./style/form.css"> 

</head>

<body>
    <?php
        include('./template/header.php');
    ?>

    <div class="imageLogin">
        <img src="./media/microphone.jpg" alt="micro" class="bglogin"> 
    </div>
   
    <div class="conteneurFormulaire">
        <h2>inscription</h2>
    
        <form action="connexion.php" method="post" class="formulaire">
     
            <input type="text" name="nom" placeholder="Nom" required pattern="^[A-Za-z '-]+$" maxlength="20">

            <input type="text" name="prenom" placeholder="Prenom" required pattern="^[A-Za-z '-]+$" maxlength="20">

            <input type="text" name="email" placeholder="E-mail" required pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$">

            <input type="date" name="dateNaissance" placeholder="Date de naissance" required="required">

            <input type="password" name="password1" placeholder="Mot de passe" required="required">

            <input type="password" name="password2" placeholder="Confirmer mot de passe" required="required">

            <button class="button" type="submit">Valider</button>

        </form>
    </div>
    <?php
        include('./template/footer.php');
    ?>
    
</body>
</html>