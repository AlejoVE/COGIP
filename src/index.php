<?php

$name=" ";
echo 'Bonjour'.$name.'!';

try {
    $db = new PDO("mysql:host=remotemysql.com;dbname=nJpHWU5rJ5;port=3306", "nJpHWU5rJ5", "VnjcIEPzgV");
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $db->query("SELECT * FROM invoices JOIN companies ON company_id = id_comp ORDER BY id_comp DESC LIMIT 0,5 ");
echo '<strong><hr>' . 'Last invoices: '  . '<br>';
echo '<br>';
while ($donnees = $results->fetch())
{
    $date= $donnees['invoice_date'];
    $strY=substr($date,0,4);
    $strM= substr($date,5,-3);
    $strD=substr($date, 8,9);
    
    echo "F".$strY.$strM.$strD."-".$donnees['invoice_id']." | ".$strD."/".$strM."/".$strY." | ".$donnees['name'].'<br>';
}
$results->closeCursor();

echo '<br>';

$results = $db->query("SELECT * FROM people JOIN companies ON company_id = id_comp ORDER BY id_comp DESC  LIMIT 0,5 ");
echo '<strong><hr>' . 'Last contacts : '  . '<br>';
echo '<br>';
while ($donnees = $results->fetch())
{
    echo $donnees['first_name']." ".$donnees['last_name']." | ".$donnees['phone']." | ".$donnees['email']." | ".$donnees['name'].'<br>';
}
$results->closeCursor();

echo '<br>';

$results = $db->query("SELECT * FROM companies JOIN type_of_company ON id_type = typeId ORDER BY id_comp DESC LIMIT 0,5 ");
echo '<strong><hr>' . 'Last companies : '  . '<br>';
echo '<br>';
while ($donnees = $results->fetch())
{
    echo $donnees['name']." | ".$donnees['number_vta']." | ".$donnees['country']." | ".$donnees['type'].'<br>';
}
$results->closeCursor();

//contacts details
$results = $db->query("SELECT * FROM people   ");
echo '<strong><hr>' . 'Last invoices: '  . '<br>';
echo '<br>';
// while ($donnees = $results->fetch())
// { 
//     echo $donnees['name'].'<br>';
// }
// $results->closeCursor();
$products = $results->fetchAll(PDO::FETCH_ASSOC);
foreach ($products as $key => $product) {
    //var_dump($product['productCode']);
    echo '<li><a href="product.php?code='. $product['person_id'].'">'.$product['first_name']." ".$product['last_name'].'</a></li>';
}

