<?php 
require_once "back/connect.php";
$sql = "
	SELECT `pseudo` 
	FROM `profils`
	WHERE `pseudo` = :pseudo";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":pseudo", $_POST['pseudo']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($_POST['pseudo'] == $row['pseudo']) {
	$mess = 'ce pseudo existe déjà';
} else {
	session_start();
	$sql = "
		INSERT INTO `profils`(`mdp`, `nom`,`prenom`,`age`,`profession`, `pseudo`) 
		VALUES (:mdp, :nom, :prenom, :age, :profession, :pseudo)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(":pseudo", htmlentities($_POST['pseudo']));
	$stmt->bindValue(":nom", htmlentities($_POST['nom']));
	$stmt->bindValue(":prenom", htmlentities($_POST['prenom']));
	$stmt->bindValue(":age", htmlentities($_POST['age']));
	$stmt->bindValue(":profession", htmlentities($_POST['profession']));
	$stmt->bindValue(":mdp", htmlentities($_POST['mdp']));
	$stmt->execute();
	$id = $pdo->lastInsertId();
	$sql = "
		SELECT `id` 
		FROM profils 
		WHERE `id`=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(":id", $id);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	$_SESSION['pseudo'] = $_POST['pseudo'];
	$_SESSION['id'] = $data['id'];
	header('location:./profil.php');
}
