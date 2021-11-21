
<?php
$cookie_name = "user";
$cookie_value = "root";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>



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
  if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
  }
?>
    <?php
        include('./template/header.php');
    ?>

    <div class="imageLogin">
        <img src="./media/microphone.jpg" alt="micro" class="bglogin"> 
    </div>
 
    <?php
        include './template/formIns.php';
        include('./template/footer.php');
    ?>

</body>
</html>