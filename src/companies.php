<?php
require_once 'includes/header.php';
require_once 'Model/CompaniesManager.php';


$new_object_companies = new CompaniesManager();
$suppliers = $new_object_companies->getCompanies(1);
$clients = $new_object_companies->getCompanies(2);

echo '<strong><hr>' . 'Companies Directory : '  . '<br>';
// $results = $db->query("SELECT * FROM companies JOIN type_of_company ON id_type = typeId WHERE id_type=1 ");
echo '<strong><hr>' . 'Suppliers : '  . '<br>';
echo '<br>';
// while ($donnees = $results->fetch()) {
//     echo '<a href="companiesDetail.php?code=' . $donnees['id_comp'] . '" >' . $donnees['name'] . '</a>' . " | "
//         . $donnees['number_vta'] . " | " . $donnees['country'] . " | " . $donnees['type'] . '<br>';
// }
// $results->closeCursor();

// $results = $db->query("SELECT * FROM companies JOIN type_of_company ON id_type = typeId WHERE id_type=2 ");
// echo '<strong><hr>' . 'Client : '  . '<br>';
// echo '<br>';
// while ($donnees = $results->fetch()) {
//     echo '<a href="companiesDetail.php?code=' . $donnees['id_comp'] . '" >' . $donnees['name'] . '</a>' . " | "
//         . $donnees['number_vta'] . " | " . $donnees['country'] . " | " . $donnees['type'] . '<br>';
// }
// $results->closeCursor(); 
