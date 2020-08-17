<?php
/** 
 * Fonctions pour l'application GSB
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 */
 /**
 * Teste si un quelconque visiteur est connecté
 * @return vrai ou faux 
 */
function estConnecte(){
  return isset($_SESSION['idVisiteur']);
}
/**
 * Enregistre dans une variable session les infos d'un visiteur
 
 * @param $id 
 * @param $nom
 * @param $prenom
 */
function connecter($id,$nom,$prenom){
	$_SESSION['idVisiteur']= $id; 
	$_SESSION['nom']= $nom;
	$_SESSION['prenom']= $prenom;
}
/**
 * Détruit la session active
 */
function deconnecter(){
	session_destroy();
}
/**
 * Transforme une date au format français jj/mm/aaaa vers le format anglais aaaa-mm-jj
 
 * @param $madate au format  jj/mm/aaaa
 * @return la date au format anglais aaaa-mm-jj
*/
function dateFrancaisVersAnglais($maDate){
	@list($jour,$mois,$annee) = explode('/',$maDate);
	return date('Y-m-d',mktime(0,0,0,$mois,$jour,$annee));
}
/**
 * Transforme une date au format format anglais aaaa-mm-jj vers le format français jj/mm/aaaa 
 
 * @param $madate au format  aaaa-mm-jj
 * @return la date au format format français jj/mm/aaaa
*/
function dateAnglaisVersFrancais($maDate){
   @list($annee,$mois,$jour)=explode('-',$maDate);
   $date="$jour"."/".$mois."/".$annee;
   return $date;
}
/**
 * retourne le mois au format aaaamm selon le jour dans le mois
 
 * @param $date au format  jj/mm/aaaa
 * @return le mois au format aaaamm
*/
function getMois($date){
		@list($jour,$mois,$annee) = explode('/',$date);
		if(strlen($mois) == 1){
			$mois = "0".$mois;
		}
		return $annee.$mois;
}

/* gestion des erreurs*/
/**
 * Indique si une valeur est un entier positif ou nul
 
 * @param $valeur
 * @return vrai ou faux
*/
function estEntierPositif($valeur) {
	return preg_match("/[^0-9]/", $valeur) == 0;
	
}

/**
 * Indique si un tableau de valeurs est constitué d'entiers positifs ou nuls
 
 * @param $tabEntiers : le tableau
 * @return vrai ou faux
*/
function estTableauEntiers($tabEntiers) {
	$ok = true;
	foreach($tabEntiers as $unEntier){
		if(!estEntierPositif($unEntier)){
		 	$ok=false; 
		}
	}
	return $ok;
}
/**
 * Vérifie si une date est inférieure d'un an à la date actuelle
 
 * @param $dateTestee 
 * @return vrai ou faux
*/
function estDateDepassee($dateTestee){
	$dateActuelle=date("d/m/Y");
	@list($jour,$mois,$annee) = explode('/',$dateActuelle);
	$annee--;
	$AnPasse = $annee.$mois.$jour;
	@list($jourTeste,$moisTeste,$anneeTeste) = explode('/',$dateTestee);
	return ($anneeTeste.$moisTeste.$jourTeste < $AnPasse); 
}
/**
 * Vérifie la validité du format d'une date française jj/mm/aaaa 
 
 * @param $date 
 * @return vrai ou faux
*/
function estDateValide($date){
	$tabDate = explode('/',$date);
	$dateOK = true;
	if (count($tabDate) != 3) {
	    $dateOK = false;
    }
    else {
		if (!estTableauEntiers($tabDate)) {
			$dateOK = false;
		}
		else {
			if (!checkdate($tabDate[1], $tabDate[0], $tabDate[2])) {
				$dateOK = false;
			}
		}
    }
	return $dateOK;
}

