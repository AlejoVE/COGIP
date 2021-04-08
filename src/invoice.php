<?php
// mettre les titres au dessus des colonnes
// aligner les tirets qui séparent les valeurs
// Ajouter header

require_once 'includes/header.php';
require_once 'Model/InvoicesManager.php';


$new_invoices = new InvoicesManager();
$invoices = $new_invoices->getAllInvoices();



// while ($invoices == true) {
//     $date = $invoices['invoice_date'];
//     $strY = substr($date, 0, 4);
//     $strM = substr($date, 5, -3);
//     $strD = substr($date, 8, 9);

//     echo '<a href="invoiceDetail.php?code=' . $invoices['invoice_id'] . '" >' . "F" . $strY . $strM . $strD . "-" . $invoices['invoice_id'] . '</a>' .  " | " . $strD . "/" . $strM . "/" . $strY .  " | " . $invoices['name'] . " | " . $invoices['type'] . '<br>';
// }
// $results->closeCursor();
