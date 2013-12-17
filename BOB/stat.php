<style type="text/css">
<!--
.Style4 {	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 24px;
}
-->
</style>
<table width="1007" height="117" border="1" bgcolor="#33CCCC">
  <tr>
    <th width="160" height="69" scope="col">&nbsp;</th>
    <th width="831" scope="col"><span class="Style4">Etudiants</span></th>
  </tr>
  <tr>
    <th height="39" scope="row"><p><a href="index.html">Insertion</a></p>
        <p><a href="recherche.html">Recherche</a></p>
      <p><a href="aficher.php">Affichage</a></p>
      <p><a href="stat.php">Statistiques</a></p>
      <p>&nbsp;</p></th>
    <td bgcolor="#CCFFFF"><p>
      <?php
try
{
// On se connecte &agrave; MySQL
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=a8907690_krm16', 'root', '',
$pdo_options);// On r&eacute;cup&egrave;re tout le contenu de la table jeux_video
$reponse = $bdd ->query('SELECT COUNT(*) AS nb FROM etudiant');
$donnees = $reponse->fetch();
$nb = $donnees['nb'];

$reponse = $bdd ->query('SELECT COUNT(*) AS nho FROM etudiant WHERE Hebergement = "oui"');
$donnees = $reponse->fetch();
$nho = $donnees['nho'];
$pho= ($nho*100)/$nb ;



// On affiche chaque entr&eacute;e une &agrave; une
?>
    </p>
      <p><strong>Hebergement</strong> :</p>
      <p> <u>oui</u> : <?php echo $pho

?> % </p>
      <p><u>non</u> :
        <?php
echo 100-$pho;
?>
      %</p>
	  
	  <?php 
	  $reponse = $bdd ->query('SELECT COUNT(*) AS nsm FROM etudiant WHERE sex = "m"');
$donnees = $reponse->fetch();
$nsm = $donnees['nsm'];
$psm= ($nsm*100)/$nb ;
?>
      <p><strong>Sexe</strong> :</p>
      <p>   
        <label for="f"><u>Feminin</u></label>
        : <?php echo 100-$psm;
?> %      </p>
      <p>&nbsp;<u>Masculin</u> : <?php echo $psm ;
?>% </p>
<?php 
	  $reponse = $bdd ->query('SELECT COUNT(*) AS nfd FROM etudiant WHERE Formation = "Diplomante"');
$donnees = $reponse->fetch();
$nfd = $donnees['nfd'];
$pfd= ($nfd*100)/$nb ;


	  $reponse = $bdd ->query('SELECT COUNT(*) AS nfq FROM etudiant WHERE Formation = "Qualifiante"');
$donnees = $reponse->fetch();
$nfq = $donnees['nfq'];
$pfq= ($nfq*100)/$nb ;
?>

      <p><strong>Formation</strong> :</p>
      <p> <u>Diplomante </u>: <?php echo $pfd;
?>%    </p>
      <p><u>Qualifiante </u>: <?php echo $pfq;
?>%    </p>
      <p><u>Langue</u>: <?php echo 100-($pfd+$pfq);
?>% </p>
      <p>
     
    </p></td>
  </tr>
</table>
<?php

$reponse->closeCursor(); // Termine le traitement de la requête
}
catch(Exception $e)
{
// En cas d'erreur précédemment, on affiche un message et on arrête tout

die('Erreur : '.$e->getMessage());
}
?>