/**
 * Vérifie que le tableau de frais ne contient que des valeurs numériques 
 
 * @param $lesFrais 
 * @return vrai ou faux
*/
function lesQteFraisValides($lesFrais){
	return estTableauEntiers($lesFrais);
}
/**
 * Vérifie la validité des trois arguments : la date, le libellé du frais et le 
 *  montant des messages d'erreurs sont ajoutés au tableau des erreurs
 
 * @param $dateFrais 
 * @param $libelle 
 * @param $montant
 * @param &tabErr 
 */
function valideInfosFrais($dateFrais,$libelle,$montant,&$tabErr){
	if($dateFrais==""){
		ajouterErreur("La date d'engagement doit être renseignée", $tabErr);
	}
	else{
		if(!estDatevalide($dateFrais)){
			ajouterErreur("La date d'engagement doit être au format JJ/MM/AAAA", $tabErr);
		}	
		else{
			if(estDateDepassee($dateFrais)){
				ajouterErreur("La date d'engagement du frais est dépassé de plus de 1 an", $tabErr);
			}			
		}
	}
	if($libelle == ""){
		ajouterErreur("Le libellé doit être renseigné", $tabErr);
	}
	if($montant == ""){
		ajouterErreur("Le montant doit être renseigné", $tabErr);
	}
	else
		if( !is_numeric($montant) ){
			ajouterErreur("Le montant doit être numérique positif", $tabErr);
		}
}
/** 
 * Retourne le nombre de données reçues par l'url                    
 * 
 * @return integer nombre de données reçues par l'url
 */ 
  function donnerNbDonneesUrl() {
    return count($_GET);
  }

/** 
 * Fournit la valeur d'une donnée transmise par la méthode get (url).                    
 * 
 * Retourne la valeur de la donnée portant le nom $nomDonnee reçue dans l'url, 
 * $valDefaut si aucune donnée de nom $nomDonnee dans l'url 
 * @param string nom de la donnée
 * @param string valeur par défaut 
 * @return string valeur de la donnée
 */ 
function lireDonneeUrl($nomDonnee, $valDefaut="") {
    if ( isset($_GET[$nomDonnee]) ) {
        $val = $_GET[$nomDonnee];
    }
    else {
        $val = $valDefaut;
    }
    return $val;
}

/** 
 * Retourne le nombre de données reçues par la méthode post              
 * (dans le corps de la requête http)      
 * @return integer nombre de données reçues
 */ 
  function donnerNbDonneesPost() {
    return count($_POST);
  }

/** 
 * Fournit la valeur d'une donnée transmise par la méthode post 
 *  (corps de la requête HTTP).                    
 * 
 * Retourne la valeur de la donnée portant le nom $nomDonnee reçue dans le corps de la requête http, 
 * $valDefaut si aucune donnée de nom $nomDonnee dans le corps de requête
 * @param string nom de la donnée
 * @param string valeur par défaut 
 * @return string valeur de la donnée
 */ 
function lireDonneePost($nomDonnee, $valDefaut="") {
    if ( isset($_POST[$nomDonnee]) ) {
        $val = $_POST[$nomDonnee];
    }
    else {
        $val = $valDefaut;
    }
    return $val;
}
/**
 * Ajoute le libellé d'une erreur au tableau des erreurs $tabErr

 * @param string $msg : le libellé de l'erreur 
 * @param array $tabErr tableau des messages d'erreur passé par référence
 */
function ajouterErreur($msg, &$tabErr){
   $tabErr[]=$msg;
}
/**
 * Retoune le nombre de lignes du tableau des erreurs $tabErr

 * @param string $msg : le libellé de l'erreur 
 * @return le nombre d'erreurs
 */
function nbErreurs($tabErr){
   return count($tabErr);
}
/**
 * Retourne les messages d'erreurs sous forme de liste à puces html

 * @param array $tabErr tableau des messages d'erreur
 * @return string texte html
 */
function toHtmlErreurs($tabErr){
    $res = "";
    if ( nbErreurs($tabErr) > 0 ) {
      $res = '<ul class="erreur">';
      foreach($tabErr as $erreur) {
          $res .= "<li>".$erreur."</li>";
      }
      $res .= "</ul>";
    }
    return $res;
}

?>