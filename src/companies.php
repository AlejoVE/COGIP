<?php

try {
    $db = new PDO("mysql:host=remotemysql.com;dbname=nJpHWU5rJ5;port=3306", "nJpHWU5rJ5", "VnjcIEPzgV");
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

echo '<strong><hr>' . 'Companies Directory : '  . '<br>';
$results = $db->query("SELECT * FROM companies JOIN type_of_company ON id_type = typeId WHERE id_type=1 ");
echo '<strong><hr>' . 'Suppliers : '  . '<br>';
echo '<br>';
while ($donnees = $results->fetch())
{
    echo $donnees['name']." | ".$donnees['number_vta']." | ".$donnees['country']." | ".$donnees['type'].'<br>';
}
$results->closeCursor();

$results = $db->query("SELECT * FROM companies JOIN type_of_company ON id_type = typeId WHERE id_type=2 ");
echo '<strong><hr>' . 'Client : '  . '<br>';
echo '<br>';
while ($donnees = $results->fetch())
{
    echo $donnees['name']." | ".$donnees['number_vta']." | ".$donnees['country']." | ".$donnees['type'].'<br>';
}
$results->closeCursor();