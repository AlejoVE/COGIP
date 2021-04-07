<?php
require_once 'includes/header.php';
require_once 'Model/Manager.php';
require_once 'Model/InvoiceManager.php';
require_once 'Model/ContactsManager.php';
require_once 'Model/CompaniesManager.php';

//New instance of InvoiceManager class
$new_invoices_object = new InvoicesManager();
//Get lasts 5 invoices
$invoices = $new_invoices_object-> getLastFive();

//New instance of ContactsManager class
$new_contacts_object = new ContactsManager();
//Get lasts 5 contacts
$contacts = $new_contacts_object-> getLastFive();

//New instance of CompaniesManager class
$new_companies_object = new CompaniesManager();
//Get lasts 5 companies
$companies = $new_companies_object-> getLastFive();

//============================Buttons Delete=====================================================================
if(isset($_GET['delete_invoice'])){
    $invoice_id = $_GET['delete_invoice'];
    $req = $db->query("DELETE FROM invoices WHERE invoice_id = $invoice_id");
    $req->bindParam(':invoice_id', $invoice_id, PDO::PARAM_INT);
    //$req->execute();
    echo 'The invoice has been deleted';
}
if(isset($_GET['delete_contact'])){
    $contact_id = $_GET['delete_contact'];
    $req = $db->query("DELETE FROM people WHERE person_id = $contact_id");
    $req->bindParam(':person_id', $contact_id, PDO::PARAM_INT);
    //$req->execute();
    echo 'The contact has been deleted';
}
if(isset($_GET['delete_company'])){
    $company_id = $_GET['delete_company'];
    $req1 = $db->query("DELETE FROM invoices WHERE company_id= $company_id");
    $req2 = $db->query("DELETE FROM people WHERE company_id= $company_id");
    $req3 = $db->query("DELETE FROM companies WHERE id_comp= $company_id");
    //$req->bindParam(':id_comp', $company_id, PDO::PARAM_INT);
    //$req->execute();
    echo 'The company has been deleted';
}
//======================================Variables============================================================
$name='';


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
        <h3>Bonjour
            <? echo $name .'!'; ?>
        </h3>
        <h4><? echo $message ?></h4>
        <?php if(isset($_GET['admin'])){ ?> 
            <?php } ?> 
        <form action="formAdd.php" method="get">
            <input type='submit' name='New_Invoice' value='+ New Invoice'></input>
            <input type='submit' name='New_Contact' value='+ New Contact'></input>
            <input type='submit' name='New_Company' value='+ New Company'></input>
        </form>
        <h5>Last Invoices :</h5>
        <table>
            <tr style="text-align: center;">
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Company</th>
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
                            <? echo $invoice['name']; ?> 
                        </td>
                        <td>
                            <?php if(isset($_GET['admin'])){?> 
                                <input type="submit" name="delete_invoice"  id="<?= $invoice['invoice_id'] ?>" value="Delete" ></input>
                            <?php } ?>
                        </td>
                    </form>
                </tr>
            <?php } ?>
        </table>
        <h5>Last Contacts :</h5>
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
                            <? echo $contact['name']; ?> 
                        </td>
                        <td>
                        <?php if(isset($_GET['admin'])){?> 
                                <input type="submit" name="delete_invoice"  id="<?= $contact['person_id'] ?>" value="Delete" ></input>
                            <?php } ?>
                        </td>
                    </form>
                </tr>
            <?php } ?>
        </table>
        <h5>Last Companies :</h5>
        <table>
            <tr style="text-align: center;">
                <th>Name |</th>
                <th>TVA |</th>
                <th>Country |</th>
                <th>Type |</th>
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
                            <? echo $company['type']; ?> 
                        </td>
                        <td>
                        <?php if(isset($_GET['admin'])){?> 
                                <input type="submit" name="delete_invoice"  id="<?= $company['id_comp'] ?>" value="Delete" ></input>
                            <?php } ?>
                        </td>
                    </form>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
