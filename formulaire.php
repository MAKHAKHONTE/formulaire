   <!DOCTYPE html>
<html>
<head>
	<title>formulaire </title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="container">
<form method="POST" class="form">
	NOM:<input type="text" name="nom" class="box-input"> <br>
	PRENOM:<input type="text" name="prenom" class="box-input"><br>
	AGE:<input type="number" name="age" class="box-input"><br>
    <input type="submit" value="VALIDER" name="valid" class="box-button1">	
    <input type="submit" value="Afficher" name="affich" class="box-button">



</form>
<?php 
error_reporting(0);
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$age=$_POST['age'];
$valider=$_POST['valid'];
$afficher=$_POST['affich'];

$host='localhost';
$dbname='service';
$username='root';
$password='';
    
try{
  $connexion=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    echo "connexion avec succes";

}
catch(PDOException $e){
  die("impossible de se connecter à la base:" .$e->getMessage());
}

if (isset($valider)) {

//requette insertion 
$requette="INSERT INTO users(nom,prenom,age)VALUES('$nom','$prenom','$age')";
$execute=$connexion->query($requette);
	
}

if (isset($afficher)) {
	$requette="SELECT * FROM users";
$execute=$connexion->query($requette);
while ($donnees = $execute->fetch())

 {

       echo '<p>'.htmlspecialchars($donnees['nom']). ' ' . htmlspecialchars($donnees['prenom']).' '.htmlspecialchars($donnees['age']).'ans ' .'</p>';

}
}

 ?>
</div>
</body>
</html>