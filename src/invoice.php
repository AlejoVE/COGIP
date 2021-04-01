<?php
// mettre les titres au dessus des colonnes
// aligner les tirets qui séparent les valeurs
// Ajouter header

require_once 'includes/header.php';

try {
    $db = new PDO("mysql:host=remotemysql.com;dbname=nJpHWU5rJ5;port=3306", "nJpHWU5rJ5", "VnjcIEPzgV");
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $db->query("SELECT * FROM invoices JOIN companies ON company_id = id_comp JOIN type_of_company ON id_type = typeId ");

echo '<strong><hr>' . 'Last invoices: '  . '<br>';

while ($donnees = $results->fetch())
{
    $date= $donnees['invoice_date'];
    $strY=substr($date,0,4);
    $strM= substr($date,5,-3);
    $strD=substr($date, 8,9);
    
    echo "F".$strY.$strM.$strD."-".$donnees['invoice_id']." | ".$strD."/".$strM."/".$strY." | ".$donnees['name']." | ".$donnees['type'].'<br>';
}
$results->closeCursor();

