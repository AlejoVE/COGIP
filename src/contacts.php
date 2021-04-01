<?php
require_once 'includes/header.php';

// aligner les colonnes
// Ajouter header
try {
    $db = new PDO("mysql:host=remotemysql.com;dbname=nJpHWU5rJ5;port=3306", "nJpHWU5rJ5", "VnjcIEPzgV");
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $db->query("SELECT * FROM people JOIN companies ON company_id = id_comp ");

echo '<strong><hr>' . 'COGIP : contacts diretory  '  . '<br>';
echo '<br>';

while ($donnees = $results->fetch())
{
    echo '<li><a href="product.php?code='. $donnees['person_id'].'" >'. $donnees['first_name']." 
    ".$donnees['last_name']." | ".$donnees['phone']." | ".$donnees['email']." | ".$donnees['name'].'</a></li>'.'<br>';

    
}
$results->closeCursor();

// $products = $results->fetchAll(PDO::FETCH_ASSOC);
// foreach ($products as $key => $product) {
//     //var_dump($product['productCode']);
//     echo '<li><a href="product.php?code='. $product['person_id'].'" >'.$product['first_name']." ".$product['last_name'].'</a></li>';
// }