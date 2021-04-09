<?php
require_once 'includes/header.php';
require_once 'includes/footer.php';

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
            FROM companies
             JOIN type_of_company
             ON id_type = typeId  
             # The question mark instead of the ID
             WHERE id_comp=?"
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

    // if($product == FALSE) {
    //     echo "This code reference $code doesn't exist in the Database. </br> <a href='companies.php''>Go back</a>";
    //     die();
    // }
}
//else {
//     echo "You have to enter a code reference !";
//     die();
// }
$id = $product['id_comp'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/normalize.css">
    <link rel="icon" type="image/png"  href="styles/img/cogip-logo.jpeg">
    <title>Companies Detail</title>
</head>

<body style="text-align: center;">
    <h1>
        Company : <?= $product['name'] ?>
    </h1>
    <p><strong>TVA :</strong> <?= $product['number_vta'] ?></p>
    <p><strong>Type :</strong> <?= $product['type'] ?></p>

    <h3><strong>
            <hr>Contact persons<br></h3>
    <p>
        <?php
        $donnees = $db->query("SELECT * FROM people WHERE company_id = $id  ORDER BY company_id ");

        while ($product = $donnees->fetch()) {
            echo $product['first_name'] . ' ' . $product['last_name'] . ' | ' . $product['phone'] . ' | ' . $product['email'] . '<br>';
        }
        $results->closeCursor();

        ?>
    <h3><strong>
            <hr>Invoices<br></h3>
    <p>
        <?php
        $donnees = $db->query("SELECT * FROM invoices as i JOIN people ON personId = person_id WHERE i.company_id = $id  ");

        while ($product = $donnees->fetch()) {
            $date = $product['invoice_date'];
            $strY = substr($date, 0, 4);
            $strM = substr($date, 5, -3);
            $strD = substr($date, 8, 9);

            echo "F" . $strY . $strM . $strD . "-" . $product['invoice_id'] . " | " . $strD . "/" . $strM . "/" . $strY . " | " . $product['first_name'] . ' ' . $product['last_name'] . '<br>';
        }


        ?>

        <?php echo '<a href="companies.php">Go back</a>'; ?>
    </p>
</body>

</html>