<?php
require_once 'includes/header.php';
require_once 'Controller/InvoiceController.php';
require_once 'Controller/ContactsController.php';

$new_invoice =  new InvoiceController();
$db = $new_invoice->connectDb();

$new_contact = new ContactsController();

if(isset($_POST['addInvoice'])){
    $new_invoice->createInvoice();
};

if(isset($_POST['addContact'])){
    $new_contact->createContact();
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
var_dump($_POST);

$results=$db->query("SELECT person_id,first_name, last_name FROM people");
$contactsNameId = $results->fetchAll();

$results=$db->query("SELECT type, typeId FROM type_of_company");
$type_choice = $results->fetchAll();
?>

<?php if(isset($_GET['New_Invoice'])){  ?>
        <form action="#" name="myForm" method="post">
            <h4>Create a new invoice : </h4>
            <div>
                <label>Company Name : </label>
                <select name="company_choice" >
                <?php foreach($companiesNameId AS $company){  ?>
                <option value="<?= $company['id_comp'] ?>"><?php echo $company['name'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div>
                <label>Contact Name : </label>
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
        <form action="formAdd.php" method="post">
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
                <label>Company Name : </label>
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
        <?php } ?>
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
                <label>Company Type : </label>
                <select name="type_choice">
                <option value="1">Client</option>
                <option value="2">Provider</option>
                </select>
            </div>
            <div class="button">
                <button type="submit" name='addCompany'>Send</button>
            </div>
        </form>
    <?php } ?>