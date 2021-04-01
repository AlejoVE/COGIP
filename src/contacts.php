<?php
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

echo '<strong><hr>' . 'Last contacts : '  . '<br>';
echo '<br>';

while ($donnees = $results->fetch())
{
    echo $donnees['first_name']." ".$donnees['last_name']." | ".$donnees['phone']." | ".$donnees['email']." | ".$donnees['name'].'<br>';
}
$results->closeCursor();