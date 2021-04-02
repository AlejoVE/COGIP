<?php
require_once 'includes/header.php';

try {
    $db = new PDO("mysql:host=remotemysql.com;dbname=nJpHWU5rJ5;port=3306", "nJpHWU5rJ5", "VnjcIEPzgV");
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $db->query("SELECT * FROM invoices JOIN companies 
ON company_id = id_comp ORDER BY id_comp DESC LIMIT 0,5 ");


$invoices = $results->fetchAll();

$resultsContact = $db->query("SELECT * FROM people JOIN companies 
ON company_id = id_comp ORDER BY id_comp DESC  LIMIT 0,5 ");

$contacts = $resultsContact->fetchAll();


$resultsCompanies = $db->query("SELECT * FROM companies JOIN type_of_company 
ON id_type = typeId ORDER BY id_comp DESC LIMIT 0,5 ");

$companies = $resultsCompanies->fetchAll();


$name='';

// $results = $db->query("SELECT * FROM invoices JOIN companies ON company_id = id_comp ORDER BY id_comp DESC LIMIT 0,5 ");
// echo '<strong><hr>' . 'Last invoices: '  . '<br>';
// echo '<br>';
// while ($donnees = $results->fetch()) {
//     $date = $donnees['invoice_date'];
//     $strY = substr($date, 0, 4);
//     $strM = substr($date, 5, -3);
//     $strD = substr($date, 8, 9);

//     echo "F" . $strY . $strM . $strD . "-" . $donnees['invoice_id'] . " | " . $strD . "/" . $strM . "/" . $strY .
//         " | " . $donnees['name'] . ' | ' . '<br>';
// }
// $results->closeCursor();

// echo '<br>';

// $results = $db->query("SELECT * FROM people JOIN companies ON company_id = id_comp ORDER BY id_comp DESC  LIMIT 0,5 ");
// echo '<strong><hr>' . 'Last contacts : '  . '<br>';
// echo '<br>';
// while ($donnees = $results->fetch()) {
//     echo $donnees['first_name'] . " " . $donnees['last_name'] . " | " . $donnees['phone'] . " | " . $donnees['email'] . " | " . $donnees['name'] . '<br>';
// }
// $results->closeCursor();

// echo '<br>';

// $results = $db->query("SELECT * FROM companies JOIN type_of_company ON id_type = typeId ORDER BY id_comp DESC LIMIT 0,5 ");
// echo '<strong><hr>' . 'Last companies : '  . '<br>';
// echo '<br>';
// while ($donnees = $results->fetch()) {
//     echo $donnees['name'] . " | " . $donnees['number_vta'] . " | " . $donnees['country'] . " | " . $donnees['type'] . '<br>';
// }
// $results->closeCursor();



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="">


    <title>Home</title>

</head>

<body>
    <h1>Welcome to COGIP</h1>

    <h4>Bonjour
        <? echo $name .'!'; ?>
    </h4>

    <h3>Last Invoices :</h3>
    <table>
        <tr style="text-align: center;">
            <th>invoice number</th>
            <th>date</th>
            <th>company</th>
        </tr>


        <?php foreach ($invoices as $invoice) { ?>
            <tr>
                <form action="index.php" method="get">

                    <td> F
                        <? echo $invoice['invoice_date']."-".$invoice['invoice_id']; ?> |
                    </td>
                    <td>
                        <? echo $invoice['invoice_date']; ?> |
                    </td>
                    <td>
                        <? echo $invoice['name']; ?> |
                    </td>
                    <td>
                        <? echo '<input type="submit" name="delete" value=" '.$invoice['invoice_id'].' " >delete</input>'; ?>
                    </td>

                </form>
            </tr>

        <?php } ?>


    </table>

    <h3>Last Contacts :</h3>
    <table>

        <tr style="text-align: center;">
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Company</th>
        </tr>
        <?php foreach ($contacts as $contact) { ?>
            <tr>
                <form action="index.php" method="get">

                    <td> 
                        <? echo $contact['first_name']." ".$contact['last_name']; ?> |
                    </td>
                    <td>
                        <? echo $contact['phone']; ?> |
                    </td>
                    <td>
                        <? echo $contact['email']; ?> |
                    </td>
                    <td>
                        <? echo $contact['name']; ?> |
                    </td>
                    <td>
                        <? echo '<input type="submit" name="delete" value=" '.$contact['person_id'].' " >delete</input>'; ?>
                    </td>

                </form>
            </tr>

        <?php } ?>

    </table>


    <h3>Last Copmanies :</h3>
    <table>

        <tr style="text-align: center;">
            <th>Name</th>
            <th>TVA</th>
            <th>Country</th>
            <th>Type</th>
        </tr>
        <?php foreach ($companies as $company) { ?>
            <tr>
                <form action="index.php" method="get">

                    <td> 
                        <? echo $company['name']; ?> |
                    </td>
                    <td>
                        <? echo $company['number_vta']; ?> |
                    </td>
                    <td>
                        <? echo $company['country']; ?> |
                    </td>
                    <td>
                        <? echo $company['type']; ?> |
                    </td>
                    <td>
                        <? echo '<input type="submit" name="delete" value=" '.$company['id_comp'].' " >delete</input>'; ?>
                    </td>

                </form>
            </tr>

        <?php } ?>

    </table>

</body>

</html>