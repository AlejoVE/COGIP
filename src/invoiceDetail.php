<?php
require_once 'includes/header.php';

try {
    $db = new PDO("mysql:host=remotemysql.com;dbname=nJpHWU5rJ5;port=3306", "nJpHWU5rJ5", "VnjcIEPzgV");
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    try {
        $results = $db->prepare(
            "SELECT *
            FROM invoices
             
             # The question mark instead of the ID
             WHERE invoice_id=?"
        );
        //To bind the id variable to the first question mark. 
        $results->bindParam(1, $code, PDO::PARAM_STR);
        //To execute the query set into results object
        $results->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
    // // To retreive the information for the one product that matches the ID
    $product = $results->fetch(PDO::FETCH_ASSOC);

    if ($product == FALSE) {
        echo "This code reference $code doesn't exist in the Database. </br> <a href='invoice.php''>Go back</a>";
        die();
    }
    $date = $product['invoice_date'];
    $strY = substr($date, 0, 4);
    $strM = substr($date, 5, -3);
    $strD = substr($date, 8, 9);
    $newDate = "F" . $strY . $strM . $strD . "-" . $product['invoice_id'];
}
//else {
//     echo "You have to enter a code reference !";
//     die();
// }
$id = $product['company_id'];
$id2 = $product['invoice_id'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>

<body style="text-align: center;">
    <h1>

        Invoice : <?= $newDate ?>

    </h1>


    <h3><strong>
            <hr>Company linked to the invoice<br></h3>
    <p>
        <?php
        $donnees = $db->query("SELECT * FROM companies JOIN type_of_company ON id_type = typeId WHERE id_comp = $id  ORDER BY id_comp ");

        while ($product = $donnees->fetch()) {
            echo $product['name'] . ' | ' . $product['number_vta'] . ' | ' . $product['type'] .  '<br>';
        }
        $results->closeCursor();

        ?>
    <h3><strong>
            <hr>Invoices<br></h3>
    </p>
    <p>
        <?php
        $donnees = $db->query("SELECT * FROM people as p JOIN invoices as i ON p.company_id = i.company_id  WHERE  invoice_id = $id2 AND p.person_id = i.personId");

        while ($product = $donnees->fetch()) {


            echo   $product['first_name'] . " " . $product['last_name']  .  " | " . $product['email'] . " | " . $product['phone'] .  '<br>';
        }


        ?>

        <?php echo '<a href="invoice.php">Go back</a>'; ?>
    </p>
</body>

</html>