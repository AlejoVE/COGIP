<?php
require_once 'includes/header.php';

try {
    $db = new PDO("mysql:host=remotemysql.com;dbname=nJpHWU5rJ5;port=3306", "nJpHWU5rJ5", "VnjcIEPzgV");
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

<<<<<<< HEAD
if(isset($_GET['code'])) {
=======
if (isset($_GET['code'])) {
>>>>>>> 59763901ab52503a93c31a7ae729e60633ea6c5f
    $code = $_GET['code'];

    try {
        $results = $db->prepare(
            "SELECT *
            FROM people
            JOIN companies
            ON company_id = id_comp
            # The question mark instead of the ID
            WHERE person_id=?"
        );
        //To bind the id variable to the first question mark. 
        $results->bindParam(1, $code, PDO::PARAM_STR);
        //To execute the query set into results object
        $results->execute();
<<<<<<< HEAD
    } catch(Exception $e) {
=======
    } catch (Exception $e) {
>>>>>>> 59763901ab52503a93c31a7ae729e60633ea6c5f
        echo $e->getMessage();
        exit;
    }
    // To retreive the information for the one product that matches the ID
    $product = $results->fetch(PDO::FETCH_ASSOC);

<<<<<<< HEAD
    if($product == FALSE) {
=======
    if ($product == FALSE) {
>>>>>>> 59763901ab52503a93c31a7ae729e60633ea6c5f
        echo "This code reference $code doesn't exist in the Database. </br> <a href='/''>Go back</a>";
        die();
    }
} else {
    echo "You have to enter a code reference !";
    die();
}
$id = $product['person_id'];


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
        Contact : <?= $product['first_name'] . " " . $product['last_name'] ?>
    </h1>
    <p><strong>Contact :</strong> <?= $product['first_name'] . " " . $product['last_name'] ?></p>
    <p><strong>Company :</strong> <?= $product['name'] ?></p>
    <p><strong>Email :</strong> <?= $product['email'] ?></p>
    <p><strong>Phone :</strong> <?= $product['phone'] ?></p>
    <h3>
        Contact person for these invoices :
    </h3>
    <p><?php
        $results = $db->query("SELECT * FROM invoices JOIN companies ON company_id = id_comp WHERE personId = $id  ORDER BY id_comp DESC LIMIT 0,5  ");
        echo '<strong><hr>' . 'Last invoices: '  . '<br>';
        echo '<br>';
        while ($donnees = $results->fetch()) {
            $date = $donnees['invoice_date'];
            $strY = substr($date, 0, 4);
            $strM = substr($date, 5, -3);
            $strD = substr($date, 8, 9);

            echo "F" . $strY . $strM . $strD . "-" . $donnees['invoice_id'] . " | " . $strD . "/" . $strM . "/" . $strY . '<br>';
        }
        $results->closeCursor();


        ?></p>
    <?php echo '<a href="/">Go back</a>'; ?>
</body>

</html>