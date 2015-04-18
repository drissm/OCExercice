<?php
/**
 * 
 * function.date.php regroupe toutes les fonctions relatives aux dates
 * 
 * @package GestionPlanning
 * @author  Driss MANET <drisss.manet@free.fr>
 * @version 1.2 - function.date.php du 23/10/2013
 */

function getSecond($valeur) {
	return substr($valeur, 17, 2);
}
function getMinute($valeur) {
	return substr($valeur, 14, 2);
}
function getHour($valeur) {
	return substr($valeur, 11, 2);
}
function getDay($valeur) {
	return substr($valeur, 8, 2);
}
function getMonth($valeur) {
	return substr($valeur, 5, 2);
}
function getYear($valeur) {
	return substr($valeur, 0, 4);
}
// Transforme le numéro du mois en texte
function monthNumToName($mois) {
	$tableau = Array("", "Janvier", "F&eacute;vrier", "Mars", "Avril",
		"Mai", "Juin", "Juillet", "A&ocirc;ut", "Septembre", "Octobre",
		"Novembre", "D&eacute;cembre");
	return (intval($mois) > 0 && intval($mois) < 13) ? $tableau[intval($mois)] : "Ind&eacute;fini";
}
// Transforme le numéro du jour en texte
function dayToName($day) {
    $tableau = Array("", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
    return (intval($day) > 0 && intval($day) < 8) ? $tableau[intval($day)] : "Ind&eacute;fini";
}
// Renvoie le timestamp d'une date au format (YYYY-MM-DD)
function timestamp($date){
    return mktime(12,0,0,getMonth($date),getDay($date),getYear($date));
}
// Formate une date/heure dans un format lisible (ex: 14 Janvier 2012 à 10h55)
function formatdatefr($date){
	if($date != ""){
		return getDay($date)." ".  monthNumToName(getMonth($date))." ".
				getYear($date,0,4)." &agrave; ".getHour($date)."h".getMinute($date,14,2);
	}else{
		return "jamais modifi&eacute;";
	}
}
// Formate une date dans un format lisible (ex: 14 Janvier 2012)
function datefr($date){ // Pour les dates YYYY-MM-DD
	if(!empty($date)){
		return substr($date,-2,2)." ".monthNumToName(substr($date,-5,2))." ".substr($date,0,4);
	}else{
		return "";
	}
}
// Fonction pour verifier un champ passer dans un formulaire
// La date doit etre au format YYYY-MM-DD caractres numerique uniquement
function validerdate($date){
	return preg_match("#^[0-9]{4}-[0-9]{2}-[0-9]{2}$#", $date) ? $date : false;
}