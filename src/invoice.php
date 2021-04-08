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
$invoices = $results->fetchAll();



$results->closeCursor();
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
    <?php echo '<strong><hr><br>'; ?>
    <h5>Last Invoices :</h5>
    <table>
        <tr style="text-align: center;">
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Company</th>
            <th>type</th>
        </tr>
        <?php foreach ($invoices as $invoice) { ?>
            <tr style="text-align: center;">
                <form action="index.php" method="get">
                    <td>
                        <? echo '<a href="invoiceDetail.php?code=' . $invoice['invoice_id'] . '" >' . "F". $invoice['invoice_date']."-".$invoice['invoice_id']; ?>
                    </td>
                    <td>
                        |
                        <? echo $invoice['invoice_date']; ?> |
                    </td>
                    <td>
                        <? echo $invoice['name']; ?> |
                    </td>
                    <td>
                        <? echo $invoice['type']; ?>
                    </td>
                </form>
            </tr>
        <?php } ?>
    </table>
</body>

</html>