<?php
require_once 'includes/header.php';
//require('index.php');
try {
    $db = new PDO("mysql:host=remotemysql.com;dbname=nJpHWU5rJ5;port=3306", "nJpHWU5rJ5", "VnjcIEPzgV");
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}
if(isset($_POST['addInvoice'])){
    $company = intval($_POST['company_choice']);
    $contact_id = intval($_POST['contact_choice']);
    $date=date_create($_POST['date_invoice']);
    $date = date_format($date,"Ymd");
    $req = $db->query("INSERT INTO invoices (company_id,personId,invoice_date) VALUES ($company,$contact_id,$date)");
};
if(isset($_POST['addContact'])){
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $company = intval($_POST['company_choice']);
    //echo $company;
    $req = $db->query("INSERT INTO people (first_name,last_name,email,company_id,phone) 
    VALUES ('$firstName', '$lastName', '$email', '$company', '$phone')");
};
if(isset($_POST['addCompany'])){
    $name_company = $_POST['name'];
    $tva_number = $_POST['tva_number'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $company_type = $_POST['type_choice'];
    $req = $db->query("INSERT INTO companies (name,country,number_vta,id_type) 
    VALUES ('$name_company', '$country', '$tva_number', '$company_type')");
};
$results=$db->query("SELECT id_comp,name FROM companies");
$companiesNameId = $results->fetchAll();

$results=$db->query("SELECT person_id,first_name, last_name FROM people");
$contactsNameId = $results->fetchAll();

$results=$db->query("SELECT type, typeId FROM type_of_company");
$type_choice = $results->fetchAll();
?>

<?php if(isset($_GET['New_Invoice'])){  ?>
        <form action="index.php" method="post">
            <h4>Create a new invoice : </h4>
            <div>
                <libellé>Company Name : </libellé>
                <select name="company_choice">
                <?php foreach($companiesNameId as $key => $name){  ?>
                <option valeur="<?= $key ?>"><?php echo implode(', ',$name) ?></option>
                <?php } ?>
                </select>
            </div>
            <div>
                <libellé>Contact Name : </libellé>
                <select name="contact_choice">
                <?php foreach($contactsNameId as $key => $name){  ?>
                <option valeur="<?= $key ?>"><?php echo implode(', ',$name) ?></option>
                <?php } ?>
                </select>
            </div>
            <div>
                <label for="date">Date invoice:</label>
                <input type="date" id="date" name="date_invoice">
            </div>
            <div class="button">
                <button type="submit" name='addInvoice'>Send</button>
            </div>
        </form>
    <?php } ?>
    <?php if(isset($_GET['New_Contact'])){?>
        <form action="index.php" method="post">
            <h4>Create a new contact : </h4>
            <div>
                <label for="lastName">Name :</label>
                <input type="text" id="lastName" name="lastName">
            </div>
            <div>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName">
            </div>
            <div>
                <label for="phone">Phone :</label>
                <input type="text" id="phone" name="phone" placeholder="xxx-xxxx">
            </div>
            <div>
                <label for="email">Email :</label>
                <input type="text" id="email" name="email">
            </div>
            <div>
                <libellé>Company Name : </libellé>
                <select name="company_choice">
                <?php foreach($companiesNameId as $key => $name){  ?>
                <option valeur="<?= $key ?>"><?php echo implode(', ',$name) ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="button">
                <button type="submit" name='addContact'>Send</button>
            </div>
        </form>
    <? } ?>
    <?php if(isset($_GET['New_Company'])){?>
        <form action="formAdd.php" method="post">
            <h4>Create a new company : </h4>
            <div>
                <label for="name">Company Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="tva_number">TVA Number:</label>
                <input type="text" id="tva_number" name="tva_number">
            </div>
            <div>
                <label for="country">Country :</label>
                <input type="text" id="country" name="country" >
            </div>
            <div>
            <div>
                <label for="phone">Phone :</label>
                <input type="text" id="phone" name="phone" placeholder="xxx-xxxx">
            </div>
            <div>
                <libellé>Company Type : </libellé>
                <select name="type_choice">
                <?php foreach($type_choice as $key => $name){  ?>
                <option valeur="<?= $key ?>"><?php echo implode(', ',$name) ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="button">
                <button type="submit" name='addCompany'>Send</button>
            </div>
        </form>
    <? } ?>