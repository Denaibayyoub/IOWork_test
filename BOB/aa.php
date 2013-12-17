<style type="text/css">
<!--
.Style4 {	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 24px;
}
-->
</style>
<table width="1007" height="157" border="1" bgcolor="#9900FF">
  <tr>
    <th width="160" height="69" scope="col">&nbsp;</th>
    <th width="831" scope="col"><span class="Style4">Etudiants</span></th>
  </tr>
  <tr>
    <th height="39" scope="row"><p><a href="index.html">Insertion</a></p>
        <p><a href="recherche.html">Recherche</a></p>
      <p><a href="aficher.php">Affichage</a></p>
      <p><a href="stat.php">Statistiques</a></p></th>
    <td bgcolor="#CCCCCC">
        <p>
          <?php
try
{
// On se connecte à MySQL
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=mysql11.000webhost.com;dbname=a8907690_krm16', 'a8907690_krm16', 'toshiba4010',
$pdo_options);
// On récupère tout le contenu de la table jeux_video
$reponse = $bdd ->prepare('SELECT * FROM etudiant WHERE age = ?');
$reponse ->execute(array($_POST['age']));
// On affiche chaque entrée une à une
?>
        </p>
        
		<table width="813" height="99" border="1">
          <tr>
            <th width="189" height="50" scope="col">Nom</th>
            <th width="187" scope="col">Prenom</th>
            <th width="119" scope="col">Age</th>
            <th width="164" scope="col">Ville</th>
            <th width="120" scope="col">Sexe</th>
          </tr>
          
			<?php
while ($donnees = $reponse->fetch())
{
?><tr>
            
			<td height="41"> <?php echo $donnees['nom']; ?><br /></td>
            <td><?php echo $donnees['prenom']; ?><br /></td>
            <td><?php echo $donnees['age']; ?><br /></td>
            <td><?php echo $donnees['ville']; ?><br /></td>
            <td><?php echo $donnees['sex']; } ?><br /></td>
          </tr>
      </table>
		<p>&nbsp;</p>
		<?php

$reponse->closeCursor(); // Termine le traitement de la requête
}
catch(Exception $e)
{
// En cas d'erreur précédemment, on affiche un message et on arrête tout

die('Erreur : '.$e->getMessage());
}
?>
    <p>    </td>
  </tr>
  
</table>
<p><br />
<br />
<br />
<br />
<br />

<br />
</p>
